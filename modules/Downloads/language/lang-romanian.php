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
define_once("_PREVIOUS","Pagina Anterioara");
define_once("_NEXT","Pagina Urmatoare");
define_once("_CATEGORY","Categorie");
define_once("_CATEGORIES","Categorii");
define_once("_LVOTES","voturi");
define_once("_TOTALVOTES","Total Voturi:");
define_once("_THEREARE","Sunt");
define_once("_NOMATCHES","Nu s-a gasit nici un rezultat");
define_once("_SCOMMENTS","Comentarii");
define_once("_UNKNOWN","Necunoscut");
define_once("_AUTHORNAME","Numele Autorului");
define_once("_AUTHOREMAIL","Email-ul Autorului");
define_once("_DOWNLOADNAME","Numele Programului");
define_once("_ADDTHISFILE","Adauga acest fisier");
define_once("_INBYTES","in octeti");
define_once("_FILESIZE","Dimensiune");
define_once("_VERSION","Versiune");
define_once("_DESCRIPTION","Descriere");
define_once("_AUTHOR","Autor");
define_once("_HOMEPAGE","Pagina web");
define_once("_DOWNLOADNOW","Ia acest fisier Acum!");
define_once("_RATERESOURCE","Da o nota");
define_once("_FILEURL","Link");
define_once("_ADDDOWNLOAD","Adauga Download");
define_once("_DOWNLOADSMAIN","Download-uri");
define_once("_DOWNLOADCOMMENTS","Comentarii Download");
define_once("_DOWNLOADSMAINCAT","Categorii Principale Download");
define_once("_ADDADOWNLOAD","Adauga un Nou Download");
define_once("_DSUBMITONCE","Trimite un singur download o singura data.");
define_once("_DPOSTPENDING","Toate download-urile apar dupa o verificare prealabila.");
define_once("_RESSORTED","Resurse sortate dupa");
define_once("_DOWNLOADSNOTUSER1","Nu sunteti un user inregistrat sau nu v-ati logat inca.");
define_once("_DOWNLOADSNOTUSER2","Daca ati fi inregistrat ati putea adauga download-uri pe acest site.");
define_once("_DOWNLOADSNOTUSER3","Este usor si rapid sa deveniti un utilizator inregistrat.");
define_once("_DOWNLOADSNOTUSER4","De ce va cerem sa fiti inregistrat ca sa aveti acces la anumite facilitati?");
define_once("_DOWNLOADSNOTUSER5","Ca sa va putem oferi cel mai bun continut posibil,");
define_once("_DOWNLOADSNOTUSER6","fiecare element este analizat si aprobat de personalul nostru.");
define_once("_DOWNLOADSNOTUSER7","Speram sa va oferim dumneavoastra numai informatie utila.");
define_once("_DOWNLOADSNOTUSER8","<a href=\"modules.php?name=Your_Account\">Inregistrati-va pentru un cont</a>");
define_once("_DOWNLOADALREADYEXT","EROARE: Acest URL este se afla deja in baza de date!");
define_once("_DOWNLOADNOTITLE","EROARE: Trebuie sa scrieti un TITLU pentru URL-ul dumneavoastra!");
define_once("_DOWNLOADNOURL","EROARE: Trebuie sa scrieti un URL!");
define_once("_DOWNLOADNODESC","EROARE: Trebuie sa scrieti o DESCRIERE pentru URL-ul dumneavoastra!");
define_once("_DOWNLOADRECEIVED","Am primit cererea dumneavoastra pentru Download. Va multumim!");
define_once("_NEWDOWNLOADS","Noi Download-uri");
define_once("_TOTALNEWDOWNLOADS","Numar Download-uri");
define_once("_DTOTALFORLAST","Numar download-uri pentru ultimele");
define_once("_DBESTRATED","Cele mai bine cotate Download-uri - Top");
define_once("_TRATEDDOWNLOADS","numar de download-uri cotate");
define_once("_SORTDOWNLOADSBY","Sorteaza Download-urile dupa");
define_once("_DCATNEWTODAY","Noi Download-uri din aceasta Categorie adaugate azi");
define_once("_DCATLAST3DAYS","Noi Download-uri din aceasta Categorie din ultimele 3 zie");
define_once("_DCATTHISWEEK","Noi Download-uri din aceasta Categorie din aceasta saptamana");
define_once("_DDATE1","Data (Download-urile vechi listate primele)");
define_once("_DDATE2","Data (Download-urile noi listate primele)");
define_once("_DOWNLOADS","Download-uri");
define_once("_DOWNLOADPROFILE","Profile Download");
define_once("_DOWNLOADRATINGDET","Detalii notare Download-uri");
define_once("_EDITTHISDOWNLOAD","Editeaza acest Download");
define_once("_DOWNLOADRATING","Notare Download-uri");
define_once("_DOWNLOADVOTE","Voteaza!");
define_once("_DONLYREGUSERSMODIFY","Numai utilizatorii inregistrati pot sugera modificari. Va rugam sa va <a href=\"modules.php?name=Your_Account\">inregistrati sau sa va logati</a>.");
define_once("_REQUESTDOWNLOADMOD","Cerere de Modificare Download");
define_once("_DOWNLOADID","Identificator Download");
define_once("_DLETSDECIDE","Parerile dumneavoastra vor ajuta alti vizitatori sa hotarasca ce fisiere sa download-eze.");
define_once("_DRATENOTE4","Puteti vedea o lista a <a href=\"modules.php?name=Downloads&amp;d_op=TopRated\">Celor mai bune Resurse</a>.");
define_once("_DATE","Data");
define_once("_TO","Catre");
define_once("_NEW","Nou");
define_once("_POPULAR","Popular");
define_once("_TOPRATED","Cel mai bine cotat");
define_once("_ADDITIONALDET","Detalii Suplimentare");
define_once("_EDITORREVIEW","Parerea Editorului");
define_once("_REPORTBROKEN","Raporteaza un Link stricat");
define_once("_AND","si");
define_once("_INDB","in baza noastra de date");
define_once("_INSTRUCTIONS","Instructiuni");
define_once("_USERANDIP","Numele utilizatorului si adresa IP sunt inregistrate, asa ca va rugam sa nu abuzati.");
define_once("_LDESCRIPTION","Descriere: (255 de caractere maxim)");
define_once("_CHECKFORIT","Nu ne-ati dat o adresa de Email dar vom verifica link-ul dumneavoastra in curand.");
define_once("_LASTWEEK","Ultima saptamana");
define_once("_LAST30DAYS","Ultimele 30 de zile");
define_once("_1WEEK","O Saptamana");
define_once("_2WEEKS","2 Zile");
define_once("_30DAYS","30 Zile");
define_once("_SHOW","Arata");
define_once("_DAYS","zile");
define_once("_ADDEDON","Adaugate pe");
define_once("_RATING","Cotare");
define_once("_DETAILS","Detailii");
define_once("_OF","de");
define_once("_TVOTESREQ","numar minim de voturi necesare");
define_once("_SHOWTOP","Arata Primele");
define_once("_MOSTPOPULAR","Cele mai populare - Primele");
define_once("_OFALL","din toate");
define_once("_POPULARITY","Popularitate");
define_once("_SELECTPAGE","Selecteaza Pagina");
define_once("_MAIN","Principal");
define_once("_NEWTODAY","Noutatile de Azi");
define_once("_NEWLAST3DAYS","Noutatile din Ultimele 3 Zile");
define_once("_NEWTHISWEEK","Noutatile din Saptamana Asta");
define_once("_POPULARITY1","Popularitate (De la cele mai putine la cele mai multe accesari)");
define_once("_POPULARITY2","Popularitate (De la cele mai multe la cele mai putine accesari)");
define_once("_TITLEAZ","Titlu (de la A la Z)");
define_once("_TITLEZA","Titlu (de la Z la A)");
define_once("_RATING1","Cotare (De la cele mai mici scoruri la cele mai bune scoruri)");
define_once("_RATING2","Cotare (De la cele mai bune scoruri la cele mai mici scoruri)");
define_once("_SEARCHRESULTS4","Rezultatele Cautarii pentru");
define_once("_USUBCATEGORIES","Subcategorii");
define_once("_TRY2SEARCH","Incercati sa cautati");
define_once("_INOTHERSENGINES","in alte motoare de cautare");
define_once("_EDITORIAL","Editorial");
define_once("_EDITORIALBY","Editorial de");
define_once("_NOEDITORIAL","Nu este disponibil nici un editorial pe acest site.");
define_once("_RATETHISSITE","Noteaza aceasta Resursa");
define_once("_ISTHISYOURSITE","Este aceasta resursa dumneavoastra?");
define_once("_ALLOWTORATE","Permite altor useri sa o noteze din site-ul dumneavoastra!");
define_once("_OVERALLRATING","Cotare in ansamblu");
define_once("_TOTALOF","Total din");
define_once("_USER","Utilizator");
define_once("_USERAVGRATING","Cotare medie utilizator");
define_once("_NUMRATINGS","numari de note");
define_once("_REGISTEREDUSERS","Utilizatori Inregistrati");
define_once("_NUMBEROFRATINGS","Numar de note");
define_once("_NOREGUSERSVOTES","Voturi ale Utilizatorilor Neinregistrati");
define_once("_BREAKDOWNBYVAL","Impartire a Notelor dupa Valoare");
define_once("_LTOTALVOTES","total voturi");
define_once("_HIGHRATING","Cotare Inalta");
define_once("_LOWRATING","Cotere Scazuta");
define_once("_NUMOFCOMMENTS","Numar de Comentarii");
define_once("_WEIGHNOTE","* Nota: Aceasta resursa favorizeaza notarile Utilizatorilor Inregistrati fata de cei Neinregistrati");
define_once("_NOUNREGUSERSVOTES","Nu sunt Voturi ale Utilizatorilor Neinregistrati");
define_once("_WEIGHOUTNOTE","* Nota: Aceasta resursa favorizeaza notarile Utilizatorilor Inregistrati fata de cei Externi");
define_once("_NOOUTSIDEVOTES","Nu sunt Voturi ale Utilizatorilor Externi");
define_once("_OUTSIDEVOTERS","Votanti Externi");
define_once("_UNREGISTEREDUSERS","Utilizatori Neinregistrati");
define_once("_PROMOTEYOURSITE","Promoveaza-ti site-ul");
define_once("_PROMOTE01","Poate ca sunteti interesat de optiunile de notare pe care le avem la dispozitie a unui site de la distanta. Acestea va permit sa puneti o imagine(sau chiar un formular de notare) pe site-ul dumneavoastra pentru a mari numarul de voturi pe care le primeste resursa dumneavoastra. Va rugam sa alegeti una din optiunile de mai jos:");
define_once("_TEXTLINK","Link Text");
define_once("_PROMOTE02","O metoda de link catre formularul de votare este printr-un simplu link text:");
define_once("_HTMLCODE1","Codul HTML pe carea ar trebui sa il folositi este in acest caz:");
define_once("_THENUMBER","Numarul");
define_once("_IDREFER","in HTML sursa refera numarul de indetificare al site-ului dumneavoastra in baza de date $sitename. Fiti sigur ca acest numar e prezent.");
define_once("_BUTTONLINK","Link Buton");
define_once("_PROMOTE03","Daca doriti mai mult decat un link text puteti sa folositi un mic buton link:");
define_once("_RATEIT","Cotati acest Site!");
define_once("_HTMLCODE2","Codul sursa pentru butonul de mai sus este:");
define_once("_REMOTEFORM","Formular de Cotare de la Distanta");
define_once("_PROMOTE04","Daca ne pacaliti va vom sterge link-ul. Acestea fiind spuse, asa arata formularul dumneavoastra de notare de la distanta.");
define_once("_VOTE4THISSITE","Votati pentur aceste site!");
define_once("_HTMLCODE3","Folosind acest formular veti permite utilizatorilor sa noteze resursa dumneavoastra direct de pe site-ul dumneavoastra, notarea va fi inregistrata aici. Formularul de mai sus este dezactivat, dar urmatoarul cod sursa va functiona daca il veti scrie in pagina dumneavoastra de web. Codul sursa este arata mai jos:");
define_once("_PROMOTE05","Va multimim! mult succes!");
define_once("_STAFF","Personalul site-ului");
define_once("_THANKSBROKEN","Va multumim pentru ca ne-ati ajutat sa intretinem acest director.");
define_once("_SECURITYBROKEN","Din motive de securitate numele de utilizator si adresa IP vor fi inregistrate temporar.");
define_once("_THANKSFORINFO","Va multumim pentru infomatie.");
define_once("_LOOKTOREQUEST","Vom analiza cererea dumneavoastra in scurt timp.");
define_once("_SENDREQUEST","Trimite Cererea");
define_once("_THANKSTOTAKETIME","Va multumim pentru timpul acordat notarii site-uluiThank you for taking the time to rate a site here at");
define_once("_RETURNTO","Intoarecere la");
define_once("_RATENOTE1","Va rugam sa nu votati pentru aceeasi resursa mai mult de o singura data.");
define_once("_RATENOTE2","Scara este de la 1 la 10, 1 fiind cel mai prost iar 10 fiine excellent.");
define_once("_RATENOTE3","Va rugam sa fiti obiectiv in notare, daca veti da numai 1 si 10, notarile nu o sa fie foarte folositoare.");
define_once("_RATENOTE5","Nu votati pentru resursa dumneavoastra sa a competitorului.");
define_once("_YOUAREREGGED","Sunteti utilizatori inregistrat si sunteti logat.");
define_once("_FEELFREE2ADD","Daca doriti puteti sa adaugati un comentariu despre acest site.");
define_once("_YOUARENOTREGGED","Nu sunteti un utilizator inregstrat sau nu sunteti logat.");
define_once("_IFYOUWEREREG","Daca ati fi inregistrat ati putea sa trimiteti comentarii despre acest site.");
define_once("_TITLE","Titlu");
define_once("_MODIFY","Modifica");
define_once("_COMPLETEVOTE1","Multumim pentru votul dumneavoastra.");
define_once("_COMPLETEVOTE2","Ati mai votat pentri aceasta resursa acum $anonwaitdays zile.");
define_once("_COMPLETEVOTE3","Votati pentru o resursa o singura data.<br>Toate voturile sunt inregistrate si supravegeate.");
define_once("_COMPLETEVOTE4","Nu puteti vota pentru un link pe care l-ati trimis.<br>Toate voturile sunt inregistrate si supravegheate.");
define_once("_COMPLETEVOTE5","Nu ati selectat o nota - nu s-a adaugat nici un vot");
define_once("_COMPLETEVOTE6","Numai un singur vot de la o adresa IP este permis la fiecare $outsidewaitdays zile.");
define_once("_LINKSDATESTRING","%b-%d-%Y");


