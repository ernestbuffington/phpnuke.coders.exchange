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
define_once("_PREVIOUS","Eelmine Leht");
define_once("_NEXT","Järgmine Leht");
define_once("_CATEGORY","Kategooria");
define_once("_CATEGORIES","Kategooriat");
define_once("_LVOTES","hääl(t)");
define_once("_TOTALVOTES","Hääli Kokku:");
define_once("_THEREARE","Praegu on");
define_once("_NOMATCHES","Sinu päringule ei leitud vastust");
define_once("_SCOMMENTS","Kommentaarid");
define_once("_UNKNOWN","Tundmatu");
define_once("_AUTHORNAME","Autori nimi");
define_once("_AUTHOREMAIL","Autori Email");
define_once("_DOWNLOADNAME","Programmi nimi");
define_once("_ADDTHISFILE","Lisa see fail");
define_once("_INBYTES","baitides");
define_once("_FILESIZE","Faili suurus");
define_once("_VERSION","Versioon");
define_once("_DESCRIPTION","Kirjeldus");
define_once("_AUTHOR","Autor");
define_once("_HOMEPAGE","Kodulehekülg");
define_once("_DOWNLOADNOW","Lae see fail nüüd alla!");
define_once("_RATERESOURCE","Hinda faili");
define_once("_FILEURL","Faili link");
define_once("_ADDDOWNLOAD","Lisa fail");
define_once("_DOWNLOADSMAIN","Failide avaleht");
define_once("_DOWNLOADCOMMENTS","Failide kommentaarid");
define_once("_DOWNLOADSMAINCAT","Failide peakategooriad");
define_once("_ADDADOWNLOAD","Lisa uus fail");
define_once("_DSUBMITONCE","Saada unikaalne fail ainul korra.");
define_once("_DPOSTPENDING","Kõik failid on saadetud sõltumatta kinnitusest.");
define_once("_RESSORTED","Failid hetkel sorteeritud");
define_once("_DOWNLOADSNOTUSER1","Sa ei ole registreeritud kasutaja või sa pole sisse loginud.");
define_once("_DOWNLOADSNOTUSER2","Kui sa oled registreeritud, siis sa võid lisada faile sellelt veebilehelt.");
define_once("_DOWNLOADSNOTUSER3","Registreeritud kasutajaks saamine on kiire ja lihtne protsess.");
define_once("_DOWNLOADSNOTUSER4","Miks me nõuame registratsiooni teatud võimalustele juurdepääsuks?");
define_once("_DOWNLOADSNOTUSER5","Niisiis me võime pakkuda sulle ainult kõrgema kvaliteediga sisu,");
define_once("_DOWNLOADSNOTUSER6","iga asi on üksikult üle vaadatud ja heaks kiidetud meie koosseisu poolt.");
define_once("_DOWNLOADSNOTUSER7","Me loodame sulle pakkuda ainult väärtuslikku informatsiooni.");
define_once("_DOWNLOADSNOTUSER8","<a href=\"modules.php?name=Your_Account\">Registreeri Konto</a>");
define_once("_DOWNLOADALREADYEXT","VIGA: See URL on juba olemas andmebaasis!");
define_once("_DOWNLOADNOTITLE","VIGA: Sa pead sisestama PEALKIRJA oma URL-ile!");
define_once("_DOWNLOADNOURL","VIGA: Sa pead sisestama AADRESSI oma URL-ile!");
define_once("_DOWNLOADNODESC","VIGA: Sa pead sisestama KIRJELDUSE oma URL-ile!");
define_once("_DOWNLOADRECEIVED","Me võtsime vastu sinu faili. Tänud!");
define_once("_NEWDOWNLOADS","Uued failid");
define_once("_TOTALNEWDOWNLOADS","Kokku uusi faile");
define_once("_DTOTALFORLAST","Kokku uusi faile viimasest");
define_once("_DBESTRATED","Enim hinnatud failid - Top");
define_once("_TRATEDDOWNLOADS","kokku hinnatud faile");
define_once("_SORTDOWNLOADSBY","Sorteeri faile");
define_once("_DCATNEWTODAY","Uued failid selles kategoorias. Lisatud täna");
define_once("_DCATLAST3DAYS","Uued failid selles kategoorias. Lisatud viimase 3 päeva jooksul");
define_once("_DCATTHISWEEK","Uued failid selles kategoorias. Lisatud sellel nädalal");
define_once("_DDATE1","Kuupäevalises järjekorras (vanemad failid loendatud ennem)");
define_once("_DDATE2","Kuupäevalises järjekorras (uuemad failid loendatud ennem)");
define_once("_DOWNLOADS","Failid");
define_once("_DOWNLOADPROFILE","Faili profiil");
define_once("_DOWNLOADRATINGDET","Faili hinnagu detailid");
define_once("_EDITTHISDOWNLOAD","Redigeeri faili");
define_once("_DOWNLOADRATING","Failide hindamine");
define_once("_DOWNLOADVOTE","Hääleta!");
define_once("_DONLYREGUSERSMODIFY","Ainult registreeritud kasutajad võivad soovitada failide modifikatsiooni. Palun <a href=\"modules.php?name=Your_Account\">registreeri või logi sisse</a>.");
define_once("_REQUESTDOWNLOADMOD","Soovita faili modifikatsiooni");
define_once("_DOWNLOADID","Faili ID");
define_once("_DLETSDECIDE","Sisesed kasutajad nagu Sina, aitavad teistele külastajatele paremini otsustada millisele Failile klikkida.");
define_once("_DRATENOTE4","Sa võid näha nimekirja <a href=\"modules.php?name=Downloads&amp;d_op=TopRated\">Top hinnatud failid</a>.");
define_once("_DATE","Kuupäev");
define_once("_TO","Kellele");
define_once("_NEW","Uued");
define_once("_POPULAR","Populaarsemad");
define_once("_TOPRATED","Hinnatumad");
define_once("_ADDITIONALDET","Lisainfo");
define_once("_EDITORREVIEW","Toimetaja ülevaade");
define_once("_REPORTBROKEN","Teavita vigasest lingist");
define_once("_AND","ja");
define_once("_INDB","meie andmebaasis");
define_once("_INSTRUCTIONS","Juhend");
define_once("_USERANDIP","Kasutajanimi ja IP on salvestatud, seega palun ära solva süsteemi.");
define_once("_LDESCRIPTION","Kirjeldus: (255 tähemärki max)");
define_once("_CHECKFORIT","Sa ei andnud Emaili addressi, aga me kontrollime sinu linki varsti.");
define_once("_LASTWEEK","Eelmine nädal");
define_once("_LAST30DAYS","Viimased 30 Päeva");
define_once("_1WEEK","1 nädal");
define_once("_2WEEKS","2 nädalat");
define_once("_30DAYS","30 päeva");
define_once("_SHOW","Näita");
define_once("_DAYS","päeva");
define_once("_ADDEDON","Lisatud");
define_once("_RATING","Hinnang");
define_once("_DETAILS","Täpsemalt");
define_once("_OF","");
define_once("_TVOTESREQ","miinimum häält nõutav");
define_once("_SHOWTOP","Näita Top'i");
define_once("_MOSTPOPULAR","Kõige Populaarsem - Top");
define_once("_OFALL","kõikidest");
define_once("_POPULARITY","Populaarsus");
define_once("_SELECTPAGE","Vali leht");
define_once("_MAIN","Falilide avaleht");
define_once("_NEWTODAY","Uued täna");
define_once("_NEWLAST3DAYS","Uued viimase 3 päeva jooksul");
define_once("_NEWTHISWEEK","Uued sellel nädalal");
define_once("_POPULARITY1","Populaarsuse järgi (Vähimast tabamusest Suuremani)");
define_once("_POPULARITY2","Populaarsuse järgi (Suuremast tabamusest Vähimani)");
define_once("_TITLEAZ","Tähestikulises järjekorras (A-st Z-ni)");
define_once("_TITLEZA","Tähestikulises järjekorras (Z-st A-ni)");
define_once("_RATING1","Hinnangu järgi (Madalamatest punktidest Kõrgemateni)");
define_once("_RATING2","Hinnangu järgi (Kõrgematest punktidest Madalamateni)");
define_once("_SEARCHRESULTS4","Otsimise tulemused");
define_once("_USUBCATEGORIES","Alamkategooriad");
define_once("_TRY2SEARCH","Proovi otsida");
define_once("_INOTHERSENGINES","teistest Otsingumootoritest");
define_once("_EDITORIAL","Toimetaja");
define_once("_EDITORIALBY","Toimetas");
define_once("_NOEDITORIAL","Toimetajat ei ole praegu saadaval selle veebilehel.");
define_once("_RATETHISSITE","Hinda seda faili");
define_once("_ISTHISYOURSITE","Kas see on sinu fail?");
define_once("_ALLOWTORATE","Lase teistel kasutajatel hinnata seda oma veebilehelt!");
define_once("_OVERALLRATING","Üldine Hinnang");
define_once("_TOTALOF","Kokku");
define_once("_USER","Kasutaja");
define_once("_USERAVGRATING","Kasutajate keskimine hinnang");
define_once("_NUMRATINGS","# hinnanguid");
define_once("_REGISTEREDUSERS","Registreeritud kasutajad");
define_once("_NUMBEROFRATINGS","Hindamisi kokku");
define_once("_NOREGUSERSVOTES","Registreerunud kasutaja hääli pole");
define_once("_BREAKDOWNBYVAL","Tabel hinnagu väärtusete järgi");
define_once("_LTOTALVOTES","hääli kokku");
define_once("_HIGHRATING","Kõrgeim hinne");
define_once("_LOWRATING","Madalaim hinne");
define_once("_NUMOFCOMMENTS","Kommentaaride arv");
define_once("_WEIGHNOTE","* NB: Sellel failil kaalub Registreeritud ja Registreerimata kasutajate hinnang");
define_once("_NOUNREGUSERSVOTES","Registreerimata kasutaja hääli ei ole");
define_once("_WEIGHOUTNOTE","* NB: Sellel failil kaal registreeritud ja väliste hääletajate hinnang");
define_once("_NOOUTSIDEVOTES","Väliseid hääli ei ole");
define_once("_OUTSIDEVOTERS","Väliseid hääletajaid");
define_once("_UNREGISTEREDUSERS","Registreerimata kasutajaid");
define_once("_PROMOTEYOURSITE","Edenda oma veebilehte");
define_once("_PROMOTE01","Võibolla oled Sa huvitatud mitme kaug 'Hinda veebilehte' valikust, mis on meil saadaval. Need lasevad sul asetada pildi (või isegi hindamise vormi) sinu webi lehele, tellides juurdekasvu numbrites hääli oma faili saamisel. Palun vali üks valikutest alljärgnevast nimekirjast:");
define_once("_TEXTLINK","Teksti link");
define_once("_PROMOTE02","Üks võimalus linkida hindamisvormi, on läbi lihtsa tekstilingi:");
define_once("_HTMLCODE1","HTML koodi peaksid sa kasutama sellisel juhul alljärgnevalt:");
define_once("_THENUMBER","Number");
define_once("_IDREFER","HTML koodis viitab sinu lehe ID numbrile $sitename andmebaasis. Ole kindel, et number on olemas.");
define_once("_BUTTONLINK","Nupu link");
define_once("_PROMOTE03","Kui sa otsid natuke rohkemat kui tavalist tekstilinki võid sa kasutada seda väikest nupulinki:");
define_once("_RATEIT","Hinda seda lehte!");
define_once("_HTMLCODE2","Lähtekood nupust allpool on:");
define_once("_REMOTEFORM","Kaughindamise vorm");
define_once("_PROMOTE04","Kui sa petad sellega, siis me kõrvaldame Sinu lingi.Siin on see kaughindamise vorm ja välja näeb sellisena.");
define_once("_VOTE4THISSITE","Hääleta seda lehte!");
define_once("_HTMLCODE3","Kasutades seda vormi, lased sa kasutajatel hinnata oma faili otse oma lehelt ja hinded salvestatakse siia. Alljärgnev lähtekood töötab, kui sa lihtsalt kopeerid ja lisad selle oma veebilehele. Selline näeb siis välja lähtekood:");
define_once("_PROMOTE05","Tänud! ja edu sinu hindamistel!");
define_once("_STAFF","");
define_once("_THANKSBROKEN","Tänan sind abi eest, et aitad ülal hoida kataloogi terviklikkust.");
define_once("_SECURITYBROKEN","Turavlisuse põhjusel Sinu kasutajanimi ja IP address on ajutiselt salvestatud.");
define_once("_THANKSFORINFO","Tänan informatsiooni eest.");
define_once("_LOOKTOREQUEST","Me vaatame Sinu taotlust peagi.");
define_once("_SENDREQUEST","Saada Taotlus");
define_once("_THANKSTOTAKETIME","Tänan Sind, et leidsid aega hinnata seda lehte siin");
define_once("_RETURNTO","Tagasi");
define_once("_RATENOTE1","Palun, ära hääleta sama faili rohkem kui üks kord.");
define_once("_RATENOTE2","Hindeid saab anda 1 - 10. 1 on väga halb ja 10 on väga hea.");
define_once("_RATENOTE3","Palun ole objektiivne oma hindega, kui kõik hindavad  1 või 10, siis hinded pole eriti kasulikud.");
define_once("_RATENOTE5","Ära hinda oma faili või võistlejat.");
define_once("_YOUAREREGGED","Sa oled registreeritud kasutaja ja oled sisse loginud.");
define_once("_FEELFREE2ADD","Julgelt lisa kommentaare selle lehe kohta.");
define_once("_YOUARENOTREGGED","Sa ei ole registreeritud kasutaja või sa ei ole sisse loginud.");
define_once("_IFYOUWEREREG","Kui sa olid registreeritud, siis võid sa postitada kommentaare sellel veebilehel.");
define_once("_TITLE","Pealkiri");
define_once("_MODIFY","Muuda");
define_once("_COMPLETEVOTE1","Sinu hinnang on lisatud.");
define_once("_COMPLETEVOTE2","Sa juba oled hinnanud seda faili viimasel $anonwaitdays päeva jooksul.");
define_once("_COMPLETEVOTE3","Hinda faili ainul korra.<br>Kõik hinnangud on logitud ja arvutatud.");
define_once("_COMPLETEVOTE4","Sa ei saa hindeid anda faili poolt, mille sa saatsid.<br>Kõik hinnangud on logitud ja arvutatud.");
define_once("_COMPLETEVOTE5","Hinnangut ei ole valitud - häält ei ole talletatud");
define_once("_COMPLETEVOTE6","Ainult üks hinnag IP addressi kohta on lubatud iga $outsidewaitdays päeva järel.");
define_once("_LINKSDATESTRING","%d-%b-%Y");

