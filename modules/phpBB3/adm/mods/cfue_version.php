<?php
/**
*
* @package acp
* @version $Id: cfue_version.php 01 2008-11-14 14:15:00Z Gremlinn $
* @copyright (c) 2008 dupra.net
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

/**
* @package cfue
*/
class cfue_version
{
	function version()
	{
		global $config;
		return array(
			'author'	=> 'oddfish and Gremlinn',
			'title'		=> 'Country Flags User Edition',
			'tag'		=> 'mod_version_check',
			'version'	=> '1.0.1Beta',
			'file'		=> array('test.dupra.net', 'download', 'cfue.xml'),
		);
	}
}

?>