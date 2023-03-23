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
define_once("_PREVIOUS","Faqja e Kaluar");
define_once("_NEXT","Faqja në Vijim");
define_once("_YOURNAME","Emri Juaj");
define_once("_CATEGORY","Kategoria");
define_once("_CATEGORIES","Kategori");
define_once("_LVOTES","Vota");
define_once("_TOTALVOTES","Gjithsej Vota:");
define_once("_LINKTITLE","Titulli i Link");
define_once("_HITS","Hits");
define_once("_THEREARE","Gjenden");
define_once("_NOMATCHES","Asnjë Rezultat për kërkimin tuaj");
define_once("_SCOMMENTS","Komente");
define_once("_DESCRIPTION","Përshkrimi");
define_once("_DATE","Data");
define_once("_TO","TEK");
define_once("_ADDLINK","Shto Sit");
define_once("_NEW","I ri");
define_once("_POPULAR","Popullor");
define_once("_TOPRATED","Top");
define_once("_RANDOM","I rastit");
define_once("_LINKSMAIN","Treguesi i Links");
define_once("_LINKCOMMENTS","Komente");
define_once("_ADDITIONALDET","Hollësi");
define_once("_EDITORREVIEW","Recensimi i Editorit");
define_once("_REPORTBROKEN","Njofto Link të Gabuar");
define_once("_LINKSMAINCAT","Treguesi i Directory");
define_once("_AND","dhe");
define_once("_INDB","në database tonë");
define_once("_ADDALINK","Shto një Link të Ri");
define_once("_INSTRUCTIONS","Instruksione");
define_once("_SUBMITONCE","Njofto vetëm një link për çdo njoftim.");
define_once("_POSTPENDING","Të gjithë links kalojnë nëpërmjet verifikimit tonë.");
define_once("_USERANDIP","Username dhe IP regjistrohen, prandaj mos abuzo me sistemin.");
define_once("_PAGETITLE","Titulli i Faqes");
define_once("_PAGEURL","URL e Faqes");
define_once("_YOUREMAIL","Email Juaj");
define_once("_LDESCRIPTION","Përshkrimi: (255 karaktere max)");
define_once("_ADDURL","Shtoje këtë URL");
define_once("_LINKSNOTUSER1","Nuk dukesh të jesh një Përdorues i Regjistruar, por, n.q.s. je duhet të kryesh login.");
define_once("_LINKSNOTUSER2","N.q.s. je i regjistruar mund të shtosh links në sitin tonë.");
define_once("_LINKSNOTUSER3","Regjistrimi është një operacion i thjeshtë dhe i shpejtë.");
define_once("_LINKSNOTUSER4","Përse kërkohet regjistrimi për t'u futur në disa nga shërbimet tona?");
define_once("_LINKSNOTUSER5","Sepse vetëm kështu kemi mundësi të afrojmë një përmbajtje me cilësi më të lartë,");
define_once("_LINKSNOTUSER6","çdo artikull rishikohet dhe aprovohet nga ekipi ynë.");
define_once("_LINKSNOTUSER7","Kërkojmë të afrojmë vetëm informacione me vlerë që mund t'ju ndihmojnë me të vërtetë.");
define_once("_LINKSNOTUSER8","<a href=\"modules.php?name=Your_Account\">Regjistro Account-in Tënd</a>");
define_once("_LINKALREADYEXT","GABIM: Kjo URL ekziston në Database!");
define_once("_LINKNOTITLE","GABIM: Duhet të japësh një TITULL!");
define_once("_LINKNOURL","GABIM: Duhet të shkruash URL!");
define_once("_LINKNODESC","GABIM: Duhet të shkruash PËRSHKRIMIN!");
define_once("_LINKRECEIVED","E Morëm Njoftimin Tuaj. Faleminderit!");
define_once("_EMAILWHENADD","Do t'ju arrij një E-mail kur të jetë aprovuar.");
define_once("_CHECKFORIT","Nuk ke dhënë një Email. Sidoqoftë shumë shpejt do të kontrollojmë link-un tuaj.");
define_once("_NEWLINKS","Links të Rinj");
define_once("_TOTALNEWLINKS","Gjithsej Links të Rinj");
define_once("_LASTWEEK","Java e fundit");
define_once("_LAST30DAYS","30 Ditët e Fundit");
define_once("_1WEEK","1 Javë");
define_once("_2WEEKS","2 Javë");
define_once("_30DAYS","30 Ditë");
define_once("_SHOW","Shiko");
define_once("_TOTALFORLAST","Gjithsej links të rinj në të fundit");
define_once("_DAYS","ditë");
define_once("_ADDEDON","Shtuar më");
define_once("_RATING","Vlersimi");
define_once("_RATESITE","Voto këtë Sit");
define_once("_DETAILS","Hollësi");
define_once("_BESTRATED","Links më të Mirë - Top");
define_once("_OF","nga");
define_once("_TRATEDLINKS","gjithsej links të votuar");
define_once("_TVOTESREQ","minimumi i votave të kërkuara");
define_once("_SHOWTOP","Shiko Top");
define_once("_MOSTPOPULAR","Popullorë - Top");
define_once("_OFALL","nga të gjithë");
define_once("_SORTLINKSBY","Rrjeshto Links sipas");
define_once("_SITESSORTED","Sitet aktualisht të rrjeshtuar sipas");
define_once("_POPULARITY","Popullaritetit");
define_once("_SELECTPAGE","Seleksiono Faqe");
define_once("_MAIN","Qendrore");
define_once("_NEWTODAY","E Re Sot");
define_once("_NEWLAST3DAYS","E Re 3 Ditët e fundit");
define_once("_NEWTHISWEEK","E Re Këtë Javë");
define_once("_CATNEWTODAY","Links të Rinj Shtuar Sot në këtë Kategori");
define_once("_CATLAST3DAYS","Links të Rinj Shtuar 3 Ditët e fundit në këtë Kategori");
define_once("_CATTHISWEEK","Links të Rinj Shtuar këtë Javë në këtë Kategori");
define_once("_POPULARITY1","Popullaritet (Nga më me Pak tek më me Shumë Hits)");
define_once("_POPULARITY2","Popullaritet (Nga më me Shumë tek më me Pak Hits)");
define_once("_TITLEAZ","Titulli (A - Z)");
define_once("_TITLEZA","Titulli (Z - A)");
define_once("_DATE1","Data (Të Vjetrit në Fillim)");
define_once("_DATE2","Data (Të Rinjtë në Fillim)");
define_once("_RATING1","Vlersimi (I Ulët - I Lartë)");
define_once("_RATING2","Vlersimi (I Lartë - I Ulët)");
define_once("_SEARCHRESULTS4","Rezultatet e Kërkimit të");
define_once("_USUBCATEGORIES","Nën-Kategori");
define_once("_LINKS","Lidhje");
define_once("_TRY2SEARCH","Provo të kërkosh");
define_once("_INOTHERSENGINES","në Motorë të tjerë Kërkimi");
define_once("_EDITORIAL","Editorial");
define_once("_LINKPROFILE","Profili i Link");
define_once("_EDITORIALBY","Editoriali i");
define_once("_NOEDITORIAL","Asnjë editorial në dispozicion aktualisht për këtë sit.");
define_once("_VISITTHISSITE","Vizito këtë Sit");
define_once("_RATETHISSITE","Voto këtë Sit");
define_once("_ISTHISYOURSITE","Është ky Burimi Yt?");
define_once("_ALLOWTORATE","Jepu mundësinë përdoruesve të tjerë t'a votojnë direkt nga Faqet e tua Web!");
define_once("_LINKRATINGDET","Hollësi Vlersimi i Sitit");
define_once("_OVERALLRATING","Vlersimi Global");
define_once("_TOTALOF","Totali i");
define_once("_USER","Përdoruesve");
define_once("_USERAVGRATING","Vlersimi Mesatar i Përdoruesve");
define_once("_NUMRATINGS","# Vlersimesh");
define_once("_EDITTHISLINK","Modifiko këtë Link");
define_once("_REGISTEREDUSERS","Përdorues të Regjistruar");
define_once("_NUMBEROFRATINGS","Numri i Vlersimeve");
define_once("_NOREGUSERSVOTES","N° Votash nga Përdorues të Regjistruar");
define_once("_BREAKDOWNBYVAL","Analiza e Vlersimeve sipas Vlerës");
define_once("_LTOTALVOTES","gjithsej vota");
define_once("_LINKRATING","Vlersimi i Links");
define_once("_HIGHRATING","Më i Madh");
define_once("_LOWRATING","Më i Vogël");
define_once("_NUMOFCOMMENTS","Numri i Komenteve");
define_once("_WEIGHNOTE","* Shënim: Ky sit vlerson në menyrë jo të njëjtë Votat e Përdoruesve të Regjistruar me ato të Anonimëve");
define_once("_NOUNREGUSERSVOTES","Asnjë Votë nga Anonimët");
define_once("_WEIGHOUTNOTE","* Shënim: Ky sit vlerson në menyrë jo të njëjtë Votat e Përdoruesve të Regjistruar me ato të Votuesve të Jashtëm");
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
define_once("_LINKVOTE","Voto!");
define_once("_HTMLCODE3","Duke përdorur këtë formular u jepet mundësia përdoruesve të japin një vlersim direkt nga siti i tyre, vlersim që regjistrohet nga ne. Formulari i mëposhtëm është i disaktivuar, por kodi në vazhdim funksionon siç duhet duke prerë dhe ngjitur në faqet personale këtë kod:");
define_once("_PROMOTE05","Faleminderit! dhe paç fat!");
define_once("_STAFF","Ekipi");
define_once("_THANKSBROKEN","Faleminderit për ndihmën e dhënë në mbajtjen e integritetit të kësaj directory.");
define_once("_THANKSFORINFO","Faleminderit për informacionin.");
define_once("_LOOKTOREQUEST","Do ta shqyrtojmë së shpejti kërkesën tuaj.");
define_once("_ONLYREGUSERSMODIFY","Vetëm Përdoruesit e Regjistruar mund të propozojnë ndryshime për Downloads.  <a href=\"modules.php?name=Your_Account\">Regjistrim/Login</a>.");
define_once("_REQUESTLINKMOD","Kërkesë Për Modifikim Lidhje");
define_once("_LINKID","ID e Lidhjes");
define_once("_SENDREQUEST","Dërgoje Kërkesën");
define_once("_THANKSTOTAKETIME","Faleminderit që harxhuat pak nga koha juaj për të votuar një sit këtu tek");
define_once("_LETSDECIDE","L'Input da te fornito pu&ograve; aiutare gli altri visitatori a decidere pi&ugrave; facilmente su quali link cliccare.");
define_once("_RETURNTO","Kthehu tek");
define_once("_RATENOTE1","Mos voto për të njëjtin burim më shumë se një herë, faleminderit.");
define_once("_RATENOTE2","Shkalla është nga 1 - 10, ku 1 sinjifikon nuk bën një lek dhe 10 sinjifikon i shkëlqyer.");
define_once("_RATENOTE3","Mundohu të jesh sa më objektiv gjatë votimit.");
define_once("_RATENOTE4","Mund të shohësh listën e <a href=\"modules.php?name=Web_Links&amp;l_op=TopRated\">Siteve Top</a>.");
define_once("_RATENOTE5","Mos voto vetë ti për sitin tënd apo për sitet e konkurrentëve të tu të drejtë për drejtë, faleminderit.");
define_once("_YOUAREREGGED","Je një Përdorues i Regjistruar dhe i njohur me korrektsi nga sistemi.");
define_once("_FEELFREE2ADD","Shto komentet që dëshiron në këtë sit.");
define_once("_YOUARENOTREGGED","Nuk je i Regjistruar ose nuk je identifikuar nga sistemi.");
define_once("_IFYOUWEREREG","Mbasi të regjistrohesh mund të dërgosh sa komente të duash në këtë sit.");
define_once("_WEBLINKS","Lidhje Web");
define_once("_TITLE","Titulli");
define_once("_MODIFY","Modifiko");
define_once("_COMPLETEVOTE1","Vota juaj është e mirëpritur.");
define_once("_COMPLETEVOTE2","Ke votuar njëherë për këtë argument në $anonwaitdays ditë(t) e shkuara.");
define_once("_COMPLETEVOTE3","Voto për një argument vetëm një herë.<br>Të gjitha votat regjistrohen dhe valutohen.");
define_once("_COMPLETEVOTE4","Nuk mund të votosh një link të shtuar nga vetë ti.<br>Të gjitha votat regjistrohen dhe valutohen.");
define_once("_COMPLETEVOTE5","Asnjë valutim i seleksionuar - Asnjë votë e shprehur");
define_once("_COMPLETEVOTE6","Vetëm një votë për adresë IP lejohet çdo $outsidewaitdays ditë.");
define_once("_LINKSDATESTRING","%d-%b-%Y");


