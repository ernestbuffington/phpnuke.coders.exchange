<?php
/**
*
* @package phpBB3
* @version $Id: prime_links.php,v 1.0.6 2008/04/11 10:35:00 primehalo Exp $
* @copyright (c) 2007-2008 Ken F. Innes IV
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

/**
 * rectorphp left me hanging again and could not refactor this file! Whats up Tomas?
 */
if (!defined('IN_PHPBB'))
{
	exit;
}

/**
* Make sure this file has not already been included.
*/
if (!defined('INCLUDES_PRIME_LINKS'))
{
	define('INCLUDES_PRIME_LINKS', true);
	// Options
	define('REMOVE_SUBDOMAINS', true);		// Specify subdomains to be removed before checking the link, separated by semicolons (setting TRUE will remove all subdomains)
	define('USE_TARGET_ATTRIBUTE', false);	// The attribute "target" is not valid for STRICT doctypes
	define('EXTERNAL_LINK_PREFIX', '');		// Example: 'http://anonym.to?'
	// Link relationships
	define('INTERNAL_LINK_REL', '');
	define('EXTERNAL_LINK_REL', 'nofollow');
	// Link targets
	define('INTERNAL_LINK_TARGET', '');
	define('EXTERNAL_LINK_TARGET', '_blank');
	// Link classes
	define('INTERNAL_LINK_CLASS', 'postlink-local');
	define('EXTERNAL_LINK_CLASS', '');
	/**
	*/
	function prime_links($text)
	{
		$prime_links = new prime_links();
		return($prime_links->modify_links($text));
	}

	/**
	*/
	class prime_links
	{
		/**
		* Constructor
		*/
		function __construct()
		{
		}

		/**
		* Decodes all HTML entities. The html_entity_decode() function doesn't decode numerical entities,
		* and the htmlspecialchars_decode() function only decodes the most common form for entities.
		*/
		function decode_entities($text)
		{
			$text = html_entity_decode($text, ENT_QUOTES, 'ISO-8859-1'); 		//UTF-8 does not work!
			$text = preg_replace('/&#(\d+);/me', 'chr($1)', $text); 			//decimal notation
			$text = preg_replace('/&#x([a-f0-9]+);/mei', 'chr(0x$1)', $text);	//hex notation
			return($text);
		}

		/**
		* Removes subdomains from a URL. If no subdomains are provided
		* as an input parameter, all subdomains will be removed.
		*/
		function remove_subdomains($url, $remove_subdomains = true)
		{
			$stripped_url = $url;
			if ($remove_subdomains !== false && strpos($url, '//') !== false)
			{
				$url_parts = parse_url($url);
				if ($remove_subdomains && is_string($remove_subdomains))
				{
					str_replace(';', '|', $remove_subdomains);
					str_replace('.', '\\.', $remove_subdomains);
					$stripped_url = preg_replace('#^(http|https)://(?:' . $remove_subdomains . '\.)([^/]+)#i', '$1://$2', $url);
				}
				else if (!empty($url_parts['host']) && substr($url_parts['host'], -9) == 'localhost') // Domain could have a port number, but it's too rare a case with localhost
				{
					$stripped_url = preg_replace('#^(http|https)://[^/]+\.localhost#i', '$1://localhost', $url);
				}
				else
				{
					$stripped_url = preg_replace('#^(http|https)://[^/]+\.([a-z0-9-]+\.(?:aero|biz|com|coop|info|jobs|museum|name|net|org|pro|travel|gov|edu|mil|int))#i', '$1://$2', $url);
					if ($stripped_url == $url)
					{
						$stripped_url = preg_replace('#^(http|https)://[^/]+?\.([a-z0-9-]+(?:\.[a-z]{2})?\.(?:ac|ad|ae|af|ag|ai|al|am|an|ao|aq|ar|as|at|au|aw|ax|az|ba|bb|bd|be|bf|bg|bh|bi|bj|bl|bm|bn|bo|br|bs|bt|bv|bw|by|bz|ca|cc|cd|cf|cg|ch|ci|ck|cl|cm|cn|co|cr|cu|cv|cx|cy|cz|de|dj|dk|dm|do|dz|ec|ee|eg|eh|er|es|et|eu|fi|fj|fk|fm|fo|fr|ga|gb|gd|ge|gf|gg|gh|gi|gl|gm|gn|gp|gq|gr|gs|gt|gu|gw|gy|hk|hm|hn|hr|ht|hu|id|ie|il|im|in|io|iq|ir|is|it|je|jm|jo|jp|ke|kg|kh|ki|km|kn|kp|kr|kw|ky|kz|la|lb|lc|li|lk|lr|ls|lt|lu|lv|ly|ma|mc|md|me|mf|mg|mh|mk|ml|mm|mn|mo|mp|mq|mr|ms|mt|mu|mv|mw|mx|my|mz|na|nc|ne|nf|ng|ni|nl|no|np|nr|nu|nz|om|pa|pe|pf|pg|ph|pk|pl|pm|pn|pr|ps|pt|pw|py|qa|re|ro|rs|ru|rw|sa|sb|sc|sd|se|sg|sh|si|sj|sk|sl|sm|sn|so|sr|st|su|sv|sy|sz|tc|td|tf|tg|th|tj|tk|tl|tm|tn|to|tp|tr|tt|tv|tw|tz|ua|ug|uk|um|us|uy|uz|va|vc|ve|vg|vi|vn|vu|wf|ws|ye|yt|yu|za|zm|zw))#i', '$1://$2', $url);
					}
				}
			}
			return($stripped_url);
		}


		/**
		* Determines if a URL is local or external. If no valid-ish scheme is found,
		* assume a relative (thus internal) link that happens to contain a colon (:).
		*/
		function is_link_local($url, $board_url = false)
		{
			$url = utf8_case_fold_nfc($url);
			if ($board_url === false)
			{
				$board_url = generate_board_url(true);
				$board_url = $this->remove_subdomains($board_url, REMOVE_SUBDOMAINS);
			}

			// Treat http and https as the same scheme
			$board_url	= (strpos($board_url, 'https://') === 0) ? ('http' . substr($board_url, 5)) : $board_url;
			$url 		= (strpos($url		, 'https://') === 0) ? ('http' . substr($url, 		5)) : $url;

			// Compare the URLs
			if (!($is_local = (strpos($url, utf8_case_fold_nfc($board_url)) === 0)))
			{
				// If there is no scheme, then it's probably a relative, local link
				$scheme = substr($url, 0, strpos($url, ':'));
				//$is_local = !$scheme || ($scheme && !in_array($scheme, array('http', 'https', 'mailto', 'ftp', 'gopher')));
				$is_local = !$scheme || ($scheme && !preg_match('/^[a-z0-9.]{2,16}$/i', $scheme));
			}
			return($is_local);
		}

		/**
		*/
		function insert_attribute($attr_name, $new_attr, $link, $overwrite = true)
		{
			$javascript	= (strpos($attr_name, 'on') === 0); // onclick, onmouseup, onload, etc.
			$old_attr	= preg_replace('/^.*' . $attr_name . '="([^"]*)".*$/i', '$1', $link);
			$is_attr	= !($old_attr == $link);
			$old_attr	= ($is_attr) ? $old_attr : ''; // Was attribute found?

			if ($javascript)
			{
				if ($is_attr && !$overwrite)
				{
					$old_attr = ($old_attr && ($last_char = substr(trim($old_attr), -1)) && $last_char != '}' && $last_char != ';') ? $old_attr . ';' : $old_attr; // Ensure we can add code after any existing code
					$new_attr = $old_attr . $new_attr;
				}
				$overwrite = true;
			}

			if ($overwrite && is_string($overwrite))
			{
				if (strpos(' ' . $overwrite . ' ', ' ' . $old_attr . ' ') !== false)
				{
					// Overwrite the specified value if it exists, otherwise just append the value.
					$new_attr = trim(str_replace(' '  . $overwrite . ' ', ' ' . $new_attr . ' ', ' '  . $old_attr . ' '));
				}
				else
				{
					$overwrite = false;
				}
			}
			if (!$overwrite)
			{
				 // Append the new one if it's not already there.
				$new_attr = strpos(' ' . $old_attr . ' ', ' ' . $new_attr . ' ') === false ? trim($old_attr . ' ' . $new_attr) : $old_attr;
			}

			$link = $is_attr ? str_replace("$attr_name=\"$old_attr\"", "$attr_name=\"$new_attr\"", $link) : str_replace('>', " $attr_name=\"$new_attr\">", $link);
			return($link);
		}

		/**
		*/
		function modify_links($message)
		{
			// A quick check before we start using regular expressions
			if (strpos($message, '<a ') === false)
			{
				return($message);
			}
			$board_url = generate_board_url(true);
			$board_url = $this->remove_subdomains($board_url, REMOVE_SUBDOMAINS);
			preg_match_all('/(<a[^>]+?>)/i', $message, $matches, PREG_SET_ORDER);
			foreach ($matches as $links)
			{
				$is_local 	= false;
				$link		= $new_link = $links[0];
				$href		= preg_replace('/^.*href="([^"]*)".*$/i', '$1', $link);
				if ($href == $link) //no link was found
				{
					continue;
				}
				$href		= $this->decode_entities($href);
				$scheme		= substr($href, 0, strpos($href, ':'));
				if ($scheme && $scheme != 'http' && $scheme != 'https') // Only classify links for these schemes (or no scheme)
				{
					continue;
				}
				$href 		= $this->remove_subdomains($href, REMOVE_SUBDOMAINS);
				$is_local 	= $this->is_link_local($href, $board_url);
				$new_class	= $is_local ? INTERNAL_LINK_CLASS  : EXTERNAL_LINK_CLASS;
				$new_target	= $is_local ? INTERNAL_LINK_TARGET : EXTERNAL_LINK_TARGET;
				$new_rel	= $is_local ? INTERNAL_LINK_REL    : EXTERNAL_LINK_REL;

				if ($new_class)
				{
					$new_link = $this->insert_attribute('class', $new_class, $new_link, 'postlink');
				}

				if ($new_target)
				{
					if (USE_TARGET_ATTRIBUTE === true)
					{
						$new_link = $this->insert_attribute('target', $new_target, $new_link, true);
					}
					else
					{
						$new_link = $this->insert_attribute('onclick', "this.target='$new_target';", $new_link, false);
					}
				}

				if ($new_rel)
				{
					$new_link = $this->insert_attribute('rel', $new_rel, $new_link, false);
				}

				if (!$is_local && EXTERNAL_LINK_PREFIX)
				{
					$new_link	=  str_replace('href="', 'href="' . EXTERNAL_LINK_PREFIX, $new_link);
				}
				$searches[]		= $link;
				$replacements[]	= $new_link;
			}
			if (isset($searches) && isset($replacements))
			{
				$message = str_replace($searches, $replacements, $message);
			}
			return($message);
		}
	}
}

?>
