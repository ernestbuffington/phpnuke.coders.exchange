<?php
if(!isset($subscription_url)) $subscription_url = '';

/**************************************************************************/
/* PHP-NUKE: Advanced Content Management System                           */
/* ============================================                           */
/*                                                                        */
/* This is the language module with all the system messages               */
/*                                                                        */
/* If you made a translation, please go to the site and send to me        */
/* the translated file. Please keep the original text order by modules,   */
/* and just one message per line, also double check your translation!     */
/*                                                                        */
/* You need to change the second quoted phrase, not the capital one!      */
/*                                                                        */
/* If you need to use double quotes (") remember to add a backslash (\),  */
/* so your entry will look like: This is \"double quoted\" text.          */
/* And, if you use HTML code, please double check it.                     */
/**************************************************************************/


define_once("_CHARSET","ISO-8859-1");
define_once("_SEARCH","Search");
define_once("_LOGIN","Login");
define_once("_WRITES","writes");
define_once("_POSTEDON","Posted on");
define_once("_NICKNAME","Nickname");
define_once("_PASSWORD","Password");
define_once("_WELCOMETO","Welcome to");
define_once("_EDIT","Edit");
define_once("_DELETE","Delete");
define_once("_POSTEDBY","Posted by");
define_once("_READS","reads");
define_once("_GOBACK","[ <a href=\"javascript:history.go(-1)\">Go Back</a> ]");
define_once("_COMMENTS","comments");
define_once("_PASTARTICLES","Past Articles");
define_once("_OLDERARTICLES","Older Articles");
define_once("_BY","by");
define_once("_ON","on");
define_once("_LOGOUT","Logout");
define_once("_WAITINGCONT","Waiting Content");
define_once("_SUBMISSIONS","Submissions");
define_once("_WREVIEWS","Waiting Reviews");
define_once("_WLINKS","Waiting Links");
define_once("_EPHEMERIDS","Ephemerids");
define_once("_ONEDAY","One Day like Today...");
define_once("_ASREGISTERED","Don't have an account yet? You can <a href=\"modules.php?name=Your_Account&amp;op=new_user\">create one</a>. As a registered user you have some advantages like theme manager, comments configuration and post comments with your name.");
define_once("_MENUFOR","Menu for");
define_once("_NOBIGSTORY","There isn't a Biggest Story for Today, yet.");
define_once("_BIGSTORY","Today's most read Story is:");
define_once("_SURVEY","Survey");
define_once("_POLLS","Polls");
define_once("_PCOMMENTS","Comments:");
define_once("_RESULTS","Results");
define_once("_HREADMORE","read more...");
define_once("_CURRENTLY","There are currently,");
define_once("_GUESTS","guest(s) and");
define_once("_MEMBERS","member(s) that are online.");
define_once("_YOUARELOGGED","You are logged as");
define_once("_YOUHAVE","You have");
define_once("_PRIVATEMSG","private message(s).");
define_once("_YOUAREANON","You are Anonymous user. You can register for free by clicking <a href=\"modules.php?name=Your_Account&amp;op=new_user\">here</a>");
define_once("_NOTE","Note:");
define_once("_ADMIN","Admin:");
define_once("_WERECEIVED","We received");
define_once("_PAGESVIEWS","page views since");
define_once("_TOPIC","Topic");
define_once("_UDOWNLOADS","Downloads");
define_once("_VOTE","Vote");
define_once("_VOTES","Votes");
define_once("_MVIEWADMIN","View: Administrators Only");
define_once("_MVIEWUSERS","View: Registered Users Only");
define_once("_MVIEWANON","View: Anonymous Users Only");
define_once("_MVIEWALL","View: All Visitors");
define_once("_EXPIRELESSHOUR","Expiration: Less than 1 hour");
define_once("_EXPIREIN","Expiration in");
define_once("_HTTPREFERERS","HTTP Referers");
define_once("_UNLIMITED","Unlimited");
define_once("_HOURS","Hours");
define_once("_RSSPROBLEM","Currently there is a problem with headlines from this site");
define_once("_SELECTLANGUAGE","Select Language");
define_once("_SELECTGUILANG","Select Interface Language:");
define_once("_NONE","None");
define_once("_BLOCKPROBLEM","<center>There is a problem right now with this block.</center>");
define_once("_BLOCKPROBLEM2","<center>There isn't content right now for this block.</center>");
define_once("_MODULENOTACTIVE","Sorry, this Module isn't active!");
define_once("_NOACTIVEMODULES","Inactive Modules");
define_once("_FORADMINTESTS","(for Admin tests)");
define_once("_BBFORUMS","Forums");
define_once("_ACCESSDENIED", "Access Denied");
define_once("_RESTRICTEDAREA", "You are trying to access a restricted area.");
define_once("_MODULEUSERS", "We are Sorry, but this section of our site is for <i>Registered Users Only.</i><br><br>You can register for free by clicking <a href=\"modules.php?name=Your_Account&op=new_user\">here</a>, then you can<br>access this section without restrictions. Thanks.<br><br>");
define_once("_MODULESADMINS", "We are Sorry but this section of our site is for <i>Administrators Only.</i><br><br>");
define_once("_HOME","Home");
define_once("_HOMEPROBLEM","There is a big problem here: we do not have a Homepage!!!");
define_once("_ADDAHOME","Add a Module in your Home");
define_once("_HOMEPROBLEMUSER","There is a problem right now on the Homepage. Please check back later.");
define_once("_MORENEWS","More in News Section");
define_once("_ALLCATEGORIES","All Categories");
define_once("_DATESTRING","%A, %B %d @ %T %Z");
define_once("_DATESTRING2","%A, %B %d");
define_once("_DATE","Date");
define_once("_HOUR","Hour");
define_once("_UMONTH","Month");
define_once("_YEAR","Year");
define_once("_JANUARY","January");
define_once("_FEBRUARY","February");
define_once("_MARCH","March");
define_once("_APRIL","April");
define_once("_MAY","May");
define_once("_JUNE","June");
define_once("_JULY","July");
define_once("_AUGUST","August");
define_once("_SEPTEMBER","September");
define_once("_OCTOBER","October");
define_once("_NOVEMBER","November");
define_once("_DECEMBER","December");
define_once("_BWEL","Welcome");
define_once("_BPM","Private Messages");
define_once("_BUNREAD","Unread");
define_once("_BREAD","Read");
define_once("_BMEMP","Membership");
define_once("_BLATEST","Latest");
define_once("_BTD","New Today");
define_once("_BYD","New Yesterday");
define_once("_BOVER","Overall");
define_once("_BVISIT","People Online");
define_once("_BVIS","Visitors");
define_once("_BMEM","Members");
define_once("_BTT","Total");
define_once("_BON","Online Now");
define_once("_BREG","Register");
define_once("_BROADCAST","Broadcast Public Message");
define_once("_BROADCASTFROM","Public Message from");
define_once("_TURNOFFMSG","Turn Off Public Messages");
define_once("_JOURNAL","Journal");
define_once("_READMYJOURNAL","Read My Journal");
define_once("_ADD","Add");
define_once("_YES","Yes");
define_once("_NO","No");
define_once("_INVISIBLEMODULES","Invisible Modules");
define_once("_ACTIVEBUTNOTSEE","(Active but invisible link)");
define_once("_THISISAUTOMATED","This is an automated email to let you know that your banner advertising in our site has been completed.");
define_once("_THERESULTS","The results of your campaign are as follows:");
define_once("_TOTALIMPRESSIONS","Total Impression Made:");
define_once("_CLICKSRECEIVED","Clicks Received:");
define_once("_IMAGEURL","Image URL");
define_once("_CLICKURL","Click URL:");
define_once("_ALTERNATETEXT","Alternate Text:");
define_once("_HOPEYOULIKED","Hope you liked our service. We'll look forward to having you as an advertising customer again soon.");
define_once("_THANKSUPPORT","Thanks for your Support");
define_once("_TEAM","Team");
define_once("_BANNERSFINNISHED","Banners Ads Finished");
define_once("_MODREQLINKS","Mod. Links");
define_once("_BROKENLINKS","Broken Links");
define_once("_MODREQDOWN","Mod. Downloads");
define_once("_BROKENDOWN","Broken Downloads");
define_once("_PAGEGENERATION","Page Generation:");
define_once("_SECONDS","Seconds");
define_once("_YOUHAVEONEMSG","You Have 1 New Private Message");
define_once("_YOUHAVE","You Have");
define_once("_NEWPMSG","New Private Messages");
define_once("_CONTRIBUTEDBY","Contributed by");
define_once("_CHAT","Chat");
define_once("_REGISTERED","Registered");
define_once("_CHATGUESTS","Guests");
define_once("_USERSTALKINGNOW","Users Talking Now");
define_once("_ENTERTOCHAT","Enter To Chat");
define_once("_CHATROOMS","Available Rooms");
define_once("_SECURITYCODE","Security Code");
define_once("_TYPESECCODE","Type Security Code");
define_once("_ASSOTOPIC","Associated Topics");
define_once("_ADDITIONALYGRP","Additionaly this module belongs to the Users Group");
define_once("_YOUHAVEPOINTS","Points you have by participating on the site's content:");
define_once("_MVIEWSUBUSERS","View: Subscribed Users Only");
define_once("_MODULESSUBSCRIBER","We are Sorry but this section of our site is for <i>Subscribed Users Only.</i>");
define_once("_SUBHERE","You can subscribe to our services from <a href=\"$subscription_url\">here</a>");
define_once("_SUBEXPIRED","Your Subscription Expired");
define_once("_HELLO","Hello");
define_once("_SUBSCRIPTIONAT","This is an automated message to let you know that your subscription at");
define_once("_HASEXPIRED","has been expired now.");
define_once("_HOPESERVED","Hope to have served you with satisfaction...");
define_once("_SUBRENEW","If you want to renew your subscription please go to:");
define_once("_YOUARE","You are");
define_once("_SUBSCRIBER","subscriber");
define_once("_OF","of");
define_once("_SBYEARS","years");
define_once("_SBYEAR","year");
define_once("_SBMINUTES","minutes");
define_once("_SBHOURS","hours");
define_once("_SBSECONDS","seconds");
define_once("_SBDAYS","days");
define_once("_SUBEXPIREIN","Your subscription will expire in:");
define_once("_NOTSUB","You are not subscriber of");
define_once("_SUBFROM","You can subscribe from");
define_once("_HERE","here");
define_once("_NOW","now!");
define_once("_ADMSUB","Subscribed User!");
define_once("_ADMNOTSUB","User NOT Subscribed");
define_once("_ADMSUBEXPIREIN","Subscription Expire in:");
define_once("_LASTIP","Last user IP:");
define_once("_BANTHIS","Ban This IP");
define_once("_HTMLNOTALLOWED","HTML code isn't allowed. Please use the editor functions instead.");
define_once("_KARMAGOOD","Good Karma");
define_once("_KARMALOW","Regular Karma");
define_once("_KARMABAD","Bad Karma");
define_once("_KARMADEVIL","Devil Karma");
define_once("_COMMENTMODERATED","Your comments has been submitted, but since you have been marked by the administrator of this site as an user with Bad Karma, your comment is subject to prior approval by our staff. Please don't submit your comment twice or your Karma may fall to the next level.<br><br>Our staff reserves the right to approve or delete your comment at their sole discretion.");
define_once("_MODERATEDTITLE","Comment Submitted - Approval Pending");
define_once("_MODERATEDRETURN","Return to Article's Page");

/*****************************************************/
/* Function to translate Datestrings                 */
/*****************************************************/

function translate($phrase) {
    switch($phrase) {
	case "xdatestring":	$tmp = "%A, %B %d @ %T %Z"; break;
	case "linksdatestring":	$tmp = "%d-%b-%Y"; break;
	case "xdatestring2":	$tmp = "%A, %B %d"; break;
	default:		$tmp = "$phrase"; break;
    }
    return $tmp;
}

define_once("_HTMLNOTALLOWED2","HTML code isn't allowed here.");
define_once("_ERRORINVEMAIL","ERROR: Invalid Email");

