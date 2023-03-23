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
define_once("_PREVIOUS","Sebelumnya");
define_once("_NEXT","Berikutnya");
define_once("_CATEGORY","Kategori");
define_once("_CATEGORIES","Kategori");
define_once("_LVOTES","penilai");
define_once("_TOTALVOTES","Total Penilai:");
define_once("_THEREARE","Ada");
define_once("_NOMATCHES","Tidak ada hasil dari pencarian anda");
define_once("_SCOMMENTS","Komentar");
define_once("_UNKNOWN","Tidak Jelas");
define_once("_AUTHORNAME","Nama Pembuat");
define_once("_AUTHOREMAIL","Alamat Email Pembuat");
define_once("_DOWNLOADNAME","Nama Program");
define_once("_ADDTHISFILE","Tambahkan file ini");
define_once("_INBYTES","dalam bite");
define_once("_FILESIZE","Ukuran file");
define_once("_VERSION","Versi");
define_once("_DESCRIPTION","Deskripsi");
define_once("_AUTHOR","Pembuat");
define_once("_HOMEPAGE","Homepage");
define_once("_DOWNLOADNOW","Download file ini sekarang!");
define_once("_RATERESOURCE","Beri Nilai");
define_once("_FILEURL","File Link");
define_once("_ADDDOWNLOAD","Tambah File");
define_once("_DOWNLOADSMAIN","Halaman Utama Download");
define_once("_DOWNLOADCOMMENTS","Komentar Download");
define_once("_DOWNLOADSMAINCAT","Halaman Utama Download");
define_once("_ADDADOWNLOAD","Tambahkan File Download Baru");
define_once("_DSUBMITONCE","Daftarkan setiap file/program satu kali saja.");
define_once("_DPOSTPENDING","Semua pendaftaran harus menunggu verifikasi.");
define_once("_RESSORTED","Saat ini ditampilkan menurut");
define_once("_DOWNLOADSNOTUSER1","Anda bukan member atau mungkin belum login.");
define_once("_DOWNLOADSNOTUSER2","Jika anda member situs ini anda bisa menambahkan file untuk didownload.");
define_once("_DOWNLOADSNOTUSER3","Jika anda ingin menambah file silakan daftar dulu, tidak sulit untuk mendaftar di situs ini.");
define_once("_DOWNLOADSNOTUSER4","Kami membutuhkan pendaftaran pada beberapa bagian dalam situs kami");
define_once("_DOWNLOADSNOTUSER5","supaya kami bisa memberikan informasi yang bermutu bagi pengunjung kami,");
define_once("_DOWNLOADSNOTUSER6","setiap item akan diperiksa dan disetujui oleh staf kami.");
define_once("_DOWNLOADSNOTUSER7","Kami berharap pengunjung kami untuk mendapatkan yang terbaik dari kami.");
define_once("_DOWNLOADSNOTUSER8","<a href=\"modules.php?name=Your_Account&">Daftar di sini</a>");
define_once("_DOWNLOADALREADYEXT","ERROR: Alamat URL sudah ada dalam database!");
define_once("_DOWNLOADNOTITLE","ERROR: Anda haruf mengisi JUDUL dari URL anda!");
define_once("_DOWNLOADNOURL","ERROR: Anda harus mengisi ALAMAT URL dari file download yang anda inginkan!");
define_once("_DOWNLOADNODESC","ERROR: Anda harus mengisi DESKRIPSI dari file download anda!");
define_once("_DOWNLOADRECEIVED","Terima kasih, kami sudah menerima masukkan anda.");
define_once("_NEWDOWNLOADS","Download Baru");
define_once("_TOTALNEWDOWNLOADS","Total Download Baru");
define_once("_DTOTALFORLAST","Dalam");
define_once("_DBESTRATED","Download Terbaik - Top");
define_once("_TRATEDDOWNLOADS","total file yang dinilai");
define_once("_SORTDOWNLOADSBY","Urutkan berdasarkan");
define_once("_DCATNEWTODAY","File baru pada kategori ini yang ditambahkan hari ini");
define_once("_DCATLAST3DAYS","File baru pada kategori ini yang ditambahkan dalam 3 hari terakhir");
define_once("_DCATTHISWEEK","File baru pada kategori ini yang ditambahkan dalam pekan ini");
define_once("_DDATE1","Tanggal (yang lama dulu)");
define_once("_DDATE2","Tanggal (yang baru dulu)");
define_once("_DOWNLOADS","Download");
define_once("_DOWNLOADPROFILE","Profil download");
define_once("_DOWNLOADRATINGDET","Detil Nilai");
define_once("_EDITTHISDOWNLOAD","Edit");
define_once("_DOWNLOADRATING","Nilai");
define_once("_DOWNLOADVOTE","Beri Nilai!");
define_once("_ONLYREGUSERSMODIFY","Hanya memberyang bisa mengajukan permintaan modifikasi file. Silakan daftar atau login <a href=\"modules.php?name=Your_Account&">di sini</a>.");
define_once("_REQUESTDOWNLOADMOD","Permintaan Modifikasi File Download");
define_once("_DOWNLOADID","ID");
define_once("_DLETSDECIDE","Masukkan dari member seperti anda sangat membantu pengunjung lainnya untuk memutuskan apa yang harus mereka download.");
define_once("_DRATENOTE4","Anda bisa melihat daftar <a href=\"modules.php?name=Downloads&amp;d_op=TopRated\">Download Terbaik</a>.");
define_once("_DATE","Tanggal");
define_once("_TO","sampai");
define_once("_NEW","Baru");
define_once("_POPULAR","Populer");
define_once("_TOPRATED","Terbaik");
define_once("_ADDITIONALDET","Detil Tambahan");
define_once("_EDITORREVIEW","Editorial");
define_once("_REPORTBROKEN","Laporkan Link Salah");
define_once("_AND","dan");
define_once("_INDB","dalam database");
define_once("_INSTRUCTIONS","Instruksi");
define_once("_USERANDIP","Nama dan alamat IP anda sudah tercatat, mohon jangan mencoba mengacaukan sistem kami.");
define_once("_LDESCRIPTION","Deskripsi: (maks 255 karakter)");
define_once("_CHECKFORIT","Sayang sekali anda tidak memasukkan alamt email anda.");
define_once("_LASTWEEK","Pekan Lalu");
define_once("_LAST30DAYS","30 hari terakhir");
define_once("_1WEEK","1 pekan");
define_once("_2WEEKS","2 pekan");
define_once("_30DAYS","30 hari");
define_once("_SHOW","Tampilkan");
define_once("_DAYS","hari");
define_once("_ADDEDON","Dimasukkan");
define_once("_RATING","Nilai");
define_once("_DETAILS","Detil");
define_once("_OF","dari");
define_once("_TVOTESREQ","nilai minimum yang dibutuhkan");
define_once("_SHOWTOP","Tampilkan Terbaik");
define_once("_MOSTPOPULAR","Populer - Top");
define_once("_OFALL","dari semua");
define_once("_POPULARITY","Popularitas");
define_once("_SELECTPAGE","Pilih Halaman");
define_once("_MAIN","Utama");
define_once("_NEWTODAY","Yang baru hari ini");
define_once("_NEWLAST3DAYS","Terbaru dalam 3 hari terakhir");
define_once("_NEWTHISWEEK","Terbaru dalam pekan ini");
define_once("_POPULARITY1","Popularitas (Rendah - Tinggi)");
define_once("_POPULARITY2","Popularitas (TInggi - Rendah)");
define_once("_TITLEAZ","Judul (A - Z)");
define_once("_TITLEZA","Judul (Z - A)");
define_once("_RATING1","Nilai (Rendah - Tinggi)");
define_once("_RATING2","Nilai (TInggi - Rendah)");
define_once("_SEARCHRESULTS4","Hasil pencarian");
define_once("_USUBCATEGORIES","Sub kategori");
define_once("_TRY2SEARCH","Cari");
define_once("_INOTHERSENGINES","di mesin pencari lainnya");
define_once("_EDITORIAL","Editorial");
define_once("_EDITORIALBY","Editorial oleh");
define_once("_NOEDITORIAL","Belum ada editorial untuk situs ini.");
define_once("_RATETHISSITE","Beri Nilai File Ini");
define_once("_ISTHISYOURSITE","Ini milik anda?");
define_once("_ALLOWTORATE","Sertakan fasilitas penilai pada situs anda ke direktori kami!");
define_once("_OVERALLRATING","Nilai Seluruhnya");
define_once("_TOTALOF","Total");
define_once("_USER","User");
define_once("_USERAVGRATING","Nilai Rata-rata dari User");
define_once("_NUMRATINGS","# Nilai");
define_once("_REGISTEREDUSERS","Users");
define_once("_NUMBEROFRATINGS","Jumlah Nilai");
define_once("_NOREGUSERSVOTES","Tidak ada member yang menilai");
define_once("_BREAKDOWNBYVAL","Penjabaran Nilai");
define_once("_LTOTALVOTES","total penilai");
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
define_once("_VOTE4THISSITE","Voting untuk situs ini!");
define_once("_HTMLCODE3","Dengan menggunakan form ini, pengunjung situs anda bisa memberi nilai situs anda ke direktori kami. Form diatas hanya contoh, tetapi anda bisa menyalin kode HTML dibawah ini dan menyertakannya pada halaman situs anda:");
define_once("_PROMOTE05","Terima kasih! dan selamat mencoba!");
define_once("_STAFF","Staf");
define_once("_THANKSBROKEN","Terima kasih atas bantuan anda menjaga integritas direktori kami.");
define_once("_SECURITYBROKEN","Demi alasan keamanan, nama dan alamat IP anda dicatat untuk sementara.");
define_once("_THANKSFORINFO","Terima kasih atas informasi anda.");
define_once("_LOOKTOREQUEST","Kami akan memeriksa laporan anda.");
define_once("_SENDREQUEST","Kirim");
define_once("_THANKSTOTAKETIME","Terima kasih atas waktu anda memberi nilai sebuah situs pada Direktori");
define_once("_RETURNTO","Kembali ke");
define_once("_RATENOTE1","Mohon tidak menilai link yang sama lebih dari satu kali.");
define_once("_RATENOTE2","Skala 1 - 10, di mana 1 terendah dan 10 tertinggi.");
define_once("_RATENOTE3","Harap mengisi dengan obyektif, jika seseorang mendapat nilai 10 atau 1 penilaian ini tidak banyak berguna.");
define_once("_RATENOTE5","Harap tidak mengisi situs sendiri atau situs kompetitor anda.");
define_once("_YOUAREREGGED","Anda adalah member dan sudah login.");
define_once("_FEELFREE2ADD","Silakan memberi komentar.");
define_once("_YOUARENOTREGGED","Anda bukan member atau mungkin belum login.");
define_once("_IFYOUWEREREG","If you were registered you could make comments on this website.");
define_once("_TITLE","Judul");
define_once("_MODIFY","Ubah");
define_once("_COMPLETEVOTE1","Masukkan anda sangat kami hargai.");
define_once("_COMPLETEVOTE2","Anda sudah memberi nilai dalam $anonwaitdays hari terakhir.");
define_once("_COMPLETEVOTE3","Beri nilai satu kali saja.<br>\nSemua masukkan dicatat dan diperiksa.");
define_once("_COMPLETEVOTE4","Anda tidak bisa memberi nilai dari link milik anda sendiri.<br>\nSemua masukkan dicatat dan diperiksa.");
define_once("_COMPLETEVOTE5","Tidak ada nilai");
define_once("_COMPLETEVOTE6","Kami hanya mengambil satu penilai dengan satu alamat IP setiap $outsidewaitdays hari.");
define_once("_LINKSDATESTRING","%d-%b-%Y");


