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


define_once("_PREVIOUS","Page Pr&eacute;c&eacute;dente");
define_once("_NEXT","Page Suivante");
define_once("_CATEGORY","Cat&eacute;gorie");


define_once("_CATEGORIES","cat&eacute;gories");
define_once("_LVOTES","votes");
define_once("_TOTALVOTES","Total des votes:");

define_once("_THEREARE","Il y a");
define_once("_NOMATCHES","Aucune correspondance trouv&eacute;e &agrave; votre requ&ecirc;te");
define_once("_SCOMMENTS","Commentaires");
define_once("_UNKNOWN","Inconnus");
define_once("_DOWNLOADS","fichiers");
define_once("_AUTHORNAME","Nom de l'auteur");
define_once("_AUTHOREMAIL","Email de l'auteur");
define_once("_DOWNLOADNAME","Nom du fichier");
define_once("_ADDTHISFILE","Ajouter ce fichier");
define_once("_INBYTES","en octets");
define_once("_FILESIZE","Taille");
define_once("_VERSION","Version");
define_once("_DESCRIPTION","Description");

define_once("_AUTHOR","Auteur");
define_once("_HOMEPAGE","Page d'accueil");
define_once("_DOWNLOADNOW","T&eacute;l&eacute;charger ce fichier maintenant !");
define_once("_RATERESOURCE","Evaluer un fichier");
define_once("_FILEURL","Lien vers le fichier");
define_once("_ADDDOWNLOAD","Ajouter un fichier t&eacute;l&eacute;chargeable");
define_once("_DOWNLOADSMAIN","T&eacute;l&eacute;chargement - Page principale");
define_once("_DOWNLOADCOMMENTS","T&eacute;l&eacute;chargement - Commentaires");
define_once("_DOWNLOADSMAINCAT","T&eacute;l&eacute;chargement - Cat&eacute;gories principales");
define_once("_ADDADOWNLOAD","Ajouter un nouveau fichier");
define_once("_DSUBMITONCE","Veuillez ne soumettre un m&ecirc;me fichier qu'une seule fois.");
define_once("_DPOSTPENDING","Tous les fichiers sont publi&eacute;s apr&egrave;s v&eacute;rification.");
define_once("_RESSORTED","Les fichiers sont actuellement tri&eacute;s par");
define_once("_DOWNLOADSNOTUSER1","Vous n'&ecirc;tes pas un utilisateur enregistr&eacute;, ou vous ne vous &ecirc;tes pas connect&eacute;.");
define_once("_DOWNLOADSNOTUSER2","Si vous &eacute;tiez un utilisateur enregistr&eacute;, vous pourriez proposer vos fichiers en t&eacute;l&eacute;chargement depuis ce site.");
define_once("_DOWNLOADSNOTUSER3","Devenir un membre enregistr&eacute; est un processus simple et rapide.");
define_once("_DOWNLOADSNOTUSER4","Pourquoi l'enregistrement est-il n&eacute;cessaire pour acc&eacute;der &agrave; certaines options ?");
define_once("_DOWNLOADSNOTUSER5","Nous pouvons vous offrir de cette mani&egrave;re un contenu de la plus haute qualit&eacute;,");
define_once("_DOWNLOADSNOTUSER6","chaque &eacute;l&eacute;ment est examin&eacute; individuellement et approuv&eacute; par notre &eacute;quipe.");
define_once("_DOWNLOADSNOTUSER7","Nous esp&eacute;rons vous offrir ainsi uniquement des informations de valeur.");
define_once("_DOWNLOADSNOTUSER8","<a href=\"modules.php?name=Your_Account\">Ouvrir un compte</a>");
define_once("_DOWNLOADALREADYEXT","ERREUR: Cet URL est d&eacute;j&agrave; pr&eacute;sent dans la base de donn&eacute;es!");
define_once("_DOWNLOADNOTITLE","ERREUR: Vous devez saisir un TITRE pour votre URL!");
define_once("_DOWNLOADNOURL","ERREUR: Vous devez saisir un URL pour votre URL!");
define_once("_DOWNLOADNODESC","ERREUR: Vous devez saisir une DESCRIPTION pour votre URL!");
define_once("_DOWNLOADRECEIVED","Nous avons re&ccedil;u votre proposition de fichier. Merci !");
define_once("_NEWDOWNLOADS","Nouveaux fichiers");
define_once("_TOTALNEWDOWNLOADS","Total des nouveaux fichiers");
define_once("_DTOTALFORLAST","Total des nouveaux fichiers depuis");
define_once("_DBESTRATED","Les produits les mieux cot&eacute;s - Top");
define_once("_TRATEDDOWNLOADS","fichiers &eacute;valu&eacute;s au total");
define_once("_SORTDOWNLOADSBY","Trier les fichiers par");
define_once("_DCATNEWTODAY","Nouveaux fichiers dans cette cat&eacute;gorie ajout&eacute;s aujourd'hui");
define_once("_DCATLAST3DAYS","Nouveaux fichiers dans cette cat&eacute;gorie ajout&eacute;s dans les 3 derniers jours");
define_once("_DCATTHISWEEK","Nouveaux fichiers dans cette cat&eacute;gorie ajout&eacute;s cette semaine");
define_once("_DDATE1","Date (Anciens fichiers affich&eacute;s en premier)");
define_once("_DDATE2","Date (Nouveaux fichiers affich&eacute;s en premier)");
define_once("_DOWNLOADPROFILE","T&eacute;l&eacute;chargement - Profil");
define_once("_DOWNLOADRATINGDET","D&eacute;tails des &eacute;valuations");
define_once("_EDITTHISDOWNLOAD","Editer ce produit");
define_once("_DOWNLOADRATING","Evaluation des produits");
define_once("_DOWNLOADVOTE","Votez !");
define_once("_REQUESTDOWNLOADMOD","Requ&ecirc;te de modification pour un produit");
define_once("_DOWNLOADID","ID du produit");
define_once("_DLETSDECIDE","Les contributions d'utilisateurs tels que vous aideront d'autres visiteurs &agrave; mieux choisir les fichiers &agrave; t&eacute;l&eacute;charger.");
define_once("_DRATENOTE4","Vous pouvez voir une liste des <a href=\"downloads.php?op=TopRated\">produits les mieux cot&eacute;s</a>.");
define_once("_DATE","Date");
define_once("_TO","&agrave;");
define_once("_NEW","Nouveaux");
define_once("_POPULAR","Populaires");
define_once("_TOPRATED","Mieux cot&eacute;s");
define_once("_ADDITIONALDET","D&eacute;tails additionnels");
define_once("_EDITORREVIEW","Compte-rendu de l'&eacute;diteur");
define_once("_REPORTBROKEN","Signaler un lien mort");
define_once("_AND","et");
define_once("_INDB","dans notre base de donn&eacute;e");
define_once("_INSTRUCTIONS","Instructions");
define_once("_USERANDIP","L'identifiant utilisateur et le num&eacute;ro IP sont enregistr&eacute;s, n'abusez pas du syst&egrave;me svp.");
define_once("_LDESCRIPTION","Description: (255 caract&egrave;res max)");
define_once("_CHECKFORIT","Vous n'avez pas entr&eacute; votre adresse Email.  Nous v&eacute;rifierons cependant votre lien prochainement.");
define_once("_LASTWEEK","La semaine derni&egrave;re");
define_once("_LAST30DAYS","Les 30 derniers jours");
define_once("_1WEEK","1 semaine");
define_once("_2WEEKS","2 semaines");
define_once("_30DAYS","30 jours");
define_once("_SHOW","Montrer");
define_once("_DAYS","jours");
define_once("_ADDEDON","Ajout&eacute; le");


define_once("_RATING","Evaluation");
define_once("_DETAILS","D&eacute;tails");
define_once("_OF","de");
define_once("_TVOTESREQ","minimum de votes requis");
define_once("_SHOWTOP","Montrer le Top");
define_once("_MOSTPOPULAR","Les plus populaires - Top");
define_once("_OFALL","de tous les");
define_once("_POPULARITY","Popularit&eacute;");
define_once("_SELECTPAGE","Selectionnez la page");
define_once("_MAIN","Principal");
define_once("_NEWTODAY","Nouveau aujourd'hui");
define_once("_NEWLAST3DAYS","Nouveau ces 3 derniers jours");
define_once("_NEWTHISWEEK","Nouveaux cette semaine");
define_once("_POPULARITY1","Popularit&eacute; (du plus petit au plus grand nombre de hits)");
define_once("_POPULARITY2","Popularit&eacute; (du plus grand au plus petit nombre de hits)");
define_once("_TITLEAZ","Titre (de A &agrave; Z)");
define_once("_TITLEZA","Title (de Z &agrave; A)");
define_once("_RATING1","Evaluation (du plus petit au plus grand score)");
define_once("_RATING2","Evaluation (du plus grand au plus petit score)");
define_once("_SEARCHRESULTS4","R&eacute;sultats de la recherche pour");
define_once("_USUBCATEGORIES","Sous-cat&eacute;gories");
define_once("_TRY2SEARCH","Essayez de rechercher");
define_once("_INOTHERSENGINES","dans d'autres moteurs de recherche");
define_once("_EDITORIAL","Editorial");
define_once("_EDITORIALBY","Compte rendu par");
define_once("_NOEDITORIAL","Il n'y a pas de compte rendu disponible pour ce site.");
define_once("_RATETHISSITE","Evaluez ce site Web");
define_once("_ISTHISYOURSITE","S'agit-il de votre site Web ? ");
define_once("_ALLOWTORATE","Autoriser les autres utilisateurs &agrave; voter depuis votre site Web !");
define_once("_OVERALLRATING","Evaluation g&eacute;n&eacute;rale");
define_once("_TOTALOF","Total de");
define_once("_USER","Utilisateur");
define_once("_USERAVGRATING","Moyenne des &eacute;valuations de l'utilisateur");
define_once("_NUMRATINGS","Nbre d'&eacute;valuations");
define_once("_REGISTEREDUSERS","Utilisateurs enregistr&eacute;s");
define_once("_NUMBEROFRATINGS","Nombre d'&eacute;valuations");
define_once("_NOREGUSERSVOTES","Pas de votes d'utilisateurs enregistr&eacute;s");
define_once("_BREAKDOWNBYVAL","D&eacute;coupage des &eacute;valuations par valeur");
define_once("_LTOTALVOTES","vote(s) au total");
define_once("_HIGHRATING","Cote la plus haute");
define_once("_LOWRATING","Cote la plus basse");
define_once("_NUMOFCOMMENTS","Nombre de commentaires");
define_once("_WEIGHNOTE","* Note: Le poid que donne ce site aux &eacute;valuations des utilisateurs enregistr&eacute;s par rapport &agrave; celles des utilisateurs anonymes est de");
define_once("_NOUNREGUSERSVOTES","Pas de votes d'utilisateurs non-enregistr&eacute;s");
define_once("_WEIGHOUTNOTE","* Note: Le poid que donne ce site aux &eacute;valuations des utilisateurs enregistr&eacute;s par rapport &agrave; celles des utilisateurs ext&eacute;rieurs est de");
define_once("_NOOUTSIDEVOTES","Pas de votes d'&eacute;lecteurs ext&eacute;rieurs");
define_once("_OUTSIDEVOTERS","Electeurs ext&eacute;rieurs");
define_once("_UNREGISTEREDUSERS","Utilisateurs non-enregistr&eacute;s");
define_once("_PROMOTEYOURSITE","Faites la promo de votre site Web");
define_once("_PROMOTE01","Peut-&ecirc;tre serez-vous int&eacute;ress&eacute; par une de nos nombreuses options pour 'Evaluer un site' &agrave; distance.  Celles-ci vous permettent de placer une image (ou un formulaire d'&eacute;valuation) sur votre site pour augmenter le nombre de votes que votre site recevra.  Choisissez une des options pr&eacute;sent&eacute;es ci-dessous:");
define_once("_TEXTLINK","Lien textuel");
define_once("_PROMOTE02","Un des moyens de mener vers le formulaire d'&eacute;valuation est l'utilisation d'un lien textuel:");
define_once("_HTMLCODE1","Le code HTML &agrave; utiliser dans ce cas est::");
define_once("_THENUMBER","Le nombre");
define_once("_IDREFER","dans le source HTML r&eacute;f&eacute;rence l'ID de votre site dans la base de donn&eacute;es de $sitename.  Assurez vous que ce nombre est pr&eacute;sent.");
define_once("_BUTTONLINK","Lien 'bouton'");
define_once("_PROMOTE03","Si vous cherchez d'autres solutions qu'un simple lien textuel, vous choisirez peut-&ecirc;tre un lien par bouton:");
define_once("_RATEIT","Votez pour ce site !");
define_once("_HTMLCODE2","Le code source pour l'utilisation du bouton ci-dessus est:");
define_once("_REMOTEFORM","Formulaire d'&eacute;valuation &agrave; distance");
define_once("_PROMOTE04","Si vous tentez de tricher ici, nous enleverons votre lien. Ceci &eacute;tant dit, voici &agrave; quoi ressemble le formulaire d'&eacute;valuation &agrave; distance.");
define_once("_VOTE4THISSITE","Votez pour ce site !");
define_once("_HTMLCODE3","L'utilisation de ce formulaire autorise vos visiteurs &agrave; voter pour votre site directement depuis vos pages Web, et l'&eacute;valuation sera enregistr&eacute;e ici.  Le formulaire ci-dessus est inactif, mais le code source suivant fonctionnera si vous le copiez et le collez sur une de vos pages Web.  Voici le code source:");
define_once("_PROMOTE05","Merci !  Et bonne chance pour l'&eacute;valuation de votre site !");
define_once("_STAFF","Equipe");
define_once("_THANKSBROKEN","Merci de votre aide pour maintenir l'int&eacute;grit&eacute; de ce r&eacute;pertoire.");
define_once("_SECURITYBROKEN","Pour des raisons de s&eacute;curit&eacute;, votre nom d'utilisateur et votre num&eacute;ro IP seront temporairement enregistr&eacute;s.");
define_once("_THANKSFORINFO","Merci pour cette information.");
define_once("_LOOKTOREQUEST","Nous examinerons votre requ&ecirc;te rapidement.");
define_once("_SENDREQUEST","Envoyer votre requ&ecirc;te");
define_once("_THANKSTOTAKETIME","Merci de prendre le temps d'&eacute;valuer les sites sur");
define_once("_RETURNTO","Retour &agrave;");
define_once("_RATENOTE1","Ne votez pas pour le m&ecirc;me site plus d'une fois SVP.");
define_once("_RATENOTE2","L'&eacute;chelle est de 1 &agrave; 10, 1 &eacute;tant <I> faible </I> et 10 <I> excellent </I>.");
define_once("_RATENOTE3","Soyez objectif dans votre vote, si chacun re&ccedil;oit un 1 ou un 10, le syst&egrave;me d'&eacute;valuation n'est plus tr&egrave;s utile.");
define_once("_RATENOTE5","Ne votez pas pour votre propre site ou le site d'un concurrent.");
define_once("_YOUAREREGGED","Vous &ecirc;tes un utilisateur enregistr&eacute; et vous &ecirc;tes connect&eacute;.");
define_once("_FEELFREE2ADD","Votre commentaire &agrave; propos de ce site est le bienvenu.");
define_once("_YOUARENOTREGGED","Vous n'&ecirc;tes pas un utilisateur enregistr&eacute;, ou vous ne vous &ecirc;tes pas connect&eacute;.");
define_once("_IFYOUWEREREG","Si vous &eacute;tiez enregistr&eacute;, vous pourriez commenter ce site.");
define_once("_TITLE","Titre");
define_once("_MODIFY","Modifier");
define_once("_COMPLETEVOTE1","Votre vote est enregistré.");
define_once("_COMPLETEVOTE2","Vous avez déjà voté pour cette ressource dans le passé $anonwaitdays jour(s).");
define_once("_COMPLETEVOTE3","Votez pour une ressource seulement une fois<br>Tous les votes sont loggés");
define_once("_COMPLETEVOTE4","Vous ne pouvez pas voter sur un lien que vous avez proposez.<br>Tous les votes sont loggés.");
define_once("_COMPLETEVOTE5","Aucune note n'a été choisie - Le vote n'a pas été pri en compte");
define_once("_COMPLETEVOTE6","Seulement un vote par adresse IP est autorisé tous les $outsidewaitdays jour(s).");
define_once("_LINKSDATESTRING","%d-%b-%Y");


