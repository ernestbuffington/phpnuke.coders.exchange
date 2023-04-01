/**
*
* @package Ajax Shoutbox
* @version $Id: static.js 181 2007-11-10 11:30:53Z paul $
* @copyright (c) 2007 Paul Sohier
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/
var div ,hin, huit, hin2, hsmilies, hinfo, hdelete, hnr;
var config = new Array();
var post_info = timer_in = last = null;
var display_shoutbox = false;
var start = first = true;
var smilies = false;
var count = 0;
var form_name = 'chat_form';
var text_name = 'chat_message';
var bbcode = new Array();
var bbtags = new Array('[b]','[/b]','[i]','[/i]','[u]','[/u]', '[img]','[/img]', '[url]', '[/url]');

function err_msg(title)
{
	var err = new Error(title);

	if (!err.message)
	{
		err.message = title;
	}

	err.name = "E_USER_ERROR";// Php error?!? :D
	return err;
}

function parse_xml_to_html(xml)
{
	try
	{
		if (xml.childNodes.length == 0)
		{
			return tn('');
		}
		else if (xml.childNodes.length == 1 && xml.childNodes[0].nodeValue != null)
		{
			// With a tag in it, its bigger as 1?

			return tn(xml.childNodes[0].nodeValue);
		}
		else
		{
			var div = ce('span');
			loop:

			for (var i = 0; i < xml.childNodes.length; i++)
			{

				switch (xml.childNodes[i].nodeType)
				{
					case 3:
						div.appendChild(document.createTextNode(xml.childNodes[i].nodeValue));
					break;

					case 9:
					case 8:
					case 10:
					case 11:
						// continue;
					break;

					case 1:
						if (xml.childNodes[i].childNodes.length == 0 && xml.childNodes[i].nodeName != 'br' && xml.childNodes[i].nodeName != 'img' && xml.childNodes[i].nodeName != 'hr')
						{
							break;
						}

						// This is a difficult one :)
						switch (xml.childNodes[i].nodeName)
						{
							case 'blockquote':
								var q = ce('blockquote');
								q.className = 'quote';
								q.appendChild(parse_xml_to_html(xml.childNodes[i]));
								add_style(xml.childNodes[i], q);
								div.appendChild(q);
							break;

							case 'a':
								var a = ce('a');

								a.href = xml.childNodes[i].getAttribute('href');
								a.appendChild(parse_xml_to_html(xml.childNodes[i]));

								add_style(xml.childNodes[i], a);

								div.appendChild(a);
							break;

							case 'img':
								var img = ce('img');

								img.alt = xml.childNodes[i].getAttribute('alt');
								img.src = xml.childNodes[i].getAttribute('src');
								img.border = 0;
								add_style(xml.childNodes[i], img);

								div.appendChild(img);
							break;
							
							case 'script':
							    // Bad boy, die.
							    return;
							break;

							default:
							{
								try
								{
								    var e = ce(xml.childNodes[i].nodeName);
								}
								catch (e)
								{
									break;
								}
								e.appendChild(parse_xml_to_html(xml.childNodes[i]));

								add_style(xml.childNodes[i], e);
								div.appendChild(e)
							}
						}
					break;
				}
			}
		}
		return div;
	}
	catch (e)
	{
		handle(e);
		return div;
	}
}
function add_style(element, html)
{
	var Class = element.getAttribute('class');

	if (Class != null)
	{
		html.className = Class;
	}

	var styles = element.getAttribute('style');

	if (styles == null)
	{
		return;
	}
	if (styles.indexOf(';') == -1)
	{
		styles += ';';
	}
	styles = styles.split(';');
	for (var j = 0; j < styles.length; j++)
	{
		var style = styles[j].split(':');

		if (style[0])
		{
			style[0] = trim(style[0]);
		}

		if (style[1])
		{
			style[1] = trim(style[1]);
		}

		switch (style[0])
		{
			case 'font-style':
				html.style.fontStyle = style[1];
			break;

			case 'font-weight':
				html.style.fontWeight = style[1];
			break;

			case 'font-size':
				try
				{
					html.style.fontSize = style[1];
				}
				catch (e){}
			break;

			case 'line-height':
				html.style.lineHeigt = style[1];
			break;

			case 'color':
				html.style.color = style[1];
			break;

			case 'text-decoration':
				html.style.textDecoration = style[1];
			break;
		}
	}
}

function trim(value)
{
	value = value.replace(/^\s+/,'');
	value = value.replace(/\s+$/,'');
	return value;
}
function http()
{
	try
	{
		var http_request = false;
		if (window.XMLHttpRequest)
		{ // Mozilla, Safari,...
			http_request = new XMLHttpRequest();
			if (http_request.overrideMimeType)
			{
				http_request.overrideMimeType('text/xml');
			}
		}
		else if (window.ActiveXObject)
		{ // IE
			try
			{
				http_request = new ActiveXObject('Msxml2.XMLHTTP');
			}
			catch (e)
			{
				try
				{
					http_request = new ActiveXObject('Microsoft.XMLHTTP');
				}
				catch (e)
				{
				}
			}
		}

		if (!http_request)
		{
			 throw err_msg(no_ajax());
		}
		return http_request;

	}
	catch (e)
	{
		handle(e);
		return false;
	}
}
function message(msg, color)
{
	try
	{
		if (document.getElementById('msg_txt') != null)
		{
			document.getElementById('msg_txt').innerHTML = '';
			var tmp = ce('p');
			tmp.appendChild(tn(msg));
			if (color)
			{
				tmp.style.color = 'red';
			}
			document.getElementById('msg_txt').appendChild(tmp);
		}
		else
		{
			div.innerHTML = '';
			var tmp = ce('p');
			tmp.appendChild(tn(msg));
			if (color)
			{
				tmp.style.color = 'red';
			}
			div.appendChild(tmp);
		}
	}
	catch (e)
	{
		handle(e);
		return false;
	}
}

/**
 * Lazyness ftw
 *
 */
function ce(e)
{
	return document.createElement(e);
}
function tn(e)
{
	return document.createTextNode(e);
}