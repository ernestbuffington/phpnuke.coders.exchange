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
define_once("_PREVIOUS","Edellinen sivu");
define_once("_NEXT","Uusi sivu");
define_once("_CATEGORY","Kategoria");

 
define_once("_CATEGORIES","Aihepiirit");
define_once("_LVOTES","ääntä");
define_once("_TOTALVOTES","Ääniä :");
define_once("_THEREARE","Tietokannassa on");
define_once("_NOMATCHES","Tietoja antamillasi hakuehdoilla ei löytynyt");
define_once("_SCOMMENTS","Kommentit");
define_once("_UNKNOWN","tuntematon");
define_once("_DOWNLOADS","imurointia"); 
define_once("_AUTHORNAME","Nimi");
define_once("_AUTHOREMAIL","Sähköposti");
define_once("_DOWNLOADNAME","Tiedoston nimi");
define_once("_ADDTHISFILE","Lisää tiedosto");
define_once("_INBYTES","kt");
define_once("_FILESIZE","tiedostokoko");
define_once("_VERSION","Versio");
define_once("_DESCRIPTION","Kuvaus");
define_once("_AUTHOR","Nimi");
define_once("_HOMEPAGE","Kotisivut");
define_once("_DOWNLOADNOW","Imuroi tämä tiedosto!");
define_once("_RATERESOURCE","Arvostele");
define_once("_FILEURL","Tiedoston URL");
define_once("_ADDDOWNLOAD","Lisää tiedosto");
define_once("_DOWNLOADSMAIN","Etusivu");
define_once("_DOWNLOADCOMMENTS","Kommentit");
define_once("_DOWNLOADSMAINCAT","Kategoriat");
define_once("_ADDADOWNLOAD","Lisää tiedosto");
define_once("_DSUBMITONCE","Lisää tiedosto vain kerran.");
define_once("_DPOSTPENDING","Kaikki tiedostot hyväksytetään ylläpitäjällä ennen niiden julkaisemista.");
define_once("_RESSORTED","Lajiteltu");
define_once("_DOWNLOADSNOTUSER1","Et ole joko rekisteröitynyt tai kirjautunut.");
define_once("_DOWNLOADSNOTUSER2","Rekisteröityneenä käyttäjänä sinulla on mahdollisuus lisätä tiedostoja sivuille");
define_once("_DOWNLOADSNOTUSER3","Rekisteröityminen on helppoa ja vaivatonta.");
define_once("_DOWNLOADSNOTUSER4","Miksi me vaadimme käytttäjiämme rekisteröitymään?");
define_once("_DOWNLOADSNOTUSER5","Jotta voimme antaa teille parhaimman laadun,");
define_once("_DOWNLOADSNOTUSER6","kaikki tiedostot ovat tarkistettuja ja ylläpitäjän hyväksymiä.");
define_once("_DOWNLOADSNOTUSER7","Pyrimme myös tarjoamaan tarpeellisen tiedon tiedostosta.");
define_once("_DOWNLOADSNOTUSER8","<a href=\"modules.php?name=Your_Account&op=new_user\">rekisteröidy</a> (tai kirjaudu)");
define_once("_DOWNLOADALREADYEXT","VIRHE: Tiedosto löytyy jo tietokannastamme!");
define_once("_DOWNLOADNOTITLE","VIRHE: Annappas tiedostolle nimi!");
define_once("_DOWNLOADNOURL","VIRHE: URL unohtui!");
define_once("_DOWNLOADNODESC","VIRHE: Kuvaus unohtui!");
define_once("_DOWNLOADRECEIVED","Me saimme tiedoston hyväksyttäväksi - kiitos!");
define_once("_NEWDOWNLOADS","Uudet");
define_once("_TOTALNEWDOWNLOADS","Uusia");
define_once("_DTOTALFORLAST","Uudet tiedostot viimeiseltä");
define_once("_DBESTRATED","Eniten ääniä - TOP ");
define_once("_TRATEDDOWNLOADS","Ääniä kaikkiaan");
define_once("_SORTDOWNLOADSBY","Lajittele");
define_once("_DCATNEWTODAY","Uudet tiedostot, jotka on lisätty tänään");
define_once("_DCATLAST3DAYS","Uudet tiedostot, jotka ovat lisätty viimeisen 3 päivän aikana");
define_once("_DCATTHISWEEK","Uudet tiedostot, jotka lisätty tällä viikolla");
define_once("_DDATE1","Päivä (Vanhat ensimmäisenä)");
define_once("_DDATE2","Päivä (Uudet ensimmäisenä)");
define_once("_DOWNLOADPROFILE","Profiili");
define_once("_DOWNLOADRATINGDET","Arvostelujen tiedot");
define_once("_EDITTHISDOWNLOAD","Muokkaa");
define_once("_DOWNLOADRATING","Arvostelut");
define_once("_DOWNLOADVOTE","Arvostele!");
define_once("_REQUESTDOWNLOADMOD","Muokkaa");
define_once("_DOWNLOADID","ID");
define_once("_DLETSDECIDE","Juuri näitten arvostelujen perusteella muut surffaajat voivat paremmin päättää mitä itse tahtovat imuroida.");
define_once("_DRATENOTE4","Katso <a href=\"modules.php?name=Downloads&d_op=TopRated\">Parhaat äänet</a>.");
define_once("_DATE","Päivä");
define_once("_TO","Kenelle:");
define_once("_NEW","Uusi");
define_once("_POPULAR","Suosittu");
define_once("_TOPRATED","Huippuluokiteltu");
define_once("_ADDITIONALDET","Lisätiedot");
define_once("_EDITORREVIEW","Toimittajan valinnat");
define_once("_REPORTBROKEN","Ilmoita toimimattomasta linkistä");
define_once("_AND","ja");
define_once("_INDB","kannassamme");
define_once("_INSTRUCTIONS","Ohjeet");
define_once("_USERANDIP","Käyttäjätunnus ja IP talletetaan, joten ethän käytä järjestelmää väärin.");
define_once("_LDESCRIPTION","Kuvaus: (255 merkkiä max)");
define_once("_CHECKFORIT","Et kirjoittanut sähköpostiosoitettasi. Tarkistamme kuitenkin linkkisi pian.");
define_once("_LASTWEEK","viime viikolta");
define_once("_LAST30DAYS","viimeisiltä 30 päivältä");
define_once("_1WEEK","1 viikon ajalta");
define_once("_2WEEKS","2 viikon ajalta");
define_once("_30DAYS","30 päivän ajalta");
define_once("_SHOW","Näytä");
define_once("_DAYS","päivältä");
define_once("_ADDEDON","lisätty");
define_once("_RATING","Sija");
define_once("_DETAILS","Yksityiskohdat");
define_once("_OF","of");
define_once("_TVOTESREQ","äänten määrän minimi");
define_once("_SHOWTOP","Näytä Top");
define_once("_MOSTPOPULAR","Suosituimmat - Top");
define_once("_OFALL","kaikista");
define_once("_POPULARITY","Suosio");
define_once("_SELECTPAGE","Valitse sivu");
define_once("_MAIN","Etusivu");
define_once("_NEWTODAY","Uusia tänään");
define_once("_NEWLAST3DAYS","Uudet viimeisten 3 päivän ajalta");
define_once("_NEWTHISWEEK","Uudet tältä viikolta");
define_once("_POPULARITY1","Suosio (Vähiten suosituista eniten suosittuihin)");
define_once("_POPULARITY2","Suosio (Vähiten suosituista eniten suosittuihin)");
define_once("_TITLEAZ","Otsikko (A - Z)");
define_once("_TITLEZA","Otsikko (Z - A)");
define_once("_RATING1","Tila (Viimeisestä ensimmäiseen)");
define_once("_RATING2","Tila (Ensimmäisestä viimeiseen)");
define_once("_SEARCHRESULTS4","Hakutulokset");
define_once("_USUBCATEGORIES","Alakategoriat");
define_once("_TRY2SEARCH","Yritä etsiä");
define_once("_INOTHERSENGINES","muilla hakukoneilla");
define_once("_EDITORIAL","Kommentti");
define_once("_EDITORIALBY","Kommentoinut:");
define_once("_NOEDITORIAL","Tälle sivulle ei tällä hetkellä ole kommenttia.");
define_once("_RATETHISSITE","Arvostele tätä lähdettä");
define_once("_ISTHISYOURSITE","Onko tämä lähteesi?");
define_once("_ALLOWTORATE","Anna muiden käyttäjien arvostella sitä omalta sivultasi!");
define_once("_OVERALLRATING","Yleisarvostelu");
define_once("_TOTALOF","Yhteensä");
define_once("_USER","Käyttäjä");
define_once("_USERAVGRATING","Käyttäjän keskimääräinen sija");
define_once("_NUMRATINGS","Äänien määrä");
define_once("_REGISTEREDUSERS","Rekisteröityneet käyttäjät");
define_once("_NUMBEROFRATINGS","Äänien määrä");
define_once("_NOREGUSERSVOTES","Ei rekisteröityneiden käyttäjien ääniä");
define_once("_BREAKDOWNBYVAL","Sijoituksien erittely arvostelun mukaan");
define_once("_LTOTALVOTES","yhteensä ääniä");
define_once("_HIGHRATING","Korkea sija");
define_once("_LOWRATING","Huono sija");
define_once("_NUMOFCOMMENTS","Kommenttien määrä");
define_once("_WEIGHNOTE","* Huom: Tämä lähde punnitsee rekisteröityjen vs. rekisteröitymättömien käyttäjien arvostelut");
define_once("_NOUNREGUSERSVOTES","Ei rekisteröitymättömien käyttäjien ääniä");
define_once("_WEIGHOUTNOTE","* Huom.: Tämä lähde punnitsee rekisteröityjen vs. rekisteröitymättömien äänestäjien arvostelut");
define_once("_NOOUTSIDEVOTES","Ei ulkopuolisten ääniä");
define_once("_OUTSIDEVOTERS","Ulkopuoliset äänestäjät");
define_once("_UNREGISTEREDUSERS","Rekisteröitymättömät käyttäjät");
define_once("_PROMOTEYOURSITE","Mainosta sivuasi");
define_once("_PROMOTE01","Voit ehkä olla kiinnostunut etäisistä 'Arvostele sivua' vaihtoehdoistamme. Ne antavat sinulle mahdollisuuden laittaa kuvan (tai jopa arvostelun) sivullesi kasvattamaan lähteesi äänien määrää. Valitse yhdestä alla listatuista vaihtosehdoista:");
define_once("_TEXTLINK","Tekstilinkki");
define_once("_PROMOTE02","Yksi tapa linkittää arvostelukaavakkeeseen on yksinkertainen tekstilinkki:");
define_once("_HTMLCODE1","HTML-koodi, jota sinun tulisi tässä tapauksessa käyttää, on seuraava:");
define_once("_THENUMBER","Määrä");
define_once("_IDREFER","HTML-lähdekoodissa viitataan sivusi tunnusnumeroon $sivunimi -tietokannassa. Varmista että tämä numero on mainittu.");
define_once("_BUTTONLINK","Nappilinkki");
define_once("_PROMOTE03","Jos etsit jotain muuta kuin tekstilinkkiä, saatat haluta käyttää pientä nappilinkkiä:");
define_once("_RATEIT","Arvostele tätä sivua!");
define_once("_HTMLCODE2","Lähdekoodi edellä mainitulle napille on:");
define_once("_REMOTEFORM","Etähallittu arvostelulomake");
define_once("_PROMOTE04","Jos huijaat tässä, poistamme linkkisi. Tältä näyttää nykyinen etähallittu arvostelulomake.");
define_once("_VOTE4THISSITE","Äänestä tätä sivua!");
define_once("_HTMLCODE3","Käyttäen tätä lomaketta käyttäjät voivat arvostella sivuasi suoraan sivultasi ja arvostelu talletetaan tänne. Ylläoleva lomake ei toimi, mutta seuraava lähdekoodi toimii jos yksinkertaisesti leikkaat ja liimaat sen nettisivuusi. Lähdekoodi näkyy alla:");
define_once("_PROMOTE05","Kiitos! ja onnea arvosteluillesi!");
define_once("_STAFF","Ylläpito");
define_once("_THANKSBROKEN","Kiitos että autoit pitämään yllä tämän luettelon kokonaisuutta.");
define_once("_SECURITYBROKEN","Turvallisuussyistä käyttäjätunnuksesi ja IP-osoitteesi talletetaan väkiaikaisesti.");
define_once("_THANKSFORINFO","Kiitos tiedoista.");
define_once("_LOOKTOREQUEST","Tarkistamme toiveesi pian.");
define_once("_SENDREQUEST","Lähetä ehdotus");
define_once("_THANKSTOTAKETIME","Kiitos ajan käytöstäsi sivun arvosteluun täällä");
define_once("_RETURNTO","Palaa");
define_once("_RATENOTE1","Älä äänestä samaa lähdettä enempää kuin kerran.");
define_once("_RATENOTE2","Asteikko on 1 - 10, jossa 1 on huono ja 10 erinomainen.");
define_once("_RATENOTE3","Ole puolueeton äänestyksessäsi, jos kaikki saavat 1 tai 10, arvosteluista ei ole paljonkaan hyötyä.");
define_once("_RATENOTE5","Älä äänestä oman tai kilpailijasi lähteestä.");
define_once("_YOUAREREGGED","Olet rekisteröity käyttäjä ja olet kirjautunut sisään.");
define_once("_FEELFREE2ADD","Laita vapaasti kommentti tälle sivulle.");
define_once("_YOUARENOTREGGED","Et ole rekisteröity käyttäjä tai et ole kirjautunut sisään.");
define_once("_IFYOUWEREREG","Jos olisit rekisteröitynyt, voisit kommetoida tätä sivua.");
define_once("_TITLE","Otsikko");
define_once("_MODIFY","Muokkaa");
define_once("_COMPLETEVOTE1","Your vote is appreciated.");
define_once("_COMPLETEVOTE2","You have already voted for this resource in the past $anonwaitdays day(s).");
define_once("_COMPLETEVOTE3","Vote for a resource only once.<br>All votes are logged and reviewed.");
define_once("_COMPLETEVOTE4","You cannot vote on a link you submitted.<br>All votes are logged and reviewed.");
define_once("_COMPLETEVOTE5","No rating selected - no vote tallied");
define_once("_COMPLETEVOTE6","Only one vote per IP address allowed every $outsidewaitdays day(s).");
define_once("_LINKSDATESTRING","%d-%b-%Y");

