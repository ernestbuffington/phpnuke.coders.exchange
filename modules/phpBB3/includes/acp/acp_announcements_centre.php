<?php
/** 
*
* @package acp
* @acp_announcement_centre.php by lefty74
* @copyright (c) 2007 lefty74 
* @license http://opensource.org/licenses/gpl-license.php GNU Public License 
*
*/

/**
* @package acp
*/
class acp_announcements_centre
{
	var $u_action;

	function main($id, $mode)
	{
		global $config, $db, $user, $auth, $template, $cache;
		global $phpbb_root_path, $phpbb_admin_path, $phpEx, $prefix_phpbb3;

		include_once($phpbb_root_path . 'includes/functions_posting.' . $phpEx);
		include_once($phpbb_root_path . 'includes/functions_display.' . $phpEx);
		include_once($phpbb_root_path . 'includes/functions_announcements.' . $phpEx);

		$user->add_lang(array('posting', 'acp/announcement_centre'));
		$this->tpl_name = 'acp_announcement_centre';
		$this->page_title = 'ACP_ANNOUNCEMENTS_CENTRE';
		add_form_key('announcement_centre');


		// Set some vars
		//$action	= request_var('action', '');
		$submit 	= (isset($_POST['submit'])) ? true : false;
		$preview	= (isset($_POST['preview'])) ? true : false;

			$annoucement_row = array(
			'announcement_enable' 			=> request_var('announcement_enable', ''),
			'announcement_enable_guests' 	=> request_var('announcement_enable_guests', ''),
			'announcement_show' 			=> request_var('announcement_show',''),
			'announcement_show_birthdays' 	=> request_var('announcement_show_birthdays', ''),
			'announcement_birthday_avatar' 	=> request_var('announcement_birthday_avatar', ''),
			'announcement_title' 			=> request_var('announcement_title', '', true),
			'announcement_text' 			=> request_var('announcement_text', '', true),
			'announcement_draft' 			=> request_var('announcement_draft', '', true),
			'announcement_title_guests' 	=> request_var('announcement_title_guests', '', true),
			'announcement_text_guests' 		=> request_var('announcement_text_guests', '', true),
			'announcement_show_group' 		=> request_var('announcement_show_group', array(0)),
			);
				
		
			if ($submit || $preview)
			{
				if (!check_form_key('announcement_centre'))
				{
					trigger_error('FORM_INVALID');
				}
			}


					if ($submit)
					{
							
						$sql_ary = array(
						'announcement_enable' 			=> (int) $annoucement_row['announcement_enable'],
						'announcement_enable_guests' 	=> (int) $annoucement_row['announcement_enable_guests'],
						'announcement_show' 			=> (int) $annoucement_row['announcement_show'],
						'announcement_show_birthdays' 	=> (int) $annoucement_row['announcement_show_birthdays'],
						'announcement_birthday_avatar' 	=> (int) $annoucement_row['announcement_birthday_avatar'],
						'announcement_title' 			=> (string) $annoucement_row['announcement_title'],
						'announcement_text' 			=> (string) $annoucement_row['announcement_text'],
						'announcement_draft' 			=> (string) $annoucement_row['announcement_draft'],
						'announcement_title_guests' 	=> (string) $annoucement_row['announcement_title_guests'],
						'announcement_text_guests' 		=> (string) $annoucement_row['announcement_text_guests'],
						'announcement_show_group' 		=> (string) implode(",", $annoucement_row['announcement_show_group']),
						);

						$sql = 'UPDATE ' . ANNOUNCEMENTS_CENTRE_TABLE . '
								SET ' . $db->sql_build_array('UPDATE', $sql_ary);
						$db->sql_query($sql);
					}
				
				
					if ($submit)
					{						

						add_log('admin', 'LOG_ANNOUNCEMENT_UPDATED');
						trigger_error($user->lang['LOG_ANNOUNCEMENT_UPDATED'] . adm_back_link($this->u_action));
					}
						
					$sql = 'SELECT * 
						FROM ' . ANNOUNCEMENTS_CENTRE_TABLE;
					$result = $db->sql_query($sql);
					$announcement = $db->sql_fetchrow($result);
					$db->sql_freeresult($result);
					
				$selected_groups = $exclude_groups = array();
				$selected_groups = explode(",", $announcement['announcement_show_group']);
				$exclude_groups[] = 1; // dont show the guests group as we already have guests specified separately

				$announcement_preview = '';
				
				if ($preview)
				{
				include_once($phpbb_root_path . 'includes/message_parser.' . $phpEx);

					$message_parser = new parse_message($annoucement_row['announcement_draft']);

					// Allowing Quote BBCode
					$message_parser->parse(true, true, true, true, false, true, true, true);

					// Now parse it for displaying
					$announcement_preview = $message_parser->format_display(true, true, true, false);
					unset($message_parser);
				}

				decode_message($annoucement_row['announcement_draft']);
				
				generate_smilies_acp('inline');

				$template->assign_vars(array(
					'U_ACTION'		=> $this->u_action,
					
					'ANNOUNCEMENT_ENABLE'				=> $announcement['announcement_enable'],
					'ANNOUNCEMENT_ENABLE_GUESTS'		=> $announcement['announcement_enable_guests'],
					'ANNOUNCEMENT_SHOW_BIRTHDAYS'		=> $announcement['announcement_show_birthdays'],
					'ANNOUNCEMENT_BIRTHDAY_AVATAR'		=> $announcement['announcement_birthday_avatar'],
					'ANNOUNCEMENT_SHOW'					=> $announcement['announcement_show'],
					'S_ANNOUNCEMENT_SHOW_GROUPS'		=> ( $announcement['announcement_show'] == 0 ) ? true:false,
					'S_ANNOUNCEMENT_SHOW_EVERYONE'		=> ( $announcement['announcement_show'] == 1 ) ? true:false,
					'S_ANNOUNCEMENT_SHOW_GUESTS'		=> ( $announcement['announcement_show'] == 2 ) ? true:false,
					'ANNOUNCEMENT_TITLE'				=> $announcement['announcement_title'],
					'ANNOUNCEMENT_TEXT'					=> $announcement['announcement_text'],
					'ANNOUNCEMENT_DRAFT'				=> ( $announcement_preview ) ? $annoucement_row['announcement_draft'] : $announcement['announcement_draft'],
					'ANNOUNCEMENT_DRAFT_PREVIEW'		=> ( $announcement_preview ) ? $announcement_preview : get_announcement($announcement['announcement_draft']),
					'ANNOUNCEMENT_TITLE_GUESTS'			=> $announcement['announcement_title_guests'],
					'ANNOUNCEMENT_TEXT_GUESTS'			=> $announcement['announcement_text_guests'],
					'S_ANNOUNCEMENT_SELECT_GROUP'		=> group_select_options_selected($selected_groups, $exclude_groups, false),
					)
				);
				// Assigning custom bbcodes
				display_custom_bbcodes();
				
	}
}

?>