<?php
if(!isset($subscription_url)) $subscription_url = '';

/**************************************************************************/
/* PHP-NUKE: Advanced Content Management System                           */
/* ============================================                           */
/* Dato: 6. september 2002                                                */
/* PHP-NUKE Version: 6.0                                                  */
/* Denne sprog-fil er blevet oversat til dansk fra engelsk af:            */
/*                                                                        */
/* Navn:	Christian Botved Poulsen                                      */
/* E-mail:	Christian_B_P@Get2net.dk                                      */
/* ICQ:	155265588                                                         */
/* Webside:	www.Sjove-Film.dk - HitsMaskinen.dk - FilmCentralen.dk        */
/*                                                                        */
/* Hvis de finder fejl må og skal de sende en e-mail eller icq til mig!   */
/**************************************************************************/

define_once("_CHARSET","ISO-8859-1");
define_once("_SEARCH","Søg");
define_once("_LOGIN"," Log ind ");
define_once("_WRITES","skriver");
define_once("_POSTEDON","Postet");
define_once("_NICKNAME","Brugernavn");
define_once("_PASSWORD","Kodeord");
define_once("_WELCOMETO","Velkommen til");
define_once("_EDIT","Redigér");
define_once("_DELETE","Slet");
define_once("_POSTEDBY","Postet af");
define_once("_READS","hits");
define_once("_GOBACK","[ <a href=\"javascript:history.go(-1)\">Tilbage</a> ]");
define_once("_COMMENTS","kommentarer");
define_once("_PASTARTICLES","Tidligere artikler");
define_once("_OLDERARTICLES","Ældre artikler");
define_once("_BY","af");
define_once("_ON","Dato:");
define_once("_LOGOUT","Log ud");
define_once("_WAITINGCONT","Bidrag");
define_once("_SUBMISSIONS","Artikler");
define_once("_WREVIEWS","Anmeldelser");
define_once("_WLINKS","Links");
define_once("_EPHEMERIDS","Begivenhedssystemet");
define_once("_ONEDAY","På en dag som i dag...");
define_once("_ASREGISTERED","Er du endnu ikke oprettet som bruger? Du kan gratis <a href=\"modules.php?name=Your_Account\">oprette</a> en brugerkonto. Som bruger kan du ændre udseende på websitet, ændre opsætning, skrive kommentarer i dit eget navn og modtage vores nyhedsbrev.");
define_once("_MENUFOR","Menu for");
define_once("_NOBIGSTORY","Der er endnu ikke nogen Dagens artikel.");
define_once("_BIGSTORY","Dagens mest læste artikel er:");
define_once("_SURVEY","Afstemning");
define_once("_POLLS","Afstemninger");
define_once("_PCOMMENTS","Kommentarer:");
define_once("_RESULTS","Resultat");
define_once("_HREADMORE","læs mere...");
define_once("_CURRENTLY","Lige nu er der");
define_once("_GUESTS","gæst(er) og ");
define_once("_MEMBERS","bruger(e) online.");
define_once("_YOUARELOGGED","Du er logget ind som");
define_once("_YOUHAVE","Du har");
define_once("_PRIVATEMSG","privat(e) besked(er).");
define_once("_YOUAREANON","Du er ikke oprettet som bruger. Du kan blive bruger ved at klikke <a href=\"modules.php?name=Your_Account\">her</a>");
define_once("_NOTE","Note:");
define_once("_ADMIN","Administrator:");
define_once("_WERECEIVED","Vi har modtaget");
define_once("_PAGESVIEWS","pagehits siden");
define_once("_TOPIC","Emne");
define_once("_UDOWNLOADS","Downloads");
define_once("_VOTE","Stem");
define_once("_VOTES","Stemmer");
define_once("_MVIEWADMIN","Kan kun ses af administratorer");
define_once("_MVIEWUSERS","Kan kun ses af registrerede brugere");
define_once("_MVIEWANON","Kan kun ses af anonyme brugere");
define_once("_MVIEWALL","Kan ses af alle besøgende");
define_once("_EXPIRELESSHOUR","Udløbstidspunkt: Om mindre end 1 time");
define_once("_EXPIREIN","Udløber om");
define_once("_HTTPREFERERS","Hvem linker til sitet");
define_once("_UNLIMITED","Ubegrænset");
define_once("_HOURS","Timer");
define_once("_RSSPROBLEM","Der er i øjeblikket problemer med at modtage overskrifter fra dette website.");
define_once("_SELECTLANGUAGE","Vælg sprog");
define_once("_SELECTGUILANG","Vælg sprog:");
define_once("_NONE","Ingen");
define_once("_BLOCKPROBLEM","<center>Der er ligenu et problem med denne blok.</center>");
define_once("_BLOCKPROBLEM2","<center>Der er ligenu intet inhold til denne blok.</center>");
define_once("_MODULENOTACTIVE","Desvære, dette modul er ikke aktiveret!");
define_once("_NOACTIVEMODULES","Deaktiverede moduler");
define_once("_FORADMINTESTS","(Til admin test)");
define_once("_BBFORUMS","Fora");
define_once("_ACCESSDENIED","Ingen adgang");
define_once("_RESTRICTEDAREA","De forsøger at få adgang til et beskyttet område.");
define_once("_MODULEUSERS","Desværre men den her del af siden er kun for <i>Tilmeldte brugere</i><br><br>De kan dog GRATIS blive medlem ved at trykke <a href=\"modules.php?name=Your_Account&op=new_user\">her</a>, så kan de bagefter få<br> adgang til dette område.<br><br>");
define_once("_MODULESADMINS","Desværre men denne del af siden er kun for <i>Webmastere</i><br><br>");
define_once("_HOME","Hjem");
define_once("_HOMEPROBLEM","Her er et stort problem: vi har ingen hjemmeside!!!");
define_once("_ADDAHOME","TIlføj et modul til deres \"Hjem\".");
define_once("_HOMEPROBLEMUSER","Der er ligenu et problem på siden. Vær venlig at komme tilbage senere.");
define_once("_MORENEWS","Mere i nyheds sektionen");
define_once("_ALLCATEGORIES","Alle kategorier");
define_once("_DATESTRING","%A, %d. %B kl. %T");
define_once("_DATESTRING2","%A, %B %d");
define_once("_DATE","Dato");
define_once("_HOUR","Time");
define_once("_UMONTH","Måned");
define_once("_YEAR","År");
define_once("_JANUARY","Januar");
define_once("_FEBRUARY","Februar");
define_once("_MARCH","Marst");
define_once("_APRIL","April");
define_once("_MAY","Maj");
define_once("_JUNE","Juni");
define_once("_JULY","Juli");
define_once("_AUGUST","August");
define_once("_SEPTEMBER","September");
define_once("_OCTOBER","Oktober");
define_once("_NOVEMBER","November");
define_once("_DECEMBER","December");
define_once("_BWEL","Velkommen");
define_once("_BPM","Privat besked");
define_once("_BUNREAD","Uaflæst");
define_once("_BREAD","Læs");
define_once("_BMEMP","Medlemskab");
define_once("_BLATEST","Nyeste");
define_once("_BTD","Ny i dag");
define_once("_BYD","Ny i går");
define_once("_BOVER","Overalt");
define_once("_BVISIT","Besøgende online");
define_once("_BVIS","Besøgende");
define_once("_BMEM","Medlemmer");
define_once("_BTT","Total");
define_once("_BON","Online nu");
define_once("_BREG","Registrer");
define_once("_BROADCAST","Udsende en Offenlig meddelse");
define_once("_BROADCASTFROM","Offenlig meddelse fra");
define_once("_TURNOFFMSG","Sluk for offenlig meddelser");
define_once("_JOURNAL","Dagbog");
define_once("_READMYJOURNAL","Læs min dagbog");
define_once("_ADD","Tilføj");
define_once("_YES","Ja");
define_once("_NO","Nej");
define_once("_INVISIBLEMODULES","Usynlige moduler");
define_once("_ACTIVEBUTNOTSEE","(Aktive men usynlige links)");
define_once("_THISISAUTOMATED","Dette er en automatisk e-mail for at fortælle Dem at deres banner annonsering på vores side: &sitename , netop er slut.");
define_once("_THERESULTS","Resultaterne af deres kampagne er følgende:");
define_once("_TOTALIMPRESSIONS","Bannervisninger i alt:");
define_once("_CLICKSRECEIVED","Antal kliks:");
define_once("_IMAGEURL","Billede URL");
define_once("_CLICKURL","Klik URL:");
define_once("_ALTERNATETEXT","Skiftelig tekst:");
define_once("_HOPEYOULIKED","Vi håber De er tilfredse med vores service. Og vi vil se frem til et evt. nyt samarbejde.");
define_once("_THANKSUPPORT","Tak for deres support");
define_once("_TEAM","Team");
define_once("_BANNERSFINNISHED","Afsluttede bannere");
define_once("_MODREQLINKS","Mod. links");
define_once("_BROKENLINKS","Ødelagt link");
define_once("_MODREQDOWN","Mod. downloads");
define_once("_BROKENDOWN","Ødelagt download");
define_once("_PAGEGENERATION","Siden blev lavet på:");
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

