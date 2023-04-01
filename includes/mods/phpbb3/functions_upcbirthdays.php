<?php
/**
*
* @package phpBB3
* @functions_upcbirthdays.php
* @copyright (c) 2008 lefty74
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

/**
* @ignore
*/
if (!defined('IN_PHPBB'))
{
	exit;
}

/**
* Obtain Upcoming Birthday List
**/
function get_upcbirthdays()
{
	global $cache, $config, $db, $user, $auth;
	global $template, $phpbb_root_path, $phpEx;
		
	$birthday_ahead_list = '';
	$sql = 'SELECT user_id, username, user_colour, user_birthday
		FROM ' . USERS_TABLE . "
		WHERE user_birthday NOT LIKE '%- 0-%'
			AND user_birthday NOT LIKE '0-%'
				AND	user_birthday NOT LIKE '0- 0-%'
					AND	user_birthday NOT LIKE ''
						AND user_type IN (" . USER_NORMAL . ', ' . USER_FOUNDER . ')';
	//BEGIN for those of you who have the prime birthday mod installed, code provided by primehalo
	$prime_birthdate_installed = function_exists('user_show_congrats');
    if ($prime_birthdate_installed)
    {
        $sql = str_replace('FROM ' . USERS_TABLE, ', user_show_age FROM ' . USERS_TABLE, $sql);
    }    
	//END for those of you who have the prime birthday mod installed, code provided by primehalo
	$result = $db->sql_query($sql);

	$now = getdate(time() + $user->timezone + $user->dst - date('Z'));
    $today = (mktime(0, 0, 0, $now['mon'], $now['mday'], $now['year']));
	
	$ucbirthdayrow = array();
	while ($row = $db->sql_fetchrow($result))
	{
	    $birthdaycheck = strtotime(gmdate('Y') . '-' . trim(substr($row['user_birthday'],3,-5)) . '-' . trim(substr($row['user_birthday'],0,-8) ));
		$birthdayyear = ( $birthdaycheck < $today ) ? gmdate('Y') + 1 : gmdate('Y');
		$birthdaydate = ($birthdayyear . '-' . trim(substr($row['user_birthday'],3,-5)) . '-' . trim(substr($row['user_birthday'],0,-8) ));
		$ucbirthdayrow[] = array(
							'user_birthday_tstamp' 	=> strtotime($birthdaydate), 
							'username'				=>	$row['username'], 
							'user_birthdayyear' 	=> $birthdayyear, 
							'user_birthday' 		=> 	$row['user_birthday'], 
							'user_id'				=>	$row['user_id'], 
							'user_show_age'			=>	(isset($row['user_show_age'])) ? $row['user_show_age'] : 0, 
							'user_colour'			=>	$row['user_colour']);
	}
	$db->sql_freeresult($result);
	sort($ucbirthdayrow);

	for ($i = 0, $end = sizeof($ucbirthdayrow); $i < $end; $i ++)
	{
		if ( $ucbirthdayrow[$i]['user_birthday_tstamp'] >= ($today + 86400) && $ucbirthdayrow[$i]['user_birthday_tstamp'] <= ($today + ((($config['allow_birthdays_ahead'] >365) ? 365 : $config['allow_birthdays_ahead']) * 86400) ) )
		{
			if ($ucbirthdayrow[$i]['user_colour'])
			{
				$user_colour = ' style="color:#' . $ucbirthdayrow[$i]['user_colour'] . '"';
				$ucbirthdayrow[$i]['username'] = '<strong>' . $ucbirthdayrow[$i]['username'] . '</strong>';
			}
			else
			{
				$user_colour = '';
			}

			// BEGIN for those of you who have the prime birthday mod installed, code provided by primehalo
			if ($prime_birthdate_installed)
			{
				if (!user_show_congrats($ucbirthdayrow[$i]['user_show_age']))
				{
					continue;
				}
				$ucbirthdayrow[$i]['user_birthday_tstamp'] = (user_show_age($ucbirthdayrow[$i]['user_show_age'])) ? $ucbirthdayrow[$i]['user_birthday_tstamp'] : '';
			}    
			// END for those of you who have the prime birthday mod installed, code provided by primehalo

			//lets add to the birthday_ahead list, to fix the hour that appears to be missing.
			$birthday_ahead_list .= (($birthday_ahead_list != '') ? ', ' : '') . '<a' . $user_colour . ' href="' . append_sid("{$phpbb_root_path}memberlist.$phpEx", 'mode=viewprofile&amp;u=' . $ucbirthdayrow[$i]['user_id']) . '" title="' . $user->format_dateucb(($ucbirthdayrow[$i]['user_birthday_tstamp']), 'D, j. M') . '">' . $ucbirthdayrow[$i]['username'] . '</a>';

			if ( $age = (int) substr($ucbirthdayrow[$i]['user_birthday'], -4) )
			{
				$birthday_ahead_list .= ' (' . ($ucbirthdayrow[$i]['user_birthdayyear'] - $age) . ')';
			}
		}
	}
	
	// Assign index specific vars
	$template->assign_vars(array(
		'BIRTHDAYS_AHEAD_LIST'	=> $birthday_ahead_list,
		'L_BIRTHDAYS_AHEAD'	=> sprintf($user->lang['BIRTHDAYS_AHEAD'], ($config['allow_birthdays_ahead'] >365) ? 365 : $config['allow_birthdays_ahead']),
		));
}

?>