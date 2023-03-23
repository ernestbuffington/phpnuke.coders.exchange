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

/**************************************************************************/
/* Доп. перевод, проверка синтаксиса/Add. Russian transl.& spell checking:*/
/*         Александр Бурчак / Alexander Burchak, alexburchak@ua.fm        */
/* Дата/Date:                                                             */
/*         15.03.2004                                                     */
/**************************************************************************/

define_once("_URL","URL");
define_once("_PREVIOUS","Предыдущая страница");
define_once("_NEXT","Следующая страница");
define_once("_CATEGORY","Категория");
define_once("_CATEGORIES","Категории");
define_once("_LVOTES","голоса");
define_once("_TOTALVOTES","Всего голосов:");
define_once("_THEREARE","Сейчас");
define_once("_NOMATCHES","Ничего не найдено по Вашему запросу");
define_once("_SCOMMENTS","Комментарии");
define_once("_UNKNOWN","Неизвестное");
define_once("_AUTHORNAME","Имя автора");
define_once("_AUTHOREMAIL","E-mail автора");
define_once("_DOWNLOADNAME","Название программы");
define_once("_ADDTHISFILE","Добавить этот файл");
define_once("_INBYTES","в байтах");
define_once("_FILESIZE","Размер файла");
define_once("_VERSION","Версия");
define_once("_DESCRIPTION","Описание");
define_once("_AUTHOR","Автор");
define_once("_HOMEPAGE","Домашняя страничка");
define_once("_DOWNLOADNOW","Загрузить этот файл сейчас!");
define_once("_RATERESOURCE","Голосовать за ресурс");
define_once("_FILEURL","Ссылка на файл");
define_once("_ADDDOWNLOAD","Добавить закачку");
define_once("_DOWNLOADSMAIN","Главная страница закачки");
define_once("_DOWNLOADCOMMENTS","Комментарии к закачке");
define_once("_DOWNLOADSMAINCAT","Главные категории закачки");
define_once("_ADDADOWNLOAD","Добавить новую закачку");
define_once("_DSUBMITONCE","Публикуйте каждую закачку только один раз.");
define_once("_DPOSTPENDING","Все файлы перед публикацией проверяются.");
define_once("_RESSORTED","Ресурсы отсортированы по");
define_once("_DOWNLOADSNOTUSER1","Вы не зарегистрированы или не вошли в систему.");
define_once("_DOWNLOADSNOTUSER2","Зарегистрированные пользователи имеют возможность добавлять закачки на этом сайте.");
define_once("_DOWNLOADSNOTUSER3","Регистрация пользователя - быстрый и легкий процесс.");
define_once("_DOWNLOADSNOTUSER4","Почему мы требуем регистрацию пользователя?");
define_once("_DOWNLOADSNOTUSER5","Итак, мы предлагаем Вам только самое лучшее,");
define_once("_DOWNLOADSNOTUSER6","каждый пункт индивидуально просмотрен и одобрен нашим персоналом.");
define_once("_DOWNLOADSNOTUSER7","Мы надеемся, что предлагаем Вам только ценную информацию.");
define_once("_DOWNLOADSNOTUSER8","<a href=\"modules.php?name=Your_Account\">Зарегистрироваться</a>");
define_once("_DOWNLOADALREADYEXT","Ошибка: Этот URL уже имеется в наше базе данных!");
define_once("_DOWNLOADNOTITLE","Ошибка: Вы должны указать название для Вашего URL!");
define_once("_DOWNLOADNOURL","Ошибка: Вы должны указать URL для Вашего URL!");
define_once("_DOWNLOADNODESC","Ошибка: Вы должны указать описание Вашего URL!");
define_once("_DOWNLOADRECEIVED","Спасибо! Мы получили Вашу публикацию.");
define_once("_NEWDOWNLOADS","Новые закачки");
define_once("_TOTALNEWDOWNLOADS","Все новые закачки");
define_once("_DTOTALFORLAST","Все новые закачки за последние");
define_once("_DBESTRATED","Лучшие закачки - сверху");
define_once("_TRATEDDOWNLOADS","Всего оцененных закачек");
define_once("_SORTDOWNLOADSBY","Сортировать закачки по");
define_once("_DCATNEWTODAY","Новые закачки в этой категории, добавленные сегодня");
define_once("_DCATLAST3DAYS","Новые закачки в этой категории, добавленные за последние 3 дня");
define_once("_DCATTHISWEEK","Новые закачки в этой категории, добавленные на этой неделе");
define_once("_DDATE1","Дата (Сначала старые закачки)");
define_once("_DDATE2","Дата (Сначала новые закачки)");
define_once("_DOWNLOADS","Закачки");
define_once("_DOWNLOADPROFILE","Профиль закачки");
define_once("_DOWNLOADRATINGDET","Детали оценки закачки");
define_once("_EDITTHISDOWNLOAD","Редактировать эту закачку");
define_once("_DOWNLOADRATING","Рейтинг закачек");
define_once("_DOWNLOADVOTE","Голосовать!");
define_once("_DONLYREGUSERSMODIFY","Только зарегистрированные пользователи могут вносить здесь свои изменения. Пожалуйста, <a href=\"modules.php?name=Your_Account\">зарегистрируйтесь или войдите под своим именем</a>.");
define_once("_REQUESTDOWNLOADMOD","Запрос на изменение закачки");
define_once("_DOWNLOADID","ID Закачки");
define_once("_DLETSDECIDE","Информация от таких же, как и Вы, пользователей поможет другим пользователям лучше подобрать себе закачки.");
define_once("_DRATENOTE4","Вы можете посмотреть список <a href=\"modules.php?name=Downloads&amp;d_op=TopRated\">Лучшие закачки</a>.");
define_once("_DATE","Дата");
define_once("_TO","к");
define_once("_NEW","Новые");
define_once("_POPULAR","Популярные");
define_once("_TOPRATED","Лучшие");
define_once("_ADDITIONALDET","Дополнительные детали");
define_once("_EDITORREVIEW","Рецензия редактора");
define_once("_REPORTBROKEN","Сообщить о мертвой ссылке");
define_once("_AND","и");
define_once("_INDB","в нашей базе данных");
define_once("_INSTRUCTIONS","Инструкции");
define_once("_USERANDIP","Имя пользователя и IP записаны, так что не перегружайте систему.");
define_once("_LDESCRIPTION","Описание: (не более 255 символов)");
define_once("_CHECKFORIT","Вы не указали E-mail, но мы проверим Вашу ссылку в ближайшее время.");
define_once("_LASTWEEK","Последняя неделя");
define_once("_LAST30DAYS","Последние 30 дней");
define_once("_1WEEK","1 неделя");
define_once("_2WEEKS","2 недели");
define_once("_30DAYS","30 дней");
define_once("_SHOW","Показать");
define_once("_DAYS","дней");
define_once("_ADDEDON","Добавлен на");
define_once("_RATING","Рейтинг");
define_once("_DETAILS","Детали");
define_once("_OF","");
define_once("_TVOTESREQ","необходимые минимальные голоса");
define_once("_SHOWTOP","Показать лучшие");
define_once("_MOSTPOPULAR","Самые популярные - сверху");
define_once("_OFALL","из всех");
define_once("_POPULARITY","Популярность");
define_once("_SELECTPAGE","Выбирайте страницу");
define_once("_MAIN","Главная");
define_once("_NEWTODAY","Новые сегодня");
define_once("_NEWLAST3DAYS","Новые за последние 3 дня");
define_once("_NEWTHISWEEK","Новые на этой неделе");
define_once("_POPULARITY1","Популярность (от меньшей к большей)");
define_once("_POPULARITY2","Популярность (от большей к меньшей)");
define_once("_TITLEAZ","Заголовок (от A до Z)");
define_once("_TITLEZA","Заголовок (от Z до A)");
define_once("_RATING1","Оценка (от самых низких оценок к самым высоким)");
define_once("_RATING2","Оценка (от самых высоких оценок к самым низким)");
define_once("_SEARCHRESULTS4","Результат поиска для");
define_once("_USUBCATEGORIES","Подкатегории");
define_once("_TRY2SEARCH","Попробуйте поискать");
define_once("_INOTHERSENGINES","в других поисковых системах");
define_once("_EDITORIAL","Лучшая статья");
define_once("_EDITORIALBY","Лучшая статья от");
define_once("_NOEDITORIAL","В настоящее время нет лучших статей на этом сайте");
define_once("_RATETHISSITE","Голосовать за этот ресурс");
define_once("_ISTHISYOURSITE","Это Ваш ресурс?");
define_once("_ALLOWTORATE","Разрешить другим пользователям голосовать за него с нашего Web сайта!");
define_once("_OVERALLRATING","Общий рейтинг");
define_once("_TOTALOF","Всего из");
define_once("_USER","Пользователь");
define_once("_USERAVGRATING","Средняя оценка пользователя");
define_once("_NUMRATINGS","# Рейтинга");
define_once("_REGISTEREDUSERS","Зарегистрированные пользователи");
define_once("_NUMBEROFRATINGS","Число рейтингов");
define_once("_NOREGUSERSVOTES","Нет голосов зарегистрированных пользователей");
define_once("_BREAKDOWNBYVAL","Перелом в рейтингах по значению");
define_once("_LTOTALVOTES","всего голосов");
define_once("_HIGHRATING","Наибольший рейтинг");
define_once("_LOWRATING","Наименьший рейтинг");
define_once("_NUMOFCOMMENTS","Число комментариев");
define_once("_WEIGHNOTE","* Примечание: Оценки этого ресурса зарегистрированными и незарегистрированными пользователями");
define_once("_NOUNREGUSERSVOTES","Нет голосов незарегистрированных пользователей");
define_once("_WEIGHOUTNOTE","* Примечание: Оценки этого ресурса зарегистрированными пользователями и внешними голосами");
define_once("_NOOUTSIDEVOTES","Нет внешних оценок");
define_once("_OUTSIDEVOTERS","Внешние оценки");
define_once("_UNREGISTEREDUSERS","Незарегистрированные пользователи");
define_once("_PROMOTEYOURSITE","Увеличить популярность Вашего сайта");
define_once("_PROMOTE01","Возможно, Вы захотите участвовать в рейтингах Web сайтов, которые мы имеем в распоряжении. Они позволят Вам устанавливать значок (или даже форму оценки) на Вашем сайте для того, чтобы увеличить количество голосов, получаемых Вашим ресурсом. Пожалуйста, выберите одну из опций, приведенных ниже:");
define_once("_TEXTLINK","Текстовая ссылка");
define_once("_PROMOTE02","Один из способов связаться с оценивающей формой - через простую текстовую ссылку:");
define_once("_HTMLCODE1","Код HTML, который Вы должны использовать в этом случае, следующий:");
define_once("_THENUMBER","Число");
define_once("_IDREFER","ссылок в HTML коде на идентификатор Вашего сайта в базе данных $sitename. Проверьте, что это число присутствует.");
define_once("_BUTTONLINK","Кнопка ссылки");
define_once("_PROMOTE03","Если Вас не устраивает простая текстовая ссылка, то Вы можете использовать небольшую кнопку с ссылкой:");
define_once("_RATEIT","Оценить за этот сайт!");
define_once("_HTMLCODE2","Исходный код для вышеуказанной кнопки:");
define_once("_REMOTEFORM","Форма удаленной оценки");
define_once("_PROMOTE04","Если Вы считаете это обманом, мы удалим Вашу ссылку. Вот как выглядит форма оценки:");
define_once("_VOTE4THISSITE","Голосовать за этот сайт");
define_once("_HTMLCODE3","Использование этой формы позволит другим пользователям оценить Ваш ресурс со страниц Вашего сайта и рейтинг будет записан здесь. Вышеуказанная форма показана только для примера, но следующий исходный код будет работать, если Вы скопируете его и вставите на страницы Вашего сайта. Исходный код приведен ниже:");
define_once("_PROMOTE05","Спасибо! Удачи в Ваших рейтингах!");
define_once("_STAFF","Персонал");
define_once("_THANKSBROKEN","Благодарим Вас за помощь в поддержке целостности этого каталога.");
define_once("_SECURITYBROKEN","Для обеспечения безопасности Ваше имя и адрес IP также будут временно записаны.");
define_once("_THANKSFORINFO","Спасибо за информацию.");
define_once("_LOOKTOREQUEST","Мы проверим Вашу информацию в ближайшее время.");
define_once("_SENDREQUEST","Послать запрос");
define_once("_THANKSTOTAKETIME","Благодарим Вас за время, потраченное на оценку сайта на");
define_once("_RETURNTO","Вернуться в");
define_once("_RATENOTE1","Пожалуйста, не голосуйте за один и тот же ресурс повторно.");
define_once("_RATENOTE2","Шкала - 1 - 10, с 1 плохо и 10 отлично.");
define_once("_RATENOTE3","Пожалуйста, будьте объективным в Вашем голосе, если каждый получит 1 или 10, то рейтинги будут не очень полезны.");
define_once("_RATENOTE5","Не голосуйте за Ваш собственный ресурс или ресурс конкурента.");
define_once("_YOUAREREGGED","Вы - зарегистрированный пользователь и вошли.");
define_once("_FEELFREE2ADD","Не стесняйтесь добавлять комментарий относительно этого сайта.");
define_once("_YOUARENOTREGGED","Вы не зарегистрированный пользователь или не вошли.");
define_once("_IFYOUWEREREG","Если Вы зарегистрировались, то можете посылать комментарии на этот сайт.");
define_once("_TITLE","Название");
define_once("_MODIFY","Изменить");
define_once("_COMPLETEVOTE1","Ваш голос учтен.");
define_once("_COMPLETEVOTE2","Вы уже голосовали за этот ресурс $anonwaitdays день(дней) назад.");
define_once("_COMPLETEVOTE3","Голосуйте за ресурс только один раз.<br>Все голоса регистрируются и рассматриваются.");
define_once("_COMPLETEVOTE4","Вы не можете голосовать за ссылку, которую Вы предоставили.<br>Все голоса зарегистрированы и рассмотрены.");
define_once("_COMPLETEVOTE5","Оценка не выбрана - голос не засчитан");
define_once("_COMPLETEVOTE6","Только один голос с IP адреса разрешен каждый $outsidewaitdays дня(дней).");
define_once("_LINKSDATESTRING","%d/%m/%Y");


