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
/* Russian Traslation made by :                                           */
/* [ RussianPortals.com  Team ]            member of [ xairo.com project ]*/
/**************************************************************************/

/**************************************************************************/
/* Доп. перевод, проверка синтаксиса/Add. Russian transl.& spell checking:*/
/*         Александр Бурчак / Alexander Burchak, alexburchak@ua.fm        */
/* Дата/Date:                                                             */
/*         15.03.2004                                                     */
/**************************************************************************/

define_once("_URL","URL");
define_once("_PREVIOUS","Предыдущая страница");
define_once("_NEXT","Следующая страница");
define_once("_YOURNAME","Ваше имя");
define_once("_CATEGORY","Категория");
define_once("_CATEGORIES","Категории");
define_once("_LVOTES","голоса");
define_once("_TOTALVOTES","Всего голосов:");
define_once("_LINKTITLE","Название ссылки");
define_once("_HITS","Баллы");
define_once("_THEREARE","Сейчас");
define_once("_NOMATCHES","Ничего не найдено по Вашему запросу");
define_once("_SCOMMENTS","Комментарии");
define_once("_DESCRIPTION","Описание");
define_once("_DATE","Дата");
define_once("_TO","Для");
define_once("_ADDLINK","Добавить ссылку");
define_once("_NEW","Новые");
define_once("_POPULAR","Популярные");
define_once("_TOPRATED","Топ-лист");
define_once("_RANDOM","Случайные");
define_once("_LINKSMAIN","Главную страница ссылок");
define_once("_LINKCOMMENTS","Комментарий к ссылкам");
define_once("_ADDITIONALDET","Дополнительные детали");
define_once("_EDITORREVIEW","Рецензия редактора");
define_once("_REPORTBROKEN","Сообщить о мертвой ссылке");
define_once("_LINKSMAINCAT","Главные категории ссылок");
define_once("_AND","и");
define_once("_INDB","в нашей базе данных");
define_once("_ADDALINK","Добавить новую ссылку");
define_once("_INSTRUCTIONS","Инструкции");
define_once("_SUBMITONCE","Вы можете поместить ссылку только один раз.");
define_once("_POSTPENDING","Все предоставленные ссылки проверяются.");
define_once("_USERANDIP","Имя пользователя и его IP адрес записаны, поэтому не загружайте систему.");
define_once("_PAGETITLE","Название страницы");
define_once("_PAGEURL","URL Страницы");
define_once("_YOUREMAIL","Ваш E-mail");
define_once("_LDESCRIPTION","Описание (не больше 255 символов):");
define_once("_ADDURL","Добавить этот URL");
define_once("_LINKSNOTUSER1","Вы не зарегистрированы пользователь, или Вы не зашли.");
define_once("_LINKSNOTUSER2","Если Вы зарегистрировались, Вы можете добавлять ссылки на этом сайте.");
define_once("_LINKSNOTUSER3","Прохождение регистрации - это быстро и просто.");
define_once("_LINKSNOTUSER4","Почему мы требуем регистрации для доступа к некоторым возможностям?");
define_once("_LINKSNOTUSER5","Таким образом, мы можем предложить Вам высококачественный контент,");
define_once("_LINKSNOTUSER6","каждая ссылка просматривается и одобряется нашим персоналом.");
define_once("_LINKSNOTUSER7","Мы надеемся предоставлять Вам только качественную информацию.");
define_once("_LINKSNOTUSER8","<a href=\"modules.php?name=Your_Account\">Регистрация аккаунта</a>");
define_once("_LINKALREADYEXT","Ошибка: Этот URL уже присутствует в базе данных!");
define_once("_LINKNOTITLE","Ошибка: Вы должны ввести название Вашего URL!");
define_once("_LINKNOURL","Ошибка: Вы должны ввести URL для Вашего URL!");
define_once("_LINKNODESC","Ошибка: Вы должны ввести описание для Вашего URL!");
define_once("_LINKRECEIVED","Мы получили Вашу ссылку. Спасибо!");
define_once("_EMAILWHENADD","Вы получите сообщение, когда она будет одобрена.");
define_once("_CHECKFORIT","Вы не ввели падре своей электронной почты. Мы проверим Вашу ссылку в ближайшее время.");
define_once("_NEWLINKS","Новые ссылки");
define_once("_TOTALNEWLINKS","Всего новых ссылок");
define_once("_LASTWEEK","За последнюю неделю");
define_once("_LAST30DAYS","за последние 30 дней");
define_once("_1WEEK","1 неделя");
define_once("_2WEEKS","2 недели");
define_once("_30DAYS","30 дней");
define_once("_SHOW","Показать");
define_once("_TOTALFORLAST","Все ссылок за последние");
define_once("_DAYS","дней");
define_once("_ADDEDON","Помещено в");
define_once("_RATING","Голосование");
define_once("_RATESITE","Голосовать за этот сайт");
define_once("_DETAILS","Детали");
define_once("_BESTRATED","Лучшие ссылки - сверху");
define_once("_OF","из");
define_once("_TRATEDLINKS","всего ссылок в рейтинге");
define_once("_TVOTESREQ","требуются минимальные голоса");
define_once("_SHOWTOP","Показывать лучшие");
define_once("_MOSTPOPULAR","Рейтинг популярности - сверху");
define_once("_OFALL","из всех");
define_once("_SORTLINKSBY","Сортировать ссылки по");
define_once("_SITESSORTED","Сайты отсортированы по");
define_once("_POPULARITY","Популярность");
define_once("_SELECTPAGE","Выберите страницу");
define_once("_MAIN","Главная");
define_once("_NEWTODAY","Новые сегодня");
define_once("_NEWLAST3DAYS","Новые за последние 3 дня");
define_once("_NEWTHISWEEK","Новые за эту неделю");
define_once("_CATNEWTODAY","Новые ссылки в этой категории, добавленные сегодня");
define_once("_CATLAST3DAYS","Новые ссылки в этой категории, добавленные за последние 3 дня");
define_once("_CATTHISWEEK","Новые ссылки в этой категории, добавленные за последнюю неделю");
define_once("_POPULARITY1","Популярность (наибольшее число кликов)");
define_once("_POPULARITY2","Популярность (наименьшее число кликов)");
define_once("_TITLEAZ","Название (A до Z)");
define_once("_TITLEZA","Название (Z до A)");
define_once("_DATE1","Дата (Начиная со старых)");
define_once("_DATE2","Дата (Начиная с новых)");
define_once("_RATING1","Рейтинг (от меньшего к большему)");
define_once("_RATING2","Рейтинг (от большего к меньшему)");
define_once("_SEARCHRESULTS4","Результаты поиска для");
define_once("_USUBCATEGORIES","Подкатегории");
define_once("_LINKS","Ссылки");
define_once("_TRY2SEARCH","Попробуйте поискать");
define_once("_INOTHERSENGINES","в других поисковых машинах");
define_once("_EDITORIAL","Передовая статья");
define_once("_LINKPROFILE","Профиль ссылки");
define_once("_EDITORIALBY","Передовая статья для");
define_once("_NOEDITORIAL","Нет передовой статьи актуальной для данного сайта.");
define_once("_VISITTHISSITE","Посетить этот сайт");
define_once("_RATETHISSITE","Голосовать за ресурс");
define_once("_ISTHISYOURSITE","Это Ваша ресурс?");
define_once("_ALLOWTORATE","Разрешить другим пользователям голосовать за него с Вашего Web сайта.");
define_once("_LINKRATINGDET","Детали рейтинга по ссылки");
define_once("_OVERALLRATING","Общий рейтинг");
define_once("_TOTALOF","Всего для");
define_once("_USER","Пользователь");
define_once("_USERAVGRATING","Средняя оценка пользователя");
define_once("_NUMRATINGS","# оценки");
define_once("_EDITTHISLINK","Редактировать эту ссылку");
define_once("_REGISTEREDUSERS","Зарегистрированные пользователи");
define_once("_NUMBEROFRATINGS","Число рейтингов");
define_once("_NOREGUSERSVOTES","Зарегистрированные пользователи не голосовали");
define_once("_BREAKDOWNBYVAL","Перелом в рейтингах по значению");
define_once("_LTOTALVOTES","всего голосов");
define_once("_LINKRATING","Рейтинги ссылок");
define_once("_HIGHRATING","Высокий рейтинг");
define_once("_LOWRATING","Низкий рейтинг");
define_once("_NUMOFCOMMENTS","Число комментариев");
define_once("_WEIGHNOTE","* Примечание: Рейтинги сайта зарегистрированными и незарегистрированными пользователями");
define_once("_NOUNREGUSERSVOTES","Нет голосов не зарегистрированных пользователей");
define_once("_WEIGHOUTNOTE","* Примечание: Рейтинги сайта зарегистрированными пользователями и внешними пользователями");
define_once("_NOOUTSIDEVOTES","Нет внешних голосов");
define_once("_OUTSIDEVOTERS","Голосовавшие извне");
define_once("_UNREGISTEREDUSERS","Не зарегистрированный пользователь");
define_once("_PROMOTEYOURSITE","Повысить рейтинг Вашего сайта");
define_once("_PROMOTE01","Возможно, Вы захотите участвовать в рейтингах Web сайтов, которые мы имеем в распоряжении. Они позволят Вам устанавливать значок (или даже форму оценки) на Вашем сайте для того, чтобы увеличить количество голосов, получаемых Вашим ресурсом. Пожалуйста, выберите одну из опций, приведенных ниже:");
define_once("_TEXTLINK","Текстовая ссылка");
define_once("_PROMOTE02","Один из способов связаться с оценивающей формой - через простую текстовую ссылку:");
define_once("_HTMLCODE1","Вот HTML код, который Вы должны использовать в этом случае:");
define_once("_THENUMBER","Число");
define_once("_IDREFER","ссылок в HTML коде на идентификатор Вашего сайта в базе данных $sitename. Проверьте, что это число присутствует.");
define_once("_BUTTONLINK","Кнопка ссылки");
define_once("_PROMOTE03","Если Вас не устраивает простая текстовая ссылка, то Вы можете использовать небольшую кнопку с ссылкой:");
define_once("_RATEIT","Оценить за этот сайт!");
define_once("_HTMLCODE2","Исходный код для вышеуказанной кнопки:");
define_once("_REMOTEFORM","Форма удаленной оценки");
define_once("_PROMOTE04","Если Вы считаете это обманом, мы удалим Вашу ссылку. Вот как выглядит форма оценки:");
define_once("_VOTE4THISSITE","Голосовать за этот сайт");
define_once("_LINKVOTE","Голосовать!");
define_once("_HTMLCODE3","Использование этой формы позволит другим пользователям оценить Ваш ресурс со страниц Вашего сайта и рейтинг будет записан здесь. Вышеуказанная форма показана только для примера, но следующий исходный код будет работать, если Вы скопируете его и вставите на страницы Вашего сайта. Исходный код приведен ниже:");
define_once("_PROMOTE05","Спасибо! Удачи в Ваших рейтингах!");
define_once("_STAFF","Персонал");
define_once("_THANKSBROKEN","Благодарим Вас за помощь в поддержке целостности этого каталога.");
define_once("_THANKSFORINFO","Спасибо за информацию.");
define_once("_LOOKTOREQUEST","Мы проверим Вашу информацию в ближайшее время.");
define_once("_ONLYREGUSERSMODIFY","Только зарегистрированные пользователи могут изменять ссылки. Пожалуйста, <a href=\"modules.php?name=Your_Account\">зарегистрируйтесь или войдите</a>.");
define_once("_REQUESTLINKMOD","Запрос изменения ссылки");
define_once("_LINKID","ID Ссылки");
define_once("_SENDREQUEST","Отправить запрос");
define_once("_THANKSTOTAKETIME","Благодарим Вас за время, потраченное на оценку сайта на");
define_once("_LETSDECIDE","Голос каждого пользователя поможет другим посетителям сделать правильный выбор ссылок.");
define_once("_RETURNTO","Вернуться в");
define_once("_RATENOTE1","Пожалуйста, не голосуйте за один и тот же ресурс повторно.");
define_once("_RATENOTE2","Шкала - 1 - 10, с 1 плохо и 10 отлично.");
define_once("_RATENOTE3","Пожалуйста, будьте объективным в Вашем голосе, если каждый получит 1 или 10, то рейтинги будут не очень полезны.");
define_once("_RATENOTE4","Вы можете просматривать список <a href=\"modules.php?name=Web_Links&amp;l_op=TopRated\">Лучших ресурсов</a>.");
define_once("_RATENOTE5","Не голосуйте за Ваш собственный ресурс или ресурс конкурента.");
define_once("_YOUAREREGGED","Вы - зарегистрированный пользователь и вошли.");
define_once("_FEELFREE2ADD","Не стесняйтесь добавлять комментарий относительно этого сайта.");
define_once("_YOUARENOTREGGED","Вы не зарегистрированный пользователь или не вошли.");
define_once("_IFYOUWEREREG","Если Вы зарегистрировались, то можете посылать комментарии на этот сайт.");
define_once("_WEBLINKS","Web Ссылки");
define_once("_TITLE","Название");
define_once("_MODIFY","Изменить");
define_once("_COMPLETEVOTE1","Ваш голос учтен.");
define_once("_COMPLETEVOTE2","Вы уже голосовали за этот ресурс $anonwaitdays день(дней) назад.");
define_once("_COMPLETEVOTE3","Голосуйте за ресурс только один раз.<br>Все голоса регистрируются и рассматриваются.");
define_once("_COMPLETEVOTE4","Вы не можете голосовать за ссылку, которую Вы предоставили.<br>Все голоса зарегистрированы и рассмотрены.");
define_once("_COMPLETEVOTE5","Оценка не выбрана - голос не засчитан");
define_once("_COMPLETEVOTE6","Только один голос с IP адреса разрешен каждый $outsidewaitdays дня(дней).");
define_once("_LINKSDATESTRING","%d/%m/%Y");


