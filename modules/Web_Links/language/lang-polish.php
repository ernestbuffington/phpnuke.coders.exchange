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
/*                                                                        */
/* Polish translation by Nordavind®(Bolo) (http://forum.phpnuke.org.pl)   */
/*                                                                        */
/**************************************************************************/

define_once("_URL","URL");
define_once("_PREVIOUS","Poprzednia strona");
define_once("_NEXT","Nastêpna strona");
define_once("_YOURNAME","Twoje imiê i nazwisko");
define_once("_CATEGORY","Kategoria");
define_once("_CATEGORIES","Kategorie");
define_once("_LVOTES","G³osów");
define_once("_TOTALVOTES","Razem g³osów:");
define_once("_LINKTITLE","Tytu³ linku");
define_once("_HITS","Ods³on");
define_once("_THEREARE","Aktualnie jest(s±)");
define_once("_NOMATCHES","Brak rezultatów wyszukiwania");
define_once("_SCOMMENTS","Komentarze");
define_once("_DESCRIPTION","Opis");
define_once("_ONLYREGUSERSMODIFY","Tylko zarejestrowany u¿ytkownik mo¿e zasugerowaæ modyfikacje. Proszê siê <a href=\"modules.php?name=Your_Account&amp;op=new_user\">zarejestrowaæ lub zalogowaæ</a>.");
define_once("_DATE","Data");
define_once("_TO","Do");
define_once("_ADDLINK","Dodaj link");
define_once("_NEW","Nowy");
define_once("_POPULAR","Popularno¶æ");
define_once("_TOPRATED","Najwy¿ej ocenione");
define_once("_RANDOM","Losowo");
define_once("_LINKSMAIN","G³ówna");
define_once("_LINKCOMMENTS","Komentarze do linków");
define_once("_ADDITIONALDET","Dodatkowe informacje");
define_once("_EDITORREVIEW","Przegl±d redaktora");
define_once("_REPORTBROKEN","Zg³o¶ nieczynne linki");
define_once("_LINKSMAINCAT","G³ówne kategorie");
define_once("_AND","i");
define_once("_INDB","w naszej bazie");
define_once("_ADDALINK","Dodaj nowy link");
define_once("_INSTRUCTIONS","Instrukcje");
define_once("_SUBMITONCE","Wy¶lij dany link tylko raz.");
define_once("_POSTPENDING","Wszystkie wysy³ane linki bêd± weryfikowane.");
define_once("_USERANDIP","Nazwa u¿ytkownika i adres IP s± rejestrowane, wiêc prosimy nie atakowaæ systemu.");
define_once("_PAGETITLE","Tytu³ strony");
define_once("_PAGEURL","Adres strony");
define_once("_YOUREMAIL","Twój adres e-mail");
define_once("_LDESCRIPTION","Opis: (maks. 255 znaków)");
define_once("_ADDURL","Dodaj ten adres");
define_once("_LINKSNOTUSER1","Nie jeste¶ zarejestrowany(a) lub zalogowany(a) jako u¿ytkownik.");
define_once("_LINKSNOTUSER2","Je¶li siê zarejestrujesz, bêdziesz móg³(mog³a) dodawaæ linki na tej stronie.");
define_once("_LINKSNOTUSER3","Rejestracja u¿ytkownika to ³atwy i szybki proces.");
define_once("_LINKSNOTUSER4","Dlaczego wymagamy rejestracji, aby mieæ dostêp do niektórych opcji?");
define_once("_LINKSNOTUSER5","Dlatego, ¿e oferujemy zawarto¶æ wy³±cznie wysokiej jako¶ci,");
define_once("_LINKSNOTUSER6","ka¿da pozycja jest indywidualnie sprawdzana i zatwierdzana przez nasz zespó³.");
define_once("_LINKSNOTUSER7","Mamy nadziejê, ¿e oferujemy Ci wy³±cznie warto¶ciowe informacje.");
define_once("_LINKSNOTUSER8","<a href=\"modules.php?name=Your_Account&amp;op=new_user\">Zarejestruj konto</a>");
define_once("_LINKALREADYEXT","B£¡D: Ten adres ju¿ istnieje w bazie!");
define_once("_LINKNOTITLE","B£¡D: Musisz podaæ TYTU£ Twego URL-a!");
define_once("_LINKNOURL","B£¡D: Musisz podaæ Twój URL!");
define_once("_LINKNODESC","B£¡D: Musisz podaæ OPIS Twego URL-a!");
define_once("_LINKRECEIVED","Otrzymali¶my Twoj± propozycjê linku. Dziêkujemy!");
define_once("_EMAILWHENADD","Otrzymasz e-mail, kiedy go zatwierdzimy.");
define_once("_CHECKFORIT","Nie odpisuj na list. Wkrótce sprawdzimy Twój link.");
define_once("_NEWLINKS","Nowe linki");
define_once("_TOTALNEWLINKS","W sumie nowych linków");
define_once("_LASTWEEK","Ostatni tydzieñ");
define_once("_LAST30DAYS","Ostatnie 30 dni");
define_once("_1WEEK","1 tydzieñ");
define_once("_2WEEKS","2 tygodnie");
define_once("_30DAYS","30 dni");
define_once("_SHOW","Poka¿");
define_once("_TOTALFORLAST","W sumie nowych linków przez");
define_once("_DAYS","dni");
define_once("_ADDEDON","Dodano");
define_once("_RATING","Oceny");
define_once("_RATESITE","Oceñ tê stronê");
define_once("_DETAILS","Detale");
define_once("_BESTRATED","Najwy¿ej ocenione linki - NAJ");
define_once("_OF","z");
define_once("_TRATEDLINKS","w sumie ocenionych linków");
define_once("_TVOTESREQ","minimalna ilo¶æ wymaganych g³osów");
define_once("_SHOWTOP","Poka¿ NAJ");
define_once("_MOSTPOPULAR","Najbardziej popularne - NAJ");
define_once("_OFALL","ze wszystkich");
define_once("_SORTLINKSBY","Sortuj linki wed³ug");
define_once("_SITESSORTED","Strona aktualnie sortowana wed³ug");
define_once("_POPULARITY","Popularno¶æ");
define_once("_SELECTPAGE","Wybierz stronê");
define_once("_MAIN","G³ówna");
define_once("_NEWTODAY","Nowe dzisiaj");
define_once("_NEWLAST3DAYS","Nowe w ostatnich 3 dniach");
define_once("_NEWTHISWEEK","Nowe w tym tygodniu");
define_once("_CATNEWTODAY","Nowe linki w tej kategorii dodane dzisiaj");
define_once("_CATLAST3DAYS","Nowe linki w tej kategorii dodane w ostatnich 3 dniach");
define_once("_CATTHISWEEK","Nowe linki w tej kategorii dodane w tym tygodniu");
define_once("_POPULARITY1","Popularno¶æ (Od najmniej do najczê¶ciej odwiedzanych)");
define_once("_POPULARITY2","Popularno¶æ (Od najczê¶ciej do najmniej odwiedzanych)");
define_once("_TITLEAZ","Tytu³y (od A do Z)");
define_once("_TITLEZA","Tytu³y (od Z do A)");
define_once("_DATE1","Data (stare linki pokazane na pocz±tku)");
define_once("_DATE2","Data (nowe linki pokazane na pocz±tku)");
define_once("_RATING1","Ocena (od najni¿szych do najni¿szych wyników)");
define_once("_RATING2","Ocena (od najwy¿szych do najni¿szych wyników)");
define_once("_SEARCHRESULTS4","Wyniki wyszukiwania dla");
define_once("_USUBCATEGORIES","podkategorie");
define_once("_LINKS","Linki");
define_once("_TRY2SEARCH","Spróbuj poszukaæ");
define_once("_INOTHERSENGINES","w innych wyszukiwarkach");
define_once("_EDITORIAL","Redagowany");
define_once("_LINKPROFILE","Profil linku");
define_once("_EDITORIALBY","Redagowany przez");
define_once("_NOEDITORIAL","Aktualnie brak na tej stronie.");
define_once("_VISITTHISSITE","Odwied¼ tê stronê");
define_once("_RATETHISSITE","Oceñ ten zasób");
define_once("_ISTHISYOURSITE","Czy to Twój zasób?");
define_once("_ALLOWTORATE","Pozwól innym u¿ytkownikom na ocenianie!");
define_once("_LINKRATINGDET","Szczegó³y oceny linku");
define_once("_OVERALLRATING","Ocena ogólna");
define_once("_TOTALOF","Razem");
define_once("_USER","U¿ytkownik");
define_once("_USERAVGRATING","Ocena ¶rednia u¿ytkownika");
define_once("_NUMRATINGS","# ocen");
define_once("_EDITTHISLINK","Edytuj ten link");
define_once("_REGISTEREDUSERS","Zarejestrowanych u¿ytkowników");
define_once("_NUMBEROFRATINGS","Ilo¶æ ocen");
define_once("_NOREGUSERSVOTES","Brak g³osów zarejestrowanych u¿ytkowników");
define_once("_BREAKDOWNBYVAL","Awaria oceniania poprzez warto¶æ");
define_once("_LTOTALVOTES","razem g³osów");
define_once("_LINKRATING","Oceny linków");
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
define_once("_PROMOTE01","Mo¿e jeste¶ zainteresowany(a) kilkoma dostêpnymi opcjami zdalnego oceniania strony?. To pozwoli Ci umie¶ciæ obraz (lub nawet formularz) na Twojej stronie, aby podnie¶æ liczbê g³osów na Twoj± stronê. Prosimy wybraæ jedn± z opcji umieszczonych poni¿ej:");
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
define_once("_LINKVOTE","G³osuj!");
define_once("_HTMLCODE3","U¿ycie tego formularza powoli u¿ytkownikom na ocenê Twego zasobu bezpo¶rednio z Twojej strony i zapisanie wyniku tutaj. Powy¿szy formularz jest wy³±czony, ale nastêpuj±cy kod ¼ród³owy bêdzie dzia³a³ gdy po prostu skopiujesz go i wkleisz na swoj± stronê. Kod ¼ród³owy pokazujemy poni¿ej:");
define_once("_PROMOTE05","Dziêkujemy! Powodzenia w ocenach!");
define_once("_STAFF","Zespó³");
define_once("_THANKSBROKEN","Dziêkujemy za pomoc w utrzymaniu integralno¶ci tego katalogu.");
define_once("_THANKSFORINFO","Dziêkujemy za informacje.");
define_once("_LOOKTOREQUEST","Zajrzymy niebawem w Twoj± sugestiê.");
define_once("_REQUESTLINKMOD","¯±danie modyfikacji linku");
define_once("_LINKID","ID linku");
define_once("_SENDREQUEST","Wy¶lij ¿±danie");
define_once("_THANKSTOTAKETIME","Dziêkujemy za spêdzenie czasu na ocenê strony");
define_once("_LETSDECIDE","Wpisy od u¿ytkowników, takich jak Ty, pomog± innym odwiedzaj±cym zdecydowaæ siê, który z linków warto odwiedziæ");
define_once("_RETURNTO","Powrót do");
define_once("_RATENOTE1","Prosimy nie g³osowaæ na ten sam zasób wiêcej ni¿ raz.");
define_once("_RATENOTE2","Skala jest od 1 do 10, gdzie 1 znaczy kiepski i 10 znaczy wspania³y.");
define_once("_RATENOTE3","Prosimy o obiektywizm w g³osowaniu, je¶li kto¶ otrzyma 1 i 10, ocena nie bêdzie zbyt u¿yteczna.");
define_once("_RATENOTE4","Mo¿esz zobaczyæ listê <a href=\"modules.php?name=Web_Links&l_op=TopRated\">najwy¿ej ocenionych zasobów</a>.");
define_once("_RATENOTE5","Nie g³osuj na w³asne zasoby lub zasoby konkurencji.");
define_once("_YOUAREREGGED","Jeste¶ zarejestrowanym i zalogowanym u¿ytkownikiem.");
define_once("_FEELFREE2ADD","Swobodnie dodaj komentarz na temat tej strony.");
define_once("_YOUARENOTREGGED","Nie jeste¶ zarejestrowanym u¿ytkownikiem lub siê nie zalogowa³e¶(a¶).");
define_once("_IFYOUWEREREG","Je¶li siê zarejestrujesz, mo¿esz dodawaæ komentarze na tej stronie.");
define_once("_WEBLINKS","Linki");
define_once("_TITLE","Tytu³");
define_once("_MODIFY","Modyfikuj");
define_once("_COMPLETEVOTE1","Twój g³os ma du¿e znaczenie dla nas.");
define_once("_COMPLETEVOTE2","G³osowa³e¶ na ten zasób $anonwaitdays dni temu.");
define_once("_COMPLETEVOTE3","G³osuj tylko raz.<br>Wszystkie g³osy s± logowane i sprawdzane.");
define_once("_COMPLETEVOTE4","Nie mo¿esz g³osowaæ na link, który sam doda³e¶.<br>Wszystkie g³osy s± logowane i sprawdzane.");
define_once("_COMPLETEVOTE5","Nie wybrana ocena - g³os nie zaliczony");
define_once("_COMPLETEVOTE6","Tylko jeden g³os dozwolony raz na $outsidewaitdays dni.");
define_once("_LINKSDATESTRING","%d-%m-%Y");

