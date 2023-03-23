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
/*                                                                        */
/* Polish translation by Nordavind®(Bolo) (http://forum.phpnuke.org.pl)   */
/*                                                                        */
/**************************************************************************/

define_once("_URL","URL");
define_once("_PREVIOUS","Poprzednia strona");
define_once("_NEXT","Nastêpna strona");
define_once("_CATEGORY","Kategoria");
define_once("_CATEGORIES","Kategorie");
define_once("_LVOTES","G³osów");
define_once("_TOTALVOTES","Razem g³osów:");
define_once("_THEREARE","Aktualnie jest(s±)");
define_once("_NOMATCHES","Brak rezultatów wyszukiwania");
define_once("_SCOMMENTS","Komentarze");
define_once("_UNKNOWN","Nieznany");
define_once("_DOWNLOADS","razy ¶ci±gany");
define_once("_AUTHORNAME","Imiê autora");
define_once("_AUTHOREMAIL","Adres email autora");
define_once("_DOWNLOADNAME","Nazwa programu");
define_once("_ADDTHISFILE","Dodaj ten plik");
define_once("_INBYTES","w bajtach");
define_once("_FILESIZE","Rozmiar pliku");
define_once("_VERSION","Wersja");
define_once("_DESCRIPTION","Opis");
define_once("_AUTHOR","Autor");
define_once("_HOMEPAGE","Strona WWW");
define_once("_DOWNLOADNOW","¦ci±gnij ten plik teraz!");
define_once("_RATERESOURCE","Oceñ ten zasób");
define_once("_FILEURL","Link do pliku");
define_once("_ADDDOWNLOAD","Dodaj plik");
define_once("_DOWNLOADSMAIN","G³ówna");
define_once("_DOWNLOADCOMMENTS","Komentarz");
define_once("_DOWNLOADSMAINCAT","G³ówne kategorie dzia³u plików");
define_once("_ADDADOWNLOAD","Dodaj nowy plik");
define_once("_DSUBMITONCE","Wy¶lij dany plik tylko raz.");
define_once("_DPOSTPENDING","Wszystkie pliki i linki przed ich opublikowaniem bêd± sprawdzane.");
define_once("_RESSORTED","Zawarto¶æ aktualnie sortowana wed³ug");
define_once("_DOWNLOADSNOTUSER1","Nie jeste¶ zarejestrowanym u¿ytkownikiem albo siê nie zalogowa³e¶(a¶).");
define_once("_DOWNLOADSNOTUSER2","Je¶li siê zarejestrujesz, bêdziesz móg³(mog³a) dodaæ pliki na tê stronê.");
define_once("_DOWNLOADSNOTUSER3","Rejestracja u¿ytkownika to ³atwy i szybki proces.");
define_once("_DOWNLOADSNOTUSER4","Dlaczego wymagamy rejestracji, aby¶ mia³(a) dostêp do niektórych opcji?");
define_once("_DOWNLOADSNOTUSER5","Dlatego, ¿e oferujemy zawarto¶æ wy³±cznie wysokiej jako¶ci,");
define_once("_DOWNLOADSNOTUSER6","Ka¿da pozycja jest indywidualnie sprawdzana i zatwierdzana przez nasz zespó³.");
define_once("_DOWNLOADSNOTUSER7","Mamy nadziejê, ¿e oferujemy Ci wy³±cznie warto¶ciowe pliki.");
define_once("_DOWNLOADSNOTUSER8","<a href=\"modules.php?name=Your_Account&amp;op=new_user\">Zarejestruj konto</a>");
define_once("_DOWNLOADALREADYEXT","B£¡D: Ten adres ju¿ istnieje w bazie!");
define_once("_DOWNLOADNOTITLE","B£¡D: Musisz podaæ TYTU£ Twego URL-a!");
define_once("_DOWNLOADNOURL","B£¡D: Musisz podaæ Twój URL-a!");
define_once("_DOWNLOADNODESC","B£¡D: Musisz podaæ OPIS Twego URL-a!");
define_once("_DOWNLOADRECEIVED","Otrzymali¶my Twoj± propozycjê do dzia³u plików. Dziêkujemy!");
define_once("_NEWDOWNLOADS","Nowe pliki");
define_once("_TOTALNEWDOWNLOADS","W sumie nowych plików");
define_once("_DTOTALFORLAST","W sumie nowych plików w ostatnich");
define_once("_DBESTRATED","Najwy¿ej ocenione pliki - Top");
define_once("_TRATEDDOWNLOADS","razem ocenionych plików");
define_once("_SORTDOWNLOADSBY","Sortuj pliki wed³ug");
define_once("_DCATNEWTODAY","Nowe pliki w tej kategorii dodane dzisiaj");
define_once("_DCATLAST3DAYS","Nowe pliki w tej kategorii dodane w ci±gu ostatnich 3 dni");
define_once("_DCATTHISWEEK","Nowe pliki w tej kategorii dodane w ci±gu ostatniego tygodnia");
define_once("_DDATE1","Data (stare pliki umieszczone na pocz±tku)");
define_once("_DDATE2","Data (nowe pliki umieszczone na pocz±tku)");
define_once("_DOWNLOADPROFILE","Profil");
define_once("_DOWNLOADRATINGDET","Szczegó³y oceniania");
define_once("_EDITTHISDOWNLOAD","Edytuj ten wpis");
define_once("_DOWNLOADRATING","Oceny");
define_once("_DOWNLOADVOTE","G³osuj!");
define_once("_REQUESTDOWNLOADMOD","Za¿±daj modyfikacji pliku");
define_once("_DOWNLOADID","ID pliku");
define_once("_DLETSDECIDE","Wpisy od u¿ytkowników, takich jak Ty, pomog± innym odwiedzaj±cym zdecydowaæ siê, który z plików warto ¶ci±gn±æ.");
define_once("_DRATENOTE4","Mo¿esz zobaczyæ listê <a href=\"modules.php?name=Downloads&d_op=TopRated\">najwy¿ej ocenionych zasobów</a>.");
define_once("_DATE","Data");
define_once("_TO","Do");
define_once("_NEW","Nowy");
define_once("_POPULAR","Popularno¶æ");
define_once("_TOPRATED","Najwy¿ej ocenione");
define_once("_ADDITIONALDET","Dodatkowe informacje");
define_once("_EDITORREVIEW","Przegl±d redaktora");
define_once("_REPORTBROKEN","Zg³o¶ nieczynne linki");
define_once("_AND","i");
define_once("_INDB","w naszej bazie");
define_once("_INSTRUCTIONS","Instrukcje");
define_once("_USERANDIP","Nazwa u¿ytkownika i adres IP s± rejestrowane, wiêc prosimy nie atakowaæ systemu.");
define_once("_LDESCRIPTION","Opis: (maks. 255 znaków)");
define_once("_CHECKFORIT","Nie odpisuj na list. Sprawdzimy wkrótce Twój link.");
define_once("_LASTWEEK","Ostatni tydzieñ");
define_once("_LAST30DAYS","Ostatnie 30 dni");
define_once("_1WEEK","1 tydzieñ");
define_once("_2WEEKS","2 tygodnie");
define_once("_30DAYS","30 dni");
define_once("_SHOW","Poka¿");
define_once("_DAYS","dni");
define_once("_ADDEDON","Dodano");
define_once("_RATING","Oceny");
define_once("_DETAILS","Detale");
define_once("_OF","z");
define_once("_TVOTESREQ","minimalna ilo¶æ wymaganych g³osów");
define_once("_SHOWTOP","Poka¿ Top");
define_once("_MOSTPOPULAR","Najbardziej popularne - Top");
define_once("_OFALL","wszystkich");
define_once("_POPULARITY","Popularno¶æ");
define_once("_SELECTPAGE","Wybierz stronê");
define_once("_MAIN","G³ówna");
define_once("_NEWTODAY","Nowe dzisiaj");
define_once("_NEWLAST3DAYS","Nowe w ostatnich 3 dniach");
define_once("_NEWTHISWEEK","Nowe w tym tygodniu");
define_once("_POPULARITY1","Popularno¶æ (od najmniej do najczê¶ciej ¶ci±ganych)");
define_once("_POPULARITY2","Popularno¶æ (Od najczê¶ciej do najmniej ¶ci±ganych)");
define_once("_TITLEAZ","Tytu³y (od A do Z)");
define_once("_TITLEZA","Tytu³y (od Z do A)");
define_once("_RATING1","Ocena (od najni¿szych do najwy¿szych wyników)");
define_once("_RATING2","Ocena (od najwy¿szych do najni¿szych wyników)");
define_once("_SEARCHRESULTS4","Wyniki wyszukiwania dla");
define_once("_USUBCATEGORIES","podkategorie");
define_once("_TRY2SEARCH","Spróbuj poszukaæ");
define_once("_INOTHERSENGINES","w innych wyszukiwarkach");
define_once("_EDITORIAL","Redagowany");
define_once("_EDITORIALBY","Redagowany przez");
define_once("_NOEDITORIAL","Aktualnie brak na tej stronie.");
define_once("_RATETHISSITE","Oceñ ten zasób");
define_once("_ISTHISYOURSITE","Czy to Twój zasób?");
define_once("_ALLOWTORATE","Pozwól innym u¿ytkownikom na ocenianie!");
define_once("_OVERALLRATING","Ocena ogólna");
define_once("_TOTALOF","Razem");
define_once("_USER","U¿ytkownik");
define_once("_USERAVGRATING","Ocena ¶rednia u¿ytkownika");
define_once("_NUMRATINGS","# ocen");
define_once("_REGISTEREDUSERS","Zarejestrowanych u¿ytkowników");
define_once("_NUMBEROFRATINGS","Ilo¶æ ocen");
define_once("_NOREGUSERSVOTES","Brak g³osów zarejestrowanych u¿ytkowników");
define_once("_BREAKDOWNBYVAL","Awaria oceniania poprzez warto¶æ");
define_once("_LTOTALVOTES","razem g³osów");
define_once("_HIGHRATING","Najwy¿sze oceny");
define_once("_LOWRATING","Najni¿sze oceny");
define_once("_NUMOFCOMMENTS","Liczba komentarzy");
define_once("_WEIGHNOTE","* Nota: Stosunek ocen u¿ytkowników zarejestrowanych do ocen u¿ytkowników niezarejestrowanych");
define_once("_NOUNREGUSERSVOTES","Brak g³osów niezarejestrowanych u¿ytkowników");
define_once("_WEIGHOUTNOTE","* Nota: Stosunek ocen u¿ytkowników zarejestrowanych do ocen innych u¿ytkowników");
define_once("_NOOUTSIDEVOTES","Brak zewnêtrznych g³osów");
define_once("_OUTSIDEVOTERS","G³osuj±cy z zewn±trz");
define_once("_UNREGISTEREDUSERS","Niezarejestrowanych u¿ytkowników");
define_once("_PROMOTEYOURSITE","Wypromuj swoj± stronê");
define_once("_PROMOTE01","Mo¿e jeste¶ zainteresowany(a) kilkoma dostêpnymi opcjami zdalnego oceniania strony? To pozwoli Ci umie¶ciæ obraz (lub nawet formularz) na Twojej stronie, aby podnie¶æ liczbê g³osów na Twoj± stronê. Prosimy wybraæ jedn± z opcji umieszczonych poni¿ej:");
define_once("_TEXTLINK","Tekst linku");
define_once("_PROMOTE02","Jedyny sposób pod³±czenia siê do formularza ocen to prosty link tekstowy:");
define_once("_HTMLCODE1","Kod HTML, który trzeba zastosowaæ w tym przypadku, to:");
define_once("_THENUMBER","Numer");
define_once("_IDREFER","Numer ID Twojej strony w bazie danych $sitename. Upewnij siê, czy taki numer istnieje.");
define_once("_BUTTONLINK","Link przyciskowy");
define_once("_PROMOTE03","Je¶li szukasz niewiele ponad prosty link tekstowy, to mo¿e chcesz zastosowaæ link przyciskowy:");
define_once("_RATEIT","Oceñ tê stronê!");
define_once("_HTMLCODE2","Kod ¼ród³owy powy¿szego przycisku to:");
define_once("_REMOTEFORM","Zdalny formularz g³osowania");
define_once("_PROMOTE04","Je¿eli bêdziesz tu oszukiwaæ, usuniemy Twój link. Mówimy, ¿e to jest zdalny formularz g³osowania, który wygl±da tak");
define_once("_VOTE4THISSITE","G³osuj na tê stronê!");
define_once("_HTMLCODE3","U¿ycie tego formularza powoli u¿ytkownikom na ocenê Twego zasobu bezpo¶rednio z Twojej strony i zapisanie wyniku tutaj. Powy¿szy formularz jest wy³±czony, ale nastêpuj±cy kod ¼ród³owy bêdzie dzia³a³ je¿eli po prostu skopiujesz go i wkleisz na swoj± stronê. Kod ¼ród³owy pokazujemy poni¿ej:");
define_once("_PROMOTE05","Dziêkujemy! Powodzenia w ocenach!");
define_once("_STAFF","Zespó³");
define_once("_THANKSBROKEN","Dziêkujemy za pomoc w utrzymaniu integralno¶ci tego katalogu.");
define_once("_SECURITYBROKEN","Z powodów bezpieczeñstwa Twoja nazwa u¿ytkownika i adres IP bêd± zapisywane.");
define_once("_THANKSFORINFO","Dziêkujemy za informacje.");
define_once("_LOOKTOREQUEST","Zajrzymy niebawem w Twoj± sugestiê.");
define_once("_SENDREQUEST","Wy¶lij ¿±danie");
define_once("_THANKSTOTAKETIME","Dziêkujemy za spêdzenie czasu na ocenê strony");
define_once("_RETURNTO","Powrót do");
define_once("_RATENOTE1","Prosimy nie g³osowaæ na ten sam zasób wiêcej ni¿ raz.");
define_once("_RATENOTE2","Skala jest od 1 do 10, gdzie 1 znaczy kiepski i 10 znaczy wspania³y.");
define_once("_RATENOTE3","Prosimy o obiektywizm w g³osowaniu, je¶li kto¶ otrzyma 1 i 10, ocena nie bêdzie zbyt u¿yteczna.");
define_once("_RATENOTE5","Nie g³osuj na w³asne zasoby lub zasoby konkurencji.");
define_once("_YOUAREREGGED","Jeste¶ zarejestrowanym i zalogowanym u¿ytkownikiem.");
define_once("_FEELFREE2ADD","Swobodnie dodaj komentarz na temat tego pliku.");
define_once("_YOUARENOTREGGED","Nie jeste¶ zarejestrowanym u¿ytkownikiem lub siê nie zalogowa³e¶(a¶).");
define_once("_IFYOUWEREREG","Je¶li siê zarejestrujesz, mo¿esz dodawaæ komentarze na tej stronie.");
define_once("_TITLE","Tytu³");
define_once("_MODIFY","Modyfikuj");
define_once("_COMPLETEVOTE1","Twój g³os ma du¿e znaczenie dla nas.");
define_once("_COMPLETEVOTE2","G³osowa³e¶ na ten zasób $anonwaitdays dni temu.");
define_once("_COMPLETEVOTE3","G³osuj tylko raz.<br>Wszystkie g³osy s± logowane i sprawdzane.");
define_once("_COMPLETEVOTE4","Nie mo¿esz g³osowaæ na link, który sam doda³e¶.<br>Wszystkie g³osy s± logowane i sprawdzane.");
define_once("_COMPLETEVOTE5","Nie wybrana ocena - g³os nie zaliczony");
define_once("_COMPLETEVOTE6","Tylko jeden g³os dozwolony raz na $outsidewaitdays dni.");
define_once("_LINKSDATESTRING","%d-%m-%Y");

