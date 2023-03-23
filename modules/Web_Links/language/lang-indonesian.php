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
define_once("_PREVIOUS","Hal. Sebelumnya");
define_once("_NEXT","Hal. Selanjutnya");
define_once("_YOURNAME","Nama Anda");
define_once("_CATEGORY","Kategori");
define_once("_CATEGORIES","Kategori");
define_once("_LVOTES","votes");
define_once("_TOTALVOTES","Total Penilai:");
define_once("_LINKTITLE","Nama Situs");
define_once("_HITS","Hits");
define_once("_THEREARE","Ada");
define_once("_NOMATCHES","Tidak ada hasil dari pencarian anda");
define_once("_SCOMMENTS","Komentar");
define_once("_DESCRIPTION","Deskripsi");
define_once("_DATE","Tanggal");
define_once("_TO","Sampai");
define_once("_ADDLINK","Tambah URL");
define_once("_NEW","Baru");
define_once("_POPULAR","Populer");
define_once("_TOPRATED","Terbaik");
define_once("_RANDOM","Acak");
define_once("_LINKSMAIN","Indeks Link");
define_once("_LINKCOMMENTS","Komentar Situs");
define_once("_ADDITIONALDET","Detil Tambahan");
define_once("_EDITORREVIEW","Editorial");
define_once("_REPORTBROKEN","Laporkan Salah Link");
define_once("_LINKSMAINCAT","Halaman Utama Direktori");
define_once("_AND","dan");
define_once("_INDB","dalam database");
define_once("_ADDALINK","Tambahkan Situs Baru");
define_once("_INSTRUCTIONS","Instruksi");
define_once("_SUBMITONCE","Daftarkan setiap URL satu kali saja.");
define_once("_POSTPENDING","Semua pendaftaran harus menunggu verifikasi.");
define_once("_USERANDIP","Nama user dan alamt IP anda sudah tercatat, mohon jangan mencoba mengacaukan sistem kami.");
define_once("_PAGETITLE","Judul Halaman");
define_once("_PAGEURL","URL");
define_once("_YOUREMAIL","Alamat Email");
define_once("_LDESCRIPTION","Deskripsi: (maks 255 karakter)");
define_once("_ADDURL","Tambahkan URL ini");
define_once("_LINKSNOTUSER1","Anda bukan member atau mungkin belum login.");
define_once("_LINKSNOTUSER2","Jika anda member situs ini anda bisa menambahkan link.");
define_once("_LINKSNOTUSER3","Jika anda ingin menambah link silakan daftar dulu, tidak sulit untuk mendaftar di situs ini.");
define_once("_LINKSNOTUSER4","Kami membutuhkan pendaftaran pada beberapa bagian dalam situs kami");
define_once("_LINKSNOTUSER5","supaya kami bisa memberikan informasi yang bermutu bagi pengunjung kami,");
define_once("_LINKSNOTUSER6","setiap item akan diperiksa dan disetujui oleh staf kami.");
define_once("_LINKSNOTUSER7","Kami berharap pengunjung kami untuk mendapatkan yang terbaik dari kami.");
define_once("_LINKSNOTUSER8","<a href=\"modules.php?name=Your_Account\">Daftar di sini</a>");
define_once("_LINKALREADYEXT","ERROR: Alamat URL sudah ada dalam database!");
define_once("_LINKNOTITLE","ERROR: Anda haruf mengisi JUDUL dari URL anda!");
define_once("_LINKNOURL","ERROR: Anda harus mengisi ALAMAT URL dari link anda!");
define_once("_LINKNODESC","ERROR: Anda harus mengisi DESKRIPSI dari link anda!");
define_once("_LINKRECEIVED","Terima kasih, kami sudah menerima masukkan anda.");
define_once("_EMAILWHENADD","Anda akan menerima email jika sudah disetujui.");
define_once("_CHECKFORIT","Anda tidak mengisi alamat email. Anyway, kami tetap akan memeriksa link anda.");
define_once("_NEWLINKS","Situs Baru");
define_once("_TOTALNEWLINKS","Total Situs Baru");
define_once("_LASTWEEK","Pekan Lalu");
define_once("_LAST30DAYS","30 hari terakhir");
define_once("_1WEEK","1 pekan terakhir");
define_once("_2WEEKS","2 pekan terakhir");
define_once("_30DAYS","30 hari terakhir");
define_once("_SHOW","Tampilkan");
define_once("_TOTALFORLAST","Total link baru dalam");
define_once("_DAYS","hari");
define_once("_ADDEDON","Ditambahkan");
define_once("_RATING","Nilai");
define_once("_RATESITE","beri nilai situs ini");
define_once("_DETAILS","Detil");
define_once("_BESTRATED","Situs Terbaik - Top");
define_once("_OF","dari");
define_once("_TRATEDLINKS","total link yang dinilai");
define_once("_TVOTESREQ","dibutuhkan nilai minimal");
define_once("_SHOWTOP","Tampilkan Top");
define_once("_MOSTPOPULAR","Situs Populer - Top");
define_once("_OFALL","dari seluruh");
define_once("_SORTLINKSBY","Urutkan berdasarkan");
define_once("_SITESSORTED","Saat ini diurutkan berdasarkan");
define_once("_POPULARITY","Popularitas");
define_once("_SELECTPAGE","Pilih halaman");
define_once("_MAIN","Utama");
define_once("_NEWTODAY","Yang baru hari ini");
define_once("_NEWLAST3DAYS","Yang baru dalam 3 hari terakhir");
define_once("_NEWTHISWEEK","Yang baru pekan ini");
define_once("_CATNEWTODAY","Situs baru pada kategori ini yang dimasukkan hari ini");
define_once("_CATLAST3DAYS","Situs baru pada kategori ini yang dimasukkan dalam 3 hari terakhir");
define_once("_CATTHISWEEK","Situs baru pada kategori ini yang dimasukkan dalam pekan ini");
define_once("_POPULARITY1","Popularitas (rendah-tinggi)");
define_once("_POPULARITY2","Popularitas (tinggi-rendah)");
define_once("_TITLEAZ","Judul (A - Z)");
define_once("_TITLEZA","Judul (Z - A)");
define_once("_DATE1","Tanggal (yang lama dulu)");
define_once("_DATE2","Tanggal (yang baru dulu)");
define_once("_RATING1","Nilai (rendah-tinggi)");
define_once("_RATING2","Nilai (tinggi-rendah)");
define_once("_SEARCHRESULTS4","Hasil Pencarian untuk");
define_once("_USUBCATEGORIES","Sub kategori");
define_once("_LINKS","Link");
define_once("_TRY2SEARCH","Cari");
define_once("_INOTHERSENGINES","pada mesin pencari lainnya");
define_once("_EDITORIAL","Editorial");
define_once("_LINKPROFILE","Profil Situs");
define_once("_EDITORIALBY","Editorial oleh");
define_once("_NOEDITORIAL","Saat ini tidak ada editorial untuk situs ini.");
define_once("_VISITTHISSITE","Kunjungi situs ini");
define_once("_RATETHISSITE","Beri nilai situs ini");
define_once("_ISTHISYOURSITE","Ini situs anda?");
define_once("_ALLOWTORATE","Sertakan fasilitas penilai pada situs anda ke direktori kami!");
define_once("_LINKRATINGDET","Detail Nilai Situs");
define_once("_OVERALLRATING","Nilai Seluruhnya");
define_once("_TOTALOF","Total");
define_once("_USER","member");
define_once("_USERAVGRATING","Nilai rata-rata dari member");
define_once("_NUMRATINGS","# Nilai");
define_once("_EDITTHISLINK","Edit Link Situs Ini");
define_once("_REGISTEREDUSERS","Member");
define_once("_NUMBEROFRATINGS","Jumlah Nilai");
define_once("_NOREGUSERSVOTES","Tidak ada member yang menilai");
define_once("_BREAKDOWNBYVAL","Penjabaran Nilai");
define_once("_LTOTALVOTES","total penilai");
define_once("_LINKRATING","Nilai Situs");
define_once("_HIGHRATING","Nilai Tertinggi");
define_once("_LOWRATING","Nilai Terendah");
define_once("_NUMOFCOMMENTS","Jumlah Komentar");
define_once("_WEIGHNOTE","* Catatan: Direktori ini bisa membedakan penilaian dari member dan bukan member");
define_once("_NOUNREGUSERSVOTES","Tidak ada pengunjung non-member yang memberi nilai");
define_once("_WEIGHOUTNOTE","* Catatan: Direktori ini bisa membedakan penilaian dari member dari penilaian dari luar (situs) direktori ini");
define_once("_NOOUTSIDEVOTES","Tidak ada penilai dari luar");
define_once("_OUTSIDEVOTERS","Penilai dari luar");
define_once("_UNREGISTEREDUSERS","Bukan member");
define_once("_PROMOTEYOURSITE","Promosikan Situs Anda");
define_once("_PROMOTE01","Anda mungkin tertarik pada beberapa pilihan 'Fasilitas Penilai' yang ada. Anda bisa memilih gambar atau form penilaian pada situs anda ke direktori kami untuk menambah jumlah kunjungan situs anda:");
define_once("_TEXTLINK","Text Link");
define_once("_PROMOTE02","Salah satu cara adalah dengan teks hiperlink sederhana:");
define_once("_HTMLCODE1","Berikut adalah kode HTML yang harus anda gunakan:");
define_once("_THENUMBER","Nomor");
define_once("_IDREFER","pada kode HTML merujuk pada ID situs anda dalam database kami. Pastikan nomor ini sesuai dengan situs anda.");
define_once("_BUTTONLINK","Link Tombol");
define_once("_PROMOTE03","Jika anda menginginkan selain teks hiperlink, anda bisa menggunakan link tombol kecil ini:");
define_once("_RATEIT","Beri Nilai Situs ini!");
define_once("_HTMLCODE2","Kode HTML untuk tombol di atas adalah:");
define_once("_REMOTEFORM","Form penilaian dari luar");
define_once("_PROMOTE04","Jika anda memanipulasi penilaian ini, kami akan menghapus situs anda. Berikut adalah tampilan form.");
define_once("_VOTE4THISSITE","Vote for this Site!");
define_once("_LINKVOTE","Vote!");
define_once("_HTMLCODE3","Dengan menggunakan form ini, pengunjung situs anda bisa memberi nilai situs anda ke direktori kami. Form diatas hanya contoh, tetapi anda bisa menyalin kode HTML dibawah ini dan menyertakannya pada halaman situs anda:");
define_once("_PROMOTE05","Terima kasih! dan selamat mencoba!");
define_once("_STAFF","Staf");
define_once("_THANKSBROKEN","Terima kasih atas bantuan anda menjaga integritas direktori kami.");
define_once("_THANKSFORINFO","Terima kasih atas informasi anda.");
define_once("_LOOKTOREQUEST","Kami akan memeriksa laporan anda.");
define_once("_ONLYREGUSERSMODIFY","Hanya member yang bisa meminta modifikasi link. Silakan daftar atau login <a href=\"/modules.php?name=Your_Account&">di sini</a>.");
define_once("_REQUESTLINKMOD","Permohonan Modifikasi Link Situs");
define_once("_LINKID","ID Situs");
define_once("_SENDREQUEST","Kirim");
define_once("_THANKSTOTAKETIME","Terima kasih atas waktu anda memberi nilai sebuah situs pada Direktori");
define_once("_LETSDECIDE","Masukan dari member seperti anda akan membantu pengunjung lain memilih situs yang akan dikunjungi.");
define_once("_RETURNTO","Kembali ke");
define_once("_RATENOTE1","Mohon tidak menilai link yang sama lebih dari satu kali.");
define_once("_RATENOTE2","Sekala 1 - 10, di mana 1 terendah dan 10 tertinggi.");
define_once("_RATENOTE3","Harap mengisi dengan objektif, jika seseorang mendapat nilai 10 atau 1 penilaian ini tidak banyak berguna.");
define_once("_RATENOTE4","Anda bisa melihat <a href=\"modules.php?name=Direktori&amp;l_op=TopRated\">Situs Terbaik</a>.");
define_once("_RATENOTE5","Harap tidak mengisi situs sendiri atau situs kompetitor anda.");
define_once("_YOUAREREGGED","Anda adalah member dan sudah login.");
define_once("_FEELFREE2ADD","Silakan memberi komentar.");
define_once("_YOUARENOTREGGED","Anda bukan member atau mungkin belum login.");
define_once("_IFYOUWEREREG","Jika sudah terdaftar anda bisa memberi komentar pada situs ini.");
define_once("_WEBLINKS","Direktori");
define_once("_TITLE","Judul");
define_once("_MODIFY","Ubah");
define_once("_COMPLETEVOTE1","Terima kasih atas penilaian anda.");
define_once("_COMPLETEVOTE2","anda sudah pernah memberi nilai situs ini dalam $anonwaitdays hari terakhir.");
define_once("_COMPLETEVOTE3","Beri nilai satu kali saja untuk setiap URL.<br>Setiap penilaian akan dicatat dan diperhatikan.");
define_once("_COMPLETEVOTE4","Anda tidak bisa memberi nilai pada situs yang anda daftarkan sendiri.<br>Setiap penilaian akan dicatat dan diperhatikan.");
define_once("_COMPLETEVOTE5","Anda belum menentukan nilai yang ingin anda berikan");
define_once("_COMPLETEVOTE6","Kami hanya membolehkan satu penilaian dalam $outsidewaitdays hari untuk URL yang sama.");
define_once("_LINKSDATESTRING","%d-%b-%Y");


