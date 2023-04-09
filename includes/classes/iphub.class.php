<?php

/************************************************************************/
/* PHP-NUKE: Advanced Content Management System                         */
/* ============================================                         */
/*                                                                      */
/* Copyright (c) 2002 by Francisco Burzi                                */
/* http://phpnuke.org                                                   */
/*                                                                      */
/* This program is free software. You can redistribute it and/or modify */
/* it under the terms of the GNU General Public License as published by */
/* the Free Software Foundation; either version 2 of the License.       */
/************************************************************************/

class Lookup {
	public static function isBadIP($ip, $key, $strict) {
		$ch = curl_init();
		curl_setopt_array($ch, [
			CURLOPT_URL => "http://v2.api.iphub.info/ip/{$ip}",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_HTTPHEADER => ["X-Key: {$key}"]
		]);
		try {
			$block = json_decode(curl_exec($ch))->block;
		} catch (Exception $e) {
			throw $e;
		}
		if ($block) {
			if ($strict) {
				return true;
			} elseif (!$strict && $block === 1) {
				return true;
			}
		}
		return false;
	}
}