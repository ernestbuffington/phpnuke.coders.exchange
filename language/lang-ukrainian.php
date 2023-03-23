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

define_once("_CHARSET","windows-1251");
define_once("_SEARCH","Пошук");
define_once("_LOGIN","Вхід");
define_once("_WRITES","пише");
define_once("_POSTEDON","Опубліковано");
define_once("_NICKNAME","Логін");
define_once("_PASSWORD","Пароль");
define_once("_WELCOMETO","Ласкаво просимо на");
define_once("_EDIT","Редагувати");
define_once("_DELETE","Витерти");
define_once("_POSTEDBY","Опублікував");
define_once("_READS","переглядів");
define_once("_GOBACK","[ <a href=\"javascript:history.go(-1)\">Назад</a> ]");
define_once("_COMMENTS","коментарів ");
define_once("_PASTARTICLES","Старі публікації");
define_once("_OLDERARTICLES","Старі статті");
define_once("_BY","");
define_once("_ON","");
define_once("_LOGOUT","Вихід");
define_once("_WAITINGCONT","Надходження");
define_once("_SUBMISSIONS","Нові статті");
define_once("_WREVIEWS","Нові огляди");
define_once("_WLINKS","Нові ресурси");
define_once("_EPHEMERIDS","Вислови");
define_once("_ONEDAY","В такий день як сьогодні...");
define_once("_ASREGISTERED","<a href=\"modules.php?name=Your_Account&op=RegNewUser\">Зареєструватись</a>");
define_once("_MENUFOR","Меню");
define_once("_NOBIGSTORY","Сьогодні статті не поступали. <a href=\"submit.php\">Напишіть свою!</a>");
define_once("_BIGSTORY","Сама популярна сьогодні стаття: ");
define_once("_SURVEY","Голосування");
define_once("_POLLS","Голосування");
define_once("_PCOMMENTS","Коментарів:");
define_once("_RESULTS","Результати");
define_once("_HREADMORE","читати далі...");
define_once("_CURRENTLY","");
define_once("_GUESTS","гостей і");
define_once("_MEMBERS","авторів.");
define_once("_YOUARELOGGED","Ви зайшли як");
define_once("_YOUHAVE","В вас");
define_once("_PRIVATEMSG","повідомлень.");
define_once("_YOUAREANON","Вибачте, система вас не впізнала. Ви можете <a href=\"modules.php?name=Your_Account\">зареєструватись тут</a>.");
define_once("_NOTE","Примітки:");
define_once("_ADMIN","Адмін:");
define_once("_WERECEIVED","");
define_once("_PAGESVIEWS","переглянутих сторінки починаючи з");
define_once("_TOPIC","Тема");
define_once("_UDOWNLOADS","Скачувань");
define_once("_VOTE"," голос");
define_once("_VOTES","голосів");
define_once("_MVIEWADMIN","Перегляд: тільки для адміністраторів");
define_once("_MVIEWUSERS","Перегляд: тільки для зареєстрованих");
define_once("_MVIEWANON","Перегляд: тільки для анонімних");
define_once("_MVIEWALL","Перегляд: для всіх");
define_once("_EXPIRELESSHOUR","Expiration: менш ніж за годину");
define_once("_EXPIREIN","Expiration in");
define_once("_HTTPREFERERS","HTTP звернення");
define_once("_UNLIMITED","Необмежений");
define_once("_HOURS","Годин");
define_once("_RSSPROBLEM","Виникли проблеми з заголовками цього сайту");
define_once("_SELECTLANGUAGE","Вибрати мову");
define_once("_SELECTGUILANG","Вибрати мову інтерфейсу:");
define_once("_NONE","Немає");
define_once("_BLOCKPROBLEM","<center>There is a problem right now with this block.</center>");
define_once("_BLOCKPROBLEM2","<center>There isn't content right now for this block.</center>");
define_once("_MODULENOTACTIVE","Sorry, this Module isn't active!");
define_once("_NOACTIVEMODULES","Inactive Modules");
define_once("_FORADMINTESTS","(for Admin tests)");
define_once("_BBFORUMS","Forums");
define_once("_ACCESSDENIED", "Access Denied");
define_once("_RESTRICTEDAREA", "You are trying to access to a restricted area.");
define_once("_MODULEUSERS", "We are Sorry but this section of our site is for <i>Registered Users Only</i><br><br>You can register for free by clicking <a href=\"modules.php?name=Your_Account&op=new_user\">here</a>, then you can<br>access to this section without restrictions. Thanks.<br><br>");
define_once("_MODULESADMINS", "We are Sorry but this section of our site is for <i>Administrators Only</i><br><br>");
define_once("_HOME","Home");
define_once("_HOMEPROBLEM","There is a big problem here: we have not a Homepage!!!");
define_once("_ADDAHOME","Add a Module in your Home");
define_once("_HOMEPROBLEMUSER","There is a problem right now on the Homepage. Please check it back later.");
define_once("_MORENEWS","More in News Section");
define_once("_ALLCATEGORIES","All Categories");
define_once("_DATESTRING","%d.%m.%Y");
define_once("_DATESTRING2","%d.%m.%Y");
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

