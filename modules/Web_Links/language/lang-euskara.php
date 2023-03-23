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


define_once("_PREVIOUS","Aurreko orria");
define_once("_NEXT","Hurrengo orria");
define_once("_YOURNAME","Zure izena");
define_once("_CATEGORY","Maila");


define_once("_CATEGORIES","Kategoria");
define_once("_LVOTES","Botoak");
define_once("_TOTALVOTES","Guztirako Botoak:");
define_once("_LINKTITLE","Loturaren Titulua");
define_once("_HITS","Hits-ak (irakurrienak)");

define_once("_THEREARE","Guztira");
define_once("_NOMATCHES","Bilaketan ez da aurkitu erregistrorik");
define_once("_SCOMMENTS","Komentarioak");
define_once("_DESCRIPTION","Azalpena");
define_once("_ONLYREGUSERSMODIFY","Bakarrik erregistratutako sistema-kideek proposatu ditzakete aldaketak. Mesedez, <a href=\"modules.php?name=Your_Account\">konektatu edo erregistratu</a>.");
define_once("_DATE","Data");
define_once("_TO","Norentzat");
define_once("_ADDLINK","Lotura bat gehitu");
define_once("_NEW","Berriak");
define_once("_POPULAR","Popularrenak");
define_once("_TOPRATED","Gehien baloratuak");
define_once("_RANDOM","Sorizko");
define_once("_LINKSMAIN","Indizea");
define_once("_LINKCOMMENTS","Loturaren komentarioak");
define_once("_ADDITIONALDET","Xehetasun gehiago");
define_once("_EDITORREVIEW","Editorearen Berrikuspena");
define_once("_REPORTBROKEN","Informatu funzionatzen ez duen Lotura bateri buruz");
define_once("_LINKSMAINCAT","Loturen Kategoria Nagusiak");
define_once("_AND","eta");
define_once("_INDB","daude gure datubasean");
define_once("_ADDALINK","Lotura berria gehitu");
define_once("_INSTRUCTIONS","Instrukzioak");
define_once("_SUBMITONCE","Lotura berdina ez bidali bi aldiz");
define_once("_POSTPENDING","Bidalitako Lotura guztiak errebisatu egiten dira");
define_once("_USERANDIP","Zure Izena eta IP-a gorde giten dira, zure esku dago bidalketa lagungarria izatea");
define_once("_PAGETITLE","Orriaren Tituloa");
define_once("_PAGEURL","Orriaren URL-a");
define_once("_YOUREMAIL","Zure Emaila");
define_once("_LDESCRIPTION","Azalpena (Gehien 255 hizki):");
define_once("_ADDURL","URL hau gehitu");
define_once("_LINKSNOTUSER1","Ez zaude konektatuta edo ez zara Sistema-kidea");
define_once("_LINKSNOTUSER2","Erregistratuta egon ezkero aukera izango zenuke Sistemara Loturak gehitzea");
define_once("_LINKSNOTUSER3","Sistema-kide erregistratua eizatea erraza eta azkarra da");
define_once("_LINKSNOTUSER4","Zergatik erregistratu behar eduki batzuetara sartzeko?");
define_once("_LINKSNOTUSER5","Sistemako parte izan ezkero, seguro animatzen zarela zerbaiten laguntzera,");
define_once("_LINKSNOTUSER6","eta gainera aukera izango duzu atal berri bat sortzeko edo dinamizatzeko.");
define_once("_LINKSNOTUSER7","Horrela, agertzen den informazioa gaurkotua eta ahalik eta zabalena izatea lortuko dugu.");
define_once("_LINKSNOTUSER8","<a href=\"modules.php?name=Your_Account\">Erregistratu</a>");
define_once("_LINKALREADYEXT","ERROREA: URL hau iadanik badago gure datubasean!");
define_once("_LINKNOTITLE","ERROREA: URLari Tituloa ipini behar diozu!");
define_once("_LINKNOURL","ERROREA: Horra Lotura erabilgarria, URLa ez baduzu idazten!");
define_once("_LINKNODESC","ERROREA: URLak azalpen bat izan behar du!");
define_once("_LINKRECEIVED","Eskerrikasko, zuk bidalitako Loturaren datuak jaso dira.");
define_once("_EMAILWHENADD","Email bat jasoko duzu Lotura baieztatzen denean.");
define_once("_CHECKFORIT","Ez duzu idatzi Emaila. Dana dalako, bidalitako Lotura laister baieztatuko dugu");
define_once("_NEWLINKS","Lotura Berriak");
define_once("_TOTALNEWLINKS","Lotura berriak guztira:");
define_once("_LASTWEEK","Azkenengo astean:");
define_once("_LAST30DAYS","Azkenengo 30 egunetan:");
define_once("_1WEEK","Aste honetan:");
define_once("_2WEEKS","Bi astetan:");
define_once("_30DAYS","30 egunetan:");
define_once("_SHOW","Ikusi");
define_once("_TOTALFORLAST","Lotura Berriak azkenengo");
define_once("_DAYS","egunetan");
define_once("_ADDEDON","Gehitutakoa egun honetan:");


define_once("_RATING","Balorazioa");
define_once("_RATESITE","Baloratu Sistema hau");
define_once("_DETAILS","Zehaztasunak");
define_once("_BESTRATED","Gehien baloratutako Loturak - Top");
define_once("_OF","zenbatetik");
define_once("_TRATEDLINKS","guztira baloratutako Loturak");
define_once("_TVOTESREQ","gutxienez behar diren botoak");
define_once("_SHOWTOP","Top-a erakutsi");
define_once("_MOSTPOPULAR","Aukeratuena - Top-a");
define_once("_OFALL","denetik");
define_once("_SORTLINKSBY","Ordenatu Loturak kontutan izanda:");
define_once("_SITESSORTED","Tokiak klasifikatuta kontutan izanda:");
define_once("_POPULARITY","Popularitatea");
define_once("_SELECTPAGE","Orria aukeratu");
define_once("_MAIN","Nagusia");
define_once("_NEWTODAY","Berria gaur");
define_once("_NEWLAST3DAYS","Berria azkenengo hiru egunetan");
define_once("_NEWTHISWEEK","Berria aste honetan");
define_once("_CATNEWTODAY","Gaur kategoria honetara gehitutako Lotura berriak");
define_once("_CATLAST3DAYS","Azkenengo hiru egunetan kategoria honetara gehitutako Lotura berriak");
define_once("_CATTHISWEEK","Aste honetan kategoria honetara gehitutako Lotura berriak");
define_once("_POPULARITY1","Popularitatea (gutxien aukeratuenetik gehienera)");
define_once("_POPULARITY2","Popularitatea (gehien aukeratuenetik gutxienera)");
define_once("_TITLEAZ","Tituloa (A - Z)");
define_once("_TITLEZA","Tituloa (Z - A)");
define_once("_DATE1","Data (lehenengo Lotura zaharrenak)");
define_once("_DATE2","Data (lehehengo Lotura berrienak)");
define_once("_RATING1","Balorazioa (gutxienetik gehienera)");
define_once("_RATING2","Balorazioa (gehienetik gutxienera)");
define_once("_SEARCHRESULTS4","Bilatu emaitzak kontutan izanda:");
define_once("_USUBCATEGORIES","Azpikategori");
define_once("_LINKS","Lotura");
define_once("_TRY2SEARCH","Ahalegindu bilatzen");
define_once("_INOTHERSENGINES","beste Bilatzaile Sistema batzuetan");
define_once("_EDITORIAL","Editoriala");
define_once("_LINKPROFILE","Loturaren Profila");
define_once("_EDITORIALBY","Editoriala kontutan izanda");
define_once("_NOEDITORIAL","Editoriala ez dago erabilgarri Sistema honetan.");
define_once("_VISITTHISSITE","Web Toki hau bisitatu");
define_once("_RATETHISSITE","Web Toki hau baloratu");
define_once("_ISTHISYOURSITE","Hau da zure errekurtsoa");
define_once("_ALLOWTORATE","Utzi Sistema-kideek baloratu dezazuten zure Web tokitik");
define_once("_LINKRATINGDET","Loturen balorazioen xehetasunak");
define_once("_OVERALLRATING","Balorazio Orokorra");
define_once("_TOTALOF","Guztira");
define_once("_USER","Sistema-kide");
define_once("_USERAVGRATING","Sistema-kideek egin duten balorazioaren batez bestekoa");
define_once("_NUMRATINGS","Balorazioak guztira");
define_once("_EDITTHISLINK","Lotura Editatu");
define_once("_REGISTEREDUSERS","Sistema-kideak guztira (erregistratuak sisteman)");
define_once("_NUMBEROFRATINGS","Balorazioak guztira");
define_once("_NOREGUSERSVOTES","Ez dago Sistema-kidea den inoren botorik");
define_once("_BREAKDOWNBYVAL","Balorazioko Histograma");
define_once("_LTOTALVOTES","botoak guztira");
define_once("_LINKRATING","Baloratutako Loturak");
define_once("_HIGHRATING","Balorazio haundia");
define_once("_LOWRATING","Balorazio txikia");
define_once("_NUMOFCOMMENTS","Komentarioak guztira");
define_once("_WEIGHNOTE","* Oharra: Web Toki honek desberdindu egiten ditu Sistema-kideek direnen edo ez direnen botoak");
define_once("_NOUNREGUSERSVOTES","Ez dago erregistratu gabekoen botorik");
define_once("_WEIGHOUTNOTE","** Oharra: Web Toki honek desberdindu egiten ditu Sistema-kideek direnen edo ez direnen botoak");
define_once("_NOOUTSIDEVOTES","Sistema-kideen botoak");
define_once("_OUTSIDEVOTERS","Sistema-kideak ez direnen (anonymous deritzonak) botoak");
define_once("_UNREGISTEREDUSERS","Erregistratu gabeko erabiltzaileak");
define_once("_PROMOTEYOURSITE","Zure Web Tokia sustatu");
define_once("_PROMOTE01","Agian erabili nahi izango dituzu 'Beste toki batzuen balorazioa' erabiliz ditugun aukerak. Hauekin posible izango duzu irudi bat edo bozketetarako formulario bat zure botoak gehitzeko. Aukeratu bat:");
define_once("_TEXTLINK","Loturaren testua");
define_once("_PROMOTE02","Formularioarekin Lotura egiteko era erraz bat, testu hau erabiltzea da:");
define_once("_HTMLCODE1","Erabili dezakezun HTML kodea hau da:");
define_once("_THENUMBER","Zenbakia");
define_once("_IDREFER","erreferiantzako HTML kodean $sitename -ko datubasean daukazun ID-a dago. Ziurtatu zenbaki hau kode horretan dagoela.");
define_once("_BUTTONLINK","Lotura botoia");
define_once("_PROMOTE03","Lotura arrunta bat izatea nahi ez baduzu, aukeratu dezakezu boti txiki bat erabiltzea.");
define_once("_RATEIT","Baloratu Toki hau");
define_once("_HTMLCODE2","Aurreko botoiaren HTML kodea hau da:");
define_once("_REMOTEFORM","Urruneko balorazio formularioa");
define_once("_PROMOTE04","Tranparik egiten baduzu, zure Lotura kendu egingo dugu. Balorazio formularioa honela agertuko da:");
define_once("_VOTE4THISSITE","Toki honeri bozkatu");
define_once("_LINKVOTE","Bozkatu");
define_once("_HTMLCODE3","Formulario hau erabiliz, erabiltzaileek zure Tokia baloratu dezakete zure Sisteman eta emaitzak hemen gorde. Aurreko formularioa desaktibatuta dago, baina kode honek funzionatuko du zure tokian orrialde batetan jartzen baduzu. su página. Hau da kodea:");
define_once("_PROMOTE05","Eskerrikasko! eta sorte on zure balorazioarekin.");
define_once("_STAFF","Txantiloia");
define_once("_THANKSBROKEN","Eskerrikasko zure laguntzagatik.");
define_once("_THANKSFORINFO","Eskerrikasko informazioagatik.");
define_once("_LOOKTOREQUEST","Zure eskaera laister aztertuko dugu.");
define_once("_REQUESTLINKMOD","Lotura aldaketa eskatu");
define_once("_LINKID","Loturaren ID-a");
define_once("_SENDREQUEST","Eskaera bidali");
define_once("_THANKSTOTAKETIME","Eskerrikasko zure denboragatik aztertzen");
define_once("_LETSDECIDE","Zure erako Sistema-kideek lagunduko dute gure Tokia azkoz ere aberatsagoa izatea.");
define_once("_RETURNTO","Bueltatu hona:");
define_once("_RATENOTE1","Mesedez, ez bozkatu behin baino gehiagotan Lotura berdinari");
define_once("_RATENOTE2","Aukerak 1etik 10era doiaz, 1 oso txarra eta 10 bikaina izanik.");
define_once("_RATENOTE3","Objetiboa izan zure botoan, beti 1 edo 10 jasotzea ez da izango ezanguratsua.");
define_once("_RATENOTE4","<a href=\"links.php?op=TopRated\">Gehien baloratu diren Errekurtsoen</a> zerrenda bat ikusi dezakezu.");
define_once("_RATENOTE5","Ez bozkatu zure Errekurtso bateri edo zure kontrako batenari.");
define_once("_YOUAREREGGED","Sistema-kidea zara eta konektatuta zaude.");
define_once("_FEELFREE2ADD","Bidali komentario bat Toki honetaz nahi baduzu.");
define_once("_YOUARENOTREGGED","Ez zara Sistema-kidea edo ez zaude konektatuta.");
define_once("_IFYOUWEREREG","Erregistratuta egon ezkero, aukera izango zenuke komentarioak bidaltzeko.");
define_once("_WEBLINKS","Web Loturak");
define_once("_TITLE","Tituloa");
define_once("_MODIFY","Aldatu");
define_once("_COMPLETEVOTE1","Zure botoa eskertzen dugu.");
define_once("_COMPLETEVOTE2","Azken $anonwaitdays egunetan botatu duzu errekurtso honegatik!");
define_once("_COMPLETEVOTE3","Mesedez, ez bozkatu behin baino gehiagotan errekurtso berdinari");
define_once("_COMPLETEVOTE4","Ezin duzu bozkatu zuk bidalitako errekurtso bati.<br>Boto guztiak erregistratuak izaten dira.");
define_once("_COMPLETEVOTE5","Puntuaziorik aukeratu gabe - ez da markatu botorik");
define_once("_COMPLETEVOTE6","IP helbideko eta $outsidewaitdays egunen barruan boto bat onartzen da bakarrik");
define_once("_LINKSDATESTRING","%m-%d-%Y");


