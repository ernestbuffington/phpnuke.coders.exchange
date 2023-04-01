<?php
/**
*
* help_arcade [English]
*
* @package language
* @version $Id: help_arcade.php 659 2008-12-11 01:30:47Z JRSweets $
* @copyright (c) 2008 JeffRusso.net
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

/**
*/
if (!defined('IN_PHPBB'))
{
	exit;
}

// DEVELOPERS PLEASE NOTE
//
// All language files should use UTF-8 as their encoding and the files must not contain a BOM.
//
// Placeholders can now contain order information, e.g. instead of
// 'Page %s of %s' you can (and should) write 'Page %1$s of %2$s', this allows
// translators to re-order the output of data while ensuring it remains correct
//
// You do not need this where single placeholders are used, e.g. 'Message %d' is fine
// equally where a string contains only two placeholders which are used to wrap text
// in a url you again do not need to specify an order e.g., 'Click %sHERE%s' is fine

$help = array(
	array(
		0 => '--',
		1 => 'General',
	),
	array(
		0 => 'What features are included in phpBB Arcade?',
		1 => '<ul><li>Extensive games support</li>
		<li>Unlimited categories, sub-categories and links (mimics phpBB3 forums)</li>
		<li>Full ACP and UCP modules</li>
		<li>Administrator permissions for ACP modules</li>
		<li>Local category based permissions</li>
		<li>Password protected categories</li>
		<li>Very simple game install</li>
		<li>Automatically convert IBPro game tar files</li>
		<li>Integrated in phpBB3 Who is Online</li>
		<li>Show who is playing what game</li>
		<li>Favorite games system</li>
		<li>Built in game download system</li>
		<li>Statistics</li>
		<li>Rating system</li>
		<li>Comments system</li>
		<li>Reporting system</li>
		<li>Play games regular or in pop up window</li>
		<li>Search system</li>
		<li>Points system integration</li>
		<li>Plus more....</li></ul>',
	),
	array(
		0 => 'What styles are supported?',
		1 => '<ul>
		<li>prosilver</li>
		<li><a href="http://www.phpbb.com/styles/db/index.php?i=misc&mode=display&contrib_id=7525">prosilver Special Edition</a></li>
		<li><a href="http://www.phpbb.com/styles/db/index.php?i=misc&mode=display&contrib_id=8885">revolution</a></li>
		<li>subsilver2</li>
		</ul>',
	),
	array(
		0 => 'What languages are supported?',
		1 => 'All supported languages for the current release of the arcade can be found <a href="http://www.jeffrusso.net/forum/viewtopic.php?f=26&t=1329">here</a>.',
	),
	array(
		0 => 'What about other languages and styles?',
		1 => 'If you translate the phpBB Arcade to your language or create the template files for another style I would appreciate if you submitted them to me <a href="http://www.jeffrusso.net/forum/viewforum.php?f=25">here</a>.  Keep in mind that many styles are based off of prosilver or subsilver2 so for the most part you can just upload the arcade template files from the style its based off of to the template folder of the style you are using.',
	),
	array(
		0 => '--',
		1 => 'Installation/Updating',
	),
	array(
		0 => 'What databases does the phpBB Arcade support?',
		1 => 'The arcade should work correctly with any database that is supported by phpBB3.',
	),
	array(
		0 => 'How do I install the phpBB Arcade?',
		1 => 'There are very little edits required to the core of phpBB3 and there is an included installer that takes care of the db and adds the ACP and UCP Modules.  Make sure to follow the ModX install file for the core edits and the style edits.',
	),
	array(
		0 => 'How do I uninstall the phpBB Arcade?',
		1 => 'Undo all the file edits you made for the arcade and then run the installer and choose the option to uninstall the arcade.',
	),
	array(
		0 => 'How do I update phpBB Arcade to the latest version?',
		1 => 'Download the latest package.  Upload all the new files overwriting the old. Open the modx update files for the core and style edits and make the required changes.  Then run the included install script.  Choose the option to update to latest version and when complete move/rename/remove the install folder from your server.<br /><br />So for example if you are currently at 0.4.5 and want to update to 0.5.1:
<ul><li>Upload all the new files overwriting the old files</li>
<li>Look inside the contrib folder and follow <strong>update045-050.xml</strong>, then <strong>update045-050prosilver.xml</strong> and finally <strong>update050-051.xml</strong></li>
<li>Run the installer and select the option to update to the latest version</li></ul>',
	),
	array(
		0 => 'How can I check to make sure everything is edited?',
		1 => 'Make sure you running the latest version of the arcade.  Open the install script in your web browser and select the tab that says "Verify", this will check to make sure the arcade is fully installed.',
	),
	array(
		0 => '--',
		1 => 'Scoring',
	),
	array(
		0 => 'Why won\'t my scores save?',
		1 => 'The first thing to check is that the game is of a type supported by the arcade and that the score variable is set correctly.  The next thing to check it to make sure you have edited <strong>index.php</strong> correctly.  If it is not edited correctly then IBPro games will not submit scores.  The last thing to check is the cookie settings in the acp.  If your site url is <strong>http://www.example.com</strong> then the cookie domain should be <strong>.example.com</strong>.',
	),
	array(
		0 => 'Why am I shown the following message after playing a game, "The score submission method does not match the game type"?',
		1 => 'The game scoretype is set incorrectly for that game.  If you view the arcade error log in the ACP you should see the game.  Look for an error type of "Stored and submitted game type do not match". Here you will see the game scoretype (correct) and submitted game scoretype (wrong).  Edit the game to set the correct game scoretype.',
	),
	array(
		0 => 'Why can\'t guests submit scores when the have the correct permissions?',
		1 => 'Even if you give the guest usergroup the correct permission they cannot submit scores to the arcade.  This is by design.',
	),
	array(
		0 => '--',
		1 => 'Games',
	),
	array(
		0 => 'What game types are supported?',
		1 => 'The arcade supports the following game types:<br /><ul><li>Activity Mod</li><li>Arcade Room</li><li>V3 Arcade</li><li>IBPro</li><li>IBPro ArcadeLib</li><li>IBPro V3</li><li>None scoring games</li></ul>',
	),
	array(
		0 => 'What is the easiest way to install games?',
		1 => 'The easiest way would be to use games that are already in phpBB Arcade or IBPro tar format.  The arcade will automatically detect that you are uploading or unpacking an IBPro tar file and convert it to the correct format to be installed.',
	),
	array(
		0 => 'Where can I find the arcadelib files?',
		1 => '<ul><li><a href="http://www.jeffrusso.net/forum/viewtopic.php?f=20&amp;t=1503">Mirror 1</a></li>
		<li><a href="http://igames.origon.dk/forum/viewtopic.php?p=2118#p2118">Mirror 2</a></li>
		<li><a href="http://igames.origon.dk/forum/viewtopic.php?p=3696#p3696">Mirror 3</a></li></ul>',
	),
	array(
		0 => 'What is required for the game to be installed?',
		1 => 'Games you put together yourself need to be uploaded to (by default) <strong>http://www.example.com/phpBB/arcade/games/</strong> inside a folder that has the same name as the swf file name.  If the flash file is named <strong>test.swf</strong>.  Inside the <strong>http://www.example.com/phpBB/arcade/games/</strong> would be a folder called <strong>test</strong>.<br /><br />Inside this folder would be:<br /><ul><li>test.swf (flash)</li><li>test.gif (50px by 50 px)</li><li>test.php (install file, if not present game will not install)</li><li>index.htm (blank html file)</li></ul>',
	),
	array(
		0 => 'How can I install a game?',
		1 => 'There are three ways to install a game.<br /><ul><li>If you download the game using the phpBB Arcade\'s built in download system you will be provided with a compressed folder that you can upload via FTP to <strong>http://www.example.com/phpBB/arcade/install</strong> and install through the ACP.</li><li>If you download the game using the phpBB Arcade\'s built in download system you will be provided with a compressed folder that you can upload via the ACP Upload/Unpack module. Once uploaded the game will be unpacked automatically and you will be able to add the game to the arcade.</li><li>Another option is to upload all the files in the correct location on the server and then go to the ACP and install the game.</li></ul>',
	),
	array(
		0 => 'Can I create my own compressed file to install a game?',
		1 => 'Yes.  The process is very easy.  All you need to do is create a folder with the same name as the swf file and in that folder place the gamename.swf, gamename.gif, gamename.php and index.htm files.  Then zip the folder and make sure that it has same name as the swf file.',
	),
	array(
		0 => 'Is there a sample install file?',
		1 => 'Sample with extra files:<br />
<textarea rows="30" readonly="readonly" wrap="off"><?php
/**
*    Installation File How-to
*
*    Below are the parameters that must be set for a game to be installed into
*    the arcade.  There is no current way (and there will probably not be one)
*    to manually install games from the ACP.
*
*    You need this file for the game to show up in the ACP to install.
*
*    The only items that need to be set are the games name, description,
*    width, height, type, scoretype and files.
*
*	 The arcade supports 7 types of games. (Activity Mod, IBPro, IBPro arcadelib,
*	 V3Arcade, IBProV3, Arcade room and games that do not submit scores)
*	 Use the following constants for the type:
*
*	 AMOD_GAME
*	 AR_GAME
*	 IBPRO_GAME
*	 IBPRO_ARCADELIB_GAME
*	 V3ARCADE_GAME
*	 IBPROV3_GAME
*	 NOSCORE_GAME
*
*    The scoretype should either be SCORETYPE_HIGH or SCORETYPE_LOW
*    these constants are defined in the main arcade class already.
*    SCORETYPE_HIGH is for games that score so that the best score is
*    the highest.  SCORETYPE_LOW is for games that score so that the
*    best score is the lowest.
*
*    The game_files item contains an array of any extra files and/or directories
*    that are need for the game to run that are not in the same folder as the main
*    game.  They should be listed without the path from the phpbb root.
*
*    The following example would be if the game required three( 3) files:
*
*    \'game_files\'        => array (
*        0    => \'arcade/gamedata/snake/scores.swf\',
*        1    => \'arcade/games/snake/scores.swf\',
*        2    => \'arcade/gamedata/games/snake/scores.swf\',
*    )
*
*    If there are no extra files the item should be set to false:
*
*    \'game_files\'        => false,
*/

if (!defined(\'IN_PHPBB\'))
{
	exit;
}

$game_file = basename(__FILE__, \'.\' . $phpEx);

$game_data = array(
	\'game_name\'			=> \'Snake\',
	\'game_desc\'			=> \'Eat the apples and don&#39;t hit the walls.... or yourself.\',
	\'game_image\'			=> $game_file.\'.gif\',
	\'game_swf\'				=> $game_file.\'.swf\',
	\'game_scorevar\'			=> $game_file,
	\'game_type\'			=> IBPROV3_GAME,
	\'game_width\'			=> 360,
	\'game_height\'			=> 300,
	\'game_scoretype\'			=> SCORETYPE_HIGH,
	\'game_files\'			=> array (
		0 	=> \'arcade/gamedata/snake/snake.txt\',
		1 	=> \'arcade/gamedata/snake/v3game.txt\',
	),
);
?></textarea><br /><br />
Sample without extra files:<br />
<textarea rows="30" readonly="readonly" wrap="off"><?php
/**
*    Installation File How-to
*
*    Below are the parameters that must be set for a game to be installed into
*    the arcade.  There is no current way (and there will probably not be one)
*    to manually install games from the ACP.
*
*    You need this file for the game to show up in the ACP to install.
*
*    The only items that need to be set are the games name, description,
*    width, height, type, scoretype and files.
*
*	 The arcade supports 7 types of games. (Activity Mod, IBPro, IBPro arcadelib,
*	 V3Arcade, IBProV3, Arcade room and games that do not submit scores)
*	 Use the following constants for the type:
*
*	 AMOD_GAME
*	 AR_GAME
*	 IBPRO_GAME
*	 IBPRO_ARCADELIB_GAME
*	 V3ARCADE_GAME
*	 IBPROV3_GAME
*	 NOSCORE_GAME
*
*    The scoretype should either be SCORETYPE_HIGH or SCORETYPE_LOW
*    these constants are defined in the main arcade class already.
*    SCORETYPE_HIGH is for games that score so that the best score is
*    the highest.  SCORETYPE_LOW is for games that score so that the
*    best score is the lowest.
*
*    The game_files item contains an array of any extra files and/or directories
*    that are need for the game to run that are not in the same folder as the main
*    game.  They should be listed without the path from the phpbb root.
*
*    The following example would be if the game required three( 3) files:
*
*    \'game_files\'        => array (
*        0    => \'arcade/gamedata/snake/scores.swf\',
*        1    => \'arcade/games/snake/scores.swf\',
*        2    => \'arcade/gamedata/games/snake/scores.swf\',
*    )
*
*    If there are no extra files the item should be set to false:
*
*    \'game_files\'        => false,
*/

if (!defined(\'IN_PHPBB\'))
{
	exit;
}

$game_file = basename(__FILE__, \'.\' . $phpEx);

$game_data = array(
	\'game_name\'			=> \'Snake\',
	\'game_desc\'			=> \'Eat the apples and don&#39;t hit the walls.... or yourself.\',
	\'game_image\'			=> $game_file.\'.gif\',
	\'game_swf\'				=> $game_file.\'.swf\',
	\'game_scorevar\'			=> $game_file,
	\'game_type\'			=> IBPROV3_GAME,
	\'game_width\'			=> 360,
	\'game_height\'			=> 300,
	\'game_scoretype\'			=> SCORETYPE_HIGH,
	\'game_files\'			=> false,
);
?></textarea>',
	),
	array(
		0 => 'Do I have to create the install file by hand?',
		1 => 'No, although its possible there are three tools in the phpBB Arcade ACP that will help in this task.<br /><ul><li>There is a tool to create and install file from scratch.  Just enter all the required information and you can have the install file downloaded, displayed or created on the server.</li><li>There is a tool to download or view existing install files from the games already installed.</li><li>There is a tool that will allow you to convert an IBPro install file to the format required for the phpBB Arcade.  Once converted you can have the file either downloaded, displayed or created on the server.</li></ul>',
	),
	array(
		0 => 'Why do I have to list the extra files in the install file?',
		1 => 'While you technically don\'t have to list the extra files to use the game with the phpBB Arcade, if you use the built in download sytem you will not get the whole game when downloaded.  This will cause the game to be unplayable for others if you offer downloads.',
	),
	/*array(
		0 => 'I am still confused... Is there a tutorial to install games that are not packaged correctly for the phpBB Arcade?',
		1 => '<a href="http://www.jeffrusso.net/forum/files/downloads/flash/convert_game.zip">Download flash file to view locally<a/>',
	),*/
	array(
		0 => 'How do I delete games?',
		1 => 'You are able to delete games by clicking the "Manage arcade" module in the acp. You can also use the "Edit games" module to select a game to delete. Keep in mind that once the game is deleted the files will still reside on the server and must be manually removed.',
	),
	array(
		0 => '--',
		1 => 'Arcade ACP Modules',
	),
	array(
		0 => 'What ACP Modules does phpBB Arcade have?',
		1 => '<ul>
		<li><strong>General settings</strong> - Control general settings for the arcade</li>
		<li><strong>Game settings</strong> - Control game settings for the arcade</li>
		<li><strong>Feature settings</strong> - Control feature settings for the arcade</li>
		<li><strong>Page settings</strong> - Control page settings for the arcade</li>
		<li><strong>Path settings</strong> - Control path settings for the arcade</li>
		<li><strong>Manage arcade</strong> - Add, edit, delete, move and resync categories and games</li>
		<li><strong>Add games</strong> - Add a game to the arcade, mulitple games can be added to a category at once</li>
		<li><strong>Download games</strong> - Download games from sites that are hosting game downloads ready to use with the arcade</li>
		<li><strong>Edit games</strong> - Edit any details about a game</li>
		<li><strong>Edit scores</strong> - Edit scores for any of the games</li>
		<li><strong>Upload/Unpack games</strong> - Uploads and extracts compressed games downloaded from built in download system or to correct folder(s) to install</li><li><strong>Add games</strong> - Install game to a specified category</li>
		<li><strong>Create game install file</strong> - Create new install file to download/view/save on server or download/view existing games install file</li>
		<li><strong>Convert IBP game install file</strong> - Convert the install file included with IBPro games to the correct format to work with the phpBB Arcade</li>
		<li><strong>Download Statistics</strong> - View statistics of the download system</li>
		<li><strong>View errors</strong> - View any errors logged by the arcade</li>
		<li><strong>View reports</strong> - View any reports submitted by users about a game</li>
		<li><strong>User guide</strong> - Displays the arcade user guide</li>
		<li><strong>Permissions</strong> - Muliple modules to control the local category based permissions of the arcade, these mimic the phpBB forum permissions</li></ul>',
	),
	array(
		0 => 'How come I cannot see all the ACP modules for the arcade?',
		1 => 'To see all the modules you need to be set as a founder or have the correct administrative permissions set.  If you still cannot see all the modules then most likely there are duplicate auth options in the acl_options table.  Please run the install check for a list of duplicate values.',
	),
	array(
		0 => 'Where are the permissions to set?/Why don\'t I have permission to view/use the phpBB Arcade?',
		1 => 'Once the arcade is installed, you will need to set the permissions to use it. The arcade uses category based permissions that mimic the forum based permissions that phpBB3 uses, including the use of roles. Also, you can use administrator permissions to set user/group access to phpBB Arcade ACP modules as well.',
	),
	array(
		0 => 'Why can\'t I add any games?',
		1 => 'To add games you first must make sure that there are categories created to add them too.  Use the <strong>Manage arcade</strong> ACP Module to do this.  Creating them is very similar to creating forums in phpBB3.',
	),
	array(
		0 => 'How do I use the "Convert IBP game install file" module?',
		1 => 'Open the IBPro game install file and copy the <strong>$config</strong> variable.<br /><br />For example:<br /><textarea rows="15" readonly="readonly">$config = array(
	\'active\'		=> \'1\',
	\'bgcolor\'		=> \'0\',
	\'gcat\'		=> \'1\',
	\'gheight\'		=> \'570\',
	\'gkeys\'		=> \'mouse\',
	\'gname\'		=> \'flashcirclev2MICRO\',
	\'gtitle\'		=> \'Flash Circle TD\',
	\'gwidth\'		=> \'735\',
	\'gwords\'		=> \'See in game\',
	\'object\'		=> \'See in game\',
	\'snggame\'		=> \'0\',
);</textarea><br />Paste this in the correct textarea in the ACP, select the game type and enter any extra files.  Once done you will be able to download or view the converted file.',
	),
	array(
		0 => 'How do I provide game downloads to others?',
		1 => 'The ability to download games is controlled by the arcade permissions.  Set the permission how you want and people browsing the arcade will see the download links when viewing the games in the categories.  To make it easier to download the games you can enable the download listing setting in the phpBB Arcade ACP settings.  This will allow others to use the "Download games" ACP module to access the downloads on your site.',
	),
	array(
		0 => 'How do I use the "Download games" module?',
		1 => 'All you have to do is enter the url to the phpBB forum root of the site that is offering arcade downloads from their installation of the phpBB Arcade.  You will then see a listing of games available to download.  If the game is highlighted in green, this is because the same game was found on your server. Please keep in mind that the downloads are still controlled by the permissions on the site you are downloading them from.  So you might have to be logged in and/or part of a special usergroup to download games.  Contact the site admininstrator if you have any questions.<br /><br /><a href="http://img148.imageshack.us/my.php?image=dlgamesssuq3.png" target="_blank"><img src="http://img148.imageshack.us/img148/817/dlgamesssuq3.th.png" border="0" alt="Download games" /></a>',
	),
	array(
		0 => 'Why doesn\'t the "Download games" module ever find any games?',
		1 => 'This module needs to have <strong>"allow_url_fopen"</strong> set to on or PHP\'s <strong>cURL library</strong> installed.  This can be checked by viewing the phpinfo() of your server.  If the value for <strong>"allow_url_fopen"</strong> is off and the <strong>cURL library</strong> is not installed the module will not work.',
	),
	array(
		0 => '--',
		1 => 'Points Systems',
	),
	array(
		0 => 'What points systems are supported?',
		1 => '<ul>
		<li>Cash Mod</li>
		<li>Simple Points System</li>
		<li>Points System</li>
		</ul>',
	),
	array(
		0 => 'How does the points system integration work?',
		1 => 'You can set a cost and reward per game, category or global setting.  You can use any combination of these. The game settings override the category settings which override the global settings. There is also a jackpot setting.  This setting can also be set globally, per category or per game. Every time the user plays and does not win the cost is put into the jackpot.  The jackpot is not increased if the user did not pay to play the game. The jackpot can be manually set by editing the game in the acp. You can also set games cost and/or reward to -1 to have the game be free and/or reward nothing.',
	),
	array(
		0 => '--',
		1 => 'Display arcade data outside arcade',
	),
	array(
		0 => 'How do I display the arcade data on external pages?',
		1 => 'You must have the following lines of code to display the arcade data properly:<br />
<textarea rows="6" readonly="readonly">include($phpbb_root_path . \'includes/arcade/arcade_common.\' . $phpEx);
// Initialize arcade auth
$auth_arcade->acl($user->data);
// Initialize arcade class
$arcade = new arcade(false);</textarea><br /><br />Also make sure to use the following functions to display data:
	<ul>
	<li><strong>$arcade->number_format()</strong> - All numbers displayed should go through this function to make sure they are displayed correctly to the user</li>
	<li><strong>$arcade->time_format()</strong> - Convert a time in seconds to days/hours/mins/secs</li>
	<li><strong>$arcade->get_username_string()</strong> - Correctly link to arcade profile and color a username</li>
	</ul>',
	),
	array(
		0 => 'Is there a sample portal block file?',
		1 => 'Yes, the following sample will display the newest games, total games and the latest highscores.<br /><br />Block php code:<br />
<textarea rows="20" readonly="readonly" wrap="off">if (file_exists($phpbb_root_path . \'includes/arcade/arcade_common.\' . $phpEx))
{
	include($phpbb_root_path . \'includes/arcade/arcade_common.\' . $phpEx);
	// Initialize arcade auth
	$auth_arcade->acl($user->data);
	// Initialize arcade class
	$arcade = new arcade(false);

	foreach($arcade->newest_games as $newest_games)
	{
		$template->assign_block_vars(\'newest_games\', array(
			\'U_GAME_PLAY\'	=> append_sid("{$phpbb_root_path}arcade.$phpEx", \'mode=play&amp;g=\' . $newest_games[\'game_id\']),
			\'GAME_IMAGE\'	=> ($newest_games[\'game_image\'] != \'\') ? $phpbb_root_path . "arcade.$phpEx?img=" . $newest_games[\'game_image\'] : \'\',
			\'GAME_NAME\'		=> $newest_games[\'game_name\'],
		));
	}

	$total_games = sizeof($arcade->games);
	if ($total_games > 1)
	{
		$total_games = sprintf($user->lang[\'ARCADE_TOTAL_GAMES\'], $arcade->number_format($total_games));
	}
	else if ($total_games == 1)
	{
		$total_games = sprintf($user->lang[\'ARCADE_TOTAL_GAME\'], $arcade->number_format($total_games));
	}

	$template->assign_vars(array(
		\'S_ARCADE_BLOCK\'		=> true,
		\'TOTAL_GAMES\'			=> $total_games,
		\'TOTAL_GAMES_PLAYED\'	=> ($arcade->totals[\'games_played\']) ? sprintf($user->lang[\'ARCADE_TOTAL_PLAYED\'], $arcade->number_format($arcade->totals[\'games_played\']), $arcade->time_format($arcade->totals[\'games_time\'])) : \'\',
	));

	// Start of Lastest highscores
	foreach($arcade->latest_highscores as $latest_highscore)
	{
		$last_scoregame = \'<a href="\' . append_sid("arcade.$phpEx?mode=play&amp;g=" . $latest_highscore[\'game_id\']) . \'">\' . $latest_highscore[\'game_name\'] . \'</a>\';
		$last_scoreuser = $arcade->get_username_string(\'full\', $latest_highscore[\'game_highuser\'], $latest_highscore[\'username\'], $latest_highscore[\'user_colour\']);
		$last_score = $arcade->number_format($latest_highscore[\'game_highscore\']);

		$template->assign_block_vars(\'latest_scores\', array(
			\'L_HEADING_CHAMP\' => sprintf($user->lang[\'ARCADE_WELCOME_CHAMP\'], $last_scoreuser, $last_scoregame, $last_score),
			\'L_HEADING_DATE\' => $user->format_date($latest_highscore[\'game_highdate\']),
		));
	}
	// End Lastest Highscores
}</textarea><br /><br />Block html code:<br />
<textarea rows="15" readonly="readonly" wrap="off"><!-- IF S_ARCADE_BLOCK -->
<h3>{L_ARCADE}</h3>
<div class="panel">
	<div class="inner"><span class="corners-top"><span></span></span>
		<div class="content">
			<!-- BEGIN newest_games -->
				<p style="margin: 4px;"><!-- IF newest_games.GAME_IMAGE --><a href="{newest_games.U_GAME_PLAY}"><img src="{newest_games.GAME_IMAGE}" alt="{newest_games.GAME_NAME}" width="20" height="20" style="vertical-align: middle;" /></a><!-- ENDIF -->&nbsp;{newest_games.GAME_NAME}</p>
			<!-- END newest_games -->
			<!-- IF TOTAL_GAMES -->
			<br />
			<p style="text-align: center;">{TOTAL_GAMES}</p>
			<!-- ENDIF -->
			<!-- IF .latest_scores -->
				<ul>
			<!-- BEGIN latest_scores -->
					<li><span style="float: right;">{latest_scores.L_HEADING_DATE}</span>{latest_scores.L_HEADING_CHAMP}</li>
			<!-- END latest_scores -->
				</ul>
			<!-- ELSE -->
				<div style="text-align: center;">{L_ARCADE_NO_LATEST_HIGHSCORES}</div>
			<!-- ENDIF -->
		</div>
	<span class="corners-bottom"><span></span></span></div>
</div>
<!-- ENDIF --></textarea>',
),
);

?>