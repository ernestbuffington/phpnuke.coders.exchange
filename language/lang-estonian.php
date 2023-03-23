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

define_once("_CHARSET","ISO-8859-15");
define_once("_SEARCH","Otsi");
define_once("_LOGIN","Logi sisse");
define_once("_WRITES","kirjutab");
define_once("_POSTEDON","Postitatud");
define_once("_NICKNAME","Kasutajanimi");
define_once("_PASSWORD","Salasõna");
define_once("_WELCOMETO","Teretulemast");
define_once("_EDIT","Redigeeri");
define_once("_DELETE","Kustuta");
define_once("_POSTEDBY","Postitanud");
define_once("_READS","korda loetud");
define_once("_GOBACK","[ <a href=\"javascript:history.go(-1)\">Mine tagasi</a> ]");
define_once("_COMMENTS","kommentaari");
define_once("_PASTARTICLES","Möödunud artiklid");
define_once("_OLDERARTICLES","Vanemad artiklid");
define_once("_BY","Postitaja");
define_once("_ON","");   /** Oli enne tühi ? **/
define_once("_LOGOUT","Logi välja");
define_once("_WAITINGCONT","Saadetised");
define_once("_SUBMISSIONS","Saadetised");
define_once("_WREVIEWS","Ootan ülevaateid");
define_once("_WLINKS","Saadetud lingid");
define_once("_EPHEMERIDS","Päevasündmused");
define_once("_ONEDAY","Ühel päeval nagu täna...");
define_once("_ASREGISTERED","Pole veel kontot? Saad selle registreerida uue konto <a href=\"modules.php?name=Your_Account&amp;op=new_user\">SIIN</a>.");
define_once("_MENUFOR","Isiklik menüü -");
define_once("_NOBIGSTORY","Hetkel pole tänast suurimat juttu.");
define_once("_BIGSTORY","Tänased enim loetud jutud on:");
define_once("_SURVEY","Küsitlus");
define_once("_POLLS","Küsitlused");
define_once("_PCOMMENTS","Kommentaarid:");
define_once("_RESULTS","Tulemused");
define_once("_HREADMORE","loe rohkem...");
define_once("_CURRENTLY","Praegu on,");
define_once("_GUESTS","külastaja(d) ja");
define_once("_MEMBERS","kasutaja(d) kes on praegu portaalis.");
define_once("_YOUARELOGGED","Sa oled sisse loginud nimega");
define_once("_YOUHAVE","Sulle on");
define_once("_PRIVATEMSG","privaatsõnum(it).");
define_once("_YOUAREANON","Sa oled Anonüümne kasutaja. Sa saad registreerida vabalt vajutades <a href=\"modules.php?name=Your_Account&amp;op=new_user\">SIIA</a>");
define_once("_NOTE","Märkus:");
define_once("_ADMIN","Adminn:");
define_once("_WERECEIVED","Portaali on külastatud ");
define_once("_PAGESVIEWS","korda, alates");
define_once("_TOPIC","Teema");
define_once("_UDOWNLOADS","Allalaetuid kordi");
define_once("_VOTE","Hääl");
define_once("_VOTES","Häält");
define_once("_MVIEWADMIN","Näita: Ainult administraatoreid");
define_once("_MVIEWUSERS","Näita: Ainult registreeritud kasutajaid");
define_once("_MVIEWANON","Näita: Ainult anonüümseid kasutajaid");
define_once("_MVIEWALL","Näita: Kõiki külalisi");
define_once("_EXPIRELESSHOUR","Lõpetamine: Vähem kui tunni pärast");
define_once("_EXPIREIN","Lõpetatakse");
define_once("_HTTPREFERERS","Kohad kust lingitakse");
define_once("_UNLIMITED","Piiramatu");
define_once("_HOURS","Tundi");
define_once("_RSSPROBLEM","Praegu on probleeme selle lehe pealkirjadega");
define_once("_SELECTLANGUAGE","Vali keel");
define_once("_SELECTGUILANG","Vali kasutajaliidese keel:");
define_once("_NONE","Puudub");
define_once("_BLOCKPROBLEM","<center>Selle blokiga on hetkel probleeme.</center>");
define_once("_BLOCKPROBLEM2","<center>See blokk on praegu tühi.</center>");
define_once("_MODULENOTACTIVE","Vabandust, see Moodul pole aktiivne!");
define_once("_NOACTIVEMODULES","Passiivsed moodulid");
define_once("_FORADMINTESTS","(Adminni testid)");
define_once("_BBFORUMS","Foorumid");
define_once("_ACCESSDENIED", "Juurdepääs keelatud");
define_once("_RESTRICTEDAREA", "Sa proovid pääseda keelatud alale.");
define_once("_MODULEUSERS", "Vabandame, aga see rubriik on <i>ainul registreeritud kasutajatele</i><br><br>Sa võid registreerida vabalt vajutades <a href=\"modules.php?name=Your_Account&op=new_user\">SIIA</a>, siis saad sa<br>siseneda siia rubriiki ilma piiranguteta. Tänan.<br><br>");
define_once("_MODULESADMINS", "Meil on kahju aga see rubriik on ainult <i>Administraatoritele</i><br><br>");
define_once("_HOME","Avaleht");
define_once("_HOMEPROBLEM","Siin on üks suur probleem: meil nimelt pole esilehte!!!");
define_once("_ADDAHOME","Lisa moodul oma lehele ");
define_once("_HOMEPROBLEMUSER","Hetkel on probleeme esilehega. Palun tule hiljem tagasi.");
define_once("_MORENEWS","Rohkem uudiste rubriigis");
define_once("_ALLCATEGORIES","Kõik kategooriad");
define_once("_DATESTRING","%A,%d.%B.%Y kell %H:%M:%S");
define_once("_DATESTRING2","%A, %B %d");
define_once("_DATE","Kuupäev");
define_once("_HOUR","Tund");
define_once("_UMONTH","Kuu");
define_once("_YEAR","Aasta");
define_once("_JANUARY","Jaanuar");
define_once("_FEBRUARY","Veebruar");
define_once("_MARCH","Märts");
define_once("_APRIL","Aprill");
define_once("_MAY","Mai");
define_once("_JUNE","Juuni");
define_once("_JULY","Juuli");
define_once("_AUGUST","August");
define_once("_SEPTEMBER","September");
define_once("_OCTOBER","Oktoober");
define_once("_NOVEMBER","November");
define_once("_DECEMBER","Detsember");
define_once("_BWEL","Tervitus");
define_once("_BPM","Privaatsed sõnumid");
define_once("_BUNREAD","Lugemata");
define_once("_BREAD","Loetuid");
define_once("_BMEMP","Liikmed");
define_once("_BLATEST","Viimane");
define_once("_BTD","Uued Täna");
define_once("_BYD","Uued Eile");
define_once("_BOVER","Üleüldse");
define_once("_BVISIT","Inimesi Portaalis");
define_once("_BVIS","Külalisi");
define_once("_BMEM","Liikmeid");
define_once("_BTT","Kokku");
define_once("_BON","Portaalis praegu");
define_once("_BREG","Registreeri");
define_once("_BROADCAST","Avalda avalik sõnum");
define_once("_BROADCASTFROM","Avalik sõnum liikmelt");
define_once("_TURNOFFMSG","Lülita välja avalikud sõnumid");
define_once("_JOURNAL","Päevik");
define_once("_READMYJOURNAL","Loe mu päevikut");
define_once("_ADD","Lisa");
define_once("_YES","Jah");
define_once("_NO","Ei");
define_once("_INVISIBLEMODULES","Nähtamatud moodulid");
define_once("_ACTIVEBUTNOTSEE","(Aktiivsed, aga nähtamatud lingid)");
define_once("_THISISAUTOMATED","See on automatiseeritud email, et teile teatada: Teie reklaambänner on meie veebilehel üleval.");
define_once("_THERESULTS","Teie kampaania tulemused on järgnevad:");
define_once("_TOTALIMPRESSIONS","Näitamisi tehtud kokku:");
define_once("_CLICKSRECEIVED","Klikitud kordi:");
define_once("_IMAGEURL","Pildi URL");
define_once("_CLICKURL","Kliki URL:");
define_once("_ALTERNATETEXT","Laiendatud tekst:");
define_once("_HOPEYOULIKED","Loodame, et sulle meeldivad meie teenused. Ootame edaspidist koostööd!");
define_once("_THANKSUPPORT","Tänud koostöö eest");
define_once("_TEAM","Tiim");
define_once("_BANNERSFINNISHED","Bännerite lisamine lõpetatud");
define_once("_MODREQLINKS","Uuenda linke");
define_once("_BROKENLINKS","Vigased lingid");
define_once("_MODREQDOWN","Uuenda faile");
define_once("_BROKENDOWN","Vigased failid");
define_once("_PAGEGENERATION","Lehe genereerimine:");
define_once("_SECONDS","Sekundit");
define_once("_YOUHAVEONEMSG","Sulle on 1 uus privaatsõnum");
define_once("_YOUHAVE","Sulle on");
define_once("_NEWPMSG","Uut privaatsõnumit");
define_once("_CONTRIBUTEDBY","Kaasa aitas");
define_once("_CHAT","Jututuba");
define_once("_REGISTERED","Registreerituid");
define_once("_CHATGUESTS","Külastajaid");
define_once("_USERSTALKINGNOW","Kasutajat räägivad hetkel");
define_once("_ENTERTOCHAT","Sisene jututuppa");
define_once("_CHATROOMS","Olemasolevad toad");
define_once("_SECURITYCODE","Turvakood");
define_once("_TYPESECCODE","Kirjuta turvakood");
define_once("_ASSOTOPIC","Seostatud teemad");
define_once("_ADDITIONALYGRP","Täiendavalt kuulub see moodul Kasutajate Grupile");
define_once("_YOUHAVEPOINTS","Punktid, mis sul on portaalis osalemise eest:");
define_once("_MVIEWSUBUSERS","Näita: Ainult tellinud kasutajaid");
define_once("_MODULESSUBSCRIBER","Meil on kahju, aga see sektsioon on ainult <i>tellinud kasutajatele.</i>");
define_once("_SUBHERE","Sa saad meie teenuseid tellida <a href=\"$subscription_url\">SIIT</a>");
define_once("_SUBEXPIRED","Sinu tellimus on aegunud");
define_once("_HELLO","Tere");
define_once("_SUBSCRIPTIONAT","See automatiseeritud email annab teada, et sinu tellimus");
define_once("_HASEXPIRED","on aegunud.");
define_once("_HOPESERVED","Loodame, et oleme Sind meeldivalt teenindanud...");
define_once("_SUBRENEW","Kui Sa soovid oma tellimust uuendada, siis mine:");
define_once("_YOUARE","Sa oled");
define_once("_SUBSCRIBER","meie portaalis tellijate nimekirjas");
define_once("_OF","-");   /** of **/
define_once("_SBYEARS","aastat");
define_once("_SBYEAR","aasta");
define_once("_SBMINUTES","minutit");
define_once("_SBHOURS","tundi");
define_once("_SBSECONDS","sekundit");
define_once("_SBDAYS","päeva");
define_once("_SUBEXPIREIN","Sinu tellimus aegub:");
define_once("_NOTSUB","Sa pole järgneva tellija");
define_once("_SUBFROM","Tellida saad sa");
define_once("_HERE","siin");
define_once("_NOW","nüüd!");
define_once("_ADMSUB","Tellinud kasutaja!");
define_once("_ADMNOTSUB","Kasutaja POLE tellinud");
define_once("_ADMSUBEXPIREIN","Tellimus aegub:");
define_once("_LASTIP","Viimase kasutaja IP:");
define_once("_BANTHIS","Bänni see IP");
define_once("_HTMLNOTALLOWED","HTML kood ei ole lubatud. Palun kasuta redaktori funktsioone.");
define_once("_KARMAGOOD","Hea karma");
define_once("_KARMALOW","Tavaline karma");
define_once("_KARMABAD","Halb karma");
define_once("_KARMADEVIL","Kurtalik karma");
define_once("_COMMENTMODERATED","Sinu kommentaarid on saadetud. Kuna sinu karma seisuks on administraator märkinud Halb, siis kommentaar vaadaatakse enne postitamist administraatorite poolt üle. Palun ära postita oma kommentaari kaks korda või sinu karmat võidakse alandada järgmisele tasemele.<br><br>Meie meeskond kas kiidab sinu kommentaari heaks või kustuab selle.");
define_once("_MODERATEDTITLE","Kommentaar saadetud - Heakskiidu ootel");
define_once("_MODERATEDRETURN","Mine tagasi artikli lehele");
/*****************************************************/
/* Function to translate Datestrings                 */
/*****************************************************/

function translate($phrase) {
    switch($phrase) {
        case "xdatestring":        $tmp = "%A, %B %d @ %T %Z"; break;
        case "linksdatestring":        $tmp = "%d-%b-%Y"; break;
        case "xdatestring2":        $tmp = "%A, %B %d"; break;
        default:                $tmp = "$phrase"; break;
    }
    return $tmp;
}

define_once("_HTMLNOTALLOWED2","HTML code isn't allowed here.");
define_once("_ERRORINVEMAIL","ERROR: Invalid Email");

