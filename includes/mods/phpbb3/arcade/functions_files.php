<?php
/**
*
* @package arcade
* @version $Id: functions_files.php 648 2008-12-09 20:18:05Z JRSweets $
* @copyright (c) 2007, 2008 jrsweets
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

/*
* Some of these function are borrowed from evil<3
* at http://www.phpbbmodders.net from the
* quickinstall mod for phpbb3
*/

/**
* @ignore
*/
if (!defined('IN_PHPBB'))
{
	exit;
}

/**
 * Useful class for directory and file actions
 */
class file_functions
{
	function copy_file($src_file, $dst_file)
	{
		return copy($src_file, $dst_file);
	}

	function delete_file($file)
	{
		return unlink($file);
	}
	
	function move_file($src_file, $dst_file)
	{
		$this->copy_file($src_file, $dst_file);
		$this->delete_file($src_file);
	}

	function copy_dir($src_dir, $dst_dir)
	{
		$this->append_slash($src_dir);
		$this->append_slash($dst_dir);

		if (!is_dir($dst_dir))
		{
			mkdir($dst_dir);
		}

		foreach (scandir($src_dir) as $file)
		{
			if (in_array($file, array('.', '..', '.svn'), true))
			{
				continue;
			}

			$src_file = $src_dir . $file;
			$dst_file = $dst_dir . $file;

			if (is_file($src_file))
			{
				if (is_file($dst_file))
				{
					$ow = filemtime($src_file) - filemtime($dst_file);
				}
				else
				{
					$ow = 1;
				}

				if ($ow > 0)
				{
					if (copy($src_file, $dst_file))
					{
						touch($dst_file, filemtime($src_file));
					}
				}
			}
			else if (is_dir($src_file))
			{
				$this->copy_dir($src_file, $dst_file);
			}
		}
	}

	function delete_dir($dir, $empty = false)
	{
		$this->append_slash($dir);

		if (!file_exists($dir) || !is_dir($dir) || !is_readable($dir))
		{
			return false;
		}

		foreach (scandir($dir) as $file)
		{
			if (in_array($file, array('.', '..', '.svn'), true))
			{
				continue;
			}

			if (is_dir($dir . $file))
			{
				$this->delete_dir($dir . $file);
			}
			else
			{
				$this->delete_file($dir . $file);
			}
		}

		if (!$empty)
		{
			rmdir($dir);
		}
	}
	
	function move_dir($src_dir, $dst_dir)
	{
		$this->copy_dir($src_dir, $dst_dir);
		$this->delete_dir($src_dir);
	}

	function delete_files($dir, $files_ary, $recursive = true)
	{
		$this->append_slash($dir);

		foreach (scandir($dir) as $file)
		{
			if (in_array($file, array('.', '..'), true))
			{
				continue;
			}

			if (is_dir($dir . $file))
			{
				if ($recursive)
				{
					$this->delete_files($dir . $file, $files_ary, true);
				}
			}

			if (in_array($file, $files_ary, true))
			{
				if (is_dir($dir . $file))
				{
					$this->delete_dir($dir . $file);
				}
				else
				{
					$this->delete_file($dir . $file);
				}
			}
		}
	}

	function append_slash(&$dir)
	{
		if ($dir != '' && $dir[strlen($dir) - 1] != '/')
		{
			$dir .= '/';
		}
	}	
	
	function remove_extension($file)
	{
		$ext = strrchr($file, '.');

		if($ext !== false)
		{
		    $file = substr($file, 0, -strlen($ext));
		}
		return $file;
	}

	function filesize($files)
	{
		// Seperate files from directories and calculate the size
		$filesize = 0;		
		$files = (!is_array($files)) ? array($files) : $files;
		
		$dir_list = $file_list = array();
		if (is_array($files))
		{
			foreach ($files as $file)
			{
				if (is_dir($file))
				{
					$dir_list[] = $file;
				}
				else if(file_exists($file))
				{
					$filesize += filesize($file);
				}
			}
		}
		unset($files);

		// If there are directories listed we need to list the files and get the file size
		if (!empty($dir_list))
		{
			foreach ($dir_list as $dir)
			{
				$file_list =  array_merge($file_list, $this->filelist('', $dir));
			}
			unset($dir_list);

			foreach ($file_list as $file)
			{
				if (file_exists($file))
				{
					$filesize += filesize($file);
				}
			}
			unset ($file_list);
		}
		
		return $filesize;
	}
	
	function filelist($path, $dir = '', $ignore = '', $ignore_index = true)
	{
		$list = array();
		$this->append_slash($dir);
		
		if ($files = scandir($path . $dir))
		{
			foreach ($files as $file)
			{
				if ($file == '.' || $file == '..' || $file == '.svn' || preg_match('#\.' . $ignore . '$#i', $file))
				{
					continue;
				}
				
				if ($ignore_index && ($file == 'index.html' || $file == 'index.htm'))
				{
					continue;
				}

				if (is_dir($path . $dir . $file))
				{
					$list = array_merge($list, $this->filelist($path, $dir . $file, $ignore, $ignore_index));
				}
				else
				{
					$list[] = $dir . $file;
				}
			}
		}

		return $list;
	}
}

// This is need to ensure compatability with php4
if (!function_exists('scandir'))
{
	function scandir($directory, $sorting_order = 0)
	{
		$list = array();
		
		$dh = opendir($directory);
		while (($file = readdir($dh)) !== false)
		{
			$list[] = $file;
		}
		closedir($dh);
		
		(!$sorting_order) ? sort($list) : rsort($list);
		
		return $list;
	}
}

?>