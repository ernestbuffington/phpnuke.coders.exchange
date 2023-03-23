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
define_once("_PREVIOUS","Previous Page");
define_once("_NEXT","Next Page");
define_once("_CATEGORY","Category");
define_once("_CATEGORIES","Categories");
define_once("_LVOTES","votes");
define_once("_TOTALVOTES","Total Votes:");
define_once("_THEREARE","There are");
define_once("_NOMATCHES","No matches found to your query");
define_once("_SCOMMENTS","Comments");
define_once("_UNKNOWN","Unknown");
define_once("_AUTHORNAME","Author's Name");
define_once("_AUTHOREMAIL","Author's Email");
define_once("_DOWNLOADNAME","Program Name");
define_once("_ADDTHISFILE","Add this file");
define_once("_INBYTES","in bytes");
define_once("_FILESIZE","Filesize");
define_once("_VERSION","Version");
define_once("_DESCRIPTION","Description");
define_once("_AUTHOR","Author");
define_once("_HOMEPAGE","HomePage");
define_once("_DOWNLOADNOW","Download this file Now!");
define_once("_RATERESOURCE","Rate Resource");
define_once("_FILEURL","File Link");
define_once("_ADDDOWNLOAD","Add Download");
define_once("_DOWNLOADSMAIN","Downloads Main");
define_once("_DOWNLOADCOMMENTS","Download Comments");
define_once("_DOWNLOADSMAINCAT","Downloads Main Categories");
define_once("_ADDADOWNLOAD","Add a New Download");
define_once("_DSUBMITONCE","Submit a unique download only once.");
define_once("_DPOSTPENDING","All downloads are posted pending verification.");
define_once("_RESSORTED","Resources currently sorted by");
define_once("_DOWNLOADSNOTUSER1","You are not a registered user or you have not logged in.");
define_once("_DOWNLOADSNOTUSER2","If you were registered you could add downloads on this website.");
define_once("_DOWNLOADSNOTUSER3","Becoming a registered user is a quick and easy process.");
define_once("_DOWNLOADSNOTUSER4","Why do we require registration for access to certain features?");
define_once("_DOWNLOADSNOTUSER5","So we can offer you only the highest quality content,");
define_once("_DOWNLOADSNOTUSER6","each item is individually reviewed and approved by our staff.");
define_once("_DOWNLOADSNOTUSER7","We hope to offer you only valuable information.");
define_once("_DOWNLOADSNOTUSER8","<a href=\"modules.php?name=Your_Account\">Register for an Account</a>");
define_once("_DOWNLOADALREADYEXT","ERROR: This URL is already listed in the Database!");
define_once("_DOWNLOADNOTITLE","ERROR: You need to type a TITLE for your URL!");
define_once("_DOWNLOADNOURL","ERROR: You need to type a URL for your URL!");
define_once("_DOWNLOADNODESC","ERROR: You need to type a DESCRIPTION for your URL!");
define_once("_DOWNLOADRECEIVED","We received your Download submission. Thanks!");
define_once("_NEWDOWNLOADS","New Downloads");
define_once("_TOTALNEWDOWNLOADS","Total New Downloads");
define_once("_DTOTALFORLAST","Total new downloads for last");
define_once("_DBESTRATED","Best Rated Downloads - Top");
define_once("_TRATEDDOWNLOADS","total rated downloads");
define_once("_SORTDOWNLOADSBY","Sort Downloads by");
define_once("_DCATNEWTODAY","New Downloads in this Category Added Today");
define_once("_DCATLAST3DAYS","New Downloads in this Category Added in the last 3 days");
define_once("_DCATTHISWEEK","New Downloads in this Category Added this week");
define_once("_DDATE1","Date (Old Downloads Listed First)");
define_once("_DDATE2","Date (New Downloads Listed First)");
define_once("_DOWNLOADS","Downloads");
define_once("_DOWNLOADPROFILE","Download Profile");
define_once("_DOWNLOADRATINGDET","Download Rating Details");
define_once("_EDITTHISDOWNLOAD","Edit This Download");
define_once("_DOWNLOADRATING","Downloads Rating");
define_once("_DOWNLOADVOTE","Vote!");
define_once("_DONLYREGUSERSMODIFY","Only registered users can suggest downloads modifications. Please <a href=\"modules.php?name=Your_Account\">register or login</a>.");
define_once("_REQUESTDOWNLOADMOD","Request Download Modification");
define_once("_DOWNLOADID","Download ID");
define_once("_DLETSDECIDE","Input from users such as yourself will help other visitors better decide which downloads to click on.");
define_once("_DRATENOTE4","You can view a list of the <a href=\"modules.php?name=Downloads&amp;d_op=TopRated\">Top Rated Resources</a>.");
define_once("_DATE","Date");
define_once("_TO","To");
define_once("_NEW","New");
define_once("_POPULAR","Popular");
define_once("_TOPRATED","Top Rated");
define_once("_ADDITIONALDET","Additional Details");
define_once("_EDITORREVIEW","Editor Review");
define_once("_REPORTBROKEN","Report Broken Link");
define_once("_AND","and");
define_once("_INDB","in our database");
define_once("_INSTRUCTIONS","Instructions");
define_once("_USERANDIP","Username and IP are recorded, so please don't abuse the system.");
define_once("_LDESCRIPTION","Description: (255 characters max)");
define_once("_CHECKFORIT","You didn't provide an Email address but we will check your link soon.");
define_once("_LASTWEEK","Last Week");
define_once("_LAST30DAYS","Last 30 Days");
define_once("_1WEEK","1 Week");
define_once("_2WEEKS","2 Weeks");
define_once("_30DAYS","30 Days");
define_once("_SHOW","Show");
define_once("_DAYS","days");
define_once("_ADDEDON","Added on");
define_once("_RATING","Rating");
define_once("_DETAILS","Details");
define_once("_OF","of");
define_once("_TVOTESREQ","minimum votes required");
define_once("_SHOWTOP","Show Top");
define_once("_MOSTPOPULAR","Most Popular - Top");
define_once("_OFALL","of all");
define_once("_POPULARITY","Popularity");
define_once("_SELECTPAGE","Select Page");
define_once("_MAIN","Main");
define_once("_NEWTODAY","New Today");
define_once("_NEWLAST3DAYS","New last 3 days");
define_once("_NEWTHISWEEK","New This Week");
define_once("_POPULARITY1","Popularity (Least to Most Hits)");
define_once("_POPULARITY2","Popularity (Most to Least Hits)");
define_once("_TITLEAZ","Title (A to Z)");
define_once("_TITLEZA","Title (Z to A)");
define_once("_RATING1","Rating (Lowest Scores to Highest Scores)");
define_once("_RATING2","Rating (Highest Scores to Lowest Scores)");
define_once("_SEARCHRESULTS4","Search Results for");
define_once("_USUBCATEGORIES","Sub-Categories");
define_once("_TRY2SEARCH","Try to search");
define_once("_INOTHERSENGINES","in others Search Engines");
define_once("_EDITORIAL","Editorial");
define_once("_EDITORIALBY","Editorial by");
define_once("_NOEDITORIAL","No editorial is currently available for this website.");
define_once("_RATETHISSITE","Rate this Resource");
define_once("_ISTHISYOURSITE","Is this your resource?");
define_once("_ALLOWTORATE","Allow other users to rate it from your web site!");
define_once("_OVERALLRATING","Overall Rating");
define_once("_TOTALOF","Total of");
define_once("_USER","User");
define_once("_USERAVGRATING","User's Average Rating");
define_once("_NUMRATINGS","# of Ratings");
define_once("_REGISTEREDUSERS","Registered Users");
define_once("_NUMBEROFRATINGS","Number of Ratings");
define_once("_NOREGUSERSVOTES","No Registered User Votes");
define_once("_BREAKDOWNBYVAL","Breakdown of Ratings by Value");
define_once("_LTOTALVOTES","total votes");
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
define_once("_HTMLCODE3","Using this form will allow users to rate your resource directly from your site and the rating will be recorded here. The above form is disabled, but the following source code will work if you simply cut and paste it into your web page. The source code is shown below:");
define_once("_PROMOTE05","Thanks! and good luck with your ratings!");
define_once("_STAFF","Staff");
define_once("_THANKSBROKEN","Thank you for helping to maintain this directory's integrity.");
define_once("_SECURITYBROKEN","For security reasons your user name and IP address will also be temporarily recorded.");
define_once("_THANKSFORINFO","Thanks for the information.");
define_once("_LOOKTOREQUEST","We'll look into your request shortly.");
define_once("_SENDREQUEST","Send Request");
define_once("_THANKSTOTAKETIME","Thank you for taking the time to rate a site here at");
define_once("_RETURNTO","Return to");
define_once("_RATENOTE1","Please do not vote for the same resource more than once.");
define_once("_RATENOTE2","The scale is 1 - 10, with 1 being poor and 10 being excellent.");
define_once("_RATENOTE3","Please be objective in your vote, if everyone receives a 1 or a 10, the ratings aren't very useful.");
define_once("_RATENOTE5","Do not vote for your own resource or a competitor's.");
define_once("_YOUAREREGGED","You are a registered user and are logged in.");
define_once("_FEELFREE2ADD","Feel free to add a comment about this site.");
define_once("_YOUARENOTREGGED","You are not a registered user or you have not logged in.");
define_once("_IFYOUWEREREG","If you were registered you could make comments on this website.");
define_once("_TITLE","Title");
define_once("_MODIFY","Modify");
define_once("_COMPLETEVOTE1","Your vote is appreciated.");
define_once("_COMPLETEVOTE2","You have already voted for this resource in the past $anonwaitdays day(s).");
define_once("_COMPLETEVOTE3","Vote for a resource only once.<br>All votes are logged and reviewed.");
define_once("_COMPLETEVOTE4","You cannot vote on a link you submitted.<br>All votes are logged and reviewed.");
define_once("_COMPLETEVOTE5","No rating selected - no vote tallied");
define_once("_COMPLETEVOTE6","Only one vote per IP address allowed every $outsidewaitdays day(s).");
define_once("_LINKSDATESTRING","%d-%b-%Y");

