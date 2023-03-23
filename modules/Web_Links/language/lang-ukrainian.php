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


define_once("_PREVIOUS","Попережня сторінка");
define_once("_NEXT","Наступна сторінка");
define_once("_YOURNAME","Ваше ім'я");
define_once("_CATEGORY","Категорія");


define_once("_CATEGORIES","Категорії");
define_once("_LVOTES","голосів");
define_once("_TOTALVOTES","Всього голосів:");
define_once("_LINKTITLE","Назва ресурсу");
define_once("_HITS","Хітів");

define_once("_THEREARE","");
define_once("_NOMATCHES","По вашому запиту нічого не знайдено");
define_once("_SCOMMENTS","коментарях");
define_once("_DESCRIPTION","Опис");
define_once("_SUBMITONCE","Пропонуйте тільки унікальні ресурси.");
define_once("_POSTPENDING","Всі ресурси публікуються тільки після перевірки.");
define_once("_CHECKFORIT","Після перевірки ресурс буде опубліковано в каталозі.");
define_once("_TOTALFORLAST","Всього за останні");
define_once("_BESTRATED","Найкращі ресурси");
define_once("_CATNEWTODAY","Файли цієї категорії добавлені сьогодні");
define_once("_CATLAST3DAYS","Файли цієї категорії добавлені за останні три дні");
define_once("_CATTHISWEEK","Файли цієї категорії добавлені на протязі тижня");
define_once("_DATE1","Старі файли на початок.");
define_once("_DATE2","Нові файли на початок.");
define_once("_PROMOTE02","");
define_once("_PROMOTE03","");
define_once("_PROMOTE04","");
define_once("_ONLYREGUSERSMODIFY","Тільки зареєстровані користувачі можуть скачувати модифікації. Будь ласка, <a href=\"modules.php?name=Your_Account\">зареєструйтесь або ввійдіть в систему</a>.");
## define_once("_LETSDECIDE","Введіть користувачів, які поможуть іншим відвідувачам вирішити що скачувати.");
define_once("_RATENOTE4","Ви можете поглянути на <a href=\"downloads.php?op=TopRated\">список кращих ресурсів</a>.");
define_once("_DATE","Дата");
define_once("_TO","до");
define_once("_ADDLINK","Додати");
define_once("_NEW","Нові");
define_once("_POPULAR","Популярні");
define_once("_TOPRATED","Кращі");
define_once("_RANDOM","Випадкові");
define_once("_LINKSMAIN","Каталог ресурсів");
define_once("_LINKCOMMENTS","Коментарі");
define_once("_ADDITIONALDET","Статистика");
define_once("_EDITORREVIEW","Огляди");
define_once("_REPORTBROKEN","Повідомити про неробочий ресурс");
define_once("_LINKSMAINCAT","Каталог ресурсів");
define_once("_AND","і");
define_once("_INDB","в нашій базі даних");
define_once("_ADDALINK","Додати новий ресурс");
define_once("_INSTRUCTIONS","Інструкції");
define_once("_USERANDIP","Не треба декілька разів добавляти один і той же ресурс.");
define_once("_PAGETITLE","Назва сторінки");
define_once("_PAGEURL","URL сторінки");
define_once("_YOUREMAIL","Ваш Email");
define_once("_LDESCRIPTION","Опис: (максимум 255 символів)");
define_once("_ADDURL","Додати URL");
define_once("_LINKSNOTUSER1","Ви незареєстрований користувач або ви не ввійшли в сисему.");
define_once("_LINKSNOTUSER2","Якщо ви зареєстровані, то ви можете добавляти ресурси в цей каталог.");
define_once("_LINKSNOTUSER3","Стати зареєстрованим користувачем легко і швидко.");
define_once("_LINKSNOTUSER4","Чому ми вимагаєм реєстрації для доступу до певних розділів?");
define_once("_LINKSNOTUSER5","Тільки так ми зможем запропонувати вам найкраще.");
define_once("_LINKSNOTUSER6","Кожний новий сайт проходить індивідуальну перевірку модератора.");
define_once("_LINKSNOTUSER7","Ми хочемо запропонувати вам тільки цінну інформацію.");
define_once("_LINKSNOTUSER8","<a href=\"modules.php?name=Your_Account\">Реєстрація</a>");
define_once("_LINKALREADYEXT","ПОМИЛКА: Цей URL уже є в базі даних!");
define_once("_LINKNOTITLE","ПОМИЛКА: Ви не вказали НАЗВУ вашого ресурсу!");
define_once("_LINKNOURL","ПОМИЛКА: Ви не вказали URL вашого ресурсу!");
define_once("_LINKNODESC","ПОМИЛКА: Ви не вказали ОПИС вашого ресурсу!");
define_once("_LINKRECEIVED","Ми отримали ваш ресурс. Дякуємо!");
define_once("_EMAILWHENADD","Вас буде повідомлено по Email, коли його буде схвалено.");
define_once("_NEWLINKS","Нові ресурси");
define_once("_TOTALNEWLINKS","Всього нових ресурсів");
define_once("_LASTWEEK","За останній тиждень");
define_once("_LAST30DAYS","За останні 30 днів");
define_once("_1WEEK","1 тиждень");
define_once("_2WEEKS","2 тижні");
define_once("_30DAYS","30 днів");
define_once("_SHOW","Показати");
define_once("_DAYS","днів");
define_once("_ADDEDON","Дата");


define_once("_RATING","Рейтинг");
define_once("_RATESITE","Оцініть цей сайт");
define_once("_DETAILS","Статистика");
define_once("_OF","");
define_once("_TRATEDLINKS","всього оцінених ресурсів");
define_once("_TVOTESREQ","необхідний мінімум голосів");
define_once("_SHOWTOP","Показати найкращі");
define_once("_MOSTPOPULAR","Популярні ресурси");
define_once("_OFALL","всі");
define_once("_SORTLINKSBY","Сортувати ресурси по");
define_once("_SITESSORTED","Порядок");
define_once("_POPULARITY","Популярності");
define_once("_SELECTPAGE","Вибрати сторінку");
define_once("_MAIN","Головна");
define_once("_NEWTODAY","Сьогоднішні новинки");
define_once("_NEWLAST3DAYS","Новинки за останні три дні");
define_once("_NEWTHISWEEK","Новинки тижня");
define_once("_POPULARITY1","найпопулярніші в кінець");
define_once("_POPULARITY2","найпопулярніні на початок");
define_once("_TITLEAZ","по назві (від A до Я)");
define_once("_TITLEZA","по назві (від Я до A)");
define_once("_RATING1","найкращі в кінець");
define_once("_RATING2","найкращі на початок");
define_once("_SEARCHRESULTS4","Результати пошуку");
define_once("_USUBCATEGORIES","Підрозділи");
define_once("_LINKS","ресурсів");
define_once("_TRY2SEARCH","Спробуйте пошукати");
define_once("_INOTHERSENGINES","в інших пошукових машинах");
define_once("_EDITORIAL","Огляд");
define_once("_LINKPROFILE","Опис ресурсу");
define_once("_EDITORIALBY","Огляд від");
define_once("_NOEDITORIAL"," Для цього сайту немає оглядів.");
define_once("_VISITTHISSITE","Відвідайте цей вебсайт");
define_once("_RATETHISSITE","Оцініть цей вебсайт");
define_once("_ISTHISYOURSITE","Це ваш ресурс?");
define_once("_ALLOWTORATE","Дозвольте відвідувачам інших сайтів його оцінити!");
define_once("_LINKRATINGDET","Деталі рейтингу ресурсів");
define_once("_OVERALLRATING","Загальний рейтинг");
define_once("_TOTALOF","Всього");
define_once("_USER","Користувача");
define_once("_USERAVGRATING","Середній рейтинг користувача");
define_once("_NUMRATINGS","# рейтингу");
define_once("_EDITTHISLINK","Відредагувати ресурс");
define_once("_REGISTEREDUSERS","Оцінки зареєстрованих користувачів");
define_once("_NUMBEROFRATINGS","Номер рейтингу");
define_once("_NOREGUSERSVOTES","Немає голосів зареєстрованих користувачів");
define_once("_BREAKDOWNBYVAL","Розподіл голосів");
define_once("_LTOTALVOTES","загальна кількість голосів");
define_once("_LINKRATING","Рейтинг ресурсів");
define_once("_HIGHRATING","Найвища оцінка");
define_once("_LOWRATING","Найнижча оцінка");
define_once("_NUMOFCOMMENTS","Кількість коментарів");
define_once("_WEIGHNOTE","* Примітка: Голоси зареєстрованих і незареєстрованих відвідувачів враховуються в співвідношенні");
define_once("_NOUNREGUSERSVOTES","Немає голосів незареєстрованих відвідувачів");
define_once("_WEIGHOUTNOTE","* Примітка: Голоси зареєстрованих відвідувачів і голоси з інших сайтів враховуються в співвідношенні");
define_once("_NOOUTSIDEVOTES","Немає голосів з інших сайтів");
define_once("_OUTSIDEVOTERS","Голосування з інших сайтів");
define_once("_UNREGISTEREDUSERS","Голоси незареєстрованих відвідувачів");
define_once("_PROMOTEYOURSITE","Рейтинг вашого веб-сайту");
define_once("_PROMOTE01","Можливо, ви захочете дати можливість відвідувачам вашого сайту проголосувати за нього в нашому рейтинзі. Це дозволить підняти рейтинг вашого сайту. Будь ласка виберіть оптимальний варіант для голосування:");
define_once("_TEXTLINK","Текст");
define_once("_HTMLCODE1","HTML-код для голосування:");
define_once("_THENUMBER","Ван ID");
define_once("_IDREFER","Перевірте наявність ID вашого сайту в HTML коді.");
define_once("_BUTTONLINK","Кнопка");
define_once("_RATEIT","Оціни цей сайт!");
define_once("_HTMLCODE2","Вихідний код для кнопки:");
define_once("_REMOTEFORM","Форма для оцінки");
define_once("_VOTE4THISSITE","Проголосуй за цей сайт!");
define_once("_LINKVOTE","Проголосувати!");
define_once("_HTMLCODE3","Використання цієї форми дозволить відвідувачам вашого сайту проголосувати за нього безпосередньо на вашому сайті. Приведена форма неробоча, для її використання скористайтесь HTML-кодом. Просто вставте його в свою веб-сорінку.:");
define_once("_PROMOTE05","Успіхів вашому сайту!");
define_once("_STAFF","Персонал");
define_once("_THANKSBROKEN","Якщо цей сайт більше не існує, або його зміст не відповідає опису в каталозі<br> натисніть кнопку і модератор перевірить цей ресурс.");
define_once("_THANKSFORINFO","Дякуємо за інформацію.");
define_once("_LOOKTOREQUEST","Ми перевіримо ваш запит якомога швидше.");
define_once("_REQUESTLINKMOD","Запропонуйте ваш варіант опису ресурсу");
define_once("_LINKID","ID ресурсу");
define_once("_SENDREQUEST","Надіслати запит");
define_once("_THANKSTOTAKETIME","Дякуємо вам за те, що ви знайшли час оцінити сайт");
define_once("_RETURNTO","Повернутись на ");
define_once("_RATENOTE1","Будь ласка, не голосуйте за один сайт двічі.");
define_once("_RATENOTE2","Шкала від 1 до 10. 1 - дуже погано і 10 - прекрасно.");
define_once("_RATENOTE3","Будь ласка, будьте об'єктивні при голосуванні.");
define_once("_RATENOTE5","Не треба голосувати за свій власний ресурс.");
define_once("_YOUAREREGGED","Ви зареєстрований відвідувач і ввійшли як");
define_once("_FEELFREE2ADD","Відчувайте себе вільно при написанні коментарів про цей сайт.");
define_once("_YOUARENOTREGGED","Ви - незареєстрований відвідувач або не ввійшли в систему.");
define_once("_IFYOUWEREREG","Коментарі на цей сайт можуть відправляти тільки зареєстровані відвідувачі.");
define_once("_WEBLINKS","Ресурси");
define_once("_TITLE","Назва");
define_once("_MODIFY","Змінити");
define_once("_COMPLETEVOTE1","Your vote is appreciated.");
define_once("_COMPLETEVOTE2","You have already voted for this resource in the past $anonwaitdays day(s).");
define_once("_COMPLETEVOTE3","Vote for a resource only once.<br>All votes are logged and reviewed.");
define_once("_COMPLETEVOTE4","You cannot vote on a link you submitted.<br>All votes are logged and reviewed.");
define_once("_COMPLETEVOTE5","No rating selected - no vote tallied");
define_once("_COMPLETEVOTE6","Only one vote per IP address allowed every $outsidewaitdays day(s).");
define_once("_LINKSDATESTRING","%d.%m.%Y");


