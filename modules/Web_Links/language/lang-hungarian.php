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
define_once("_PREVIOUS","Elõzõ oldal");
define_once("_NEXT","Következõ oldal");
define_once("_YOURNAME","Neved");
define_once("_CATEGORY","Kategória");
define_once("_CATEGORIES","kategória");
define_once("_LVOTES","szavazat");
define_once("_TOTALVOTES","Összes szavazat:");
define_once("_LINKTITLE","A céloldal neve");
define_once("_HITS","találat");
define_once("_THEREARE","Jelenleg");
define_once("_NOMATCHES","A keresés nem eredményezett találatot");
define_once("_SCOMMENTS","Hozzászólások");
define_once("_DESCRIPTION","Leírás");
define_once("_ONLYREGUSERSMODIFY","Only registered users can suggest links modifications. Please <a href=\"modules.php?name=Your_Account\">register or login</a>.");
define_once("_DATE","Dátum");
define_once("_TO","Címzett");
define_once("_ADDLINK","Link hozzáadása");
define_once("_NEW","Legújabb");
define_once("_POPULAR","Legnépszerûbb");
define_once("_TOPRATED","Legjobbra osztályozott");
define_once("_RANDOM","Véletlenszerûen");
define_once("_LINKSMAIN","Linkek kezdõoldala");
define_once("_LINKCOMMENTS","Vélemények");
define_once("_ADDITIONALDET","Egyéb részletek");
define_once("_EDITORREVIEW","Szerkesztõi vélemény");
define_once("_REPORTBROKEN","Törött link bejelentése");
define_once("_LINKSMAINCAT","Linkek - fõ kategóriák");
define_once("_AND","és");
define_once("_INDB","található az adatbázisban");
define_once("_ADDALINK","Új link hozzáadása");
define_once("_INSTRUCTIONS","Útmutató");
define_once("_SUBMITONCE","Egy linket csak egyszer küldj el.");
define_once("_POSTPENDING","A linkek csak ellenõrzés után kerül az adatbázisba.");
define_once("_USERANDIP","A felhasználónév és az IP cím feljegyzésre kerül, kérjük, ne élj vissza a rendszerrel.");
define_once("_PAGETITLE","Az oldal címe");
define_once("_PAGEURL","Link");
define_once("_YOUREMAIL","e-mail címed");
define_once("_LDESCRIPTION","Leírás: (max. 255 karakter)");
define_once("_ADDURL","Link hozzáadása");
define_once("_LINKSNOTUSER1","Nem vagy regisztrált tagunk, vagy nem léptél be.");
define_once("_LINKSNOTUSER2","Ha regisztrálnád magad, te is hozzáadhatnál új linkeket.");
define_once("_LINKSNOTUSER3","A regisztráció gyors és igen egyszerû folyamat.");
define_once("_LINKSNOTUSER4","Hogy miért kérünk regisztrációt egyes oldalakon?");
define_once("_LINKSNOTUSER5","Hogy a legmagasabb szintû tartalommal szolgálhassunk,");
define_once("_LINKSNOTUSER6","minden bevitt adatot egyesével ellenõriznek munkatársaink.");
define_once("_LINKSNOTUSER7","Reméljük, hogy mindenhol sikerül értékes információkat nyújtanunk.");
define_once("_LINKSNOTUSER8","<a href=\"modules.php?name=Your_Account\">Regisztráld magad!</a>");
define_once("_LINKALREADYEXT","HIBA: Ez az URL már benne van az adatbázisunkban!");
define_once("_LINKNOTITLE","HIBA: Az URL címét is add meg!");
define_once("_LINKNOURL","HIBA: Elfelejtetted megadni magát az URL-t!");
define_once("_LINKNODESC","HIBA: Kérjük, add meg az URL rövid leírását is!");
define_once("_LINKRECEIVED","Az általad megadott adatokat regisztráltuk. Köszönjük!");
define_once("_EMAILWHENADD","A link jóváhagyásakor e-mailt küldünk neked is.");
define_once("_CHECKFORIT","Nem adtál meg e-mail címet. Hamarosan ellenõrizzük a linket, és bekerül az adatbázisba.");
define_once("_NEWLINKS","Új linkek");
define_once("_TOTALNEWLINKS","Linkek száma összesen");
define_once("_LASTWEEK","Múlt héten");
define_once("_LAST30DAYS","Múlt hónapban");
define_once("_1WEEK","1 hét");
define_once("_2WEEKS","2 hét");
define_once("_30DAYS","30 nap");
define_once("_SHOW","Megtekintés");
define_once("_TOTALFORLAST","Összes link az elmúlt");
define_once("_DAYS","napban");
define_once("_ADDEDON","Felvétel napja");
define_once("_RATING","osztályzat");
define_once("_RATESITE","Osztályozd ezt az oldalt");
define_once("_DETAILS","Részletek");
define_once("_BESTRATED","Legjobb osztályzatot kapott oldalak");
define_once("_OF","-");
define_once("_TRATEDLINKS","összesen osztályzott oldalak");
define_once("_TVOTESREQ","minimálisan szükséges szavazatok");
define_once("_SHOWTOP","Legnézettebb");
define_once("_MOSTPOPULAR","Legkedveltebb");
define_once("_OFALL","az összesbõl");
define_once("_SORTLINKSBY","Sorbarendezés:");
define_once("_SITESSORTED","Jelenlegi sorbarendezés:");
define_once("_POPULARITY","Népszerûség");
define_once("_SELECTPAGE","Válassz oldalt");
define_once("_MAIN","Fõoldal");
define_once("_NEWTODAY","Mai linkek");
define_once("_NEWLAST3DAYS","Az elmúlt három nap linkjei");
define_once("_NEWTHISWEEK","Az elmúlt hét linkjei");
define_once("_CATNEWTODAY","A kategória mai új linkjei");
define_once("_CATLAST3DAYS","A kategória új linkjei az elmúlt három napban");
define_once("_CATTHISWEEK","A kategória új linkjei az elmúlt héten");
define_once("_POPULARITY1","Népszerûség (növekvõ sorrend)");
define_once("_POPULARITY2","Népszerûség (csökkenõ sorrend)");
define_once("_TITLEAZ","Cím (A-Z)");
define_once("_TITLEZA","Cím (Z-A)");
define_once("_DATE1","Dátum (elõször a régebbiek)");
define_once("_DATE2","Dátum (elõször az újabbak)");
define_once("_RATING1","Osztályzatok (növekvõ sorrend)");
define_once("_RATING2","Osztályzatok (csökkenõ sorrend)");
define_once("_SEARCHRESULTS4","Keresés:");
define_once("_USUBCATEGORIES","Alkategóriák");
define_once("_LINKS","link");
define_once("_TRY2SEARCH","Keresés");
define_once("_INOTHERSENGINES","más keresõkkel");
define_once("_EDITORIAL","Szerkesztõi vélemény");
define_once("_LINKPROFILE","Az oldal neve");
define_once("_EDITORIALBY","Szerkesztõ:");
define_once("_NOEDITORIAL","Errõl a weboldalról még nincs szerkesztõi vélemény.");
define_once("_VISITTHISSITE","Látogasd meg ezt a weboldalt");
define_once("_RATETHISSITE","Osztályozd ezt a weboldalt");
define_once("_ISTHISYOURSITE","Te küldted be ezt a linket?");
define_once("_ALLOWTORATE","Tedd lehetõvé, hogy mások is osztályozhassák a te saját oldaladról!");
define_once("_LINKRATINGDET","Link osztályozásának részletei");
define_once("_OVERALLRATING","Átlag");
define_once("_TOTALOF","Összesen");
define_once("_USER","tag");
define_once("_USERAVGRATING","Tagok átlagos osztályzata");
define_once("_NUMRATINGS","Osztályzatok száma");
define_once("_EDITTHISLINK","Link szerkesztése");
define_once("_REGISTEREDUSERS","Regisztrált tagok");
define_once("_NUMBEROFRATINGS","Osztályzatok száma");
define_once("_NOREGUSERSVOTES","Regisztrált tag még nem osztályozta");
define_once("_BREAKDOWNBYVAL","Osztályzatok eloszlása");
define_once("_LTOTALVOTES","szavazat");
define_once("_LINKRATING","Link osztályzata");
define_once("_HIGHRATING","Legmagasabb osztályzat");
define_once("_LOWRATING","Legalacsonyabb osztályzat");
define_once("_NUMOFCOMMENTS","Hozzászólások száma");
define_once("_WEIGHNOTE","* Megjegyzés: a regisztrált tagok osztályzata többet nyom, mint a látogatóké");
define_once("_NOUNREGUSERSVOTES","Regisztrálatlan látogató még nem osztályozta");
define_once("_WEIGHOUTNOTE","* Megjegyzés: a regisztrált tagok osztályzata többet nyom, mint a más weboldalakon szavazóké");
define_once("_NOOUTSIDEVOTES","Más weboldalakon még nem osztályozták");
define_once("_OUTSIDEVOTERS","Szavazatok más weboldalakról");
define_once("_UNREGISTEREDUSERS","Regisztrálatlan látogatók");
define_once("_PROMOTEYOURSITE","Népszerûsítsd a weboldalad");
define_once("_PROMOTE01","Talán érdekel valamelyik 'Szavazz erre a weboldalra' lehetõségünk. Ezek lehetõvé teszik egy link (vagy akár szavazóûrlap) elhelyezését a weboldaladon, hogy növeld az oldalad szavazatainak számát. Válassz a lenti lehetõségek közül:");
define_once("_TEXTLINK","Szöveges link");
define_once("_PROMOTE02","Látogatóid szavazhatnak egyszerû szöveges link segítségével:");
define_once("_HTMLCODE1","Ebben az esetben használd a következõ HTML kódot:");
define_once("_THENUMBER","A");
define_once("_IDREFER","szám a HTML forrásban a weboldalad azonosító száma a(z) $sitename adatbázisban. Vigyázz, nehogy kihagyd!");
define_once("_BUTTONLINK","Nyomógomb");
define_once("_PROMOTE03","Ha esetleg többet szeretnél, mint egy egyszerû szöveglink, használhatsz nyomógombot:");
define_once("_RATEIT","Szavazz erre az oldalra!");
define_once("_HTMLCODE2","A fenti gomb forráskódja:");
define_once("_REMOTEFORM","Távoli szavazóûrlap");
define_once("_PROMOTE04","Ha valaki csal, a linkjét eltávolítjuk. Having said that, here is what the current remote rating form looks like.");
define_once("_VOTE4THISSITE","Szavazz erre az oldalra!");
define_once("_LINKVOTE","Szavazz!");
define_once("_HTMLCODE3","Ezzel az ûrlappal a látogatóid közvetlenül szavazhatnak a weboldaladra, a szavazatokat pedig mi tároljuk. A fenti ûrlap nem mûködik, de a következõ kód mûködni fog, ha beszúrod a weboldalad forrásába:");
define_once("_PROMOTE05","Köszönjük! és sok sikert a szavazatokkal!");
define_once("_STAFF","Munkatársak");
define_once("_THANKSBROKEN","Köszönjük, hogy segítesz fenntartani a linktárunk mûködését.");
define_once("_THANKSFORINFO","Köszönjük az információt.");
define_once("_LOOKTOREQUEST","Hamarosan ellenõrizzük az információid.");
define_once("_REQUESTLINKMOD","Link változtatásának kérése");
define_once("_LINKID","Link száma");
define_once("_SENDREQUEST","Kérés elküldése");
define_once("_THANKSTOTAKETIME","Köszönjük, hogy idõt szántál egy oldal osztályozására itt nálunk -");
define_once("_LETSDECIDE","A visszajelzések segítik, hogy látogatóink a megfelelõ linkekre kattintsanak.");
define_once("_RETURNTO","Vissza az elõzõ oldalra:");
define_once("_RATENOTE1","Kérjük, ne szavazz kétszer egy linkre.");
define_once("_RATENOTE2","1-10-ig osztályozhatsz, az 1-es a leggyengébb, a 10-es a legjobb osztályzat.");
define_once("_RATENOTE3","Kérjük, osztályozz objektívan, ha mindenki egyest vagy tizest kap, nem sok segítséget nyújtanak az osztályzatok...");
define_once("_RATENOTE4","Megnézheted a <a href=\"modules.php?name=Web_Links&amp;l_op=TopRated\">legjobb osztályzatokat kapott oldalak</a> listáját.");
define_once("_RATENOTE5","Ha lehet, ne szavazz saját, vagy közvetlen versenytársaid weboldalára.");
define_once("_YOUAREREGGED","Regisztrált tag vagy, és beléptél.");
define_once("_FEELFREE2ADD","Nyugodtan küldd el hozzászólásod ezzel a weboldallal kapcsolatban.");
define_once("_YOUARENOTREGGED","Nem vagy regisztrált tagunk, vagy nem léptél be.");
define_once("_IFYOUWEREREG","Regisztrált tagként megjegyzéseket fûzhetnél ehhez a weboldalhoz.");
define_once("_WEBLINKS","Linkek");
define_once("_TITLE","Cím");
define_once("_MODIFY","Változtatás");
define_once("_COMPLETEVOTE1","Your vote is appreciated.");
define_once("_COMPLETEVOTE2","You have already voted for this resource in the past $anonwaitdays day(s).");
define_once("_COMPLETEVOTE3","Vote for a resource only once.<br>All votes are logged and reviewed.");
define_once("_COMPLETEVOTE4","You cannot vote on a link you submitted.<br>All votes are logged and reviewed.");
define_once("_COMPLETEVOTE5","No rating selected - no vote tallied");
define_once("_COMPLETEVOTE6","Only one vote per IP address allowed every $outsidewaitdays day(s).");
define_once("_LINKSDATESTRING","%Y. %m. %d.");

