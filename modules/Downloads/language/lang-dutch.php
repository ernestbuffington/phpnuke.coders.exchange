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
define_once("_PREVIOUS","Vorige pagina");
define_once("_NEXT","Volgende pagina");
define_once("_CATEGORY","Categorie");
define_once("_CATEGORIES","Categorieën");
define_once("_LVOTES","Stemmen");
define_once("_TOTALVOTES","Totaal aantal stemmen:");
define_once("_THEREARE","Er zijn");
define_once("_NOMATCHES","Geen overeenkomsten gevonden");
define_once("_SCOMMENTS","Opmerkingen");
define_once("_UNKNOWN","Onbekend");
define_once("_DOWNLOADS","Downloads");
define_once("_AUTHORNAME","Auteursnaam");
define_once("_AUTHOREMAIL","Auteurs E-mailadres");
define_once("_DOWNLOADNAME","Programmanaam");
define_once("_ADDTHISFILE","dit bestand toevoegen");
define_once("_INBYTES","in bytes");
define_once("_FILESIZE","Bestandsgrootte");
define_once("_VERSION","Versie");
define_once("_DESCRIPTION","Beschrijving");
define_once("_AUTHOR","Auteur");
define_once("_HOMEPAGE","Homepagina");
define_once("_DOWNLOADNOW","Download bestand!");
define_once("_RATERESOURCE","Waarderingsbron");
define_once("_FILEURL","Bestandlink");
define_once("_ADDDOWNLOAD","Download toevoegen");
define_once("_DOWNLOADSMAIN","Downloads hoofd");
define_once("_DOWNLOADCOMMENTS","Download opmerkingen");
define_once("_DOWNLOADSMAINCAT","Downloads hoofdcategorieën");
define_once("_ADDADOWNLOAD","Nieuwe download toevoegen");
define_once("_DSUBMITONCE","Downloads slechts één maal inzenden.");
define_once("_DPOSTPENDING","Alle downloads worden geplaatst, wachtend op goedkeuring.");
define_once("_RESSORTED","Bronnen momenteel gesorteerd");
define_once("_DOWNLOADSNOTUSER1","U bent geen geregistreerde gebruiker of U bent niet ingelogd.");
define_once("_DOWNLOADSNOTUSER2","Alleen als u zich geregistreerd heeft, kunt U downloads inzenden.");
define_once("_DOWNLOADSNOTUSER3","Registratie duurt niet lang, en is zeker niet moeilijk!");
define_once("_DOWNLOADSNOTUSER4","Waarom moet u zich registreren voor toegang tot bepaalde delen van deze website?");
define_once("_DOWNLOADSNOTUSER5","Zodat wij de juistheid van deze inzendingen kunnen garanderen;");
define_once("_DOWNLOADSNOTUSER6","Elke inzending wordt bekeken en vervolgens goed- of afgekeurd.");
define_once("_DOWNLOADSNOTUSER7","Wij streven ernaar om alleen nuttige informatie aan te bieden.");
define_once("_DOWNLOADSNOTUSER8","<a href=\"modules.php?name=Your_Account\">Aanmelden voor een account</a>");
define_once("_DOWNLOADALREADYEXT","FOUT: Deze URL staat al in de databank!");
define_once("_DOWNLOADNOTITLE","FOUT: U moet een TITEL invoeren voor uw download!");
define_once("_DOWNLOADNOURL","FOUT: U moet een URL invoeren voor uw download!");
define_once("_DOWNLOADNODESC","FOUT: U moet een BESCHRIJVING invoeren voor uw download!");
define_once("_DOWNLOADRECEIVED","Wij hebben uw inzending (download) ontvangen. Dank u!");
define_once("_NEWDOWNLOADS","Nieuwe downloads");
define_once("_TOTALNEWDOWNLOADS","Totaal aantal nieuwe downloads");
define_once("_DTOTALFORLAST","Totaal nieuwe downloads sinds");
define_once("_DBESTRATED","Hoogst gewaardeerde downloads - Top");
define_once("_TRATEDDOWNLOADS","totaal aantal gewaardeerde downloads");
define_once("_SORTDOWNLOADSBY","Sorteer downloads op");
define_once("_DCATNEWTODAY","nieuwe downloads in deze categorie, vandaag toegevoegd");
define_once("_DCATLAST3DAYS","nieuwe downloads in deze categorie, in de laatste 3 dagen toegevoegd");
define_once("_DCATTHISWEEK","nieuwe downloads in deze categorie, deze week toegevoegd");
define_once("_DDATE1","Datum (Oudste downloads bovenaan)");
define_once("_DDATE2","Datum (Nieuwste downloads bovenaan)");
define_once("_DOWNLOADPROFILE","Download-profiel");
define_once("_DOWNLOADRATINGDET","Download waarderingsgegevens");
define_once("_EDITTHISDOWNLOAD","Bewerk deze download");
define_once("_DOWNLOADRATING","Downloadwaardering");
define_once("_DOWNLOADVOTE","Stem!");
define_once("_REQUESTDOWNLOADMOD","Download-modificatie verzoeken");
define_once("_DOWNLOADID","Download ID");
define_once("_DLETSDECIDE","Inbreng van u helpt andere bezoekers om te beslissen welke bestanden ze moeten downloaden.");
define_once("_DRATENOTE4","U kunt een lijst zien van de <a href=\"modules.php?name=Downloads&amp;d_op=TopRated\">Hoogst gewaardeerde downloads</a>.");
define_once("_DATE","Datum");
define_once("_TO","Aan");
define_once("_NEW","Nieuw");
define_once("_POPULAR","Populair");
define_once("_TOPRATED","Hoog(st) gewaardeerd");
define_once("_ADDITIONALDET","Extra details");
define_once("_EDITORREVIEW","Auteurs recentie");
define_once("_REPORTBROKEN","Ongeldige link rapporteren");
define_once("_AND","en");
define_once("_INDB","in onze databank");
define_once("_INSTRUCTIONS","Instructies");
define_once("_USERANDIP","Gebruikersnaam en IP-adres worden geregistreerd, misbruik het systeem a.u.b. niet.");
define_once("_LDESCRIPTION","Beschrijving (max. 255 karakters):");
define_once("_CHECKFORIT","U heeft geen E-mailadres opgegeven. U zult daarom geen plaatsingsbericht ontvangen.");
define_once("_LASTWEEK","Laatste week");
define_once("_LAST30DAYS","Laatste 30 dagen");
define_once("_1WEEK","1 week");
define_once("_2WEEKS","2 weken");
define_once("_30DAYS","30 dagen");
define_once("_SHOW","Geef weer");
define_once("_DAYS","dagen");
define_once("_ADDEDON","Toegevoegd op");
define_once("_RATING","Waardering");
define_once("_DETAILS","Details");
define_once("_OF","van");
define_once("_TVOTESREQ","minimum aantal stemmen nodig");
define_once("_SHOWTOP","Geef Top weer");
define_once("_MOSTPOPULAR","Populairste links - Top");
define_once("_OFALL","van alle");
define_once("_POPULARITY","Populariteit");
define_once("_SELECTPAGE","Selecteer pagina");
define_once("_MAIN","Hoofd");
define_once("_NEWTODAY","Nieuw vandaag");
define_once("_NEWLAST3DAYS","Nieuw laatste 3 dagen");
define_once("_NEWTHISWEEK","Nieuw deze week");
define_once("_POPULARITY1","Populariteit (minste hits bovenaan)");
define_once("_POPULARITY2","Populariteit (meeste hits bovenaan)");
define_once("_TITLEAZ","Titel (A t/m Z)");
define_once("_TITLEZA","Titel (Z t/m A)");
define_once("_RATING1","Waardering (Laagste score bovenaan)");
define_once("_RATING2","Waardering (Hoogste score bovenaan)");
define_once("_SEARCHRESULTS4","Zoek resultaten voor");
define_once("_USUBCATEGORIES","Subcategorieën");
define_once("_TRY2SEARCH","Probeer te zoeken");
define_once("_INOTHERSENGINES","met zoekmachines van anderen");
define_once("_EDITORIAL","Redactieartikel");
define_once("_EDITORIALBY","Redactieartikel door");
define_once("_NOEDITORIAL","Geen redactieartikel beschikbaar op dit moment voor deze website.");
define_once("_RATETHISSITE","Waardeer deze website");
define_once("_ISTHISYOURSITE","Is dit uw bron?");
define_once("_ALLOWTORATE","Laat andere gebruikers uw website een waardering geven!");
define_once("_OVERALLRATING","Algemene waardering");
define_once("_TOTALOF","Totaal van");
define_once("_USER","Gebruiker");
define_once("_USERAVGRATING","Gemiddelde waardering gebruikers");
define_once("_NUMRATINGS","Aantal waarderingen");
define_once("_REGISTEREDUSERS","Geregistreerde gebruikers");
define_once("_NUMBEROFRATINGS","Aantal waarderingen");
define_once("_NOREGUSERSVOTES","Geen ledenstemmen");
define_once("_BREAKDOWNBYVAL","Waarderingsanalyse bij waarde");
define_once("_LTOTALVOTES","Totaal aantal stemmen");
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
define_once("_HTMLCODE3","Dit formulier laat gebruikers een waardering geven van uw website, rechtstreeks vanaf uw site. De waardering wordt dan hier verwerkt. Knip en plak de volgende broncode in uw webpagina, voor een formulier als het bovenstaande:");
define_once("_PROMOTE05","Bedankt, en veel succes met uw website!");
define_once("_STAFF","Staf");
define_once("_THANKSBROKEN","Bedankt voor uw hulp bij het up to date houden van deze map.");
define_once("_SECURITYBROKEN","Uw gebruikersnaam en IP-adres worden tijdelijk genoteerd.");
define_once("_THANKSFORINFO","Bedankt voor de informatie.");
define_once("_LOOKTOREQUEST","Wij zullen uw verzoek zo spoedig mogelijk in behandeling nemen.");
define_once("_SENDREQUEST","Verzend verzoek");
define_once("_THANKSTOTAKETIME","Bedankt voor uw tijd");
define_once("_RETURNTO","Terug naar");
define_once("_RATENOTE1","U kunt maar één maal per dag op hetzelfde onderwerp stemmen.");
define_once("_RATENOTE2","De waardering loopt van 1 t/m 10, waarbij 1 staat voor zwak en 10 voor uitstekend.");
define_once("_RATENOTE3","Wees objectief bij het stemmen: als iedereen een 1 of een 10 geeft, dan zijn de waarderingen niet nuttig.");
define_once("_RATENOTE5","Stem niet op uw eigen website of die van een concurrent.");
define_once("_YOUAREREGGED","U bent een geregistreerde gebruiker en u bent ingelogd.");
define_once("_FEELFREE2ADD","U bent van harte welkom om opmerkingen over deze site te plaatsen.");
define_once("_YOUARENOTREGGED","U bent geen geregistreerde gebruiker of U bent niet ingelogd.");
define_once("_IFYOUWEREREG","Alleen als u een geregistreerd gebruiker bent, kunt u opmerkingen plaatsen over deze website.");
define_once("_TITLE","Titel");
define_once("_MODIFY","Wijzig");
define_once("_COMPLETEVOTE1","Bedankt voor het uitbrengen van uw stem.");
define_once("_COMPLETEVOTE2","U heeft reeds gestemd: wacht nog a.u.b. $anonwaitdays dag(en).");
define_once("_COMPLETEVOTE3","U kunt hiervoor maar eenmaal stemmen<br>Alle stemmen worden opgeslagen en bekeken.");
define_once("_COMPLETEVOTE4","U kunt niet stemmen op een link die uzelf heeft aangemeld.<br>Alle stemmen worden opgeslagen en bekeken.");
define_once("_COMPLETEVOTE5","Geen waardering geselecteerd - er is geen stem bijgeteld");
define_once("_COMPLETEVOTE6","Er is slechts 1 stem per IP-addres toegestaan elke $outsidewaitdays dag(en).");
define_once("_LINKSDATESTRING","%d-%b-%Y");


