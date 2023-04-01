<?php

/**
*
* @package - NV "who was here?"
* @version $Id$
* @copyright (c) nickvergessen ( http://mods.flying-bits.org/ )
* @license http://opensource.org/licenses/gpl-license.php GNU Public License 
*
*/

if (!defined('IN_PHPBB'))
{
	exit;
}
$new_mod_version = $old_mod_version = '1';
include_once($phpbb_root_path . 'includes/functions_wwh2.' . $phpEx);

if ($old_mod_version == $new_mod_version)
{
	// first let's get some config's
	$wwh_disp_bots		= $config['wwh_disp_bots'];
	$wwh_disp_guests	= $config['wwh_disp_guests'];
	$wwh_disp_time		= $config['wwh_disp_time'];
	$wwh_version		= $config['wwh_version'];
	$wwh_del_time		= $config['wwh_del_time'];
	$wwh_reset_time		= $config['wwh_reset_time'];
	$wwh_record			= $config['wwh_record'];
	$wwh_sort_by		= $config['wwh_sort_by'];

	//cleaning the wwh-table
	$timestamp = time();
	if ($wwh_version == 1)
	{
		$timestamp_cleaning = gmmktime(0,0,0,gmdate('m', $timestamp),gmdate('d', $timestamp),gmdate('Y', $timestamp));
		$timestamp_cleaning = $timestamp_cleaning - $config['board_timezone'] * 3600;
		$timestamp_cleaning = $timestamp_cleaning - $config['board_dst'] * 3600;
		$timestamp_cleaning = ($timestamp_cleaning < $timestamp - 86400) ? $timestamp_cleaning + 86400 : (($timestamp_cleaning > $timestamp) ? $timestamp_cleaning - 86400 : $timestamp_cleaning);
	}
	else
	{
		$timestamp_cleaning = $timestamp - $wwh_del_time;
	}

	$sql = 'DELETE FROM ' . WWH_TABLE . " WHERE last_page <= " . $timestamp_cleaning;
	$db->sql_query($sql);

	$pre_sql = 'SELECT u.user_id, u.username, u.username_clean, u.user_type, u.user_colour, u.user_allow_viewonline, u.user_lastvisit, w.viewonline, w.id, w.last_page
		FROM ' . USERS_TABLE . ' u
		LEFT JOIN ' . WWH_TABLE . ' w
			ON u.user_id = w.id
		WHERE (u.user_type = ' . USER_IGNORE . '
				AND u.user_id != ' . ANONYMOUS . '
				AND u.user_lastvisit > ' . $timestamp_cleaning . '
				AND u.user_lastvisit > ' . $wwh_reset_time . ')
			OR (u.user_id = w.id)
		ORDER BY ';
	switch ($wwh_sort_by)
	{
		case '0':
			$sql = $pre_sql . 'u.username_clean ASC';
		break;

		case '1':
			$sql = $pre_sql . 'u.username_clean DESC';
		break;

		case '2':
			$sql = $pre_sql . 'CASE WHEN
				( u.user_type = ' . USER_IGNORE . '
					AND u.user_id != ' . ANONYMOUS . '
					AND u.user_lastvisit > ' . $timestamp_cleaning . '
					AND u.user_lastvisit > ' . $wwh_reset_time . ')
			THEN u.user_lastvisit
			ELSE w.last_page END ASC';
		break;

		case '3':
			$sql = $pre_sql . 'CASE WHEN
				( u.user_type = ' . USER_IGNORE . '
					AND u.user_id != ' . ANONYMOUS . '
					AND u.user_lastvisit > ' . $timestamp_cleaning . '
					AND u.user_lastvisit > ' . $wwh_reset_time . ')
			THEN u.user_lastvisit
			ELSE w.last_page END DESC';
		break;

		case '4':
			$sql = $pre_sql . 'u.user_id ASC';
		break;

		case '5':
			$sql = $pre_sql . 'u.user_id DESC';
		break;
	}

	// let's dump out the list of the users =)
	$who_was_here_record = $wwh_username_colour = $wwh_username = $wwh_username_full = $wwh_count_total = $wwh_count_reg = $wwh_count_hidden = $wwh_count_guests = $wwh_count_bot = $who_was_here_list = '';
	$result = $db->sql_query($sql);
	while ($row = $db->sql_fetchrow($result))
	{
		// colour them
		if ($row['user_type'] == USER_IGNORE)
		{
			$wwh_username = get_username_string('username', $row['user_id'], $row['username'], $row['user_colour'], $guest_username = false, $custom_profile_url = false);
			$wwh_username_colour = get_username_string('colour', $row['user_id'], $row['username'], $row['user_colour'], $guest_username = false, $custom_profile_url = false);
			$wwh_username_full = '<span style="color: ' . $wwh_username_colour . ';" class="username-coloured">' . $wwh_username . '</span>';
		}
		else
		{
			$wwh_username_full = get_username_string('full', $row['user_id'], $row['username'], $row['user_colour'], $guest_username = false, $custom_profile_url = false);
		}
		$hover_time = (($wwh_disp_time == '2') ? ' title="' . $user->lang['WHO_WAS_HERE_LATEST1'] . '&nbsp;' . $user->format_date((($row['user_type'] == USER_IGNORE) ? $row['user_lastvisit'] : $row['last_page']),'H:i') . $user->lang['WHO_WAS_HERE_LATEST2'] . '" ' : '' );
		$disp_time = (($wwh_disp_time == '1') ? '&nbsp;(' . $user->lang['WHO_WAS_HERE_LATEST1'] . '&nbsp;' . $user->format_date((($row['user_type'] == USER_IGNORE) ? $row['user_lastvisit'] : $row['last_page']),'H:i') . $user->lang['WHO_WAS_HERE_LATEST2'] . ')' : '' );
		//list the user / bot
		if (($row['user_allow_viewonline'] && $row['viewonline']) || ($row['user_type'] == USER_IGNORE))
		{
			if (($row['user_type'] == USER_IGNORE) && ($row['user_id'] != ANONYMOUS))
			{
				if ($wwh_disp_bots == '1')
				{
					$who_was_here_list .= (($who_was_here_list != '') ? ', ' : '') . '<span' . $hover_time . '>' . $wwh_username_full . '</span>' . $disp_time;
				}
			}
			else if ($row['user_id'] != ANONYMOUS)
			{
				$who_was_here_list .= (($who_was_here_list != '') ? ', ' : '') . '<span' . $hover_time . '>' . $wwh_username_full . '</span>' . $disp_time;
			}
		}
		else
		{
			if (($user->data['user_type'] == 3) || ($user->data['user_id'] == $row['user_id']) )
			{ // hidden users are seen by themselves and admin's in <em></em>
				$who_was_here_list .= (($who_was_here_list != '') ? ', ' : '') . '<em' . $hover_time . '>' .$wwh_username_full . '</em>' . $disp_time;
			}
		}
	// at the end let's count them =)
		if ($row['user_id'] == ANONYMOUS)
		{
			$wwh_count_guests = $wwh_count_guests + 1;
		}
		else if ($row['user_type'] == USER_IGNORE)
		{
			$wwh_count_bot = $wwh_count_bot + 1;
		}
		else if (($row['user_allow_viewonline'] == 1) && ($row['viewonline'] == 1))
		{
			$wwh_count_reg = $wwh_count_reg + 1;
		}
		else
		{
			$wwh_count_hidden = $wwh_count_hidden + 1;
		}
		$wwh_count_total = $wwh_count_total + 1;
	}//end while!

	if ($who_was_here_list == '')
	{
		$who_was_here_list = $user->lang['NO_ONLINE_USERS'];
	}

	if ($wwh_disp_bots == '0')
	{
		$wwh_count_total = $wwh_count_total - $wwh_count_bot;
	}
	if ($wwh_disp_guests == '0')
	{
		$wwh_count_total = $wwh_count_total - $wwh_count_guests;
	}
	// ok, now we saved the data, lets make the record
	if (($wwh_record == 1) && ( $config['wwh_record_ips'] < $wwh_count_total ))
	{
		set_config('wwh_record_ips', $wwh_count_total, true);
		set_config('wwh_record_time', time(), true);
	}

	// end of record, so we make the output
	$vars_online = array(
			'WHO_WAS_HERE'			=> array('wwh_count_total', 'l_t2_user_s'),
			'WHO_WAS_HERE_REG'		=> array('wwh_count_reg', 'l_r2_user_s'),
			'WHO_WAS_HERE_HIDDEN'	=> array('wwh_count_hidden', 'l_h2_user_s'),
			'WHO_WAS_HERE_BOTS'		=> array('wwh_count_bot', 'l_b2_user_s'),
			'WHO_WAS_HERE_GUEST'	=> array('wwh_count_guests', 'l_g2_user_s'),
	);
	foreach ($vars_online as $l_prefix => $var_ary)
	{
		switch (${$var_ary[0]})
		{
			case 0:
				${$var_ary[1]} = $user->lang[$l_prefix . '_USERS_ZERO_TOTAL'];
			break;

			case 1:
				${$var_ary[1]} = $user->lang[$l_prefix . '_USER_TOTAL'];
			break;

			default:
				${$var_ary[1]} = $user->lang[$l_prefix . '_USERS_TOTAL'];
			break;
		}
	}
	unset($vars_online);

	$who_was_here_list2 = sprintf($l_t2_user_s, $wwh_count_total);
	$who_was_here_list2 .= sprintf($l_r2_user_s, $wwh_count_reg);
	if (($wwh_disp_guests != 1) && ($wwh_disp_bots != 1))
	{
		$who_was_here_list2 .= $user->lang['WHO_WAS_HERE_WORD'];
	}
	else
	{
		$who_was_here_list2 .= ',';
	}
	$who_was_here_list2 .= sprintf($l_h2_user_s, $wwh_count_hidden);
	if (($wwh_disp_bots == 1) && ($wwh_disp_guests != 1))
	{
		$who_was_here_list2 .= $user->lang['WHO_WAS_HERE_WORD'];
		$who_was_here_list2 .= sprintf($l_b2_user_s, $wwh_count_bot);
	}
	else if (($wwh_disp_bots != 1) && ($wwh_disp_guests == 1))
	{
		$who_was_here_list2 .= $user->lang['WHO_WAS_HERE_WORD'];
		$who_was_here_list2 .= sprintf($l_g2_user_s, $wwh_count_guests);
	}
	else if (($wwh_disp_bots == 1) && ($wwh_disp_guests == 1))
	{
		$who_was_here_list2 .= ',';
		$who_was_here_list2 .= sprintf($l_b2_user_s, $wwh_count_bot);
		$who_was_here_list2 .= $user->lang['WHO_WAS_HERE_WORD'];
		$who_was_here_list2 .= sprintf($l_g2_user_s, $wwh_count_guests);
	}
	$who_was_here_list2 .= '.';

	if ($wwh_version == 1)
	{
		$who_was_here_explain = $user->lang['WHO_WAS_HERE_EXP'];
	}
	else
	{
		$time_hours = 0;
		$time_minutes = 0;
		$time_seconds = $wwh_del_time;
		while ($time_seconds >= 60)
		{
			$time_seconds = $time_seconds - 60;
			$time_minutes = $time_minutes + 1;
		}
		while ($time_minutes >= 60)
		{
			$time_minutes = $time_minutes - 60;
			$time_hours = $time_hours + 1;
		}
		$who_was_here_explain = $user->lang['WHO_WAS_HERE_EXP_TIME'];
		if ($time_hours != 1)
		{
			$who_was_here_explain .= sprintf($user->lang['WWH_HOURS'], $time_hours);
		}
		else
		{
			$who_was_here_explain .= sprintf($user->lang['WWH_HOUR'], $time_hours);
		}
		if ($time_minutes != 1)
		{
			$who_was_here_explain .= sprintf($user->lang['WWH_MINUTES'], $time_minutes);
		}
		else
		{
			$who_was_here_explain .= sprintf($user->lang['WWH_MINUTE'], $time_minutes);
		}
		if ($time_seconds != 1)
		{
			$who_was_here_explain .= sprintf($user->lang['WWH_SECONDS'], $time_seconds);
		}
		else
		{
			$who_was_here_explain .= sprintf($user->lang['WWH_SECOND'], $time_seconds);
		}
	}
	if ($wwh_record == 1)
	{
		$who_was_here_record = sprintf($user->lang['WHO_WAS_HERE_RECORD'], $config['wwh_record_ips'],$user->format_date($config['wwh_record_time'])) . '<br />';
	}
	$template->assign_vars(array(
			'WHO_WAS_HERE_LIST'		=> $user->lang['REGISTERED_USERS'] .' '. $who_was_here_list,
			'WHO_WAS_HERE_LIST2'	=> $who_was_here_list2,
			'WHO_WAS_HERE_RECORD'	=> $who_was_here_record,
			'WHO_WAS_HERE_EXP'		=> $who_was_here_explain,
	));
}
?>