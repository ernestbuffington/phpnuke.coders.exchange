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


define_once("_PREVIOUS","Vorherige Seite");
define_once("_NEXT","N&auml;chste Seite");
define_once("_CATEGORY","Bereich");


define_once("_CATEGORIES","Themen- Bereiche");
define_once("_LVOTES","Stimmen");
define_once("_TOTALVOTES","gesamte Stimmen:");

define_once("_THEREARE","Es gibt");
define_once("_NOMATCHES","Keine Treffer f&uuml;r diese Anfrage gefunden");
define_once("_SCOMMENTS","Kommentare");
define_once("_UNKNOWN","Unbekannt");
define_once("_DOWNLOADS","Downloads");
define_once("_AUTHORNAME","Name des Autors");
define_once("_AUTHOREMAIL","eMail des Autors");
define_once("_DOWNLOADNAME","Programname");
define_once("_ADDTHISFILE","Datei hinzuf&uuml;gen");
define_once("_INBYTES","in Bytes");
define_once("_FILESIZE","Dateigr&ouml;&szlig;e");
define_once("_VERSION","Version");
define_once("_DESCRIPTION","Beschreibung");

define_once("_AUTHOR","Autor");
define_once("_HOMEPAGE","Homepage");
define_once("_DOWNLOADNOW","Datei herunterladen!");
define_once("_RATERESOURCE","Bewerten");
define_once("_FILEURL","Dateipfad");
define_once("_ADDDOWNLOAD","Download hinzuf&uuml;gen");
define_once("_DOWNLOADSMAIN","Download- Index");
define_once("_DOWNLOADCOMMENTS","Download- Kommentare");
define_once("_DOWNLOADSMAINCAT","Download- Hauptkategorien");
define_once("_ADDADOWNLOAD","Neuen Download hinzuf&uuml;gen");
define_once("_DSUBMITONCE","Bitte eine Datei nur einmal hinzuf&uuml;gen");
define_once("_DPOSTPENDING","Alle neuen Downloads m&uuml;ssen erst freigeschaltet werden.");
define_once("_RESSORTED","Dateien sind aktuell sortiert nach");
define_once("_DOWNLOADSNOTUSER1","Sie sind kein registrierter User, oder nicht eingeloggt.");
define_once("_DOWNLOADSNOTUSER2","Nur wenn Sie angemeldet sind, k&ouml;nnen Sie hier Dateien anbieten.");
define_once("_DOWNLOADSNOTUSER3","Ein angemeldeter User zu werden ist ein schneller und einfacher Vorgang.");
define_once("_DOWNLOADSNOTUSER4","Warum ben&ouml;tigen wir Ihre Registration, um Ihnen den Zugriff zu gew&auml;hren?");
define_once("_DOWNLOADSNOTUSER5","Nur so k&ouml;nnen wir Ihnen diesen Topinhalt anbieten,");
define_once("_DOWNLOADSNOTUSER6","jedes File wird von unserem Team angesehen und ggbf. freigeschaltet.");
define_once("_DOWNLOADSNOTUSER7","Wir hoffen, Ihnen nur wertvolle Informationen zu pr&auml;sentieren.");
define_once("_DOWNLOADSNOTUSER8","<a href=\"modules.php?name=Your_Account\">Mitglied werden</a>");
define_once("_DOWNLOADALREADYEXT","Fehler: Diese URL befindet sich bereits in der Datenbank!");
define_once("_DOWNLOADNOTITLE","Fehler: Sie m&uuml;ssen Ihrer Seite einen Namen geben!");
define_once("_DOWNLOADNOURL","Fehler: Sie m&uuml;ssen f&uuml;r Ihre Homepage eine URL angeben!");
define_once("_DOWNLOADNODESC","Fehler: Sie m&uuml;ssen eine Homepage- Beschreibung eingeben!");
define_once("_DOWNLOADRECEIVED","Wir haben Ihr Downloadangebot erhalten. Vielen Dank");
define_once("_NEWDOWNLOADS","Neue Downloads");
define_once("_TOTALNEWDOWNLOADS","Alle neuen Downloads");
define_once("_DTOTALFORLAST","Alle neuen Downloads der letzten");
define_once("_DBESTRATED","Bestbewertete Downloads");
define_once("_TRATEDDOWNLOADS","ingesamt bewertete Downloads");
define_once("_SORTDOWNLOADSBY","Sortiere Downloads nach");
define_once("_DCATNEWTODAY","Heute neue Downloads in diesem Bereich");
define_once("_DCATLAST3DAYS","Neue Downloads in diesem Bereich- letzte 3 Tage");
define_once("_DCATTHISWEEK","Neue Downloads in diesem Bereich- letzte 7 Tage");
define_once("_DDATE1","Datum (erst Alte)");
define_once("_DDATE2","Datum (erst Neue)");
define_once("_DOWNLOADPROFILE","Downloadprofil");
define_once("_DOWNLOADRATINGDET","Downloadbewertungs- Details");
define_once("_EDITTHISDOWNLOAD","&Auml;ndere diesen Download");
define_once("_DOWNLOADRATING","Download- Bewertung ");
define_once("_DOWNLOADVOTE","Bewerten!");
define_once("_REQUESTDOWNLOADMOD","Vorgeschlagene Download- &Auml;nderungen");
define_once("_DOWNLOADID","Download ID");
define_once("_DLETSDECIDE","Eingaben von Teilnehmern wie Ihnen helfen anderen Teilnehmern, zu entscheiden, welche Downloads diese probieren sollten.");
define_once("_DRATENOTE4","Sie k&ouml;nnen sich eine <a href=\"modules.php?name=Downloads&amp;d_op=TopRated\">Liste der bestbewertesten Downloads</a> anzeigen lassen.");
define_once("_DATE","Datum");
define_once("_TO","zu");
define_once("_NEW","Neu");
define_once("_POPULAR","Beliebt");
define_once("_TOPRATED","Topbewertet");
define_once("_ADDITIONALDET","Weitere Details");
define_once("_EDITORREVIEW","Editor- Bewertung");
define_once("_REPORTBROKEN","Fehlerhaften Link melden");
define_once("_AND","und");
define_once("_INDB","in unserer Datenbank");
define_once("_INSTRUCTIONS","Anleitung");
define_once("_USERANDIP","Username und IP werden gespeichert, bitte missbrauchen Sie unser System nicht.");
define_once("_LDESCRIPTION","Beschreibung: (maximal 255 Zeichen)");
define_once("_CHECKFORIT","Sie brauchen uns keine eMail zu schreiben. Wir werden Ihren Vorschlag baldm&ouml;glichst &uuml;berpr&uuml;fen.");
define_once("_LASTWEEK","Letzte Woche");
define_once("_LAST30DAYS","Letzte 30 Tage");
define_once("_1WEEK","1 Woche");
define_once("_2WEEKS","2 Wochen");
define_once("_30DAYS","30 Tage");
define_once("_SHOW","Zeigen");
define_once("_DAYS","Tagen");
define_once("_ADDEDON","Eingetragen am");


define_once("_RATING","Bewertung");
define_once("_DETAILS","Details");
define_once("_OF","von");
define_once("_TVOTESREQ","Minimal notwendige Stimmen");
define_once("_SHOWTOP","Zeige Top");
define_once("_MOSTPOPULAR","Beliebteste");
define_once("_OFALL","von allen");
define_once("_POPULARITY","Beliebtheit");
define_once("_SELECTPAGE","Seite ausw&auml;hlen");
define_once("_MAIN","Start");
define_once("_NEWTODAY","Heute neu");
define_once("_NEWLAST3DAYS","In den letzten 3 Tagen neu");
define_once("_NEWTHISWEEK","Diese Woche neu");
define_once("_POPULARITY1","Beliebtheit (unbeliebteste oben)");
define_once("_POPULARITY2","Beliebtheit (beliebteste oben)");
define_once("_TITLEAZ","Name (A nach Z)");
define_once("_TITLEZA","Name (Z nach A)");
define_once("_RATING1","Bewertung (erst schlechtbewertete)");
define_once("_RATING2","Bewertung (erst gutbewertete)");
define_once("_SEARCHRESULTS4","Suche Ergebnisse f&uuml;r");
define_once("_USUBCATEGORIES","Unterkategorien");
define_once("_TRY2SEARCH","Versuche die Suche");
define_once("_INOTHERSENGINES","in anderen Suchmaschinen");
define_once("_EDITORIAL","Einleitung");
define_once("_EDITORIALBY","Einleitung von");
define_once("_NOEDITORIAL","F&uuml;r diese Webseite ist bisher kein Editorial verf&uuml;gbar");
define_once("_RATETHISSITE","Bewerten");
define_once("_ISTHISYOURSITE","Ist es von Ihnen?");
define_once("_ALLOWTORATE","Erm&ouml;glichen Sie ihren Besuchern das Bewerten Ihrer Seite!");
define_once("_OVERALLRATING","Ingesamt bewertet");
define_once("_TOTALOF","von insgesamt");
define_once("_USER","Leuten");
define_once("_USERAVGRATING","Durchschnittliche Bewertung");
define_once("_NUMRATINGS","# der Stimmen");
define_once("_REGISTEREDUSERS","Registrierte Nutzer");
define_once("_NUMBEROFRATINGS","Zahl der Stimmen");
define_once("_NOREGUSERSVOTES","Keine Stimmen von Mitgliedern");
define_once("_BREAKDOWNBYVAL","Breakdown der Stimmen");
define_once("_LTOTALVOTES","Stimmen- insgesamt");
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
define_once("_PROMOTE01","Vielleicht sind Sie ja an verschiedenen 'Bewerten Sie meine Webseite'- Boxen interessiert, die wir anbieten? Diese erlauben Ihnen das platzieren eines Bildes (oder eines Abstimmformulars) direkt auf Ihrer Webseite, um die Anzahl der Stimmen, die Ihre Webseite hier bekommt, zu erh&ouml;hen. Bitte w&auml;hlen Sie aus einer der unten gegebenen M&ouml;glichkeiten eine f&uuml;r Ihre Webseite passende aus:");
define_once("_TEXTLINK","Textlink");
define_once("_PROMOTE02","Eine M&ouml;glichkeit, Bewertungen in unserem System von Ihrer Webseite zu erhalten, ist ein Textlink:");
define_once("_HTMLCODE1","Folgenden HTML- Code sollten Sie in diesem Fall auf Ihrer Webseite einf&uuml;gen:");
define_once("_THENUMBER","Die Zahl");
define_once("_IDREFER","im Code entspricht Ihrer Seiten- ID in der $sitename Datenbank. Bitte achten Sie darauf, dass diese Nummer angegeben ist.");
define_once("_BUTTONLINK","Buttonlink");
define_once("_PROMOTE03","Falls Ihnen der Sinn nach etwas mehr als einem Textlink steht, ist es vielleicht ein Buttonlink, den Sie gerne m&ouml;chten:");
define_once("_RATEIT","Bewerten Sie diese Seite!");
define_once("_HTMLCODE2","Folgenden HTML- Code m&uuml;ssen Sie f&uuml;r den Button auf Ihrer Seite einf&uuml;gen:");
define_once("_REMOTEFORM","Externe Abstimmbox");
define_once("_PROMOTE04","Falls Sie zu betr&uuml;gen versuchen, werden wir Ihren Link f&uuml;r immer von unserer Seite entfernen. Nachdem wir dieses gesagt haben- so k&ouml;nnte diese Box auf Ihrer Seite aussehen:");
define_once("_VOTE4THISSITE","Bewerten Sie diese Seite!");
define_once("_HTMLCODE3","Die Benutzung dieses Formulars erlaubt es Ihren Besuchern, direkt von Ihrer Seite aus abzustimmen. Wir erhalten diese Bewertung und f&uuml;gen sie in unsere Datenbank ein. Das obige Beispiel ist deaktiviert, aber auf Ihrer Seite wird es funktionieren, wenn Sie den HTML- Code genau so dort einf&uuml;gen. Hier nun der HTML- Code:");
define_once("_PROMOTE05","Vielen Dank! Und viel Erfolg bei der Linkbewertung!");
define_once("_STAFF","Die Mitarbeiter");
define_once("_THANKSBROKEN","Vielen Dank f&uuml;r Ihre Hilfe bei der Steigerung der Benutzbarkeit dieses Indexes.");
define_once("_SECURITYBROKEN","Aus Sicherheitsgr&uuml;nden wird Ihr Username und Ihre IP- Adresse zeitweilig gespeichert.");
define_once("_THANKSFORINFO","Vielen Dank f&uuml;r diese Information.");
define_once("_LOOKTOREQUEST","Wir werden uns Ihren Vorschlag baldm&ouml;glichst ansehen.");
define_once("_SENDREQUEST","Vorschlag senden");
define_once("_THANKSTOTAKETIME","Vielen Dank f&uuml;r die Zeit, die Sie zum Bewerten einer Webseite hier bei uns aufgebracht haben");
define_once("_RETURNTO","Zur&uuml;ck nach");
define_once("_RATENOTE1","Bitte stimmen Sie &uuml;ber einen Link nicht mehrmals ab.");
define_once("_RATENOTE2","Die Skala reicht von 1 - 10, wobei 1 die schlechteste und 10 die beste Bewertung ist.");
define_once("_RATENOTE3","Bitte sind Sie objektiv beim Abstimmen. Wenn jeder mit 1 oder 10 abstimmt, sind die Ergebnisse nicht sonderlich aussagekr&auml;ftig.");
define_once("_RATENOTE5","Bitte bewerten Sie nicht Ihre eigene oder die Seite eines direkten Konkurenten, Sie w&auml;ren ohnehin nicht objektiv.");
define_once("_YOUAREREGGED","Du bist registriert und angemeldet.");
define_once("_FEELFREE2ADD","Sind Sie so frei und geben Sie einen Kommentar ein.");
define_once("_YOUARENOTREGGED","Sie sind kein registriertes Mitglied oder aber nicht eingeloggt.");
define_once("_IFYOUWEREREG","Wenn Sie registriert sind, k&ouml;nnen Sie auf dieser Seite Kommentare eingeben.");
define_once("_TITLE","Titel");
define_once("_MODIFY","Modifizieren");
define_once("_COMPLETEVOTE1","Ihre Abstimmung wird gesch&auml;tzt.");
define_once("_COMPLETEVOTE2","Sie haben in den letzten $anonwaitdays Tagen schon einmal eine Stimme abgegeben.");
define_once("_COMPLETEVOTE3","Stimmen Sie bitte nur einmal ab.<br>Alle abgegebenen Stimmen werden geloggt und ausgewertet!.");
define_once("_COMPLETEVOTE4","Sie k&ouml;nnen nicht einen Link bewerten, den Sie selbst eingetragen haben.<br>Alle abgegebenen Stimmen werden geloggt und ausgewertet!.");
define_once("_COMPLETEVOTE5","Keine Bewertung ausgew&auml;hlt - Keine Stimme gez&auml;hlt");
define_once("_COMPLETEVOTE6","Nur eine Stimme pro IP-Adresse innerhalb von $outsidewaitdays Tagen erlaubt.");
define_once("_LINKSDATESTRING","%d.%b.%Y");


