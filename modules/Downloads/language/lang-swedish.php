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
define_once("_PREVIOUS","Föregående Sida");
define_once("_NEXT","Nästa Sida");
define_once("_CATEGORY","Kategori");
define_once("_CATEGORIES","Kategorier");
define_once("_LVOTES","röster");
define_once("_TOTALVOTES","Totalt antal röster:");
define_once("_THEREARE","Det finns");
define_once("_NOMATCHES","Inga träffar hittades på din fråga");
define_once("_SCOMMENTS","Kommentarer");
define_once("_UNKNOWN","Okänt");
define_once("_DOWNLOADS","nedladdningar");
define_once("_AUTHORNAME","Författarens Namn");
define_once("_AUTHOREMAIL","Författarens E-postadress");
define_once("_DOWNLOADNAME","Programnamn");
define_once("_ADDTHISFILE","Lägg till denna fil");
define_once("_INBYTES","i bytes");
define_once("_FILESIZE","Filestorlek");
define_once("_VERSION","Version");
define_once("_DESCRIPTION","Beskrivning");
define_once("_AUTHOR","Författare");
define_once("_HOMEPAGE","Hemsida");
define_once("_DOWNLOADNOW","Ladda ner denna fil nu!");
define_once("_RATERESOURCE","Betygsätt");
define_once("_FILEURL","Fillänk");
define_once("_ADDDOWNLOAD","Lägg till Nedladdning");
define_once("_DOWNLOADSMAIN","Nedladdningsindex");
define_once("_DOWNLOADCOMMENTS","Nedladdningskommentarer");
define_once("_DOWNLOADSMAINCAT","Nedladdningsavdelningens Huvudkategorier");
define_once("_ADDADOWNLOAD","Lägg till en Ny Nedladdning");
define_once("_DSUBMITONCE","Lägg bara till en unik nedladdning endast en gång.");
define_once("_DPOSTPENDING","Alla nedladdningar sparas i databasen i väntan på verifiering.");
define_once("_RESSORTED","Resurser sorteras för närvarande på");
define_once("_DOWNLOADSNOTUSER1","Du är inte en registrerad medlem eller så har du inte loggat in.");
define_once("_DOWNLOADSNOTUSER2","Om du var registrerad medlem så kunde du lägga till filer för nedladdning på denna webbplats.");
define_once("_DOWNLOADSNOTUSER3","Att bli medlem är en lätt och snabb process.");
define_once("_DOWNLOADSNOTUSER4","Varför kräver vi registrering för vissa funktioner?");
define_once("_DOWNLOADSNOTUSER5","Så vi kan ge dig högsta möjliga kvalitet på innehållet,");
define_once("_DOWNLOADSNOTUSER6","varje detalj kontrolleras individuellt av vår personal.");
define_once("_DOWNLOADSNOTUSER7","Vi hoppas kunna erbjuda dig bara värdefull information.");
define_once("_DOWNLOADSNOTUSER8","<a href=\"modules.php?name=Your_Account\">Registrera dig som medlem</a>");
define_once("_DOWNLOADALREADYEXT","FEL: Denna URL är redan listad i databasen!");
define_once("_DOWNLOADNOTITLE","FEL: Du måste skriva en TITEL för din URL!");
define_once("_DOWNLOADNOURL","FEL: Du måste ange en URL för din URL!");
define_once("_DOWNLOADNODESC","FEL: Du måste ange en BESKRIVNING för din URL!");
define_once("_DOWNLOADRECEIVED","Vi har emottagit ditt förslag på Nedladdning. Tack!");
define_once("_NEWDOWNLOADS","Nya Nedladdningar");
define_once("_TOTALNEWDOWNLOADS","Totalt Antal Nya Nedladdningar");
define_once("_DTOTALFORLAST","Totalt Antal Nya Nedladdning för de senaste");
define_once("_DBESTRATED","Högst Betygsatta Nedladdningar - Topp");
define_once("_TRATEDDOWNLOADS","totalt antal betygsatta nedladdningar");
define_once("_SORTDOWNLOADSBY","Sortera Nedladdningar baserat på");
define_once("_DCATNEWTODAY","Dagens Nya Nedladdningar i den här kategorin");
define_once("_DCATLAST3DAYS","De senaste 3 dagarnas Nya Nedladdningar i den här kategorin");
define_once("_DCATTHISWEEK","Den här veckans Nya Nedladdningar i den här kategorin");
define_once("_DDATE1","Datum (Gamla Nedladdningar visas först)");
define_once("_DDATE2","Datum (Nya Nedladdningar visas först)");
define_once("_DOWNLOADPROFILE","Nedladdningsprofil");
define_once("_DOWNLOADRATINGDET","Betygssättningsdetaljer");
define_once("_EDITTHISDOWNLOAD","Redigera denna nedladdning");
define_once("_DOWNLOADRATING","Betygssättning");
define_once("_DOWNLOADVOTE","Rösta!");
define_once("_REQUESTDOWNLOADMOD","Begär Modifiering av Nedladdning");
define_once("_DOWNLOADID","Nedladdnings ID");
define_once("_DLETSDECIDE","Åsikter från användare som dig själv kommer att hjälpa andra besökare att bättre välja vilka nedladdningar som är värda att ta hänsyn till.");
define_once("_DRATENOTE4","Du kan se en lista av de <a href=\"modules.php?name=Downloads&amp;d_op=TopRated\">högst betygsatta resurserna</a>.");
define_once("_DATE","Datum");
define_once("_TO","Till");
define_once("_NEW","Ny");
define_once("_POPULAR","Populär");
define_once("_TOPRATED","Högsta Betyg");
define_once("_ADDITIONALDET","Ytterligare detaljer");
define_once("_EDITORREVIEW","Recension av Redaktör");
define_once("_REPORTBROKEN","Rapportera Bruten Länk");
define_once("_AND","och");
define_once("_INDB","i vår databas");
define_once("_INSTRUCTIONS","Instruktioner");
define_once("_USERANDIP","Användarnamn och IP sparas, så missbruka ej systemet.");
define_once("_LDESCRIPTION","Beskrivning: (Max 255 tecken)");
define_once("_CHECKFORIT","Du skrev ingen E-postadress. Nåja, vi kollar din länk inom kort.");
define_once("_LASTWEEK","Senaste veckan");
define_once("_LAST30DAYS","Senaste 30 dagarna");
define_once("_1WEEK","1 vecka");
define_once("_2WEEKS","2 veckor");
define_once("_30DAYS","30 dagar");
define_once("_SHOW","Visa");
define_once("_DAYS","dagarna");
define_once("_ADDEDON","Tillagd");
define_once("_RATING","Betyg");
define_once("_DETAILS","Detaljer");
define_once("_OF","av");
define_once("_TVOTESREQ","minst antal röster som krävs");
define_once("_SHOWTOP","Visa Topp");
define_once("_MOSTPOPULAR","Mest Populära");
define_once("_OFALL","av alla");
define_once("_POPULARITY","Populäritet");
define_once("_SELECTPAGE","Välj Sida");
define_once("_MAIN","Huvudsida");
define_once("_NEWTODAY","Nya Idag");
define_once("_NEWLAST3DAYS","Nya de senaste 3 dagarna");
define_once("_NEWTHISWEEK","Nya denna vecka");
define_once("_POPULARITY1","Populäritet (Minst till Mest träffar)");
define_once("_POPULARITY2","Populäritet (Mest till Minst träffar)");
define_once("_TITLEAZ","Titel (A till Ö)");
define_once("_TITLEZA","Titel (Ö till A)");
define_once("_RATING1","Betyg (Lägst till Högst)");
define_once("_RATING2","Betyg (Högst till Lägst)");
define_once("_SEARCHRESULTS4","Sökresultat för");
define_once("_USUBCATEGORIES","Underkategorier");
define_once("_TRY2SEARCH","Försök att söka");
define_once("_INOTHERSENGINES","i andra sökmotorer");
define_once("_EDITORIAL","Recension");
define_once("_EDITORIALBY","Recension av");
define_once("_NOEDITORIAL","Ingen recension är tillgänglig för denna webbplats.");
define_once("_RATETHISSITE","Betygssätt denna webbplats");
define_once("_ISTHISYOURSITE","Är detta din webbplats?");
define_once("_ALLOWTORATE","Tillåt andra besökare att betygssätta den från din webbplats!");
define_once("_OVERALLRATING","Genomsnittligt betyg");
define_once("_TOTALOF","Totalt");
define_once("_USER","Medlemmar");
define_once("_USERAVGRATING","Medlemmars Genomsnittsbetyg");
define_once("_NUMRATINGS","# av Betygs");
define_once("_REGISTEREDUSERS","Medlemmar");
define_once("_NUMBEROFRATINGS","Antal betyg");
define_once("_NOREGUSERSVOTES","Inga medlemmar har röstat");
define_once("_BREAKDOWNBYVAL","Fördelning av betyg baserat på värde");
define_once("_LTOTALVOTES","totalt antal röster");
define_once("_HIGHRATING","Högsta betyg");
define_once("_LOWRATING","Lägsta betyg");
define_once("_NUMOFCOMMENTS","Antal kommentarer");
define_once("_WEIGHNOTE","* Obs: Denna webbplats väger medlemmars betyg gentemot icke-medlemmars betyg");
define_once("_NOUNREGUSERSVOTES","Inga icke-medlemmar har röstat");
define_once("_WEIGHOUTNOTE","* Obs: Denna webbplats väger medlemmars betyg genotemot betyg från andra webbplatser");
define_once("_NOOUTSIDEVOTES","Inga betyg från andra webbplatser");
define_once("_OUTSIDEVOTERS","Betyg från andra webbplatser");
define_once("_UNREGISTEREDUSERS","Icke registerade medlemmar");
define_once("_PROMOTEYOURSITE","Marknadsför Din Webbplats");
define_once("_PROMOTE01","Du kanske kan vara intresserad av de olika 'Betygsättningsmöjligheter' vi har att tillgå. Dessa tillåter dig ett lägga en bild (eller till och med ett betygsformulär) på din webbplats för att öka antalet betygssättningar på din egen webbplats. Välj en av möjligheterna nedan:");
define_once("_TEXTLINK","Textlänk");
define_once("_PROMOTE02","Ett sätt att länka till betygsformuläret är genom en enkel textlänk:");
define_once("_HTMLCODE1","HTML koden du bör använda i dett fall är följande:");
define_once("_THENUMBER","Numret");
define_once("_IDREFER","i HTML koden refererar till din webbplats ID nummer i $sitename databas. Se till att detta nummer finns med.");
define_once("_BUTTONLINK","Knapplänk");
define_once("_PROMOTE03","Om du vill ha lite mer än en vanlig textlänk, så kanske du vill ha en liten knapp som länk istället:");
define_once("_RATEIT","Betygssätt denna webbplats!");
define_once("_HTMLCODE2","HTML koden för ovanstående knapp är:");
define_once("_REMOTEFORM","Betygsformulär");
define_once("_PROMOTE04","Om du fuskar med denna så tar vi bort din länk. Genom att ha sagt detta så är det så här formuläret ser ut.");
define_once("_VOTE4THISSITE","Betygssätt denna webbplats!");
define_once("_HTMLCODE3","Genom att använda detta formulär så tillåter du dina besökare att direkt från din webbplats betygssätta och få betyget direkt applicerat här. Ovanstående formulär är 'avstängt', men följande HTML kod kommer att fungera om du bara klipper ut och klistrar in det på dinn webbsida. HTML koden visas nedan:");
define_once("_PROMOTE05","Tack! och lycka till med dina betyg!");
define_once("_STAFF","Staff");
define_once("_THANKSBROKEN","Tack för att du hjälper till att bibehålla detta länkbiblioteks integritet.");
define_once("_SECURITYBROKEN","Av säkerhetsskäl så sparas ditt användarnamn och IP-adress temporärt.");
define_once("_THANKSFORINFO","Tack för informationen.");
define_once("_LOOKTOREQUEST","Vi tar en titt på din begäran inom kort.");
define_once("_SENDREQUEST","Skicka Begäran");
define_once("_THANKSTOTAKETIME","Tack för att du tog dig tid att betygssätta en webbplats här på");
define_once("_RETURNTO","Återvänd till");
define_once("_RATENOTE1","Betygssätt inte samma plats mer än en gång så är du snäll.");
define_once("_RATENOTE2","Skalan löper från 1 till 10, där 1 är dålig och 10 är superb.");
define_once("_RATENOTE3","Var gärna objektiv i din bedöming, om alla får en 1:a eller en 10:a så är inte betygen så särdeles nödvändiga");
define_once("_RATENOTE5","Betygssätt inte din egen eller en motståndares webbplats.");
define_once("_YOUAREREGGED","Du är medlem och är inloggad.");
define_once("_FEELFREE2ADD","Kommentera gärna denna webbplats.");
define_once("_YOUARENOTREGGED","Du är inte medlem eller är inte inloggad.");
define_once("_IFYOUWEREREG","Om du var medlem så skulle du kunna kommentera denna webbplats.");
define_once("_TITLE","Titel");
define_once("_MODIFY","Modifiera");
define_once("_COMPLETEVOTE1","Your vote is appreciated.");
define_once("_COMPLETEVOTE2","You have already voted for this resource in the past $anonwaitdays day(s).");
define_once("_COMPLETEVOTE3","Vote for a resource only once.<br>All votes are logged and reviewed.");
define_once("_COMPLETEVOTE4","You cannot vote on a link you submitted.<br>All votes are logged and reviewed.");
define_once("_COMPLETEVOTE5","No rating selected - no vote tallied");
define_once("_COMPLETEVOTE6","Only one vote per IP address allowed every $outsidewaitdays day(s).");
define_once("_LINKSDATESTRING","%d-%b-%Y");

