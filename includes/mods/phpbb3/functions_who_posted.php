<?php
/**
*
* @package who_posted
* @version $Id$
* @copyright (c) 2007, 2008 evil3
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

/**
*/
if (!defined('IN_PHPBB'))
{
	echo 'Who Posted? &copy; 2007 eviL&lt;3';
	exit;
}

/**
 * Who Posted?
 *
 * @param int $topic_id
 * @return void 
 */
function who_posted($topic_id)
{
	global $auth, $db, $user, $template;
	global $phpEx;
	
	$phpbb_root_path = PHPBB3_ROOT_DIR;
	
	// make sure the topic exists
	$sql = 'SELECT topic_id, topic_approved, forum_id
		FROM ' . TOPICS_TABLE . '
		WHERE topic_id = ' . (int) $topic_id;
	$result = $db->sql_query_limit($sql, 1);
	$row = $db->sql_fetchrow($result);
	$db->sql_freeresult($result);
	
	if (!$row)
	{
		$topic_id = 0;
	}
	
	// which forum id to use
	$forum_id = ($row['forum_id']) ? (int) $row['forum_id'] : request_var('f', 0);
	
	if ($forum_id)
	{
		// get style data
		$sql = 'SELECT forum_id, forum_style
			FROM ' . FORUMS_TABLE . "
			WHERE forum_id = $forum_id";
		$result = $db->sql_query_limit($sql, 1);
		$style_row = $db->sql_fetchrow($result);
		$db->sql_freeresult($result);
		
		if (!$style_row)
		{
			// if you provide a forum_id, it better be right
			$topic_id = 0;
		}
		else if ($style_row['forum_style'])
		{
			$forum_style = $style_row['forum_style'];
		}
	}
	
	if ($forum_id && (!$auth->acl_get('f_list', $forum_id) || (!$auth->acl_get('m_approve', $forum_id) && !$row['topic_approved'])))
	{
		// check permissions for seing forum
		$topic_id = 0;
	}
	else if (!$forum_id)
	{
		// if no forum_id is given, and the user cannot view any forums, he can't view this.
		$forum_ary = $auth->acl_getf('f_read', true);
		$forum_ary = array_unique(array_keys($forum_ary));
		if (sizeof($forum_ary))
		{
			$topic_id = 0;
		}
	}
	
	$lang_load = 'mods/who_posted';
	
	// Setup language and style
	if ($topic_id && isset($forum_style))
	{
		$user->setup($lang_load, $forum_style);
	}
	else
	{
		$user->setup($lang_load);
	}
	
	// if we have no topic id (or it was set to 0), display an error
	if (!$topic_id)
	{
		trigger_error('NO_TOPIC');
	}
	
	// main query: select all the data for users and posts (thanks to poyntesm for documenting this so niceley)
	$sql_ary = array(
		'SELECT'	=> 'u.username, u.user_id, u.user_colour, COUNT(DISTINCT p.post_id) as posts, p.post_username',
		'FROM'		=> array(
			POSTS_TABLE	=> 'p',
			USERS_TABLE	=> 'u',
		),
		'WHERE'		=> "p.topic_id = $topic_id AND u.user_id = p.poster_id",
		'GROUP_BY'	=> 'u.username, p.post_username',
		'ORDER_BY'	=> 'posts DESC, u.username_clean ASC, p.post_username ASC',
	);
	
	// hide unapproved posts for users without approve permission
	if (!$auth->acl_get('m_approve', $forum_id))
	{
		$sql_ary['WHERE'] .= ' AND p.post_approved = 1';
	}
	
	$result = $db->sql_query($db->sql_build_query('SELECT', $sql_ary));
	while ($row = $db->sql_fetchrow($result))
	{
		// assign the data as block vars (thanks to Highway of Life for suggesting get_username_string())
		$template->assign_block_vars('who_posted_row', array(
			'USERNAME'			=> get_username_string('full', $row['user_id'], $row['username'], $row['user_colour'], $row['post_username']),
			'USERNAME_PLAIN'	=> ($row['user_id'] != ANONYMOUS) ? $row['username'] : '',
			'POSTS'				=> $row['posts'],
		));
	}
	$db->sql_freeresult($result);
	
	$template->set_filenames(array(
		'body' => 'posting_who_posted.html',
	));
	
	page_header($user->lang['WHOPOSTED_TITLE']);
	
	// some last tpl assignements
	$template->assign_vars(array(
		'U_CLOSE'	=> append_sid("{$phpbb_root_path}viewtopic.$phpEx", "t=$topic_id" . ($forum_id ? "&amp;f=$forum_id" : '')),
	));
	
	page_footer();
}

?>
