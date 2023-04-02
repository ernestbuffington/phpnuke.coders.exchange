<?php
/**
*
* @package arcade
* @version $Id: arcade_score.php 645 2008-12-09 15:41:25Z JRSweets $
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

// If you are not logged in the score is never saved...
// Lets show you a nice message and send you on your way.
if (!$user->data['is_registered'])
{
	// Remove cookies
	$arcade->set_cookie();
	$total_games = $arcade->get_total('games');
	$message =  sprintf($user->lang['ARCADE_REGISTER_MESSAGE_SCORE'], $total_games, '<a href="' . append_sid("{$phpbb_root_path}ucp.$phpEx", "mode=register") . '">', '</a>');
	trigger_error($message);
}

// This handles the data from the screen you see immediately after playing a game.
// The handling of the comments and ratings are done here.
if (isset($mode) && $mode == 'score' && $game_id)
{
	if (!check_form_key('arcade_score'))
	{
		trigger_error('FORM_INVALID');
	}

	$cat_id = $arcade->get_game_field($game_id, 'cat_id', 'all');	
	if (!$auth_arcade->acl_get('c_score', $cat_id))
	{
		// Remove cookies
		$arcade->set_cookie();
		trigger_error('NO_PERMISSION_ARCADE_SCORE');
	}

	if ($auth_arcade->acl_get('c_rate', $cat_id))
	{
		// This will check whether the user has already voted.
		// You should only be able to vote once but you will be
		// allowed to change your vote...

		$sql_array = array(
			'SELECT'	=> 'g.game_votetotal, g.game_votesum, r.*',

			'FROM'		=> array(
				ARCADE_GAMES_TABLE	=> 'g',
			),

			'LEFT_JOIN'	=> array(
				array(
					'FROM'	=> array(ARCADE_RATING_TABLE => 'r'),
					'ON'	=> 'g.game_id = r.game_id'
				),
			),

			'WHERE'		=> 'g.game_id = ' . $game_id . '
					AND r.user_id = ' . $user->data['user_id'],
		);

		$sql = $db->sql_build_query('SELECT', $sql_array);

		$result = $db->sql_query($sql);
		$row = $db->sql_fetchrow($result);
		$db->sql_freeresult($result);

		$already_rated = ($row['game_rating'] == '') ? false : true;
		$rating = request_var('game_rating', 0);

		// Lets do the game ratings...
		if ($rating != 0 && !$already_rated)
		{
			$sql_ary = array(
				'game_id'				=> $game_id,
				'user_id'				=> $user->data['user_id'],
				'game_rating'			=> $rating,
				'rating_date'			=> time(),
				'user_ip'				=> $user->ip,
			);

			$sql = 'INSERT INTO ' . ARCADE_RATING_TABLE . ' ' . $db->sql_build_array('INSERT', $sql_ary);
			$db->sql_query($sql);

			$sql = 'UPDATE ' . ARCADE_GAMES_TABLE . '
					SET game_votetotal = game_votetotal + 1,
						game_votesum = game_votesum + ' . (int) $rating . '
					WHERE game_id = ' . (int) $game_id;
			$db->sql_query($sql);
		}
		else if ($rating != 0 && $already_rated)
		{
			$sql_ary = array(
				'game_rating'	=> (int) $rating,
				'rating_date'	=> time(),
				'user_ip'		=> $user->ip
			);

			$sql = 'UPDATE ' . ARCADE_RATING_TABLE . '
					SET ' . $db->sql_build_array('UPDATE', $sql_ary) . '
					WHERE game_id = ' . (int) $game_id . '
						AND user_id = ' . $user->data['user_id'];
			$db->sql_query($sql);

			// This will sync back up the totals in the games table
			// This is done if the user changes a current rating...
			$arcade->sync('rating', $game_id);
		}
	}

	if ($auth_arcade->acl_get('c_comment', $cat_id))
	{
		$comment_data = array(
			'comment_text' 			=> utf8_normalize_nfc(request_var('message', '', true)),
			'comment_bitfield'		=> '',
			'comment_options'		=> 7,
			'comment_uid'			=> '',
		);

		generate_text_for_storage($comment_data['comment_text'], $comment_data['comment_uid'], $comment_data['comment_bitfield'], $comment_data['comment_options'], $arcade->config['parse_bbcode'], $arcade->config['parse_links'], $arcade->config['parse_smilies']);

		$sql = 'UPDATE ' . ARCADE_SCORES_TABLE . '
			SET ' . $db->sql_build_array('UPDATE', $comment_data) . '
			WHERE user_id = ' . $user->data['user_id'] . '
			AND game_id = ' . (int) $game_id;
		$db->sql_query($sql);
	}

	// Everything is all set so lets display the finised screen...
	redirect(append_sid("{$phpbb_root_path}arcade.$phpEx", "mode=done&amp;g={$game_id}"));
}
// This displays the messages and links that are shown after
// the comments and ratings have been selected.
else if (isset($mode) && $mode == 'done' && $game_id)
{
	// Retrieves all the information for the game in question...
	$game_info = $arcade->get_game_data($game_id);
	if (!$auth_arcade->acl_get('c_score', $game_info['cat_id']))
	{
		// Remove cookies
		$arcade->set_cookie();
		trigger_error('NO_PERMISSION_ARCADE_SCORE');
	}
	generate_arcade_nav($game_info, true);

	$arcade_url = append_sid("{$phpbb_root_path}arcade.$phpEx");
	$cat_url = append_sid("{$phpbb_root_path}arcade.$phpEx", "mode=cat&c={$game_info['cat_id']}&g={$game_id}#g$game_id");
	if (isset($_COOKIE[$arcade->cookie_popup]) && $_COOKIE[$arcade->cookie_popup] == true)
	{
		$template->assign_var('S_USE_SIMPLE_HEADER', true);
		$game_url = append_sid("{$phpbb_root_path}arcade.$phpEx", "mode=popup&amp;g={$game_id}");
		$message =  sprintf($user->lang['ARCADE_POPUP_DONE'], $game_info['game_name'], '<a href="' . $game_url . '">', $game_info['game_name'], '</a>', '<a href="javascript:void(0)" onclick="refresh_page(); return false">', '</a>');
	}
	else
	{
		$game_url = append_sid("{$phpbb_root_path}arcade.$phpEx", "mode=play&amp;g={$game_id}");
		$message =  sprintf($user->lang['ARCADE_FULL_DONE'], $game_info['game_name'], '<a href="' . $game_url . '">', $game_info['game_name'], '</a>', '<a href="' . $cat_url . '">' , $game_info['cat_name'], '</a>', '<a href="' . $arcade_url . '">', '</a>');
	}
	$arcade->set_cookie();

	$template->assign_vars(array(
		'S_SCORE_DONE'			=> true,

		'L_ARCADE_DONE' 		=> $message,

		'CAT_URL'				=> $cat_url,
		'GAME_IMAGE' 			=> $phpbb_root_path . "arcade.$phpEx?img=" . $game_info['game_image'],
		'GAME_NAME' 			=> $game_info['game_name'],
		'GAME_URL' 				=> $game_url,
	));

	display_arcade_online();

	// Output page
	page_header($user->lang['INDEX'], false);

	$template->set_filenames(array(
		'body' => 'arcade/arcade_score_body.html')
	);

	page_footer();
}

// Debug lines to show what game_scorevar and score are passed to this file
// Uncomment lines if you are having trouble with scores submitting
// $debug = "Game Score Name = $game_scorevar <br />Game Score = $score";
// trigger_error( $debug);

if (!$auth_arcade->acl_get('c_score', $game_data['cat_id']))
{
	// Remove cookies
	$arcade->set_cookie();
	trigger_error('NO_PERMISSION_ARCADE_SCORE');
}

$error = false;
$lang = '';
if ($arcade->config['game_zero_negative_score'])
{
	if (!isset($score))
	{
		$error = true;
		$lang = $user->lang['ARCADE_SCORE_ERROR'];
	}
}
else
{
	if (!isset($score) || $score <= 0)
	{
		$error = true;
		$lang = $user->lang['ARCADE_ZERO_NEGATIVE_SCORE'];
	}
}

generate_arcade_nav($game_data, true);

if ($error)
{
	$play_type = (isset($_COOKIE[$arcade->cookie_popup]) && $_COOKIE[$arcade->cookie_popup] == true) ? 'popup' : 'play';	
	$game_url =  append_sid("{$phpbb_root_path}arcade.$phpEx", "mode=$play_type&amp;g={$game_data['game_id']}");
	$cat_url = append_sid("{$phpbb_root_path}arcade.$phpEx", "mode=cat&amp;c={$game_data['cat_id']}&amp;g={$game_data['game_id']}#g{$game_data['game_id']}");
		
	$message =  sprintf($lang, $game_data['game_name'], '<a href="' . $game_url . '">', '</a>', '<a href="' . $cat_url . '">', '</a>');
	trigger_error($message);
}

if ($arcade->config['parse_smilies'])
{
	if (!function_exists('generate_smilies'))
	{
		include(PHPBB3_INCLUDE_DIR . 'functions_posting.' . $phpEx);
	}

	$template->assign_vars(array(
		'S_SMILIES_ALLOWED' => true,
		)
	);
	generate_smilies('inline', 0);
}

$sql = 'SELECT score, comment_text, comment_bitfield, comment_options, comment_uid
	FROM ' . ARCADE_SCORES_TABLE . '
	WHERE game_id = ' . (int) $game_data['game_id'] . '
	AND user_id = ' . (int) $user->data['user_id'];

$result = $db->sql_query($sql);
$saved_score = false;
$saved_highscore = false;
$reward = false;

// If the user has no current score we insert it.
if (!( $row = $db->sql_fetchrow($result)))
{
	$sql_ary = array(
		'game_id'		=> $game_data['game_id'],
		'user_id'		=> $user->data['user_id'],
		'score'			=> $score,
		'score_date'	=> $game_data['current_time'],
		'comment_text'	=> '',
		'total_time'	=> $game_data['total_time'],
		'total_plays'	=> 1,
	);

	$db->sql_query('INSERT INTO ' . ARCADE_SCORES_TABLE . ' ' . $db->sql_build_array('INSERT', $sql_ary));

	$saved_score = true;
	$cache->destroy('_arcade_users');
	$cache->destroy('_arcade_totals');
}
else
{
	$old_score = $row['score'];
	// So you have an old score, is you new one better?  (Make sure we check the scoretype)
	if (($game_data['game_scoretype'] == SCORETYPE_HIGH && $old_score < $score) || ($game_data['game_scoretype'] == SCORETYPE_LOW && $old_score > $score))
	{
		$sql_ary = array(
			'score'			=> $score,
			'score_date'	=> $game_data['current_time'],
		);

		$sql = 'UPDATE ' . ARCADE_SCORES_TABLE . '
			SET total_plays = total_plays + 1,
				total_time = total_time + ' . $game_data['total_time'] . ', ' .
			$db->sql_build_array('UPDATE', $sql_ary) . '
			WHERE game_id = ' . $game_data['game_id'] . '
				AND user_id = ' . $user->data['user_id'];

		$db->sql_query($sql);
		$saved_score = true;
	}
	// So you didn't get a better score, then lets update the times played and total time.
	else
	{
		$sql = 'UPDATE ' . ARCADE_SCORES_TABLE . '
			SET total_plays = total_plays + 1 ,
				total_time = total_time + ' . $game_data['total_time'] . '
			WHERE game_id = ' . $game_data['game_id'] . '
				AND user_id = ' . $user->data['user_id'];
		$db->sql_query($sql);
	}
	$cache->destroy('_arcade_totals');
}
$comment_data = generate_text_for_edit($row['comment_text'], $row['comment_uid'], $row['comment_options']);
$db->sql_freeresult($result);

// Here we update the category information, this is done to save SQL queries
$sql_ary = array(
	'cat_last_play_game_id'			=> $game_data['game_id'],
	'cat_last_play_game_name'		=> $game_data['game_name'],
	'cat_last_play_user_id'			=> $user->data['user_id'],
	'cat_last_play_score'			=> $score,
	'cat_last_play_time'			=> $game_data['current_time'],
	'cat_last_play_username'		=> $user->data['username'],
	'cat_last_play_user_colour'		=> $user->data['user_colour'],
);

$sql = 'UPDATE ' . ARCADE_CATS_TABLE . '
		SET cat_plays = cat_plays + 1, ' .
		$db->sql_build_array('UPDATE', $sql_ary) . '
		WHERE cat_id = ' . (int) $game_data['cat_id'];
$db->sql_query($sql);

// Here we update the total times a game has been played
$sql = 'UPDATE ' . ARCADE_GAMES_TABLE . "
	SET game_plays = game_plays + 1
	WHERE game_id = '{$game_data['game_id']}'";
$db->sql_query($sql);

$cache->destroy('sql', ARCADE_CATS_TABLE);
$cache->destroy('sql', ARCADE_GAMES_TABLE);
$cache->destroy('sql', ARCADE_SCORES_TABLE);

// This needs to be checked incase the game has no score yet and we are scoring lowest to highest
// If this was not checked there would never be a highscore holder for games that score
// lowest to highest.
$has_highscore = ($game_data['game_highscore'] == 0 && $game_data['game_highuser'] == 0 && $game_data['game_highdate'] == 0) ? false : true;
$first_score = (!$has_highscore) ? true : false;
$game_data['game_highscore'] = ($game_data['game_scoretype'] == SCORETYPE_LOW && !$has_highscore) ? $score + 1 : $game_data['game_highscore'];

// Here we check if you are the new highscore holder
if (($game_data['game_scoretype'] == SCORETYPE_HIGH && $game_data['game_highscore'] < $score) || ($game_data['game_scoretype'] == SCORETYPE_LOW && $game_data['game_highscore']  > $score) || ($arcade->config['game_zero_negative_score'] && $score <= 0 && !$has_highscore))
{
	$sql_ary = array(
		'game_highscore'		=> $score,
		'game_highuser'			=> $user->data['user_id'],
		'game_highdate'			=> $game_data['current_time'],
	);

	$sql = 'UPDATE ' . ARCADE_GAMES_TABLE . '
			SET ' . $db->sql_build_array('UPDATE', $sql_ary) . '
			WHERE game_id = ' . (int) $game_data['game_id'];
	$db->sql_query($sql);

	$cache->destroy('sql', ARCADE_CATS_TABLE);
	$cache->destroy('sql', ARCADE_GAMES_TABLE);
	$cache->destroy('sql', ARCADE_SCORES_TABLE);
	$cache->destroy('_arcade_leaders');
	$cache->destroy('_arcade_leaders_all');

	$saved_highscore = true;

	$sql = 'SELECT user_arcade_pm
		FROM ' . USERS_TABLE . '
		WHERE user_id = ' . (int) $game_data['game_highuser'];
	$result = $db->sql_query($sql);
	$user_arcade_pm = (int) $db->sql_fetchfield('user_arcade_pm');
	$db->sql_freeresult($result);

	if ($arcade->points['show'])
	{
		$reward = $arcade->get_reward($game_data);
		if ($reward == ARCADE_FREE || $auth_arcade->acl_get('c_playfree', $game_data['cat_id']))
		{
			$reward = false;
		}
		else
		{
			// If we are using the jackpot setting we must clear the jackpot
			if ($arcade->use_jackpot($game_data))
			{				
				$arcade->set_jackpot('clear', $game_data);
			}
			$arcade->set_points('add', $user->data['user_id'], $reward);
		}
	}

	// We don't need to send a pm if there was never a highscore...
	// We don't need to send a pm if we beat our own score...
	if ($game_data['game_highuser'] && $arcade->config['send_arcade_pm'] && $user_arcade_pm && ($game_data['game_highuser'] != $user->data['user_id']))
	{
		// This sets the score data that is available to use
		// in the pm sent when you lose a highscore.  It
		// is customizable in the ACP
		$score_data = array(
			'game_id' 			=> $game_data['game_id'],
			'game_name' 		=> $game_data['game_name'],
			'old_user_id' 		=> $game_data['game_highuser'],
			'old_username' 		=> $game_data['username'],
			'old_score' 		=> $arcade->number_format($game_data['game_highscore']),
			'new_score' 		=> $arcade->number_format($score),
		);

		$subject = $arcade->config['pm_subject'];
		$message = $arcade->config['pm_message'];

		$arcade->send_pm($subject, $message, $score_data);

	}
}

// This will check whether the user has already voted.
// You should only be able to vote once but you will be
// allowed to change your vote...
$sql_array = array(
	'SELECT'	=> 'g.game_votetotal, g.game_votesum, r.*',

	'FROM'		=> array(
		ARCADE_GAMES_TABLE	=> 'g',
	),

	'LEFT_JOIN'	=> array(
		array(
			'FROM'	=> array(ARCADE_RATING_TABLE => 'r'),
			'ON'	=> 'g.game_id = r.game_id'
		)
	),

	'WHERE'		=> 'g.game_id = ' . $game_data['game_id'] . '
		AND r.user_id = ' . $user->data['user_id'],
);

$sql = $db->sql_build_query('SELECT', $sql_array);
$result = $db->sql_query($sql);
$row = $db->sql_fetchrow($result);
$db->sql_freeresult($result);

$user_rating = ($row['game_rating'] == '') ? 0 : $row['game_rating'];
$game_rating_select = $arcade->get_rating_select($user_rating);

if (!$saved_score)
{
	$score_desc = sprintf($user->lang['ARCADE_NO_SCORE_SAVED'], $arcade->number_format($score), $arcade->number_format($old_score));
}
else if (!$saved_highscore)
{
	$score_desc = sprintf($user->lang['ARCADE_SCORE_SAVED'], $arcade->number_format($score), $arcade->number_format($game_data['game_highscore']));
}
else
{
	if ($first_score)
	{
		$score_desc = sprintf($user->lang['ARCADE_HIGH_SCORE_SAVED_NEW'], $game_data['game_name'], $arcade->number_format($score));
	}
	else
	{
		$score_desc = sprintf($user->lang['ARCADE_HIGH_SCORE_SAVED'], $game_data['game_name'], $arcade->number_format($score), $arcade->number_format($game_data['game_highscore']));
	}
}

if ($arcade->points['show'] && $reward)
{
	$score_desc .= '<br /><br />' . sprintf($user->lang['ARCADE_REWARD_MESSAGE'], $arcade->number_format($reward), $arcade->points['name'], $arcade->points['name'], $arcade->number_format($arcade->points['total']));
}


// User is not allowed to comment or rate the game so display the final score explanation and redirect to the finished page...
if (!$auth_arcade->acl_get('c_comment', $game_data['cat_id']) && !$auth_arcade->acl_get('c_rate', $game_data['cat_id']))
{
	$meta_info = append_sid("{$phpbb_root_path}arcade.$phpEx", "mode=done&amp;g={$game_data['game_id']}");
	meta_refresh(5, $meta_info);

	$score_desc .= '<br /><br />' . sprintf($user->lang['ARCADE_REDIRECT'], '<a href="' . $meta_info . '">', '</a>');

	trigger_error($score_desc);
}

// Add posting language file.
$user->add_lang('posting');

$s_hidden_fields = build_hidden_fields(array(
	'mode'	=> 'score',
	'g'		=> $game_data['game_id'],
	'c'		=> $game_data['cat_id'],
));

if (isset($_COOKIE[$arcade->cookie_popup]) && $_COOKIE[$arcade->cookie_popup] == true)
{
	$template->assign_var('S_USE_SIMPLE_HEADER', true);
}

add_form_key('arcade_score');

$template->assign_vars(array(
	'S_HAS_PERM_COMMENT'			=> $auth_arcade->acl_get('c_comment', $game_data['cat_id']),
	'S_HAS_PERM_RATE'				=> $auth_arcade->acl_get('c_rate', $game_data['cat_id']),

	'ARCADE_GAME_RATE_ALREADY' 		=> ($user_rating > 0) ? sprintf($user->lang['ARCADE_GAME_RATE_ALREADY'], $user_rating) : '',
	'ARCADE_SCORE_DESC' 			=> $score_desc,

	'GAME_RATING_SELECT' 			=> $game_rating_select,
	'GAME_NAME' 					=> $game_data['game_name'],

	'SCORE_COMMENT' 				=> $comment_data['text'],

	'S_ACTION' 						=> append_sid("{$phpbb_root_path}arcade.$phpEx"),
	'S_HIDDEN_FIELDS' 				=> $s_hidden_fields,
	)
);

display_arcade_online();

// Output page
page_header($user->lang['INDEX'], false);

$template->set_filenames(array(
	'body' => 'arcade/arcade_score_body.html')
);

page_footer();

?>
