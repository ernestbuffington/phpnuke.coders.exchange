<?php
global $sitename;
if(!isset($anonwaitdays)) { $anonwaitdays = 0; }
if(!isset($outsidewaitdays)) { $outsidewaitdays = 0; }


/**************************************************************************/
/* PHP-NUKE: Advanced Content Management System                           */
/* ============================================                           */
/* Dato: 6. september 2002                                                */
/* PHP-NUKE Version: 6.0                                                  */
/* Denne sprog-fil er blevet oversat til dansk fra engelsk af:            */
/*                                                                        */
/* Navn:	Christian Botved Poulsen                                      */
/* E-mail:	Christian_B_P@Get2net.dk                                      */
/* ICQ:	155265588                                                     */
/* Webside:	www.Sjove-Film.dk - HitsMaskinen.dk - FilmCentralen.dk        */
/*                                                                        */
/* Hvis de finder fejl må og skal de sende en e-mail eller icq til mig!   */
/**************************************************************************/

define_once("_URL","Internetadresse");
define_once("_PREVIOUS","Forrige side");
define_once("_NEXT","Næste side");
define_once("_YOURNAME","Dit navn");
define_once("_CATEGORY","Kategori");
define_once("_CATEGORIES","Kategorier");
define_once("_LVOTES","stemmer");
define_once("_TOTALVOTES","Antal stemmer:");
define_once("_LINKTITLE","Titel på link");
define_once("_HITS","Hits");
define_once("_THEREARE","Der er");
define_once("_NOMATCHES","Søgningen gave ingen resultater");
define_once("_SCOMMENTS","Kommentarer");
define_once("_DESCRIPTION","Beskrivelse");
define_once("_ONLYREGUSERSMODIFY","Kun oprettede brugere kan foreslå ændringer til downloads. Vær venlig at logge ind eller bliv oprettet som bruger.<a href=\"modules.php?name=Your_Account\">Log ind eller bliv bruger</a>.");
define_once("_DATE","Dato");
define_once("_TO","Til");
define_once("_ADDLINK","Foreslå nyt link");
define_once("_NEW","Nye");
define_once("_POPULAR","Populære");
define_once("_TOPRATED","Bedste");
define_once("_RANDOM","Prøv lykken");
define_once("_LINKSMAIN","Oversigt over links");
define_once("_LINKCOMMENTS","Linkkommentarer");
define_once("_ADDITIONALDET","Yderligere oplysninger");
define_once("_EDITORREVIEW","Anmeldelse");
define_once("_REPORTBROKEN","Anmeld et ødelagt link");
define_once("_LINKSMAINCAT","Links hovedkategorier");
define_once("_AND","og");
define_once("_INDB","i vores database");
define_once("_ADDALINK","Foreslå nyt link");
define_once("_INSTRUCTIONS","Vejledning");
define_once("_SUBMITONCE","Indsend kun et link en gang.");
define_once("_POSTPENDING","Alle links bliver kontrolleret før de bliver publiceret.");
define_once("_USERANDIP","Brugernavn og IP-adresse bliver registreret, så vær venlig ikke at misbruge systemet.");
define_once("_PAGETITLE","Navn");
define_once("_PAGEURL","Internetadresse");
define_once("_YOUREMAIL","Din e-mailadresse");
define_once("_LDESCRIPTION","Beskrivelse: (maks 255 tegn)");
define_once("_ADDURL","Send");
define_once("_LINKSNOTUSER1","Du er ikke oprettet som bruger eller også er du ikke logget ind.");
define_once("_LINKSNOTUSER2","Hvis du var oprettet som bruger kunne du oprette links og downloads her på websitet.");
define_once("_LINKSNOTUSER3","At blive oprettet som bruger er hurtigt og nemt.");
define_once("_LINKSNOTUSER4","Hvorfor kræver vi registrering for at opnå adgang til dele af vores site?");
define_once("_LINKSNOTUSER5","Fordi vi så kan tilbyde dig det bedst mulige kvalitetsindhold,");
define_once("_LINKSNOTUSER6","alt indhold bliver individuelt gennemgået og godkendt af vores team.");
define_once("_LINKSNOTUSER7","Vi ønsker udelukkende at kunne tilbyde dig kvalitetsindhold.");
define_once("_LINKSNOTUSER8","<a href=\"modules.php?name=Your_Account\">Opret dig som bruger</a>");
define_once("_LINKALREADYEXT","FEJL: Denne internetadresse er allerede listet i vores database!");
define_once("_LINKNOTITLE","FEJL: Du skal angive en titel til internetadressen!");
define_once("_LINKNOURL","FEJL: Du skal angive en titel til internetadressen!");
define_once("_LINKNODESC","FEJL: Du skal skrve en beskrivelse for internetadressen!");
define_once("_LINKRECEIVED","Vi har modtaget dit forslag til link. Tak!");
define_once("_EMAILWHENADD","Du vil modtage en e-mail når det er godkendt.");
define_once("_CHECKFORIT","Du skrev ikke en e-mailadresse. Vi vil alligevel gennemse dit forslag snarest.");
define_once("_NEWLINKS","Nye links");
define_once("_TOTALNEWLINKS","Antal nye links");
define_once("_LASTWEEK","Sidste uge");
define_once("_LAST30DAYS","Sidste 30 dage");
define_once("_1WEEK","1 uge");
define_once("_2WEEKS","2 uger");
define_once("_30DAYS","30 dage");
define_once("_SHOW","Vis");
define_once("_TOTALFORLAST","Antal nye links de(n) sidste");
define_once("_DAYS","dage");
define_once("_ADDEDON","Oprettet");
define_once("_RATING","Rating");
define_once("_RATESITE","Rate dette website");
define_once("_DETAILS","Yderligere oplysninger");
define_once("_BESTRATED","Bedst ratede links");
define_once("_OF","af");
define_once("_TRATEDLINKS","antal ratede links");
define_once("_TVOTESREQ","stemmer er påkrævet som minimum");
define_once("_SHOWTOP","Vis bedste");
define_once("_MOSTPOPULAR","Mest populære - Top");
define_once("_OFALL","af alle");
define_once("_SORTLINKSBY","Sorter links efter");
define_once("_SITESSORTED","Websites sorteret efter");
define_once("_POPULARITY","Popularitet");
define_once("_SELECTPAGE","Vælg side");
define_once("_MAIN","Hovedkategori");
define_once("_NEWTODAY","Nye i dag");
define_once("_NEWLAST3DAYS","Nye de sidste tre dage");
define_once("_NEWTHISWEEK","Nye denne uge");
define_once("_CATNEWTODAY","Nye links i denne kategori oprettet i dag");
define_once("_CATLAST3DAYS","Nye links i denne kategori oprettet indenfor de sidste tre dage");
define_once("_CATTHISWEEK","Nye links i denne kategori oprettet indenfor den sidste uge");
define_once("_POPULARITY1","Popularitet (Færrest til flest hits)");
define_once("_POPULARITY2","Popularitet (Flest til færrest hits)");
define_once("_TITLEAZ","Titel (A til Å)");
define_once("_TITLEZA","Titel (Å til A)");
define_once("_DATE1","Dato (Gamle links først)");
define_once("_DATE2","Dato (Nye links først)");
define_once("_RATING1","Rating (Laveste score til højeste score)");
define_once("_RATING2","Rating (Højeste score til laveste score)");
define_once("_SEARCHRESULTS4","Søgeresultater for");
define_once("_USUBCATEGORIES","Underkategorier");
define_once("_LINKS","Links");
define_once("_TRY2SEARCH","Prøv at søge");
define_once("_INOTHERSENGINES","i andre søgemaskiner");
define_once("_EDITORIAL","Redaktionel leder");
define_once("_LINKPROFILE","Linkprofil");
define_once("_EDITORIALBY","Anmeldelse af");
define_once("_NOEDITORIAL","Ingen anmeldelse er tilgængeligt for dette website.");
define_once("_VISITTHISSITE","Besøg siden");
define_once("_RATETHISSITE","Rate denne side");
define_once("_ISTHISYOURSITE","Er dette dit website?");
define_once("_ALLOWTORATE","Tillad andre at rate den fra dit website!");
define_once("_LINKRATINGDET","Ratingoplysninger for link");
define_once("_OVERALLRATING","Samlet rating");
define_once("_TOTALOF","Antal af");
define_once("_USER","Bruger");
define_once("_USERAVGRATING","Brugernes gennemsnitlige rating");
define_once("_NUMRATINGS","# af ratings");
define_once("_EDITTHISLINK","Redigér dette link");
define_once("_REGISTEREDUSERS","Registerede brugere");
define_once("_NUMBEROFRATINGS","Antal ratings");
define_once("_NOREGUSERSVOTES","Ingen registrede brugerstemmer");
define_once("_BREAKDOWNBYVAL","Nedbryd ratings efter værdi");
define_once("_LTOTALVOTES","Antal stemmer");
define_once("_LINKRATING","Linksrating");
define_once("_HIGHRATING","Høje ratings");
define_once("_LOWRATING","Lave ratings");
define_once("_NUMOFCOMMENTS","Antal kommentarer");
define_once("_WEIGHNOTE","* Note: Vi vægter registrede mod uregistrede brugeres ratings.");
define_once("_NOUNREGUSERSVOTES","Ingen uregistrede brugerstemmer.");
define_once("_WEIGHOUTNOTE","Note: Vi vægter registrede mod udefrakommende stemmeratings");
define_once("_NOOUTSIDEVOTES","Ingen udefrakommende stemmer");
define_once("_OUTSIDEVOTERS","Udefrakommende stemmer");
define_once("_UNREGISTEREDUSERS","Uregistrerede brugere");
define_once("_PROMOTEYOURSITE","Reklamér for dit website");
define_once("_PROMOTE01","Måske vil du være interesseret i muligheden for at 'Rate et Website' på din eget site. Vi har flere muligheder til rådighed. De tillader, at du kan placere et billede (eller en ratingform) på dit website for at forøge antallet af stemmer som dit website modtager. Vælg mellem de forskellige muligheder nedenfor:");
define_once("_TEXTLINK","Tekstlink");
define_once("_PROMOTE02","en mulighed er at linke via et simpelt tekstlink:");
define_once("_HTMLCODE1","HTML-koden du skal bruger er som følger:");
define_once("_THENUMBER","Nummeret");
define_once("_IDREFER","i HTML-kilden refererer til dit sites ID-nummer i $sitename-databasen. Vær sikker på, at nummeret er tilstede.");
define_once("_BUTTONLINK","Knaplink");
define_once("_PROMOTE03","Hvis du er på udkig efter noget mere end bare et simpelt tekstlink, kan du bruge et lille knaplink:");
define_once("_RATEIT","Rate dette site!");
define_once("_HTMLCODE2","Kildekoden for ovenstående knap er:");
define_once("_REMOTEFORM","Udefrakommende ratingform");
define_once("_PROMOTE04","Vi tillader ikke snyd og vi holder øje med forsøg herpå. Hvis vi opdager snyd vil linket blive slettet fra databasen. Med det i baghovedet så ser den nuværende den eksterne ratingform ud således:");
define_once("_VOTE4THISSITE","Stem på denne side!");
define_once("_LINKVOTE","Stem!");
define_once("_HTMLCODE3","Hvis du bruger denne ratingform kan dine brugere stemme på dit website i vores database direkte fra dit eget site. Ratingen vil blive gemt i vors database. Ovenstående form er deaktiveret, men den nedenstående kildekode virker hvis du laver kopiér og sæt ind i din side. Husk, at tallet 14 angiver dit sites nummer i vores database. Kontrollér, at det passer!");
define_once("_PROMOTE05","Held og lykke med dine ratings!");
define_once("_STAFF","-Teamet");
define_once("_THANKSBROKEN","Tak for din hjælp!");
define_once("_THANKSFORINFO","Tak for oplysningerne.");
define_once("_LOOKTOREQUEST","Vi vil snarest gennemse din forslag.");
define_once("_REQUESTLINKMOD","Foreslag om ændring af link");
define_once("_LINKID","Link ID");
define_once("_SENDREQUEST","Send anmodning");
define_once("_THANKSTOTAKETIME","Tak fordi du tog dig tid til at rate et site her hos");
define_once("_LETSDECIDE","Tilbagemeldinger fra brugere som dig selv, er med til at hjælpe andre besøgende med at vælge hvilke links, de skal klikke på.");
define_once("_RETURNTO","Tilbage til");
define_once("_RATENOTE1","Stem ikke på det samme mere end en gang.");
define_once("_RATENOTE2","Skalaen er 1 til 10, hvor 1 er det laveste og 10 det højeste.");
define_once("_RATENOTE3","Vær så objektiv som muligt i din stemmeafgivelse, hvis alle modtager 1 eller 10, kan ratings ikke bruges til noget.");
define_once("_RATENOTE4","Du kan se en liste med de <a href=\"modules.php?name=Web_Links&amp;l_op=TopRated\">bedst ratede links</a>.");
define_once("_RATENOTE5","Stem ikke på din egen side eller på et konkurrerende site.");
define_once("_YOUAREREGGED","Du er oprettet som bruger og er logget ind.");
define_once("_FEELFREE2ADD","Skriv en kommentar om denne side hvis du har lyst.");
define_once("_YOUARENOTREGGED","Du er ikke oprettet som bruger eller også er du ikke logget ind.");
define_once("_IFYOUWEREREG","Hvis du var oprettet som bruger kunne du komme med kommentarer på dette website.");
define_once("_WEBLINKS","Administration af Links");
define_once("_TITLE","Titel");
define_once("_MODIFY","Ændring");
define_once("_COMPLETEVOTE1","Tak for deres stemme!");
define_once("_COMPLETEVOTE2","De har allerede stemt på denne download indenfor $anonwaitdays dage");
define_once("_COMPLETEVOTE3","Stem kun en gang på en download.<br>Alle stemmer gemmes og gennemses.");
define_once("_COMPLETEVOTE4","De kan ikke stemme på et download de selv er kommet med.<br>Alle stemmer gemmes og gennemses.");
define_once("_COMPLETEVOTE5","Der er ingen stemme valgt - der bliver derfor ikke afgivet nogen stemme");
define_once("_COMPLETEVOTE6","Det er kun muligt at stemme en gang pr. IP adresse hver $outsidewaitdays dag(e).");
define_once("_LINKSDATESTRING","%d-%b-%Y");

