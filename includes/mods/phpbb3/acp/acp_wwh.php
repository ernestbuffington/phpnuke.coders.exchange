<?php

/**
*
* @package - NV "who was here?"
* @version $Id$
* @copyright (c) nickvergessen ( http://mods.flying-bits.org/ )
* @license http://opensource.org/licenses/gpl-license.php GNU Public License 
*
*/

/**
* @package acp
*/
class acp_wwh
{
	var $u_action;

	function main($id, $mode)
	{
		global $db, $user, $auth, $template, $cache;
		global $config, $phpEx;

		add_form_key('wwh');
		$new_mod_version = $old_mod_version = '1';
		include(PHPBB3_INCLUDE_DIR . 'functions_wwh2.' . $phpEx);
		$user->add_lang('acp/common');
		$user->add_lang('mods/lang_wwh_acp');
		$this->tpl_name = 'acp_wwh';
		$this->page_title = $user->lang['WWH_TITLE'];
		$submit = (isset($_POST['submit'])) ? true : false;

		if ($submit)
		{
			if (!check_form_key('wwh'))
			{
				trigger_error('FORM_INVALID');
			}
			$wwh_disp_bots		= request_var('wwh_disp_bots', 0);
			$wwh_disp_guests	= request_var('wwh_disp_guests', 0);
			$wwh_disp_time		= request_var('wwh_disp_time', 0);
			$wwh_version		= request_var('wwh_version', 0);
			$wwh_del_time		= request_var('wwh_del_time', 86400);
			$wwh_sort_by		= request_var('wwh_sort_by', 0);
			$wwh_record			= request_var('wwh_record', 0);
			$wwh_reset			= request_var('wwh_reset', 0);
			if($wwh_disp_bots != $config['wwh_disp_bots'])
			{
				set_config('wwh_disp_bots', $wwh_disp_bots);
			}
			if($wwh_disp_guests != $config['wwh_disp_guests'])
			{
				set_config('wwh_disp_guests', $wwh_disp_guests);
			}
			if($wwh_disp_time != $config['wwh_disp_time'])
			{
				set_config('wwh_disp_time', $wwh_disp_time);
			}
			if($wwh_version != $config['wwh_version'])
			{
				set_config('wwh_version', $wwh_version);
			}
			if($wwh_del_time != $config['wwh_del_time'])
			{
				set_config('wwh_del_time', $wwh_del_time);
			}
			if($wwh_sort_by != $config['wwh_sort_by'])
			{
				set_config('wwh_sort_by', $wwh_sort_by);
			}
			if($wwh_record != $config['wwh_record'])
			{
				set_config('wwh_record', $wwh_record);
			}
			if($wwh_reset)
			{
				set_config('wwh_record_ips', 1);
				set_config('wwh_record_time', time());
				set_config('wwh_reset_time', time());
			}
			trigger_error($user->lang['WWH_SAVED_SETTINGS'] . adm_back_link($this->u_action));
		}

		$template->assign_vars(array(
			'WWH_MOD_VERSION'		=> sprintf($user->lang['WWH_INSTALLED'], $old_mod_version),
			'WWH_DISP_BOTS'			=> $config['wwh_disp_bots'],
			'WWH_DISP_GUESTS'		=> $config['wwh_disp_guests'],
			'WWH_DISP_TIME'			=> $config['wwh_disp_time'],
			'WWH_VERSION'			=> $config['wwh_version'],
			'WWH_DEL_TIME'			=> $config['wwh_del_time'],
			'WWH_SORT_BY'			=> $config['wwh_sort_by'],
			'WWH_RECORD'			=> $config['wwh_record'],
			'U_ACTION'				=> $this->u_action,
		));
	}

}

?>