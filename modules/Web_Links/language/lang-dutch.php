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
define_once("_PREVIOUS","Vorige pagina");
define_once("_NEXT","Volgende pagina");
define_once("_YOURNAME","Uw naam");
define_once("_CATEGORY","Categorie");
define_once("_CATEGORIES","Categorieën");
define_once("_LVOTES","Stemmen");
define_once("_TOTALVOTES","Totaal aantal stemmen:");
define_once("_LINKTITLE","Linktitel");
define_once("_HITS","Hits:");
define_once("_THEREARE","Er zijn");
define_once("_NOMATCHES","Geen overeenkomsten gevonden");
define_once("_SCOMMENTS","Opmerkingen");
define_once("_DESCRIPTION","Beschrijving");
define_once("_ONLYREGUSERSMODIFY","Alleen leden kunnen suggesties doen m.b.t. downloadwijzigingen. <a href=\"modules.php?name=Your_Account\">Registreren of inloggen</a> a.u.b.");
define_once("_DATE","Datum");
define_once("_TO","Aan");
define_once("_ADDLINK","Link toevoegen");
define_once("_NEW","Nieuw");
define_once("_POPULAR","Populair");
define_once("_TOPRATED","Hoog(st) gewaardeerd");
define_once("_RANDOM","Willekeurig");
define_once("_LINKSMAIN","Hoofdlinks");
define_once("_LINKCOMMENTS","Link opmerkingen");
define_once("_ADDITIONALDET","Extra details");
define_once("_EDITORREVIEW","Auteurs recentie");
define_once("_REPORTBROKEN","Ongeldige link rapporteren");
define_once("_LINKSMAINCAT","Hoofdlinks categorieën");
define_once("_AND","en");
define_once("_INDB","in onze databank");
define_once("_ADDALINK","Nieuwe link toevoegen");
define_once("_INSTRUCTIONS","Instructies");
define_once("_SUBMITONCE","Eén link maar één keer inzenden.");
define_once("_POSTPENDING","Alle links worden geplaatst, in afwachting van goedkeuring.");
define_once("_USERANDIP","Gebruikersnaam en IP-adres worden geregistreerd, misbruik het systeem a.u.b. niet.");
define_once("_PAGETITLE","Paginatitel");
define_once("_PAGEURL","Pagina URL");
define_once("_YOUREMAIL","Uw E-mailadres");
define_once("_LDESCRIPTION","Beschrijving (max. 255 karakters):");
define_once("_ADDURL","Deze URL toevoegen");
define_once("_LINKSNOTUSER1","U bent geen geregistreerde gebruiker of U bent niet ingelogd.");
define_once("_LINKSNOTUSER2","Als U lid bent, kunt U links op deze website toevoegen.");
define_once("_LINKSNOTUSER3","Registreren duurt niet lang, en is niet moeilijk.");
define_once("_LINKSNOTUSER4","Waarom moet U zich registreren om toegang te krijgen tot bepaalde gedeeltes van deze site?");
define_once("_LINKSNOTUSER5","Alleen dan kunnen wij garant staan voor de inhoud van de inzendingen.");
define_once("_LINKSNOTUSER6","Elke inzending worden bekeken en daarna goed- of afgekeurd.");
define_once("_LINKSNOTUSER7","Wij streven ernaar u alleen nuttige informatie aan te bieden.");
define_once("_LINKSNOTUSER8","<a href=\"modules.php?name=Your_Account\">Aanmelden voor een account</a>");
define_once("_LINKALREADYEXT","FOUT: Deze URL is reeds opgenomen in de databank!");
define_once("_LINKNOTITLE","FOUT: U moet een TITEL opgeven voor uw URL!");
define_once("_LINKNOURL","FOUT: U moet een URL opgeven voor uw URL!");
define_once("_LINKNODESC","FOUT: U moet een BESCHRIJVING opgeven voor uw URL!");
define_once("_LINKRECEIVED","Wij hebben uw link-inzending ontvangen. Bedankt!");
define_once("_EMAILWHENADD","U zult een E-mail ontvangen als deze inzending goedgekeurd wordt.");
define_once("_CHECKFORIT","U heeft geen E-mailadres opgegeven. U zult daarom geen plaatsingsbericht ontvangen.");
define_once("_NEWLINKS","Nieuwe links");
define_once("_TOTALNEWLINKS","Totaal aantal nieuwe links");
define_once("_LASTWEEK","Laatste week");
define_once("_LAST30DAYS","Laatste 30 dagen");
define_once("_1WEEK","1 week");
define_once("_2WEEKS","2 weken");
define_once("_30DAYS","30 dagen");
define_once("_SHOW","Geef weer");
define_once("_TOTALFORLAST","Totaal aantal nieuwe links van de laatste");
define_once("_DAYS","dagen");
define_once("_ADDEDON","Toegevoegd op");
define_once("_RATING","Waardering");
define_once("_RATESITE","Waardering van deze site");
define_once("_DETAILS","Details");
define_once("_BESTRATED","Hoog gewaardeerde links - Top");
define_once("_OF","van");
define_once("_TRATEDLINKS","totaal aantal gewaardeerde links");
define_once("_TVOTESREQ","minimum aantal stemmen nodig");
define_once("_SHOWTOP","Geef Top weer");
define_once("_MOSTPOPULAR","Populairste links - Top");
define_once("_OFALL","van alle");
define_once("_SORTLINKSBY","Sorteer links op");
define_once("_SITESSORTED","Sites nu gesorteerd op");
define_once("_POPULARITY","Populariteit");
define_once("_SELECTPAGE","Selecteer pagina");
define_once("_MAIN","Hoofd");
define_once("_NEWTODAY","Nieuw vandaag");
define_once("_NEWLAST3DAYS","Nieuw laatste 3 dagen");
define_once("_NEWTHISWEEK","Nieuw deze week");
define_once("_CATNEWTODAY","Nieuwe links in deze categorie, vandaag toegevoegd");
define_once("_CATLAST3DAYS","Nieuwe links in deze categorie, in de laatste 3 dagen toegevoegd");
define_once("_CATTHISWEEK","Nieuwe links in deze categorie, deze week toegevoegd");
define_once("_POPULARITY1","Populariteit (minste hits bovenaan)");
define_once("_POPULARITY2","Populariteit (meeste hits bovenaan)");
define_once("_TITLEAZ","Titel (A t/m Z)");
define_once("_TITLEZA","Titel (Z t/m A)");
define_once("_DATE1","Datum (Oudste link bovenaan)");
define_once("_DATE2","Datum (Nieuwste link bovenaan)");
define_once("_RATING1","Waardering (Laagste score bovenaan)");
define_once("_RATING2","Raardering (Hoogste score bovenaan)");
define_once("_SEARCHRESULTS4","Zoek resultaten voor");
define_once("_USUBCATEGORIES","Subcategorieën");
define_once("_LINKS","Links");
define_once("_TRY2SEARCH","Probeer te zoeken");
define_once("_INOTHERSENGINES","met zoekmachines van anderen");
define_once("_EDITORIAL","Redactieartikel");
define_once("_LINKPROFILE","Linkprofiel");
define_once("_EDITORIALBY","Redactieartikel door");
define_once("_NOEDITORIAL","Geen redactieartikel beschikbaar op dit moment voor deze website.");
define_once("_VISITTHISSITE","Bezoek deze website");
define_once("_RATETHISSITE","Waardeer deze website");
define_once("_ISTHISYOURSITE","Is dit uw bron?");
define_once("_ALLOWTORATE","Laat andere gebruikers uw website een waardering geven!");
define_once("_LINKRATINGDET","Linkwaardering details");
define_once("_OVERALLRATING","Algemene waardering");
define_once("_TOTALOF","Totaal van");
define_once("_USER","Gebruiker");
define_once("_USERAVGRATING","Gemiddelde waardering gebruikers");
define_once("_NUMRATINGS","Aantal waarderingen");
define_once("_EDITTHISLINK","Bewerk deze link");
define_once("_REGISTEREDUSERS","Geregistreerde gebruikers");
define_once("_NUMBEROFRATINGS","Aantal waarderingen");
define_once("_NOREGUSERSVOTES","Geen ledenstemmen");
define_once("_BREAKDOWNBYVAL","Waarderingsanalyse bij waarde");
define_once("_LTOTALVOTES","Totaal aantal stemmen");
define_once("_LINKRATING","Linkwaardering");
define_once("_HIGHRATING","Hoge waardering");
define_once("_LOWRATING","Lage waardering");
define_once("_NUMOFCOMMENTS","Aantal opmerkingen");
define_once("_WEIGHNOTE","* Noot: deze pagina vergelijkt niet-ledenwaarderingen met ledenwaarderingen");
define_once("_NOUNREGUSERSVOTES","Geen niet-ledenstemmen");
define_once("_WEIGHOUTNOTE","* Noot: deze pagina vergelijkt ledenstemmen met niet-ledenstemmen");
define_once("_NOOUTSIDEVOTES","Geen niet-ledenstemmen");
define_once("_OUTSIDEVOTERS","Niet-ledenstemmen");
define_once("_UNREGISTEREDUSERS","Niet-leden");
define_once("_PROMOTEYOURSITE","Promoot uw website");
define_once("_PROMOTE01","Bent u geïnteresseerd in een aantal van de Waardeer een website-opties die wij kunnen bieden? Met deze opties kunt u een afbeelding of een formulier op uw website plaatsen, om zo het aantal stemmen te verhogen. Kies uit de onderstaande opties:");
define_once("_TEXTLINK","Tekstlink");
define_once("_PROMOTE02","Een manier om te linken naar het waarderingsformulier is met een eenvoudige tekstlink:");
define_once("_HTMLCODE1","De HTML-code die u gebruikt in dit geval is als volgt:");
define_once("_THENUMBER","Het cijfer");
define_once("_IDREFER","in de HTML-broncode refereert naar het ID-nummer in de $sitename databank. Zorg er dus voor dat dit nummer aanwezig is.");
define_once("_BUTTONLINK","Knop-link");
define_once("_PROMOTE03","Iets meer dan een gewonen tekstlink is de knop-link:");
define_once("_RATEIT","Stem op deze site!");
define_once("_HTMLCODE2","De broncode voor de bovenstaande knop is:");
define_once("_REMOTEFORM","Verwijder het waarderingsformulier");
define_once("_PROMOTE04","Het huidige waarderingsformulier ziet er zo uit.");
define_once("_VOTE4THISSITE","Stem op deze site!");
define_once("_LINKVOTE","Stem!");
define_once("_HTMLCODE3","Dit formulier laat gebruikers een waardering geven van uw website, rechtstreeks vanaf uw site. De waardering wordt dan hier verwerkt. Knip en plak de volgende broncode in uw webpagina, voor een formulier als het bovenstaande:");
define_once("_PROMOTE05","Bedankt, en veel succes met uw website!");
define_once("_STAFF","Staf");
define_once("_THANKSBROKEN","Bedankt voor uw hulp bij het up to date houden van deze map.");
define_once("_THANKSFORINFO","Bedankt voor de informatie.");
define_once("_LOOKTOREQUEST","Wij zullen uw verzoek zo spoedig mogelijk in behandeling nemen.");
define_once("_REQUESTLINKMOD","Verzoek om linkwijziging");
define_once("_LINKID","Link ID");
define_once("_SENDREQUEST","Verzend verzoek");
define_once("_THANKSTOTAKETIME","Bedankt voor uw tijd.");
define_once("_LETSDECIDE","Inbreng van u helpt andere bezoekers om te beslissen welke links ze moeten bezoeken.");
define_once("_RETURNTO","Terug naar");
define_once("_RATENOTE1","U kunt maar een maal per dag op hetzelfde onderwerp stemmen.");
define_once("_RATENOTE2","De waardering loopt van 1 t/m 10, waarbij 1 staat voor zwak en 10 voor uitstekend.");
define_once("_RATENOTE3","Wees objectief bij het stemmen: als iedereen een 1 of een 10 geeft, dan zijn de waarderingen niet nuttig.");
define_once("_RATENOTE4","U kunt een lijst zien van de <a href=\"modules.php?name=Web_Links&amp;l_op=TopRated\">Hoogst gewaardeerde websites</a>.");
define_once("_RATENOTE5","Stem niet op uw eigen website of die van een concurrent.");
define_once("_YOUAREREGGED","U bent een geregistreerde gebruiker en u bent ingelogd.");
define_once("_FEELFREE2ADD","U bent van harte welkom om opmerkingen over deze site te plaatsen.");
define_once("_YOUARENOTREGGED","U bent geen geregistreerde gebruiker of U bent niet ingelogd.");
define_once("_IFYOUWEREREG","Alleen als u een geregistreerd gebruiker bent, kunt u opmerkingen plaatsen over deze website.");
define_once("_WEBLINKS","Weblinks");
define_once("_TITLE","Titel");
define_once("_MODIFY","Wijzig");
define_once("_COMPLETEVOTE1","Bedankt voor het uitbrengen van uw stem.");
define_once("_COMPLETEVOTE2","U heeft reeds gestemd: wacht nog a.u.b. $anonwaitdays dag(en).");
define_once("_COMPLETEVOTE3","U kunt hiervoor maar eenmaal stemmen<br>Alle stemmen worden opgeslagen en bekeken.");
define_once("_COMPLETEVOTE4","U kunt niet stemmen op een link die uzelf heeft aangemeld.<br>Alle stemmen worden opgeslagen en bekeken.");
define_once("_COMPLETEVOTE5","Geen waardering geselecteerd - er is geen stem bijgeteld");
define_once("_COMPLETEVOTE6","Er is slechts 1 stem per IP-addres toegestaan elke $outsidewaitdays dag(en).");
define_once("_LINKSDATESTRING","%d-%b-%Y");


