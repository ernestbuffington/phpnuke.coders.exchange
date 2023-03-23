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

define_once("_URL","Slóð");
define_once("_PREVIOUS","Fyrri síða");
define_once("_NEXT","Næsta síða");
define_once("_YOURNAME","Nafn þitt");
define_once("_CATEGORY","Flokkur");
define_once("_CATEGORIES","flokkar");
define_once("_LVOTES","atkvæði");
define_once("_TOTALVOTES","Fjöldi atkvæða:");
define_once("_LINKTITLE","Titill vefslóðar");
define_once("_HITS","Heimsóknir");
define_once("_THEREARE","Það eru");
define_once("_NOMATCHES","Ekkert fannst");
define_once("_SCOMMENTS","athugasemdir");
define_once("_DESCRIPTION","Lýsing");
define_once("_ONLYREGUSERSMODIFY","Aðeins skráðir notendur geta stungið upp á breytingum á skrám. Vinsamlegast <a href=\"modules.php?name=Your_Account\">skráðu þig inn</a>.");
define_once("_DATE","Dags");
define_once("_TO","Til");
define_once("_ADDLINK","Bæta við veftengli");
define_once("_NEW","Nýtt");
define_once("_POPULAR","Vinsælt");
define_once("_TOPRATED","Bestu tenglar");
define_once("_RANDOM","Slembitengill");
define_once("_LINKSMAIN","Yfirsíða");
define_once("_LINKCOMMENTS","Umsagnir tengils");
define_once("_ADDITIONALDET","Meiri upplýsingar");
define_once("_EDITORREVIEW","Umsögn ritstjóra");
define_once("_REPORTBROKEN","Tilkynna óvirkan tengil");
define_once("_LINKSMAINCAT","Aðalflokkar tengla");
define_once("_AND","og");
define_once("_INDB","í gagnagrunninum");
define_once("_ADDALINK","Bæta við nýjum tengli");
define_once("_INSTRUCTIONS","Leiðbeiningar");
define_once("_SUBMITONCE","Sendu hvern einstakan tengil aðeins einu sinni inn.");
define_once("_POSTPENDING","Allir tenglar eru yfirfarnir af ritstjórn.");
define_once("_USERANDIP","Notandanafn og IP tala eru skráð svo vinsamlegast ekki misnota kerfið.");
define_once("_PAGETITLE","Titill síðu");
define_once("_PAGEURL","Vefslóð síðu");
define_once("_YOUREMAIL","Netfangið þitt");
define_once("_LDESCRIPTION","Lýsing: (mest 255 stafir)");
define_once("_ADDURL","Bæta slóð við");
define_once("_LINKSNOTUSER1","Þú ert annaðhvort ekki skráður notandi eða hefur ekki skráð þig inn.");
define_once("_LINKSNOTUSER2","Ef þú værir skráður notandi gætirðu bætt veftenglum við síðuna.");
define_once("_LINKSNOTUSER3","Það er mjög einfalt að skrá sig.");
define_once("_LINKSNOTUSER4","Því ekki skrá sig og fá þannig aðgang að ýmsum möguleikum?");
define_once("_LINKSNOTUSER5","Til að tryggja sem best gæði efnisins");
define_once("_LINKSNOTUSER6","er allt efni lesið yfir af ritstjórn áður en það er samþykkt.");
define_once("_LINKSNOTUSER7","Við stefnum á að bjóða aðeins upp á gott efni.");
define_once("_LINKSNOTUSER8","<a href=\"modules.php?name=Your_Account\">Skrá sig sem notanda</a>");
define_once("_LINKALREADYEXT","VILLA: Þessi slóð er þegar skráð í gagnagrunninum!");
define_once("_LINKNOTITLE","VILLA: Þú verður að setja titil á vefslóðina!");
define_once("_LINKNOURL","VILLA: Þú verður að setja vefslóð á vefslóðina!");
define_once("_LINKNODESC","VILLA: Þú verður að setja lýsingu á vefslóðina!");
define_once("_LINKRECEIVED","Við höfum móttekið vefslóðina frá þér. Takk fyrir þátttökuna!");
define_once("_EMAILWHENADD","Þú munt fá sendan tölvupóst þegar vefslóðin hefur verið samþykkt.");
define_once("_CHECKFORIT","Þú settir ekkert netfang. Við munum samt lesa þetta yfir svo kíktu við seinna.");
define_once("_NEWLINKS","Nýjir tenglar");
define_once("_TOTALNEWLINKS","Heildarfjöldi nýrra tengla");
define_once("_LASTWEEK","Síðasta vika");
define_once("_LAST30DAYS","Síðustu 30 dagar");
define_once("_1WEEK","1 viku");
define_once("_2WEEKS","2 vikur");
define_once("_30DAYS","30 daga");
define_once("_SHOW","Sýna");
define_once("_TOTALFORLAST","Heildarfjöldi fyrir síðustu");
define_once("_DAYS","daga");
define_once("_ADDEDON","Bætt við þann");
define_once("_RATING","Einkunn");
define_once("_RATESITE","Gefa síðu einkunn");
define_once("_DETAILS","Ýtarlegra");
define_once("_BESTRATED","Bestu veftenglarnir - Efstu");
define_once("_OF","af");
define_once("_TRATEDLINKS","heildarfjölda tengla með einkunn");
define_once("_TVOTESREQ","minnsti fjöldi einkunna");
define_once("_SHOWTOP","Sýna efstu");
define_once("_MOSTPOPULAR","Vinsælustu - Topp");
define_once("_OFALL","af öllum");
define_once("_SORTLINKSBY","Raða tenglum eftir");
define_once("_SITESSORTED","Svæðum núna raðað eftir");
define_once("_POPULARITY","Vinsældum");
define_once("_SELECTPAGE","Velja síðu");
define_once("_MAIN","Efst");
define_once("_NEWTODAY","Nýtt í dag");
define_once("_NEWLAST3DAYS","Nýtt síðust 3 daga");
define_once("_NEWTHISWEEK","Nýtt þessa síðuna");
define_once("_CATNEWTODAY","Nýjir tenglar í þessum flokki í dag");
define_once("_CATLAST3DAYS","Nýjir tenglar í þessum flokki síðustu 3 daga");
define_once("_CATTHISWEEK","Nýjir tenglar í þessum flokki í þessari viku");
define_once("_POPULARITY1","Vinsældum (Minnst til mest skoðað)");
define_once("_POPULARITY2","Vinsældum (Mest til minnst skoðað)");
define_once("_TITLEAZ","Titli (A til Z)");
define_once("_TITLEZA","Titli (Z til A)");
define_once("_DATE1","Dagsetningu (Elstu tenglar fyrst)");
define_once("_DATE2","Dagsetningu (Nýjust tenglar fyrst)");
define_once("_RATING1","Einkunn (Lægstu fyrst)");
define_once("_RATING2","Einkunn (Hæstu fyrst)");
define_once("_SEARCHRESULTS4","Leitarniðurstöður fyrir");
define_once("_USUBCATEGORIES","Undirflokkar");
define_once("_LINKS","tenglar");
define_once("_TRY2SEARCH","Prófaðu að leita að");
define_once("_INOTHERSENGINES","hjá öðrum leitarvélum");
define_once("_EDITORIAL","Ritstjórapistill");
define_once("_LINKPROFILE","Upplýsingar um tengil");
define_once("_EDITORIALBY","Ritstjórapistill frá");
define_once("_NOEDITORIAL","Enginn pistill er til fyrir þetta vefsvæði.");
define_once("_VISITTHISSITE","Heimsækja vefsvæðið");
define_once("_RATETHISSITE","Gefa þessari síðu einkunn");
define_once("_ISTHISYOURSITE","Er þetta síðan þín?");
define_once("_ALLOWTORATE","Leyfðu öðrum notendum að gefa henni einkunn frá þinni síðu!");
define_once("_LINKRATINGDET","Upplýsingar um einkunnagjöf");
define_once("_OVERALLRATING","Heildareinkunnagjöf");
define_once("_TOTALOF","Heildarfjöldi af");
define_once("_USER","Notandi");
define_once("_USERAVGRATING","Meðaleinkunn notenda");
define_once("_NUMRATINGS","Fjöldi einkunna");
define_once("_EDITTHISLINK","Breyta tenglinum");
define_once("_REGISTEREDUSERS","Skráðir notendur");
define_once("_NUMBEROFRATINGS","Fjöldi einkunna");
define_once("_NOREGUSERSVOTES","Engir skráðir notendur gáfu einkunn");
define_once("_BREAKDOWNBYVAL","Sundurliðun á einkunnagjöf miðað við einkunn");
define_once("_LTOTALVOTES","Fjöldi atkvæða");
define_once("_LINKRATING","Einkunn tengla");
define_once("_HIGHRATING","Há einkunn");
define_once("_LOWRATING","Lág einkunn");
define_once("_NUMOFCOMMENTS","Fjöldi athugasemda");
define_once("_WEIGHNOTE","* Ath: Einkunn frá skráðum notendum vegur hærra en hjá óskráðum");
define_once("_NOUNREGUSERSVOTES","Engir óskráðir notendur hafa gefið einkunn");
define_once("_WEIGHOUTNOTE","* Ath: Einkunn frá skráðum notendum vegur hærra en hjá utanaðkomandi");
define_once("_NOOUTSIDEVOTES","Engar utanaðkomandi einkunnir");
define_once("_OUTSIDEVOTERS","Einkunnir frá utanaðkomandi");
define_once("_UNREGISTEREDUSERS","Einkunnir frá óskráðum");
define_once("_PROMOTEYOURSITE","Komdu vefsvæðinu þínu á framfæri");
define_once("_PROMOTE01","Þú gætir haft áhuga á nokkrum möguleikum sem við bjóðum upp á til að láta gefa vefsvæðinu þínu einkunn.  Með þessu getur þú sett mynd (eða jafnvel eyðublað) á vefsíðu hjá þér til að hækka einkunn þína hér.  Veldu einhvern af möguleikunum hér fyrir neðan:");
define_once("_TEXTLINK","Textatengill");
define_once("_PROMOTE02","Ein leiðin til að tengjast einkunnagjöfinni er með einföldum textatengli:");
define_once("_HTMLCODE1","HTML kóðin sem þú getur notað er þessi hérna:");
define_once("_THENUMBER","Númerið");
define_once("_IDREFER","í HTML kóðanum er númerið á vefsvæðinu þínu í gagnagrunninum hjá $sitename. Passaðu að þetta númer sé örugglega til.");
define_once("_BUTTONLINK","Hnappur");
define_once("_PROMOTE03","Ef þú ert að leita að einhverju aðeins meira en einföldum textatengli þá getur þú notað lítinn hnapp:");
define_once("_RATEIT","Gefðu síðunni einkunn!");
define_once("_HTMLCODE2","Kóðinn fyrir hnappinn hér að ofan er:");
define_once("_REMOTEFORM","Einkunnagjafa eyðublað");
define_once("_PROMOTE04","Ef þú svindlar þá munum við fjarlægja tengilinn þinn.  Svona lítur eyðublaðið út.");
define_once("_VOTE4THISSITE","Gefið síðunni einkunn!");
define_once("_LINKVOTE","Gefa einkunn!");
define_once("_HTMLCODE3","Með því að nota þetta eyðublað getur fólk gefið síðunni einkunn beint frá síðunni og einkunnin er skráð hér. Eyðublaðið hér að ofan er ekki virkt en eftirfarandi kóði mun virka með því að afrita hann inn í vefsíðuna þína. Kóðinn er hér:");
define_once("_PROMOTE05","Kærar þakkir!  Gangi þér vel með einkunnagjöfina!");
define_once("_STAFF","Starfsfólk");
define_once("_THANKSBROKEN","Þakka þér fyrir hjálpina við að halda þessari skrá uppfærðri og réttri.");
define_once("_THANKSFORINFO","Takk fyrir upplýsingarnar.");
define_once("_LOOKTOREQUEST","Við munum líta á þetta fljótlega.");
define_once("_REQUESTLINKMOD","Biðja um breytingu á tengli");
define_once("_LINKID","Númer tengils");
define_once("_SENDREQUEST","Senda beiðni");
define_once("_THANKSTOTAKETIME","Takk fyrir að gefa þér tíma til að gefa síðu einkunn hér á");
define_once("_LETSDECIDE","Innlegg frá notendum eins og þér mun hjálpa öðrum gestum að ákveða hvaða tengla þeir skoða.");
define_once("_RETURNTO","Fara aftur til");
define_once("_RATENOTE1","Vinsamlegast ekki gefa sömu síðu einkunn oftar en einu sinni..");
define_once("_RATENOTE2","Skalinn er frá 1 til 10, þar sem 1 er verst og 10 best.");
define_once("_RATENOTE3","Vinsamlegast kjóstu hlutlaust. Ef allir fá 1 eða 10 þá eru einkunnagjöfin ekki mjög nytsamleg.");
define_once("_RATENOTE4","Þú getur skoðað lista yfir <a href=\"modules.php?name=Web_Links&amp;l_op=TopRated\">Bestu tenglana</a>.");
define_once("_RATENOTE5","Ekki kjósa þínar eigin síður eða keppinautar.");
define_once("_YOUAREREGGED","Þú ert tengdur sem skráður notandi.");
define_once("_FEELFREE2ADD","Þér er frjálst að setja inn umsögn um síðuna.");
define_once("_YOUARENOTREGGED","Þú ert ekki skráður notandi eða hefur ekki skráð þig inn.");
define_once("_IFYOUWEREREG","Ef þú værir skráður notandi gætirðu sett umsögn um þessa síðu.");
define_once("_WEBLINKS","Veftenglar");
define_once("_TITLE","Titill");
define_once("_MODIFY","Breyta");
define_once("_COMPLETEVOTE1","Atkvæði þitt er mikils metið.");
define_once("_COMPLETEVOTE2","Þú hefur þegar greitt atkvæði um þetta mál á síðustu $anonwaitdays degi(dögum).");
define_once("_COMPLETEVOTE3","Greiða skal einungis einu sinni atkvæði um hvert mál.<br>Öll atkvæði eru skráð og yfirfarin.");
define_once("_COMPLETEVOTE4","Þú getur ekki greitt atkvæði á þeirri tengingu sem þú sendir frá.<br>Öll atkvæði eru skráð og yfirfarin.");
define_once("_COMPLETEVOTE5","Engin kostur hefur verið valin - ekkert atkvæði er því talið");
define_once("_COMPLETEVOTE6","Einungis er heimilað að greiða eitt atkvæði frá hverri IP tölu á hverjum $outsidewaitdays degi(dögum).");
define_once("_LINKSDATESTRING","%d-%b-%Y");

