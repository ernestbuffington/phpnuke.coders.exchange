<?php

if (realpath(__FILE__) == realpath($_SERVER['SCRIPT_FILENAME'])) {
	exit('Access Denied');
}

function cache_delete( $name, $cat='config' ) 
{
	global $ZendCache;
	return $ZendCache->delete($name, $cat);
}

function cache_set( $name, string $cat = null, $fileData )
{
	if(!isset($cat))
	$cat = 'config';

	global $ZendCache;
	return $ZendCache->save($name, $cat, $fileData);
}

function cache_load($name, $cat='config')
{
	global $ZendCache;
	return $ZendCache->load($name, $cat);
}

function cache_clear()
{
	global $ZendCache;
	$ZendCache->clear();
}

function cache_resync()
{
	global $ZendCache;
	$ZendCache->resync();
}

?>