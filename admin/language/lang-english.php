<?php
/*======================================================================= 
  PHP-Nuke Titanium | Nuke-Evolution Xtreme : PHP-Nuke Web Portal System
 =======================================================================*/

/**************************************************************************/
/* PHP-NUKE: Advanced Content Management System                           */
/* ============================================                           */
/*                                                                        */
/* This is the language module with all the system messages               */
/*                                                                        */
/* If you made a translation, please go to my website and send to me      */
/* the translated file. Please keep the original text order by modules,   */
/* and just one message per line, also double check your translation!     */
/*                                                                        */
/* You need to change the second quoted phrase, not the capital one!      */
/*                                                                        */
/* If you need to use double quotes (") remember to add a backslash (\),  */
/* so your entry will look like: This is \"double quoted\" text.          */
/* And, if you use HTML code, please double check it.                     */
/**************************************************************************/

global $module_name, $admin_file, $sitename, $nukeurl, $admlang;

// this had to be added back
define_once("_LINKUS","Link Us");


define_once("_ALL","All");

define_once("_SEND","Send");
define_once("_URL","URL");
define_once("_EMAIL","Email");
define_once("_FUNCTIONS","Functions");
define_once("_YES","Yes");
define_once("_NO","No");
define_once("_REQUIRED","(required)");
define_once("_SAVECHANGES","Save Changes");
define_once("_OK","Ok!");
define_once("_SAVE","Save");
define_once("_ID","ID");
define_once("_SUBJECT","Subject");
define_once("_WHOSONLINE","Who's Online");
define_once("_ARTICLES","Articles");
define_once("_ALL","All");
define_once("_PREVIEW","Preview");
define_once("_YOUARELOGGEDOUT","You are now logged out!");
define_once("_HOMECONFIG","Home Configuration");
define_once("_DESCRIPTION","Description");
define_once("_HOMEPAGE","HomePage");
define_once("_NAME","Name");
define_once("_FROM","From");
define_once("_TO","To");
define_once("_SUBMIT","Submit");
define_once("_SHOW","Show");
define_once("_DAYS","days");
define_once("_STAFF","Staff");
define_once("_ADMINID","Admin ID");
define_once("_ADMINLOGIN","Administration System Login");
define_once("_EDITADMINS","Edit Admins");
define_once("_PREFERENCES","Preferences");
define_once("_ADMINMENU","Administration Menu");
define_once("_ADMINLOGOUT","Logout / Exit");
define_once("_LAST","Last");
define_once("_GO","Go!");
define_once("_CURRENTPOLL","Current Poll");
define_once("_STORYID","Story ID");
define_once("_REMOVECOMMENTS","Delete Comments");
define_once("_SURETODELCOMMENTS","Are you sure you want to delete selected Comment and all its replies?");
define_once("_BLOCKSADMIN","Blocks Administration");
define_once("_BLOCKS","Blocks");
define_once("_TITLE","Title");
define_once("_POSITION","Position");
define_once("_WEIGHT","Weight");
define_once("_STATUS","Status");
define_once("_LEFTBLOCK","Left Block");
define_once("_LEFT","Left");
define_once("_RIGHTBLOCK","Right Block");
define_once("_RIGHT","Right");
define_once("_ACTIVE","Active");
define_once("_DEACTIVATE","Deactivate");
define_once("_INACTIVE","Inactive");
define_once("_ACTIVATE","Activate");
define_once("_TYPE","Type");
define_once("_ADDNEWBLOCK","Add a New Block");
define_once("_RSSFILE","RSS/RDF file URL");
define_once("_ONLYHEADLINES","(Only for Headlines)");
define_once("_CONTENT","Content");
define_once("_ACTIVATE2","Activate?");
define_once("_REFRESHTIME","Refresh Time");
define_once("_HOUR","Hour");
define_once("_CREATEBLOCK","Create Block");
define_once("_EDITBLOCK","Edit Block");
define_once("_BLOCK","Block");
define_once("_SAVEBLOCK","Save Block");
define_once("_BLOCKACTIVATION","Block Activation");
define_once("_BLOCKPREVIEW","This is the preview for Block");
define_once("_WANT2ACTIVATE","Do you want to Activate this block?");
define_once("_ARESUREDELBLOCK","Are you sure you want to remove Block");
define_once("_RSSFAIL","There is a problem with the RSS file URL");
define_once("_RSSTRYAGAIN","Please check the URL and RSS file name, then try again.");
define_once("_RSSCONTENT","(RSS/RDF Content)");
define_once("_IFRSSWARNING","If you fill the URL the content you write will not be displayed!");
define_once("_BLOCKUP","Block UP");
define_once("_BLOCKDOWN","Block DOWN");
define_once("_SETUPHEADLINES","(Select Custom and write the URL or just select a Site from the list to grab news headlines)");
define_once("_HEADLINESADMIN","Headlines Administration");
define_once("_ADDHEADLINE","Add Headline");
define_once("_EDITHEADLINE","Edit Headlines");
define_once("_SURE2DELHEADLINE","WARNING: Are you sure you want to delete this Headline?");
define_once("_CUSTOM","Custom");
define_once("_AUTHORSADMIN","Author's Administration");
define_once("_MODIFYINFO","Modify Info");
define_once("_DELAUTHOR","Delete Author");
define_once("_ADDAUTHOR","Add a New Administrator");
define_once("_PERMISSIONS","Permissions");
define_once("_USERS","Users");
define_once("_SUPERUSER","Super User");
define_once("_SUPERWARNING","WARNING: If Super User is checked, the user will get full access!");
define_once("_ADDAUTHOR2","Add Author");
define_once("_RETYPEPASSWD","Retype Password");
define_once("_FORCHANGES","(For Changes Only)");
define_once("_COMPLETEFIELDS","You must complete all compulsory fields");
define_once("_CREATIONERROR","Author's Creation Error");
define_once("_AUTHORDELSURE","Are you sure you want to delete");
define_once("_AUTHORDEL","Delete Autor");
define_once("_REQUIREDNOCHANGE","(required, can't be changed later)");
define_once("_PUBLISHEDSTORIES","This administrator has published stories");
define_once("_SELECTNEWADMIN","Please select a new admin to re-assign them");
define_once("_GODNOTDEL","*(GOD account can't be deleted)");
define_once("_MAINACCOUNT","God Admin*");
define_once("_ADD","Add");
define_once("_DAY","Day");
define_once("_AUTOMATEDARTICLES","Programmed Articles");
define_once("_NOAUTOARTICLES","There are no programmed articles");
define_once("_NOFUNCTIONS","---------");
define_once("_WHOLINKS","Who's linking our site?");
define_once("_DELETEREFERERS","Delete Referers");
define_once("_SITENAME","Site Name");
define_once("_PASSWDNOMATCH","Sorry, the new passwords doesn't match. Go Back and Try Again");
define_once("_SITECONFIG","Web Site Configuration");
define_once("_GENSITEINFO","General Site Info");
define_once("_SITEURL","Site URL");
define_once("_SITELOGO","Site Logo");
define_once("_SITESLOGAN","Site Slogan");
define_once("_ADMINEMAIL","Administrator Email");
define_once("_ITEMSTOP","Number of Items in Top Page");
define_once("_STORIESHOME","Stories Number in Home");
define_once("_OLDSTORIES","Stories in Old Articles Box");
define_once("_ACTULTRAMODE","Activate Ultramode?");
define_once("_DEFAULTTHEME","Default Theme for your site");
define_once("_SELLANGUAGE","Select the Language for your Site");
define_once("_LOCALEFORMAT","Locale Time Format");
define_once("_BANNERSOPT","Banners Options");
define_once("_STARTDATE","Site Start Date");
define_once("_ACTBANNERS","Activate Banners in your site?");
define_once("_FOOTERMSG","Footer Messages");
define_once("_FOOTERLINE1","Footer Line 1");
define_once("_FOOTERLINE2","Footer Line 2");
define_once("_FOOTERLINE3","Footer Line 3");
define_once("_BACKENDCONF","Backend Configuration");
define_once("_BACKENDTITLE","Backend Title");
define_once("_BACKENDLANG","Backend Language");
define_once("_MAIL2ADMIN","Mail New Stories to Admin");
define_once("_NOTIFYSUBMISSION","Notify new submissions by email?");
define_once("_EMAIL2SENDMSG","Email to send the message");
define_once("_EMAILSUBJECT","Email Subject");
define_once("_EMAILMSG","Email Message");
define_once("_EMAILFROM","Email Account (From)");
define_once("_COMMENTSMOD","Comments Moderation");
define_once("_MODTYPE","Type of Moderation");
define_once("_MODADMIN","Moderation by Admin");
define_once("_MODUSERS","Moderation by Users");
define_once("_NOMOD","No Moderation");
define_once("_COMMENTSOPT","Comments Option");
define_once("_COMMENTSLIMIT","Comments Limit in Bytes");
define_once("_ANONYMOUSNAME","Anonymous Default Name");
define_once("_GRAPHICOPT","Graphics Options");
define_once("_ADMINGRAPHIC","Graphics in Administration Menu?");
define_once("_MISCOPT","Miscellaneous Options");
define_once("_PASSWDLEN","Minimum users password length");
define_once("_MAXREF","How Many Referers you want as Maximum?");
define_once("_COMMENTSPOLLS","Activate Comments in Polls?");
define_once("_ALLOWANONPOST","Allow Anonymous to Post?");
define_once("_ACTIVATEHTTPREF","Activate HTTP Referers?");
define_once("_SIZE","Size");
define_once("_MESSAGES","Messages");
define_once("_MESSAGESADMIN","Messages Administration");
define_once("_MESSAGETITLE","Title");
define_once("_MESSAGECONTENT","Content");
define_once("_EXPIRATION","Expiration");
define_once("_VIEWPRIV","Who can View This?");
define_once("_MVADMIN","Administrators Only");
define_once("_MVUSERS","Registered Users Only");
define_once("_MVANON","Anonymous Users Only");
define_once("_MVALL","All Visitors");
define_once("_CHANGEDATE","Change start date to today?");
define_once("_IFYOUACTIVE","(If you Active this Message now, the start date will be today)");
define_once("_FILENAME","Filename");
define_once("_FILEINCLUDE","(Select a custom Block to be included. All other fields will be ignored)");
define_once("_BLOCKFILE","(Block File)");
define_once("_COMMENTSARTICLES","Activate Comments in Articles?");
define_once("_MULTILINGUALOPT","Multilingual Options");
define_once("_ACTMULTILINGUAL","Activate Multilingual features? ");
define_once("_ACTUSEFLAGS","Display flags instead of a dropdown box? ");
define_once("_LANGUAGE","Language");
define_once("_EDITMSG","Edit message");
define_once("_ADDMSG","Add message");
define_once("_ALLMESSAGES","Overview messages");
define_once("_VIEW","Visible to");
define_once("_REMOVEMSG","Are you sure you want to remove this message ? ");
define_once("_MODULES","Modules");
define_once("_MODULESADMIN","Modules Administration");
define_once("_MODULESADDONS","Modules and Addons");
define_once("_MODULESACTIVATION","See your Modules/Addons current status and change it by Activating or Deactivating them.<br>New Modules copied on the <i>/modules/</i> directory will be automaticaly added with <i>Inactive</i> status to the database when you reload this page.<br>If you want to remove a module just delete it from the <i>/modules/</i> directory, the system will automaticaly update your database to show the changes.");
define_once("_NEWSLETTER","Newsletter");
define_once("_MASSMAIL","A Massive e-mail to ALL users");
define_once("_ANEWSLETTER","A Newsletter to subscribed users only");
define_once("_WHATTODO","What do you want to send?");
define_once("_SUBSCRIBEDUSERS","Subscribed Users");
define_once("_NYOUAREABOUTTOSEND","You're about to send a Newsletter to subscribed users.");
define_once("_NUSERWILLRECEIVE","Users will receive this Newsletter.");
define_once("_REVIEWTEXT","Please review and check your text:");
define_once("_NAREYOUSURE2SEND","Are you sure to send this Newsletter now?");
define_once("_MYOUAREABOUTTOSEND","You're about to send a Massive e-mail to ALL registered users.");
define_once("_MUSERWILLRECEIVE","Users will receive this Mail.");
define_once("_MAREYOUSURE2SEND","Are you sure to send this Massive Email now?");
define_once("_POSSIBLESPAM","Please note that some users may feel disturbed by massive email and may consider this as Spam!");
define_once("_MASSEMAIL","Massive Email");
define_once("_MANYUSERSNOTE","WARNING! There are many users that will receive this text. Please wait until the script finish the operation. This can take some minutes to complete!");
define_once("_NLUNSUBSCRIBE","=========================================================\nYou're receiving this Newsletter because you selected to receive it from your user page at $sitename.\nYou can unsubscribe from this service by clicking in the following URL:\n\n$nukeurl/modules.php?name=Your_Account&op=edituser\"\n\nthen select \"No\" from the option to Receive Newsletter by Email and save your changes, if you need more assistance please contact $sitename administrator.");
define_once("_NEWSLETTERSENT","The Newsletter has been sent.");
define_once("_MASSEMAILSENT","Massive Email to all registered users has been sent.");
define_once("_MASSEMAILMSG","=========================================================\nYou're receiving this email because you're a registered user of $sitename. We hope that this email didn't disturbed you and in some manner contributes to improve our services.");
define_once("_FIXBLOCKS","Fix Block's Weight Conflicts");
define_once("_SAVEDATABASE","Backup DB");
define_once("_DBOPTIMIZATION","Database Optimization");
define_once("_OPTIMIZINGDB","Optimizing the Database:");
define_once("_TABLE","Table");
define_once("_SPACESAVED","Space Saved");
define_once("_ALREADYOPTIMIZED","Already optimized");
define_once("_OPTIMIZED","Optimized!");
define_once("_OPTIMIZATIONRESULTS","Optimization Results");
define_once("_TOTALSPACESAVED","Total Space Saved:");
define_once("_YOUHAVERUNSCRIPT","You have run this script:");
define_once("_KBSAVED","Kb saved since its first execution!");
define_once("_TIMES","times");
define_once("_CUSTOMTITLE","Custom Title");
define_once("_CHANGEMODNAME","Change Module Name");
define_once("_CUSTOMMODNAME","Custom Module Name:");
define_once("_MODULEEDIT","Modules Edit");
define_once("_BLOCKFILE2","FILE");
define_once("_BLOCKSYSTEM","SYSTEM");
define_once("_DEFHOMEMODULE","Default Homepage Module");
define_once("_MODULEINHOME","Module Loaded in the Homepage:");
define_once("_CHANGE","Change");
define_once("_INHOME","In Home");
define_once("_MODULEHOMENOTE","<b>-= WARNING =-</b><br>Bold module's title represents the module you have in the Homepage.<br>You can't Deactivate or Restrict this module while it's the default one!<br>If you delete the module's directory you'll see and error in the Homepage.<br>Also, this module has been replaced with <i>Home</i> link in the modules block.");
define_once("_PUTINHOME","Put in Home");
define_once("_SURETOCHANGEMOD","Are you sure you want to change your Homepage from");
define_once("_CENTERBLOCK","Center Block");
define_once("_ADMINISTRATION","Administration");
define_once("_NOADMINYET","There are no Administrators Accounts yet, proceeed to create the Super User:");
define_once("_CREATEUSERDATA","Do you want to create a normal user with the same data?");
define_once("_CENTERUP","Center Up");
define_once("_CENTERDOWN","Center Down");
define_once("_NOTINMENU","[ <big><strong>&middot;</strong></big> ] means a module which name and link will not be visible in Modules Block");
define_once("_SHOWINMENU","Visible in Modules Block?");
define_once("_MUSTBEINIMG","must be in /images/ directory. Valid only for AvantGo module");
define_once("_USERSOPTIONS","Users Options");
define_once("_BROADCASTMSG","Activate Broadcast Messages?");
define_once("_MYHEADLINES","Activate Headlines Reader?");
define_once("_USERSHOMENUM","Let users change News number in Home?");
define_once("_CENSOROPTIONS","Censure Options");
define_once("_CENSORMODE","Censor Mode");
define_once("_NOFILTERING","No filtering");
define_once("_EXACTMATCH","Exact match");
define_once("_MATCHBEG","Match word at the beginning");
define_once("_MATCHANY","Match anywhere in the text");
define_once("_CENSORREPLACE","Replace Censored Words with:");
define_once("_SECURITYCODE","Security Code");
define_once("_TYPESECCODE","Type Security Code Here");
define_once("_UGROUPS","Users Groups");
define_once("_POINTS","Points");
define_once("_USERSCOUNT","Users Count");
define_once("_ADDNEWGROUP","Add New Users Group");
define_once("_GTITLE","Group Name");
define_once("_POINTSNEEDED","Points Needed");
define_once("_ONLYNUMVAL","Use numeric values only");
define_once("_CREATEGROUP","Create This Group");
define_once("_NOGROUPS","There aren't any Users Group created at this time");
define_once("_POINTSSYSTEM","Points System");
define_once("_UPDATE","Update");
define_once("_EDITGROUP","Edit Users Group");
define_once("_SAVEGROUP","Save Group");
define_once("_GROUPSADMIN","Users Group Administration");
define_once("_GROUPADDERROR","Group Creation Error!");
define_once("_GROUPDELETE","Delete Users Group");
define_once("_SUREGRPDEL1","Are you sure you want to remove/delete the group?:");
define_once("_NONUMVALUE","The value of the Points isn't numeric. Go back and fix it.");
define_once("_GROUP","Group");
define_once("_UGROUP","Users Group");
define_once("_VALIDIFREG","Valid only if Registered Users are selected above");
define_once("_POINTS01","Journal Entry");
define_once("_DESC01","Personal user's Journal entry. Valid for publics and privates entries");
define_once("_POINTS02","Journal Comment");
define_once("_DESC02","Each comment posted in a public user's Journal");
define_once("_POINTS03","Recommendation to a Friend");
define_once("_DESC03","Each time a user send the link to our site to a friend via Recommend Us Module");
define_once("_POINTS04","News Submission Published");
define_once("_DESC04","News that the user sends from Submit News module and then published by the administrator");
define_once("_POINTS05","News Comment");
define_once("_DESC05","Comment published for any article and/or news");
define_once("_POINTS06","News Sent to a Friend");
define_once("_DESC06","Each article's or news has an option to send it to a friend. Points valid for each time the user sends the article to a friend");
define_once("_POINTS07","News Article Rating");
define_once("_DESC07","Each time a user votes for any article");
define_once("_POINTS08","Vote in Surveys");
define_once("_DESC08","Each vote registered for any survey, actual or old ones are valid");
define_once("_POINTS09","Comment in Surveys");
define_once("_DESC09","Comment published for any actual or old survey");
define_once("_POINTS10","Forum New Post");
define_once("_DESC10","Each time the user opens a new thread in the Forums");
define_once("_POINTS11","Forum Answer Post");
define_once("_DESC11","Forums threads answered or replied");
define_once("_POINTS12","Review Comment");
define_once("_DESC12","Comment published for any review in the Reviews module");
define_once("_POINTS13","Page View");
define_once("_DESC13","Get points for each page view generated by the user. Valid for any page of the site");
define_once("_POINTS14","Visit to a WebLink");
define_once("_DESC14","Each time a user clicks to visit any resource on WebLinks module");
define_once("_POINTS15","Rate to any WebLink");
define_once("_DESC15","Each time a user votes for a resource in WebLinks module");
define_once("_POINTS16","Comment to any WebLink");
define_once("_DESC16","Comments posted on any resource in the WebLink module");
define_once("_POINTS17","Download of a File");
define_once("_DESC17","Each time a user clicks to download any file or resource on Downloads module");
define_once("_POINTS18","Rate to any Download");
define_once("_DESC18","Each time a user votes for a resource in Downloads module");
define_once("_POINTS19","Comment to any Download");
define_once("_DESC19","Comments posted on any resource in the Downloads module");
define_once("_POINTS20","Broadcast Message");
define_once("_DESC20","Each time a user publish a public message using the Broadcast message system");
define_once("_POINTS21","Click on any Banner");
define_once("_DESC21","The best way to give back a user something is to give him some points for banner clicks on your site");
define_once("_AFTEREXPIRATION","After Expiration");
define_once("_SUBUSERS","Subscribed Users");
define_once("_SUBVISIBLE","Visible to Subscribers?");
define_once("_IPBANSYSTEM","IP Ban System");
define_once("_BANNEWIP","Ban a new IP Address");
define_once("_IPBANNED","Banned IP Addresses");
define_once("_BANDATE","Ban Date");
define_once("_UNBAN","UnBan");
define_once("_IPNUMERIC","And IP address should be numeric");
define_once("_IPENTERED","IP address entered:");
define_once("_ERROR","ERROR:");
define_once("_IPOUTRANGE","IP address is out of range");
define_once("_IPSTARTZERO","And IP address can't start with 0");
define_once("_IPLOCALHOST","You can't ban the localhost IP address");
define_once("_SUCCESS","Success!!");
define_once("_THEIP","The IP address");
define_once("_HASBEENBANNED","has been banned from this site");
define_once("_SURETOBANIP","Are you sure you want to UNBAN the following IP address:");
define_once("_IPYOURS","You can't ban your own IP address!");
define_once("_REASON","Reason");
define_once("_BANCLASSC","Character * is accepted as the last number, but this will ban a complete Class C network. Use it carefuly and only in extreme cases.");
define_once("_CONTENTMODERATION","Content Moderation - Karma System");
define_once("_SELECTOPTION","Please select an option from the following list:");
define_once("_NEWSCOMMENTS","News Comments");
define_once("_SURVEYCOMMENTS","Surveys Comments");
define_once("_REVIEWSCOMMENTS","Reviews Comments");
define_once("_ALLMARKEDUSERS","All Marked Users");
define_once("_NEWSPENDING","News Comments - Approval Pending");
define_once("_COMMENTTITLE","Comment Title");
define_once("_USER","User");
define_once("_APPROVE","Approve");
define_once("_REJECT","Reject");
define_once("_NOCONTENT","There is no content here at this time...");
define_once("_ORIGINALARTICLE","Original Article of this comment:");
define_once("_INREPLYTO","In reply to the following comment:");
define_once("_COMMENTAPPPENDING","Comment with Approval Pending:");
define_once("_SURVEYPENDING","Surveys Comments - Approval Pending");
define_once("_COMMENTTOSURVEY","Comment to the Survey:");
define_once("_REVIEWSPENDING","Reviews Comments - Approval Pending");
define_once("_WITHSCORE","with a Score:");
define_once("_REGKARMAUSERS","Regular Karma Users");
define_once("_BADKARMAUSERS","Bad Karma Users");
define_once("_DEVKARMAUSERS","Devil Karma Users");
define_once("_CURRENTKARMA","Current Karma");
define_once("_USERNAME","Username");
define_once("_BANNERS","Banners");
define_once("_DOWNLOAD","Downloads");
define_once("_ENCYCLOPEDIA","Encyclopedia");
define_once("_FAQ","F.A.Q.");
define_once("_NEWS","News");
define_once("_REVIEWS","Reviews");
define_once("_ADMPOLLS","Polls/Surveys");
define_once("_TOPICS","Topics");
define_once("_WEBLINKS","Web Links");
define_once("_IMAGESWFURL","Image or Flash file URL");
define_once("_MODERATIONKARMA","Moderation - Users Karma System");
define_once("_BANNEDIPEDIT","Edit Banned IP Address");
define_once("_BANTHISIP","Ban this IP");
define_once("_LANGUAGES","Languages");
define_once("_PUBLISHNOW","Publish Now");
define_once("_GENERAL","General");
define_once("_THEMES","Themes");
define_once("_SETCOMMENTS","Comments");
define_once("_FOOTER","Footer");
define_once("_BACKEND","Backend");
define_once("_REFERERS","Referers");
define_once("_MAILING","Mailing");
define_once("_OTHERS","Others");
define_once("_SITECONFIGURE","Please select the site section to configure from the following menu:");
define_once("_NOCHECK","No Check");
define_once("_ADMINONLY","Administrators login only");
define_once("_USERSONLY","Users login only");
define_once("_REGUSERSONLY","New users registration only");
define_once("_BOTHREGADMIN","Both, users login and new users registration");
define_once("_ADMINUSERS","Administrators and users login");
define_once("_ADMINNEW","Administrators and new users registration");
define_once("_EVERYWHERE","Everywhere on all login options (Admins and Users)");
define_once("_WITHOUTEDITOR","Without Editor (HTML Textareas)");
define_once("_WITHEDITOR","WYSIWYG Editor");
define_once("_DISPLAYPHPERR","Display PHP System Errors");
define_once("_THEMECONFIG","Theme Configuration");
define_once("_AUTOTHEMESTATUS","AutoTheme Module Status");
define_once("_LETUSERSCHANGETHM","Let users to change Themes?");
define_once("_ACTIVATED","Activated");
define_once("_DEACTIVATED","Deactivated");
define_once("_USERSCONFIG","Users Options Configuration");
define_once("_ALLOWANOMCOM","Allow Anonymous to Submit Comments?");
define_once("_COMMENTSCONFIG","Comments Configuration");
define_once("_LANGUAGESCONFIG","Languages Configuration");
define_once("_FOOTERCONFIG","Pages Footer Configuration");
define_once("_BACKENDCONFIG","Backend Feed Configuration");
define_once("_REFCONFIG","HTTP Referers Configuration");
define_once("_REFSHOWMODE","Show Referers Mode");
define_once("_ABRIDGED","Abridged");
define_once("_UNABRIDGED","Unabridged");
define_once("_MAILCONFIG","Mailing Options Configuration");
define_once("_OTHERCONFIG","Other Options Configuration");

/*****[BEGIN]******************************************
 [ Other:    Database Manager                  v2.0.0 ]
 ******************************************************/
define_once("_GO", "Go");
define_once("_DATABASE_ADMIN_HEADER", "Database Backup Panel");
define_once("_DATABASE_RETURNMAIN", "Return to Main Administration");
define_once("_DATABASE", "Database");
define_once("_ACTIONRESULTS", "Here are the results of your");
define_once("_IMPORTSUCCESS","Importation of <em>%s</em> was successful");
define_once("_CHECKALL","Check All");
define_once("_UNCHECKALL","Uncheck All");
define_once("_SAVEDATABASE","Backup DB");
define_once("_ANALYZEDATABASE","Analyze");
define_once("_CHECKDATABASE","Check");
define_once("_OPTIMIZEDATABASE","Optimize");
define_once("_REPAIRDATABASE","Repair");
define_once("_STATUSDATABASE","Status");
define_once("_BACKUPTASKS","Backup Tasks");
define_once("_SAVEDATA","Save Data");
define_once("_INCLUDESTATEMENT","Include %s statement");
define_once("_GZIPCOMPRESS","Use GZIP Compression");
define_once("_OPTIMIZETEXT",'<strong>OPTIMIZE</strong></div><br /><div align="justify">Should be used if you have deleted a large part of a table or if you have made many changes to a table with variable-length rows (tables that have VARCHAR, BLOB, or TEXT columns). Deleted records are maintained in a linked list and subsequent INSERT operations reuse old record positions. You can use OPTIMIZE to reclaim the unused space and to defragment the datafile.<br />
In most setups you don\'t have to run OPTIMIZE at all. Even if you do a lot of updates to variable length rows it\'s not likely that you need to do this more than once a month/week and only on certain tables.</div><br />
OPTIMIZE works in the following way:<ul>
<li>If the table has deleted or split rows, repair the table.</li>
<li>If the index pages are not sorted, sort them.</li>
<li>If the statistics are not up to date (and the repair couldn\'t be done by sorting the index), update them.</li>
</ul><strong>Note:</strong> the table is locked during the time in which OPTIMIZE is running!<br /><strong>Note:</strong> This admin backup module has been updated for PHP 7.xx');
define_once("_IMPORTFILE","Import SQL File");
define_once("_IMPORTSQL", "Import");
define_once("_DBACTION", "Action");
/*****[END]********************************************
 [ Other:    Database Manager                  v2.0.0 ]
 ******************************************************/
 
/**
 * Language Defines: Live Feed
 * @since 2.0.9d
 */
$admlang['livefeed']['anouncement']          = 'Announcement';
$admlang['livefeed']['bugfix']               = 'Bugfix';
$admlang['livefeed']['new_release']          = 'New Release';
$admlang['livefeed']['security']             = 'Security';
$admlang['livefeed']['update']               = 'Update Announcement';
$admlang['livefeed']['header']               = 'Live News Feed';
$admlang['livefeed']['type']                 = 'News type';
$admlang['livefeed']['message']              = 'Message';
$admlang['livefeed']['save']                 = 'Save Live Feed Data';
$admlang['livefeed']['title']				 = 'Title';
$admlang['livefeed']['refresh']				 = 'Refresh feed';

$admlang['modblock']['delete'] = 'Delete category';
$admlang['modblock']['edit'] = 'Edit category';
$admlang['modblock']['is_inactive'] = 'Module is not active<br />(Double click to activate/deactivate)'; 
$admlang['modblock']['is_link'] = 'Is a link';
$admlang['modblock']['link_delete'] = 'Delete a link';
$admlang['modblock']['link_title'] = 'Link Title';
$admlang['modblock']['link_title_error'] = 'You must provide a title and link';
$admlang['modblock']['not_found'] = 'Category not found';
$admlang['modblock']['no_values'] = 'Could Not Get Values';
$admlang['modblock']['order'] = 'Change category order';

$admlang['modblock']['image'] = 'Category Image Filename';
$admlang['modblock']['image_note'] = '<strong>NOTE:</strong> Category Images must be placed in <i>images/blocks/modules/</i> folder.';
$admlang['modblock']['explain1'] = 'Please note that when you activate or deactivate a module here<br />that it will be instant to users but not to you, until you refresh your screen!';
$admlang['modblock']['explain2'] = 'Also you <strong>MUST</strong> hit submit before the category order changes are saved.<br />The changes are not automatically saved!';


$admlang['modblock']['modedit'] = 'Modules Edit';
$admlang['modblock']['sort_up'] = 'Move Category Up';
$admlang['modblock']['sort_down'] = 'Move Category Down';
/*****[END]********************************************
 [ Base:    Modules                            v.1.0.0]
 ******************************************************/

$admlang['logged_out']                  = 'You are now logged out!';
$admlang['admin_id']                    = 'Admin ID';
$admlang['admin_login_header']          = 'Administration System Login';
$admlang['admin_login_persistent']      = 'Log me on automatically each visit';
$admlang['edit_admins']                 = 'Edit Admins';
$admlang['blocks']['link'] 				= 'Blocks';
$admlang['blocks']['header']            = 'Blocks Administration';
$admlang['blocks']['new'] 				= 'Add a New Block';
$admlang['blocks']['visible'] 			= 'Visible Blocks';
$admlang['blocks']['centerup'] 			= 'Center Up';
$admlang['blocks']['centerdown'] 		= 'Center Down';
$admlang['blocks']['left_block'] 		= 'Left Block';
$admlang['blocks']['right_block'] 		= 'Right Block';
$admlang['blocks']['edit'] 				= 'Edit Block';
$admlang['blocks']['include']			= '(Select a custom Block to be included. All other fields will be ignored)';
$admlang['blocks']['headlines'] 		= '(Only for Headlines)';
$admlang['blocks']['rss_warn'] 			= 'If you fill the URL the content you write will not be displayed!';
$admlang['blocks']['refresh'] 			= 'Refresh Time';
$admlang['blocks']['headlines_setup'] 	= '(Select Custom and write the URL or just select a Site from the list to grab news headlines)';
$admlang['blocks']['create'] 			= 'Create Block';
$admlang['blocks']['save'] 				= 'Save Block';

$admlang['headlines']['header'] = 'Headlines Administration';
$admlang['headlines']['add'] = 'Add Headline';
$admlang['headlines']['edit'] = 'Edit Headlines';
$admlang['headlines']['delete_warn'] = 'WARNING: Are you sure you want to delete this Headline?';

$admlang['authors']['header'] 			= 'Admin Author\'s Panel';
$admlang['authors']['author'] 			= 'Author';
$admlang['authors']['add'] 				= 'Add a New Administrator';
$admlang['authors']['delete'] 			= 'Delete Author';
$admlang['authors']['changes'] 			= '(For Changes Only)';
$admlang['authors']['god'] 				= '* (GOD account can\'t be deleted)';
$admlang['authors']['main'] 			= 'God Admin *';
$admlang['authors']['modify']			= 'Modify Info';
$admlang['authors']['can_not'] 			= 'Can not be changed later.';
$admlang['authors']['option1'] 			= 'Option';
$admlang['authors']['required'] 		= 'Required field';
$admlang['authors']['submit'] 			= 'Add new Author';
$admlang['authors']['superadmin']		= 'Super Admin';
$admlang['authors']['superwarn']		= 'WARNING: If Super Admin is checked, the user will get full access! (excludes Edit Admins and Nuke Sentinel)';

// define("_NOFUNCTIONS","---------");
// define("_PASSWDNOMATCH","Sorry, the new passwords doesn't match. Go Back and Try Again");

$admlang['referers']['header']			= 'HTTP Referers Admin Panel';
$admlang['referers']['linking']			= 'Who\'s linking to ';
$admlang['referers']['delete']			= 'Delete Referers';
$admlang['referers']['date']			= 'Visited Date';
$admlang['referers']['link']			= 'URL of Referer';
$admlang['referers']['none']			= 'There are no %s to display';


$admlang['preferences']['link'] 		= 'Preferences';
$admlang['preferences']['header']		= 'PHP-Nuke Titanium Preferences :: Admin Panel';

$admlang['preferences']['plugins'] 		= 'Plugins';
$admlang['plugins']['header'] 			= 'Custom Plugin Administration';

$admlang['pm_alert']['title'] 			= 'Private Message Popup Alert';
$admlang['pm_alert']['status'] 			= 'Do you wish to activate the Private Message Alert?';
$admlang['pm_alert']['cookie'] 			= 'Cookie Name';
$admlang['pm_alert']['refresh'] 		= 'Minutes between alerts';
$admlang['pm_alert']['refresh_explain']	= '0 = No time between alerts on page refresh<br />5 = Default Setting';
$admlang['pm_alert']['alert'] 			= 'Seconds the user has to wait before been alerted';
$admlang['pm_alert']['alert_explain']	= '0 = Instantly';
$admlang['pm_alert']['sound']			= 'Play Sound';
$admlang['pm_alert']['background']		= 'Background Color Overlay';
$admlang['pm_alert']['color']			= 'Button Color';
$admlang['pm_alert']['hover']			= 'Button Hover Color';


$admlang['viewer']['title']				= 'Image Viewing Script';
$admlang['viewer']['select']			= 'Select the Image Viewer';
$admlang['viewer']['colorbox']			= 'Colorbox';
$admlang['viewer']['fancybox']			= 'Fancybox';
$admlang['viewer']['lightbox']			= 'Lightbox';
$admlang['viewer']['lightboxevo']		= 'Lightbox Evolution';
$admlang['viewer']['lightboxlite']		= 'Lightbox Lite';


$admlang['preferences']['config'] 			= 'Web Site Configuration';
$admlang['preferences']['general'] 			= 'General Site Info';
$admlang['preferences']['language_opts']	= 'Language Options';
$admlang['preferences']['site_logo']		= 'Site Logo';
$admlang['preferences']['site_slogon']		= 'Site Slogan';
$admlang['preferences']['admin_email']		= 'Administrator Email';
$admlang['preferences']['items']			= 'Number of Items in Top Page';
$admlang['preferences']['stories']			= 'Stories Number in Home';
$admlang['preferences']['blogs_old']		= 'Stories in Old Articles Box';
$admlang['preferences']['ultra_mode']		= 'Activate Ultramode';
$admlang['preferences']['guests_post'] 		= 'Allow Anonymous to Post';
$admlang['preferences']['locale_format'] 	= 'Locale Time Format';
// define("_LOCALEFORMAT","Locale Time Format");

// define("_DEFAULTTHEME","Default Theme for your site");


// define("_BANNERSOPT","Banners Options");

$admlang['preferences']['start_date']	= 'Site Start Date';
// define("_STARTDATE","Site Start Date");


$admlang['preferences']['footer'] 		= 'Footer Messages';

$admlang['footer']['title'] 			= 'Footer Messages';
$admlang['footer']['line1'] 			= 'Footer Line 1';
$admlang['footer']['line2'] 			= 'Footer Line 2';
$admlang['footer']['line3'] 			= 'Footer Line 3';

$admlang['preferences']['backend'] 		= 'Backend Configuration';
// define("_BACKENDCONF","Backend Configuration");
// define("_BACKENDTITLE","Backend Title");
// define("_BACKENDLANG","Backend Language");
$admlang['backend']['config'] 			= 'Backend Configuration';
$admlang['backend']['title'] 			= 'Backend Title';
$admlang['backend']['language'] 		= 'Backend Language';

$admlang['preferences']['security'] 	= 'Security Options';

$admlang['preferences']['submissions'] 	= 'Submissions';
$admlang['submissions']['notify'] 		= 'Notify new submissions by email?';
$admlang['submissions']['email'] 		= 'Email to send the message';
$admlang['submissions']['subject'] 		= 'Email Subject';
$admlang['submissions']['message'] 		= 'Email Message';
$admlang['submissions']['from'] 		= 'Email Account (From)';

$admlang['preferences']['comment_opts'] = 'Comments Option';
$admlang['comments']['limit'] 			= 'Comments Limit in Bytes';
$admlang['comments']['guest_default'] 	= 'Anonymous Default Name';
$admlang['comments']['no_moderation'] 	= 'No Moderation';
$admlang['comments']['admins'] 			= 'Moderation by Admin';
$admlang['comments']['users'] 			= 'Moderation by Users';

// define("_COMMENTSMOD","Comments Moderation");
// define("_MODTYPE","Type of Moderation");

$admlang['preferences']['graphics'] 	= 'Graphics Options';
$admlang['graphics']['show'] 			= 'Graphics in Administration Menu?';
$admlang['graphics']['position'] 		= 'Admin Position';
$admlang['graphics']['position_opt'] 	= 'Have the admin icons/links';


$admlang['preferences']['misc'] 		= 'Miscellaneous Options';
$admlang['misc']['referers'] 			= 'Activate HTTP Referers?';
$admlang['misc']['referers_max'] 		= 'How Many Referers you want as Maximum?';
$admlang['misc']['poll_comments'] 		= 'Activate Comments in Polls?';
$admlang['misc']['poll_comments_active'] = 'Activate Comments in Articles?';
$admlang['misc']['myheadlines'] 		= 'Activate Headlines Reader?';
$admlang['misc']['ssl_admin'] 			= 'Activate SSL mode for admin?';
$admlang['misc']['ssl_admin_warn'] 		= 'You must have SSL installed on your server';
$admlang['misc']['queries'] 			= 'Count Queries?';
$admlang['misc']['colors'] 				= 'Activate Username and Group Colors';
$admlang['misc']['lock_modules'] 		= 'Force users to login before they can do anything';
$admlang['misc']['banners'] 			= 'Activate Banners in your site?';
$admlang['misc']['textarea'] 			= 'Textarea';
$admlang['misc']['html_bypass'] 		= 'Should God admins be allowed to bypass the HTMLPurifier';
$admlang['misc']['lazy_tap'] 			= 'Lazy Google Tap';
$admlang['misc']['lazy_tap_bots'] 		= 'Bots Only';
$admlang['misc']['lazy_tap_everyone'] 	= 'Everyone';
$admlang['misc']['lazy_tap_admin'] 		= 'Admins and Bots';
// define('_LAZY_TAP_NF','You must have a .htaccess file to use Lazy Google Tap <br />Please see the Lazy Google Tap help file');
// define('_LAZY_TAP_ERROR_OPEN','Could not open .htaccess ');
// define('_LAZY_TAP_ERROR','Your .htaccess is not setup correctly <br />Please see the Lazy Google Tap help file');
$admlang['misc']['image_resize'] 		= 'Image Resize';
$admlang['misc']['image_resize_width'] 	= 'Max Image Width';
$admlang['misc']['image_resize_height'] = 'Max Image Height';
$admlang['misc']['collapse'] 			= 'Collapsible categories?';

$admlang['misc']['cache_time'] 			= 'Minutes or Hours before Blockcontents will be refreshed (cached)';
$admlang['misc']['cache_deactivated']	= 'Block Cache Deactivated';
$admlang['misc']['cache_minutes']		= 'Minutes';
$admlang['misc']['cache_hours']			= 'Hours';

$admlang['misc']['analytics'] 			= 'Google Analytics';

// define("_LOCK_MODULES_TITLE","Force Users to Login");
// define("_SIZE","Size");

$admlang['language']['select'] 			= 'Select the Language for your Site';
$admlang['language']['multi'] 			= 'Activate Multilingual features?';
$admlang['language']['use_flags'] 		= 'Display flags instead of a dropdown box?';

$admlang['preferences']['censor'] 		= 'Censor Options';
$admlang['censor']['title'] 			= 'Censor';
$admlang['censor']['words'] 			= 'Words to censor';
$admlang['censor']['settings'] 			= 'Censor settings?';
$admlang['censor']['off'] 				= 'Off';
$admlang['censor']['whole'] 			= 'Whole words';
$admlang['censor']['partial'] 			= 'Partial words';

$admlang['preferences']['meta'] 		= 'Meta Tags';
$admlang['meta']['title'] 				= 'Meta Tags Administration';

$admlang['messages']['link'] 			= 'Messages';
$admlang['messages']['header'] 			= 'PHP-Nuke Titanium Messages :: Admin Panel';
$admlang['messages']['change_date']		= 'Change start date to today';
$admlang['messages']['active']			= '(If you Active this Message now, the start date will be today)';
$admlang['messages']['edit'] 			= 'Edit message';
$admlang['messages']['add'] 			= 'Add message';
$admlang['messages']['all'] 			= 'Overview messages';
$admlang['messages']['view'] 			= 'Visible to';
$admlang['messages']['remove'] 			= 'Are you sure you want to remove this message?';


$admlang['newsletter']['header'] 		= 'PHP-Nuke Titanium Newsletter :: Admin Panel';
$admlang['newsletter']['regards'] 		= 'Best Regards';
$admlang['newsletter']['subscribed'] 	= 'Subscribed Users';
$admlang['newsletter']['nousers'] 		= 'The group selected to receive this newsletter has zero users<br />Please go back and select a different group';
$admlang['newsletter']['will_recieve'] 	= 'Users will receive this Newsletter.';
$admlang['newsletter']['recieved_by'] 	= 'This newsletter will be sent to ';
$admlang['newsletter']['many_users_warn'] = 'WARNING! There are many users that will receive this text. Please wait until the script finishes the operation. This can take several minutes to complete!';
$admlang['newsletter']['unsubscribe'] 	= '=========================================================<br />You\'re receiving this Newsletter because you selected to receive it from your user page at $sitename.<br />You can unsubscribe from this service by clicking in the following URL:<br /><br /><a href=\"$nukeurl/modules.php?name=Your_Account&op=edituser\">$nukeurl/modules.php?name=Your_Account&op=edituser</a><br /><br />then select \"No\" from the option to Receive Newsletter by Email and save your changes, if you need more assistance please contact $sitename administrator.';
$admlang['newsletter']['sent'] 			= 'The Newsletter has been sent.';


$admlang['modules']['link'] 			= 'Modules';
$admlang['modules']['header'] 			= 'PHP-Nuke Titanium Messages :: Admin Panel';
$admlang['modules']['warn'] 			= 'Bold module\'s title represents the module you have in the Homepage.<br />You can\'t Deactivate or Restrict this module while it\'s the default one!<br />If you delete the module\'s directory you\'ll see an error in the Homepage.<br />Also, this module has been replaced with <i>Home</i> link in the modules block.<br /><br />[ <big><strong>&middot;</strong></big> ] means a module which name and link will not be visible in Modules Block';
$admlang['modules']['block'] 			= 'Modules Block EDIT';
$admlang['modules']['inhome'] 			= 'In Home';
$admlang['modules']['inmenu'] 			= 'Visible in Modules Block?';

$admlang['donations'] 					= 'Donations';

$admlang['logs']['header'] 				= 'Security Tracker';
$admlang['logs']['not_found'] 			= 'The log could not be found';
$admlang['logs']['is_clear'] 			= 'No Error\'s have been found.';
$admlang['logs']['clear'] 				= 'Clear Log';
$admlang['logs']['cleared'] 			= 'Your Security Tracker has been cleared!';

$admlang['logs']['admin_changed'] 		= 'Admin log %sHAS%s changed';
// define('_ADMIN_LOG_CHANGED','Admin log <strong>HAS</strong> changed');
$admlang['logs']['admin_chmod'] 		= 'Your file is not writeable. Did you do the CHMOD?';
// define('_ADMIN_LOG_CHMOD','Your file is not writeable. Did you do the CHMOD?');
// define('_ADMIN_LOG_ERR','There was a problem checking your log');
$admlang['logs']['admin_fine'] 			= 'Admin log has not changed';
// define('_ADMIN_LOG_FINE','Admin log has not changed');

$admlang['logs']['error_chmod'] 		= 'Your file is not writeable. Did you do the CHMOD?';
// define('_ERROR_LOG_CHMOD','Your file is not writeable. Did you do the CHMOD?');
$admlang['logs']['error_changed'] 		= 'Error log %sHAS%s changed';
// define('_ERROR_LOG_CHANGED','Error log <strong>HAS</strong> changed');
$admlang['logs']['error_fine'] 			= 'Error log has not changed';
// define('_ERROR_LOG_FINE','Error log has not changed');

$admlang['logs']['error'] 				= 'here was a problem checking your log';
// define('_ERROR_LOG_ERR','There was a problem checking your log');
$admlang['logs']['view'] 				= 'View Log';
// define('_VIEWLOG','View Log');

$admlang['global']['active']			= 'Active';
$admlang['global']['activate']			= 'Activate';
$admlang['global']['administrators'] 	= 'Administrators';
$admlang['global']['all'] 				= 'All';
$admlang['global']['all_members'] 		= 'All Members';
$admlang['global']['back']				= 'Go back';
$admlang['global']['both']	 			= 'Both';
$admlang['global']['content']			= 'Content';
$admlang['global']['custom']			= 'Custom';
$admlang['global']['day']				= 'Day';
$admlang['global']['days']				= 'Days';
$admlang['global']['deactivate']		= 'Deactivate';
$admlang['global']['delete']			= 'Delete';
$admlang['global']['disabled']			= 'Disabled';
$admlang['global']['discard']			= 'Discard';
$admlang['global']['down'] 				= 'Down';
$admlang['global']['edit']				= 'Edit';
$admlang['global']['email']				= 'Email';
$admlang['global']['enabled']			= 'Enabled';
$admlang['global']['expiration']		= 'Expiration';
$admlang['global']['filename']			= 'Filename';
$admlang['global']['functions']			= 'Functions';
$admlang['global']['go']				= 'Go';
$admlang['global']['goback']			= 'Go Back';
$admlang['global']['header_return']		= 'Return to Main Administration';
$admlang['global']['header_top_return'] = 'PHP-Nuke Evolution Xtreme %s :: Modules Admin Panel';
$admlang['global']['home'] 				= 'Home';
$admlang['global']['hour'] 				= 'Hour';
$admlang['global']['hours'] 			= 'Hours';
$admlang['global']['ID'] 				= 'ID';
$admlang['global']['inactive']			= 'Inactive';
$admlang['global']['language'] 			= 'Language';
$admlang['global']['left'] 				= 'Left';
$admlang['global']['login'] 			= 'Login';
$admlang['global']['name']				= 'Name';
$admlang['global']['nickname']			= 'Nickname';
$admlang['global']['no']				= 'No';
$admlang['global']['none'] 				= 'None';
$admlang['global']['not_set'] 			= '%s was not set';
$admlang['global']['password'] 			= 'Password';
$admlang['global']['password_retype']	= 'Retype Password';
$admlang['global']['permissions'] 		= 'Permissions';
$admlang['global']['position'] 			= 'Position';
$admlang['global']['preview'] 			= 'Preview';
$admlang['global']['recipients']		= 'Recipients';
$admlang['global']['right'] 			= 'Right';
$admlang['global']['rss'] 				= 'RSS/RDF file URL';
$admlang['global']['save_changes'] 		= 'Save Changes';
$admlang['global']['send'] 				= 'Send';
$admlang['global']['show'] 				= 'Show';
$admlang['global']['sitename'] 			= 'Site Name';
$admlang['global']['siteurl'] 			= 'Site Url';
$admlang['global']['staff'] 			= 'Staff';
$admlang['global']['subject'] 			= 'Subject';
$admlang['global']['submit'] 			= 'Submit';
$admlang['global']['title'] 			= 'Title';
$admlang['global']['title_custom'] 		= 'Custom Title';
$admlang['global']['unlimited']			= 'Unlimited';
$admlang['global']['up'] 				= 'Up';
$admlang['global']['url'] 				= 'Url';
$admlang['global']['view'] 				= 'View';
$admlang['global']['warning'] 			= 'Warning';
$admlang['global']['yes'] 				= 'Yes';

$admlang['global']['is_up_to_date'] 	= 'Up to date';
$admlang['global']['is_out_of_date']	= 'Out of date - Update Required';

# Groups selection defines (I grouped these together to make them easier to find in the future)
$admlang['global']['who_view'] 			= 'Who can View This';
$admlang['global']['admins_only']		= 'Administrators Only';
$admlang['global']['users_only'] 		= 'Registered Users Only';
$admlang['global']['guests_only'] 		= 'Personal Users Only';
$admlang['global']['all_visitors'] 		= 'All Visitors';
$admlang['global']['groups_only'] 		= 'Groups Only';

$admlang['admin']['administration_header'] 	= 'Administration Menu';
$admlang['admin']['modules_header'] 	= 'Modules Administration';
$admlang['admin']['themes_header'] 		= 'Theme Administraton';

$admlang['admin']['important'] 			= 'Important Information';
// define('_IMPORTANT_INFO','Important Information');
$admlang['admin']['ip_lock'] 			= 'Admin IP Lock';
// define('_IP_LOCK','Admin IP Lock');
$admlang['admin']['filter'] 			= 'Input Filter';
// define('_INPUT_FILTER','Input Filter');
$admlang['admin']['waiting_users'] 		= 'Waiting Users';
$admlang['admin']['registered_users'] 	= 'Registered Users';

$admlang['admin']['forums_overview'] 	= 'Forums Overview';
$admlang['admin']['total_forums'] 		= 'Forums';
$admlang['admin']['total_forum_topics'] = 'Topics';
$admlang['admin']['total_forum_posts'] 	= 'Posts';

$admlang['admin']['users_overview'] 	= 'Users Overview';
$admlang['admin']['total_users'] 		= 'Registered';
$admlang['admin']['total_waiting'] 		= 'Waiting';
$admlang['admin']['total_deactivated'] 	= 'Deactivated';

$admlang['admin']['downloads_overview'] = 'Downloads Overview';
$admlang['admin']['broken_downloads'] 	= 'Broken';
$admlang['admin']['total_categories'] 	= 'Categories';
$admlang['admin']['total_downloads'] 	= 'Downloads';

$admlang['admin']['admin_intrusion'] 	= 'Admin Intrusion';
$admlang['admin']['admin_error_log'] 	= 'Error Log';
$admlang['admin']['admin_honey_pot'] 	= 'Honey Pot';
$admlang['admin']['honey_pot_bots_stopped'] = 'stopped %s bots!';
$admlang['admin']['version_is_current'] = '(Up To Date)';
$admlang['admin']['version_is_out-of-date'] = 'New Version Available';

# VERSION CHECKER
$admlang['admin']['version_check_run'] 	= 'Run Now';
// define('_RUNNOW','Run Now');
$admlang['admin']['version_check'] 		= 'Version Checker';
// define('_VERSION_CHECK','Evolution Xtreme Version Checker');
$admlang['admin']['no_rights'] 	= 'Sorry %s but you have been given no administration rights. Please contact the site administrator if you feel this is a mistake!';
// define("_NO_ADMIN_RIGHTS","Sorry %s but you have been given no administration rights. Please contact the site administrator if you feel this is a mistake!");


/**
 * Mod: Live feed (Live news directly from Evolution Xtreme project site.)
 * @since 2.0.9e
 */
$admlang['livefeed']['header'] 				= 'PHP-Nuke Developer Feed';

/**
 * Mod: reCaptcha (Complete replacement for the GD2 captcha system.)
 * @since 2.0.9e
 */
$admlang['reCaptcha']['options'] 				= 'reCaptcha Options';
$admlang['reCaptcha']['check'] 					= 'Use reCaptcha';
$admlang['reCaptcha']['no_checking'] 			= 'No Checking';
$admlang['reCaptcha']['admin_login_only'] 		= 'Administrator login only';
$admlang['reCaptcha']['user_login_only'] 		= 'Users login Only';
$admlang['reCaptcha']['user_reg_only'] 			= 'New Users registration Only';
$admlang['reCaptcha']['both'] 					= 'Both, users login and new users registration only';
$admlang['reCaptcha']['admin_and_user_login'] 	= 'Administrators and users login only';
$admlang['reCaptcha']['admin_and_new_users'] 	= 'Administrators and new users registration only';
$admlang['reCaptcha']['everywhere'] 			= 'Everywhere on all login options (Admins and Users)';
$admlang['reCaptcha']['api_warn'] 				= 'The API must be submitted before you can configure the options for reCaptcha';

$admlang['reCaptcha']['reCaptcha'] 				= 'Recaptcha Security Check';
$admlang['reCaptcha']['whiteskin'] 				= 'White';
$admlang['reCaptcha']['darkskin'] 				= 'Dark';
$admlang['reCaptcha']['language'] 				= 'Recaptcha Language:';
$admlang['reCaptcha']['language_explain'] 		= '<strong>*</strong> <a href=\'https://developers.google.com/recaptcha/docs/language\' target=\'_blank\'>CLICK HERE</a> to find the proper valuse for the language you want to be used.';
$admlang['reCaptcha']['site_key_explain'] 		= '<strong>INFO:</strong> <a href=\'http://www.google.com/recaptcha/admin\' target=\'_blank\'>CLICK HERE</a> to signup and get your key needed for recaptcha.';
$admlang['reCaptcha']['site_key'] 				= 'Recaptcha Site Key:';
$admlang['reCaptcha']['secret_key'] 			= 'Recaptcha Secret Key:';

/**
 * Mod: IPHUB (Allows the blocking of VPN/PROXY Servers.)
 * @since 2.0.9e
 */
$admlang['iphub']['title'] 					= 'IpHub VPN/PROXY/SERVER Block';
$admlang['iphub']['status'] 				= 'User IpHub Blocking:';
$admlang['iphub']['status_explain'] 		= 'This system will block users from coming to your site using a VPN/Proxy/Server. False positives do happen and if your user is blocked, then need to contact IpHub to have them unblocked.';
$admlang['iphub']['key'] 					= 'IpHub API Key';
$admlang['iphub']['key_explain'] 			= '<strong>INFO:</strong> <a href=\'https://iphub.info\' target=\'_blank\'>CLICK HERE</a> to signup and get your key.';
$admlang['iphub']['api_warn'] 				= 'The API must be submitted before you can configure the options for '.$admlang['iphub']['title'].'';

// $lang['Date_format_explain'] = 'The syntax used is identical to the PHP <a href=\'http://www.php.net/date\' target=\'_other\'>date()</a> function.';

// $admlang['iphub']['add_explain'] 			= '<strong>Additional Note:</strong> There are paid and a free plan available.<br />If your site is high traffic, you may need ot look into a paid plan.';
$admlang['iphub']['add_explain'] 			= '<strong>Additional Note:</strong> There are paid and a free plan available.<br />If you use the free API key, You will be restricted to 1000 queries a day.<br />If your site is high traffic, you may need to look into a paid plan.';
$admlang['iphub']['cookie'] 				= 'IpHub Cookie Time: (in min)';
$admlang['iphub']['cookie_explain'] 		= 'This here is how long the cookie will last before the system will recheck their IP. (Designed to reduce calls to IPHUB, especially if your using the free plan.';

/**
 * Mod: Admin failed login checker. (Tracks the amount of times an admin fails to login.)
 * @since 2.0.9e
 */
$admlang['adminfail']['you_have'] 				= 'You have';
$admlang['adminfail']['attempts'] 				= 'attempt(s) left until you will have a cooldown for';
$admlang['adminfail']['less_than'] 				= 'less than 1';
$admlang['adminfail']['min'] 					= 'min(s).';
$admlang['adminfail']['cooldown'] 				= 'You can attempt to login once again in';
$admlang['adminfail']['title'] 					= 'Admin Login Fail Checker';
$admlang['adminfail']['status'] 				= 'Use Admin Login Fail Checker';
$admlang['adminfail']['status_explain'] 		= 'This system will limit how many time they can fail at logging in as admin beofre they need to take a cooldown break';
$admlang['adminfail']['max_attempts'] 			= 'Max Fail Attempts';
$admlang['adminfail']['max_attempts_explain'] 	= 'How many times can they fail before being blocked.';
$admlang['adminfail']['timeout'] 				= 'Cooldown Time, (min)';
$admlang['adminfail']['timeout_explain'] 		= 'How long should they be blocked for.';


$admlang['versions']['title'] 					= "PHP-Nuke Titanium Version Checker";
$admlang['versions']['version'] 				= "The current version is:";
$admlang['versions']['your_version'] 			= "Your version is:";
$admlang['versions']['version_checked']			= "The version was last checked on";
$admlang['versions']['version_current']			= "Your version is current";
$admlang['versions']['curl_connection_error']	= "Connection Error";


?>