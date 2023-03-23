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
define_once("_PREVIOUS","Претходна страна");
define_once("_NEXT","Следна страна");
define_once("_YOURNAME","Твоето име");
define_once("_CATEGORY","Категорија");
define_once("_CATEGORIES","Категории");
define_once("_LVOTES","гласови");
define_once("_TOTALVOTES","Вкупно гласови:");
define_once("_LINKTITLE","Наслов на линкот");
define_once("_HITS","Хитови");
define_once("_THEREARE","Има");
define_once("_NOMATCHES","Нема точни резултати за вашето барање");
define_once("_SCOMMENTS","Коментари");
define_once("_DESCRIPTION","Опис");
define_once("_DATE","Дата");
define_once("_TO","До");
define_once("_ADDLINK","Додади линк");
define_once("_NEW","Нови");
define_once("_POPULAR","Најпопуларни");
define_once("_TOPRATED","Најдобро оценети");
define_once("_RANDOM","Случајни");
define_once("_LINKSMAIN","Линкови, главна страна");
define_once("_LINKCOMMENTS","Коментари за линкови");
define_once("_ADDITIONALDET","Дополнителни детали");
define_once("_EDITORREVIEW","Критика на уредникот");
define_once("_REPORTBROKEN","Извести за непостоечки линк");
define_once("_LINKSMAINCAT","Главни категории за линковите");
define_once("_AND","и");
define_once("_INDB","во нашата база");
define_once("_ADDALINK","Додади нов линк");
define_once("_INSTRUCTIONS","Упатствa");
define_once("_SUBMITONCE","Не испраќај ист линк двапати.");
define_once("_POSTPENDING","Сите пратени ликови чекаат за потврда.");
define_once("_USERANDIP","Корисничото име и IP адресата се снимаат, и затоа ве молиме да не го злоупотребувате системот.");
define_once("_PAGETITLE","Наслов на страната");
define_once("_PAGEURL","Адреса на страната");
define_once("_YOUREMAIL","Твојот e-mail");
define_once("_LDESCRIPTION","Опис: (најмногу 255 знаци)");
define_once("_ADDURL","Додај ја оваа адреса");
define_once("_LINKSNOTUSER1","Не си регистриран или логиран.");
define_once("_LINKSNOTUSER2","Ако си регистриран корисник, можеш да додаваш линкови на оваа страница.");
define_once("_LINKSNOTUSER3","Да станеш регистриран корисник е брз и лесен процес.");
define_once("_LINKSNOTUSER4","Зошто бараме да се регистрираш за пристап до одредени опции?");
define_once("_LINKSNOTUSER5","За да можеме да понудиме содржини со најголем можен квалитет.");
define_once("_LINKSNOTUSER6","Секоја содржина е индивидуално прегледана и одобрена од нашиот тим.");
define_once("_LINKSNOTUSER7","Се надеваме дека ви нудиме само квалитетни соджини.");
define_once("_LINKSNOTUSER8","<a href=\modules.php?name=Your_Account\>Регистрирај се</a>.");
define_once("_LINKALREADYEXT","Грешка: URL-то е веќе во базата!");
define_once("_LINKNOTITLE","Грешка: Треба да напишеш НАСЛОВ за твоето URL!");
define_once("_LINKNOURL","Грешка: Треба да напишеш адреса за твоето URL!");
define_once("_LINKNODESC","Грешка: Треба да напишеш ОПИС за твоето URL!");
define_once("_LINKRECEIVED","Го добивме твојот линк. Благодариме!");
define_once("_EMAILWHENADD","Ќе добиеш e-mail кога ќе биде одобрено.");
define_once("_CHECKFORIT","Не си напишал е-mail. Како и да е, ќе го провериме твојот линк наскоро.");
define_once("_NEWLINKS","Нови линкови");
define_once("_TOTALNEWLINKS","Вкупно нови линкови");
define_once("_LASTWEEK","Последната недела");
define_once("_LAST30DAYS","Последните 30 дена");
define_once("_1WEEK","1 недела");
define_once("_2WEEKS","2 недели");
define_once("_30DAYS","30 дена");
define_once("_SHOW","Прикажи");
define_once("_TOTALFORLAST","Вкупно нови линкови за");
define_once("_DAYS","дена");
define_once("_ADDEDON","Додадено на");
define_once("_RATING","Оцена");
define_once("_RATESITE","Оцени ја оваа страна");
define_once("_DETAILS","Детали");
define_once("_BESTRATED","Најдобро оценети линкови - Топ листа");
define_once("_OF","од");
define_once("_TRATEDLINKS","вкупно оценети линкови");
define_once("_TVOTESREQ","минимум гласови потребни");
define_once("_SHOWTOP","Покажи ги најдобрите");
define_once("_MOSTPOPULAR","Најпопуларни - Топ листа");
define_once("_OFALL","од сите");
define_once("_SORTLINKSBY","Подреди ги линковите по");
define_once("_SITESSORTED","Сајтовите се моментално сортирани по");
define_once("_POPULARITY","Популарност");
define_once("_SELECTPAGE","Одбери страна");
define_once("_MAIN","Главна");
define_once("_NEWTODAY","Нови денес");
define_once("_NEWLAST3DAYS","Нови во последните 3 дена");
define_once("_NEWTHISWEEK","Нови оваа недела");
define_once("_CATNEWTODAY","Нови линкови во оваа категорија додадени денеска");
define_once("_CATLAST3DAYS","Нови линкови додадени во оваа категорија во последните 3 дена");
define_once("_CATTHISWEEK","Нови линкови во оваа категорија додадени последната недела");
define_once("_POPULARITY1","Популарност (од најмалку до најмногу посети)");
define_once("_POPULARITY2","Популарност (од најмалку до најмногу посети)");
define_once("_TITLEAZ","Наслов (A до Ш)");
define_once("_TITLEZA","Наслов (Ш до A)");
define_once("_DATE1","Дата (старите линкови први)");
define_once("_DATE2","Дата (новите линкови први)");
define_once("_RATING1","Рејтинг (од најмалку бодови, кон најмногу)");
define_once("_RATING2","Рејтинг (од најмногу бодови, кон најмалку)");
define_once("_SEARCHRESULTS4","Резултати од пребарувањето за");
define_once("_USUBCATEGORIES","Подкатегории");
define_once("_LINKS","Линкови");
define_once("_TRY2SEARCH","Обиди се да бараш");
define_once("_INOTHERSENGINES","во други пребарувачи");
define_once("_EDITORIAL","Осврт на уредникот");
define_once("_LINKPROFILE","Профил на линкот");
define_once("_EDITORIALBY","Напишано од");
define_once("_NOEDITORIAL","Нема осврт за оваа страна.");
define_once("_VISITTHISSITE","Посети го овој сајт");
define_once("_RATETHISSITE","Оцена");
define_once("_ISTHISYOURSITE","Дали е ова твоја страна?");
define_once("_ALLOWTORATE","Дозволи и други корисници да даваат оцена преку твојата страна!");
define_once("_LINKRATINGDET","Детали за оцените на линкот");
define_once("_OVERALLRATING","Вкупна оцена");
define_once("_TOTALOF","Од");
define_once("_USER","Корисник");
define_once("_USERAVGRATING","Просечна оцена");
define_once("_NUMRATINGS","# број на оцени");
define_once("_EDITTHISLINK","Измени го овој линк");
define_once("_REGISTEREDUSERS","Регистрирани корисници");
define_once("_NUMBEROFRATINGS","Број на оцени");
define_once("_NOREGUSERSVOTES","Нема гласови на регистрирани корисници");
define_once("_BREAKDOWNBYVAL","Гласови по вредност");
define_once("_LTOTALVOTES","вкупно гласови");
define_once("_LINKRATING","Оцена на линкови");
define_once("_HIGHRATING","Највисока оцена");
define_once("_LOWRATING","Најницка оцена");
define_once("_NUMOFCOMMENTS","Број на коментари");
define_once("_WEIGHNOTE","* Забелешка: Ова ги споредува оцените кои ги дале регистрирани и нерегистрирани корисници");
define_once("_NOUNREGUSERSVOTES","Нема гласови на нерегистрирани корисници");
define_once("_WEIGHOUTNOTE","* Забелешка: Ова ги споредува оцените кои ги дале внатрешни и надворешни корисници");
define_once("_NOOUTSIDEVOTES","Нема надворешни оцени");
define_once("_OUTSIDEVOTERS","Надворешни оцени");
define_once("_UNREGISTEREDUSERS","Нерегистрирани корисници");
define_once("_PROMOTEYOURSITE","Направи промоција на твојата страна");
define_once("_PROMOTE01","Можеби си заинтересиран за неколку од надворешните „оцени страна“ опции кои ни се достапни. Тие ќе ти овозможат да ставиш слика (дури и формулар за оцена) кај тебе со цел да го зголемиш бројот на гласови што ќе ги добие твојата страна. Одбери од опциите што се прикажани подолу:");
define_once("_TEXTLINK","Текстуален линк");
define_once("_PROMOTE02","Еден од начините е да направиш линк преку обичен тексуален линк:");
define_once("_HTMLCODE1","HTML кодот што треба да го користи во овој случај е следниот:");
define_once("_THENUMBER","Бројот");
define_once("_IDREFER","во HTML кодот се однесува на идентификационит број на твојот сајт во базата на $sitename .  Биди сигурен дека овој број е присутен.");
define_once("_BUTTONLINK","Линк - копче");
define_once("_PROMOTE03","Ако ти треба малку повеќе од обичен текстуален линк, можеби ќе сакаш да додадеш малечко копче - линк:");
define_once("_RATEIT","Оцени ја оваа страна!");
define_once("_HTMLCODE2","Кодот за горното копче е:");
define_once("_REMOTEFORM","Формулар за оцена од далеку");
define_once("_PROMOTE04","Ако лажеш за ова ќе го отстраниме твојот линк. Откако ова е кажано, еве како изгледа формуларот за оцена директно од твојата страна.");
define_once("_VOTE4THISSITE","Гласај за оваа страна!");
define_once("_LINKVOTE","Гласај!");
define_once("_HTMLCODE3","Користејќи го овој формулар ќе им дозволиш на корисниците да ја оценат твојата страна директно од кај тебе и оцената ќе биде снимена тука. Горната формулар е исклучен, но кодот ќе работи ако едноставно направиш copy&paste на твојата вебстрана. Кодот е прикажан подолу:");
define_once("_PROMOTE05","Благодариме, и среќно со оцените!");
define_once("_STAFF","Личен дел");
define_once("_THANKSBROKEN","Благодариме што помагаш за грижата за инегритетот на директориумот.");
define_once("_THANKSFORINFO","Благодариме за информацијата.");
define_once("_LOOKTOREQUEST","Твоето барање наскоро ќе биде прегледано.");
define_once("_ONLYREGUSERSMODIFY","Само регистрирани корисници можат да предложат модификација на линковите. Ве молам, <a href=\"modules.php?name=Your_Account\">регистрирајте се или логирајте се</a>.");
define_once("_REQUESTLINKMOD","Побарајте модификација на линкот");
define_once("_LINKID","Идентификација на линкот");
define_once("_SENDREQUEST","Испрати барање");
define_once("_THANKSTOTAKETIME","Благодариме на потрошеното време за оцена на страната");
define_once("_LETSDECIDE","Учеството на корисници како тебе ќе ни помогне да им помогнеме на другите корисници во полесното одлучување на кој линк да притиснат.");
define_once("_RETURNTO","Назад кон");
define_once("_RATENOTE1","Не гласајте за истата страна повеќе од еднаш.");
define_once("_RATENOTE2","Скалата е од 1 - 10.");
define_once("_RATENOTE3","Биди објективен. Ако сите добиваат 1 или десет тогаш оцените не се многу корисни.");
define_once("_RATENOTE4","Можете да ја погледнете <a href=\"links.php?op=TopRated\">топ листата на сајтови</a>.");
define_once("_RATENOTE5","Немој да гласаш за твојата страна, или за страната на конкурентот.");
define_once("_YOUAREREGGED","Ти си регистриран корисник и си логиран.");
define_once("_FEELFREE2ADD","Слободно додади кометар за оваа страна.");
define_once("_YOUARENOTREGGED","Ти не си регистриран корисник или не си логиран.");
define_once("_IFYOUWEREREG","Ако си регистриран можеш да даваш коментари на оваа страна.");
define_once("_WEBLINKS","Веб линкови");
define_once("_TITLE","Наслов");
define_once("_MODIFY","Измени");
define_once("_COMPLETEVOTE1","Твојот глас се цени.");
define_once("_COMPLETEVOTE2","Веќе си гласал за ова во последните $anonwaitdays дена.");
define_once("_COMPLETEVOTE3","Гласај за еден ресурс само еднаш.<br>Сите гласови се логираат и прегледуваат.");
define_once("_COMPLETEVOTE4","Не можеш да гласаш за нешто што ти си го поднел.<br>Сите гласови се логираат и прегледуваат.");
define_once("_COMPLETEVOTE5","Нема оцена - нема регистриран глас");
define_once("_COMPLETEVOTE6","Дозволен е само еден глас по IP адреса секои $outsidewaitdays дена.");
define_once("_LINKSDATESTRING","%d %B %Y");


