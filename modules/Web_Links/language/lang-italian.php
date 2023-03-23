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
define_once("_PREVIOUS","Pagina Precedente");
define_once("_NEXT","Prossima Pagina");
define_once("_YOURNAME","Tuo Nome");
define_once("_CATEGORY","Categoria");
define_once("_CATEGORIES","Categorie");
define_once("_LVOTES","Voti");
define_once("_TOTALVOTES","Voti Totali:");
define_once("_LINKTITLE","Titolo Link");
define_once("_HITS","Hits");
define_once("_THEREARE","Ci sono");
define_once("_NOMATCHES","Nessun Risultato per la tua ricerca");
define_once("_SCOMMENTS","Commenti");
define_once("_DESCRIPTION","Descrizione");
define_once("_ONLYREGUSERSMODIFY","Solo gli Utenti Registrati possono suggerire modifiche ai Downloads.  <a href=\"modules.php?name=Your_Account\">Registrazione/Login</a>.");
define_once("_DATE","Data");
define_once("_TO","A");
define_once("_ADDLINK","Aggiungi Sito");
define_once("_NEW","Nuovo");
define_once("_POPULAR","Popolare");
define_once("_TOPRATED","Top");
define_once("_RANDOM","Casuale");
define_once("_LINKSMAIN","Indice Links");
define_once("_LINKCOMMENTS","Commenti");
define_once("_ADDITIONALDET","Dettagli");
define_once("_EDITORREVIEW","Recensione Editore");
define_once("_REPORTBROKEN","Segnala Errore Link");
define_once("_LINKSMAINCAT","Indice Directory");
define_once("_AND","e");
define_once("_INDB","nel nostro database");
define_once("_ADDALINK","Aggiungi un Nuovo Link");
define_once("_INSTRUCTIONS","Istruzioni");
define_once("_SUBMITONCE","Segnala un solo link alla volta.");
define_once("_POSTPENDING","Tutti i links passano la nostra verifica.");
define_once("_USERANDIP","Username e IP vengono registrati, quindi non abusare del sistema.");
define_once("_PAGETITLE","Titolo Pagina");
define_once("_PAGEURL","URL Pagina");
define_once("_YOUREMAIL","Tuo Email");
define_once("_LDESCRIPTION","Descrizione: (255 caratteri max)");
define_once("_ADDURL","Aggiungi questo URL");
define_once("_LINKSNOTUSER1","Non sembri essere un Utente Registrato, se lo sei gi&agrave; allora devi fare il login.");
define_once("_LINKSNOTUSER2","Se sei registrato puoi aggiungere links sul nostro sito.");
define_once("_LINKSNOTUSER3","Registrarsi &egrave; un'operazione semplice e veloce.");
define_once("_LINKSNOTUSER4","Perch&egrave; viene richiesta la registrazione per accedere ad alcuni servizi?");
define_once("_LINKSNOTUSER5","Perch&egrave; solo cos&igrave; possiamo offrire una migliore qualit&agrave; dei contenuti,");
define_once("_LINKSNOTUSER6","ogni articolo viene rivisto individualmente e approvato dal nostro staff.");
define_once("_LINKSNOTUSER7","Cerchiamo di offrire solo informazioni di un certo valore che ti possano essere preziose.");
define_once("_LINKSNOTUSER8","<a href=\"modules.php?name=Your_Account\">Registra il Tuo Account</a>");
define_once("_LINKALREADYEXT","ERRORE: Questo URL &egrave; gi&agrave; presente nel Database!");
define_once("_LINKNOTITLE","ERRORE: Devi inserire il TITOLO!");
define_once("_LINKNOURL","ERRORE: Devi inserire l'URL!");
define_once("_LINKNODESC","ERRORE: Devi inserire la DESCRIZIONE!");
define_once("_LINKRECEIVED","Abbiamo Ricevuto la Tua Segnalazione. Grazie!");
define_once("_EMAILWHENADD","Riceverai una E-mail quando sar&agrave; approvato.");
define_once("_CHECKFORIT","Non hai inserito una Email. Comunque controlleremo presto il tuo link.");
define_once("_NEWLINKS","Nuovi Links");
define_once("_TOTALNEWLINKS","Totale Nuovi Links");
define_once("_LASTWEEK","Ultima Settimana");
define_once("_LAST30DAYS","Ultimi 30 Giorni");
define_once("_1WEEK","1 Settimana");
define_once("_2WEEKS","2 Settimane");
define_once("_30DAYS","30 Giorni");
define_once("_SHOW","Vedi");
define_once("_TOTALFORLAST","Totale nuovi links negli ultimi");
define_once("_DAYS","giorni");
define_once("_ADDEDON","Aggiunto il");
define_once("_RATING","Giudizio");
define_once("_RATESITE","Vota questo Sito");
define_once("_DETAILS","Dettagli");
define_once("_BESTRATED","Migliori Links - Top");
define_once("_OF","di");
define_once("_TRATEDLINKS","totale links votati");
define_once("_TVOTESREQ","minimo voti richiesti");
define_once("_SHOWTOP","Vedi Top");
define_once("_MOSTPOPULAR","Popolari - Top");
define_once("_OFALL","di tutti");
define_once("_SORTLINKSBY","Ordina Links per");
define_once("_SITESSORTED","Siti correntemente ordinati per");
define_once("_POPULARITY","Popolarit&agrave;");
define_once("_SELECTPAGE","Seleziona Pagina");
define_once("_MAIN","Principale");
define_once("_NEWTODAY","Nuovo Oggi");
define_once("_NEWLAST3DAYS","Nuovo ultimi 3 giorni");
define_once("_NEWTHISWEEK","Nuovo Questa Settimana");
define_once("_CATNEWTODAY","Nuovi Links Aggiunti Oggi in questa Categoria");
define_once("_CATLAST3DAYS","Nuovi Links Aggiunti negli ultimi 3 Giorni in questa Categoria");
define_once("_CATTHISWEEK","Nuovi Links Aggiunti questa Settimana in questa Categoria");
define_once("_POPULARITY1","Popolarit&agrave; (Da Minori a Maggiori Hits)");
define_once("_POPULARITY2","Popolarit&agrave; (Da Maggiori a Minori Hits)");
define_once("_TITLEAZ","Titolo (A - Z)");
define_once("_TITLEZA","Titolo (Z - A)");
define_once("_DATE1","Data (Vecchi Prima)");
define_once("_DATE2","Data (Nuovi Prima)");
define_once("_RATING1","Giudizio (Basso - Alto)");
define_once("_RATING2","Giudizio (Alto - Basso)");
define_once("_SEARCHRESULTS4","Risultati della Ricerca di");
define_once("_USUBCATEGORIES","Sotto-Categorie");
define_once("_LINKS","Links");
define_once("_TRY2SEARCH","Prova a cercare");
define_once("_INOTHERSENGINES","in altri Motori di Ricerca");
define_once("_EDITORIAL","Editoriale");
define_once("_LINKPROFILE","Profilo Link");
define_once("_EDITORIALBY","Editoriale di");
define_once("_NOEDITORIAL","Nessun editoriale disponibile attualmente per questo sito.");
define_once("_VISITTHISSITE","Visita questo Sito");
define_once("_RATETHISSITE","Vota questo Sito");
define_once("_ISTHISYOURSITE","E' questo la tua Risorsa?");
define_once("_ALLOWTORATE","Abilita gli altri utenti a votarla direttamente dalle tue Pagine Web!");
define_once("_LINKRATINGDET","Dettagli Giudizio Sito");
define_once("_OVERALLRATING","Giudizio Globale");
define_once("_TOTALOF","Totale di");
define_once("_USER","Utenti");
define_once("_USERAVGRATING","Giudizio Medio Utenti");
define_once("_NUMRATINGS","# di Valutazioni");
define_once("_EDITTHISLINK","Modifica questo Link");
define_once("_REGISTEREDUSERS","Utenti Registrati");
define_once("_NUMBEROFRATINGS","Numero di Valutazioni");
define_once("_NOREGUSERSVOTES","N° Voti da Utenti Registrati");
define_once("_BREAKDOWNBYVAL","Analisi Giudizi per Valore");
define_once("_LTOTALVOTES","voti totali");
define_once("_LINKRATING","Giudizio Links");
define_once("_HIGHRATING","Maggiore");
define_once("_LOWRATING","Inferiore");
define_once("_NUMOFCOMMENTS","Numero di Commenti");
define_once("_WEIGHNOTE","* Nota: Questo sito valuta i Voti degli Utenti Registrati con quelli degli Anonimi");
define_once("_NOUNREGUSERSVOTES","Nessun Voto da Anonimi");
define_once("_WEIGHOUTNOTE","* Nota: Questo sito valuta i Voti degli Utenti Registrati con quelli dei Votanti Esterni");
define_once("_NOOUTSIDEVOTES","Nessun Voto Esterno");
define_once("_OUTSIDEVOTERS","Votanti Esterni");
define_once("_UNREGISTEREDUSERS","Utenti Non Registrati");
define_once("_PROMOTEYOURSITE","Promuovi il Tuo Sito");
define_once("_PROMOTE01","Se desideri promuovere efficacemente il tuo Sito, probabilmente sarai interessato a uno dei nostri svariati metodi di votazione a distanza che ti mettiamo a disposizione. Questi in pratica abilitano, sistemando una immagine (o un form di votazione) sul tuo sito, gli utenti a votarti direttamente da li incrementando il numero di voti ricevuti e quindi la visibilit&agrave; nella nostra directory con relativo aumento di click ricevuti. Scegli tra uno dei metodi illustrati sotto:");
define_once("_TEXTLINK","Link di Testo");
define_once("_PROMOTE02","Un modo per linkare il form di votazione &egrave; attraverso un semplice link testuale:");
define_once("_HTMLCODE1","Il codice HTML da usare in questo caso &egrave; il seguente:");
define_once("_THENUMBER","Il Numero");
define_once("_IDREFER","nel codice HTML l'identificativo del tuo sito nel database di $sitename . Assicurati che questo numero sia presente e corretto.");
define_once("_BUTTONLINK","Bottone");
define_once("_PROMOTE03","Se vuoi un p&ograve; di pi&ugrave; che un semplice e basilare link testuale, puoi scegliere di inserire un piccolo bottone:");
define_once("_RATEIT","Vota questo Sito!");
define_once("_HTMLCODE2","Il codice relativo &egrave;:");
define_once("_REMOTEFORM","Form Votazione Remota");
define_once("_PROMOTE04","Abusi di questo sistema comportano la rimozione del link dal nostro database. Tienilo presente. Ecco come appare il corrente form di votazione a distanza.");
define_once("_VOTE4THISSITE","Vota per questo Sito!");
define_once("_LINKVOTE","Vota!");
define_once("_HTMLCODE3","Usando questo form si abilitano gli utenti a dare un giudizio direttamente dal proprio sito che viene da noi registrato. Il form sottostante &egrave; disabilitato, ma il seguente codice funziona perfettamente tagliando e incollando sulle proprie pagine il seguente codice:");
define_once("_PROMOTE05","Grazie! e buona fortuna!");
define_once("_STAFF","Staff");
define_once("_THANKSBROKEN","Grazie per l'aiuto a mantenere l'integrit&agrave; di questa directory.");
define_once("_THANKSFORINFO","Grazie per l'informazione.");
define_once("_LOOKTOREQUEST","Esamineremo presto la tua richiesta.");
define_once("_REQUESTLINKMOD","Richiesta Modifica Link");
define_once("_LINKID","Link ID");
define_once("_SENDREQUEST","Invia Richiesta");
define_once("_THANKSTOTAKETIME","Grazie per aver speso un p&ograve; del tuo tempo per votare un sito qui su");
define_once("_LETSDECIDE","L'Input da te fornito pu&ograve; aiutare gli altri visitatori a decidere pi&ugrave; facilmente su quali link cliccare.");
define_once("_RETURNTO","Ritorna a");
define_once("_RATENOTE1","Non votare per la stessa risorsa pi&ugrave; di una volta, grazie.");
define_once("_RATENOTE2","La scala &egrave; 1 - 10, dove 1 significa pessimo e 10 significa eccellente.");
define_once("_RATENOTE3","Sii il pi&ugrave; obiettivo possibile nel voto.");
define_once("_RATENOTE4","Puoi vedere la lista dei <a href=\"modules.php?name=Web_Links&amp;l_op=TopRated\">Siti Top</a>.");
define_once("_RATENOTE5","Non votare da solo per il tuo sito o per quello dei tuoi concorrenti diretti, grazie.");
define_once("_YOUAREREGGED","Sei un Utente Registrato e correttamente riconosciuto dal sistema.");
define_once("_FEELFREE2ADD","Aggiungi i commenti che vuoi in questo sito.");
define_once("_YOUARENOTREGGED","Non sei Registrato oppure non ti sei fatto riconoscere dal sistema.");
define_once("_IFYOUWEREREG","Quando sarai registrato potrai inviare tutti i commenti che vorrai in questo sito.");
define_once("_WEBLINKS","Web Links");
define_once("_TITLE","Titolo");
define_once("_MODIFY","Modifica");
define_once("_COMPLETEVOTE1","Il tuo voto &egrave; gradito.");
define_once("_COMPLETEVOTE2","Hai gi&agrave; votato per questo argomento nei precedenti $anonwaitdays giorni.");
define_once("_COMPLETEVOTE3","Vota per un argomento solo una volta.<br>Tutti i voti sono registrati e valutati.");
define_once("_COMPLETEVOTE4","Non puoi votare un link inserito da te.<br>Tutti i voti sono registrati e valutati.");
define_once("_COMPLETEVOTE5","Nessuna valutazione selezionata - Nessun voto espresso");
define_once("_COMPLETEVOTE6","Solo un voto per indirizzo IP &egrave; permesso ogni $outsidewaitdays giorni.");
define_once("_LINKSDATESTRING","%d-%b-%Y");

