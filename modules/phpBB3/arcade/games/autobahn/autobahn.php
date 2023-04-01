<?php
/**
*	Installation File How-to
*	
*	Below are the parameters that must be set for a game to be installed into
*	the arcade.  There is no current way (and there will probably not be one) 
*	to manually install games from the ACP.
*
*	You need this file for the game to show up in the ACP to install.
*
*	The only items that need to be set are the games name, description,
*	width, height, type, scoretype and files.
*
*	The arcade supports 5 types of games. (Activity Mod, IBPro, IBPro arcadelib,
*	V3Arcade and IBProV3)  Use the following constants for the type:
*
*	AMOD_GAME
*	IBPRO_GAME
*	IBPRO_ARCADELIB_GAME
*	V3ARCADE_GAME
*	IBPROV3_GAME
*	
*	The scoretype should either be SCORETYPE_HIGH or SCORETYPE_LOW
*	these constants are defined in the main arcade class already.	
*	SCORETYPE_HIGH is for games that score so that the best score is
*	the highest.  SCORETYPE_LOW is for games that score so that the
*	best score is the lowest.
*	
*	The game_files item contain and array of any extra files that are need for
*	the game to run that are not in the same folder as the main game.  They
*	should be listed without the path from the phpbb root.
*	
*	The following example would be if the game required three( 3) files:
*
*	'game_files'		=> array (
*		0	=> 'arcade/gamedata/snake/scores.swf',
*		1	=> 'arcade/games/snake/scores.swf',
*		2	=> 'arcade/gamedata/games/snake/scores.swf',
*	)
*		
*	If there are no extra files the item should be set to false:
*	
*	'game_files'		=> false,
*/

if (!defined('IN_PHPBB'))
{
	exit;
}

$game_file = basename(__FILE__, '.' . $phpEx);

$game_data = array(
	'game_name'			=> 'Auto Bahn',
	'game_desc'			=> 'Driving Game',
	'game_image'			=> $game_file.'.gif',
	'game_swf'			=> $game_file.'.swf',
	'game_scorevar'		=> $game_file,
	'game_type'			=> V3ARCADE_GAME,
	'game_width'        	=> 550,
	'game_height'		=> 400,
	'game_scoretype'		=> SCORETYPE_HIGH,
	'game_files'			=> false,
);
?>