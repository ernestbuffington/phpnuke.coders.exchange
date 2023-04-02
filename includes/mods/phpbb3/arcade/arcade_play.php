<?php
/**
*
* @package arcade
* @version $Id: arcade_play.php 654 2008-12-10 18:41:53Z JRSweets $
* @copyright (c) 2008 http://www.JeffRusso.net
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

$phpbb_root_path = PHPBB3_ROOT_DIR;

// Grab the data for game and navlinks
$sql_array = array(
	'SELECT'	=> 'g.game_id, g.game_name, g.game_desc, g.game_swf, g.game_width, g.game_height, g.game_scorevar, g.game_scoretype, g.game_type, game_download, g.game_filesize, g.game_cost, g.game_reward, g.game_jackpot, g.game_use_jackpot, c.*',

	'FROM'		=> array(
		ARCADE_GAMES_TABLE	=> 'g',
	),

	'LEFT_JOIN'	=> array(
		array(
			'FROM'	=> array(ARCADE_CATS_TABLE => 'c'),
			'ON'	=> 'g.cat_id = c.cat_id'
		),
	),

	'WHERE'		=> 'g.game_id = ' . $game_id,
);

// This is only needed if we are playing in a popup
$popup = false;
if ($mode == 'popup')
{
	$popup = true;
	$sql_array['SELECT'] .= ', g.game_highscore, u.username';
	$sql_array['LEFT_JOIN'][] = array('FROM' => array(USERS_TABLE => 'u'),	'ON' => 'g.game_highuser = u.user_id');
}

$sql = $db->sql_build_query('SELECT', $sql_array);

$result = $db->sql_query($sql);
$row = $db->sql_fetchrow($result);
$db->sql_freeresult($result);

if (!$row || !$auth_arcade->acl_get('c_list', $row['cat_id']))
{
	trigger_error('NO_GAME_ID');
}

if (!$auth_arcade->acl_get('c_play', $row['cat_id']))
{
	trigger_error('NO_PERMISSION_ARCADE_PLAY');
}

if ($row['cat_status'] == ITEM_LOCKED)
{
	trigger_error('ARCADE_CAT_LOCKED_ERROR');
}

// Check if the limt play is set in ACP
$arcade->limit_play($row['cat_id']);
$page_title = $user->lang['ARCADE'] . ' - ' . $row['cat_name'] . ' - ' . $row['game_name'];

$arcade_session = $arcade->create_session($game_id, $row['game_type']);
// We will set this cookie to let the arcade know that the user is playing the game
// in a popup window and not on fullscreen.  It will later be checked in arcade_score.php
$arcade->set_cookie($game_id, $arcade_session['game_sid'], $popup);

if ($row['cat_style'] && ($user->data['user_style'] != $row['cat_style']))
{
	$user->setup('', $row['cat_style']);
}

// Category is passworded ... check whether access has been granted to this
// user this session, if not show login box before playing the game
if ($row['cat_password'])
{
	login_arcade_box($row);
}

// Increase play count for games that do not submit scores
if ($row['game_type'] == NOSCORE_GAME)
{
	$sql = 'UPDATE ' . ARCADE_GAMES_TABLE . "
		SET game_plays = game_plays + 1
		WHERE game_id = '$game_id'";
	$db->sql_query($sql);
	$cache->destroy('sql', ARCADE_GAMES_TABLE);
}

generate_arcade_nav($row, true);
if ($arcade->points['show'])
{
	$game_cost = $arcade->get_cost($row);
	$game_reward = $arcade->get_reward($row);

	if (!$auth_arcade->acl_get('c_playfree', $row['cat_id']) && $game_cost != ARCADE_FREE)
	{
		if (!$arcade->set_points('subtract', $user->data['user_id'], $game_cost))
		{
			trigger_error(sprintf($user->lang['ARCADE_NO_POINTS'], $arcade->points['name']));
		}
		
		// The jackpot is only increased if the user actually contributed something to play
		if ($arcade->use_jackpot($row))
		{
			$game_reward = $arcade->set_jackpot('add', $row);
		}
	}
}

$game_width = $game_height = 0;
$arcade->set_game_size($game_width, $game_height, $row['game_width'], $row['game_height'], $row['game_swf']);
$game_file = $file_functions->remove_extension($row['game_swf']);
$game_swf = ($arcade->get_protection($row['game_type'])) ? $phpbb_root_path . "arcade.$phpEx?swf=" . $game_file : $arcade->set_path($row['game_swf']);

switch($mode)
{
	case 'play':
		display_arcade_online();
		$score_order = ($row['game_scoretype'] == SCORETYPE_HIGH) ? 'DESC' : 'ASC';
		$game_fav_data = (!isset($game_fav_data)) ? $arcade->get_fav_data() : $game_fav_data;
		$s_resolution_select = ($arcade->config['resolution_select'] && $auth_arcade->acl_get('c_resolution', $row['cat_id'])) ? true : false;
		
		$template->assign_vars(array(
			'L_ARCADE_FLASH_VERSION'	=> sprintf($user->lang['ARCADE_FLASH_VERSION'], $arcade->config['flash_version']),
			
			'S_RESOLUTION_SELECT'		=> $s_resolution_select,
			'S_PLAY_FULL' 				=> true,
			'S_GAME_DOWNLOAD' 			=> ($row['cat_download'] && $row['game_download'] && $auth_arcade->acl_get('c_download', $row['cat_id'])) ? true : false,
			'S_CAN_REPORT'	 			=> ($auth_arcade->acl_get('c_report', $row['cat_id'])) ? true : false,
			'S_IS_IBPROV3'				=> ($row['game_type'] == IBPROV3_GAME) ? true : false,
			'S_DISPLAY_DESC'			=> $arcade->config['display_desc'],
			'S_USE_HIGHSCORES'			=> ($row['game_type'] == NOSCORE_GAME) ? false : true,

			'U_GAME_DOWNLOAD'			=> append_sid("{$phpbb_root_path}arcade.$phpEx", "mode=download&amp;g={$row['game_id']}"),
			'U_GAME_REPORT'				=> append_sid("{$phpbb_root_path}arcade.$phpEx", "mode=report&amp;g={$row['game_id']}"),

			'FLASH_VERSION'				=> $arcade->config['flash_version'],
			'GAME_ID' 					=> $row['game_id'],
			'GAME_GID_ENCODED'			=> $arcade_session['gidencoded'],
			'GAME_NAME' 				=> $row['game_name'],
			'GAME_DESC'					=> censor_text(nl2br($row['game_desc'])),
			'GAME_SWF' 					=> $game_swf,
			'GAME_SCOREVAR' 			=> $row['game_scorevar'],
			'GAME_FILESIZE'				=> ($row['game_filesize'] > 0 ) ? sprintf($user->lang['ARCADE_GAMES_FILESIZE'], get_formatted_filesize($row['game_filesize'])) : sprintf($user->lang['ARCADE_GAMES_FILESIZE'], get_formatted_filesize($arcade->set_filesize($row['game_id']))),
			'GAME_SID'					=> $arcade_session['game_sid'],
			'GAME_WIDTH' 				=> $game_width,
			'GAME_HEIGHT' 				=> $game_height,
			'GAME_FAV_IMG'				=> $arcade->set_fav_image($game_fav_data, $row['game_id'], ARCADE_PLAY_ID),
		));
		
		if ($arcade->points['show'])
		{
			$template->assign_vars(array(
				'S_SHOW_POINTS'		=> true,
				'S_USE_JACKPOT'		=> ($arcade->use_jackpot($row)) ? true : false,

				'USER_POINTS'		=> $arcade->number_format($arcade->points['total']) . ' ' . $arcade->points['name'],
				'POINTS_NAME'		=> $arcade->points['name'],
				'GAME_COST'			=> ($game_cost == ARCADE_FREE) ? $user->lang['ARCADE_FREE'] : $arcade->number_format($game_cost) . ' ' . $arcade->points['name'],
				'GAME_REWARD'		=> ($game_reward == ARCADE_FREE) ? $user->lang['ARCADE_NONE'] : $arcade->number_format($game_reward) . ' ' . $arcade->points['name'],
				)
			);
		}

		$sql_array = array(
			'SELECT'	=> 's.* , u.username, u.user_id, u.user_colour, u.user_avatar_type, u.user_avatar, u.user_avatar_width, u.user_avatar_height',

			'FROM'		=> array(
				ARCADE_SCORES_TABLE	=> 's',
			),

			'LEFT_JOIN'	=> array(
				array(
					'FROM'	=> array(USERS_TABLE => 'u'),
					'ON'	=> 's.user_id = u.user_id'
				),
			),

			'WHERE'		=> 's.game_id = ' . $game_id,

			'ORDER_BY'	=> 's.score ' . $score_order . ', s.score_date ASC',
		);

		$sql = $db->sql_build_query('SELECT', $sql_array);
		$result = $db->sql_query($sql);
		$score_data = $db->sql_fetchrowset($result);
		$db->sql_freeresult($result);

		if (!empty($score_data))
		{
			$position = $actual_position = $lastscore = 0;
			foreach ($score_data as $row)
			{
				$actual_position++ ;
				if ($user->data['user_id'] != $row['user_id'] && $actual_position > $arcade->config['game_scores'])
				{
					continue;
				}

				if ($actual_position == 1)
				{
					$user_avatar_type = $row['user_avatar_type'];
					$user_avatar = $row['user_avatar'];
					$user_avatar_width = $row['user_avatar_width'];
					$user_avatar_height = $row['user_avatar_height'];
					$best_user = $row['username'];
					$best_user_colour= $row['user_colour'];
					$best_user_id = $row['user_id'];
					$best_date = $user->format_date($row['score_date']);
					$best_played = $arcade->number_format($row['total_plays']);
					$best_time = $arcade->time_format($row['total_time']);
					$best_score = $arcade->number_format($row['score']);
					$best_comment = censor_text($row['comment_text']);

					if ($best_comment != '')
					{
						$best_comment = generate_text_for_display($best_comment, $row['comment_uid'], $row['comment_bitfield'], $row['comment_options']);
					}
				}

				if ($lastscore != $row['score'])
				{
					$position = $actual_position;
				}
				$lastscore = $row['score'];

				$template->assign_block_vars('scorerow', array(
					'POS' 		=> $position,
					'USER_ID'	=> $row['user_id'],
					'USERNAME' 	=> $arcade->get_username_string('full', $row['user_id'], $row['username'], $row['user_colour']),
					'SCORE' 	=> $arcade->number_format($row['score']))
				);

				if ($user->data['user_id'] == $row['user_id'] && $actual_position > $arcade->config['game_scores'])
				{
					break;
				}
			}

			$avatar = ($user->optionget('viewavatars')) ? get_user_avatar($user_avatar, $user_avatar_type, $user_avatar_width, $user_avatar_height) : '';
			$best_user_link = $arcade->get_username_string('full', $best_user_id, $best_user, $best_user_colour);

			$template->assign_vars(array(
				'S_USER_ID'				=> $user->data['user_id'],
				'BEST_USER_NAME' 		=> $best_user_link,
				'BEST_COMMENT' 			=> $best_comment,
				'BEST_PLAYED' 			=> $best_played,
				'BEST_TIME' 			=> $best_time,
				'BEST_SCORE' 			=> $best_score,
				'BEST_DATE_EXPLAIN' 	=> sprintf($user->lang['ARCADE_BEST_DATE_EXPLAIN'], $best_date),
				'FIRST_AVATAR'			=> $avatar
			));
		}
	break;

	case 'popup':
		if (!$auth_arcade->acl_get('c_popup', $row['cat_id']))
		{
			trigger_error('NO_PERMISSION_ARCADE_PLAY_POPUP');
		}

		$template->assign_vars(array(
			'L_ARCADE_FLASH_VERSION'		=> sprintf($user->lang['ARCADE_FLASH_VERSION'], $arcade->config['flash_version']),

			'S_PLAY_POPUP'			=> true,
			'S_IS_IBPROV3'			=> ($row['game_type'] == IBPROV3_GAME) ? true : false,
			'S_USE_HIGHSCORES'		=> ($row['game_type'] == NOSCORE_GAME) ? false : true,

			'FLASH_VERSION'			=> $arcade->config['flash_version'],

			'GAME_WIDTH' 			=> $game_width,
			'GAME_HEIGHT' 			=> $game_height,
			'GAME_NAME'				=> $row['game_name'],
			'GAME_GID_ENCODED'		=> $arcade_session['gidencoded'],
			'GAME_SWF' 				=> $game_swf,
			'GAME_SCOREVAR' 		=> $row['game_scorevar'],
			'GAME_SID'				=> $arcade_session['game_sid'],
			'POPUP_TITLE'			=> ($row['username'] != '') ? sprintf($user->lang['ARCADE_POPUP_HIGHUSER'], $row['game_name'], $arcade->number_format($row['game_highscore']), $row['username']) : sprintf($user->lang['ARCADE_POP_NO_HIGHSCORE'], $row['game_name']),
		));
	break;

	default:
	break;
}

page_header($page_title, false);

$template->set_filenames(array(
	'body' => 'arcade/arcade_play_body.html')
);

page_footer();

?>
