<?php
/** 
*
* @package Ajax Shoutbox
* @version $Id: ajax.php 189 2007-11-14 14:20:27Z paul $
* @copyright (c) 2007 Paul Sohier 
* @license http://opensource.org/licenses/gpl-license.php GNU Public License 
*
*/

/**
* @ignore
*/
define('IN_PHPBB', true);

$phpbb_root_path = (defined('PHPBB_ROOT_PATH')) ? PHPBB_ROOT_PATH : './'; 
$phpEx = substr(strrchr(__FILE__, '.'), 1);

include ($phpbb_root_path . 'common.' . $phpEx);

error_reporting(0);//Disable error reporting, can be bad for our headers ;)

// Start session management
$user->session_begin(false);
$auth->acl($user->data);
$user->setup('mods/shout');

include ($phpbb_root_path . 'includes/functions_shoutbox.' . $phpEx);

// Be sure $shout_number is set.
// This is done in includes/functions_shoutbox.php.
if (!isset($shout_number))
{
	exit;
}

// We have our own error handling!
$db->sql_return_on_error(true);

$mode = request_var('m', 'index');

@ob_end_clean();
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); 
header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . 'GMT'); 
header('Cache-Control: no-cache, must-revalidate'); 
header('Pragma: no-cache');
header('Content-type: text/xml; charset=UTF-8');	
echo '<' . '?xml version="1.0" encoding="UTF-8" ?' . '>
<xml>';

switch ($mode)
{
	case 'smilies':

		$sql = 'SELECT *
			FROM ' . PHPBB3_SMILIES_TABLE .
				' WHERE display_on_posting = 1
			ORDER BY smiley_order';
		$result = $db->sql_query($sql);
		if ($result)
		{
			$num_smilies = 0;
			$rowset = array();
			$last_url = '';
			
			while ($row = $db->sql_fetchrow($result))
			{
				if ($row['smiley_url'] !== $last_url)
				{
						echo "<smilies>\n
							<code>" . xml($row['code']) . "</code>\n
							<img>" . xml($phpbb_root_path . $config['smilies_path'] . '/' . $row['smiley_url']) . "</img>\n
							<alt>" . xml($row['emotion']) . "</alt>\n
							</smilies>";
				}
				$last_url = $row['smiley_url'];
			}
			echo '</xml>';
			exit;
		}	
		else
		{
			sql_error($sql, __LINE__, __FILE__);
		}
	break;
	
	case 'delete':

		if ( !($auth->acl_get('a_') || $auth->acl_getf_global('m_')))
		{
			echo '<error>' . $user->lang['NOT_ALLOWED_DELETE;'] . '</error></xml>';
			exit;
		}
	
		$id = request_var('id', 0);
		if (!$id)
		{
			echo '<error>' . $user->lang['NO_SHOUT_ID'] . '</error></xml>';
			exit;
		}
		else
		{
			// Lets delete this post :D
			$sql = 'DELETE FROM ' . PHPBB3_SHOUTBOX_TABLE . ' WHERE shout_id = ' . $id;
			if (!$db->sql_query($sql))
			{
				sql_error($sql, __LINE__, __FILE__);
			}
			else
			{
				echo '<msg></msg></xml>';
				exit;
			}
		}
	break;
	
	case 'add':
		if ($user->data['user_type'] == PHPBB3_USER_IGNORE )
		{
			echo '<error>' . $user->lang['NO_POST_GUEST'] . '</error></xml>';
			exit;
		}
		else
		{
			// Remove all messages older as 2 weeks,
			// Config option be a good thing for this?
			$time = time() - (3600 * 24 * 14);//3600 seconds in 1 hour, 24 hours in a day, 14 days in 2 weeks.

			$sql = 'DELETE FROM  ' . PHPBB3_SHOUTBOX_TABLE . " WHERE shout_time < $time";
			if (!$db->sql_query($sql))
			{
				sql_error($sql, __LINE__, __FILE__);
			}		
			$current_time = time();
			//
			// Flood control
			//
			
			if (!($auth->acl_get('a_') || $auth->acl_getf_global('m_')))
			{
				$sql = 'SELECT MAX(shout_time) AS last_post_time
					FROM ' . PHPBB3_SHOUTBOX_TABLE . '
					WHERE shout_user_id = ' . $user->data['user_id'];
				if ($result = $db->sql_query($sql))
				{
					if ($row = $db->sql_fetchrow($result))
					{
						$db->sql_freeresult($result);
						if ($row['last_post_time'] > 0 && ($current_time - $row['last_post_time'] ) < $config['flood_interval'])
						{
							echo '<error>' . $user->lang['FLOOD_ERROR'] . '</error></xml>';
							exit;
						}
					}
				}
				else
				{
					sql_error($sql, __LINE__, __FILE__);
				}
			}
			$message = utf8_normalize_nfc(request_var('chat_message', '', true));
			
			if (empty($message))
			{
				echo '<error>' . $user->lang['MESSAGE_EMPTY'] . '</error></xml>';
				exit;
			}
			else if (strpos($message, '[quote') !== false || strpos($message, '[code') !== false  || strpos($message, '[list') !== false)
			{
				echo '<error>' . $user->lang['NO_QUOTE'] . '</error></xml>';
				exit;
			}
			else
			{
				$uid = $bitfield = $options = ''; // will be modified by generate_text_for_storage
				$allow_bbcode = $allow_urls = $allow_smilies = true;
				generate_text_for_storage($message, $uid, $bitfield, $options, $allow_bbcode, $allow_urls, $allow_smilies);
				
				$sql_ary = array(
						'shout_text'				=> $message,
						'shout_bbcode_uid'			=> $uid,
						'shout_bbcode_bitfield'		=> $bitfield,
						'shout_bbcode_flags'		=> $options,
						'shout_time'				=> time(),
						'shout_user_id'				=> (int)$user->data['user_id'],
						'shout_ip'					=> $user->ip,
				);
				
				$sql = 'INSERT INTO ' . PHPBB3_SHOUTBOX_TABLE . ' ' . $db->sql_build_array('INSERT', $sql_ary);								
        
				if (!$db->sql_query($sql)) 
				{
					sql_error($sql, __LINE__, __FILE__);
				}
				echo '<msg>' . $user->lang['POSTED'] . '</msg></xml>';
				exit;
			}	
		}
	break;
	
	case 'check':
		$last = request_var('last', 1);
		$sql = 'SELECT shout_time AS s FROM ' . PHPBB3_SHOUTBOX_TABLE . '
		ORDER BY shout_time DESC';		
		$result = $db->sql_query_limit($sql, 1);
		if (!$result)
		{
			sql_error($sql, __LINE__, __FILE__);
		}
		else
		{
			$row = $db->sql_fetchrow($result);
			$s = $row['s'];
			echo "<last>$s</last><time>" . (int)($s != $last) . '</time></xml>';
			exit;
		}				
	break;
	
	case 'number':
		$sql = 'SELECT COUNT(shout_id) as nr FROM ' . PHPBB3_SHOUTBOX_TABLE;
		$result = $db->sql_query($sql);
		if (!$result)
		{
			sql_error($sql, __LINE__, __FILE__);
		}
		$row = (int)$db->sql_fetchfield('nr');
		echo "<nr>$row</nr></xml>";
		exit;
	break;
	
	/*case 'version':
	    /*
		 * Version checker, currently disabled.
		 */
		 /*
		// Get current and latest version
		$errstr = '';
		$errno = 0;

		$info = get_remote_file('www.paulscripts.nl', '/', 'shoutbox.txt', $errstr, $errno);

		if ($info === false)
		{
			trigger_error($errstr, E_USER_WARNING);
		}

		$info = explode("\n", $info);
		$latest_version = trim($info[0]);
		
		$up_to_date = (string)(version_compare(str_replace('rc', 'RC', strtolower(VERSION)), str_replace('rc', 'RC', strtolower($latest_version)), '<')) ? false : true;
		$current = VERSION;
		
		print "<newest>$latest_version</newest><current>$current</current><uptodate>$up_to_date</uptodate></xml>";
		exit;
	break;*/
	
	case 'view':
		$start = request_var('start', 0);
		$start = ($start < 0) ? 0 : $start;
		
		$sql = 'SELECT s.*, u.user_colour, u.username, u.user_id FROM ' . PHPBB3_SHOUTBOX_TABLE . ' s, ' . PHPBB3_USERS_TABLE . ' u
			WHERE 
				s.shout_user_id = u.user_id 
				ORDER BY s.shout_time DESC';
		$result = $db->sql_query_limit($sql, $shout_number, $start);
		
		if (!$result)
		{
			sql_error($sql, __LINE__, __FILE__);
		}
		else
		{
			$row = $db->sql_fetchrow($result);
			if (!$row)
			{
				echo '<error>' . $user->lang['NO_MESSAGE'] . '</error></xml>';
				exit;
			}			

			do
			{
				echo "<posts>\n";

				$row['username'] = get_username_string('full', $row['user_id'], xml(htmlspecialchars_decode($row['username'])), $row['user_colour']);

				$row['shout_time'] = $user->format_date($row['shout_time']);

				$row['shout_text'] = generate_text_for_display($row['shout_text'], $row['shout_bbcode_uid'], $row['shout_bbcode_bitfield'], $row['shout_bbcode_flags']);
				$row['shout_text'] = str_replace('&nbsp;', '', $row['shout_text']);

				// 5 is the length of <br /> - 1.
				if (substr($row['shout_text'], 0, 5) == '<br />')
				{
					$row['shout_text'] = substr($row['shout_text'], 5);
				}
				// Next items aren't needed in XML.
				unset($row['shout_bbcode_uid'], $row['user_allowsmile'], $row['shout_bbcode_bitfield']);
				
				if (!($auth->acl_get('a_') || $auth->acl_getf_global('m_')))
				{
					unset($row['shout_userip']);
				}
				foreach ($row as $key => $value)
				{
					if (is_numeric($key))
					{
						continue;
					}
					echo "\t<$key>$value</$key>\n";
				}
				echo "</posts>\n";
			}
			while ($row = $db->sql_fetchrow($result));
			echo '</xml>';
			exit;
		}
	break;
}

echo '<error></error></xml>';

?>