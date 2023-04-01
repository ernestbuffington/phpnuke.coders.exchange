// The initInsertions() function jumps the page down to the quick reply box,
// thus we must take it upon ourselves to fix this annoyance.
if (is_ie && typeof(baseHeight) != 'number')
{
	for (var i = 0; i < onload_functions.length; i++)
	{
		if (onload_functions[i] == 'initInsertions()')
		{
			onload_functions[i] = 'prime_quick_reply_fix_position()';
		}
	}
}

function prime_quick_reply_fix_position()
{
	if (document.forms[form_name].style.display == 'none')
	{
		baseHeight = 0;
		return;
	}
	var scroll_x = document.body.scrollLeft || document.documentElement.scrollLeft;
	var scroll_y = document.body.scrollTop  || document.documentElement.scrollTop;

	document.forms[form_name].message.focus();
	baseHeight = document.selection.createRange().duplicate().boundingHeight;
	if (!document.forms[form_name])
	{
		document.body.focus();
	}
	document.forms[form_name].message.blur();
	document.documentElement.scrollLeft	= document.body.scrollLeft = scroll_x;
	document.documentElement.scrollTop	= document.body.scrollTop  = scroll_y;
}

function prime_quick_reply_fix_whitespace(txt)
{
	txt = txt.replace(/\r\n/g, '\x01');
	txt = txt.replace(/\r/g, '\x01');
	txt = txt.replace(/\n/g, '\x01');
	txt = txt.replace(/\x01/g, '\r\n');
	txt = txt.replace(/\xA0/g, ' '); // non-breaking space
	return(txt);
}

function prime_quick_reply_quotes(active_obj)
{
	var disable_quote_options = false; // Setting this to true will disable the quote options checkbox after it is checked
	var quick_reply_form = document.forms[form_name];

	if (active_obj.id == 'message')
	{
		if (disable_quote_options && quick_reply_form.message.value == '')
		{
			active_obj = quick_reply_form['quote_selected'];
			active_obj.checked = false;
			active_obj.disabled = false;
			active_obj = quick_reply_form['quote_last_msg'];
			active_obj.checked = false;
			active_obj.disabled = false;
		}
		return;
	}

	var multi_quote_form	= document.forms['prime_multi_quote_form'];
	var active_message		= quick_reply_form.message.value;
	var quoted_post_id		= 'quoted_post' + (typeof(prime_post_ids) == 'object' ? prime_post_ids[prime_post_ids.length - 1] : '');
	var quoted_messages		= [quick_reply_form[quoted_post_id].value];

	if (active_obj.id == 'quote_selected' && multi_quote_form)
	{
		quoted_messages = [];
		for (var i = 0; i < multi_quote_form.quotes.length; i++) 
		{
			if (multi_quote_form.quotes[i].checked) 
			{
				quoted_post_id = 'quoted_post' + multi_quote_form.quotes[i].value;
				quoted_messages.push(quick_reply_form[quoted_post_id].value);
			}
		}
		if (active_obj.checked && quoted_messages.length == 0)
		{
			active_obj.checked = false;
			if (active_obj = document.getElementById('prime_quick_reply_none_selected'))
			{
				active_obj.innerHTML = '<span style="color:#FF0000;">' + LA_NONE_SELECTED + '</span>';
				setTimeout('document.getElementById(\'prime_quick_reply_none_selected\').innerHTML = "' + LA_QUOTE_SELECTED + '";', 2000);
			}
			quick_reply_form.message.focus();
			return;
		}
	}

	if (active_obj.checked)
	{
		// Insert the text into the text area
		active_obj.disabled = disable_quote_options;
		quoted_message = quoted_messages.join('\n\n') + '\n';
		quoted_message = quoted_message.replace(/&nbsp;/g, ' ');
		active_message = quoted_message + quick_reply_form.message.value;

		// Attempt to scroll to the bottom (good luck)
		if(quick_reply_form.message && quick_reply_form.message.createTextRange)
		{
			var range = quick_reply_form.message.createTextRange();
			range.collapse(false);
			range.select();
		}
	}
	else
	{
		// User unchecked the box, so try to remove the inserted text
		active_message = prime_quick_reply_fix_whitespace(active_message);
		for (var i = 0; i < quoted_messages.length; i++)
		{
			quoted_message = prime_quick_reply_fix_whitespace(quoted_messages[i]);
			active_message = (active_message).replace(quoted_message, '');
			active_message = active_message.replace(/[\r\n]{2,}$/, '');
		}
	}
	quick_reply_form.message.value = active_message;
	quick_reply_form.message.focus();
}

function prime_quick_reply_toggle(active_obj)
{
	var area_obj_id = active_obj.id.replace('toggle_', '');
	var area_obj = document.getElementById(area_obj_id);
	if (typeof(active_obj.checked) != 'undefined')
	{
		area_obj.style.display = (active_obj.checked) ? 'block' : 'none';
	}
	else
	{
		var v = (area_obj.style.display == 'none');
		var m = area_obj.id == 'postform' ? 'QUICK_REPLY' : 'OPTIONS';
		area_obj.style.display = v ? '' : 'none';
		eval('active_obj.innerHTML = LA_' + (v ? 'HIDE' : 'SHOW') + '_' + m + ';');
		if (m == 'QUICK_REPLY')
		{
		   	document.cookie = QUICK_REPLY_COOKIE ? QUICK_REPLY_COOKIE + '=' + (v ? 1 : 0) + '; expires=' + (new Date((new Date()).getTime()+30*86400000)).toGMTString() : '';
			if ((area_obj = document.getElementById('toggle_quick_reply_options')))
			{
				area_obj.style.display = (area_obj.style.display == 'none') ? '' : 'none';
			}
			if (!v)
			{
				return;
			}
		}
	}
	document.forms[form_name].message.focus();
}

function prime_quick_reply_check()
{
	var quick_reply_form = document.forms[form_name];

	if (quick_reply_form.message.value.length <= 0)
	{
		alert(LA_TOO_FEW_CHARS);
		quick_reply_form.message.focus();
		return false;
	}

	// Disable the hidden quoted posts, as no need to submit all that data.
	if (quick_reply_form.quoted_post)
	{
		quick_reply_form.quoted_post.disabled = true;
	}
	if (prime_post_ids && typeof(prime_post_ids) == 'object')
	{
		for (var i=0; i<prime_post_ids.length; i++)
		{
			var quoted_post_id = 'quoted_post' + prime_post_ids[i];
			if (quick_reply_form[quoted_post_id])
			{
				quick_reply_form[quoted_post_id].disabled = true;
			}
		}
	}
	return true;
}
