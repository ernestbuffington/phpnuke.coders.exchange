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
define_once("_SEARCH","Bilatu");
define_once("_LOGIN","Saioa hasi");
define_once("_WRITES"," sistema-kideak idatzi zuen");
define_once("_POSTEDON","Bidalia");
define_once("_NICKNAME","Ezizena");
define_once("_PASSWORD","Pasahitza");
define_once("_WELCOMETO","Ongi etorri");
define_once("_EDIT","Editatu");
define_once("_DELETE","Ezabatu");
define_once("_POSTEDBY","Nork bidalia");
define_once("_READS","Irakurketa");
define_once("_GOBACK","[ <a href=\"javascript:history.go(-1)\">Bueltatu</a> ]");
define_once("_COMMENTS","komentario");
define_once("_PASTARTICLES","Gaurkotasun gabeko Artikuloak");
define_once("_OLDERARTICLES","Artikulo zaharrak");
define_once("_BY","nork");
define_once("_ON","noiz");
define_once("_LOGOUT","Irten");
define_once("_WAITINGCONT","Edukiak itxaroten");
define_once("_SUBMISSIONS","Notizi bidalketak");
define_once("_WREVIEWS","Berrikuspenak");
define_once("_WLINKS","Loturak");
define_once("_EPHEMERIDS","Efemerideak");
define_once("_ONEDAY","Gaurko egun berdinean...");
define_once("_ASREGISTERED","Oraindik ez daukazu kontu bat sisteman? Egin klik <a href=\"modules.php?name=Your_Account\">hemen</a> eta lortu kontu bat doainik. Erabiltzaile erregistratu bezala, Sistemako atal guztietara sartu ahal izango zara.");
define_once("_MENUFOR","Menua:");
define_once("_NOBIGSTORY","Gaur ez dago Historia Berezirik.");
define_once("_BIGSTORY","Gaur gehien irakurri den historia:");
define_once("_SURVEY","Inkesta");
define_once("_POLLS","Bozketak");
define_once("_PCOMMENTS","Komentarioak:");
define_once("_RESULTS","Emaitzak");
define_once("_HREADMORE","Gehiago irakurri . . .");
define_once("_CURRENTLY","Une honetan");
define_once("_GUESTS","gonbidatu eta");
define_once("_MEMBERS","kide konektatuta.");
define_once("_YOUARELOGGED","Honela konektatuta zaude:");
define_once("_YOUHAVE","Begiratu zure buzoia. Zenbat mezu:");
define_once("_PRIVATEMSG","guztira.");
define_once("_YOUAREANON","Erabiltzaile anonimoa zara. Erregistratu <b><a href=\"modules.php?name=Your_Account&op=new_user\">hemen</a></b>.");
define_once("_NOTE","Oharra:");
define_once("_ADMIN","Administratzailea:");
define_once("_WERECEIVED","Sistemak jaso izan duen bisita zenbakia:");
define_once("_PAGESVIEWS","fetxa honetatik hasita:");
define_once("_TOPIC","Gaia");
define_once("_UDOWNLOADS","Deskargak");
define_once("_VOTE","bozkatu");
define_once("_VOTES","botoak");
define_once("_MVIEWADMIN","Ikusi: Bakarrik administratzaileak");
define_once("_MVIEWUSERS","Ikusi: Bakarrik Sistema-kideak");
define_once("_MVIEWANON","Ikusi: Bakarrik Erabiltzaile anonimoak");
define_once("_MVIEWALL","Ikusi: Erabiltzaile guztiak");
define_once("_EXPIRELESSHOUR","Kaduzitatea: ordu bete baino gutxiago");
define_once("_EXPIREIN","Kadukatzen da:");
define_once("_HTTPREFERERS","HTTP erreferentziak");
define_once("_UNLIMITED","Inoiz");
define_once("_HOURS","ordu");
define_once("_RSSPROBLEM","Arazo bat dago Toki honen Titularrekin");
define_once("_SELECTLANGUAGE","Hizkuntza aukeratu");
define_once("_SELECTGUILANG","Menuetarako erabili nahi duzun hizkuntza aukeratu");
define_once("_NONE","Bat ere ez");
define_once("_BLOCKPROBLEM","<center>Arazo bat dago bloke honekin");
define_once("_BLOCKPROBLEM2","<center>Bloke honetan ez dago edukirik.</center>");
define_once("_MODULENOTACTIVE","Sentitzen dut, modulo hau ez dago aktibatuta!");
define_once("_NOACTIVEMODULES","Aktibo ez dauden moduloak");
define_once("_FORADMINTESTS","(Administratzaileek testeatzeko)");
define_once("_BBFORUMS","Foroak");
define_once("_HOME","Home");
define_once("_HOMEPROBLEM","There is a big problem here: we have not a Homepage!!!");
define_once("_ADDAHOME","Add a Module in your Home");
define_once("_HOMEPROBLEMUSER","There is a problem right now on the Homepage. Please check it back later.");
define_once("_MORENEWS","More in News Section");
define_once("_ALLCATEGORIES","All Categories");
define_once("_DATESTRING","%B %d %A, ordua %T");
define_once("_DATESTRING2","%B %d, %A");
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

