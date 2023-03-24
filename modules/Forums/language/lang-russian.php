<?php
global $sitename;


######################################################################
# Modulo Splatt Forum per PHP-NUKE
#-------------------------
# Versione: 3.2
#
#  by:
#
# Giorgio Ciranni (~Splatt~) (http://www.splatt.it) (webmaster@splatt.it)
#
#
# Supporto tecnico disponibile sul Forum di www.splatt.it
######################################################################
# This program is free software. You can redistribute it and/or modify
# it under the terms of the GNU General Public License as published by
# the Free Software Foundation; either version 2 of the License.
######################################################################

/*****************************************************/
/* Messaggi Modulo Forum
/*****************************************************/

define_once("_FORUM","Forum");
define_once("_FORUMACC","Users");
define_once("_FORUMCONF","Configuration");
define_once("_FORUMRANK","Ranks");
define_once("_UNABLETOQUERY","Connection to the Bankrupt Database");
define_once("_TODAYIS","Today is ");
define_once("_LASTVISIT","Your last visit to the forum was ");
define_once("_TYPES","Preferences");
define_once("_FTOPICS","Discussion");
define_once("_FPOSTS","Messages");
define_once("_FLPOSTS","Last Message");
define_once("_PMSG","Private Messages");
define_once("_PINBOX","Inbox");
define_once("_LOGINTOR","You must login before reading messages.");
define_once("_VNMS","new Messages");
define_once("_VNM","new Messages");
define_once("_TVM","Total Messages");
define_once("_NPM","You have not received new Messages");
define_once("_NPO","There are New Messages since your last visit");
define_once("_NNPO","There are No New Message since your last visit");
define_once("_FFA","Free to all");
define_once("_FREG","Registered Users");
define_once("_FMODS","Moderator");
define_once("_PASSW","Password Protected");
define_once("_FCOULDNOT","Problems were incountered accessing the Database");
define_once("_FNOTEXIST","This forum does not exist! Select another.");
define_once("_MODERATED","Moderated by : ");
define_once("_FINDEX","Index");
define_once("_FPRIVATE","This is a private forum, you will need the password to enter.");
define_once("_FREPLIES","Replies");
define_once("_FPOSTER","Poster");
define_once("_FVIEWS","Views");
define_once("_FODATE","Date");
define_once("_FNOTOPICS","There is no topics for this Forum.");
define_once("_FPOSTONE","If you like, you can post a new one.");
define_once("_FNEXTP","Next Page");
define_once("_JUMPTO","Jump To");
define_once("_FSELECTF","Select Forum");
define_once("_TLOCKED","Discussion locked - No more messages allowed.");
define_once("_MORETHEN","More then");
define_once("_WRONGPASS","Password not recognized!");
define_once("_FNOMORE","There are no more Forums.");
define_once("_FFMOD","Moderator");
define_once("_FCOULDNOTINSERT","Error, could not insert data into Database! Sorry for the inconvenience!");
define_once("_FPOSTCOUNT","The message counter is not being increased.");
define_once("_FPOSTED","New Message Posted!");
define_once("_FVIEW","Please wait a few seconds or click here.");
define_once("_YOUMUST","You must insert a message or a reply.");
define_once("_POSTIN","Respond to: ");
define_once("_FCANWRITE","You can Post new messages or replies to this Forum");
define_once("_YOUNOT","You cannot write here!");
define_once("_FBACK","Back");
define_once("_FNICKNAME","NickName");
define_once("_FPASSWORD","Password");
define_once("_FSUBJECT","Subject");
define_once("_FMESSAGE","Message");
define_once("_FMICON","Message Icon");
define_once("_FON","On");
define_once("_FOFF","Off");
define_once("_FOPTIONS","Options");
define_once("_DISHTML","HTML is not allowed in this Message");
define_once("_FDIS","Not allowed.");
define_once("_FTHISMAIL","in this Message");
define_once("_FSHOWSIG","Company");
define_once("_WHATISSIG","That one is setup in the User Pages.");
define_once("_FNOTIFY","Notify me by E-mail when there is a new post.(Only for registerd users)");
define_once("_FPAGED","Pages");
define_once("_FAQOUTE","Qoute");
define_once("_FAUTHOR","Author");
define_once("_FGOTO","Go to Page: ");
define_once("_FADMINT","Administration");
define_once("_LOCKTHIS","Lock discussion");
define_once("_UNLOCKTHIS","Unlock discussion");
define_once("_FMOVET","Move discussion");
define_once("_FDELT","Cancel discussion");
define_once("_FJOINED","Registered to :");
define_once("_FAPOSTS","Messages :");
define_once("_FFROM","Da");
define_once("_NOTREG","User not Registered");
define_once("_FTPOSTED","Posted");
define_once("_FAPROFIL","Profile");
define_once("_FAEMAIL","E-mail");
define_once("_FAADD","Post");
define_once("_FAEDIT","Edit");
define_once("_TREVIEW","Review your Reply");
define_once("_ENM","read");
define_once("_FPAGES","pages");
define_once("_BENV","Welcome to the $sitename Forum");
define_once("_HEAD1","Here you can exchange ideas and thoughts.");
define_once("_HEAD2","To try and help those that need it.");
define_once("_HEAD3","Please feel free to post!");
define_once("_ERRORE1","There was an Error!");
define_once("_FNOTA","Even if the Forum is available to Anonymous posters <a href=\"modules.php?name=Your_Account\">Register!</a>");
define_once("_ERRQUERY","during the database query");
define_once("_FERRORE","ERROR!");
define_once("_FNONTUO","You can't modify this message");
define_once("_NOPERMESS","You don't have permission to edit this message.");
define_once("_MODBY","This message was edited by");
define_once("_FIL","on");
define_once("_CHECKCONF","I cannot connect to the database, please check the configuration.");
define_once("_PUPD","You message was successfully edited!");
define_once("_CLIKVUPD","Click here to view you modified message.");
define_once("_CLIKRET","Click here to go to the main forum index.");
define_once("_POSTCANC","Post was canceled.");
define_once("_CLIKRETL","Click here to return to the list of messages.");
define_once("_MODPOST","Edit Message");
define_once("_FNICK","Nickname");
define_once("_FERRPASS","You have either entered an incorrect password or you don't have the correct password to edit this message. Please go back and re-enter your password.");
define_once("_MESSICON","Message icon");
define_once("_FMESS","Messaggi!");
define_once("_FOPT","Options");
define_once("_FDELP","Cancel This Message");
define_once("_FATTACT","Currently Active");
define_once("_DISCTOT","Total Discussions");
define_once("_FMESS","Messaggi!");
define_once("_FLEGEN","Legend");
define_once("_CLICONSMI","Click to add <a href=\"bb_smilies.php\">Smilies</a> into your Message:<br>");
define_once("_CLIONBOT","Click to add <a href=\"bbcode_ref.php\">BBCode</a> to your Message:<br><br>");
define_once("_FRICAV","Advanced Search");
define_once("_FRESET","Reset");
define_once("_FCANC","Cancel");
define_once("_FPMESS","Private Message");
define_once("_FFROM","Da");
define_once("_FNOPMSG","You have not recieved any private messages.");
define_once("_FPROF","Profile");
define_once("_FPREVMSG","Previous Message");
define_once("_FNEXMSG","Next Message");
define_once("_FLOKTOP","The Moderator has locked this Discussion. You cannot reply.");
define_once("_NOTIFSUB","Someone has posted a reply to your message.");
define_once("_CIAO","Hello");
define_once("_NOTIFM1","You have recieved this E-mail because someone has posted a reply to your message you posted on $sitename, and you chose");
define_once("_NOTIFM2"," to be informed by E-mail when this happened.\r\n\r\nYou can see the discussion here: ");
define_once("_NOTIFM3","Or you can see our home page $sitename here: ");
define_once("_GRAZ","Thanks");
define_once("_APRSTAF","$sitename Staff");
define_once("_FKEY","Key word or phrase to try");
define_once("_FSEANY","Word (Default)");
define_once("_FSEAL","Phrase");
define_once("_SALF","In all the Forums");
define_once("_AUTN","Author Name");
define_once("_SORTBY","Sort By");
define_once("_FPTIM","Post Date");
define_once("_FSEA","I Tried!");
define_once("_FNOREC","No Corresponding record found. Go Back.");
define_once("_FFTOPIC","Discussion");
define_once("_FPRAC","Private Access Forum");
define_once("_FLIVAC","Access Level Changed");
define_once("_FADNAC","Add Access Level");
define_once("_FADNUSAC","Add new user to this Access Level");
define_once("_FUT","User");
define_once("_FUSID","User Id");
define_once("_FCUSACL","Activate User Levels");
define_once("_FWARDEL","WARNING: You are about to delete this Access Level. Are you Sure about that?");
define_once("_FNO","No");
define_once("_FSI","Yes");
define_once("_FEDUSAC","Edit User Access Level");
define_once("_FADD","Add");
define_once("_FSAV","Save");
define_once("_WARDELU","WARNING: You are about to delete a users Access Level. Are you sure about that?");
define_once("_FACNEG","ACCESS DENIED!!!!");
define_once("_FCONF","Forum Configuration");
define_once("_FALHTML","Activate HTML");
define_once("_FALBBC","Activate BBCode");
define_once("_FALSIGN","Activate Signature");
define_once("_FHOTOP","Heated Discussion Threshold");
define_once("_FPOSTP","Post per Page");
define_once("_FMESSCO1","The number of Posts per page");
define_once("_FTOPPF","Discussions per Forum");
define_once("_FMESCO2","The number of Topics per Forum.");
define_once("_FSAVC","Save Configuration");
define_once("_FCATE","Forum Categories");
define_once("_FID","Id");
define_once("_FCAT","Categories");
define_once("_FNUM","Forum Number");
define_once("_FEDFO","Edit Forum");
define_once("_FADDCAT","Add Categorie");
define_once("_FCATT","Category");
define_once("_FPRAT","Currently on Forum ");
define_once("_FNAME","Name");
define_once("_FDESCR","Description");
define_once("_FACCE","Access");
define_once("_FTIPO","Type");
define_once("_FANON","Anonymous");
define_once("_FMODERAM","Moderator/Administrator");
define_once("_FPUBLIC","Public");
define_once("_FPRIVA","Private");
define_once("_FADDMOR","Add new Forum in ");
define_once("_FNONE","Nobody");
define_once("_FPASSIF","Password <i>(Private)</i>");
define_once("_FATTUA","Moderator/i Activate/i");
define_once("_NOMODSA","No Moderator Assigned");
define_once("_WADELCAT","WARNING: You are about to delete a Category and all it's Forums and Messages, would you like to continue?");
define_once("_WADELFO","WARNING: You are about to delete a Forum and all it's messages, would you like to continue?");
define_once("_FORANKSI","Hierarchical Forum Structure");
define_once("_FTITL","Degree");
define_once("_FMINPO","Min. Post");
define_once("_FMAXPO","Max. Post");
define_once("_FRANSP","Special Rank");
define_once("_FADDNRAN","Add a new Rank");
define_once("_WADELRA","WARNING: Are you sure you want to delete this Rank?");
define_once("_FENTNIPAS","Please insert your username and password");
define_once("_FTUNOMOD","You are not a moderator for this Forum, you do not have permission to execute that command!");
define_once("_ERRORPASS","ERROR: You have entered an incorrect Password! Go back and re-enter it.");
define_once("_FTOPDEL","The Disscussion has been removed from the database.");
define_once("_FCLIKTORET","Click here to return to the Forum");
define_once("_FTOPMOV","The Discussion has been moved!");
define_once("_FTOPLOK","The Discussion has been Locked!");
define_once("_FTOPSBLOK","The Discussion has been Unlocked!");
define_once("_FUSIP","User Account and IP information");
define_once("_FFUSIP","Users IP:");
define_once("_FREDVIS","Warning: ");
define_once("_FIDENTMOD","It looks like you're the moderator of this Forum!");
define_once("_FONCEDEL","Once you click the button, the selected Discussion and all of its messages will be deleted from the database.");
define_once("_FONCEMOV","Once you click the button, the selected Discussion and all its Messages will be moved to the selected Forum.");
define_once("_FONCELOK","When you click the button, the selected Discussion will be locked. You may unlock it at anytime.");
define_once("_FONCEUNLOK","When you click the button, the selected Discussion will be Unlocked and accessable to users.");
define_once("_FMOVETO","Move Discussion to: ");
define_once("_FVIEWIP","Your IP");
define_once("_FANONIMO","Anonymous");
define_once("_LOCALDATETIME","%d-%m-%Y at %H:%M");
define_once("_BY","from");
define_once("_WEEKDAYDATETIME","%A, %e-%m-%Y at %H:%M");

/* AGGIUNTE PER VERSIONE 2.1 */

define_once("_FINMSGH","Message Head");
define_once("_FINMSGF","Message Footer");
define_once("_FNOTIF","Notify");
define_once("_FNOTMAIL","Notify E-mail");
define_once("_FINDNOT","Notifyca Adress");
define_once("_POSTINN","Post in: ");
define_once("_FOPTIO","Optional");
define_once("_FOPPR","If private");

/* AGGIUNTE PER VERSIONE 2.1 by REFOSCO */

define_once("_FORUMPREF","Preference");
define_once("_FORUMPREFDESC","general preference setting, active HTML, BBCode, Post for page, message header and footer, ecc.");
define_once("_FORUMDESC","category gestion, add, edit and delete Forum");
define_once("_FORUMRANKDESC","ranks forum system, add, edit, delete ranks");
define_once("_FORUMACCDESC","users gestion, add, edit, access privilege");
define_once("_FORUMMENU","Forum Administration Men›");
define_once("_EDITRANK","Edit rank");

/* AGGIUNTE PER GESTIONE ATTACHMENT */

define_once("_FORUMATCHM","Attachments");
define_once("_FORUMENABLECOOKIE","To use this feature you need to enable cookies in your Browser");
define_once("_FORUMCLOSE","Close");
define_once("_FORUMATCHMERRINVFILETYPE","ERROR : this file cannot be attached");
define_once("_FORUMATCHMERRMAXSIZEREACH","ERROR : file size is larger than allowed");
define_once("_FORUMATCHMMODEINFO","To attach a file to your message, follow the two steps mentioned, repating them if necessary to include more than a file.<br>At the end, click on<B>OK</B> to go back to your massage.");
define_once("_FORUMATCHMMODEINFO1","Click on<B>Browse</B> to select the file<br> or type the path in the following field.");
define_once("_FORUMATCHMMODEINFO2","Move the file in the field<B></B> clicking on <B>Attach</B>. File transfer times may vary (from a few seconds to a few minutes).");
define_once("_FORUMATCHMFINDFILE","Find file");
define_once("_FORUMATCHMUPLOAD"," Attach ");
define_once("_FORUMATCHMREMOVE","Delete");
define_once("_FORUMATCHMEMPTY","-- No Attachment --");
define_once("_FORUMATCHMTOTSIZE","Total Size");
define_once("_FORUMATCHMMAXSIZE","maximum");
define_once("_FORUMATCHMCANCEL","Cancel");
define_once("_FORUMATCHMDELCONFIRM","Are you sure you want to delete the file");
define_once("_FORUMATCHMDOWNFILE","Download File");
define_once("_FORUMATCHMOPENFILE","Open File");
define_once("_FORUMATCHMCODE","(Press &lt;Attachments&gt; to add documents to your message)");

/* AGGIUNTE VARIE 3.0 */

define_once("_RANKIM","Image");
define_once("_NONE","None");
define_once("_RANKIMB","(N.B. Images must be in the directory:  <b>images/forum/special/</b>)");
define_once("_RANKIMD","Currently Available Images:");
define_once("_NONEPOST","Forum Empty!");
define_once("_LASTENP","Last ten messages");

/* AGGIUNTE VARIE 3.1 */

define_once("_FDI","of");
define_once("_MAXUPFILE","Max attachment file size (Kb)");
define_once("_MAXFILE","Attachments");
define_once("_INVIA","Send");
define_once("_RESETTA","Reset");
define_once("_CATORDE","Order");
define_once("_CATUP","Move one position up");
define_once("_CATDOWN","Move one position down");
define_once("_CATRESET","Reset default order");
define_once("_FPAGE","Page");
define_once("_FUSDEL","The user doesn't exist in database");
define_once("_FNASCBS","Hide left blocks");
define_once("_FVISBS","See left blocks");
define_once("_FULTM","Last messages ");
define_once("_FMPIUL","More readed messages");
define_once("_FMEDRI","On average every discussion receives:");
define_once("_FRISPS","replies");
define_once("_FCERCF","Search in the forums");
define_once("_FISCRIPT","* beginning script doesn't accepted*");
define_once("_FINSCRIPT","*end  script doesn't accepted*");
define_once("_FHACK","<font color=\"#FF0000\"> *** INSERT CODE PROHIBITED - THIS MESSAGE IS A PROBABLE ATTEMPT TO ATTACK FROM AN HACKER! IP ADDRESS REGISTERED! *** </font>");

/* HELP SYSTEM */

define_once("_SFHS","Splatt Forum Help System");
define_once("_HSH1","Click here and you can insert a new message in this forum.");
define_once("_HSH2","Click here and you can see the last messages inserted in this forum.");
define_once("_HSH3","Click here and you can see the forum without left blocks. This is the best solution for a navigation more readable");
define_once("_HSH4","Click here for a standard navigation, with left blocks.");
define_once("_HSH5","These are more readed ten messages. Near , between brackets, you can see how many times messages are readed.");
define_once("_HSH6","These are last  ten messages in forums. They are in chronological order.");
define_once("_HSH7","Here you can see any restrictions setted in this forum.");

define_once("_LOCALDATE","%d-%m-%Y");


