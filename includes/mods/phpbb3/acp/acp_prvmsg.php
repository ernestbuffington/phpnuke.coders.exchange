<?php
/**
*
* @package acp
* @version $Id: acp_prvmsg.php,v 1.10 2006/12/31 16:56:14 acydburn Exp $
* @copyright (c) 2006 phpBB Group 
* @license http://opensource.org/licenses/gpl-license.php GNU Public License 
*
*/

/*
* Note: Sorry my hard codes :(
*/

/**
* @package acp
*/
class acp_prvmsg
{
	var $u_action;
	var $p_master;
	var $char_limit = 35;
	
	function acp_prvmsg(&$p_master)
	{
		$this->p_master = &$p_master;
	}

	function main($id, $mode)
	{
		global $config, $db, $user, $template, $char_limit, $phpbb_root_path;
		
		// Only Board Founders can view Priv Messages
		if ($user->data['user_type'] != USER_FOUNDER)
		{
			trigger_error($user->lang['NO_AUTH_OPERATION'], E_USER_WARNING);
		}
		
		// Start initial var setup
		$start	= request_var('start', 0);
		$CFG['pm_per_page'] = $config['topics_per_page']; // default topics_per_page is 25

		// + parse to address
		function parse_to_address($to_address)
		{
			global $db;

			$to_address = str_replace('u_', '', $to_address);
			$to_address = str_replace('g_', '', $to_address);
			$to_address = explode(':', $to_address);
			
			$to = '';
			$m = count($to_address);
			$i = 0;
			for($i;$i<$m;$i++) 
			{
				// + id to username
				/*
				$sql = 'SELECT *
					FROM ' . USERS_TABLE . '
					WHERE user_id = ' . $to_address[$i];
				$result = $db->sql_query($sql);
				$to_user = $db->sql_fetchrow($result);
				$db->sql_freeresult($result);
				*/
				
				$sql = 'SELECT u.*, b.*
					FROM ' . USERS_TABLE . ' u, ' . BOTS_TABLE . " b
					WHERE u.user_id != b.user_id
						AND (b.user_id = $to_address[$i]				
							OR u.user_id = $to_address[$i])";

				$result = $db->sql_query($sql);
				$to_user = $db->sql_fetchrow($result);
				$db->sql_freeresult($result);
				
				if ($to_user['username'] == 'Anonymous')
				{
					$to_user['username'] = 'group'; // sorry this is hard code
				}

				// + get "to" user info
				$username	= $to_user['username'];
				$user_id	= (int) $to_user['user_id'];
				$colour		= $to_user['user_colour'];

				$to_user	= get_username_string('username', $user_id, $username, $colour);
				$to_color	= get_username_string('colour', $user_id, $username, $colour);
				$to_profile	= get_username_string('profile', $user_id, $username, $colour);
				// + get "to" user info
				
				$to_link = "<a href=\"$to_profile\"><span style=\"color:$to_color;\"><strong>$to_user</strong></span></a>";
				@$to .= ($to) ? ', ' . $to_link : $to_link;
				// - id to username
			}
			return $to;
		}
		// - parse to address
		
		// count total pm for pagination
		$sql = 'SELECT COUNT(msg_id) AS total_msg
			FROM ' . PRIVMSGS_TABLE;
		$result = $db->sql_query($sql);
		$total_msg = (int) $db->sql_fetchfield('total_msg');
		$db->sql_freeresult($result);

		if (!$total_msg)
		{
			trigger_error($user->lang['NO_PM_DATA']);
		}

		// select pm table
		$sql = "SELECT p.message_subject, p.message_text, p.bbcode_uid, p.bbcode_bitfield, p.message_time, p.bcc_address, p.to_address, p.author_ip, u.user_id, u.username, u.user_colour
			FROM " . PRIVMSGS_TABLE . " AS p, " . USERS_TABLE . " AS u
			WHERE p.author_id = u.user_id
			ORDER BY message_time DESC";
		$result = $db->sql_query_limit($sql, $CFG['pm_per_page'], $start);

		$i = 0; // for row_number
		while ($row = $db->sql_fetchrow($result))
		{
			// + parse bbcode and smileys
			$flags = (($config['allow_bbcode']) ? 1 : 0) + (($config['allow_smilies']) ? 2 : 0) + ((true) ? 4 : 0);
			$message_text = generate_text_for_display($row['message_text'], $row['bbcode_uid'], $row['bbcode_bitfield'], $flags);
			// - parse bbcode and smileys
			
			// + get "from" user info
			$username		= $row['username'];
			$user_id		= (int) $row['user_id'];
			$colour			= $row['user_colour'];

			$from_user		= get_username_string('username', $user_id, $username, $colour);
			$from_color		= get_username_string('colour', $user_id, $username, $colour);
			$from_profile	= get_username_string('profile', $user_id, $username, $colour);
		
			$from_link = "<a href=\"$from_profile\"><span style=\"color:$from_color;\"><strong>$from_user</strong></span></a>";
			// + get "from" user info
			
			$template->assign_block_vars('pm_list', array(
				'ROW_NUMBER'	=> $i + ($start + 1),

				'PM_SUBJECT'	=> $this->character_limit($row['message_subject'],$char_limit),
				'PM_TEXT'		=> $message_text,

				'FROM'			=> $from_link,
				'FROM_COLOR'	=> ($row['user_colour']) ? ' style="color:#' . $row['user_colour'] .'"' : '',
				'U_FROM'		=> $from_link,

				'TO'			=> ($row['to_address']) ? parse_to_address($row['to_address']) : '',
				'BCC'			=> ($row['bcc_address']) ? parse_to_address($row['bcc_address']) : '',

				'AUTHOR_IP'		=> $row['author_ip'],
				
//				'DATE'		=> $user->format_date($row['message_time']), 				// board settings
				'DATE'		=> $user->format_date($row['message_time'], 'd.m.Y, H:i'),	// custom
			));
			$i++;
		}
		$db->sql_freeresult($result);

		$this->tpl_name		= 'acp_prvmsg';
		$this->page_title	= 'ACP_PRVMSG';
		
		$template->assign_vars(array(
			'TOTAL_PM'		=> ($total_msg == 1) ? $user->lang['LIST_PM'] : sprintf($user->lang['LIST_PMS'], $total_msg),
			
			'S_ON_PAGE'		=> on_page($total_msg, $CFG['pm_per_page'], $start),
			'PAGINATION'	=> generate_pagination($this->u_action, $total_msg, $CFG['pm_per_page'], $start, true),
		));
	}
	
	/**
	* Censor title, return short title
	*
	* @param $title string title to censor
	* @param $limit int short title character limit
	*
	*/
	function character_limit(&$title, $limit = 0)
	{
		$title = censor_text($title);
		if ($limit > 0)
		{
			return (strlen(utf8_decode($title)) > $limit + 3) ? truncate_string($title, $limit) . '...' : $title;
		}
		else
		{
			return $title;
		}
	}
}
?>