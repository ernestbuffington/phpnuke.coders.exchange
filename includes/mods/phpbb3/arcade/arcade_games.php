<?php
/**
*
* @package arcade
* @version $Id: arcade_games.php 646 2008-12-09 19:30:30Z JRSweets $
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

make_arcade_jumpbox(append_sid("{$phpbb_root_path}arcade.$phpEx"), $cat_id);

$sort_key	= request_var('sk', (!empty($user->data['games_sort_order']) && !$arcade->config['override_user_sort']) ? $user->data['games_sort_order'] : $arcade->config['games_sort_order']);
$sort_dir	= request_var('sd', (!empty($user->data['games_sort_dir']) && !$arcade->config['override_user_sort']) ? $user->data['games_sort_dir'] : $arcade->config['games_sort_dir']);

$limit_days = array();
$sort_by_text = array('f' => $user->lang['ARCADE_GAMES_SORT_FIXED'], 'd' => $user->lang['ARCADE_GAMES_SORT_INSTALLDATE'], 'n' => $user->lang['ARCADE_GAMES_SORT_NAME'], 'p' => $user->lang['ARCADE_GAMES_SORT_PLAYS'], 'r' => $user->lang['ARCADE_GAMES_SORT_RATING']);
$sort_by_sql = array('f' => 'game_order', 'd' => 'game_installdate', 'n' => 'game_name_clean', 'p' => 'game_plays', 'r' => 'game_votesum / game_votetotal');

$s_limit_days = $s_sort_key = $s_sort_dir = $u_sort_param = '';
gen_sort_selects($limit_days, $sort_by_text, $sort_days, $sort_key, $sort_dir, $s_limit_days, $s_sort_key, $s_sort_dir, $u_sort_param);

$sql_sort = $sort_by_sql[$sort_key] . ' ' . (($sort_dir == 'd') ? 'DESC' : 'ASC');

$sql_array = array(
	'SELECT'	=> 'g.*, u.username, u.user_colour, u.user_id, s.score, s.score_date, c.cat_name, c.cat_download, c.cat_cost, c.cat_reward, c.cat_use_jackpot',

	'FROM'		=> array(
		ARCADE_GAMES_TABLE	=> 'g',
	),

	'LEFT_JOIN'	=> array(
		array(
			'FROM'	=> array(PHPBB3_USERS_TABLE => 'u'),
			'ON'	=> 'g.game_highuser = u.user_id'
		),
		array(
			'FROM'	=> array(ARCADE_SCORES_TABLE => 's'),
			'ON'	=> 's.game_id = g.game_id AND s.user_id = ' . $user->data['user_id']
		),
		array(
			'FROM'	=> array(ARCADE_CATS_TABLE => 'c'),
			'ON'	=> 'g.cat_id = c.cat_id'
		),
	),

	'ORDER_BY'	=> $sql_sort,
);
// END building the query need for this page
$games_per_page = $arcade->config['games_per_page'];

switch($mode)
{
	// Setup to display all the users favorite games
	case 'fav':
		if (!empty($user->data['games_per_page']))
		{
			$games_per_page = $user->data['games_per_page'];
		}

		// Set the link to the main statistics page in the nav
		$template->assign_var('S_IN_FAV', true);
		$total_games = $arcade->get_total('fav', $user->data['user_id']);
		if (!$total_games)
		{
			trigger_error('ARCADE_NO_GAME_FAVS');
		}

		$cat_id = ARCADE_FAV_ID;
		$sql_array['LEFT_JOIN'][] = array('FROM' => array(ARCADE_FAVS_TABLE => 'f'),	'ON' => 'f.game_id = g.game_id AND f.user_id = ' . $user->data['user_id']);
		$sql_array['WHERE'] = 'f.game_id = g.game_id
			AND ' . $db->sql_in_set('g.cat_id', $arcade->get_permissions('c_view'), false, true);
		$pagination_mode = 'mode=fav';
		$page_title = $user->lang['ARCADE_FAV'];
	break;

	// Setup to display search results
	case 'search':
		if (!empty($user->data['games_per_page']))
		{
			$games_per_page = $user->data['games_per_page'];
		}

		// Set the link to the main statistics page in the nav
		$template->assign_var('S_IN_SEARCH', true);
		$cat_id = ARCADE_SEARCH_ID;
		
		if ($search_id == 'newgames')
		{
			$template->assign_var('S_IN_SEARCH_NEW_GAMES', true);
			$new_games_delay = (time() - ($arcade->config['new_games_delay'] * 86400));
			$total_games = $arcade->get_total('search_newgames', $new_games_delay);
			if (!$total_games)
			{
				trigger_error('ARCADE_SEARCH_NO_MATCHES');
			}

			$user->add_lang('search');

			$sql_array['WHERE'] = 'g.game_installdate >= ' . $new_games_delay . '
											AND ' . $db->sql_in_set('g.cat_id', $arcade->get_permissions('c_view'), false, true);
			$pagination_mode = 'mode=search&amp;search_id=newgames';
			$page_title =  sprintf($user->lang['ARCADE_SEARCH_RESULTS_FOR'], strtolower($user->lang['ARCADE_SEARCH_NEW_GAMES']));
			$search_matches = ( $total_games == 1 ) ? sprintf($user->lang['FOUND_SEARCH_MATCH'], $arcade->number_format($total_games)) : sprintf($user->lang['FOUND_SEARCH_MATCHES'], $arcade->number_format($total_games));		
		
		}
		else
		{
			$searchterm = "*". strtolower($term) . "*";
			if ($searchterm != "**")
			{
				// replace wildcards
				$searchterm = str_replace("*", $db->any_char , $searchterm);
				$searchterm = str_replace("?", $db->one_char , $searchterm);
			}

			$total_games = $arcade->get_total('search', $searchterm);
			if (!$total_games)
			{
				trigger_error('ARCADE_SEARCH_NO_MATCHES');
			}

			$user->add_lang('search');

			$sql_array['WHERE'] = '(g.game_name_clean ' . $db->sql_like_expression($searchterm) . '
				OR LOWER(g.game_desc) ' . $db->sql_like_expression($searchterm) . ')
				AND ' . $db->sql_in_set('g.cat_id', $arcade->get_permissions('c_view'), false, true);
			$pagination_mode = 'mode=search&amp;term=' . $term;
			$page_title =  sprintf($user->lang['ARCADE_SEARCH_RESULTS_FOR'], $term);
			$search_matches = ( $total_games == 1 ) ? sprintf($user->lang['FOUND_SEARCH_MATCH'], $arcade->number_format($total_games)) : sprintf($user->lang['FOUND_SEARCH_MATCHES'], $arcade->number_format($total_games));
		}
		
		$template->assign_vars(array(
			'S_FOUND_RESULTS' 	=> true,
			'SEARCH_TERM'		=> ($search_id == 'newgames') ? $user->lang['ARCADE_SEARCH_NEW_GAMES'] : $term,
			'SEARCH_MATCHES' 	=> $search_matches)
		);
	break;

	// Setup to display games inside specific category
	case 'cat':		
		$cat_data = $arcade->cats[$cat_id];

		if (!$cat_data)
		{
			trigger_error('NO_CAT_ID');
		}

		// Permissions check
		if (!$auth_arcade->acl_gets('c_list', 'c_view', $cat_id) || ($cat_data['cat_type'] == ARCADE_LINK && $cat_data['cat_link'] && !$auth_arcade->acl_get('c_view', $cat_id)))
		{
			if ($user->data['user_id'] != ANONYMOUS)
			{
				trigger_error('NO_PERMISSION_ARCADE_VIEW');
			}

			login_box('', $user->lang['LOGIN_VIEWARCADE']);
		}


		if (!empty($cat_data['cat_games_per_page']))
		{
			$games_per_page = $cat_data['cat_games_per_page'];
		}

		if (!empty($user->data['games_per_page']))
		{
			$games_per_page = $user->data['games_per_page'];
		}


		// Hopefully this will work to change the style for that category,
		// if the category has a different style.
		// $cat_data['cat_sytle'] will equal 0 if default style is used and equal the style id if another style is chosen
		if ($cat_data['cat_style'] && ($user->data['user_style'] != $cat_data['cat_style']))
		{
			$user->setup('', $cat_data['cat_style']);
		}

		// Is this forum a link? ... User got here either because the
		// number of clicks is being tracked or they guessed the id
		if ($cat_data['cat_type'] == ARCADE_LINK && $cat_data['cat_link'])
		{
			// Does it have click tracking enabled?
			if ($cat_data['cat_flags'] & ARCADE_FLAG_LINK_TRACK)
			{
				$sql = 'UPDATE ' . ARCADE_CATS_TABLE . '
					SET cat_plays = cat_plays + 1
					WHERE cat_id = ' . $cat_id;
				$db->sql_query($sql);
			}
			$cache->destroy('sql', ARCADE_CATS_TABLE);

			redirect($cat_data['cat_link']);
		}

		// Forum is passworded ... check whether access has been granted to this
		// user this session, if not show login box
		if ($cat_data['cat_password'])
		{
			login_arcade_box($cat_data);
		}

		// Build navigation links
		generate_arcade_nav($cat_data);
		if ($auth_arcade->acl_get('c_view', $cat_id))
		{
			generate_cat_rules($cat_data);
		}
		display_arcade($cat_data);
		gen_arcade_auth_level($cat_id, $cat_data['cat_status']);

		$sql_array['WHERE'] = 'g.cat_id = ' . (int) $cat_id;
		$pagination_mode = 'mode=cat&amp;c=' . (int) $cat_id;
		$page_title = $cat_data['cat_name'];

		// This is needed to determine where we are
		// when we are done playing a game and want
		// to return the same category page we were on
		$found_game = false;
		if ($game_id)
		{
			$sql = $db->sql_build_query('SELECT', $sql_array);
			$result = $db->sql_query($sql);
			$row = $db->sql_fetchrowset($result);
			$db->sql_freeresult($result);

			$total_games = sizeof($row);
			$prev_games = 0;
			foreach ($row as $game)
			{
				if ($game['game_id'] == $game_id)
				{
					$found_game = true;
					break;
				}
				$prev_games++;
			}

			if ($found_game)
			{
				$start = floor(($prev_games) / $games_per_page) * $games_per_page;
			}
		}

		if (!$game_id || !$found_game)
		{
			$total_games = $arcade->get_total('games', $cat_id);
		}

	break;

	default:
	break;

}

// Get the favorite games data for the current user...
$game_fav_data = $arcade->get_fav_data();

if ($start >= $total_games)
{
	$start = $total_games - $games_per_page;
}
$start = ($start < 0) ? 0 : $start;

display_arcade_header($arcade->config['welcome_cats'], $arcade->config['search_cats'], $arcade->config['links_cats']);
display_arcade_online();

// Output page
page_header($user->lang['ARCADE'] . ' - ' . $page_title, false);

$template->set_filenames(array(
	'body' => 'arcade/arcade_index_body.html')
);

// Not category with games
if (isset($cat_data) && $cat_data['cat_type'] != ARCADE_CAT_GAMES)
{
	page_footer();
}

// Ok, if someone has only list-access, we only display the forum list.
// We also make this circumstance available to the template in case we want to display a notice. ;)
if (!$auth_arcade->acl_get('c_view', $cat_id) && $cat_id != ARCADE_FAV_ID && $cat_id != ARCADE_SEARCH_ID)
{
	$template->assign_vars(array(
		'S_NO_LIST_ACCESS'		=> true,
		'S_AUTOLOGIN_ENABLED'	=> ($config['allow_autologin']) ? true : false,
	));

	page_footer();
}

$template->assign_vars(array(
	'S_IN_GAMES'			=> (isset($cat_data['cat_type']) && $cat_data['cat_type'] == ARCADE_CAT_GAMES) ? true : false,
	'S_SELECT_SORT_DIR'		=> $s_sort_dir,
	'S_SELECT_SORT_KEY'		=> $s_sort_key,

	'S_ARCADE_ACTION'		=> append_sid("{$phpbb_root_path}arcade.$phpEx", "mode=cat&amp;c=$cat_id&amp;start=$start"),
	)
);

if ($total_games)
{
	$sql = $db->sql_build_query('SELECT', $sql_array);
	$result = $db->sql_query_limit($sql, $games_per_page, $start);

	// Display the need games...
	if ($row = $db->sql_fetchrow($result))
	{
		do
		{
			$avg_score = ($row['game_votetotal'] == 0) ? 0 : round($row['game_votesum'] / $row['game_votetotal'], 2);
			$game_width = $game_height = 0;
			$arcade->set_game_size($game_width, $game_height, $row['game_width'], $row['game_height'], $row['game_swf']);
			
			$gamesrow = array(
				'S_CAN_REPORT'			=> ($auth_arcade->acl_get('c_report', $row['cat_id'])) ? true : false,
				'S_CAN_DOWNLOAD'		=> ($row['cat_download'] && $row['game_download'] && $auth_arcade->acl_get('c_download', $row['cat_id'])) ? true : false,
				'S_GAME_PLAY'			=> ($auth_arcade->acl_get('c_play', $row['cat_id'])) ? true : false,
				'S_GAME_PLAY_POPUP' 	=> ($user->data['is_registered'] && $auth_arcade->acl_get('c_popup', $row['cat_id'])) ? true : false,
				'S_GAME_HIGHSCORE' 		=> ($row['game_highdate'] != 0) ? true : false,
				'S_GAME_SCORE' 			=> ($row['score'] != '') ? true : false,
				'S_USE_HIGHSCORES'		=> ($row['game_type'] == NOSCORE_GAME) ? false : true,

				'CAT_ID'				=> $row['cat_id'],
				'CAT_NAME'				=> $row['cat_name'],
				'U_CAT'					=> append_sid("{$phpbb_root_path}arcade.$phpEx", "mode=cat&amp;c={$row['cat_id']}"),

				'GAME_ID'				=> $row['game_id'],
				'GAME_NAME'				=> $row['game_name'],
				'GAME_DESC'				=> censor_text(nl2br($row['game_desc'])),
				'GAME_IMAGE'			=> ($row['game_image']) ? $phpbb_root_path . "arcade.$phpEx?img=" . $row['game_image'] : '',
				'GAME_PLAYS' 			=> ($row['game_plays']) ? sprintf($user->lang['ARCADE_TIMES_PLAYED'], $arcade->number_format($row['game_plays'])) : false,
				'GAME_FILESIZE'			=> ($row['game_filesize'] > 0 ) ? get_formatted_filesize($row['game_filesize']) : get_formatted_filesize($arcade->set_filesize($row['game_id'])),
				'GAME_DOWNLOAD'			=> ($row['game_download_total']) ? sprintf($user->lang['ARCADE_TIMES_DOWNLOADED'], $arcade->number_format($row['game_download_total'])) : false,
				'GAME_SCOREVAR'			=> $row['game_scorevar'],
				'GAME_WIDTH'			=> $game_width,
				'GAME_HEIGHT'			=> $game_height,

				'U_GAME_PLAY'			=> append_sid("{$phpbb_root_path}arcade.$phpEx", "mode=play&amp;g={$row['game_id']}"),
				'U_GAME_PLAY_POPUP'		=> append_sid("{$phpbb_root_path}arcade.$phpEx", "mode=popup&amp;g={$row['game_id']}"),
				'U_GAME_DOWNLOAD'		=> append_sid("{$phpbb_root_path}arcade.$phpEx", "mode=download&amp;g={$row['game_id']}"),
				'U_GAME_HIGHSCORES'		=> append_sid("{$phpbb_root_path}arcade.$phpEx", "mode=stats&amp;g={$row['game_id']}"),
				'U_GAME_REPORT'			=> append_sid("{$phpbb_root_path}arcade.$phpEx", "mode=report&amp;g={$row['game_id']}"),

				'GAME_RATING_IMG' 		=> $arcade->set_rating_image($row['game_votetotal'], $row['game_votesum'], $avg_score),
				'GAME_FAV_IMG' 			=> $arcade->set_fav_image($game_fav_data, $row['game_id'], $cat_id),

				'GAME_HIGHSCORE' 		=> $arcade->number_format($row['game_highscore']),
				'GAME_HIGHUSER' 		=> ($row['game_highuser']) ? $arcade->get_username_string('full', $row['game_highuser'], $row['username'], $row['user_colour']) : '',
				'GAME_HIGHDATE' 		=> $user->format_date($row['game_highdate']),

				'PERSONAL_HIGHSCORE' 	=> $arcade->number_format($row['score']),
				'PERSONAL_HIGHDATE' 	=> $user->format_date($row['score_date']),
				'GAME_IMAGE_FIRST' 		=> ($row['game_highuser'] == $user->data['user_id'] ) ? $arcade->config['image_path'] . '1st.gif' : '' ,
			);

			if ($arcade->points['show'])
			{
				$game_cost = $arcade->get_cost($row);
				$game_reward = $arcade->get_reward($row);

				$gamesrow = array_merge($gamesrow, array(
					'S_SHOW_POINTS'		=> ($arcade->points['show']) ? true : false,
					'S_USE_JACKPOT'		=> ($arcade->use_jackpot($row)) ? true : false,
					
					'GAME_COST'			=> ($game_cost == ARCADE_FREE) ? $user->lang['ARCADE_FREE'] : $arcade->number_format($game_cost) . ' ' . $arcade->points['name'],
					'GAME_REWARD'		=> ($game_reward == ARCADE_FREE) ? $user->lang['ARCADE_NONE'] : $arcade->number_format($game_reward) . ' ' . $arcade->points['name'],
				));
			}

			$template->assign_block_vars('games', $gamesrow);
		}
		while ($row = $db->sql_fetchrow($result));
	}
	$db->sql_freeresult($result);

	$pagination_mode = $pagination_mode . '&amp;' . $u_sort_param;
	if ($total_games == 1)
	{
		$l_total_games = $total_games . ' ' . $user->lang['ARCADE_GAME'];
	}
	else if ($total_games > 1)
	{
		$l_total_games = $total_games . ' ' . $user->lang['ARCADE_GAMES'];
	}
	else
	{
		$l_total_games = false;
	}

	$template->assign_vars(array(
		'PAGE_NUMBER'	=> ($games_per_page > 0) ? on_page($total_games, $games_per_page, $start) : on_page($total_games, $total_games, $start),
		'TOTAL_GAMES'	=> $l_total_games,
		'PAGINATION'	=> ($games_per_page > 0) ? generate_pagination(append_sid("{$phpbb_root_path}arcade.$phpEx", $pagination_mode), $total_games, $games_per_page, $start) : false,
		)
	);
}

// Assign index specific vars
$template->assign_vars(array(
	'CAT_IMG'				=> $user->img('forum_read', 'NO_NEW_GAMES'),
	'CAT_NEW_IMG'			=> $user->img('forum_unread', 'NEW_GAMES'),
	'CAT_LOCKED_IMG'		=> $user->img('forum_read_locked', 'NEW_GAMES_LOCKED'),
	'CAT_NEW_LOCKED_IMG'	=> $user->img('forum_unread_locked', 'NO_NEW_GAMES_LOCKED'),

	'S_DISPLAY_AUTH_INFO'	=> ($mode == 'cat' && $cat_data['cat_type'] == ARCADE_CAT_GAMES && ($auth_arcade->acl_get('c_play', $cat_id) || $user->data['user_id'] == ANONYMOUS)) ? true : false,
	'S_LOGIN_ACTION'		=> append_sid("{$phpbb_root_path}ucp.$phpEx", "mode=login&amp;redirect=arcade.$phpEx"),
	)
);

page_footer();

?>
