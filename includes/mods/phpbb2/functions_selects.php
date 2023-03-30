<?php

/***************************************************************************
 *                            function_selects.php
 *                            -------------------
 *   updated              : Tuesday, Mar 28, 2023
 *   begin                : Saturday, Feb 13, 2001
 *   copyright            : (C) 2001 The phpBB Group
 *   email                : support@phpbb.com
 *
 *   Id: functions_selects.php,v 1.3.2.4 2002/12/22 12:20:35 psotfx Exp
 *
 ***************************************************************************/

/***************************************************************************
 *
 *   This program is free software; you can redistribute it and/or modify
 *   it under the terms of the GNU General Public License as published by
 *   the Free Software Foundation; either version 2 of the License, or
 *   (at your option) any later version.
 *
 ***************************************************************************/

/*****[CHANGES]**********************************************************
-=[Base]=-
      Theme Management                         v1.0.4       12/14/2023
-=[Mod]=-
      Super Quick Reply                        v1.3.1       03/28/2023
      Advanced Time Management                 v2.2.1       03/28/2023
      At a Glance Options                      v1.0.1       03/28/2023
      Group Colors and Ranks                   v1.0.1       03/28/2023
      Log Actions Mod - Topic View             v2.0.1       03/28/2023
	  Birthdays                                v3.0.1       03/28/2023
 ************************************************************************/

if (!defined('IN_PHPBB'))
{
    die('Hacking attempt');
}

//
// Pick a language, any language ...
//
function language_select($default, $select_name = "language", $dirname="modules/Forums/language")
{
        global $phpEx;

        $dir = opendir($dirname);

        $lang = array();
        while ( $file = readdir($dir) )
        {
                if ( preg_match("/^lang_/i", $file) && !is_file($dirname . "/" . $file) && !is_link($dirname . "/" . $file) )
                {
                        $filename = trim(str_replace("lang_", "", $file));
                        $displayname = preg_replace("/^(.*?)_(.*)$/", "\\1 [ \\2 ]", $filename);
                        $displayname = preg_replace("/\[(.*?)_(.*)\]/", "[ \\1 - \\2 ]", $displayname);
                        $lang[$displayname] = $filename;
                }
        }

        closedir($dir);
        asort($lang);
        reset($lang);

        $lang_select = '<select class="form-control" name="' . $select_name . '" id="'.$select_name.'">';

        foreach ($lang as $displayname => $filename): 
          $selected = ( strtolower((string) $default) == strtolower((string) $filename) ) ? ' selected="selected"' : '';
          $lang_select .= '<option value="' . $filename . '"' . $selected . '>' . ucwords((string) $displayname) . '</option>';
        endforeach;

		$lang_select .= '</select>';

        return $lang_select;
}

//
// Pick a template/theme combo,
//
/*****[BEGIN]******************************************
 [ Base:    Theme Management                   v1.0.2 ]
 ******************************************************/
function style_select($name="default_Theme")
{
    if(!isset($extra))
	$extra = '';
	include($_SERVER['DOCUMENT_ROOT']."/mainfile.php"); // had to add this as get_theme would not work!
	$themes = get_themes('active');
    $select = "<select class=\"form-control\" name=\"" . $name . "\" id=\"" . $name . "\" $extra>";
    foreach($themes as $theme) {
        $name = (!empty($theme['custom_name'])) ? $theme['custom_name'] : $theme['theme_name'];
        $selected = (is_default($theme['theme_name'])) ? "selected" : "";
        $select .= "<option value=\"" . $theme['theme_name'] . "\" $selected>" . $name . "</option>";
    }
    $select .= "</select>";

    return $select;
}
/*****[END]********************************************
 [ Base:    Theme Management                   v1.0.2 ]
 ******************************************************/

//
// Pick a timezone
//
function tz_select($default, $select_name = 'timezone')
{
        global $sys_timezone, $lang;

        if(!isset($default)):
          $default == $sys_timezone;
        endif;

        $tz_select = '<select class="form-control" name="' . $select_name . '" id="' . $select_name . '">';

        foreach($lang['tz'] as $offset => $zone): 
		  $selected = ( $offset == $default ) ? ' selected="selected"' : '';
	      # Mod: Advanced Time Management v2.2.0 START
          $tz_select .= '<option value="' . $offset . '"' . $selected . '>' . str_replace('GMT', 'UTC', (string) $zone) . '</option>';
	      # Mod: Advanced Time Management v2.2.0 START
       endforeach;
	   $tz_select .= '</select>';

   return $tz_select;
}

/*****[BEGIN]******************************************
 [ Mod:     Super Quick Reply                  v1.3.0 ]
 ******************************************************/
function quick_reply_select($default, $select_name = "show_quickreply")
{
    global $lang;

    $sqr_select = '<select class="form-control" name="' . $select_name . '" id="' . $select_name . '">';

    foreach($lang['sqr'] as $value => $mode): 
      $selected = ( $value == $default ) ? ' selected="selected"' : '';
      $sqr_select .= '<option value="' . $value . '"' . $selected . '>' . $mode . '</option>';
    endforeach;
    $sqr_select .= '</select>';

    return $sqr_select;
}
/*****[END]********************************************
 [ Mod:     Super Quick Reply                  v1.3.0 ]
 ******************************************************/

/*****[BEGIN]******************************************
 [ Mod:     At a Glance Options                v1.0.0 ]
 ******************************************************/
function glance_option_select($default, $select_name = "glance_show")
{
global $lang;

    $g_select = '<select class="form-control" name="' . $select_name . '" id="' . $select_name . '">';

    foreach($lang['show_glance_option'] as $value => $text): 
      $selected = ( $value == $default ) ? ' selected="selected"' : '';
      $g_select .= '<option value="' . $value . '"' . $selected . '>' . $text . '</option>';
    endforeach;
    $g_select .= '</select>';

    return $g_select;
}
/*****[END]********************************************
 [ Mod:     At a Glance Options                v1.0.0 ]
 ******************************************************/

/*****[BEGIN]******************************************
 [ Mod:     Group Colors and Ranks             v1.0.0 ]
 ******************************************************/
function auc_colors_select($default, $select_name = "color_groups", $value = "nuke_group_id")
{
global $db, $prefix;

    $g_select = '<select class="form-control" name="' . $select_name . '" id="' . $select_name . '">';
    $sql = "SELECT * FROM " . $prefix . "_bbadvanced_username_color  ORDER BY group_name ASC";
    if (!$result = $db->sql_query($sql)) {
        die(mysql_error());
    }
    
	if(!isset($defualt))
	$defualt = '';
	
	$selected = (!$defualt) ? "selected=\"selected\"" : "";
    $g_select .= '<option value="0" '.$selected.'>None</option>';
    while( $row = $db->sql_fetchrow($result) )
    {
        $selected = ( $row['nuke_group_id'] == $default ) ? ' selected="selected"' : '';
        $g_select .= '<option value="' . $row[$value] . '"' . $selected . '>' . $row['group_name'] . '</option>';
    }
    $db->sql_freeresult($result);

    $g_select .= '</select>';

    return $g_select;
}

function ranks_select($default, $select_name = "ranks", $value = "rank_id")
{
    global $db, $prefix;

    $g_select = '<select class="form-control" name="' . $select_name . '" id="' . $select_name . '">';
    $sql = "SELECT * FROM " . RANKS_TABLE . " WHERE rank_special = 1 ORDER BY rank_title ASC";
    if (!$result = $db->sql_query($sql)) {
        die(mysql_error());
    }

	if(!isset($defualt))
	$defualt = '';

    $selected = (!$defualt) ? "selected=\"selected\"" : "";
    $g_select .= '<option value="0" '.$selected.'>None</option>';
    while( $row = $db->sql_fetchrow($result) )
    {
        $selected = ( $row['rank_id'] == $default ) ? ' selected="selected"' : '';
        $g_select .= '<option value="' . $row[$value] . '"' . $selected . '>' . $row['rank_title'] . '</option>';
    }
    $db->sql_freeresult($result);

    $g_select .= '</select>';

    return $g_select;
}
/*****[BEGIN]******************************************
 [ Mod:     Group Colors and Ranks             v1.0.0 ]
 ******************************************************/

/*****[BEGIN]******************************************
 [ Mod:     Log Actions Mod - Topic View       v2.0.0 ]
 ******************************************************/
function allow_view_select($default)
{
global $lang;

    $g_select = '<select class="form-control" name="logs_view_level" id="logs_view_level">';

    foreach($lang['logs_view_level'] as $value => $text): 
      $selected = ( $value == $default ) ? ' selected="selected"' : '';
      $g_select .= '<option value="' . $value . '"' . $selected . '>' . $text . '</option>';
    endforeach;

    $g_select .= '</select>';

    return $g_select;
}
/*****[END]********************************************
 [ Mod:     Log Actions Mod - Topic View       v2.0.0 ]
 ******************************************************/

/*****[BEGIN]******************************************
 [ Mod:    Birthdays                           v3.0.0 ]
 ******************************************************/
function bday_month_select($default, $select_name = 'bday_month')
{
	global $lang;
	static $translate = array();

	if ( empty($translate) )
	{
		$translate = array(
			$lang['Default_Month'],
			$lang['datetime']['January'],
			$lang['datetime']['February'],
			$lang['datetime']['March'],
			$lang['datetime']['April'],
			$lang['datetime']['May'],
			$lang['datetime']['June'],
			$lang['datetime']['July'],
			$lang['datetime']['August'],
			$lang['datetime']['September'],
			$lang['datetime']['October'],
			$lang['datetime']['November'],
			$lang['datetime']['December']
		);
	}

	if ( !isset($default) )
	{
		$default = 0;
	}
	$bday_month_select = '<select class="form-control" name="' . $select_name . '" id="' . $select_name . '">';

	foreach ($translate as $num => $month)
	{
		$selected = ( $num == $default ) ? ' selected="selected"' : '';
		$bday_month_select .= '<option value="' . $num . '"' . $selected . '>' . $month . '</option>';
	}
	$bday_month_select .= '</select>';

	return $bday_month_select;
}

function bday_day_select($default, $select_name = 'bday_day')
{
	global $lang;
	static $options;

	if ( empty($options) )
	{
		$options = array($lang['Default_Day']);
		for ($i=0; $i<31; $i++)
		{
			$options[] = $i + 1;
		}
	}

	if ( !isset($default) )
	{
		$default = 0;
	}
	$bday_day_select = '<select class="form-control" name="' . $select_name . '" id="' . $select_name . '">';

	foreach ($options as $num => $day)
	{
		$selected = ( $num == $default ) ? ' selected="selected"' : '';
		$bday_day_select .= '<option value="' . $num . '"' . $selected . '>' . $day . '</option>';
	}
	$bday_day_select .= '</select>';

	return $bday_day_select;
}

function bday_year_select($default, $select_name = 'bday_year')
{
	global $board_config, $lang;

	if ( !isset($default) )
	{
		$default = 0;
	}
	$bday_year_select = '<select class="form-control" name="' . $select_name . '" id="' . $select_name . '">';

	$end = gmdate('Y') - $board_config['bday_min'];
	$start = gmdate('Y') - $board_config['bday_max'] - 1;

	$selected = ( !$default ) ? ' selected="selected"' : '';
	$bday_year_select .= '<option value="0"' . $selected . '>' . $lang['Default_Year'] . '</option>';

	for ($i=$end;$i>=$start;$i--)
	{
		$selected = ( $i == $default ) ? ' selected="selected"' : '';
		$bday_year_select .= '<option value="' . $i . '"' . $selected . '>' . $i . '</option>';
	}
	$bday_year_select .= '</select>';

	return $bday_year_select;
}
/*****[END]********************************************
 [ Mod:    Birthdays                           v3.0.0 ]
 ******************************************************/
