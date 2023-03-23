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


define_once("_PREVIOUS","Vorherige Seite");
define_once("_NEXT","N&auml;chste Seite");
define_once("_YOURNAME","Dein Name");
define_once("_CATEGORY","Bereich");


define_once("_CATEGORIES","Themen- Bereiche");
define_once("_LVOTES","Stimmen");
define_once("_TOTALVOTES","gesamte Stimmen:");
define_once("_LINKTITLE","Linkbezeichnung");
define_once("_HITS","Hits");

define_once("_THEREARE","Es gibt");
define_once("_NOMATCHES","Keine Treffer f&uuml;r diese Anfrage gefunden");
define_once("_SCOMMENTS","Kommentare");
define_once("_DESCRIPTION","Beschreibung");
define_once("_ONLYREGUSERSMODIFY","Nur registrierte Mitglieder k&ouml;nnen Download&auml;nderungen vorschlagen. Bitte <a href=\"modules.php?name=Your_Account\">registrieren oder einloggen</a>.");
define_once("_DATE","Datum");
define_once("_TO","zu");
define_once("_ADDLINK","Link melden");
define_once("_NEW","Neu");
define_once("_POPULAR","Beliebt");
define_once("_TOPRATED","Topbewertet");
define_once("_RANDOM","Zufall");
define_once("_LINKSMAIN","Link- Kategorien");
define_once("_LINKCOMMENTS","Link- Kommentare");
define_once("_ADDITIONALDET","Weitere Details");
define_once("_EDITORREVIEW","Editor- Bewertung");
define_once("_REPORTBROKEN","Fehlerhaften Link melden");
define_once("_LINKSMAINCAT","Links- Hauptkategorien");
define_once("_AND","und");
define_once("_INDB","in unserer Datenbank");
define_once("_ADDALINK","Einen neuen Link hinzuf&uuml;gen");
define_once("_INSTRUCTIONS","Anleitung");
define_once("_SUBMITONCE","Bitte den gleichen Link nur einmal melden.");
define_once("_POSTPENDING","Alle vorgeschlagenen Links werden von unserem Team vor der Freigabe &uuml;berpr&uuml;ft.");
define_once("_USERANDIP","Username und IP werden gespeichert, bitte missbrauchen Sie unser System nicht.");
define_once("_PAGETITLE","Seitentitel");
define_once("_PAGEURL","Seitenadresse- URL");
define_once("_YOUREMAIL","eMailadresse");
define_once("_LDESCRIPTION","Beschreibung: (maximal 255 Zeichen)");
define_once("_ADDURL","URL einf&uuml;gen");
define_once("_LINKSNOTUSER1","Sie sind kein registrierter Benutzer oder haben Sich nicht eingeloggt.");
define_once("_LINKSNOTUSER2","Wenn Sie registriert sind, k&ouml;nnen Sie neue Links auf unserer Seite hinzuf&uuml;gen.");
define_once("_LINKSNOTUSER3","Mitglied zu werden ist ein einfacher und schneller Vorgang.");
define_once("_LINKSNOTUSER4","Warum ben&ouml;tigen wir Ihre Registration, um Ihnen bestimmte Sachen freizuschalten?");
define_once("_LINKSNOTUSER5","Nur so k&ouml;nnen wir Ihnen den hohen Qualit&auml;tsstandard anbieten,");
define_once("_LINKSNOTUSER6","alles wird hier individuell begutachtet und erst dann freigeschaltet.");
define_once("_LINKSNOTUSER7","Wir hoffen, Ihnen informationsreiche Webseiten zur Verf&uuml;gung stellen zu k&ouml;nnen.");
define_once("_LINKSNOTUSER8","<a href=\"modules.php?name=Your_Account\">Mitglied werden</a>");
define_once("_LINKALREADYEXT","FEHLER: Diese URL befindet sich bereits in der Datenbank!");
define_once("_LINKNOTITLE","FEHLER: Sie m&uuml;ssen Ihrer Homepage einen Namen geben!");
define_once("_LINKNOURL","FEHLER: Sie m&uuml;ssem f&uuml;r Ihre Homepge eine Adresse angeben!");
define_once("_LINKNODESC","FEHLER: F&uuml;r Ihre Homepage fehlt die Beschreibung!");
define_once("_LINKRECEIVED","Wir haben Ihren Linkvorschlag erhalten. Vielen Dank!");
define_once("_EMAILWHENADD","Sie werden eine eMail erhalten, sobald Ihr Vorschlag freigeschaltet wurde.");
define_once("_CHECKFORIT","Sie brauchen uns keine eMail zu schreiben. Wir werden Ihren Vorschlag baldm&ouml;glichst &uuml;berpr&uuml;fen.");
define_once("_NEWLINKS","Neue Links");
define_once("_TOTALNEWLINKS","Ingesamt neue Links");
define_once("_LASTWEEK","Letzte Woche");
define_once("_LAST30DAYS","Letzte 30 Tage");
define_once("_1WEEK","1 Woche");
define_once("_2WEEKS","2 Wochen");
define_once("_30DAYS","30 Tage");
define_once("_SHOW","Zeigen");
define_once("_TOTALFORLAST","Insgesamt neue Links seit");
define_once("_DAYS","Tagen");
define_once("_ADDEDON","Eingetragen am");


define_once("_RATING","Bewertung");
define_once("_RATESITE","Bewerte dieser Seite");
define_once("_DETAILS","Details");
define_once("_BESTRATED","Bestbewerteste Seiten");
define_once("_OF","von");
define_once("_TRATEDLINKS","insgesamt bewerteten Links");
define_once("_TVOTESREQ","Minimal notwendige Stimmen");
define_once("_SHOWTOP","Zeige Top");
define_once("_MOSTPOPULAR","Beliebteste");
define_once("_OFALL","von allen");
define_once("_SORTLINKSBY","Sortiere Links nach");
define_once("_SITESSORTED","Seiten sind aktuell sortiert nach");
define_once("_POPULARITY","Beliebtheit");
define_once("_SELECTPAGE","Seite ausw&auml;hlen");
define_once("_MAIN","Start");
define_once("_NEWTODAY","Heute neu");
define_once("_NEWLAST3DAYS","In den letzten 3 Tagen neu");
define_once("_NEWTHISWEEK","Diese Woche neu");
define_once("_CATNEWTODAY","Heutige neue Links in diesem Bereich");
define_once("_CATLAST3DAYS","In den letzten 3 Tagen neue Links in diesem Bereich");
define_once("_CATTHISWEEK","In der letzten Woche in diesem Bereich neu eingef&uuml;gte Links");
define_once("_POPULARITY1","Beliebtheit (unbeliebteste oben)");
define_once("_POPULARITY2","Beliebtheit (beliebteste oben)");
define_once("_TITLEAZ","Name (A nach Z)");
define_once("_TITLEZA","Name (Z nach A)");
define_once("_DATE1","Datum (erst alte Links)");
define_once("_DATE2","Datum (erst neue Links)");
define_once("_RATING1","Bewertung (erst schlechtbewertete)");
define_once("_RATING2","Bewertung (erst gutbewertete)");
define_once("_SEARCHRESULTS4","Suche Ergebnisse f&uuml;r");
define_once("_USUBCATEGORIES","Unterkategorien");
define_once("_LINKS","Links");
define_once("_TRY2SEARCH","Versuche die Suche");
define_once("_INOTHERSENGINES","in anderen Suchmaschinen");
define_once("_EDITORIAL","Einleitung");
define_once("_LINKPROFILE","Linkprofile");
define_once("_EDITORIALBY","Einleitung von");
define_once("_NOEDITORIAL","F&uuml;r diese Webseite ist bisher kein Editorial verf&uuml;gbar");
define_once("_VISITTHISSITE","Website besuchen");
define_once("_RATETHISSITE","Bewerten");
define_once("_ISTHISYOURSITE","Ist es von Dir?");
define_once("_ALLOWTORATE","Erm&ouml;gliche Deinen Besuchern das Bewerten Deiner Seite!");
define_once("_LINKRATINGDET","Linkbewertungs- Details");
define_once("_OVERALLRATING","Ingesamt bewertet");
define_once("_TOTALOF","von insgesamt");
define_once("_USER","Leuten");
define_once("_USERAVGRATING","Durchschnittliche Bewertung");
define_once("_NUMRATINGS","# der Stimmen");
define_once("_EDITTHISLINK","Diesen Link &auml;ndern");
define_once("_REGISTEREDUSERS","Registrierte Nutzer");
define_once("_NUMBEROFRATINGS","Zahl der Stimmen");
define_once("_NOREGUSERSVOTES","Keine Stimmen von Mitgliedern");
define_once("_BREAKDOWNBYVAL","Breakdown der Stimmen");
define_once("_LTOTALVOTES","Stimmen- insgesamt");
define_once("_LINKRATING","Linkbewertung");
define_once("_HIGHRATING","H&ouml;chste Bewertung");
define_once("_LOWRATING","Niedrigste Bewertung");
define_once("_NUMOFCOMMENTS","Kommentaranzahl");
define_once("_WEIGHNOTE","* Achtung: Diese Seite bewertet Stimmen von registrierten und unregistrierten Usern im Verh&auml;ltnis");
define_once("_NOUNREGUSERSVOTES","Keine Stimmen von unregistrierten Teilnehmern");
define_once("_WEIGHOUTNOTE","* Achtung: Diese Seite bewertet interne zu externen Stimmen im Verh&auml;ltnis");
define_once("_NOOUTSIDEVOTES","Keine Abstimmenden von Extern");
define_once("_OUTSIDEVOTERS","Extern abstimmenende");
define_once("_UNREGISTEREDUSERS","Unregistrierte Teilnehmer");
define_once("_PROMOTEYOURSITE","Bewerben Sie ihre Webseite");
define_once("_PROMOTE01","Vielleicht sind Sie ja an verschiedenen 'Bewerten Sie meine Webseite'- Boxen interessiert, die wir anbieten? Diese erlauben Dir das platzieren eines Bildes (oder eines Abstimmformulars) direkt auf Deiner Webseite, um die Anzahl der Stimmen, die Deine Webseite hier bekommt, zu erh&ouml;hen. Bitte w&auml;hlen Sie aus einer der unten gegebenen M&ouml;glichkeiten eine f&uuml;r Ihre Webseite passende aus:");
define_once("_TEXTLINK","Textlink");
define_once("_PROMOTE02","Eine M&ouml;glichkeit, Bewertungen in unserem System von Ihrer Webseite zu erhalten, ist ein Textlink:");
define_once("_HTMLCODE1","Folgenden HTML- Code sollten Sie in diesem Fall auf Ihrer Webseite einf&uuml;gen:");
define_once("_THENUMBER","Die Zahl");
define_once("_IDREFER","im Code entspricht Ihrer Seiten- ID in der $sitename- Datenbank. Bitte achten Sie darauf, dass diese Nummer angegeben ist.");
define_once("_BUTTONLINK","Buttonlink");
define_once("_PROMOTE03","Falls Ihnen der Sinn nach etwas mehr als einem Textlink steht, ist es vielleicht ein Buttonlink, den Sie gerne m&ouml;chten:");
define_once("_RATEIT","Bewerten Sie diese Seite!");
define_once("_HTMLCODE2","Folgenden HTML- Code m&uuml;ssen Sie f&uuml;r den Button auf Ihrer Seite einf&uuml;gen:");
define_once("_REMOTEFORM","Externe Abstimmbox");
define_once("_PROMOTE04","Falls Sie zu betr&uuml;gen versuchen, werden wir Ihren Link f&uuml;r immer von unserer Seite entfernen. Nachdem wir dieses gesagt haben- so k&ouml;nnte diese Box auf Ihrer Seite aussehen:");
define_once("_VOTE4THISSITE","Bewerten Sie diese Seite!");
define_once("_LINKVOTE","Abstimmen!");
define_once("_HTMLCODE3","Die Benutzung dieses Formulars erlaubt es Ihren Besuchern, direkt von Ihrer Seite aus abzustimmen. Wir erhalten diese Bewertung und f&uuml;gen sie in unsere Datenbank ein. Das obige Beispiel ist deaktiviert, aber auf Ihrer Seite wird es funktionieren, wenn Sie den HTML- Code genau so dort einf&uuml;gen. Hier nun der HTML- Code:");
define_once("_PROMOTE05","Vielen Dank! Und viel Erfolg bei der Linkbewertung!");
define_once("_STAFF","Die Mitarbeiter");
define_once("_THANKSBROKEN","Vielen Dank f&uuml;r Ihre Hilfe bei der Steigerung der Benutzbarkeit dieses Indexes.");
define_once("_THANKSFORINFO","Vielen Dank f&uuml;r diese Information.");
define_once("_LOOKTOREQUEST","Wir werden uns Ihren Vorschlag baldm&ouml;glichst ansehen.");
define_once("_REQUESTLINKMOD","Link&auml;nderungs- Vorschlag");
define_once("_LINKID","Link ID");
define_once("_SENDREQUEST","Vorschlag senden");
define_once("_THANKSTOTAKETIME","Vielen Dank f&uuml;r die Zeit, die Sie zum Bewerten einer Webseite hier bei uns aufgebracht haben");
define_once("_LETSDECIDE","Eingaben von Teilnehmern wie Ihnen hilft anderen Teilnehmern bei der Entscheidung, welche Links diese anklicken sollten.");
define_once("_RETURNTO","Zur&uuml;ck nach");
define_once("_RATENOTE1","Bitte stimmen Sie &uuml;ber einen Link nicht mehrmals ab.");
define_once("_RATENOTE2","Die Skala reicht von 1 - 10, wobei 1 die schlechteste und 10 die beste Bewertung ist.");
define_once("_RATENOTE3","Bitte seien Sie objektiv beim Abstimmen. Wenn jeder mit 1 oder 10 abstimmt, sind die Ergebnisse nicht sonderlich aussagekr&auml;ftig.");
define_once("_RATENOTE4","Sie k&ouml;nnen sich eine &Uuml;bersicht der <a href=\"modules.php?name=Web_Links&amp;l_op=TopRated\">bestbewerteten Seiten</a> anzeigen lassen.");
define_once("_RATENOTE5","Bitte bewerten Sie nicht Ihre eigene oder die Seite eines direkten Konkurenten, Sie w&auml;rst ohnehin nicht objektiv.");
define_once("_YOUAREREGGED","Sie sind registriert und angemeldet.");
define_once("_FEELFREE2ADD","Sind Sie so frei und geben Sie einen Kommentar ein.");
define_once("_YOUARENOTREGGED","Sie sind kein registriertes Mitglied oder aber nicht eingeloggt.");
define_once("_IFYOUWEREREG","Wenn Sie registriert sind, k&ouml;nnen Sie auf dieser Seite Kommentare eingeben.");
define_once("_WEBLINKS","Links");
define_once("_TITLE","Titel");
define_once("_MODIFY","Modifizieren");
define_once("_COMPLETEVOTE1","Ihre Abstimmung wird gesch&auml;tzt.");
define_once("_COMPLETEVOTE2","Sie haben in den letzten $anonwaitdays Tagen schon einmal eine Stimme abgegeben.");
define_once("_COMPLETEVOTE3","Stimmen Sie bitte nur einmal ab.<br>Alle abgegebenen Stimmen werden geloggt und ausgewertet!.");
define_once("_COMPLETEVOTE4","Sie k&ouml;nnen nicht einen Link bewerten, den Sie selbst eingetragen haben.<br>Alle abgegebenen Stimmen werden geloggt und ausgewertet!.");
define_once("_COMPLETEVOTE5","Keine Bewertung ausgew&auml;hlt - Keine Stimme gez&auml;hlt");
define_once("_COMPLETEVOTE6","Nur eine Stimme pro IP-Adresse innerhalb von $outsidewaitdays Tagen erlaubt.");
define_once("_LINKSDATESTRING","%d.%b.%Y");


