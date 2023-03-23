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

define_once("_CATEGORIES","Κατηγορίες");
define_once("_LVOTES","Αριθμός Ψήφων");
define_once("_TOTALVOTES","Σύνολο ψήφων");
define_once("_SCOMMENTS","Παρατηρήσεις");
define_once("_NOMATCHES","Δεν βρέθηκε αποτέλεσμα στην αίτησή σας");
define_once("_YOURNAME","Ονομα");
define_once("_DATE","Ημερομηνία");
define_once("_TO","Προς");
define_once("_LINKSMAIN","Κεντρική Σελίδα Συνδέσμων");
define_once("_ADDLINK","Προσθήκη Συνδέσμου");
define_once("_NEW","Νέοι σύνδεσμοι");
define_once("_POPULAR","Δημοφιλή");
define_once("_TOPRATED","Κορυφαίοι Βαθμολογικά");
define_once("_RANDOM","Τυχαίος σύνδεσμος");
define_once("_LINKCOMMENTS","Σχόλιο Συνδέσμου");
define_once("_ADDITIONALDET","Επιπρόσθετες Πληροφορίες");
define_once("_EDITORREVIEW","Ανασκόπηση Επεξεργασίας");
define_once("_MODIFY","Τροποποίηση");
define_once("_REPORTBROKEN","Αναφέρατε Ανενεργό Σύνδεσμο");
define_once("_LINKSMAINCAT","Κεντρική Σελίδα Συνδέσμων");
define_once("_THEREARE","Υπάρχουν");
define_once("_LINKS","Σύνδεσμοι");
define_once("_AND","Και");
define_once("_INDB","Στη βάση δεδομένων μας");
define_once("_ADDALINK","Προσθήκη Νέου Συνδέσμου");
define_once("_INSTRUCTIONS","Οδηγίες");
define_once("_SUBMITONCE","Υποβάλεται ένα σύνδεσμο μόνο μία φορά");
define_once("_POSTPENDING","Ολοι οι σύνδεσμοι υποβάλλονται εν αναμονή ελέγχου");
define_once("_USERANDIP","Κωδικός Χρήστη και IP διεύθυνση καταγράφονται, συνεπώς παρακαλούμε να μην καταχραστείτε τους πόρους του συστήματος");
define_once("_PAGETITLE","Τίτλος Σελίδας ");
define_once("_PAGEURL","URL Σελίδας");
define_once("_CATEGORY","Κατηγορίες");
define_once("_LDESCRIPTION","Περιγραφή: (255 χαρακτήρες μέγιστο)");
define_once("_YOUREMAIL","Η Email διεύθυνση σας");
define_once("_ADDURL","Προσθήκη URL");
define_once("_LINKSNOTUSER1","Δεν είσαστε εγγεγραμμένος χρήστης ή δεν έχετε συνδεθεί.");
define_once("_LINKSNOTUSER2","Εάν έχετε εγγραφεί μπορείτε να προσθέσετε συνδέσμους σ'αυτόν τον Ιστοχώρο.");
define_once("_LINKSNOTUSER3","H διαδικασία εγγραφής σας είναι απλή.");
define_once("_LINKSNOTUSER4","Η εγγραφή χρήστη είναι απαραίτητη προκειμένου να");
define_once("_LINKSNOTUSER5","είμαστε σε θέση να σας προσφέρουμε περιεχόμενο υψηλής ποιότητας,");
define_once("_LINKSNOTUSER6","κάθε αντικείμενο ελέγχεται και εγκρίνεται ξεχωριστά από το προσωπικό μας.");
define_once("_LINKSNOTUSER7","Προσδοκούμε να σας προσφέρουμε μόνο χρήσιμες πληροφορίες.");
define_once("_LINKSNOTUSER8","<a href=\"modules.php?name=Your_Account\">Εγγραφή</a>");
define_once("_LINKALREADYEXT","ΣΦΑΛΜΑ: αυτή το URL είναι ήδη καταχωρημένο στην Βάση Δεδομένων !");
define_once("_LINKNOTITLE","ΣΦΑΛΜΑ: Χρειάζεται να πληκτρολογήσετε κάποια ονομασία για το URL σας!");
define_once("_LINKNOURL","ΣΦΑΛΜΑ: Χρειάζεται να πληκτρολογήσετε κάποιο URL!");
define_once("_LINKNODESC","ΣΦΑΛΜΑ: Χρειάζεται να πληκτρολογήσετε κάποια περιγραφή για το URL!");
define_once("_LINKRECEIVED","Λάβαμε την αίτηση σας για σύνδεσμο. Ευχαριστούμε!");
define_once("_EMAILWHENADD","Θα λάβετε κάποια E-mail διεύθυνση όταν αυτή εγκριθεί.");
define_once("_CHECKFORIT","Δεν δώσατε στοιχεία για το E-mail. Πάρα ταύτα θα ελέγξουμε το σύνδεσμό σας πολύ σύντομα.");
define_once("_NEWLINKS","Νέοι Σύνδεσμοι");
define_once("_TOTALNEWLINKS","Σύνολο Νέων Συνδέσμων");
define_once("_LASTWEEK","Περασμένη Εβδομάδα");
define_once("_LAST30DAYS","Τελευταίες 30 ημέρες");
define_once("_SHOW","Προβολή");
define_once("_1WEEK","1 Εβδομάδα");
define_once("_2WEEKS","2 Εβδομάδες");
define_once("_30DAYS","30 Ημέρες");
define_once("_TOTALFORLAST","Σύνολο Νέων Συνδέσμων για");
define_once("_DAYS","Μέρες");
define_once("_DESCRIPTION","Περιγραφή");
define_once("_LINKSDATESTRING","%d-%b-%Y");
define_once("_ADDEDON","Προστέθηκε την");
define_once("_HITS","Αιτήσεις");
define_once("_RATING","Αξιολόγηση");
define_once("_RATESITE","Αξιολογήστε το Κόμβο");
define_once("_DETAILS","Λεπτομέρειες");
define_once("_BESTRATED","Σύνδεσμοι με την Καλύτερη Αξιολόγηση - Εμφάνιση των πρώτων ");
define_once("_OF","Από");
define_once("_TRATEDLINKS","Σύνολο Αξιολογούμενων Συνδέσμων");
define_once("_TVOTESREQ",": ελάχιστος αριθμός ψήφων");
define_once("_SHOWTOP","Εμφάνιση των πρώτων ");
define_once("_MOSTPOPULAR","Τα Δημοφιλέστερα- σε Πρώτο Πλάνο");
define_once("_OFALL","απ'όλα");
define_once("_SORTLINKSBY","Ταξινόμηση Συνδέσμων κατά");
define_once("_TITLE","Τίτλος");
define_once("_POPULARITY","Δημοτικότητα");
define_once("_SITESSORTED","Ταξινόμηση Ενεργών Κόμβων κατά ");
define_once("_SELECTPAGE","Επιλογή Σελίδας");
define_once("_PREVIOUS","Προηγούμενη Σελίδα");
define_once("_NEXT","Επόμενη Σελίδα");
define_once("_MAIN","Κεντρική Σελίδα Συνδέσμων");
define_once("_NEWTODAY","Σημερινά");
define_once("_NEWLAST3DAYS","Τελευταίες 3 μέρες");
define_once("_NEWTHISWEEK","Εβδομάδας");
define_once("_CATNEWTODAY","Νέοι Κόμβοι που προστέθηκαν Σήμερα  στην Κατηγορία αυτή");
define_once("_CATLAST3DAYS","Νέοι Σύνδεσμοι που προστέθηκαν τις τελευταίες 3 μέρες  στην Κατηγορία αυτή");
define_once("_CATTHISWEEK","Νέοι Σύνδεσμοι που προστέθηκαν αυτή τη Εβδομάδα  στην Κατηγορία αυτή");
define_once("_POPULARITY1","Δημοτικότητα (λιγότερες προς περισσότερες αιτήσεις");
define_once("_POPULARITY2","Δημοτικότητα (περισσότερες προς λιγότερες αιτήσεις");
define_once("_TITLEAZ","Τίτλος (Α στο Ω)");
define_once("_TITLEZA","Τίτλος (Ω στο Α)");
define_once("_DATE1","Ημερομηνία (Παλαιότεροι σύνδεσμοι εμφανίζονται πρώτοι)");
define_once("_DATE2","Ημερομηνία (Πιο πρόσφατοι σύνδεσμοι εμφανίζονται πρώτοι)");
define_once("_RATING1","Αξιολόγηση(με σειρά από Χαμηλότερες ως Υψηλότερες Βαθμολογίες)");
define_once("_RATING2","Αξιολόγηση(με σειρά από Υψηλότερες ως Χαμηλότερες Βαθμολογίες)");
define_once("_SEARCHRESULTS4","Αναζήτηση Αποτελεσμάτων για");
define_once("_USUBCATEGORIES","Υπο-Κατηγορίες");
define_once("_TRY2SEARCH","Δοκιμή Αναζήτησης");
define_once("_INOTHERSENGINES","σε άλλες Μηχανές Αναζήτησης");
define_once("_LINKPROFILE","Προφίλ Συνδέσμου (Ιδιότητες Σύνδεσης)");
define_once("_EDITORIALBY","Κύριο Αρθρο από ");
define_once("_NOEDITORIAL","Κανένα Αρθρο δεν είναι διαθέσιμο αυτή τη στιγμή σ'αυτό το κόμβο.");
define_once("_EDITORIAL","Κύριο Αρθρο");
define_once("_TOTALOF","Σύνολο από");
define_once("_USER","Χρήστης");
define_once("_USERAVGRATING","Μέσος όρο Βαθμολογίας Χρήστη");
define_once("_NUMRATINGS","Αριθμός Ψήφων");
define_once("_EDITTHISLINK","Επεξεργασία Συνδέσμου");
define_once("_LINKRATINGDET","Αναλυτική Βαθμολόγιση Συνδέσμου");
define_once("_OVERALLRATING","Συνολική Αξιολόγηση");
define_once("_REGISTEREDUSERS","Καταχωρημένοι Χρήστες");
define_once("_NUMBEROFRATINGS","Πλήθος αξιολογήσεων");
define_once("_NOREGUSERSVOTES","Μη Καταχωρημένοι Ψήφοι Χρηστών");
define_once("_BREAKDOWNBYVAL","Κατάτμιση Βαθμολογίας κατά τιμή ");
define_once("_LTOTALVOTES","Σύνολο Ψήφων");
define_once("_LINKRATING","Αξιολόγηση Συνδέσμου");
define_once("_HIGHRATING","Υψηλή Βαθμολογία (Αξιολόγηση)");
define_once("_LOWRATING","Χαμηλή Βαθμολογία(Αξιολόγηση)");
define_once("_NUMOFCOMMENTS","Πλήθος Παρατηρήσεων");
define_once("_WEIGHNOTE","* Σημείωμα: Ο Κόμβος αυτός υπολογίζει το λόγο Καταχωρημένων / Μη Καταχωρημένων αξιολογήσεων χρηστών");
define_once("_UNREGISTEREDUSERS","Μη Καταχωρημένοι Χρήστες");
define_once("_NOUNREGUSERSVOTES","Δεν Υπάρχουν Ψήφοι Μη Καταχωρημένων Χρηστών");
define_once("_WEIGHOUTNOTE","* Σημείωμα: Ο Κόμβος αυτός υπολογίζει το λόγο Καταχωρημένων / Εξωτερικών αξιολογήσεων χρηστών");
define_once("_OUTSIDEVOTERS","Εξωτερικοί Αξιολογητές");
define_once("_NOOUTSIDEVOTES","Δεν Υπάρχουν ψήφοι Εξωτερικών Χρήστων ");
define_once("_VISITTHISSITE","Επισκεφτείτε τον Ιστοχώρο");
define_once("_RATETHISSITE","Αξιολογήστε τον Ιστοχώρο ");
define_once("_ISTHISYOURSITE","Αυτή η Πηγή Πληροφορίας σας ανήκει;");
define_once("_ALLOWTORATE","Θέλετε να επιτρέψτε σε τρίτους χρήστες να το αξιολογήσουν μέσω του δικού σας δικτυακού κόμβου!");
define_once("_PROMOTEYOURSITE","Προωθήστε τον Ιστοχώρο σας");
define_once("_PROMOTE01","Μπορεί να σας ενδιαφέρουν μερικές από τις  απομακρυσμένες δυνατότητες \"Αξιολόγησης Κόμβων\" που προσφέρουμε.Σας επιτρέπουμε να εισάγετε ένα εικονίδιο (ακόμα και φόρμα αξιολόγησης) στο δικτυακό σας τόπο προκειμένου να αυξήσετε το πλήθος ψήθων που λαμβάνει ο κόμβος σας. Παρακαλώ διαλέξτε μία από τις παρακάτω επιλογές από τη παρακάτω λίστα ");
define_once("_TEXTLINK","Σύνδεσμος τύπου Κειμένου");
define_once("_PROMOTE02","Ενας τρόπος να συνδεθείτε στη φόρμα αξιολόγησης είναι μέσο ενός απλού συνδέσμου τύπου κειμένου");
define_once("_HTMLCODE1","Ο Κώδικας HTML που θα πρέπει να χρησιμοποιήστε στη προκειμένη είναι ο ακόλουθος");
define_once("_THENUMBER"," Ο Αριθμός");
define_once("_IDREFER","στο πρωτογενή HTML κώδικα αναφοράς ο ID αριθμός στο $sitename database. Βεβαιωθείτε για την ύπαρξη αυτού του αριθμού.");
define_once("_BUTTONLINK","Κουμπί Συνδέσμου");
define_once("_PROMOTE03","Εάν ψάχνετε κάτι παραπάνω από έναν απλό σύνδεσμο τύπου κειμένου, ίσως να προτιμούσατε ένα διακριτικό κουμπί συνδέσμου");
define_once("_RATEIT","Αξιολογήστε τον Ιστοχώρο! ");
define_once("_HTMLCODE2","Ο πρωτογενής κώδικας για το παραπάνω κουμπί είναι ο εξής");
define_once("_REMOTEFORM","Απομακρυσμένη Φόρμα Αξιολόγησης");
define_once("_PROMOTE04","Εάν προσπαθήστε να εξαπατήστε το σύστημα στο θέμα αυτό, θα διαγράψουμε το σύνδεσμο σας. Δεδομένου αυτού, σας παρουσιάζουμε παρακάτω μία πιθανή απεικόνιση της τρέχουσας απομακρυσμένης φόρμας αξιολόγησης.");
define_once("_VOTE4THISSITE","Ψηφίστε για αυτό τον Ιστοχώρο!");
define_once("_LINKVOTE","Ψηφίστε!");
define_once("_HTMLCODE3","Η χρήση αυτής της φόρμας θα δώσει την δυνατότητα στους χρήστες να αξιολογήσουν τον ιστοχώρο σας και η αξιολόγηση αυτή θα καταγραφεί εδώ. Η παραπάνω φόρμα είναι ανενεργή, αλλά ο παρακάτω πηγαίος κώδικας θα ενεργοποιηθεί εάν απλώς κάνετε αποκοπή/επικόλληση του στην ιστοσελίδα σας. Ο πηγαίος κώδικάς απεικονείζεται παρακάτω");
define_once("_PROMOTE05","Ευχαριστούμε! ");
define_once("_STAFF","Στελέχη");
define_once("_THANKSBROKEN","Ευχαριστούμε για την υποστήριξη σας στην διατήρηση της ακεραιότητας του καταλόγου.");
define_once("_THANKSFORINFO","Ευχαριστούμε για την Πληροφορία.");
define_once("_LOOKTOREQUEST","Αναμένουμε την αίτησή σας.");
define_once("_REQUESTLINKMOD","Αίτηση Τροποποίησης Συνδέσμου");
define_once("_LINKID","ID Συνδέσμου");
define_once("_LINKTITLE","Επικεφαλίδα Συνδέσμου");
define_once("_URL","URL");
define_once("_SENDREQUEST","Αποστολή Αίτησης");
define_once("_THANKSTOTAKETIME","Ευχαριστούμε που πήρατε το χρόνο να αξιολογήσετε τον ιστοχώρο ...");
define_once("_LETSDECIDE","Αντίστοιχες συνεισφορές από άλλους χρήστες θα βοηθήσουν άλλους επισκέπτες να αποφασίσουν πιο εύκολα ποιους συνδέσμους να ακολουθήσουν. ");
define_once("_RETURNTO","Επιστροφή");
define_once("_RATENOTE1","Παρακαλούμε να μην ψηφίζετε πάνω από μία φορά τους ίδιους συνδέσμους.");
define_once("_RATENOTE2","Η κλίμακα είναι 1 ως 10, όπου 1 αντιστοιχεί στο ανεπαρκή και 10 στο άριστο.");
define_once("_RATENOTE3","Παρακαλούμε να είσαστε αντικειμενικοί.");
define_once("_RATENOTE4","Μπορείτε να δείτε μία λίστα από τους <a href=\"modules.php?name=Web_Links&amp;l_op=TopRated\"> 10 πρώτους</a>.");
define_once("_RATENOTE5","Μην ψηφίζετε την δική σας πρόταση.");
define_once("_YOUAREREGGED","Είσαστε εγγεγραμμένος και συνδεδεμένος χρήστης");
define_once("_FEELFREE2ADD","Μπορείτε να προσθέσετε μία παρατήρηση για τον ιστοχώρο αυτό.");
define_once("_YOUARENOTREGGED","Δεν είσαστε εγγεγραμμένος χρήστης ή δεν έχετε συνδεθεί.");
define_once("_IFYOUWEREREG","Εάν είσαστε εγγεγραμμένος έχετε την δυνατότητα να κάνετε προσωπικά σχόλια για το κόμβο αυτό.");
define_once("_WEBLINKS","Σύνδεσμοι Διαδικτύου");
define_once("_COMPLETEVOTE1","Your vote is appreciated.");
define_once("_COMPLETEVOTE2","You have already voted for this resource in the past $anonwaitdays day(s).");
define_once("_COMPLETEVOTE3","Vote for a resource only once.<br>All votes are logged and reviewed.");
define_once("_COMPLETEVOTE4","You cannot vote on a link you submitted.<br>All votes are logged and reviewed.");
define_once("_COMPLETEVOTE5","No rating selected - no vote tallied");
define_once("_COMPLETEVOTE6","Only one vote per IP address allowed every $outsidewaitdays day(s).");
 define_once("_ONLYREGUSERSMODIFY","Μόνο οι εγγεγραμμένοι χρήστες έχουν το δικαίωμα υποβάλλουν τροποποιήσεις συνδέσμων. Παρακαλώ <a href=\"modules.php?name=Your_Account\">να γραφτείτε ή να συνδεθείτε</a>.");

