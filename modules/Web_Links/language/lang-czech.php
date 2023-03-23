<?php
global $sitename;
if(!isset($anonwaitdays)) { $anonwaitdays = 0; }
if(!isset($outsidewaitdays)) { $outsidewaitdays = 0; }


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

define_once("_URL","URL");
define_once("_PREVIOUS","Pøedchozí stránka");
define_once("_NEXT","Další stránka");
define_once("_YOURNAME","Vaše jméno");
define_once("_CATEGORY","Kategorie");
define_once("_CATEGORIES","Kategorie");
define_once("_LVOTES","hlasovalo");
define_once("_TOTALVOTES","Celkem hlasovalo:");
define_once("_LINKTITLE","Název odkazu");
define_once("_HITS","Klinkutí");
define_once("_THEREARE","V souèasné dobì je");
define_once("_NOMATCHES","Nebyl nalezen záznam na váš poadavek");
define_once("_SCOMMENTS","Komentáøe");
define_once("_DESCRIPTION","Popis");
define_once("_ONLYREGUSERSMODIFY","Pouze registrovaní uivatelé mohou hlásit úpravy. Prosím <a href=\"modules.php?name=Your_Account\">Registrujte se nebo se pøihlašte</a>.");
define_once("_RATENOTE4","Mùete si prohlédnout <a href=\"modules.php?name=Downloads&amp;d_op=TopRated\">ebøíèek nejlépe hodnocenıch</a>.");
define_once("_DATE","Datum");
define_once("_TO","Komu");
define_once("_ADDLINK","Pøidat odkaz");
define_once("_NEW","Nové");
define_once("_POPULAR","Populární");
define_once("_TOPRATED","Nejlépe hodnocené");
define_once("_RANDOM","Náhodné");
define_once("_LINKSMAIN","Hlavní stránka odkazù");
define_once("_LINKCOMMENTS","Komentáøe k odkazu");
define_once("_ADDITIONALDET","Detaily");
define_once("_EDITORREVIEW","Kontroloval");
define_once("_REPORTBROKEN","Zpráva o neplatném odkazu");
define_once("_LINKSMAINCAT","Hlavní kategorie odkazù");
define_once("_AND","a");
define_once("_INDB","v naší databázi");
define_once("_ADDALINK","Pøidat novı odkaz");
define_once("_INSTRUCTIONS","Instrukce");
define_once("_SUBMITONCE","Odešlete jeden odkaz pouze jednou.");
define_once("_POSTPENDING","Všechny odeslané odkazy a soubory musí bıt ovìøeny.");
define_once("_USERANDIP","Pøezdívka a IP adresa jsou zaznamenávány, netırejte prosím náš systém.");
define_once("_PAGETITLE","Název stránky");
define_once("_PAGEURL","URL");
define_once("_YOUREMAIL","Váš e-mail");
define_once("_LDESCRIPTION","Popis: (max. 255 znakù)");
define_once("_ADDURL","Pøidat tuto URL");
define_once("_LINKSNOTUSER1","Nejste pøihlášen(a) nebo nejste zaregistrován(a).");
define_once("_LINKSNOTUSER2","Pokud se zaregistrujete mùete pøidávat odkazy na tomto webu.");
define_once("_LINKSNOTUSER3","Stát se registrovanım uivatelem je snadnı a rychlı proces.");
define_once("_LINKSNOTUSER4","Proè vyadujeme registraci?");
define_once("_LINKSNOTUSER5","Chceme vám poskytnou sluby nejvyšší kvality,");
define_once("_LINKSNOTUSER6","kadá poloka je samostanì zkontrolována a odsouhlasena našimi spolupracovníky.");
define_once("_LINKSNOTUSER7","Doufáme, e vám budeme poskytovat pouze hodnotné informace.");
define_once("_LINKSNOTUSER8","<a href=\"modules.php?name=Your_Account\">Zaloit úèet</a>");
define_once("_LINKALREADYEXT","CHYBA: Tuto adresu ji v databázi evidujeme!");
define_once("_LINKNOTITLE","CHYBA: Musí bıt zadán název stránky!");
define_once("_LINKNOURL","CHYBA: Musí bıt zadána adresa stránky!");
define_once("_LINKNODESC","CHYBA: Musí bıt zadán popis stránky!");
define_once("_LINKRECEIVED","Pøijali jsme váš odkaz ke zpracování. Díky!");
define_once("_EMAILWHENADD","Po provìøení odkazu Vám pøijde potvrzující e-mail.");
define_once("_CHECKFORIT","Nepište nám e-maily. Váš odkaz bude provìøen co nejdøíve.");
define_once("_NEWLINKS","Nové odkazy");
define_once("_TOTALNEWLINKS","Všechny nové odkazy");
define_once("_LASTWEEK","Poslední tıden");
define_once("_LAST30DAYS","Posledních 30 dní");
define_once("_1WEEK","1 tıden");
define_once("_2WEEKS","2 tıdny");
define_once("_30DAYS","30 dní");
define_once("_SHOW","Ukázat");
define_once("_TOTALFORLAST","všechny nové odkazy za");
define_once("_DAYS","dní");
define_once("_ADDEDON","Pøidáno dne:");
define_once("_RATING","Hodnocení");
define_once("_RATESITE","Zhodnote tuto stránku");
define_once("_DETAILS","Detaily");
define_once("_BESTRATED","Nejlépe hodnocené odkazy - TOP");
define_once("_OF","ze");
define_once("_TRATEDLINKS","všech hodnocenıch odkazù");
define_once("_TVOTESREQ","je minimum poadovanıch hlasù");
define_once("_SHOWTOP","Ukázat TOP");
define_once("_MOSTPOPULAR","Nejpopulárnìjší - TOP");
define_once("_OFALL","ze všech");
define_once("_SORTLINKSBY","Tøídit odkazy podle");
define_once("_SITESSORTED","Stránky jsou momentálnì øazeny podle");
define_once("_POPULARITY","Oblíbené");
define_once("_SELECTPAGE","Vybrat stránku");
define_once("_MAIN","Hlavní");
define_once("_NEWTODAY","Nové dnes");
define_once("_NEWLAST3DAYS","Nové za poslední 3 dny");
define_once("_NEWTHISWEEK","Nové za tento tıden");
define_once("_CATNEWTODAY","Nové odkazy v této kategorii pøidané dnes");
define_once("_CATLAST3DAYS","Nové odkazy v této kategorii pøidané za poslední 3 dny");
define_once("_CATTHISWEEK","Nové odkazy v této kategorii pøidané tento tıden");
define_once("_POPULARITY1","Oblíbeností (od nejménì po nejvíce)");
define_once("_POPULARITY2","Oblíbeností (od nejvíce po nejménì)");
define_once("_TITLEAZ","Názvu (od A do Z)");
define_once("_TITLEZA","Názvu (od Z do A)");
define_once("_DATE1","Data (Nejdøíve starší)");
define_once("_DATE2","Data (nejdøíve nové)");
define_once("_RATING1","Hodnocení (od nejnišího k nejvyššímu)");
define_once("_RATING2","Hodnocení (od nejvyššího k nejniššímu)");
define_once("_SEARCHRESULTS4","Vısledky hledání pro heslo");
define_once("_USUBCATEGORIES","Subkategorie");
define_once("_LINKS","Odkazy");
define_once("_TRY2SEARCH","Pokuste se najít");
define_once("_INOTHERSENGINES","v dalších vyhledávaèích");
define_once("_EDITORIAL","Úvodník");
define_once("_LINKPROFILE","Profil odkazu");
define_once("_EDITORIALBY","Úvodník napsal");
define_once("_NOEDITORIAL","Není dostupnı ádnı komentáø k tomuto webu.");
define_once("_VISITTHISSITE","Navštívit tento web");
define_once("_RATETHISSITE","Hodnotit tento web");
define_once("_ISTHISYOURSITE","Je to váš web?");
define_once("_ALLOWTORATE","Umonìte vašim uivatelùm hodnotit pøímo z vaší stránky!");
define_once("_LINKRATINGDET","Detaily hodnocení");
define_once("_OVERALLRATING","Celkové hodnocení");
define_once("_TOTALOF","Celkem z");
define_once("_USER","uivatel");
define_once("_USERAVGRATING","prùmìrné hodnocení");
define_once("_NUMRATINGS","# z hodnocenıch");
define_once("_EDITTHISLINK","Upravit tento odkaz");
define_once("_REGISTEREDUSERS","Registrovaní uivatelé");
define_once("_NUMBEROFRATINGS","Poèet hodnocenıch");
define_once("_NOREGUSERSVOTES","Nehlasoval ádnı registrovanı uivatel");
define_once("_BREAKDOWNBYVAL","Chyba v hodnocení u");
define_once("_LTOTALVOTES","celkem hlasù");
define_once("_LINKRATING","Hodnocení odkazù");
define_once("_HIGHRATING","Vysoké hodnocení");
define_once("_LOWRATING","Nízké hodnocení");
define_once("_NUMOFCOMMENTS","Poèet komentáøù");
define_once("_WEIGHNOTE","* Poznámka: Porovnávají se hlasy registrovanıch a neregistrovanıch uivatelù");
define_once("_NOUNREGUSERSVOTES","ádnı neregistrovanı uivatel nehlasoval");
define_once("_WEIGHOUTNOTE","* Poznámka: Dìláme rozdíl mezi hodnocením registrovanıch a hodnotitelù od jinud");
define_once("_NOOUTSIDEVOTES","Nehodnotil nikdo od jinud");
define_once("_OUTSIDEVOTERS","Hlasy od jinud");
define_once("_UNREGISTEREDUSERS","Neregistrovaní uivatelé");
define_once("_PROMOTEYOURSITE","Podporujte svùj web");
define_once("_PROMOTE01","Pøipravili jsme pro vás nìkolik moností, jak hodnotit vaší stránku v našem Archívu odkazù.");
define_once("_TEXTLINK","Textovı odkaz");
define_once("_PROMOTE02","Jednou z cest k hodnocení vašich stránek je jednoduchı textovı odkaz");
define_once("_HTMLCODE1","Zkopírujte si tento HTML kód na svou stránku:");
define_once("_THENUMBER","Èíslo");
define_once("_IDREFER","v tomto kódu znamená ID, pod kterım je uloen odkaz v naší databázi. Pøesvìète se, prosím, e odkaz skuteènì odkazuje na vaši stránku.");
define_once("_BUTTONLINK","Tlaèítko");
define_once("_PROMOTE03","Pokud hledáte nìco jiného ne jednoduchı textovı odkaz, mùete pouít toto tlaèítko:");
define_once("_RATEIT","Hodnotit tuto stránku!");
define_once("_HTMLCODE2","Kód pro pøidání je zde:");
define_once("_REMOTEFORM","Dálkovı hodnotící formuláø");
define_once("_PROMOTE04","Nezneuívejte hodnotící formuláøe. Naše politika je jednoduchá: Pokud najdeme web s formuláøem, kterı neodpovídá zápisu v databázi, zablokujeme monost hodnocení tohoto webu nebo ho vyøadíme z naší databáze.");
define_once("_VOTE4THISSITE","Hlasujte pro tuto stránku!");
define_once("_LINKVOTE","Hlasovat!");
define_once("_HTMLCODE3","Pokud pouijete tento formuláø, mohou návštìvníci vaší stránky hodnotit váš wb pøímo na vaší stránce. Pøedchozí dva typy to neumoòují.Zdrojovı kód formuláøe je zde:");
define_once("_PROMOTE05","Díky a hodnì štìstí v hodnocení!");
define_once("_STAFF","tım");
define_once("_THANKSBROKEN","Díky za vaši pomoc pøi udrování platnosti databáze.");
define_once("_THANKSFORINFO","Díky za informaci.");
define_once("_LOOKTOREQUEST","Co nejdøíve váš poadavek vyøídíme.");
define_once("_REQUESTLINKMOD","Poadavek na úpravu odkazu");
define_once("_LINKID","Odkaz ID");
define_once("_SENDREQUEST","Poslat poadavek");
define_once("_THANKSTOTAKETIME","Díky za èas vìnovanı hodnocení stránky na");
define_once("_LETSDECIDE","Uivatelé jako jste vy poháhají ostatním pøi rozhodování na kterı odkaz kliknout.");
define_once("_RETURNTO","Zpìt na");
define_once("_RATENOTE1","Nehlasujte, prosím, pro jeden odkaz více ne jednou.");
define_once("_RATENOTE2","Stupnice je 1 - 10, kde 1 je nejhorší a 10 nejlepší.");
define_once("_RATENOTE3","Prosím buïte objektivní, pokud bude kadı hlasovat 1 nebo 10, není hodnocení k nièemu.");
define_once("_RATENOTE5","Nehlasujte pro svùj pøíspìvek.");
define_once("_YOUAREREGGED","Jste registrovanı uivatel a jste pøihlášen(a).");
define_once("_FEELFREE2ADD","Neostıchejte se komentovat tuto stránku.");
define_once("_YOUARENOTREGGED","Nejste registrovanı uivatel nebo nejste pøihlášen(a).");
define_once("_IFYOUWEREREG","Pokud se zaregistrujete, mùete komentovat na tomto webu.");
define_once("_WEBLINKS","Archív odkazù");
define_once("_TITLE","Název");
define_once("_MODIFY","Upravit");
define_once("_COMPLETEVOTE1","Your vote is appreciated.");
define_once("_COMPLETEVOTE2","You have already voted for this resource in the past $anonwaitdays day(s).");
define_once("_COMPLETEVOTE3","Vote for a resource only once.<br>All votes are logged and reviewed.");
define_once("_COMPLETEVOTE4","You cannot vote on a link you submitted.<br>All votes are logged and reviewed.");
define_once("_COMPLETEVOTE5","No rating selected - no vote tallied");
define_once("_COMPLETEVOTE6","Only one vote per IP address allowed every $outsidewaitdays day(s).");
define_once("_LINKSDATESTRING","%d-%b-%Y");

