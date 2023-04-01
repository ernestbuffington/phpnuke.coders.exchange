<?php
/** 
*
* @package Ajax Shoutbox
* @version $Id: js.php 189 2007-11-14 14:20:27Z paul $
* @copyright (c) 2007 Paul Sohier 
* @license http://opensource.org/licenses/gpl-license.php GNU Public License 
*
*/

/**
* @ignore
*/
define('IN_PHPBB', true);
define('AJAX_DEBUG', false);

$phpbb_root_path = (defined('PHPBB_ROOT_PATH')) ? PHPBB_ROOT_PATH : './'; 
$phpEx = substr(strrchr(__FILE__, '.'), 1);

include ($phpbb_root_path . 'common.' . $phpEx);

error_reporting(0);//Disable error reporting, can be bad for our headers ;)

// Start session management
$user->session_begin(false);
$auth->acl($user->data);
$user->setup('mods/shout');

include ($phpbb_root_path . 'includes/functions_shoutbox.' . $phpEx);

// Be sure $shout_number is set.
// This is done in includes/functions_shoutbox.php.
if (!isset($shout_number))
{
	die;
}

//JS :D
@ob_end_clean();
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); 
header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . 'GMT'); 
header('Cache-Control: no-cache, must-revalidate'); 
header('Pragma: no-cache');
header('Content-type: text/javascript; charset=UTF-8');	

?>
// We like ugly fixes.
is_ie = false;

function handle(e)
{
	switch (e.name)
	{
		//Is it our error? :)
		case "E_USER_ERROR":
		case "E_CORE_ERROR":
			<?php 
			if (AJAX_DEBUG)
			{
				echo 'alert(e.message);';
			}
			else
			{
				echo 'message(e.message, true);';
			}
			?>
			return;
		break;

		default:
		{

			tmp = '<?php echo $user->lang['JS_ERR']; ?> ';
			tmp += e.message;
			if (e.lineNumber)
			{
				tmp += '\n<?php echo $user->lang['LINE'];?>: ';
				tmp += e.lineNumber;
			}
			if (e.fileName)
			{
				tmp += '\n<?php echo $user->lang['FILE'];?>: ';
				tmp += e.fileName;
			}
			<?php if (AJAX_DEBUG)
			{
				echo 'alert(tmp);';
			}
			else
			{
				echo 'message(tmp, true);';
			}
			?>
			return;
		}
	}
}
function load_shout()
{
	try
	{
        var is_ie = ((clientPC.indexOf('msie') != -1) && (clientPC.indexOf('opera') == -1));
		if (display_shoutbox == false)
		{
			return;
		}
		
		if (document.getElementById('shoutbox') == null)
		{
		
			var ev = err_msg('<?php echo $user->lang['MISSING_DIV']; ?>');	
	
			ev.name = 'E_CORE_ERROR';
			throw ev; 
			return;
		}
		else
		{
			div = document.getElementById('shoutbox');

			// Display message ;)
			message('<?php echo $user->lang['LOADING']; ?>');
			// HTTP vars, required to relead/post things.
			
			hin = http();
			
			if (!hin)
			{
				return;
			}
			hin2 = http();
			huit = http();	
			hsmilies = http();
			hnr = http();
			<?php
			if ($auth->acl_get('a_') || $auth->acl_getf_global('m_'))
			{
			?>	
			hinfo = http();
			hdelete = http();
			<?php
			}
			?>
			// Div exists in the html, write it.
			write_main();
		}
	}
	catch (e)
	{
			handle(e);
			return;
	}
}
function write_main()
{
	try
	{
		// Write the base.

		var base = ce('ul');
		base.className = 'topiclist forums';
		base.id = 'base_ul'
		// base.style.height = '210px';

		var li = ce('li');
		li.style.display = 'none';
		var dl = ce('dl');
		dl.style.width = '98%';
		var posting_form = ce('dt');
		posting_form.id = 'post_message';
		posting_form.className = 'row';
		posting_form.width = '98%';
		posting_form.style.display = 'none';
		posting_form.height = '20px';
		posting_form.style.width = '98%';

		var posting_box = ce('form');
		posting_box.id = 'chat_form';

		<?php
		if ($user->data['user_type'] != USER_IGNORE)
		{ 
		?>
		
		li.style.display = 'block';
		posting_box.appendChild(tn('<?php echo $user->lang['POST_MESSAGE']; ?>: '));

		el = null;
		var el = ce('input');

		el.className = 'inputbox';
		el.name = el.id = 'chat_message';

		el.style.width = '325px';

		el.onkeypress = function(evt)
		{
			try
			{
				evt = (evt) ? evt : event;
				var c = (evt.wich) ? evt.wich : evt.keyCode;
				if (c == 13)
				{
					document.getElementById('user').click();
					evt.returnValue = false;
					this.returnValue = false;
					return false;
				}
				return true;
			}
			catch (e)
			{
				handle(e);
				return;
			}
		}	
		posting_box.appendChild(el);
		posting_box.appendChild(tn(' '));
		// posting_box.appendChild(ce('br'));
		var el = ce('input');
		el.name = el.id = 'user';
		el.value = el.defaultValue = '<?php echo $user->lang['POST_MESSAGE']; ?>';

		el.type = 'button';
		el.className = 'button1 btnmain';

		el.onclick = function()
		{
			try
			{
				if (smilies == true)
				{
					smilies = false;
					document.getElementById('smilies').innerHTML = '';
					document.getElementById('smilies').style.display = 'none';
				}
			
				// Here we send later the message ;)
				this.disabled = true;
	
				document.getElementById('post_message').style.display = 'none';
				this.disabled = false;
				document.getElementById('msg_txt').innerHTML = '';
				document.getElementById('msg_txt').appendChild(tn('<?php echo $user->lang['SENDING']; ?>'));

				if (document.getElementById('chat_message').value == '')
				{
					document.getElementById('msg_txt').innerHTML = '';
					throw err_msg('<?php echo $user->lang['MESSAGE_EMPTY']; ?>');
				}

				if (huit.readyState == 4 || huit.readyState == 0)
				{

					// Lets got some nice things :D
					huit.open('POST','<?php echo append_sid("{$phpbb_root_path}ajax.$phpEx",  'm=add', false)?>&rand='+Math.floor(Math.random() * 1000000),true);

					huit.onreadystatechange = function()
					{
						try
						{
							if (huit.readyState == 4)
							{
								xml = huit.responseXML;
								if (xml.getElementsByTagName('error') && xml.getElementsByTagName('error').length != 0)
								{
									err = xml.getElementsByTagName('error')[0].childNodes[0].nodeValue;
									document.getElementById('msg_txt').innerHTML = '';
									document.getElementById('post_message').style.display = 'block';
									last = 0;
									message(err, true);
								}
								else
								{
									document.getElementById('msg_txt').innerHTML = '';
									document.getElementById('msg_txt').appendChild(tn('<?php echo $user->lang['POSTED']; ?>'));
									setTimeout("document.getElementById('msg_txt').innerHTML = ''",3000);
									document.getElementById('post_message').style.display = 'block';
									count = 0;// Set count to 0, because otherwise user willn't see his message
									clearTimeout(timer_in);
									timer_in = setTimeout('reload_post();reload_page();', 200);
									setTimeout('last = 0;', 500);
								}
								document.getElementById('chat_message').focus();
							}
						}
						catch (e)
						{
							handle(e);
							return;
						}
					}
					post = 'chat_message=';

					post += encodeURIComponent(document.getElementById('chat_message').value);

					document.getElementById('chat_message').value = '';

					if (smilies == true)
					{
						smilies = false;
						document.getElementById('smilies').innerHTML = '';
						document.getElementById('smilies').style.display = 'none';
					}

					huit.setRequestHeader('Content-Type','application/x-www-form-urlencoded');

					huit.send(post);
				}
				else
				{
					throw err_msg('This should not happen, double request found!');
				}
			}
			catch (e)
			{
				document.getElementById('post_message').style.display = 'inline';
				setTimeout("document.getElementById('msg_txt').innerHTML = ''",5000);
				handle(e);
				return;
			}
		}
		posting_box.appendChild(el);

		posting_box.appendChild(tn(' '));

		el = ce('input')
		el.value = el.defaultValue = '<?php echo $user->lang['SMILIES']; ?>';
		el.type = 'button';
		el.className = 'button2 btnmain';

		el.onclick = function()
		{
			try
			{
				if (smilies == true)
				{
					smilies = false;
					document.getElementById('smilies').innerHTML = '';
					document.getElementById('smilies').style.display = 'none';
				}
				else
				{
					smilies = true;
					document.getElementById('smilies').style.display = 'block';
					document.getElementById('smilies').appendChild(tn('<?php echo $user->lang['LOADING']; ?>'));
					if (hsmilies.readyState == 4 || hsmilies.readyState == 0)
					{

						// Lets got some nice things :D
						hsmilies.open('GET','<?php echo append_sid("{$phpbb_root_path}ajax.$phpEx" ,  'm=smilies', false)?>&rand='+Math.floor(Math.random() * 1000000),true);

						hsmilies.onreadystatechange = function()
						{
							try
							{
								if (hsmilies.readyState == 4)
								{
									xml = hsmilies.responseXML;
									if (xml.getElementsByTagName('error') && xml.getElementsByTagName('error').length != 0)
									{
										err = xml.getElementsByTagName('error')[0].childNodes[0].nodeValue;
										document.getElementById('smilies').innerHTML = '';
										message(err, true);
									}
									else
									{
										document.getElementById('smilies').innerHTML = '';
										var tmp = xml.getElementsByTagName('smilies');
										for (var i = (tmp.length - 1); i >= 0 ; i--)
										{
											var inh = tmp[i];
											
											var a = ce('a');
											// a.href = "#";
											a.code = inh.getElementsByTagName('code')[0].childNodes[0].nodeValue;
											a.onclick = function()
											{
												document.getElementById('chat_message').value += ' ' + this.code + ' ';
											}
											
											var img = ce('img');
											img.src = inh.getElementsByTagName('img')[0].childNodes[0].nodeValue;
											img.border = 0;
											a.appendChild(img);
											document.getElementById('smilies').appendChild(a);
											document.getElementById('smilies').appendChild(tn(' '));
										}
									}
								}
							}
							catch (e)
							{
								handle(e);
								return;
							}
						}
						hsmilies.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
	
						hsmilies.send(null);
					}
				}
			}
			catch (e)
			{
				handle(e);
				return;
			}
		}

		posting_box.appendChild(el);
		posting_box.appendChild(tn(' '));

		// BBcode buttons ;)
		var bbcode = ce('input');
		bbcode.type = 'button';
		bbcode.className = 'button2 btnmain';
		bbcode.accesskey = 'b';
		bbcode.name = bbcode.id = 'addbbcode0';
		bbcode.value = bbcode.defaultValue = ' B ';
		bbcode.style.fontWeight = 'bold';
		bbcode.style.width = '33px';
		bbcode.onclick = function()
		{ 
			var tfn = form_name;
			form_name = 'chat_form';
			var ttn = text_name;
			text_name = 'chat_message';
			bbstyle(0);
			form_name = tfn;
			text_name = ttn;
		}

		posting_box.appendChild(bbcode);

		posting_box.appendChild(tn(' '));

		var bbcode = ce('input');
		bbcode.type = 'button';
		bbcode.className = 'button2 btnmain';
		bbcode.accesskey = 'i';
		bbcode.name = bbcode.id = 'addbbcode2';
		bbcode.value = bbcode.defaultValue = ' I ';
		bbcode.style.fontStyle = 'italic';
		bbcode.style.width = '33px';
		bbcode.onclick = function()
		{ 
			var tfn = form_name;
			form_name = 'chat_form';
			var ttn = text_name;
			text_name = 'chat_message';
			bbstyle(2);
			form_name = tfn;
			text_name = ttn;
		}

		posting_box.appendChild(bbcode);

		posting_box.appendChild(tn(' '));
		 
		var bbcode = ce('input');
		bbcode.type = 'button';
		bbcode.className = 'button2 btnmain';
		bbcode.accesskey = 'u';
		bbcode.name = bbcode.id = 'addbbcode4';
		bbcode.value = bbcode.defaultValue = 'U';
		bbcode.style.textDecoration = 'underline';
		bbcode.style.width = '33px';
		bbcode.onclick = function()
		{ 
			var tfn = form_name;
			form_name = 'chat_form';
			var ttn = text_name;
			text_name = 'chat_message';
			bbstyle(4);
			form_name = tfn;
			text_name = ttn;
		}

		posting_box.appendChild(bbcode);

		posting_box.appendChild(tn(' '));
		 
		var bbcode = ce('input');
		bbcode.type = 'button';
		bbcode.className = 'button2 btnmain';
		bbcode.accesskey = 'p';
		bbcode.name = bbcode.id = 'addbbcode6';
		bbcode.value = bbcode.defaultValue = ' IMG ';
		bbcode.style.width = '43px';
		bbcode.onclick = function()
		{ 
			var tfn = form_name;
			form_name = 'chat_form';
			var ttn = text_name;
			text_name = 'chat_message';
			bbstyle(6);
			form_name = tfn;
			text_name = ttn;
		}

		posting_box.appendChild(bbcode);

		posting_box.appendChild(tn(' '));
		 
		var bbcode = ce('input');
		bbcode.type = 'button';
		bbcode.className = 'button2 btnmain';
		bbcode.accesskey = 'w';
		bbcode.name = bbcode.id = 'addbbcode8';
		bbcode.value = bbcode.defaultValue = ' URL ';
		bbcode.style.width = '43px';
		bbcode.onclick = function()
		{ 
			var tfn = form_name;
			form_name = 'chat_form';
			var ttn = text_name;
			text_name = 'chat_message';
			bbstyle(8);
			form_name = tfn;
			text_name = ttn;
		}

		posting_box.appendChild(bbcode);

		posting_box.appendChild(tn(' '));

		// posting_box.appendChild(ce('br'));
		var smilies = ce('div');
		smilies.style.display = 'none';
		smilies.name = smilies.id = 'smilies';
		posting_box.appendChild(smilies);

		<?php
		} 
		?>
		
		posting_form.appendChild(posting_box);
		dl.appendChild(posting_form);
		li.appendChild(dl);
		base.appendChild(li);
		
		var msg_txt = ce('div');
		
		msg_txt.id = 'msg_txt';
		msg_txt.height = '180px';
		msg_txt.appendChild(tn(' '));
		
		base.appendChild(msg_txt);

		var post = ce('div');//In this div, the chats will be placed ;)
		post.style.display = 'block';
		post.id = 'msg';
		
		post.style.width = '98%';
		<?php
		
		if (strpos($user->browser, 'MSIE') === false)
		{
			echo 'post.style.height = \'160px\';
			post.style.overflow = \'auto\';';
		}
		?>
		post.appendChild(tn('<?php echo $user->lang['LOADING']; ?>'));
		base.appendChild(post);

		// Nr div
		var nr_d = ce('div');
		nr_d.id = 'nr';

		base.appendChild(nr_d);
		 
		div.innerHTML = '';
		div.appendChild(base);
		// Everyting loaded, lets select posts :)
		reload_post();
		reload_page();

	}
	catch (e)
	{
		handle(e);
		return;
	}
}

function reload_page()
{
	if (hnr.readyState == 4 || hnr.readyState == 0)
	{

		// Lets got some nice things :D
		hnr.open('GET','<?php echo append_sid("{$phpbb_root_path}ajax.$phpEx",  'm=number', false)?>&rand='+Math.floor(Math.random() * 1000000),true);

		hnr.onreadystatechange = function()
		{
			try
			{
				if (hnr.readyState == 4)
				{
					xml = hnr.responseXML;
					if (xml.getElementsByTagName('error') && xml.getElementsByTagName('error').length != 0)
					{
						err = xml.getElementsByTagName('error')[0].childNodes[0].nodeValue;
						message(err, true);
						clearTimeout(timer_in);

						setTimeout('reload_post();',500);
					}
					else
					{
						var nr = xml.getElementsByTagName('nr')[0].childNodes[0].nodeValue;
						var f = document.getElementById('nr');
						f.innerHTML = '';
						var d = ce('div');
						
						if (nr < <?php echo $shout_number; ?>)
						{
							return;
						}
						
						var per_page = <?php echo $shout_number; ?>;
						
						var total_pages = Math.ceil(nr / per_page);
						
						if (total_pages == 1 || !nr)
						{
							return;
						}				

						on_page = Math.floor(count / per_page) + 1;
						
						var p = ce('span');
						var a = ce('a');
						var b = ce('strong');
						
						if (on_page == 1)
						{
							b.appendChild(tn('1'));
							p.appendChild(b);
							b = ce('strong');
						}
						else
						{
							a.c = ((on_page - 2) * per_page);
							a.href = 'javascript:;';
							a.onclick = function()
							{
								count = this.c;
								last = 0; // Reset last, otherwise it will not be loaded.
								clearTimeout(timer_in);
								reload_post();
								reload_page();
							}
							
							a.appendChild(tn('<?php echo $user->lang['PREVIOUS']; ?>'));
							
							p.appendChild(a);
							
							p.appendChild(tn(' '));
							
							a = ce('a');						
						
							a.c = 0;
							a.href = 'javascript:;';
							a.onclick = function()
							{
								count = this.c;
								last = 0; // Reset last, otherwise it will not be loaded.
								clearTimeout(timer_in);
								reload_post();
								reload_page();
							}
							
							a.appendChild(tn('1'));
							
							p.appendChild(a);
							a = ce('a');
						} 
						
						if (total_pages > 5)
						{
							var start_cnt = Math.min(Math.max(1, on_page - 4), total_pages - 5);
							var end_cnt = Math.max(Math.min(total_pages, on_page + 4), 6);
							
							p.appendChild((start_cnt > 1) ? tn(' ... ') : cp());
							
							for (var i = start_cnt + 1; i < end_cnt; i++)
							{
								if (i == on_page)
								{
									b.appendChild(tn(i));
									p.appendChild(b);
									b = ce('strong');	
								}
								else
								{
									a.c = (i - 1) * per_page;
									a.href = 'javascript:;';
									a.onclick = function()
									{
										count = this.c;
										last = 0; // Reset last, otherwise it will not be loaded.
										clearTimeout(timer_in);
										reload_post();
										reload_page();
									}
									
									a.appendChild(tn(i));
									
									p.appendChild(a);
									a = ce('a');			
								}
								if (i < end_cnt - 1)
								{
									p.appendChild(cp());
								}
							}
							
							p.appendChild((end_cnt < total_pages) ? tn(' ... ') : cp());							
						}
						else
						{
							p.appendChild(cp());
							for (var i = 2; i < total_pages; i++)
							{
								if (i == on_page)
								{
									b.appendChild(tn(i));
									p.appendChild(b);
									b = ce('strong');	
								}
								else
								{
									a.c = (i - 1) * per_page;
									a.href = 'javascript:;';
									a.onclick = function()
									{
										count = this.c;
										last = 0; // Reset last, otherwise it will not be loaded.
										clearTimeout(timer_in);
										reload_post();
										reload_page();
									}
									
									a.appendChild(tn(i));
									
									p.appendChild(a);
									a = ce('a');			
								}
								if (i < total_pages)
								{
									p.appendChild(cp());
								}
							}						
						}
						
						if (on_page == total_pages)
						{
							b.appendChild(tn(total_pages));
							p.appendChild(b);
							b = ce('strong');
						}
						else
						{
							
							a = ce('a');						
						
							a.c = ((total_pages - 1) * per_page);
							a.href = 'javascript:;';
							a.onclick = function()
							{
								count = this.c;
								last = 0; // Reset last, otherwise it will not be loaded.
								clearTimeout(timer_in);
								reload_post();
								reload_page();
							}
							
							a.appendChild(tn(total_pages));
							
							p.appendChild(a);
							a = ce('a');

							a.c = ((on_page) * per_page);
							a.href = 'javascript:;';
							a.onclick = function()
							{
								count = this.c;
								last = 0; // Reset last, otherwise it will not be loaded.
								clearTimeout(timer_in);
								reload_post();
								reload_page();
							}
							
							a.appendChild(tn('<?php echo $user->lang['NEXT']; ?>'));
							
							p.appendChild(tn(' '));
							
							p.appendChild(a);
							a = ce('a');
						}						
						
						f.appendChild(p);
					}
				}
			}
			catch (e)
			{
				handle(e);
				return;
			}
		}
		hnr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');

		hnr.send(null);
	}
}
function reload_post()
{
	// First check if there new posts.
	if (hin2.readyState == 4 || hin2.readyState == 0)
	{
		hin2.open('GET','<?php echo append_sid("{$phpbb_root_path}ajax.$phpEx",  'm=check', false)?>&last=' + last + '&rand='+Math.floor(Math.random() * 1000000),true);
		hin2.onreadystatechange = function()
		{
			try
			{
				if (hin2.readyState == 4)
				{
					if (!hin2.responseXML)
					{
						throw err_msg('<?php echo $user->lang['XML_ER']; ?>');
					}
					var xml = hin2.responseXML;		
					if (xml.getElementsByTagName('error') && xml.getElementsByTagName('error').length != 0)
					{
						err = xml.getElementsByTagName('error')[0].childNodes[0].nodeValue;
						throw err_msg(err);
						return;
					}
					
					var t = xml.getElementsByTagName('time')[0].childNodes[0].nodeValue;
					if (t == '0')
					{
						// If start is true, we let notice that there are no messages
						if (start == true)
						{
							<?php
							if ($user->data['user_type'] != USER_IGNORE)
							{
							// Only do this when user is logged in!
							?>
							if (first)
							{
								document.getElementById('post_message').style.display = 'inline';
								first = false;
							}
							<?php
							}
							?>						
							var posts = document.getElementById('msg');
							posts.innerHTML = '';
							posts.appendChild(tn('<?php echo $user->lang['NO_MESSAGE']; ?>'));
						}
					}
					else
					{
						if (hin.readyState == 4 || hin.readyState == 0)
						{
							last = xml.getElementsByTagName('last')[0].childNodes[0].nodeValue;
							// Lets got some nice things :D
							hin.open('GET','<?php echo append_sid("{$phpbb_root_path}ajax.$phpEx",  'm=view', false)?>&start=' + count + '&rand='+Math.floor(Math.random() * 1000000),true);
							hin.onreadystatechange = function()
							{
								try
								{
									if (hin.readyState == 4)
									{
										if (!hin.responseXML)
										{
											throw err_msg('<?php echo $user->lang['XML_ER']; ?>');
											return;
										}
										var xml = hin.responseXML;
										if (xml.getElementsByTagName('error') && xml.getElementsByTagName('error').length != 0)
										{
											var msg = xml.getElementsByTagName('error')[0].childNodes[0].nodeValue;
											throw err_msg(msg);
											return;
										}
										else
										{
											start = false;
											var tmp = xml.getElementsByTagName('posts');
											if (tmp.length == 0)
											{
												<?php
												if ($user->data['user_type'] != USER_IGNORE)
												{
												// Only do this when user is logged in!
												?>
												if (first)
												{
													document.getElementById('post_message').style.display = 'inline';
													first = false;
												}
												<?php
												}
												?>											
												var posts = document.getElementById('msg');
												posts.innerHTML = '';
												posts.appendChild(tn('<?php echo $user->lang['NO_MESSAGE']; ?>'));
												setTimeout('reload_post();',5000);
												return;
											} 
											var posts = document.getElementById('msg');
											posts.innerHTML = '';
													
											var row = false;
											for (var i = 0; i < tmp.length ; i++)
											{
												var li = ce('li');
												li.className = (!row) ? 'row row1' : 'row row2';
												row = !row;
												
												var dl = ce('dl');
												var dd = ce('dd');
												var dt = ce('dt');
												var inh = tmp[i];
												dt.style.width = '15%';
												dt.style.styleFloat = dt.style.cssFloat = 'left';
												dd.style.styleFloat = dd.style.cssFloat = 'left';

												dd.style.paddingLeft = '3px';

												var s = ce('span');

												var msg = parse_xml_to_html(inh.getElementsByTagName('shout_text')[0]);
												

												dt.appendChild(parse_xml_to_html(inh.getElementsByTagName('shout_time')[0]));
												dt.appendChild(tn(' | '));

												dt.appendChild(parse_xml_to_html(inh.getElementsByTagName('username')[0]));

												dt.appendChild(tn(': '));

												dl.appendChild(dt);
												
												<?php
												if ($auth->acl_get('a_') || $auth->acl_getf_global('m_'))
												{
												?>
												var button = ce('input');
												button.post_id = inh.getElementsByTagName('shout_id')[0].childNodes[0].nodeValue;
												button.value = button.defaultValue = ' X ';
												button.type = 'button';
												button.className = 'button2 btnmain';
												
												button.onclick = function()
												{
													this.style.display = 'none';
													if (confirm('<?php echo $user->lang['DEL_SHOUT']; ?>'))
													{
														if (hdelete.readyState == 4 || hdelete.readyState == 0)
														{
															// Lets got some nice things :D
															hdelete.open('GET','<?php echo append_sid("{$phpbb_root_path}ajax.$phpEx",  'm=delete', false)?>&id=' + this.post_id + '&rand='+Math.floor(Math.random() * 1000000),true);

															hdelete.onreadystatechange = function()
															{
																try
																{
																	if (hdelete.readyState == 4)
																	{
																		xml = hdelete.responseXML;
	
																		if (xml.getElementsByTagName('error') && xml.getElementsByTagName('error').length != 0)
																		{
																			err = xml.getElementsByTagName('error')[0].childNodes[0].nodeValue;
																			message(err, true);
																			return;
																		}
																		else
																		{
																			message('<?php echo $user->lang['MSG_DEL_DONE']; ?>');		
																		}
																		setTimeout("document.getElementById('msg_txt').innerHTML = ''",3000);
																		
																		last = 0;// Reset last, because if we delete the last message, the next messages cannot load correctly.
																		clearTimeout(timer_in);
																		reload_post();
																		reload_page();
																	}
																}
																catch (e)
																{
																	handle(e);
																	return;
																}
															}
															// hdelete.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
										
															hdelete.send(null);
														}
													}
													else
													{
														this.style.display = 'inline';
													}
												}

												dd.appendChild(button);
													
												var button = ce('input');
												button.post_id = inh.getElementsByTagName('shout_id')[0].childNodes[0].nodeValue;
												button.value = button.defaultValue = ' ? ';
												button.type = 'button';
												button.className = 'button2 btnmain';  
												
												button.ip = inh.getElementsByTagName('shout_ip')[0].childNodes[0].nodeValue;
												button.onclick = function()
												{
													alert(this.ip);
												}
												dd.appendChild(button);
												dl.appendChild(dd);
												dd = ce('dd');
												
												dd.style.paddingLeft = '3px';
												<?php
												}
												?>
												
												dd.appendChild(msg);
												dd.id = 'msgbody';

												dl.appendChild(dd);
												li.appendChild(dl);
												posts.appendChild(li);

											}

											<?php
											if ($user->data['user_type'] != USER_IGNORE)
											{
											// Only do this when user is logged in!
											?>
											if (first)
											{
												document.getElementById('post_message').style.display = 'inline';
												first = false;
											}
											<?php
											}
											?>
										}
									}
								}
								catch (e)
								{
									timer_in = setTimeout('reload_post();',5000);
									handle(e);
									return;
								}
							}
							hin.send(null);
						}
					}
					timer_in = setTimeout('reload_post();',5000);
				}
			}
			catch (e)
			{
				handle(e);
				return;			
			}			
		}
		hin2.send(null);
	}
}

function no_ajax()
{
	return '<?php echo $user->lang['NO_AJAX']; ?>';
}

function cp()
{
	var sep = ce('span');
	sep.className = 'page-sep';
	sep.appendChild(tn('<?php echo $user->lang['COMMA_SEPARATOR'];?>'));
	return sep;
}