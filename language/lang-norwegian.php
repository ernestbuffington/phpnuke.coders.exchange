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
define_once("_SEARCH","Søk");
define_once("_LOGIN","Logg inn");
define_once("_WRITES","skriver");
define_once("_POSTEDON","Postet");
define_once("_NICKNAME","Alias");
define_once("_PASSWORD","Passord");
define_once("_WELCOMETO","Velkommen til");
define_once("_EDIT","Redigere");
define_once("_DELETE","Slette");
define_once("_POSTEDBY","Postet av");
define_once("_READS","lesninger");
define_once("_GOBACK","[ <a href=\"javascript:history.go(-1)\">Tilbake</a> ]");
define_once("_COMMENTS","kommentarer");
define_once("_PASTARTICLES","Tidligere artikler");
define_once("_OLDERARTICLES","Eldre artikler");
define_once("_BY","av");
define_once("_ON"," ");
define_once("_LOGOUT","Logg ut");
define_once("_WAITINGCONT","Ventende innhold");
define_once("_SUBMISSIONS","Postninger");
define_once("_WREVIEWS","Anmeldelser");
define_once("_WLINKS","Linker");
define_once("_EPHEMERIDS","Dagens Ord");
define_once("_ONEDAY","På en dag som denne...");
define_once("_ASREGISTERED","Er du ikke medlem ennå? Du kan enkelt <a href=\"modules.php?name=Your_Account\">bli medlem</a>. Som registrert medlem har du flere fordeler, og det er gratis å registrere seg!");
define_once("_MENUFOR","Meny for");
define_once("_NOBIGSTORY","Det finges ingen Het Nyhet i dag!");
define_once("_BIGSTORY","Dagens mest leste nyhet er:");
define_once("_SURVEY","Undersøkelse");
define_once("_POLLS","Avstemminger");
define_once("_PCOMMENTS","Kommentarer:");
define_once("_RESULTS","Resultat");
define_once("_HREADMORE","les mer...");
define_once("_CURRENTLY","Det er for tiden,");
define_once("_GUESTS","gjest(er) og");
define_once("_MEMBERS","medlemm(er) online.");
define_once("_YOUARELOGGED","Du er innlogget som");
define_once("_YOUHAVE","Du har");
define_once("_PRIVATEMSG","privat(e) beskjed(er).");
define_once("_YOUAREANON","Du er en anonym bruker. Du kan registrere deg gratis ved å fylle ut <a href=\"modules.php?name=Your_Account\">dette skjemaet</a>");
define_once("_NOTE","Noter:");
define_once("_ADMIN","Admin:");
define_once("_WERECEIVED","Vi har hatt");
define_once("_PAGESVIEWS","sidevisninger siden");
define_once("_TOPIC","Emne det skal postes under");
define_once("_UDOWNLOADS","Nedlastninger");
define_once("_VOTE","Stem");
define_once("_VOTES","Stemmer");
define_once("_MVIEWADMIN","Se: Kun administratorer");
define_once("_MVIEWUSERS","Se: Kun medlemmer");
define_once("_MVIEWANON","Se: Kun anonyme besøkende");
define_once("_MVIEWALL","Se: Alle besøkende");
define_once("_EXPIRELESSHOUR","Utløper innen en time");
define_once("_EXPIREIN","Utløper om");
define_once("_HTTPREFERERS","Hvem linker til oss");
define_once("_UNLIMITED","Ubegrenset");
define_once("_HOURS","Timer");
define_once("_RSSPROBLEM","Det er et problem med rubrikkene fra dette webstedet");
define_once("_SELECTLANGUAGE","Velg språk");
define_once("_SELECTGUILANG","Velg språk for grensesnitt:");
define_once("_NONE","Ingen");
define_once("_BLOCKPROBLEM","<center>Det er et problem med denne blokken.</center>");
define_once("_BLOCKPROBLEM2","<center>Det er ikke innhold for denne blokken.</center>");
define_once("_MODULENOTACTIVE","Denne modulen er ikke aktiv!");
define_once("_NOACTIVEMODULES","Inaktive moduler");
define_once("_FORADMINTESTS","(for Admin-tester)");
define_once("_BBFORUMS","Forum");
define_once("_ACCESSDENIED", "Adgang nektet");
define_once("_RESTRICTEDAREA", "Du prøver å få adgang til et beskyttet område.");
define_once("_MODULEUSERS", "Denne delen av våre sider er kun for <i>registrerte brukere</i><br><br>Du kan registrere deg gratis <a href=\"modules.php?name=Your_Account&op=new_user\">her</a>.<br><br>");
define_once("_MODULESADMINS", "Beklager, men denne delen av våre sider er kun for <i>administratorer</i><br><br>");
define_once("_HOME","Hjem");
define_once("_HOMEPROBLEM","Det er et stort problem: Vi har ingen førsteside!!");
define_once("_ADDAHOME","Legg til en modul på førstesiden");
define_once("_HOMEPROBLEMUSER","Vi har et problem med sidene nå. Vennligst prøv igjen senere.");
define_once("_MORENEWS","Mer i nyhets-seksjon");
define_once("_ALLCATEGORIES","Alle kategorier");
define_once("_DATESTRING","%A %d %B @ %H:%M");
define_once("_DATESTRING2","%A, %d %B");
define_once("_DATE","Dato");
define_once("_HOUR","Time");
define_once("_UMONTH","Måned");
define_once("_YEAR","År");
define_once("_JANUARY","Januar");
define_once("_FEBRUARY","Februar");
define_once("_MARCH","Mars");
define_once("_APRIL","April");
define_once("_MAY","Mai");
define_once("_JUNE","Juni");
define_once("_JULY","Juli");
define_once("_AUGUST","August");
define_once("_SEPTEMBER","September");
define_once("_OCTOBER","Oktober");
define_once("_NOVEMBER","November");
define_once("_DECEMBER","Desember");
define_once("_BWEL","Velkommen");
define_once("_BPM","Private beskjeder");
define_once("_BUNREAD","Ulest");
define_once("_BREAD","Lest");
define_once("_BMEMP","Medlemsskap");
define_once("_BLATEST","Siste");
define_once("_BTD","Ny i dag");
define_once("_BYD","Ny i går");
define_once("_BOVER","Totalt");
define_once("_BVISIT","Personer online");
define_once("_BVIS","Besøkende");
define_once("_BMEM","Medlemmer");
define_once("_BTT","Totalt");
define_once("_BON","Online nå");
define_once("_BREG","Registrer");
define_once("_BROADCAST","Kringkast offentlige beskjeder");
define_once("_BROADCASTFROM","Offentlig beskjed fra");
define_once("_TURNOFFMSG","Slå av offentlige beskjeder");
define_once("_JOURNAL","Journal");
define_once("_READMYJOURNAL","Les min journal");
define_once("_ADD","Legg til");
define_once("_YES","Ja");
define_once("_NO","Nei");
define_once("_INVISIBLEMODULES","Usynlige moduler");
define_once("_ACTIVEBUTNOTSEE","(Aktiv men usynlig link)");
define_once("_THISISAUTOMATED","Dette er en automatisk e-post for å gi deg beskjed om at din banner-reklame på vår side er avsluttet nå.");
define_once("_THERESULTS","Resultatene av kampanjen er som følger:");
define_once("_TOTALIMPRESSIONS","Totalt antall visninger:");
define_once("_CLICKSRECEIVED","Antall treff:");
define_once("_IMAGEURL","Bile URL");
define_once("_CLICKURL","Klikk URL:");
define_once("_ALTERNATETEXT","Alternativ tekst:");
define_once("_HOPEYOULIKED","Håper du ble fornøyd med våre tjenester. Vi ser frem til å få deg som kunde igjen i fremtiden!");
define_once("_THANKSUPPORT","Takk for din støtte");
define_once("_TEAM","Team");
define_once("_BANNERSFINNISHED","Bannerannonser avsluttet");
define_once("_MODREQLINKS","Mod. linker");
define_once("_BROKENLINKS","Ødelagte linker");
define_once("_MODREQDOWN","Mod. nedlastninger");
define_once("_BROKENDOWN","Ødelagte nedlastninger");
define_once("_PAGEGENERATION","Sidegenerering:");
define_once("_SECONDS","Sekunder");
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

