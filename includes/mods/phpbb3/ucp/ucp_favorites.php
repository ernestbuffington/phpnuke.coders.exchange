<?php

/**
*
* @package ucp
* @version $Id: ucp_favorites.php,v 1.0.4 2008/10/09 19:54:45 agrajag Exp $
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

include(PHPBB3_INCLUDE_DIR . 'functions_favorites.' . $phpEx);

/**
* ucp_favorites
* Allows users to enter their favorite movies/games/shows/comics/etc.
* This data is displayed on their profile, and in the overall forum favorites
* page which displays the most popular entries based on this information.
*
*
* @package ucp
*/

function trim_value(&$value) 
{ 
	$value = trim($value); 
}

class ucp_favorites
{
	var $u_action;

	function main($id, $mode)
	{
		global $config, $db, $user, $auth, $template, $phpEx;

        $phpbb_root_path = PHPBB3_ROOT_DIR;

		$favfunct = new favorite_functions;
		
		$preview	= (isset($_POST['preview'])) ? true : false;
		$submit		= (isset($_POST['submit'])) ? true : false;
		$error = $data = array();
		$s_hidden_fields = '';
		
		$uid = $user->data['user_id'];
		switch ($mode)
		{
			case 'edit':
			
			$favorites_listitems = $favorites_listitem_text = array();
			
			//get the favorites list for this user
			$favorites_listitems = $favfunct->get_user_favorites((int) $user->data['user_id']);

			$box_text = array();
			
			//setup how the boxes will be displayed. if there's a URL then show it
			foreach($favorites_listitems as $catid => $cat)
			{
				$temp_ary=array();
				foreach ($cat as $row)
				{
					$temp_ary[] = ($row['listitem_url'] ? implode(", ", $row) : $row['listitem_text']);					
				}
				$box_text[$catid] = $temp_ary ? implode("\n",$temp_ary) : ' ';
			}
			unset($favorites_listitems);
		
			//pull category names from database here
			//store them in $favorites_categories
			$favorites_categories = $favfunct->get_favorites_categories();	
			
			foreach ($favorites_categories as $cat)
			{
                $text_to_show = "";
                
                if (isset($box_text[$cat['category_id']]))
                {
                    $text_to_show = ($box_text[$cat['category_id']] ? $box_text[$cat['category_id']] : "");
                }
                
				$data[] = array(
						  'favorites_box'	=>	utf8_normalize_nfc(request_var('favorites_box_'.$cat['category_id'], $text_to_show , true)),
						  'category_name'	=>	utf8_normalize_nfc($cat['category_name']),
						  'category_id'		=>	(int) $cat['category_id'],
				  ); 
			}

			if ($submit)
			{
				//get the text from the box, and split it up into a two dimensional array
				//first is row/item number, second has [0]=text, [1]=url (optional)

				foreach ($data as $cat)
				{
					$favorites_listitems = $unique_check = array();
					
                    //Don't bother if nothing changed
					if (strcmp($cat['favorites_box'],$box_text[$cat['category_id']]) == 0)
					{
						continue;
					}
					
                    //Check for duplicate entries and compile the new list
					if ($cat['favorites_box']) 
					{
						$favoriteslist = explode("\n", trim($cat['favorites_box']));
						foreach ($favoriteslist as $line)
                        {
							$linearray = explode(",",trim($line));
							array_walk($linearray, 'trim_value');
							if (!isset($unique_check[strtoupper($linearray[0])]))
                            {
								$unique_check[strtoupper($linearray[0])] = true;
								$favorites_listitems[] = array($linearray[0],($linearray[1] ?? ''));
							}
							else 
							{
								$error[] = sprintf($user->lang['FAVORITES_DUP_DELETE_ERROR'], $linearray[0]);
							}
							
						}
					}
					
					$i = 1;
					
					foreach ($favorites_listitems as $item)
					{
						$where_fields = array( 
							'user_id'					=>	$uid,
							'category_id'		=>	$cat['category_id'],
							'listitem_id'		=>	$i,
						);
						
						$sql_ary = array (
							'listitem_text'	=>	$item[0],
							'listitem_url'	=>	($item[1] ? $item[1] : ''),
						);
						$i++;
						
						$favfunct->update_insert(FAVORITES_USER_TABLE, $sql_ary, $where_fields);
					}
					$sql = 'DELETE FROM ' . FAVORITES_USER_TABLE . ' WHERE
							user_id = ' . intval($uid) .' AND category_id = ' . 
							intval($cat['category_id']) . " AND listitem_id >= $i";
                            
					$db->sql_query($sql);
					$favfunct->refresh_forum_favorites($cat['category_id']);
					
					unset($i);
				}
				

				//display confirmation message to the user
				$message = $user->lang['FAVORITES_UPDATED'] . '<br /><br />' . sprintf($user->lang['RETURN_UCP'], '<a href="' . $this->u_action . '">', '</a>');
				
				//if there are errors, display them and don't auto-redirect
				if (sizeof($error)==0)
				{
					meta_refresh(3, $this->u_action);
					trigger_error($message);
				}
				else
				{
					trigger_error(implode('<br />',$error).'<br /><br />'.$message);
				}
				
				
				
			}
			
			$template->assign_vars(array(
				'ERROR'		=> (sizeof($error)) ? implode('<br />', $error) : '',
			));
			
			foreach ($data as $cat)
			{
				$template->assign_block_vars('favorites_boxes',array(
					'ID'				=>	'favorites_box_' . $cat['category_id'],
					'FAVORITES_BOX'		=>	$cat['favorites_box'],
					'L_CATEGORY_NAME'	=> $user->lang['FAVORITES_CAT_PREFIX'] . $cat['category_name'],
				));
			}
			
			break;
			
			case 'view_list':
			
            //Add the image graphics
            $template->assign_vars(array(
                 'IMG_ADD_BUTTON'	=> $user->img('icon_ffavorites_add', '', '', '', 'src'),
                 'IMG_SEARCH_BUTTON'	=> $user->img('icon_ffavorites_search', '', '', '', 'src')
                 ));
            
			//pull category names from database here
			//store them in order in $favorites_categories
			$favorites_categories = $favfunct->get_favorites_categories();	

			//get the category to view
			$catid = request_var('catid', 0);
			
			//If none is set, use the first active one
			if ($catid == 0)
			{
				$catid = $favorites_categories[0]['category_id'];
			}				
				
			//Load all the categories to the template variable, and figure out the name of the current one
			foreach ($favorites_categories as $cat)
			{
				$template->assign_block_vars('categories',array(
					'NAME'=> $cat['category_name'],
					'ID' => $cat['category_id'],
					));
				
				if ($cat['category_id'] == $catid)
				{
					$template->assign_vars(array(
						 'CURRENT_CAT_NAME'	=> $cat['category_name']
						 ));
				}
			}
				

				
			$button_before = $button_after = $button_col = false;
			$button_pos = $config['favorites_add_button_pos'];
			switch ($button_pos)
			{
				case 1:
				default:
					$button_before = true;
				break;
				
				case 2:
					$button_after = true;
				break;
				
				case 3:
					$button_col = true;
				break;				
			}	
			$template->assign_vars(array(
				'CURRENT_CAT'		=> $catid,
				'S_BUTTON_BEFORE'	=> $button_before,
				'S_BUTTON_AFTER'	=> $button_after,
				'S_BUTTON_COL'		=> $button_col,
				));			
			
            $message = '';
            
            //Add favorite item to user's list if requested
			$add_item = request_var('add_item', 'null');
			if ($add_item != 'null'){
			
				$add_text = utf8_normalize_nfc(request_var('text', '', true));
				$add_url = utf8_normalize_nfc(request_var('url', '', true));
				
				$result = $favfunct->add_favorite_user(array(
					'user_id'	=>	$uid,
					'category_id'	=>	$catid,
					'listitem_text'	=>	$add_text,
					'listitem_url'	=>	$add_url
					));
				
				switch ((int) $result)
				{
					case FAVORITES_SUCCESS:
						$message = sprintf($user->lang['FAVORITES_ADD_SUCCESS'], $add_text);
						break;
					case FAVORITES_ERR_INVALID_UID:
						$message = $user->lang['FAVORITES_UID_ERROR'];
                        break;
					case FAVORITES_ERR_INVALID_CATID:
						$message = $user->lang['FAVORITES_CATID_ERROR'];
                        break;
					case FAVORITES_ERR_INVALID_TEXT:
						$message = $user->lang['FAVORITES_TEXT_ERROR'];
                        break;
					case FAVORITES_ERR_ITEM_EXISTS:
						$message = $user->lang['FAVORITES_DUP_ITEM_ERROR'];
                        break;
					default:
						$message = $user->lang['FAVORITES_GENERIC_ERROR'];
                        break;
				}
				
				$template->assign_vars(array(
					'MESSAGE'	=> $message
					));
			}

            //Display list of users with selected favorite if requested
			$view_users = request_var('view_users', 'null');					
			if ($view_users != 'null'){
			
                if ($message)
                {
                    $message .= '<br /><br />';
                }
                
				$text = utf8_normalize_nfc(request_var('text', '', true));
				
                if (!$text)
                {
                    $message .= $user->lang['FAVORITES_TEXT_ERROR'];
                }
                else 
                {
                    
                    $result = $favfunct->get_favorite_users(array(
                        'category_id'		=> $catid,
                        'listitem_text'		=> $text
                        ));
                        
                    
                    $message .= sprintf($user->lang['FAVORITES_SEARCH_RESULTS'], sizeof($result), $text) . '<br /><br />';
                    foreach ($result as $row)
                    {
                        $message .= '<a href="' . append_sid("{$phpbb_root_path}memberlist.$phpEx?mode=viewprofile&amp;u=" . intval($row['user_id'])) .
                            '">' . $row['username'] . '</a>, ';
                    }
                    
                    $message = substr($message, 0, -2);
                }
                    
				$template->assign_vars(array(
					'MESSAGE'	=> $message
					));
					
			}
			
			
			//Get list of forum favorites from the database			
			$fav_list_ary = $favfunct->get_forum_favorites($catid);
			
			for ( $i = 0, $size = sizeof($fav_list_ary); $i < $size; $i++ )
			{
				$template->assign_block_vars('fav_list',array(
					'COUNT'=> $fav_list_ary[$i]['listitem_count'],
					'TEXT' => $fav_list_ary[$i]['listitem_text'],
					'URL' => $fav_list_ary[$i]['listitem_url'],
				));
			}
												
			break;
		}
		
		$template->assign_vars(array(
			 'L_TITLE'	=> $user->lang['UCP_FAVORITES_' . strtoupper($mode)],
			 
			 'S_HIDDEN_FIELDS'	=> $s_hidden_fields,
			 'S_UCP_ACTION'		=> $this->u_action)
	   );

		// Set desired template
		$this->tpl_name = 'ucp_favorites_' . $mode;
		$this->page_title = 'UCP_FAVORITES_' . strtoupper($mode);
	}
}

?>
