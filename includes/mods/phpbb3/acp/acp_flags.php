<?php
/**
*
* @package acp
* @version $Id: acp_flags.php,v 1.010 2007/11/26 12:25:00 nedka Exp $
* @copyright (c) 2007 nedka (Nguyen Dang Khoa)
* @license http://opensource.org/licenses/gpl-license.php GNU Public License 
*
*/

/**
 * Applied rules:
 * TernaryToNullCoalescingRector
 */

if (!defined('IN_PHPBB'))
{
	exit;
}

/**
* @package acp
*/
class acp_flags
{
	var $u_action;

	function main($id, $mode)
	{
		global $db, $user, $template, $cache;
		global $config;

        $phpbb_admin_path = PHPBB3_ADMIN_DIR;

		$user->add_lang('mods/flags');

		// Set up general vars
		$action = request_var('action', '');
		$action = (isset($_POST['add'])) ? 'add' : $action;
		$action = (isset($_POST['save'])) ? 'save' : $action;
		$flag_id = request_var('id', 0);

		$this->tpl_name = 'acp_flags';
		$this->page_title = 'ACP_MANAGE_FLAGS';

		$form_name = 'acp_flags';
		add_form_key($form_name);

		switch ($action)
		{
			case 'save':

				if (!check_form_key($form_name))
				{
					trigger_error($user->lang['FORM_INVALID']. adm_back_link($this->u_action), E_USER_WARNING);
				}

				$flag_country = utf8_normalize_nfc(request_var('flag_country', '', true));
				$flag_code = request_var('flag_code', '', true);
				$flag_image = request_var('flag_image', '');

				// The flag image has to be a jpg, gif or png
				if ($flag_image != '' && !preg_match('#(\.gif|\.png|\.jpg|\.jpeg)$#i', $flag_image))
				{
					$flag_image = '';
				}

				if (!$flag_country)
				{
					trigger_error($user->lang['NO_FLAG_COUNTRY'] . adm_back_link($this->u_action), E_USER_WARNING);
				}

				if (!$flag_code)
				{
					trigger_error($user->lang['NO_FLAG_CODE'] . adm_back_link($this->u_action), E_USER_WARNING);
				}

				$sql_ary = array(
					'flag_country'	=> $flag_country,
					'flag_code'		=> $flag_code,
					'flag_image'	=> htmlspecialchars_decode($flag_image),
				);

				if ($flag_id)
				{
					$sql = 'UPDATE ' . FLAGS_TABLE . ' SET ' . $db->sql_build_array('UPDATE', $sql_ary) . " WHERE flag_id = $flag_id";
					$message = $user->lang['FLAG_UPDATED'];

					add_log('admin', 'LOG_FLAG_UPDATED', $flag_country, $flag_code);
				}
				else
				{
					$sql = 'INSERT INTO ' . FLAGS_TABLE . ' ' . $db->sql_build_array('INSERT', $sql_ary);
					$message = $user->lang['FLAG_ADDED'];

					add_log('admin', 'LOG_FLAG_ADDED', $flag_country, $flag_code);
				}
				$db->sql_query($sql);

				$cache->destroy('_flags');

				trigger_error($message . adm_back_link($this->u_action));

			break;

			case 'delete':

				if (!$flag_id)
				{
					trigger_error($user->lang['MUST_SELECT_FLAG'] . adm_back_link($this->u_action), E_USER_WARNING);
				}

				if (confirm_box(true))
				{
					$sql = 'SELECT flag_country, flag_code
						FROM ' . FLAGS_TABLE . '
						WHERE flag_id = ' . $flag_id;
					$result = $db->sql_query($sql);
					$flag_country = (string) $db->sql_fetchfield('flag_country');
					$flag_code = (string) $db->sql_fetchfield('flag_code');
					$db->sql_freeresult($result);

					$sql = 'DELETE FROM ' . FLAGS_TABLE . "
						WHERE flag_id = $flag_id";
					$db->sql_query($sql);

					$cache->destroy('_flags');

					add_log('admin', 'LOG_FLAG_REMOVED', $flag_country, $flag_code);
				}
				else
				{
					confirm_box(false, $user->lang['CONFIRM_OPERATION'], build_hidden_fields(array(
						'i'			=> $id,
						'mode'		=> $mode,
						'flag_id'	=> $flag_id,
						'action'	=> 'delete',
					)));
				}

			break;

			case 'edit':
			case 'add':

				$data = $flags = $existing_imgs = array();

				$sql = 'SELECT *
					FROM ' . FLAGS_TABLE . '
					ORDER BY flag_country';
				$result = $db->sql_query($sql);

				while ($row = $db->sql_fetchrow($result))
				{
					$existing_imgs[] = $row['flag_image'];

					if ($action == 'edit' && $flag_id == $row['flag_id'])
					{
						$flags = $row;
					}
				}
				$db->sql_freeresult($result);

				$imglist = filelist(PHPBB3_ROOT_DIR . $config['flags_path'], '');
				$edit_img = $filename_list = '';

				foreach ($imglist as $path => $img_ary)
				{
					sort($img_ary);

					foreach ($img_ary as $img)
					{
						$img = $path . $img;

						if (!in_array($img, $existing_imgs) || $action == 'edit')
						{
							if ($flags && $img == $flags['flag_image'])
							{
								$selected = ' selected="selected"';
								$edit_img = $img;
							}
							else
							{
								$selected = '';
							}

							if (strlen($img) > 255)
							{
								continue;
							}

							$filename_list .= '<option value="' . htmlspecialchars($img) . '"' . $selected . '>' . $img . '</option>';
						}
					}
				}

				$filename_list = '<option value=""' . (($edit_img == '') ? ' selected="selected"' : '') . '>----------</option>' . $filename_list;
				unset($existing_imgs, $imglist);

				$template->assign_vars(array(
					'S_EDIT'			=> true,
					'U_BACK'			=> $this->u_action,
					'FLAGS_PATH'		=> PHPBB3_ROOT_DIR . $config['flags_path'],
					'U_ACTION'			=> $this->u_action . '&amp;id=' . $flag_id,

					'FLAG_COUNTRY'		=> $flags['flag_country'] ?? '',
					'FLAG_CODE'			=> $flags['flag_code'] ?? '',
					'S_FILENAME_LIST'	=> $filename_list,
					'FLAG_IMAGE'		=> ($edit_img) ? PHPBB3_ROOT_DIR . $config['flags_path'] . '/' . $edit_img : $phpbb_admin_path . 'images/spacer.gif',
				));

				return;

			break;
		}

		$template->assign_vars(array(
			'U_ACTION'	=> $this->u_action,
		));

		// Counting total users of every country flag
		$sql = 'SELECT user_flag, COUNT(user_flag) AS flag_count
			FROM ' . USERS_TABLE . '
			WHERE user_type IN (' . USER_NORMAL . ', ' . USER_FOUNDER . ')
			GROUP BY user_flag';
		$result = $db->sql_query($sql);

		$flag_count = array();
		while ($row = $db->sql_fetchrow($result))
		{
			$flag_count[$row['user_flag']] = $row['flag_count'];
		}
		$db->sql_freeresult($result);

		// Select country flags
		$sql = 'SELECT *
			FROM ' . FLAGS_TABLE . '
			ORDER BY flag_country';
		$result = $db->sql_query($sql);

		while ($row = $db->sql_fetchrow($result))
		{
			$template->assign_block_vars('flags', array(
				'S_FLAG_IMAGE'	=> ($row['flag_image']) ? true : false,

				'FLAG_IMAGE'	=> PHPBB3_ROOT_DIR . $config['flags_path'] . '/' . $row['flag_image'],
				'FLAG_COUNTRY'	=> $row['flag_country'],
				'FLAG_CODE'		=> $row['flag_code'],
				'FLAG_USERS'	=> $flag_count[$row['flag_code']] ?? 0,

				'U_EDIT'	=> $this->u_action . '&amp;action=edit&amp;id=' . $row['flag_id'],
				'U_DELETE'	=> $this->u_action . '&amp;action=delete&amp;id=' . $row['flag_id'],
			));
		}
		$db->sql_freeresult($result);
	}
}

?>