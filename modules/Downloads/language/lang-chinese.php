<?php
global $sitename, $anonwaitdays, $outsidewaitdays;


/**************************************************************************/
/* PHP-NUKE: Advanced Content Management System                           */
/* ============================================                           */
/*                                                                        */
/* This is the language module with all the system messages               */
/*                                                                        */
/* If you made a translation, please sent to me (fburzi@gmail.com)    */
/* the translated file. Please keep the original text order by modules,   */
/* and just one message per line, also double check your translation!     */
/*                                                                        */
/* You need to change the second quoted phrase, not the capital one!      */
/*                                                                        */
/* If you need to use double quotes (") remember to add a backslash (\),  */
/* so your entry will look like: This is \"double quoted\" text.          */
/* And, if you use HTML code, please double check it.                     */
/**************************************************************************/


define_once("_URL","網址");
define_once("_PREVIOUS","上一頁");
define_once("_NEXT","下一頁");
define_once("_CATEGORY","類別");
define_once("_CATEGORIES","類別");
define_once("_LVOTES","投票一覽");
define_once("_TOTALVOTES","總票數：");
define_once("_THEREARE","有");
define_once("_NOMATCHES","找不到與您的詢問條件相符的資料");
define_once("_SCOMMENTS","評論");
define_once("_UNKNOWN","未知");
define_once("_DOWNLOADS","下載資源");
define_once("_AUTHORNAME","作者名稱");
define_once("_AUTHOREMAIL","作者電子郵件");
define_once("_ADDTHISFILE","增加這個檔案");
define_once("_INBYTES","位元");
define_once("_FILESIZE","檔案大小");
define_once("_VERSION","版本");
define_once("_DESCRIPTION","描述");
define_once("_AUTHOR","作者");
define_once("_HOMEPAGE","首頁");
define_once("_DOWNLOADNOW","立刻下載此檔案！");
define_once("_RATERESOURCE","評分下載資源");
define_once("_FILEURL","檔案鏈結");
define_once("_ADDDOWNLOAD","新增下載資源");
define_once("_DOWNLOADSMAIN","下載資源專區");
define_once("_DOWNLOADCOMMENTS","下載資源意見");
define_once("_DOWNLOADSMAINCAT","下載資源主類別");
define_once("_ADDADOWNLOAD","新增下載資源");
define_once("_DSUBMITONCE","請一次投遞一個下載資源");
define_once("_DPOSTPENDING","所有的下載資源都必須等待驗證");
define_once("_RESSORTED","資源目前排序方式為");
define_once("_DOWNLOADSNOTUSER1","您尚未成為註冊使用者或你沒有登入");
define_once("_DOWNLOADSNOTUSER2","若您已在本站註冊，才能新增下載資源");
define_once("_DOWNLOADSNOTUSER3","成為一個註冊使用者是一件非常快速而容易的事");
define_once("_DOWNLOADSNOTUSER4","為什麼我們會對某些功能要求註冊資格呢？");
define_once("_DOWNLOADSNOTUSER5","為的是提供您更高品質的內容，");
define_once("_DOWNLOADSNOTUSER6","每一個項目都個別地被我們檢查與驗證");
define_once("_DOWNLOADSNOTUSER7","我們希望提供您真正有價值的資訊。");
define_once("_DOWNLOADSNOTUSER8","<a href=\"modules.php?name=Your_Account\">請來註冊帳號</a>");
define_once("_DOWNLOADALREADYEXT","錯誤：本網址已存在於資料庫！");
define_once("_DOWNLOADNOTITLE","錯誤：您必須為您的網址輸入一個標題！");
define_once("_DOWNLOADNOURL","錯誤：您必須為您的網址輸入一個網址！");
define_once("_DOWNLOADNODESC","錯誤：您必須為您的網址輸入一些描述！");
define_once("_DOWNLOADRECEIVED","我們已收到了您所投遞的下載資源，多謝！");
define_once("_NEWDOWNLOADS","最新的下載資源");
define_once("_TOTALNEWDOWNLOADS","全部最新的下載資源");
define_once("_DTOTALFORLAST","全部最新的下載資源");
define_once("_DBESTRATED","最高分的下載資源");
define_once("_TRATEDDOWNLOADS","全部被評分的下載資源");
define_once("_SORTDOWNLOADSBY","排序下載資源，依");
define_once("_DCATNEWTODAY","本類別於本日內新增的下載資源");
define_once("_DCATLAST3DAYS","本類別於三日內新增的下載資源");
define_once("_DCATTHISWEEK","本類別於本周內新增的下載資源");
define_once("_DDATE1","日期(舊的下載資源先)");
define_once("_DDATE2","日期(新的下載資源先)");
define_once("_DOWNLOADPROFILE","下載資源概述");
define_once("_DOWNLOADRATINGDET","下載資源評分細節");
define_once("_EDITTHISDOWNLOAD","編輯這個下載資源");
define_once("_DOWNLOADRATING","下載資源評分");
define_once("_DOWNLOADVOTE","投票！");
define_once("_REQUESTDOWNLOADMOD","請求下載資源修改");
define_once("_DOWNLOADID","下載資源識別碼");
define_once("_DLETSDECIDE","您的投票可以幫助其他使用者決定什麼是有價值的東西，節省他們自行嘗試的時間。");
define_once("_DRATENOTE4","瀏覽清單請至<a href=\"modules.php?name=Downloads&amp;d_op=TopRated\">高評分資源</a>.");
define_once("_DATE","日期");
define_once("_TO","到");
define_once("_NEW","最近的");
define_once("_POPULAR","受歡迎的");
define_once("_TOPRATED","最高分的");
define_once("_ADDITIONALDET","附加細節");
define_once("_EDITORREVIEW","編輯評論");
define_once("_REPORTBROKEN","失效鏈結報告");
define_once("_AND","和");
define_once("_INDB","在我們的資料庫");
define_once("_INSTRUCTIONS","指示");
define_once("_USERANDIP","您的姓名和IP會被紀錄，請勿濫用本系統");
define_once("_LDESCRIPTION","描述： (最多一百個字)");
define_once("_CHECKFORIT","未收到您的電子郵件，不論如何，我們會盡快檢查您的下載資源");
define_once("_LASTWEEK","最近一周");
define_once("_LAST30DAYS","最近卅天");
define_once("_1WEEK","1 周");
define_once("_2WEEKS","2 周");
define_once("_30DAYS","30 天");
define_once("_SHOW","顯示");
define_once("_DAYS","天");
define_once("_ADDEDON","增加於");
define_once("_RATING","評分");
define_once("_DETAILS","細節");
define_once("_OF","之");
define_once("_TVOTESREQ","最少投票需要");
define_once("_SHOWTOP","排行顯示");
define_once("_MOSTPOPULAR","最受歡迎之");
define_once("_OFALL","全部有");
define_once("_POPULARITY","受歡迎程度");
define_once("_SELECTPAGE","選擇網頁");
define_once("_MAIN","主要的");
define_once("_NEWTODAY","本日內,新的");
define_once("_NEWLAST3DAYS","最近3天內,新的");
define_once("_NEWTHISWEEK","本週內,新的");
define_once("_POPULARITY1","流行度 (點閱數由小至大)");
define_once("_POPULARITY2","流行度 (點閱數由大至小)");
define_once("_TITLEAZ","標題 (A to Z)");
define_once("_TITLEZA","標題 (Z to A)");
define_once("_RATING1","評分 (低分至高分)");
define_once("_RATING2","評分 (高分至低分)");
define_once("_SEARCHRESULTS4","搜尋結果,對");
define_once("_USUBCATEGORIES","子類別");
define_once("_TRY2SEARCH","嘗試搜尋");
define_once("_INOTHERSENGINES","在其他搜尋引擎");
define_once("_EDITORIAL","編輯性");
define_once("_EDITORIALBY","編輯由");
define_once("_NOEDITORIAL","本站目前尚無相關編輯");
define_once("_RATETHISSITE","評分這個網站資源");
define_once("_ISTHISYOURSITE","這是您的資源嗎？");
define_once("_ALLOWTORATE","允許其他使用者在您的網站評分！");
define_once("_OVERALLRATING","總評分");
define_once("_TOTALOF","全部共");
define_once("_USER","使用者");
define_once("_USERAVGRATING","使用者平均分數");
define_once("_NUMRATINGS","評分次數");
define_once("_REGISTEREDUSERS","註冊使用者");
define_once("_NUMBEROFRATINGS","評分數目");
define_once("_NOREGUSERSVOTES","沒有註冊使用者投票");
define_once("_BREAKDOWNBYVAL","評分數值條狀圖");
define_once("_LTOTALVOTES","全部投票");
define_once("_HIGHRATING","最高評價");
define_once("_LOWRATING","最低評價");
define_once("_NUMOFCOMMENTS","評註數目");
define_once("_WEIGHNOTE","* 註：這個網站資源加重註冊使用者評分");
define_once("_NOUNREGUSERSVOTES","非註冊使用者無法投票");
define_once("_WEIGHOUTNOTE","* 註：這個網站資源加重註冊使用者評分");
define_once("_NOOUTSIDEVOTES","無外部投票");
define_once("_OUTSIDEVOTERS","外部投票");
define_once("_UNREGISTEREDUSERS","非註冊使用者");
define_once("_PROMOTEYOURSITE","宣傳您的網站");
define_once("_PROMOTE01","也許您會對我們所提供的幾種遠端'評分網站'的選項感到興趣。這讓您可以用圖片(或甚至一個評分格式)放在您的網站。網站可以增加您的網站資源的投票數。請選擇下列選項：");
define_once("_TEXTLINK","文字方式鏈結");
define_once("_PROMOTE02","一種對鏈結的評分格式，就是簡單地使用文字方式顯示鏈結：");
define_once("_HTMLCODE1","本情況中，您可使用的HTML格式如下：");
define_once("_THENUMBER","該數字");
define_once("_IDREFER","位在HTML參考來源，代表您網站的識別碼，在 $sitename 資料庫。請確定數字與現況相符。");
define_once("_BUTTONLINK","按鍵方式鏈結");
define_once("_PROMOTE03","除了用基本的文字方式顯示鏈結, 您還可以使用按鍵方式鏈結：");
define_once("_RATEIT","評分此網站！");
define_once("_HTMLCODE2","上述按鍵的原始碼為：");
define_once("_REMOTEFORM","遠端評分格式");
define_once("_PROMOTE04","若您作弊，我們將移除您的鏈結。這是目前被移除的評分格式");
define_once("_VOTE4THISSITE","投票給網站！");
define_once("_HTMLCODE3","本表單可讓使用者評分您的網站資源，直接在您的網站資源而且評分會被本站紀錄。請將下列原始碼貼至您的網站資源的網頁即可使用：");
define_once("_PROMOTE05","謝謝，祝您幸運！");
define_once("_STAFF","工作人員");
define_once("_THANKSBROKEN","感謝您協助維護此目錄之完整。");
define_once("_SECURITYBROKEN","為了安全的理由，您的使用者名稱和IP地址，也將被暫時紀錄。");
define_once("_THANKSFORINFO","感謝提供資訊");
define_once("_LOOKTOREQUEST","我們會立刻處理您的請求");
define_once("_SENDREQUEST","寄出請求");
define_once("_THANKSTOTAKETIME","感謝您對網站評分");
define_once("_RETURNTO","回到");
define_once("_RATENOTE1","請不要對同一個資源投一票以上");
define_once("_RATENOTE2","分數由1分到10分");
define_once("_RATENOTE3","請客觀地投票");
define_once("_RATENOTE5","請不要投給您自有的資源或是競爭者");
define_once("_YOUAREREGGED","您是一個已登入的註冊使用者");
define_once("_FEELFREE2ADD","請自由地評論這個網站。");
define_once("_YOUARENOTREGGED","您不是一個註冊使用者或您尚未登入");
define_once("_IFYOUWEREREG","已登記者可評註此網站");
define_once("_TITLE","標題");
define_once("_MODIFY","修改");

define_once("_AUTHORNAME","作者名稱");
define_once("_AUTHOREMAIL","作者電子信箱");
define_once("_DOWNLOADNAME","資源名稱");
define_once("_ADDTHISFILE","增加這個檔案");

define_once("_COMPLETEVOTE1","感謝您！您的投票對其他使用者很有價值喔！");
define_once("_COMPLETEVOTE2","您在過去的 $anonwaitdays 天之內, 已經對這個資源投票過了。");
define_once("_COMPLETEVOTE3","只能對這個資源投一次票。<br>所有的投票已經紀錄下來, 且經過檢查了。");
define_once("_COMPLETEVOTE4","您不能對您自己登錄的連結投票<br>所有的投票已經紀錄下來, 且經過檢查了。");
define_once("_COMPLETEVOTE5","No rating selected - no vote tallied");
define_once("_COMPLETEVOTE6","每個 IP 位址在 $outsidewaitdays 天之內只允許投一次票。");
define_once("_LINKSDATESTRING","%b%d日,%Y");


