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

define_once("_URL","Slóð");
define_once("_PREVIOUS","Fyrri síða");
define_once("_NEXT","Næsta síða");
define_once("_CATEGORY","Flokkur");
define_once("_CATEGORIES","flokkar");
define_once("_LVOTES","atkvæði");
define_once("_TOTALVOTES","Fjöldi atkvæða:");
define_once("_THEREARE","Það eru");
define_once("_NOMATCHES","Ekkert fannst");
define_once("_SCOMMENTS","athugasemdir");
define_once("_UNKNOWN","Óþekkt");
define_once("_DOWNLOADS","sóknir");
define_once("_AUTHORNAME","Nafn höfunds");
define_once("_AUTHOREMAIL","Netfang höfunds");
define_once("_DOWNLOADNAME","Nafn forrits");
define_once("_ADDTHISFILE","Bæta þessari skrá við");
define_once("_INBYTES","í bætum");
define_once("_FILESIZE","Skráarstærð");
define_once("_VERSION","Útgáfa");
define_once("_DESCRIPTION","Lýsing");
define_once("_AUTHOR","Höfundur");
define_once("_HOMEPAGE","Heimasíða");
define_once("_DOWNLOADNOW","Sækja þessa skrá núna!");
define_once("_RATERESOURCE","Gefa einkunn");
define_once("_FILEURL","Skráartengill");
define_once("_ADDDOWNLOAD","Bæta skrá við");
define_once("_DOWNLOADSMAIN","Yfirsíða skráasvæðisins");
define_once("_DOWNLOADCOMMENTS","Athugasemdir skráaflokks");
define_once("_DOWNLOADSMAINCAT","Yfirsíða skráasvæðis");
define_once("_ADDADOWNLOAD","Bæta við nýrri skrá");
define_once("_DSUBMITONCE","Sendu hverja skrá aðeins einu sinni inn.");
define_once("_DPOSTPENDING","Allar skrár eru yfirfarnir af ritstjórn.");
define_once("_RESSORTED","Efni raðað eftir");
define_once("_DOWNLOADSNOTUSER1","Þú ert ekki skráður notandi eða hefur ekki skráð þig inn.");
define_once("_DOWNLOADSNOTUSER2","Ef þú værir skráður notandi gætirðu bætt við skrám á vefsvæðið.");
define_once("_DOWNLOADSNOTUSER3","Það er mjög einfalt og fljótlegt að skrá sig.");
define_once("_DOWNLOADSNOTUSER4","Afhverju þar að skrá sig til að fá aðgang að ákveðnum aðgerðum?");
define_once("_DOWNLOADSNOTUSER5","Svo við getum boðið þér efni í hæsta gæðaflokki,");
define_once("_DOWNLOADSNOTUSER6","allt efni er skoðað og samþykkt af starfsfólki vefsins.");
define_once("_DOWNLOADSNOTUSER7","Ætlun okkar er að gefa þér aðeins nothæfar og réttar upplýsingar.");
define_once("_DOWNLOADSNOTUSER8","<a href=\"modules.php?name=Your_Account\">Skrá nýjan notanda</a>");
define_once("_DOWNLOADALREADYEXT","VILLA: Þessi slóð er þegar skráð í gagnagrunnin!");
define_once("_DOWNLOADNOTITLE","VILLA: Þú verður að setja titil á slóðina!");
define_once("_DOWNLOADNOURL","VILLA: Þú verður að setja rétta slóð á vefslóðina!");
define_once("_DOWNLOADNODESC","VILLA: Þú verður að skrifa lýsingu á slóðinni!");
define_once("_DOWNLOADRECEIVED","Við höfum móttekið slóðina sem þú sendir inn. Kærar þakkir!");
define_once("_NEWDOWNLOADS","Nýjar skrár");
define_once("_TOTALNEWDOWNLOADS","Fjöldi nýrra skráa");
define_once("_DTOTALFORLAST","Fjöldi nýrra skráa síðstu");
define_once("_DBESTRATED","Skrár með hæstu einkunn - Topp");
define_once("_TRATEDDOWNLOADS","fjöldi skráa sem hefur verið gefin einkunn");
define_once("_SORTDOWNLOADSBY","Raða skrám eftir");
define_once("_DCATNEWTODAY","Nýjar skrár í þessum flokki í dag");
define_once("_DCATLAST3DAYS","Nýjar skrár í þessum flokki síðustu 3 daga");
define_once("_DCATTHISWEEK","Nýjar skrár í þessum flokki þessa vikuna");
define_once("_DDATE1","Dagsetning (Gamlar skrár fremst)");
define_once("_DDATE2","Dagsetning (Nýjar skrár fremst)");
define_once("_DOWNLOADPROFILE","Skráarlýsing");
define_once("_DOWNLOADRATINGDET","Ýtarlegt um einkunnagjöf skráar");
define_once("_EDITTHISDOWNLOAD","Breyta þessari skrá");
define_once("_DOWNLOADRATING","Gefa einkunn");
define_once("_DOWNLOADVOTE","Kjósa!");
define_once("_REQUESTDOWNLOADMOD","Stinga upp á breytingu á skrá");
define_once("_DOWNLOADID","Skráarnúmer");
define_once("_DLETSDECIDE","Innlegg frá notendum eins og þér getur hjálpað öðrum gestum að finna réttu skrárnar.");
define_once("_DRATENOTE4","Hér getur þú skoðað lista yfir <a href=\"modules.php?name=Downloads&amp;d_op=TopRated\">Skrár sem fá hæstu einkunn</a>.");
define_once("_DATE","Dags");
define_once("_TO","Til");
define_once("_NEW","Nýtt");
define_once("_POPULAR","Vinsælt");
define_once("_TOPRATED","Bestu tenglar");
define_once("_ADDITIONALDET","Meiri upplýsingar");
define_once("_EDITORREVIEW","Umsögn ritstjóra");
define_once("_REPORTBROKEN","Tilkynna óvirkan tengil");
define_once("_AND","og");
define_once("_INDB","í gagnagrunninum");
define_once("_INSTRUCTIONS","Leiðbeiningar");
define_once("_USERANDIP","Notandanafn og IP tala eru skráð svo vinsamlegast ekki misnota kerfið.");
define_once("_LDESCRIPTION","Lýsing: (mest 255 stafir)");
define_once("_CHECKFORIT","Þú settir ekkert netfang. Við munum samt lesa þetta yfir svo kíktu við seinna.");
define_once("_LASTWEEK","Síðasta vika");
define_once("_LAST30DAYS","Síðustu 30 dagar");
define_once("_1WEEK","1 viku");
define_once("_2WEEKS","2 vikur");
define_once("_30DAYS","30 daga");
define_once("_SHOW","Sýna");
define_once("_DAYS","daga");
define_once("_ADDEDON","Bætt við þann");
define_once("_RATING","Einkunn");
define_once("_DETAILS","Ýtarlegra");
define_once("_OF","af");
define_once("_TVOTESREQ","minnsti fjöldi einkunna");
define_once("_SHOWTOP","Sýna efstu");
define_once("_MOSTPOPULAR","Vinsælustu - Topp");
define_once("_OFALL","af öllum");
define_once("_POPULARITY","Vinsældum");
define_once("_SELECTPAGE","Velja síðu");
define_once("_MAIN","Efst");
define_once("_NEWTODAY","Nýtt í dag");
define_once("_NEWLAST3DAYS","Nýtt síðust 3 daga");
define_once("_NEWTHISWEEK","Nýtt þessa síðuna");
define_once("_POPULARITY1","Vinsældum (Minnst til mest skoðað)");
define_once("_POPULARITY2","Vinsældum (Mest til minnst skoðað)");
define_once("_TITLEAZ","Titli (A til Z)");
define_once("_TITLEZA","Titli (Z til A)");
define_once("_RATING1","Einkunn (Lægstu fyrst)");
define_once("_RATING2","Einkunn (Hæstu fyrst)");
define_once("_SEARCHRESULTS4","Leitarniðurstöður fyrir");
define_once("_USUBCATEGORIES","Undirflokkar");
define_once("_TRY2SEARCH","Prófaðu að leita að");
define_once("_INOTHERSENGINES","hjá öðrum leitarvélum");
define_once("_EDITORIAL","Ritstjórapistill");
define_once("_EDITORIALBY","Ritstjórapistill frá");
define_once("_NOEDITORIAL","Enginn pistill er til fyrir þetta vefsvæði.");
define_once("_RATETHISSITE","Gefa þessari síðu einkunn");
define_once("_ISTHISYOURSITE","Er þetta síðan þín?");
define_once("_ALLOWTORATE","Leyfðu öðrum notendum að gefa henni einkunn frá þinni síðu!");
define_once("_OVERALLRATING","Heildareinkunnagjöf");
define_once("_TOTALOF","Heildarfjöldi af");
define_once("_USER","Notandi");
define_once("_USERAVGRATING","Meðaleinkunn notenda");
define_once("_NUMRATINGS","Fjöldi einkunna");
define_once("_REGISTEREDUSERS","Skráðir notendur");
define_once("_NUMBEROFRATINGS","Fjöldi einkunna");
define_once("_NOREGUSERSVOTES","Engir skráðir notendur gáfu einkunn");
define_once("_BREAKDOWNBYVAL","Sundurliðun á einkunnagjöf miðað við einkunn");
define_once("_LTOTALVOTES","Fjöldi atkvæða");
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
define_once("_HTMLCODE3","Með því að nota þetta eyðublað getur fólk gefið síðunni einkunn beint frá síðunni og einkunnin er skráð hér. Eyðublaðið hér að ofan er ekki virkt en eftirfarandi kóði mun virka með því að afrita hann inn í vefsíðuna þína. Kóðinn er hér:");
define_once("_PROMOTE05","Kærar þakkir!  Gangi þér vel með einkunnagjöfina!");
define_once("_STAFF","Starfsfólk");
define_once("_THANKSBROKEN","Þakka þér fyrir hjálpina við að halda þessari skrá uppfærðri og réttri.");
define_once("_SECURITYBROKEN","Af öryggisástæðum er notendanafn þitt og IP tala skráð tímabundið.");
define_once("_THANKSFORINFO","Takk fyrir upplýsingarnar.");
define_once("_LOOKTOREQUEST","Við munum líta á þetta fljótlega.");
define_once("_SENDREQUEST","Senda beiðni");
define_once("_THANKSTOTAKETIME","Takk fyrir að gefa þér tíma til að gefa síðu einkunn hér á");
define_once("_RETURNTO","Fara aftur til");
define_once("_RATENOTE1","Vinsamlegast ekki gefa sömu síðu einkunn oftar en einu sinni..");
define_once("_RATENOTE2","Skalinn er frá 1 til 10, þar sem 1 er verst og 10 best.");
define_once("_RATENOTE3","Vinsamlegast kjóstu hlutlaust. Ef allir fá 1 eða 10 þá eru einkunnagjöfin ekki mjög nytsamleg.");
define_once("_RATENOTE5","Ekki kjósa þínar eigin síður eða keppinautar.");
define_once("_YOUAREREGGED","Þú ert tengdur sem skráður notandi.");
define_once("_FEELFREE2ADD","Þér er frjálst að setja inn umsögn um síðuna.");
define_once("_YOUARENOTREGGED","Þú ert ekki skráður notandi eða hefur ekki skráð þig inn.");
define_once("_IFYOUWEREREG","Ef þú værir skráður notandi gætirðu sett umsögn um þessa síðu.");
define_once("_TITLE","Titill");
define_once("_MODIFY","Breyta");
define_once("_COMPLETEVOTE1","Atkvæði þitt er vel þegið.");
define_once("_COMPLETEVOTE2","Þú hefur þegar greitt atkvæði um þetta mál á síðustu $anonwaitdays dag(a).");
define_once("_COMPLETEVOTE3","Greiðið einungis einu sinnu atkvæði um hvert mál.<br>Öll atkvæði eru skráð og yfirfarin.");
define_once("_COMPLETEVOTE4","Þú getur ekki greitt atkvæði á þeirri tengingu sem þú sendir.<br>Öl atkvæði eru skráð og yfirfarin.");
define_once("_COMPLETEVOTE5","Engin kostur var valin - ekkert atkvæði talið");
define_once("_COMPLETEVOTE6","Aðeins er heimilt að greiða eitt atkvæði frá hverri IP tölu hvern $outsidewaitdays dag(a).");
define_once("_LINKSDATESTRING","%d-%b-%Y");

