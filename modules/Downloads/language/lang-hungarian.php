<?php
global $sitename, $anonwaitdays, $outsidewaitdays;


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
define_once("_CATEGORY","Kategória");
define_once("_CATEGORIES","kategória");
define_once("_LVOTES","szavazat");
define_once("_TOTALVOTES","Összes szavazat:");
define_once("_THEREARE","Jelenleg");
define_once("_NOMATCHES","A keresés nem eredményezett találatot");
define_once("_SCOMMENTS","Hozzászólások");
define_once("_UNKNOWN","Ismeretlen");
define_once("_DOWNLOADS","Downloads");
define_once("_AUTHORNAME","Szerzõ neve");
define_once("_AUTHOREMAIL","Szerzõ e-mail címe");
define_once("_DOWNLOADNAME","Program neve");
define_once("_ADDTHISFILE","Fájl felvétele");
define_once("_INBYTES","bájtokban");
define_once("_FILESIZE","Méret");
define_once("_VERSION","Verzió");
define_once("_DESCRIPTION","Leírás");
define_once("_AUTHOR","Szerzõ");
define_once("_HOMEPAGE","Honlap");
define_once("_DOWNLOADNOW","Töltsd le most!");
define_once("_RATERESOURCE","Osztályozás");
define_once("_FILEURL","Fájl linkje");
define_once("_ADDDOWNLOAD","Letöltés hozzáadása");
define_once("_DOWNLOADSMAIN","Letöltések");
define_once("_DOWNLOADCOMMENTS","Megjegyzések");
define_once("_DOWNLOADSMAINCAT","Letöltések - fõ kategóriák");
define_once("_ADDADOWNLOAD","Új letöltés hozzáadása");
define_once("_DSUBMITONCE","Egy letöltést csak egyszer küldj el!");
define_once("_DPOSTPENDING","Az elküldött letöltések jóváhagyásra várnak.");
define_once("_RESSORTED","Sorbarendezés:");
define_once("_DOWNLOADSNOTUSER1","Nem vagy regisztrált tagunk, vagy nem léptél be!");
define_once("_DOWNLOADSNOTUSER2","Miután regisztrálod magad, te is küldhetsz be linkeket.");
define_once("_DOWNLOADSNOTUSER3","A regisztráció gyors és egyszerû folyamat.");
define_once("_DOWNLOADSNOTUSER4","Miért kérünk regisztrációt egyes szolgáltatásaink eléréséhez?");
define_once("_DOWNLOADSNOTUSER5","Hogy minõségi és értékes tartalmat nyújthassunk nektek, ");
define_once("_DOWNLOADSNOTUSER6","minden linket személyesen ellenõrzünk.");
define_once("_DOWNLOADSNOTUSER7","Reméljük, hogy jónak találod szolgáltatásainkat.");
define_once("_DOWNLOADSNOTUSER8","<a href=\"modules.php?name=Your_Account\">Regisztrálj!</a>");
define_once("_DOWNLOADALREADYEXT","HIBA: adatbázisunk már tartalmazza ezt a linket!");
define_once("_DOWNLOADNOTITLE","HIBA: nem adtad meg a link nevét!");
define_once("_DOWNLOADNOURL","HIBA: nem adtad meg a linket!");
define_once("_DOWNLOADNODESC","HIBA: nem adtad meg a link leírását!");
define_once("_DOWNLOADRECEIVED","Megkaptuk az általad ajánlott letöltés adatait. Köszönjük!");
define_once("_NEWDOWNLOADS","Új letöltések");
define_once("_TOTALNEWDOWNLOADS","új letöltés összesen");
define_once("_DTOTALFORLAST","új letöltés az elmúlt");
define_once("_DBESTRATED","Legjobbra osztályozott letöltések");
define_once("_TRATEDDOWNLOADS","osztályozott letöltés");
define_once("_SORTDOWNLOADSBY","Letöltések sorbarendezése:");
define_once("_DCATNEWTODAY","A ma hozzáadott letöltések ebben a kategóriában");
define_once("_DCATLAST3DAYS","Az elmúlt 3 napban hozzáadott letöltések ebben a kategóriában");
define_once("_DCATTHISWEEK","Az elmúlt héten hozzáadott letöltések ebben a kategóriában");
define_once("_DDATE1","Dátum (felül a régebbi letöltések)");
define_once("_DDATE2","Dátum (felül a legfrissebb letöltések)");
define_once("_DOWNLOADPROFILE","Letöltés profilja");
define_once("_DOWNLOADRATINGDET","Osztályozás részletezése");
define_once("_EDITTHISDOWNLOAD","Letöltés szerkesztése");
define_once("_DOWNLOADRATING","Letöltés osztályozása");
define_once("_DOWNLOADVOTE","Szavazz!");
define_once("_REQUESTDOWNLOADMOD","Letöltés változtatásának kérelme");
define_once("_DOWNLOADID","Letöltés azonosítója");
define_once("_DLETSDECIDE","A visszajelzésed segít másoknak eldönteni, mely fájlokat érdemes letölteni.");
define_once("_DRATENOTE4","Nézd meg a legjobbra osztályozott <a href=\"modules.php?name=Downloads&amp;d_op=TopRated\">Top letöltések listáját</a>.");
define_once("_DATE","Dátum");
define_once("_TO","Címzett");
define_once("_NEW","Legújabb");
define_once("_POPULAR","Legnépszerûbb");
define_once("_TOPRATED","Legjobbra osztályozott");
define_once("_ADDITIONALDET","Egyéb részletek");
define_once("_EDITORREVIEW","Szerkesztõi vélemény");
define_once("_REPORTBROKEN","Törött link bejelentése");
define_once("_AND","és");
define_once("_INDB","található az adatbázisban");
define_once("_INSTRUCTIONS","Útmutató");
define_once("_USERANDIP","A felhasználónév és az IP cím feljegyzésre kerül, kérjük, ne élj vissza a rendszerrel.");
define_once("_LDESCRIPTION","Leírás: (max. 255 karakter)");
define_once("_CHECKFORIT","Nem adtál meg e-mail címet. Hamarosan ellenõrizzük a linket, és bekerül az adatbázisba.");
define_once("_LASTWEEK","Múlt héten");
define_once("_LAST30DAYS","Múlt hónapban");
define_once("_1WEEK","1 hét");
define_once("_2WEEKS","2 hét");
define_once("_30DAYS","30 nap");
define_once("_SHOW","Megtekintés");
define_once("_DAYS","napban");
define_once("_ADDEDON","Felvétel napja");
define_once("_RATING","osztályzat");
define_once("_DETAILS","Részletek");
define_once("_OF","-");
define_once("_TVOTESREQ","minimálisan szükséges szavazatok");
define_once("_SHOWTOP","Legnézettebb");
define_once("_MOSTPOPULAR","Legkedveltebb");
define_once("_OFALL","az összesbõl");
define_once("_POPULARITY","Népszerûség");
define_once("_SELECTPAGE","Válassz oldalt");
define_once("_MAIN","Fõoldal");
define_once("_NEWTODAY","Mai linkek");
define_once("_NEWLAST3DAYS","Az elmúlt három nap linkjei");
define_once("_NEWTHISWEEK","Az elmúlt hét linkjei");
define_once("_POPULARITY1","Népszerûség (növekvõ sorrend)");
define_once("_POPULARITY2","Népszerûség (csökkenõ sorrend)");
define_once("_TITLEAZ","Cím (A-Z)");
define_once("_TITLEZA","Cím (Z-A)");
define_once("_RATING1","Osztályzatok (növekvõ sorrend)");
define_once("_RATING2","Osztályzatok (csökkenõ sorrend)");
define_once("_SEARCHRESULTS4","Keresés:");
define_once("_USUBCATEGORIES","Alkategóriák");
define_once("_TRY2SEARCH","Keresés");
define_once("_INOTHERSENGINES","más keresõkkel");
define_once("_EDITORIAL","Szerkesztõi vélemény");
define_once("_EDITORIALBY","Szerkesztõ:");
define_once("_NOEDITORIAL","Errõl a weboldalról még nincs szerkesztõi vélemény.");
define_once("_RATETHISSITE","Osztályozd ezt a weboldalt");
define_once("_ISTHISYOURSITE","Te küldted be ezt a linket?");
define_once("_ALLOWTORATE","Tedd lehetõvé, hogy mások is osztályozhassák a te saját oldaladról!");
define_once("_OVERALLRATING","Átlag");
define_once("_TOTALOF","Összesen");
define_once("_USER","tag");
define_once("_USERAVGRATING","Tagok átlagos osztályzata");
define_once("_NUMRATINGS","Osztályzatok száma");
define_once("_REGISTEREDUSERS","Regisztrált tagok");
define_once("_NUMBEROFRATINGS","Osztályzatok száma");
define_once("_NOREGUSERSVOTES","Regisztrált tag még nem osztályozta");
define_once("_BREAKDOWNBYVAL","Osztályzatok eloszlása");
define_once("_LTOTALVOTES","szavazat");
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
define_once("_HTMLCODE3","Ezzel az ûrlappal a látogatóid közvetlenül szavazhatnak a weboldaladra, a szavazatokat pedig mi tároljuk. A fenti ûrlap nem mûködik, de a következõ kód mûködni fog, ha beszúrod a weboldalad forrásába:");
define_once("_PROMOTE05","Köszönjük! és sok sikert a szavazatokkal!");
define_once("_STAFF","Munkatársak");
define_once("_THANKSBROKEN","Köszönjük, hogy segítesz fenntartani a linktárunk mûködését.");
define_once("_SECURITYBROKEN","Biztonsági szempontból ideiglenesen feljegyezzük a felhasználóneved és az IP címed is.");
define_once("_THANKSFORINFO","Köszönjük az információt.");
define_once("_LOOKTOREQUEST","Hamarosan ellenõrizzük az információid.");
define_once("_SENDREQUEST","Kérés elküldése");
define_once("_THANKSTOTAKETIME","Köszönjük, hogy idõt szántál egy oldal osztályozására itt nálunk -");
define_once("_RETURNTO","Vissza az elõzõ oldalra:");
define_once("_RATENOTE1","Kérjük, ne szavazz kétszer egy linkre.");
define_once("_RATENOTE2","1-10-ig osztályozhatsz, az 1-es a leggyengébb, a 10-es a legjobb osztályzat.");
define_once("_RATENOTE3","Kérjük, osztályozz objektívan, ha mindenki egyest vagy tizest kap, nem sok segítséget nyújtanak az osztályzatok...");
define_once("_RATENOTE5","Ha lehet, ne szavazz saját, vagy közvetlen versenytársaid weboldalára.");
define_once("_YOUAREREGGED","Regisztrált tag vagy, és beléptél.");
define_once("_FEELFREE2ADD","Nyugodtan küldd el hozzászólásod ezzel a weboldallal kapcsolatban.");
define_once("_YOUARENOTREGGED","Nem vagy regisztrált tagunk, vagy nem léptél be.");
define_once("_IFYOUWEREREG","Regisztrált tagként megjegyzéseket fûzhetnél ehhez a weboldalhoz.");
define_once("_TITLE","Cím");
define_once("_MODIFY","Változtatás");
define_once("_COMPLETEVOTE1","Your vote is appreciated.");
define_once("_COMPLETEVOTE2","You have already voted for this resource in the past $anonwaitdays day(s).");
define_once("_COMPLETEVOTE3","Vote for a resource only once.<br>All votes are logged and reviewed.");
define_once("_COMPLETEVOTE4","You cannot vote on a link you submitted.<br>All votes are logged and reviewed.");
define_once("_COMPLETEVOTE5","No rating selected - no vote tallied");
define_once("_COMPLETEVOTE6","Only one vote per IP address allowed every $outsidewaitdays day(s).");
define_once("_LINKSDATESTRING","%Y. %m. %d.");

