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
define_once("_PREVIOUS","Faqja e Kaluar");
define_once("_NEXT","Faqja në Vijim");
define_once("_CATEGORY","Kategoria");
define_once("_CATEGORIES","Kategori");
define_once("_LVOTES","Vota");
define_once("_TOTALVOTES","Gjithsej Vota:");
define_once("_THEREARE","Ndodhen");
define_once("_NOMATCHES","Asnjë Rezultat për kërkimin tuaj");
define_once("_SCOMMENTS","Komente");
define_once("_UNKNOWN","I/E Panjohur");
define_once("_AUTHORNAME","Emri Autorit");
define_once("_AUTHOREMAIL","Email i Autorit");
define_once("_DOWNLOADNAME","Emri i Programit");
define_once("_ADDTHISFILE","Shtoje");
define_once("_INBYTES","në bytes");
define_once("_FILESIZE","Dimensioni i File");
define_once("_VERSION","Versioni");
define_once("_DESCRIPTION","Përshkrimi");
define_once("_AUTHOR","Autori");
define_once("_HOMEPAGE","Home");
define_once("_DOWNLOADNOW","Shkarkoje këtë file!");
define_once("_RATERESOURCE","Votoje");
define_once("_FILEURL","Lidhja e File");
define_once("_ADDDOWNLOAD","Shto File");
define_once("_DOWNLOADSMAIN","Treguesi i Downloads");
define_once("_DOWNLOADCOMMENTS","Komente");
define_once("_DOWNLOADSMAINCAT","Treguesi i Kategorive të Downloads");
define_once("_ADDADOWNLOAD","Shto një File të Ri");
define_once("_DSUBMITONCE","Shto vetëm një download të vetëm për aksion.");
define_once("_DPOSTPENDING","Të gjithë downloads e shtuar do të kontrollohen nga ne.");
define_once("_RESSORTED","Rezerva të rrjeshtuara aktualisht për");
define_once("_DOWNLOADSNOTUSER1","Nuk je i regjistruar ose nuk je identifikuar nga sistemi.");
define_once("_DOWNLOADSNOTUSER2","Mbasi të jesh regjistruar mund të shtosh downloads në këtë sit.");
define_once("_DOWNLOADSNOTUSER3","Të bëhesh anëtar është e thjeshtë, e shpejtë dhe falas.");
define_once("_DOWNLOADSNOTUSER4","Përse ju kërkojmë regjistrimin për të patur hyrje në disa shërbime?");
define_once("_DOWNLOADSNOTUSER5","Vetëm kështu mund të garantojmë një kualitet më të lartë të përmbajtjes,");
define_once("_DOWNLOADSNOTUSER6","çdo shtim i ri verifikohet me kujdes dhe, nëse korrispondon me kriteret tanë, aprovohet nga staffi ynë.");
define_once("_DOWNLOADSNOTUSER7","Kërkojmë t'ju afrojmë vetëm informacione të vërteta dhe të dobishme.");
define_once("_DOWNLOADSNOTUSER8","<a href=\"modules.php?name=Your_Account\">Regjistrohu</a>");
define_once("_DOWNLOADALREADYEXT","GABIM: Kjo URL ekziston në Database tonë!");
define_once("_DOWNLOADNOTITLE","GABIM: Duhet të shkruash TITULLIN!");
define_once("_DOWNLOADNOURL","GABIM: Duhet të shkruash URL!");
define_once("_DOWNLOADNODESC","GABIM: Duhet të shkruash një PËRSHKRIM!");
define_once("_DOWNLOADRECEIVED","E morëm njoftimin tuaj. Faleminderit!");
define_once("_NEWDOWNLOADS","Të rinj");
define_once("_TOTALNEWDOWNLOADS","Downloads të Rinj Gjithsej");
define_once("_DTOTALFORLAST","Gjithsej downloads të rinj në të fundit");
define_once("_DBESTRATED","Top");
define_once("_TRATEDDOWNLOADS","gjithsej downloads të votuar");
define_once("_SORTDOWNLOADSBY","Rrjeshto sipas");
define_once("_DCATNEWTODAY","Downloads të Rinj Shtuar Sot në këtë Kategori");
define_once("_DCATLAST3DAYS","Downloads të Rinj Shtuar në 3 Ditët e Fundit në këtë Kategori");
define_once("_DCATTHISWEEK","Downloads të Rinj Shtuar Javën e Fundit në këtë Kategori");
define_once("_DDATE1","Data (Përpara të Vjetrit)");
define_once("_DDATE2","Data (Përpara të Rinjtë)");
define_once("_DOWNLOADS","downloads");
define_once("_DOWNLOADPROFILE","Profili");
define_once("_DOWNLOADRATINGDET","Hollësi mbi Votat");
define_once("_EDITTHISDOWNLOAD","Modifiko");
define_once("_DOWNLOADRATING","Vota");
define_once("_DOWNLOADVOTE","Voto!");
define_once("_DONLYREGUSERSMODIFY","Vetëm anëtarët mund të propozojnë ndryshime në downloads. Ju lutem <a href=\"modules.php?name=Your_Account\">regjistrohuni ose identifikohuni</a>.");
define_once("_REQUESTDOWNLOADMOD","Kërkesa për Modifikim Download");
define_once("_DOWNLOADID","ID e Download");
define_once("_DLETSDECIDE","Input i Përdoruesve mund të ndihmojë vizituesit e tjerë për të zgjedhur me lehtësi file më të mirë për t'a shkarkuar.");
define_once("_DRATENOTE4","Mund të shikosh listën e <a href=\"modules.php?name=Downloads&amp;d_op=TopRated\">Top Downloads</a>.");
define_once("_DATE","Data");
define_once("_TO","PËR");
define_once("_NEW","I RI");
define_once("_POPULAR","Popullor");
define_once("_TOPRATED","Top");
define_once("_ADDITIONALDET","Hollësi");
define_once("_EDITORREVIEW","Recensim i Editorit");
define_once("_REPORTBROKEN","Njofto Link të Gabuar");
define_once("_AND","dhe");
define_once("_INDB","në database tonë");
define_once("_INSTRUCTIONS","Instruksione");
define_once("_USERANDIP","Username dhe IP regjistrohen, prandaj mos abuzo nga sistemi.");
define_once("_LDESCRIPTION","Përshkrimi: (255 karaktere max)");
define_once("_CHECKFORIT","Nuk ke shkruar një Email. Sidoqoftë do t'a kontrollojmë brenda pak kohësh link-un tuaj.");
define_once("_LASTWEEK","Java e Fundit");
define_once("_LAST30DAYS","30 Ditët e Fundit");
define_once("_1WEEK","1 Javë");
define_once("_2WEEKS","2 Javë");
define_once("_30DAYS","30 Ditë");
define_once("_SHOW","Shiko");
define_once("_DAYS","ditë");
define_once("_ADDEDON","Shtuar më");
define_once("_RATING","Vlersimi");
define_once("_DETAILS","Hollësi");
define_once("_OF","nga");
define_once("_TVOTESREQ","minimumi i votave të kërkuara");
define_once("_SHOWTOP","Shiko Top");
define_once("_MOSTPOPULAR","Popullorë - Top");
define_once("_OFALL","nga të gjithë");
define_once("_POPULARITY","Popullaritet");
define_once("_SELECTPAGE","Seleksiono Faqe");
define_once("_MAIN","Qendrore");
define_once("_NEWTODAY","E Re për Sot");
define_once("_NEWLAST3DAYS","E Re 3 ditët e Fundit");
define_once("_NEWTHISWEEK","E Re Këtë Javë");
define_once("_POPULARITY1","Popullaritet (Nga Hits Më të Paktë tek Më të Shumtë )");
define_once("_POPULARITY2","Popullaritet (Nga Hits Më të Shumtë tek Më të Paktë)");
define_once("_TITLEAZ","Titulli (A - Z)");
define_once("_TITLEZA","Titulli (Z - A)");
define_once("_RATING1","Vlersimi (I Ulët - I Lartë)");
define_once("_RATING2","Vlersimi (I Lartë - I Ulët)");
define_once("_SEARCHRESULTS4","Rezultatet e Kërkimit për");
define_once("_USUBCATEGORIES","Nën-Kategori");
define_once("_TRY2SEARCH","Provo të kërkosh");
define_once("_INOTHERSENGINES","në Motorë Kërkimi të tjerë");
define_once("_EDITORIAL","Editorial");
define_once("_EDITORIALBY","Editorial i");
define_once("_NOEDITORIAL","Asnjë editorial aktualisht në dispozicion për këtë sit.");
define_once("_RATETHISSITE","Voto këtë Sit");
define_once("_ISTHISYOURSITE","Është kjo Rezerva juaj?");
define_once("_ALLOWTORATE","Jepi mundësi përdoruesve të tjerë t'a votojnë direkt nga Faqet e tua Web!");
define_once("_OVERALLRATING","Vlersimi Global");
define_once("_TOTALOF","Totali i");
define_once("_USER","Përdorues");
define_once("_USERAVGRATING","Vlersimi Mesatar i Përdoruesve");
define_once("_NUMRATINGS","# Vlersimesh");
define_once("_REGISTEREDUSERS","Përdorues të Regjistruar");
define_once("_NUMBEROFRATINGS","Numri i Vlersimeve");
define_once("_NOREGUSERSVOTES","N° Votash nga Përdorues të Regjistruar");
define_once("_BREAKDOWNBYVAL","Analiza e Vlersimeve sipas Vlerës");
define_once("_LTOTALVOTES","totali i votave");
define_once("_HIGHRATING","Më e Madhe");
define_once("_LOWRATING","Më e Vogël");
define_once("_NUMOFCOMMENTS","Numri i Komenteve");
define_once("_WEIGHNOTE","* Shënim: Ky sit krahason Votat e Përdoruesve të Regjistruar me ato të Anonimëve");
define_once("_NOUNREGUSERSVOTES","Asnjë Votë nga Anonimët");
define_once("_WEIGHOUTNOTE","* Shënim: Ky sit krahason Votat e Përdoruesve të Regjistruar me ato të Votuesve të Jashtëm");
define_once("_NOOUTSIDEVOTES","Asnjë Votë e Jashtme");
define_once("_OUTSIDEVOTERS","Votues të Jashtëm");
define_once("_UNREGISTEREDUSERS","Përdorues të Pa Regjistruar");
define_once("_PROMOTEYOURSITE","Reklamo Sitin Tënd");
define_once("_PROMOTE01","N.q.s.dëshiron të reklamosh me efikasitet Sitit tënd, sigurisht do të jesh i interesuar për njërën nga metodat tona të shumta të votimit në distancë që të japim në dispozicion. Këto metoda në praktikë u japin mundësinë, duke vendosur një figurë (apo një formular votimi) në sitin tënd, përdoruesve të të votojnë drejtë për së drejti nga aty duke rritur kështu numrin e votave të marra e si rrjedhim vizibilitetin në directory tonë me shtimin relativ të klikimeve të marra. Zgjidh midis njërës prej metodave të ilustruara më poshtë:");
define_once("_TEXTLINK","Link Tekti");
define_once("_PROMOTE02","Një nga mënyrat për të link-uar formularin e votimit është me anë të një link-u të thjeshtë teksti:");
define_once("_HTMLCODE1","Kodi HTML që duhet përdorur në këtë rast është si në vazhdim:");
define_once("_THENUMBER","Numri");
define_once("_IDREFER","në kodin HTML identifikuesi i sitit tuaj në database e $sitename . Ki kujdes që ky numur të ekzistojë dhe të jetë korrekt.");
define_once("_BUTTONLINK","Buton");
define_once("_PROMOTE03","N.q.s. dëshiron pak mëshumë se një link teksti të thjeshtë, mund të zgjedhësh vendosjen e një butoni të vogël:");
define_once("_RATEIT","Voto këtë Sit!");
define_once("_HTMLCODE2","Kodi relativ është:");
define_once("_REMOTEFORM","Formular Votimi në Distancë");
define_once("_PROMOTE04","Abuzimet ndaj këtij sistemi sjellin heqjen e lidhjeve nga database ynë. Kie parasysh. Ja si do të duket formulari i votimit në distancë.");
define_once("_VOTE4THISSITE","Voto për këtë Sit!");
define_once("_HTMLCODE3","Duke përdorur këtë formular u jepet mundësia përdoruesve të japin një vlersim direkt nga siti i tyre, vlersim që regjistrohet nga ne. Formulari i mëposhtëm është i disaktivuar, por kodi në vazhdim funksionon siç duhet duke prerë dhe ngjitur në faqet personale këtë kod:");
define_once("_PROMOTE05","Faleminderit! dhe paç fat!");
define_once("_STAFF","Ekipi");
define_once("_THANKSBROKEN","Faleminderit për ndihmën e dhënë në mbajtjen e integritetit të kësaj directory.");
define_once("_SECURITYBROKEN","Për arsye sigurie username dhe adresa IP ka mundësi të regjistrohen përkohësisht.");
define_once("_THANKSFORINFO","Faleminderit për informacionin.");
define_once("_LOOKTOREQUEST","Do ta shqyrtojmë së shpejti kërkesën tuaj.");
define_once("_SENDREQUEST","Dërgoje Kërkesën");
define_once("_THANKSTOTAKETIME","Faleminderit që harxhuat pak nga koha juaj për të votuar një sit këtu tek");
define_once("_RETURNTO","Kthehu tek");
define_once("_RATENOTE1","Mos voto për të njëjtin burim më shumë se një herë, faleminderit.");
define_once("_RATENOTE2","Shkalla është nga 1 - 10, ku 1 sinjifikon nuk bën një lek dhe 10 sinjifikon i shkëlqyer.");
define_once("_RATENOTE3","Mundohu të jesh sa më objektiv gjatë votimit.");
define_once("_RATENOTE5","Mos voto vetë ti për sitin tënd apo për sitet e konkurrentëve të tu të drejtë për drejtë, faleminderit.");
define_once("_YOUAREREGGED","Je një Përdorues i Regjistruar dhe i njohur me korrektsi nga sistemi.");
define_once("_FEELFREE2ADD","Shto komentet që dëshiron në këtë sit.");
define_once("_YOUARENOTREGGED","Nuk je i Regjistruar ose nuk je identifikuar nga sistemi.");
define_once("_IFYOUWEREREG","Mbasi të regjistrohesh mund të dërgosh sa komente të duash në këtë sit.");
define_once("_TITLE","Titulli");
define_once("_MODIFY","Modifiko");
define_once("_COMPLETEVOTE1","Vota juaj është e mirëpritur.");
define_once("_COMPLETEVOTE2","Ke votuar njëherë për këtë argument në $anonwaitdays ditë(t) e shkuara.");
define_once("_COMPLETEVOTE3","Voto për një argument vetëm një herë.<br>Të gjitha votat regjistrohen dhe valutohen.");
define_once("_COMPLETEVOTE4","Nuk mund të votosh një link të shtuar nga vetë ti.<br>Të gjitha votat regjistrohen dhe valutohen.");
define_once("_COMPLETEVOTE5","Asnjë valutim i seleksionuar - Asnjë votë e shprehur");
define_once("_COMPLETEVOTE6","Vetëm një votë për adresë IP lejohet çdo $outsidewaitdays ditë.");
define_once("_LINKSDATESTRING","%d-%b-%Y");


