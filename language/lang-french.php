<?php
if(!isset($subscription_url)) $subscription_url = '';

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

define_once("_CHARSET","ISO-8859-1");
define_once("_SEARCH","Recherche");
define_once("_LOGIN"," Identification ");
define_once("_WRITES","a &eacute;crit :");
define_once("_POSTEDON","Post&eacute; le");
define_once("_NICKNAME","Surnom/Pseudo");
define_once("_PASSWORD","Mot de Passe");
define_once("_WELCOMETO","Bienvenue sur");
define_once("_EDIT","Editer");
define_once("_DELETE","Supprimer");
define_once("_POSTEDBY","Transmis par");
define_once("_READS","lectures");
define_once("_GOBACK","[ <a href=\"javascript:history.go(-1)\">Retour</a> ]");
define_once("_COMMENTS","commentaires");
define_once("_PASTARTICLES","Articles pr&eacute;c&eacute;dents");
define_once("_OLDERARTICLES","Archives");
define_once("_BY","par");
define_once("_ON","le");
define_once("_LOGOUT","Sortie");
define_once("_WAITINGCONT","Contenu en attente");
define_once("_SUBMISSIONS","Propositions");
define_once("_WREVIEWS","Comptes rendus en attente");
define_once("_WLINKS","Liens en attente");
define_once("_EPHEMERIDS","Eph&eacute;m&eacute;rides");
define_once("_ONEDAY","Un Jour comme Aujourd'hui...");
define_once("_ASREGISTERED","Vous n'avez pas encore de compte?<br><a href=\"modules.php?name=Your_Account\">Enregistrez vous !</a><br>En tant que membre enregistr&eacute;, vous b&eacute;n&eacute;ficierez de privil&egrave;ges tels que: changer le th&egrave;me de l'interface, modifier la disposition des commentaires, signer vos interventions, ...");
define_once("_MENUFOR","Menu de");
define_once("_NOBIGSTORY","Il n'y a pas encore d'article-phare aujourd'hui.");
define_once("_BIGSTORY","Aujourd'hui, l'article le plus lu est:");
define_once("_SURVEY","Sondage");
define_once("_POLLS","Sondages");
define_once("_PCOMMENTS","Commentaires:");
define_once("_RESULTS","R&eacute;sultats");
define_once("_HREADMORE","suite...");
define_once("_CURRENTLY","Il y a pour le moment");
define_once("_GUESTS","invit&eacute;(s) et");
define_once("_MEMBERS","membre(s) en ligne.");
define_once("_YOUARELOGGED","Vous &ecirc;tes connect&eacute; en tant que");
define_once("_YOUHAVE","Vous avez");
define_once("_PRIVATEMSG","message(s) priv&eacute;(s).");
define_once("_YOUAREANON","Vous &ecirc;tes un visiteur anonyme. Vous pouvez vous enregistrer gratuitement en cliquant <a href=\"modules.php?name=Your_Account\">ici</a>.");
define_once("_NOTE","Note:");
define_once("_ADMIN","Admin:");
define_once("_WERECEIVED","Nous avons re&ccedil;us");
define_once("_PAGESVIEWS","pages vues depuis");
define_once("_TOPIC","Sujet");
define_once("_UDOWNLOADS","T&eacute;l&eacute;chargements");
define_once("_VOTE","Vote");
define_once("_VOTES","Votes");
define_once("_MVIEWADMIN","Visualisation: Administrateurs seulement");
define_once("_MVIEWUSERS","Visualisation: Utilisateurs enregistr&eacute;s seulement");
define_once("_MVIEWANON","Visualisation: Utilisateurs anonymes seulement");
define_once("_MVIEWALL","Visualisation: Tous les visiteurs");
define_once("_EXPIRELESSHOUR","Expiration: Moins d'une heure");
define_once("_EXPIREIN","Expiration dans");
define_once("_HTTPREFERERS","R&eacute;f&eacute;rants HTTP");
define_once("_UNLIMITED","Illimit&eacute;es");
define_once("_HOURS","heures");
define_once("_RSSPROBLEM","La manchette de ce site n'est pas disponible pour le moment.");
define_once("_SELECTLANGUAGE","Selectionnez la langue");
define_once("_SELECTGUILANG","Selectionnez la langue de l'interface:");
define_once("_NONE","Aucun");
define_once("_BLOCKPROBLEM","<center>Il y a un probleme avec ce bloc.</center>");
define_once("_BLOCKPROBLEM2","<center>Il n'y a rien dans ce block.</center>");
define_once("_ALLCATEGORIES","Toutes les catégories");
define_once("_MODULENOTACTIVE","Désolé, ce module n'est pas activé");
define_once("_NOACTIVEMODULES","Modules inactifs");
define_once("_FORADMINTESTS","(Pour des tests administratifs)");
define_once("_BBFORUMS","Forums");
define_once("_ACCESSDENIED","Accès refusé");
define_once("_RESTRICTEDAREA","Vous essayez d'accéder à un espace réservé.");
define_once("_MODULEUSERS","Nous sommes désolé mais cette section de notre site est pour les <i>utilisateurs enregistrés seulement</i><br><br>Vous pouvez vous enregistrer gratuitement en cliquant <a href=\"modules.php?name=Your_Account&op=new_user\">ici</a>, puis vous pouvez<br>accéder à cette section sans réstriction. Merci.<br><br>");
define_once("_MODULESADMINS","Nous sommes désolé mais cette section de notre site est réservée aux <i>administrateurs seulement</i><br><br>");
define_once("_HOME","Home");
define_once("_HOMEPROBLEM","There is a big problem here: we have not a Homepage!!!");
define_once("_ADDAHOME","Add a Module in your Home");
define_once("_HOMEPROBLEMUSER","There is a problem right now on the Homepage. Please check it back later.");
define_once("_MORENEWS","More in News Section");
define_once("_DATESTRING","%d %B %Y &agrave; %H:%M:%S %Z ");
define_once("_DATESTRING2","%A, %d %B");
define_once("_CHAT","Chat");
define_once("_REGISTERED","Registered");
define_once("_CHATGUESTS","Guests");
define_once("_USERSTALKINGNOW","Users Talking Now");
define_once("_ENTERTOCHAT","Enter To Chat");
define_once("_CHATROOMS","Available Rooms");
define_once("_SECURITYCODE","Security Code");
define_once("_TYPESECCODE","Type Security Code");
define_once("_ASSOTOPIC","Associated Topics");
define_once("_ADDITIONALYGRP","Additionaly this module belongs to the Users Group");
define_once("_YOUHAVEPOINTS","Points you have by participating on the site's content:");
define_once("_MVIEWSUBUSERS","View: Subscribed Users Only");
define_once("_MODULESSUBSCRIBER","We are Sorry but this section of our site is for <i>Subscribed Users Only.</i>");
define_once("_SUBHERE","You can subscribe to our services from <a href=\"$subscription_url\">here</a>");
define_once("_SUBEXPIRED","Your Subscription Expired");
define_once("_HELLO","Hello");
define_once("_SUBSCRIPTIONAT","This is an automated message to let you know that your subscription at");
define_once("_HASEXPIRED","has been expired now.");
define_once("_HOPESERVED","Hope to have served you with satisfaction...");
define_once("_SUBRENEW","If you want to renew your subscription please go to:");
define_once("_YOUARE","You are");
define_once("_SUBSCRIBER","subscriber");
define_once("_OF","of");
define_once("_SBYEARS","years");
define_once("_SBYEAR","year");
define_once("_SBMINUTES","minutes");
define_once("_SBHOURS","hours");
define_once("_SBSECONDS","seconds");
define_once("_SBDAYS","days");
define_once("_SUBEXPIREIN","Your subscription will expire in:");
define_once("_NOTSUB","You are not subscriber of");
define_once("_SUBFROM","You can subscribe from");
define_once("_HERE","here");
define_once("_NOW","now!");
define_once("_ADMSUB","Subscribed User!");
define_once("_ADMNOTSUB","User NOT Subscribed");
define_once("_ADMSUBEXPIREIN","Subscription Expire in:");
define_once("_LASTIP","Last user IP:");
define_once("_BANTHIS","Ban This IP");
define_once("_HTMLNOTALLOWED","HTML code isn't allowed. Please use the editor functions instead.");
define_once("_KARMAGOOD","Good Karma");
define_once("_KARMALOW","Regular Karma");
define_once("_KARMABAD","Bad Karma");
define_once("_KARMADEVIL","Devil Karma");
define_once("_COMMENTMODERATED","Your comments has been submitted, but since you have been marked by the administrator of this site as an user with Bad Karma, your comment is subject to prior approval by our staff. Please don't submit your comment twice or your Karma may fall to the next level.<br><br>Our staff reserves the right to approve or delete your comment at their sole discretion.");
define_once("_MODERATEDTITLE","Comment Submitted - Approval Pending");
define_once("_MODERATEDRETURN","Return to Article's Page");

/*****************************************************/
/* Function to translate Datestrings                 */
/*****************************************************/

function translate($phrase) {
    switch($phrase) {
	case "xdatestring":	$tmp = "%A, %B %d @ %T %Z"; break;
	case "linksdatestring":	$tmp = "%d-%b-%Y"; break;
	case "xdatestring2":	$tmp = "%A, %B %d"; break;
	default:		$tmp = "$phrase"; break;
    }
    return $tmp;
}
define_once("_HTMLNOTALLOWED2","HTML code isn't allowed here.");
define_once("_ERRORINVEMAIL","ERROR: Invalid Email");

