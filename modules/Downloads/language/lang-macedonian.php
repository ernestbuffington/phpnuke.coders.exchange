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
define_once("_PREVIOUS","Претходна страна");
define_once("_NEXT","Следна страна");
define_once("_CATEGORY","Категорија");
define_once("_CATEGORIES","Категории");
define_once("_LVOTES","гласови");
define_once("_TOTALVOTES","Вкупно гласови:");
define_once("_THEREARE","Има");
define_once("_NOMATCHES","Нема точни резултати за вашето барање");
define_once("_SCOMMENTS","Коментари");
define_once("_UNKNOWN","Непознато");
define_once("_AUTHORNAME","Име на авторот");
define_once("_AUTHOREMAIL","E-mail на авторот");
define_once("_DOWNLOADNAME","Име на програмата");
define_once("_ADDTHISFILE","Додади ја оваа датотека");
define_once("_INBYTES","во бајти");
define_once("_FILESIZE","Големина на датотеката");
define_once("_VERSION","Верзија");
define_once("_DESCRIPTION","Опис");
define_once("_AUTHOR","Автор");
define_once("_HOMEPAGE","Домашна страна");
define_once("_DOWNLOADNOW","Симни ја оваа датотека сега!");
define_once("_RATERESOURCE","Дај оцена");
define_once("_FILEURL","Линк за датотеката");
define_once("_ADDDOWNLOAD","Додади датотека за преземање");
define_once("_DOWNLOADSMAIN","Преземања, главна страна");
define_once("_DOWNLOADCOMMENTS","Коментари за снимањата");
define_once("_DOWNLOADSMAINCAT","Главни категории");
define_once("_ADDADOWNLOAD","Додади ново преземање");
define_once("_DSUBMITONCE","Додади едно преземање само еднаш.");
define_once("_DPOSTPENDING","Сите фајлови што се постирани чекаат потврда.");
define_once("_RESSORTED","Датотеките се сортирани по");
define_once("_DOWNLOADSNOTUSER1","Или не си регистриран корисник, или не си логиран.");
define_once("_DOWNLOADSNOTUSER2","Ако си регистриран можеш да додадеш датотеки за преземање на оваа страна.");
define_once("_DOWNLOADSNOTUSER3","Регистрирањето е брз и лесен процес.");
define_once("_DOWNLOADSNOTUSER4","Зошто бараме регистација за пристап до одредени места на страната?");
define_once("_DOWNLOADSNOTUSER5","За да можеме да понудиме содржини со највисок кваалитет,");
define_once("_DOWNLOADSNOTUSER6","се што е индивидуално пратено е прегледано од нашата екипа.");
define_once("_DOWNLOADSNOTUSER7","Се надеваме дека нудиме само вредни информации.");
define_once("_DOWNLOADSNOTUSER8","<a href=\modules.php?name=Your_Account\>Регистрирај се</a>");
define_once("_DOWNLOADALREADYEXT","Грешка: Ова адреса е веќе во базата!");
define_once("_DOWNLOADNOTITLE","Грешка: Мора да напишеш наслов за твојата адреса!");
define_once("_DOWNLOADNOURL","Грешка: Треба да напишеш адреса!");
define_once("_DOWNLOADNODESC","Грешка: Треба да напишеш опис за твојата адреса!");
define_once("_DOWNLOADRECEIVED","Го добивме линкот за новата датотека за преземање. Благодариме!");
define_once("_NEWDOWNLOADS","Нови датотеки");
define_once("_TOTALNEWDOWNLOADS","Вкупно нови датотеки");
define_once("_DTOTALFORLAST","Вкупно нови датотеки за последните");
define_once("_DBESTRATED","Најдобро оценети датотеки - Топ листа");
define_once("_TRATEDDOWNLOADS","вкупно оценети датотеки");
define_once("_SORTDOWNLOADSBY","Сортирај ги по");
define_once("_DCATNEWTODAY","Нови датотеки во оваа категорија додадени денес");
define_once("_DCATLAST3DAYS","Нови датотеки во оваа категорија, додадени во последните 3 дена");
define_once("_DCATTHISWEEK","Нови фајлови во оваа категорија додадени последнава недела");
define_once("_DDATE1","Дата (Старите датотеки се прикажани последни)");
define_once("_DDATE2","Дата (Старите датотеки се прикажани први)");
define_once("_DOWNLOADS","Датотеки");
define_once("_DOWNLOADPROFILE","Профил");
define_once("_DOWNLOADRATINGDET","Детали за оцените");
define_once("_EDITTHISDOWNLOAD","Измени карактеристики");
define_once("_DOWNLOADRATING","Оцена");
define_once("_DOWNLOADVOTE","Гласај!");
define_once("_DONLYREGUSERSMODIFY","Само регистрирани корисници може да доставуваат барања за измени на преземањата. <a href=\"modules.php?name=Your_Account\">Регистрирај се или логирај се</a>.");
define_once("_REQUESTDOWNLOADMOD","Побарана измена");
define_once("_DOWNLOADID","Идентификација на датотеката");
define_once("_DLETSDECIDE","Коментарите од корисници како тебе ќе им помогнат и на другите посетители подобро да се одлучат која датотека да ја одберат.");
define_once("_DRATENOTE4","Можеш да ја погледнеш листата со <a href=\"downloads.php?op=TopRated\">најдобро оценети датотеки</a>.");
define_once("_DATE","Дата");
define_once("_TO","До");
define_once("_NEW","Нови");
define_once("_POPULAR","Најпопуларни");
define_once("_TOPRATED","Најдобро оценети");
define_once("_ADDITIONALDET","Дополнителни детали");
define_once("_EDITORREVIEW","Критика на уредникот");
define_once("_REPORTBROKEN","Извести за непостоечки линк");
define_once("_AND","и");
define_once("_INDB","во нашата база");
define_once("_INSTRUCTIONS","Упатствa");
define_once("_USERANDIP","Корисничото име и IP адресата се снимаат, и затоа ве молиме да не го злоупотребувате системот.");
define_once("_LDESCRIPTION","Опис: (најмногу 255 знаци)");
define_once("_CHECKFORIT","Не си напишал е-mail. Како и да е, ќе го провериме твојот линк наскоро.");
define_once("_LASTWEEK","Последната недела");
define_once("_LAST30DAYS","Последните 30 дена");
define_once("_1WEEK","1 недела");
define_once("_2WEEKS","2 недели");
define_once("_30DAYS","30 дена");
define_once("_SHOW","Прикажи");
define_once("_DAYS","дена");
define_once("_ADDEDON","Додадено на");
define_once("_RATING","Оцена");
define_once("_DETAILS","Детали");
define_once("_OF","од");
define_once("_TVOTESREQ","минимум гласови потребни");
define_once("_SHOWTOP","Покажи ги најдобрите");
define_once("_MOSTPOPULAR","Најпопуларни - Топ листа");
define_once("_OFALL","од сите");
define_once("_POPULARITY","Популарност");
define_once("_SELECTPAGE","Одбери страна");
define_once("_MAIN","Главна");
define_once("_NEWTODAY","Нови денес");
define_once("_NEWLAST3DAYS","Нови во последните 3 дена");
define_once("_NEWTHISWEEK","Нови оваа недела");
define_once("_POPULARITY1","Популарност (од најмалку до најмногу посети)");
define_once("_POPULARITY2","Популарност (од најмалку до најмногу посети)");
define_once("_TITLEAZ","Наслов (A до Ш)");
define_once("_TITLEZA","Наслов (Ш до A)");
define_once("_RATING1","Рејтинг (од најмалку бодови, кон најмногу)");
define_once("_RATING2","Рејтинг (од најмногу бодови, кон најмалку)");
define_once("_SEARCHRESULTS4","Резултати од пребарувањето за");
define_once("_USUBCATEGORIES","Подкатегории");
define_once("_TRY2SEARCH","Обиди се да бараш");
define_once("_INOTHERSENGINES","во други пребарувачи");
define_once("_EDITORIAL","Осврт на уредникот");
define_once("_EDITORIALBY","Напишано од");
define_once("_NOEDITORIAL","Нема осврт за оваа страна.");
define_once("_RATETHISSITE","Оцена");
define_once("_ISTHISYOURSITE","Дали е ова твоја страна?");
define_once("_ALLOWTORATE","Дозволи и други корисници да даваат оцена преку твојата страна!");
define_once("_OVERALLRATING","Вкупна оцена");
define_once("_TOTALOF","Од");
define_once("_USER","Корисник");
define_once("_USERAVGRATING","Просечна оцена");
define_once("_NUMRATINGS","# број на оцени");
define_once("_REGISTEREDUSERS","Регистрирани корисници");
define_once("_NUMBEROFRATINGS","Број на оцени");
define_once("_NOREGUSERSVOTES","Нема гласови на регистрирани корисници");
define_once("_BREAKDOWNBYVAL","Гласови по вредност");
define_once("_LTOTALVOTES","вкупно гласови");
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
define_once("_HTMLCODE3","Користејќи го овој формулар ќе им дозволиш на корисниците да ја оценат твојата страна директно од кај тебе и оцената ќе биде снимена тука. Горната формулар е исклучен, но кодот ќе работи ако едноставно направиш copy&paste на твојата вебстрана. Кодот е прикажан подолу:");
define_once("_PROMOTE05","Благодариме, и среќно со оцените!");
define_once("_STAFF","Личен дел");
define_once("_THANKSBROKEN","Благодариме што помагаш за грижата за инегритетот на директориумот.");
define_once("_SECURITYBROKEN","Поради сигурности причини твоето корисничко име и IP адреса ќе бидат привремено снимени.");
define_once("_THANKSFORINFO","Благодариме за информацијата.");
define_once("_LOOKTOREQUEST","Твоето барање наскоро ќе биде прегледано.");
define_once("_SENDREQUEST","Испрати барање");
define_once("_THANKSTOTAKETIME","Благодариме на потрошеното време за оцена на страната");
define_once("_RETURNTO","Назад кон");
define_once("_RATENOTE1","Не гласајте за истата страна повеќе од еднаш.");
define_once("_RATENOTE2","Скалата е од 1 - 10.");
define_once("_RATENOTE3","Биди објективен. Ако сите добиваат 1 или десет тогаш оцените не се многу корисни.");
define_once("_RATENOTE5","Немој да гласаш за твојата страна, или за страната на конкурентот.");
define_once("_YOUAREREGGED","Ти си регистриран корисник и си логиран.");
define_once("_FEELFREE2ADD","Слободно додади кометар за оваа страна.");
define_once("_YOUARENOTREGGED","Ти не си регистриран корисник или не си логиран.");
define_once("_IFYOUWEREREG","Ако си регистриран можеш да даваш коментари на оваа страна.");
define_once("_TITLE","Наслов");
define_once("_MODIFY","Измени");
define_once("_COMPLETEVOTE1","Твојот глас се цени.");
define_once("_COMPLETEVOTE2","Веќе си гласал за ова во последните $anonwaitdays дена.");
define_once("_COMPLETEVOTE3","Гласај за еден ресурс само еднаш.<br>Сите гласови се логираат и прегледуваат.");
define_once("_COMPLETEVOTE4","Не можеш да гласаш за нешто што ти си го поднел.<br>Сите гласови се логираат и прегледуваат.");
define_once("_COMPLETEVOTE5","Нема оцена - нема регистриран глас");
define_once("_COMPLETEVOTE6","Дозволен е само еден глас по IP адреса секои $outsidewaitdays дена.");
define_once("_LINKSDATESTRING","%d %B %Y");


