<?php
/**
*
* @package acp
* @version $Id: acp_favorites.php,v 1.0.3 2008/09/30 16:01:00 agrajag Exp $
* @copyright (c) 2008
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
class acp_favorites
{
	var $u_action;
	var $new_config = array();


	function main($id, $mode)
	{
		global $db, $user, $auth, $template;
		global $config, $phpEx;

		include(PHPBB3_INCLUDE_DIR . 'functions_favorites.' . $phpEx);
		$favfunct = new favorite_functions();


		$action	= request_var('action', '');
		$submit = (isset($_POST['submit'])) ? true : false;

		$form_key = 'acp_favorites';
		add_form_key($form_key);
					
		$this->tpl_name = 'acp_favorites';

		$error = array();
				
		switch ($mode)
		{
			case 'settings':

				/**
				*	Validation types are:
				*		string, int, bool,
				*		script_path (absolute path in url - beginning with / and no trailing slash),
				*		rpath (relative), rwpath (realtive, writable), path (relative path, but able to escape the root), wpath (writable)
				*/
			
				$display_vars = array(
					'title'	=> 'ACP_FAVORITES_SETTINGS',
					'vars'	=> array(
					'legend1'					=> 'ACP_FAVORITES_SETTINGS',
					'favorites_flist_length'	=> array('lang' => 'FAVORITES_FLIST_LENGTH', 'validate' => 'int',	'type' => 'text:3:4', 'explain' => true, 'append' => ' ' . $user->lang['FAVORITES_ROWS']),
					'favorites_add_button_pos'	=> array('lang' => 'FAVORITES_ADD_BUTTON_POS',	'validate' => 'int',	'type' => 'custom', 'method' => 'select_add_button_pos', 'explain' => true),
					)
				);
				
				$this->new_config = $config;
				$cfg_array = (isset($_REQUEST['config'])) ? utf8_normalize_nfc(request_var('config', array('' => ''), true)) : $this->new_config;
				
				validate_config_vars($display_vars['vars'], $cfg_array, $error);


				if ($submit && !check_form_key($form_key))
				{
					$error[] = $user->lang['FORM_INVALID'];
				}

				// Do not write values if there is an error
				if (sizeof($error))
				{
					$submit = false;
				}

				// We go through the display_vars to make sure no one is trying to set variables he/she is not allowed to...
				foreach ($display_vars['vars'] as $config_name => $null)
				{
					if (strpos($config_name, 'legend') !== false)
					{
						continue;
					}

					$this->new_config[$config_name] = $config_value = $cfg_array[$config_name];

                    if ($config_name == 'favorites_flist_length')
                    {
                        if ((int) $config_value < 1)
                        {
                            $config_value = 10;
                        }
                    }
                    
                    if ($config_name == 'favorites_add_button_pos')
                    {
                        if ((int) $config_value < 1 || (int) $config_value > 3)
                        {
                            $config_value = 1;
                        }
                    }

					if ($submit)
					{
						set_config($config_name, $config_value);
					}
				}

				if ($submit)
				{
					add_log('admin', 'LOG_CONFIG_' . strtoupper($mode));
					$favfunct->refresh_forum_favorites(0);

					trigger_error($user->lang['CONFIG_UPDATED'] . adm_back_link($this->u_action));
				}

				$this->page_title = $display_vars['title'];

				$template->assign_vars(array(
					'L_TITLE'			=> $user->lang[$display_vars['title']],
					'L_TITLE_EXPLAIN'	=> $user->lang[$display_vars['title'] . '_EXPLAIN'],

					'S_ERROR'			=> (sizeof($error)) ? 1 : 0,
					'ERROR_MSG'			=> implode('<br />', $error),
					
                    'S_SETTINGS'		=> true,

					'U_ACTION'			=> $this->u_action)
				);	
			
				// Output relevant page
				foreach ($display_vars['vars'] as $config_key => $vars)
				{
					if (!is_array($vars) && strpos($config_key, 'legend') === false)
					{
						continue;
					}

					if (strpos($config_key, 'legend') !== false)
					{
						$template->assign_block_vars('options', array(
							'S_LEGEND'		=> true,
							'LEGEND'		=> $user->lang[$vars] ?? $vars)
						);

						continue;
					}

					$type = explode(':', $vars['type']);

					$l_explain = '';
					if ($vars['explain'] && isset($vars['lang_explain']))
					{
						$l_explain = $user->lang[$vars['lang_explain']] ?? $vars['lang_explain'];
					}
					else if ($vars['explain'])
					{
						$l_explain = $user->lang[$vars['lang'] . '_EXPLAIN'] ?? '';
					}

					$template->assign_block_vars('options', array(
						'KEY'			=> $config_key,
						'TITLE'			=> $user->lang[$vars['lang']] ?? $vars['lang'],
						'S_EXPLAIN'		=> $vars['explain'],
						'TITLE_EXPLAIN'	=> $l_explain,
						'CONTENT'		=> build_cfg_template($type, $config_key, $this->new_config, $config_key, $vars),
						)
					);
				
					unset($display_vars['vars'][$config_key]);
				}
				
			break;
			
			case 'categories':
				
				$action = (isset($_POST['create'])) ? 'create' : request_var('action', '');
				$save = (isset($_REQUEST['save'])) ? true : false;			

				$u_action = $this->u_action;

				if ($action == 'edit') 
				{
					$u_action .= "&amp;action=$action";
				} 

				$template->assign_vars(array(
					'L_TITLE'			=> $user->lang['ACP_FAVORITES_CATEGORIES_CONFIG'],
					'L_TITLE_EXPLAIN'	=> $user->lang['ACP_FAVORITES_CATEGORIES_CONFIG_EXPLAIN'],

					'S_ERROR'			=> (sizeof($error)) ? true : false,
					'ERROR_MSG'			=> implode('<br />', $error),
					
					'S_SETTINGS'		=> false,
					'S_CAT_OPTIONS'		=> ($action == 'edit') ? true : false,

					'U_ACTION'			=> $u_action,)
				);					
	
				switch ($action)
				{
					case 'activate':
						$cat_id = request_var('cat_id', 0);

						if (!$cat_id)
						{
							trigger_error($user->lang['NO_CAT_ID'] . adm_back_link($this->u_action), E_USER_WARNING);
						}

						$sql = 'UPDATE ' . FAVORITES_CATEGORY_TABLE . "
							SET category_active = 1
							WHERE category_id = " . intval($cat_id);
						$db->sql_query($sql);

						$sql = 'SELECT 	category_name
							FROM ' . FAVORITES_CATEGORY_TABLE . "
							WHERE category_id = " . intval($cat_id);
						$result = $db->sql_query($sql);
						$cat_name = (string) $db->sql_fetchfield('category_name');
						$db->sql_freeresult($result);

						add_log('admin', 'LOG_FAVORITES_CAT_ACTIVATE', $cat_name);

					break;
					
					case 'deactivate':
						$cat_id = request_var('cat_id', 0);

						if (!$cat_id)
						{
							trigger_error($user->lang['NO_CAT_ID'] . adm_back_link($this->u_action), E_USER_WARNING);
						}
			
						$sql = 'UPDATE ' . FAVORITES_CATEGORY_TABLE . "
							SET category_active = 0
							WHERE category_id = " . intval($cat_id);
						$db->sql_query($sql);

						$sql = 'SELECT category_name
							FROM ' . FAVORITES_CATEGORY_TABLE . "
							WHERE category_id = " . intval($cat_id);
						$result = $db->sql_query($sql);
						$cat_name = (string) $db->sql_fetchfield('category_name');
						$db->sql_freeresult($result);

						add_log('admin', 'LOG_FAVORITES_CAT_DEACTIVATE', $cat_name);

					break;
					
					case 'move_up':
					case 'move_down':
						$cat_order = request_var('order', 0);
						$order_total = $cat_order * 2 + (($action == 'move_up') ? -1 : 1);

						$sql = 'UPDATE ' . FAVORITES_CATEGORY_TABLE . "
							SET category_order = $order_total - category_order 
							WHERE " . $db->sql_in_set('category_order', array($cat_order,(($action == 'move_up') ? $cat_order - 1 : $cat_order + 1)));
						
                        $db->sql_query($sql);

					break;
					
					case 'create':

						//get the new category name
						$new_cat = request_var('new_category_name','');

						if (!$new_cat)
						{
							trigger_error($user->lang['NO_CAT_TITLE'] . adm_back_link($this->u_action), E_USER_WARNING);
						}
						
						//figure out what order it should have
						$sql = 'SELECT MAX(category_order) as max_order
							FROM ' . FAVORITES_CATEGORY_TABLE;
						$result = $db->sql_query($sql);
						$new_cat_order = ((int) $db->sql_fetchfield('max_order'));
						$new_cat_order++;
						$db->sql_freeresult($result);

						//create the new category
                        $sql_ary = array (
                            'category_name'		=>	$new_cat,
                            'category_order'	=>	(int) $new_cat_order,
                            'category_active'	=>	0,
                        );		
                        
                        $db->sql_query('INSERT INTO ' . FAVORITES_CATEGORY_TABLE . ' ' . $db->sql_build_array('INSERT', $sql_ary));
						$db->sql_query($sql);

					break;
					
					case 'edit':

						$cat_id = request_var('cat_id', 0);
						
						if (!$cat_id)
						{
							trigger_error($user->lang['NO_CAT_ID'] . adm_back_link($this->u_action), E_USER_WARNING);
						}
						
						$cat = $favfunct->get_category_info($cat_id);
						
						if (!$save) {	//display options
							//get current category name
							
							$template->assign_vars(array(
								'CATEGORY_ID'		=> $cat['category_id'],
								'CATEGORY_NAME'		=> $cat['category_name'],
								)
							);							
							
						}
						else {	//save new input and return to main page
							$new_name = request_var('cat_name','');
							
                            if (strcmp($cat['category_name'], $new_name)==0)
                            {
                                trigger_error($user->lang['NO_CHANGE_CAT_TITLE'] . adm_back_link($this->u_action), E_USER_WARNING);
                            }
                            
							if (!$new_name)
							{
								trigger_error($user->lang['NO_CAT_TITLE'] . adm_back_link($this->u_action), E_USER_WARNING);
							}
							
							$sql = 'UPDATE ' . FAVORITES_CATEGORY_TABLE . "
								SET category_name = '" . $db->sql_escape($new_name) . "' 
								WHERE category_id = " . intval($cat_id);
							$db->sql_query($sql);							
							
                            add_log('admin', 'LOG_FAVORITES_CAT_RENAME', $cat['category_name'], $new_name);
							trigger_error($user->lang['CHANGED_CATEGORY_TITLE'] . adm_back_link($this->u_action));

						}
					break;
						
					case 'delete':
						$cat_id = request_var('cat_id', 0);
                        $cat_id = intval($cat_id);

						if (!$cat_id)
						{
							trigger_error($user->lang['NO_CAT_ID'] . adm_back_link($this->u_action), E_USER_WARNING);
						}
						
						if (confirm_box(true))
						{
                            //Get category name and log message
                            $cat = $favfunct->get_category_info($cat_id);
                            add_log('admin', 'LOG_FAVORITES_CAT_DELETE', $cat['category_name']);
                            
                            //Delete all info from tables
							$sql = 'DELETE FROM ' . FAVORITES_CATEGORY_TABLE
							. " WHERE category_id = $cat_id";   //intval'd above so safe here
							$db->sql_query($sql);
							
							$sql = 'DELETE FROM ' . FAVORITES_SPECIAL_TABLE
							. " WHERE category_id = $cat_id";
							$db->sql_query($sql);
							
							$sql = 'DELETE FROM ' . FAVORITES_USER_TABLE
							. " WHERE category_id = $cat_id";
							$db->sql_query($sql);
							
						}
						else
						{
							confirm_box(false, $user->lang['CONFIRM_OPERATION'], build_hidden_fields(array(
							   'i'			=> $id,
							   'mode'		=> $mode,
                               'id'			=> $cat_id,
							   'action'     => 'delete',
							   )));
						}
					break;
					
					
				}
			
				if ($action!='edit'){
					$categories = $favfunct->get_favorites_categories(1);
					
					foreach ($categories as $cat)
					{
						$active_lang = (!$cat['category_active']) ? 'ACTIVATE' : 'DEACTIVATE';
						$active_value = (!$cat['category_active']) ? 'activate' : 'deactivate';
						$id = $cat['category_id'];
                        $order = $cat['category_order'];

						$template->assign_block_vars('categories', array(
							'CATEGORY_ID'		=> $cat['category_id'],
							'CATEGORY_NAME'		=> $cat['category_name'],

							'L_ACTIVATE_DEACTIVATE'		=> $user->lang[$active_lang],
							'U_ACTIVATE_DEACTIVATE'		=> $this->u_action . "&amp;action=$active_value&amp;cat_id=$id",
							'U_EDIT'					=> $this->u_action . "&amp;action=edit&amp;cat_id=$id",
							'U_TRANSLATE'				=> $this->u_action . "&amp;action=edit&amp;cat_id=$id&amp;step=3",
							'U_DELETE'					=> $this->u_action . "&amp;action=delete&amp;cat_id=$id",
							'U_MOVE_UP'					=> $this->u_action . "&amp;action=move_up&amp;order=$order",
							'U_MOVE_DOWN'				=> $this->u_action . "&amp;action=move_down&amp;order=$order",
							)
						);

					}
				}
			
			break;
			
			default:
				trigger_error('NO_MODE', E_USER_ERROR);
			break;
		}
		
	}
	
	/**
	* Select add item button placement method
	*/
	function select_add_button_pos($value, $key = '')
	{
		global $user, $config;

		$radio_ary = array(1 => 'ADD_BUTTON_BEFORE', 2 => 'ADD_BUTTON_AFTER', 3 => 'ADD_BUTTON_COL');

		return h_radio('config[favorites_add_button_pos]', $radio_ary, $value, $key);
	}
}

?>