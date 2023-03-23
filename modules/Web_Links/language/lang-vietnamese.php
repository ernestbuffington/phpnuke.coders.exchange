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
define_once("_PREVIOUS","Previous Page");
define_once("_NEXT","Next Page");
define_once("_YOURNAME","Tên b&#7841;n");
define_once("_CATEGORY","Danh m&#7909;c");
define_once("_CATEGORIES","Danh m&#7909;c");
define_once("_LVOTES","votes");
define_once("_TOTALVOTES","T&#7893;ng phi&#7871;u:");
define_once("_LINKTITLE","Tiêu &#273;&#7873; liên k&#7871;t");
define_once("_HITS","Hits");
define_once("_THEREARE","Có");
define_once("_NOMATCHES","No matches found to your query");
define_once("_SCOMMENTS","Comments");
define_once("_DESCRIPTION","Mô t&#7843;");
define_once("_DATE","Ngày");
define_once("_TO","&#272;&#7871;n");
define_once("_ADDLINK","Thêm liên k&#7871;t");
define_once("_NEW","M&#7899;i");
define_once("_POPULAR","Ph&#7893; bi&#7871;n");
define_once("_TOPRATED","&#272;ánh giá cao");
define_once("_RANDOM","Ng&#7851;u nhiên");
define_once("_LINKSMAIN","Liên k&#7871;t chính");
define_once("_LINKCOMMENTS","&#272;ánh giá liên k&#7871;t");
define_once("_ADDITIONALDET","Additional Details");
define_once("_EDITORREVIEW","Editor Review");
define_once("_REPORTBROKEN","Báo liên k&#7871;t gãy");
define_once("_LINKSMAINCAT","Các danh m&#7909;c liên k&#7871;t chính");
define_once("_AND","và");
define_once("_INDB","trong CSDL c&#7911;a chúng tôi");
define_once("_ADDALINK","Thêm liên k&#7871;t m&#7899;i");
define_once("_INSTRUCTIONS","H&#432;&#7899;ng d&#7851;n");
define_once("_SUBMITONCE","G&#7917;i ch&#7881; 1 liên k&#7871;t 1 l&#7847;n duy nh&#7845;t.");
define_once("_POSTPENDING","T&#7845;t c&#7843; các liên k&#7871;t &#273;&#432;&#7907;c g&#7917;i s&#7869; &#273;&#432;&#7907;c ki&#7875;m tra th&#432;&#7901;ng xuyên.");
define_once("_USERANDIP","Tên thành viên và IP &#273;&#432;&#7907;c ghi nh&#7853;n, xin &#273;&#7915;ng phá ho&#7841;i h&#7879; th&#7889;ng.");
define_once("_PAGETITLE","Tiêu &#273;&#7873; trang");
define_once("_PAGEURL","URL trang");
define_once("_YOUREMAIL","Email c&#7911;a b&#7841;n");
define_once("_LDESCRIPTION","Mô t&#7843;: (t&#7889;i &#273;a 255 t&#7915;)");
define_once("_ADDURL","Thêm URL này");
define_once("_LINKSNOTUSER1","B&#7841;n không ph&#7843;i là 1 thành viên &#273;ã &#273;&#259;ng kí ho&#7863;c b&#7841;n &#273;ã thoát ra ngoài.");
define_once("_LINKSNOTUSER2","N&#7871;u b&#7841;n &#273;ã &#273;&#259;ng kí, b&#7841;n có th&#7875; thêm liên k&#7871;t &#7903; &#273;ây.");
define_once("_LINKSNOTUSER3","&#272;&#259;ng kí thành viên r&#7845;t nhanh chóng và d&#7877; dàng.");
define_once("_LINKSNOTUSER4","T&#7841;i sao c&#7847;n ph&#7843;i &#273;&#259;ng kí &#273;&#7875; có th&#7875; truy nh&#7853;p vào thành ph&#7847;n nào &#273;ó?");
define_once("_LINKSNOTUSER5","&#272;&#7875; chúng tôi có th&#7875; ph&#7909;c v&#7909; b&#7841;n nh&#7919;ng n&#7897;i dung có ch&#7845;t l&#432;&#7907;ng cao nh&#7845;t,");
define_once("_LINKSNOTUSER6","m&#7895;i ph&#7847;n &#273;&#432;&#7907;c xem riêng và &#273;&#432;&#7907;c ch&#7845;p thu&#7853;n b&#7903;i ban qu&#7843;n tr&#7883;.");
define_once("_LINKSNOTUSER7","Chúng tôi hi v&#7885;ng cung c&#7845;p ch&#7881; nh&#7919;ng thông tin có giá tr&#7883;.");
define_once("_LINKSNOTUSER8","<a href=\"modules.php?name=Your_Account\">&#272;&#259;ng kí thành viên</a>");
define_once("_LINKALREADYEXT","L&#7894;I: URL này &#273;ã &#273;&#432;&#7907;c li&#7879;t kê trong CSDL!");
define_once("_LINKNOTITLE","L&#7894;I: B&#7841;n c&#7847;n nh&#7853;p TIÊU &#272;&#7872; cho URL c&#7911;a b&#7841;n!");
define_once("_LINKNOURL","L&#7894;I: B&#7841;n c&#7847;n gõ 1 URL cho URL c&#7911;a b&#7841;n!");
define_once("_LINKNODESC","L&#7894;I: B&#7841;n c&#7847;n gõ L&#7900;I MÔ T&#7842; cho URL c&#7911;a b&#7841;n!");
define_once("_LINKRECEIVED","Chúng tôi &#273;ã nh&#7853;n &#273;&#432;&#7907;c liên k&#7871;t c&#7911;a b&#7841;n. C&#7843;m &#417;n!");
define_once("_EMAILWHENADD","B&#7841;n s&#7869; nh&#7853;nd &#273;&#432;&#7907;c Email thông báo n&#7871;u nó &#273;&#432;&#7907;c ch&#7845;p nh&#7853;n.");
define_once("_CHECKFORIT","B&#7841;n &#273;ã không cung c&#7845;p &#273;&#7883;a ch&#7881; Email nh&#432;ng chúng tôi s&#7869; xem xét liên k&#7871;t c&#7911;a b&#7841;n s&#7899;m.");
define_once("_NEWLINKS","Liên k&#7871;t m&#7899;i");
define_once("_TOTALNEWLINKS","T&#7845;t c&#7843; liên k&#7871;t m&#7899;i");
define_once("_LASTWEEK","Tu&#7847;n tr&#432;&#7899;c");
define_once("_LAST30DAYS","Tr&#432;&#7899;c &#273;ây 30 ngày");
define_once("_1WEEK","1 tu&#7847;n");
define_once("_2WEEKS","2 tu&#7847;n");
define_once("_30DAYS","30 ngày");
define_once("_SHOW","Xem");
define_once("_TOTALFORLAST","T&#7893;ng s&#7889; liên k&#7871;t m&#7899;i c&#7911;a");
define_once("_DAYS","ngày");
define_once("_ADDEDON","Thêm lúc");
define_once("_RATING","&#272;i&#7875;m");
define_once("_RATESITE","&#272;ánh giá Site này");
define_once("_DETAILS","Chi ti&#7871;t");
define_once("_BESTRATED","Liên k&#7871;t &#273;&#432;&#7907;c &#273;ánh giá cao nh&#7845;t - Top");
define_once("_OF","c&#7911;a");
define_once("_TRATEDLINKS","total rated links");
define_once("_TVOTESREQ","minimum votes required");
define_once("_SHOWTOP","Xem Top");
define_once("_MOSTPOPULAR","Ph&#7893; bi&#7871;n nh&#7845;t - Top");
define_once("_OFALL","of all");
define_once("_SORTLINKSBY","X&#7871;p liên k&#7871;t theo");
define_once("_SITESSORTED","Các Site hi&#7879;n t&#7841;i &#273;&#432;&#7907;c x&#7871;p theo");
define_once("_POPULARITY","Tính ph&#7893; bi&#7871;n");
define_once("_SELECTPAGE","Ch&#7885;n trang");
define_once("_MAIN","Chính");
define_once("_NEWTODAY","M&#7899;i hôm nay");
define_once("_NEWLAST3DAYS","M&#7899;i cách &#273;ây 3 ngày");
define_once("_NEWTHISWEEK","M&#7899;i tu&#7847;n này");
define_once("_CATNEWTODAY","Liên k&#7871;t m&#7899;i trong danh m&#7909;c này &#273;ã &#273;&#432;&#7907;c thêm hôm nay");
define_once("_CATLAST3DAYS","Liên k&#7871;t m&#7899;i trong danh m&#7909;c này &#273;ã &#273;&#432;&#7907;c thêm cách &#273;ây 3 ngày");
define_once("_CATTHISWEEK","Liên k&#7871;t m&#7899;i trong danh m&#7909;c này &#273;ã &#273;&#432;&#7907;c thêm tu&#7847;n này");
define_once("_POPULARITY1","Popularity (Least to Most Hits)");
define_once("_POPULARITY2","Popularity (Most to Least Hits)");
define_once("_TITLEAZ","Tiêu &#273;&#7873; (A &#273;&#7871;n Z)");
define_once("_TITLEZA","Tiêu &#273;&#7873; (Z v&#7873; A)");
define_once("_DATE1","Date (Old Links Listed First)");
define_once("_DATE2","Date (New Links Listed First)");
define_once("_RATING1","Rating (Lowest Scores to Highest Scores)");
define_once("_RATING2","Rating (Highest Scores to Lowest Scores)");
define_once("_SEARCHRESULTS4","Search Results for");
define_once("_USUBCATEGORIES","Sub-Categories");
define_once("_LINKS","Liên k&#7871;t");
define_once("_TRY2SEARCH","Th&#7917; tìm");
define_once("_INOTHERSENGINES","in others Search Engines");
define_once("_EDITORIAL","Editorial");
define_once("_LINKPROFILE","Link Profile");
define_once("_EDITORIALBY","Editorial by");
define_once("_NOEDITORIAL","No editorial is currently available for this website.");
define_once("_VISITTHISSITE","Visit this Website");
define_once("_RATETHISSITE","Rate this Resource");
define_once("_ISTHISYOURSITE","Is this your resource?");
define_once("_ALLOWTORATE","Allow other users to rate it from your web site!");
define_once("_LINKRATINGDET","Link Rating Details");
define_once("_OVERALLRATING","Overall Rating");
define_once("_TOTALOF","Total of");
define_once("_USER","User");
define_once("_USERAVGRATING","User's Average Rating");
define_once("_NUMRATINGS","# of Ratings");
define_once("_EDITTHISLINK","Edit This Link");
define_once("_REGISTEREDUSERS","Registered Users");
define_once("_NUMBEROFRATINGS","Number of Ratings");
define_once("_NOREGUSERSVOTES","No Registered User Votes");
define_once("_BREAKDOWNBYVAL","Breakdown of Ratings by Value");
define_once("_LTOTALVOTES","total votes");
define_once("_LINKRATING","Links Rating");
define_once("_HIGHRATING","High Rating");
define_once("_LOWRATING","Low Rating");
define_once("_NUMOFCOMMENTS","Number of Comments");
define_once("_WEIGHNOTE","* Note: This Resource weighs Registered vs. Unregistered users ratings");
define_once("_NOUNREGUSERSVOTES","No Unregistered User Votes");
define_once("_WEIGHOUTNOTE","* Note: This Resource weighs Registered vs. Outside voters ratings");
define_once("_NOOUTSIDEVOTES","No Outside Votes");
define_once("_OUTSIDEVOTERS","Outside Voters");
define_once("_UNREGISTEREDUSERS","Unregistered Users");
define_once("_PROMOTEYOURSITE","Promote Your Website");
define_once("_PROMOTE01","Maybe you can be interested in several of the remote 'Rate a Website' options we have available. These allow you to place an image (or even a rating form) on your web site in order to increase the number of votes your resource receive. Please choose from one of the options listed below:");
define_once("_TEXTLINK","Text Link");
define_once("_PROMOTE02","One way to link to the rating form is through a simple text link:");
define_once("_HTMLCODE1","The HTML code you should use in this case, is the following:");
define_once("_THENUMBER","The Number");
define_once("_IDREFER","in the HTML source references your site's ID number in $sitename database. Be sure this number is present.");
define_once("_BUTTONLINK","Button Link");
define_once("_PROMOTE03","If you're looking for a little more than a basic text link, you may wish to use a small button link:");
define_once("_RATEIT","Rate this Site!");
define_once("_HTMLCODE2","The source code for the above button is:");
define_once("_REMOTEFORM","Remote Rating Form");
define_once("_PROMOTE04","If you cheat on this, we'll remove your link. Having said that, here is what the current remote rating form looks like.");
define_once("_VOTE4THISSITE","Vote for this Site!");
define_once("_LINKVOTE","Vote!");
define_once("_HTMLCODE3","Using this form will allow users to rate your resource directly from your site and the rating will be recorded here. The above form is disabled, but the following source code will work if you simply cut and paste it into your web page. The source code is shown below:");
define_once("_PROMOTE05","Thanks! and good luck with your ratings!");
define_once("_STAFF","Staff");
define_once("_THANKSBROKEN","Thank you for helping to maintain this directory's integrity.");
define_once("_THANKSFORINFO","Thanks for the information.");
define_once("_LOOKTOREQUEST","We'll look into your request shortly.");
define_once("_ONLYREGUSERSMODIFY","Only registered users can suggest links modifications. Please <a href=\"modules.php?name=Your_Account\">register or login</a>.");
define_once("_REQUESTLINKMOD","Request Link Modification");
define_once("_LINKID","Link ID");
define_once("_SENDREQUEST","Send Request");
define_once("_THANKSTOTAKETIME","Thank you for taking the time to rate a site here at");
define_once("_LETSDECIDE","Input from users such as yourself will help other visitors better decide which links to click on.");
define_once("_RETURNTO","Return to");
define_once("_RATENOTE1","Please do not vote for the same resource more than once.");
define_once("_RATENOTE2","The scale is 1 - 10, with 1 being poor and 10 being excellent.");
define_once("_RATENOTE3","Please be objective in your vote, if everyone receives a 1 or a 10, the ratings aren't very useful.");
define_once("_RATENOTE4","You can view a list of the <a href=\"modules.php?name=Web_Links&amp;l_op=TopRated\">Top Rated Resources</a>.");
define_once("_RATENOTE5","Do not vote for your own resource or a competitor's.");
define_once("_YOUAREREGGED","You are a registered user and are logged in.");
define_once("_FEELFREE2ADD","Feel free to add a comment about this site.");
define_once("_YOUARENOTREGGED","You are not a registered user or you have not logged in.");
define_once("_IFYOUWEREREG","If you were registered you could make comments on this website.");
define_once("_WEBLINKS","Web Links");
define_once("_TITLE","Tiêu &#273;&#7873;");
define_once("_MODIFY","Modify");
define_once("_COMPLETEVOTE1","Your vote is appreciated.");
define_once("_COMPLETEVOTE2","You have already voted for this resource in the past $anonwaitdays day(s).");
define_once("_COMPLETEVOTE3","Vote for a resource only once.<br>All votes are logged and reviewed.");
define_once("_COMPLETEVOTE4","You cannot vote on a link you submitted.<br>All votes are logged and reviewed.");
define_once("_COMPLETEVOTE5","No rating selected - no vote tallied");
define_once("_COMPLETEVOTE6","Only one vote per IP address allowed every $outsidewaitdays day(s).");
define_once("_LINKSDATESTRING","%d/%b/%Y");

