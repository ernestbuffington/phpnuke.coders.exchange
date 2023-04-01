<?php
/** 
*
* contact [English]
*
* @package	language
* @version	0.1.4
* @copyright (c) 2007 eviL3
* @license http://opensource.org/licenses/gpl-license.php GNU Public License 
*
*/

/**
* DO NOT CHANGE
*/
if (empty($lang) || !is_array($lang))
{
	$lang = array();
}

$lang = array_merge($lang, array(
	'CONTACT_YOUR_NAME'				=> 'Your name',
	'CONTACT_YOUR_NAME_EXPLAIN'		=> 'Please enter your name, so the message has an identity.',
	'CONTACT_YOUR_EMAIL'			=> 'Your email adress',
	'CONTACT_YOUR_EMAIL_EXPLAIN'	=> 'Please enter a valid email adress, so we can contact you.',
	'CONTACT_CONFIRM'				=> 'Confirm',
	'CONTACT_CONFIRM_EXPLAIN'		=> 'To prevent automated advertisement emails, the board administration requires you to enter a confirmation code. The code is displayed in the image you should see below.',
	'CONTACT_REASON'				=> 'Reason',
	
	'CONTACT_NO_NAME'				=> 'You didn’t enter a name.',
	'CONTACT_NO_EMAIL'				=> 'You didn’t enter an email adress.',
	'CONTACT_NO_MSG'				=> 'You didn’t enter a message.',
	'CONTACT_NO_SUBJ'				=> 'You didn’t enter a subject.',
	'CONTACT_NO_REASON'				=> 'You didn’t enter a valid reason.',
	
	'CONTACT_MAIL_DISABLED'			=> 'You can not use the contact form at the moment, because it has been disabled.',
	'CONTACT_BOT_USER_INVALID'		=> 'You can not use the contact form at the moment, because there was an error in the configuration.',
	'CONTACT_TOO_MANY'				=> 'You have exceeded the maximum number of contact confirmation attempts for this session. Please try again later.',
	
	'CONTACT_TEMPLATE'				=> '“%1$s / %2$s / %3$s” has entered following message into the contact form:' . "\n\n" . '%4$s',
	
	'CONTACT_MSG_SENT'				=> 'Your message has been sent successfully',
	'RETURN_CONTACT'				=> '%sReturn to the contact page%s',
	
	'CONTACT_INSTALLED'				=> 'The “contact board administration” modification has been installed successfully.',
	'CONTACT_UPDATED'				=> 'The “contact board administration” modification has been updated to version %s successfully.',
	'CONTACT_UNINSTALLED'			=> 'The “contact board administration” modification has been uninstalled successfully.',
	
	'PASTEBIN_OUTDATED'				=> 'The database for the contact page has not been updated yet. Please wait for an administrator to update it.',
));

?>