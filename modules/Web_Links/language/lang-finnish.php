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
define_once("_PREVIOUS","Edellinen sivu");
define_once("_NEXT","Uusi sivu");
define_once("_YOURNAME","Nimesi");
define_once("_CATEGORY","Kategoria");

 
define_once("_CATEGORIES","Aihepiirit");
define_once("_LVOTES","ääntä");
define_once("_TOTALVOTES","Ääniä :");
define_once("_LINKTITLE","Linkin otsikko");
define_once("_HITS","Lukukertoja");
define_once("_THEREARE","Tietokannassa on");
define_once("_NOMATCHES","Tietoja antamillasi hakuehdoilla ei löytynyt");
define_once("_SCOMMENTS","Kommentit");
define_once("_DESCRIPTION","Kuvaus");
define_once("_ONLYREGUSERSMODIFY","Vain rekisteröityneet käyttäjät voivat muokata. Ole hyvä ja <a href=\"modules.php?name=Your_Account\">rekisteröidy tai kirjaudu</a>.");
define_once("_DATE","Päivä");
define_once("_TO","Kenelle:");
define_once("_ADDLINK","Lisää linkki");
define_once("_NEW","Uusi");
define_once("_POPULAR","Suosittu");
define_once("_TOPRATED","Huippuluokiteltu");
define_once("_RANDOM","Satunnainen");
define_once("_LINKSMAIN","Etusivu");
define_once("_LINKCOMMENTS","Linkkien kommentit");
define_once("_ADDITIONALDET","Lisätiedot");
define_once("_EDITORREVIEW","Toimittajan valinnat");
define_once("_REPORTBROKEN","Ilmoita toimimattomasta linkistä");
define_once("_LINKSMAINCAT","Kategoriat");
define_once("_AND","ja");
define_once("_INDB","kannassamme");
define_once("_ADDALINK","Lisää linkki");
define_once("_INSTRUCTIONS","Ohjeet");
define_once("_SUBMITONCE","Lisää linkkisi vain kerran.");
define_once("_POSTPENDING","Linkkisi lisätään vasta hyväksymisen jälkeen");
define_once("_USERANDIP","Käyttäjätunnus ja IP talletetaan, joten ethän käytä järjestelmää väärin.");
define_once("_PAGETITLE","Sivun otsikko");
define_once("_PAGEURL","Sivun URL");
define_once("_YOUREMAIL","Sähköpostisi");
define_once("_LDESCRIPTION","Kuvaus: (255 merkkiä max)");
define_once("_ADDURL","Lisää");
define_once("_LINKSNOTUSER1","Et ole rekisteröity käyttäjä tai et ole kirjautunut sisään.");
define_once("_LINKSNOTUSER2","Jos olisit rekisteröity käyttäjä, voisit lisätä linkkejä tälle sivulle.");
define_once("_LINKSNOTUSER3","Rekisteröityminen on helppoa ja vaivatonta.");
define_once("_LINKSNOTUSER4","Miksi vaadimme rekisteröitymistä pääsemiseksi käsiksi tiettyihin ominaisuuksiin?");
define_once("_LINKSNOTUSER5","Jotta voisimme tarjota sinulle vain korkeimman laatuisen sisällön,");
define_once("_LINKSNOTUSER6","jokainen kohta tarkastetaan ja hyväksytään ylläpidossa.");
define_once("_LINKSNOTUSER7","Toivomme voivamme tarjota sinulle vain arvokasta tietoa.");
define_once("_LINKSNOTUSER8","<a href=\"modules.php?name=Your_Account\">Rekisteröidy</a>");
define_once("_LINKALREADYEXT","VIRHE: Tämä osoite on jo kannassa!");
define_once("_LINKNOTITLE","VIRHE: Sinun täytyy kirjoittaa OTSIKKO osoitteellesi!");
define_once("_LINKNOURL","VIRHE: Sinun täytyy kirjoittaa URL osoitteellesi!");
define_once("_LINKNODESC","VIRHE: Sinun täytyy kirjoittaa KUVAUS osoitteellesi!");
define_once("_LINKRECEIVED","Vastaanotimme linkkiehdotuksesi. Kiitos!");
define_once("_EMAILWHENADD","Saat sähköpostin, kun se on hyväksytty.");
define_once("_CHECKFORIT","Et kirjoittanut sähköpostiosoitettasi. Tarkistamme kuitenkin linkkisi pian.");
define_once("_NEWLINKS","Uudet linkit");
define_once("_TOTALNEWLINKS","Kaikki uudet linkit");
define_once("_LASTWEEK","viime viikolta");
define_once("_LAST30DAYS","viimeisiltä 30 päivältä");
define_once("_1WEEK","1 viikon ajalta");
define_once("_2WEEKS","2 viikon ajalta");
define_once("_30DAYS","30 päivän ajalta");
define_once("_SHOW","Näytä");
define_once("_TOTALFORLAST","Kaikki uudet linkit viimeisiltä");
define_once("_DAYS","päivältä");
define_once("_ADDEDON","lisätty");
define_once("_RATING","Sija");
define_once("_RATESITE","Arvostele tätä sivua");
define_once("_DETAILS","Yksityiskohdat");
define_once("_BESTRATED","Parhaiten arvostellut linkit - Top");
define_once("_OF","of");
define_once("_TRATEDLINKS","kaikki arvostellut linkit");
define_once("_TVOTESREQ","äänten määrän minimi");
define_once("_SHOWTOP","Näytä Top");
define_once("_MOSTPOPULAR","Suosituimmat - Top");
define_once("_OFALL","kaikista");
define_once("_SORTLINKSBY","Lajittele");
define_once("_SITESSORTED","Tällä hetkellä lajiteltu");
define_once("_POPULARITY","Suosio");
define_once("_SELECTPAGE","Valitse sivu");
define_once("_MAIN","Etusivu");
define_once("_NEWTODAY","Uusia tänään");
define_once("_NEWLAST3DAYS","Uudet viimeisten 3 päivän ajalta");
define_once("_NEWTHISWEEK","Uudet tältä viikolta");
define_once("_CATNEWTODAY","Uudet tänään lisätyt linkit tässä kategoriassa");
define_once("_CATLAST3DAYS","Uudet viimeisten 3 päivän aikana lisätyt linkit tässä kategoriassa");
define_once("_CATTHISWEEK","Uudet tämän viikon aikana lisätyt linkit tässä kategoriassa");
define_once("_POPULARITY1","Suosio (Vähiten suosituista eniten suosittuihin)");
define_once("_POPULARITY2","Suosio (Vähiten suosituista eniten suosittuihin)");
define_once("_TITLEAZ","Otsikko (A - Z)");
define_once("_TITLEZA","Otsikko (Z - A)");
define_once("_DATE1","Päiväys (Vanhat ensin)");
define_once("_DATE2","Päiväys (Uudet ensin)");
define_once("_RATING1","Tila (Viimeisestä ensimmäiseen)");
define_once("_RATING2","Tila (Ensimmäisestä viimeiseen)");
define_once("_SEARCHRESULTS4","Hakutulokset");
define_once("_USUBCATEGORIES","Alakategoriat");
define_once("_LINKS","Linkit");
define_once("_TRY2SEARCH","Yritä etsiä");
define_once("_INOTHERSENGINES","muilla hakukoneilla");
define_once("_EDITORIAL","Kommentti");
define_once("_LINKPROFILE","Linkin profiili");
define_once("_EDITORIALBY","Kommentoinut:");
define_once("_NOEDITORIAL","Tälle sivulle ei tällä hetkellä ole kommenttia.");
define_once("_VISITTHISSITE","Käy tällä sivulla");
define_once("_RATETHISSITE","Arvostele tätä lähdettä");
define_once("_ISTHISYOURSITE","Onko tämä lähteesi?");
define_once("_ALLOWTORATE","Anna muiden käyttäjien arvostella sitä omalta sivultasi!");
define_once("_LINKRATINGDET","Linkin sijan tiedot");
define_once("_OVERALLRATING","Yleisarvostelu");
define_once("_TOTALOF","Yhteensä");
define_once("_USER","Käyttäjä");
define_once("_USERAVGRATING","Käyttäjän keskimääräinen sija");
define_once("_NUMRATINGS","Äänien määrä");
define_once("_EDITTHISLINK","Muokkaa tätä linkkiä");
define_once("_REGISTEREDUSERS","Rekisteröityneet käyttäjät");
define_once("_NUMBEROFRATINGS","Äänien määrä");
define_once("_NOREGUSERSVOTES","Ei rekisteröityneiden käyttäjien ääniä");
define_once("_BREAKDOWNBYVAL","Sijoituksien erittely arvostelun mukaan");
define_once("_LTOTALVOTES","yhteensä ääniä");
define_once("_LINKRATING","Linkkien sijoitukset");
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
define_once("_LINKVOTE","Äänestä!");
define_once("_HTMLCODE3","Käyttäen tätä lomaketta käyttäjät voivat arvostella sivuasi suoraan sivultasi ja arvostelu talletetaan tänne. Ylläoleva lomake ei toimi, mutta seuraava lähdekoodi toimii jos yksinkertaisesti leikkaat ja liimaat sen nettisivuusi. Lähdekoodi näkyy alla:");
define_once("_PROMOTE05","Kiitos! ja onnea arvosteluillesi!");
define_once("_STAFF","Ylläpito");
define_once("_THANKSBROKEN","Kiitos että autoit pitämään yllä tämän luettelon kokonaisuutta.");
define_once("_THANKSFORINFO","Kiitos tiedoista.");
define_once("_LOOKTOREQUEST","Tarkistamme toiveesi pian.");
define_once("_REQUESTLINKMOD","Esitä muutos linkkeihin");
define_once("_LINKID","Linkin tunnus");
define_once("_SENDREQUEST","Lähetä ehdotus");
define_once("_THANKSTOTAKETIME","Kiitos ajan käytöstäsi sivun arvosteluun täällä");
define_once("_LETSDECIDE","Käyttäjien, kuten sinun, mielipiteet auttavat muita vierailijoita paremmin päättämään mistä linkistä painaa.");
define_once("_RETURNTO","Palaa");
define_once("_RATENOTE1","Älä äänestä samaa lähdettä enempää kuin kerran.");
define_once("_RATENOTE2","Asteikko on 1 - 10, jossa 1 on huono ja 10 erinomainen.");
define_once("_RATENOTE3","Ole puolueeton äänestyksessäsi, jos kaikki saavat 1 tai 10, arvosteluista ei ole paljonkaan hyötyä.");
define_once("_RATENOTE4","Voit katsoa listaa <a href=\"links.php?op=TopRated\">Parhaan arvosanan saaneista lähteistä</a>.");
define_once("_RATENOTE5","Älä äänestä oman tai kilpailijasi lähteestä.");
define_once("_YOUAREREGGED","Olet rekisteröity käyttäjä ja olet kirjautunut sisään.");
define_once("_FEELFREE2ADD","Laita vapaasti kommentti tälle sivulle.");
define_once("_YOUARENOTREGGED","Et ole rekisteröity käyttäjä tai et ole kirjautunut sisään.");
define_once("_IFYOUWEREREG","Jos olisit rekisteröitynyt, voisit kommetoida tätä sivua.");
define_once("_WEBLINKS","Linkit");
define_once("_TITLE","Otsikko");
define_once("_MODIFY","Muokkaa");
define_once("_COMPLETEVOTE1","Your vote is appreciated.");
define_once("_COMPLETEVOTE2","You have already voted for this resource in the past $anonwaitdays day(s).");
define_once("_COMPLETEVOTE3","Vote for a resource only once.<br>All votes are logged and reviewed.");
define_once("_COMPLETEVOTE4","You cannot vote on a link you submitted.<br>All votes are logged and reviewed.");
define_once("_COMPLETEVOTE5","No rating selected - no vote tallied");
define_once("_COMPLETEVOTE6","Only one vote per IP address allowed every $outsidewaitdays day(s).");
define_once("_LINKSDATESTRING","%d-%b-%Y");

