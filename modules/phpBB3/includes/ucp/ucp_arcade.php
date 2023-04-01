<?php
/**
*
* @package ucp
* @version $Id: ucp_arcade.php 630 2008-12-07 19:40:53Z JRSweets $
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

/**
* ucp_prefs
* Changing user preferences
* @package ucp
*/
class ucp_arcade
{
	var $u_action;

	function main($id, $mode)
	{
		global $config, $db, $user, $auth, $auth_arcade, $template, $prefix_phpbb3, $phpbb_root_path, $phpEx;

		switch ($mode)
		{
			case 'settings':
				$this->manage_settings();
			break;

			case 'favorites':
				$this->manage_favorites();
			break;

			default:
				trigger_error('NO_MODE', E_USER_ERROR);
			break;

		}

		$template->assign_vars(array(
			'L_TITLE'			=> $user->lang['UCP_ARCADE_' . strtoupper($mode)],
			'L_TITLE_EXPLAIN'	=> $user->lang['UCP_ARCADE_' . strtoupper($mode) . '_EXPLAIN'],
			'S_UCP_ACTION'		=> $this->u_action)
		);

		$this->tpl_name = 'ucp_arcade_' . $mode;
		$this->page_title = 'UCP_ARCADE_' . strtoupper($mode);
	}

	function manage_settings()
	{
		global $config, $db, $user, $auth, $auth_arcade, $template, $prefix_phpbb3, $phpbb_root_path, $phpEx;

		include($phpbb_root_path . 'includes/arcade/arcade_common.' . $phpEx);
		// Initialize arcade auth
		$auth_arcade->acl($user->data);
		// Initialize arcade class
		$arcade = new arcade();

		$submit = (isset($_POST['submit'])) ? true : false;
		$error = $data = array();

		add_form_key('ucp_arcade_settings');
		$data = array(
			'user_arcade_pm'	=> request_var('user_arcade_pm', (bool) $user->data['user_arcade_pm']),
			'games_per_page'	=> request_var('games_per_page', (int) $user->data['games_per_page']),
			'games_sort_order'	=> request_var('games_sort_order', $user->data['games_sort_order']),
			'games_sort_dir'	=> request_var('games_sort_dir', $user->data['games_sort_dir']),
		);

		if ($submit)
		{
			$error = validate_data($data, array(
				'games_sort_order'	=> array('string', false, 1, 1),
				'games_sort_dir'	=> array('string', false, 1, 1),
				'user_arcade_pm'	=> array('num', false, 0, 1),
				'games_per_page'	=> array('num', false),
			));

			if (!check_form_key('ucp_arcade_settings'))
			{
				$error[] = 'FORM_INVALID';
			}

			if (!sizeof($error))
			{
				$sql = 'UPDATE ' . USERS_TABLE . '
					SET ' . $db->sql_build_array('UPDATE', $data) . '
					WHERE user_id = ' . $user->data['user_id'];
				$db->sql_query($sql);

				meta_refresh(3, $this->u_action);
				$message = $user->lang['PREFERENCES_UPDATED'] . '<br /><br />' . sprintf($user->lang['RETURN_UCP'], '<a href="' . $this->u_action . '">', '</a>');
				trigger_error($message);
			}

			// Replace "error" strings with their real, localised form
			$error = preg_replace('#^([A-Z_]+)$#e', "(!empty(\$user->lang['\\1'])) ? \$user->lang['\\1'] : '\\1'", $error);
		}
		
		if ($arcade->config['override_user_sort'])
		{
			$error[] = $user->lang['ARCADE_OVERRIDE_USER_SORT_UCP'];
		}

		$template->assign_vars(array(
			'S_USER_ARCADE_PM'		=> ($data['user_arcade_pm']) ? true : false,
			
			'ERROR'					=> (sizeof($error)) ? implode('<br />', $error) : '',
			'GAMES_PER_PAGE'		=> $data['games_per_page'],
			'GAMES_SORT_ORDER'		=> $this->games_sort_order_select($data['games_sort_order']),
			'GAMES_SORT_DIR'		=> $this->games_sort_dir_select($data['games_sort_dir']),
		));
	}

	function manage_favorites()
	{
		global $config, $db, $user, $auth, $auth_arcade, $template, $prefix_phpbb3, $phpbb_root_path, $phpEx;

		include($phpbb_root_path . 'includes/arcade/arcade_common.' . $phpEx);
		// Initialize arcade auth
		$auth_arcade->acl($user->data);
		// Initialize arcade class
		$arcade = new arcade();

		$start		= request_var('start', 0);
		$sort_key	= request_var('sk', 'a');
		$sort_dir	= request_var('sd', 'a');

		$delete		= (isset($_POST['delete'])) ? true : false;
		$confirm	= (isset($_POST['confirm'])) ? true : false;
		$delete_ids	= array_keys(request_var('games', array(0)));

		if ($delete && sizeof($delete_ids))
		{
			$s_hidden_fields = array(
				'delete'	=> 1
			);

			foreach ($delete_ids as $game_id)
			{
				$s_hidden_fields['games'][$game_id] = 1;
			}

			if (confirm_box(true))
			{

				$sql = 'DELETE FROM ' . ARCADE_FAVS_TABLE . '
					WHERE ' . $db->sql_in_set('game_id', $delete_ids) . '
					AND user_id = ' . $user->data['user_id'];
				$db->sql_query($sql);

				meta_refresh(3, $this->u_action);
				$message = ((sizeof($delete_ids) == 1) ? $user->lang['ARCADE_FAVORITE_DELETED'] : $user->lang['ARCADE_FAVORITES_DELETED']) . '<br /><br />' . sprintf($user->lang['RETURN_UCP'], '<a href="' . $this->u_action . '">', '</a>');
				trigger_error($message);
			}
			else
			{
				confirm_box(false, (sizeof($delete_ids) == 1) ? 'ARCADE_DELETE_FAVORITE' : 'ARCADE_DELETE_FAVORITES', build_hidden_fields($s_hidden_fields));
			}
		}

		$games_per_page = $arcade->config['games_per_page'];
		if (!empty($user->data['games_per_page']))
		{
			$games_per_page = $user->data['games_per_page'];
		}

		// Select box eventually
		$sort_key_text = array('n' => $user->lang['ARCADE_GAME_NAME'], 'c' => $user->lang['ARCADE_CATEGORY']);
		$sort_key_sql = array('n' => 'g.game_name_clean', 'c' => 'c.cat_name');

		$sort_dir_text = array('a' => $user->lang['ASCENDING'], 'd' => $user->lang['DESCENDING']);

		$s_sort_key = '';
		foreach ($sort_key_text as $key => $value)
		{
			$selected = ($sort_key == $key) ? ' selected="selected"' : '';
			$s_sort_key .= '<option value="' . $key . '"' . $selected . '>' . $value . '</option>';
		}

		$s_sort_dir = '';
		foreach ($sort_dir_text as $key => $value)
		{
			$selected = ($sort_dir == $key) ? ' selected="selected"' : '';
			$s_sort_dir .= '<option value="' . $key . '"' . $selected . '>' . $value . '</option>';
		}

		if (!isset($sort_key_sql[$sort_key]))
		{
			$sort_key = 'n';
		}

		$order_by = $sort_key_sql[$sort_key] . ' ' . (($sort_dir == 'a') ? 'ASC' : 'DESC');

		$sql_array = array(
			'SELECT'	=> 'g.game_id, g.game_name, g.game_name_clean, c.cat_id, c.cat_name',

			'FROM'		=> array(
				ARCADE_GAMES_TABLE	=> 'g',
			),

			'LEFT_JOIN'	=> array(
				array(
					'FROM'	=> array(ARCADE_FAVS_TABLE => 'f'),
					'ON'	=> 'g.game_id = f.game_id'
				),
				array(
					'FROM'	=> array(ARCADE_CATS_TABLE => 'c'),
					'ON'	=> 'g.cat_id = c.cat_id'
				),
			),

			'WHERE'	=> 'f.user_id = ' . (int) $user->data['user_id'] . ' AND ' . $db->sql_in_set('c.cat_id', $arcade->get_permissions('c_play'), false, true),

			'ORDER_BY' => $order_by,
		);

		$sql = $db->sql_build_query('SELECT', $sql_array);
		$result = $db->sql_query_limit($sql, $games_per_page, $start);
		$row = $db->sql_fetchrowset($result);
		$db->sql_freeresult($result);

		if (sizeof($row))
		{
			$template->assign_var('S_GAME_ROWS', true);
		}

		$num_favs = $arcade->get_total('fav', $user->data['user_id']);

		$row_count = 0;
		foreach ($row as $item)
		{
			$template->assign_block_vars('games', array(
				'U_GAME'		=> append_sid("{$phpbb_root_path}arcade.$phpEx", 'mode=play&amp;g=' . $item['game_id']),
				'U_CAT'			=> append_sid("{$phpbb_root_path}arcade.$phpEx", 'mode=cat&amp;c=' . $item['cat_id']),

				'ROW_NUMBER'	=> $row_count + ($start + 1),

				'GAME_ID'		=> $item['game_id'],
				'GAME_NAME'		=> $item['game_name'],
				'CAT_NAME'		=> $item['cat_name'],
			));

			$row_count++;
		}

		$template->assign_vars(array(
			'PAGE_NUMBER'			=> on_page($num_favs, $games_per_page, $start),
			'PAGINATION'			=> generate_pagination($this->u_action . "&amp;sk=$sort_key&amp;sd=$sort_dir", $num_favs, $games_per_page, $start, true),
			'TOTAL_GAMES'			=> $num_favs,

			'U_SORT_GAME_NAME'		=> $this->u_action . "&amp;sk=n&amp;sd=" . (($sort_key == 'n' && $sort_dir == 'a') ? 'd' : 'a'),
			'U_SORT_CATEGORY_NAME'	=> $this->u_action . "&amp;sk=c&amp;sd=" . (($sort_key == 'c' && $sort_dir == 'a') ? 'd' : 'a'),

			'S_DISPLAY_MARK_ALL'	=> ($num_favs) ? true : false,
			'S_DISPLAY_PAGINATION'	=> ($num_favs) ? true : false,
			'S_UCP_ACTION'			=> $this->u_action,
			'S_SORT_OPTIONS' 		=> $s_sort_key,
			'S_ORDER_SELECT'		=> $s_sort_dir,
		));


	}

	function games_sort_order_select($value, $key = '')
	{
		global $user;

		return '<option value="' . ARCADE_ORDER_ACP .'"'. (($value == ARCADE_ORDER_ACP) ? ' selected="selected"' : '') . '>' . $user->lang['ARCADE_DEFAULT'] . '</option><option value="' . ARCADE_ORDER_FIXED .'"'. (($value == ARCADE_ORDER_FIXED) ? ' selected="selected"' : '') . '>' . $user->lang['ARCADE_GAMES_SORT_FIXED'] . '</option><option value="' . ARCADE_ORDER_INSTALLDATE .'"'. (($value == ARCADE_ORDER_INSTALLDATE) ? ' selected="selected"' : '') . '>' . $user->lang['ARCADE_GAMES_SORT_INSTALLDATE'] . '</option><option value="' . ARCADE_ORDER_NAME . '"' . (($value == ARCADE_ORDER_NAME) ? ' selected="selected"' : '') . '>' . $user->lang['ARCADE_GAMES_SORT_NAME'] . '</option><option value="' . ARCADE_ORDER_PLAYS . '"' . (($value == ARCADE_ORDER_PLAYS) ? ' selected="selected"' : '') . '>' . $user->lang['ARCADE_GAMES_SORT_PLAYS'] . '</option><option value="' . ARCADE_ORDER_RATING . '"' . (($value == ARCADE_ORDER_RATING) ? ' selected="selected"' : '') . '>' . $user->lang['ARCADE_GAMES_SORT_RATING'] . '</option>';
	}

	function games_sort_dir_select($value, $key = '')
	{
		global $user;

		return '<option value="' . ARCADE_ORDER_ACP .'"'. (($value == ARCADE_ORDER_ACP) ? ' selected="selected"' : '') . '>' . $user->lang['ARCADE_DEFAULT'] . '</option><option value="' . ARCADE_ORDER_ASC . '"' . (($value == ARCADE_ORDER_ASC) ? ' selected="selected"' : '') . '>' . $user->lang['ASCENDING'] . '</option><option value="' . ARCADE_ORDER_DESC . '"' . (($value == ARCADE_ORDER_DESC) ? ' selected="selected"' : '') . '>' . $user->lang['DESCENDING'] . '</option>';
	}
}

?>