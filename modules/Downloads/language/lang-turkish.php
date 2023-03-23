<?php
global $sitename, $anonwaitdays, $outsidewaitdays;


/**************************************************************************/
/* PHP-NUKE: Advanced Content Management System                           */
/* ============================================                           */
/*                                                                        */
/* Php-Nuke'nin sürekli geliþmesine baðlý olarak eski Türkçe dil dosyalarý*/
/* güncelliðini yitirdiði için "HighLAndeR" tarafýndan "MaXCoDeR"in       */
/* yapmýþ olduðu çeviriler güncelleþtirilip yeni çeviriler eklenmiþtir... */
/*                                                                        */
/* NOT: Yardýmlarý için Gurol400(gurol400@propc.org)'e teþekkürler.       */
/*                                                                        */
/* Türkçe Çevirmeni: HighLAndeR                                           */
/* Email: highlander@propc.org ICQ#: 110930777 	URL: http://www.propc.org */
/*                                                                        */
/* Türkçe Çevirmeni: Selim "MaXCoDeR" Þumlu                               */
/* Mail:webmaster@pcnet.com.tr ICQ:19648424 URL: http://www.turknuke.com  */
/**************************************************************************/

define_once("_URL","URL");
define_once("_PREVIOUS","Önceki Sayfa");
define_once("_NEXT","Sonraki Sayfa");
define_once("_CATEGORY","Kategori");
define_once("_CATEGORIES","Kategori");
define_once("_LVOTES","oy");
define_once("_TOTALVOTES","Toplam Oy:");
define_once("_THEREARE","Veritabanýnda");
define_once("_NOMATCHES","Uygun sonuç bulunamadý");
define_once("_SCOMMENTS","Yorum");
define_once("_UNKNOWN","Bilinmeyen");
define_once("_AUTHORNAME","Yazarýn Ýsmi");
define_once("_AUTHOREMAIL","Yazarýn Emaili");
define_once("_DOWNLOADNAME","Program Ýsmi");
define_once("_ADDTHISFILE","Dosya Ekle");
define_once("_INBYTES","byte");
define_once("_FILESIZE","Boyutu");
define_once("_VERSION","Sürüm");
define_once("_DESCRIPTION","Taným");
define_once("_AUTHOR","Yazar");
define_once("_HOMEPAGE","Ana Sayfa");
define_once("_DOWNLOADNOW","Bu dosyayý indir!");
define_once("_RATERESOURCE","Puan Ver");
define_once("_FILEURL","Dosya Baðlantýsý");
define_once("_ADDDOWNLOAD","Dosya Ekle");
define_once("_DOWNLOADSMAIN","Dosyalar Anasayfasý");
define_once("_DOWNLOADCOMMENTS","Dosya Yorumlarý");
define_once("_DOWNLOADSMAINCAT","Dosya Ana Kategorileri");
define_once("_ADDADOWNLOAD","Yeni Dosya Ekle");
define_once("_DSUBMITONCE","Bir dosyayý sadece bir kez ekleyin.");
define_once("_DPOSTPENDING","Gönderilen tüm dosyalar onay bekler.");
define_once("_RESSORTED","Þu anki sýralama");
define_once("_DOWNLOADSNOTUSER1","Kayýtlý deðilsiniz veya giriþ yapmamýþsýnýz.");
define_once("_DOWNLOADSNOTUSER2","Kayýtlý olsaydýnýz dosya ekleyebilirdiniz.");
define_once("_DOWNLOADSNOTUSER3","Kayýtlý bir kullanýcý olmak kýsa ve kolay bir iþlemdir.");
define_once("_DOWNLOADSNOTUSER4","Neden bazý özelliklere eriþim için kayýt gerekli?");
define_once("_DOWNLOADSNOTUSER5","Çünkü size en kaliteli içeriði sunabilmek için,");
define_once("_DOWNLOADSNOTUSER6","tüm öðelerin takýmýmýz tarafýndan incelenip onaylanmasý gerekiyor.");
define_once("_DOWNLOADSNOTUSER7","Size sadece deðerli bilgiler sunmak istiyoruz.");
define_once("_DOWNLOADSNOTUSER8","<a href=\"modules.php?name=Your_Account&op=new_user\">Yeni Hesap</a>");
define_once("_DOWNLOADALREADYEXT","HATA: Bu URL veritabanýnda mevcut!");
define_once("_DOWNLOADNOTITLE","HATA: URL için bir BAÞLIK girmelisiniz!");
define_once("_DOWNLOADNOURL","HATA: URL için bir ADRES girmelisiniz!");
define_once("_DOWNLOADNODESC","HATA: URL için bir TANIM girmelisiniz!");
define_once("_DOWNLOADRECEIVED","Dosya öneriniz alýndý. Teþekkürler!");
define_once("_NEWDOWNLOADS","Yeni Dosya");
define_once("_TOTALNEWDOWNLOADS","Toplam Yeni Dosya");
define_once("_DTOTALFORLAST","Toplam yeni dosya:");
define_once("_DBESTRATED","En Ýyi Dosyalar - Top");
define_once("_TRATEDDOWNLOADS","toplam puanlý dosya");
define_once("_SORTDOWNLOADSBY","Dosyalarý Sýrala:");
define_once("_DCATNEWTODAY","Bugün Eklenen Yeni Dosya");
define_once("_DCATLAST3DAYS","Son 3 Gün Ýçinde Eklenen Yeni Dosya");
define_once("_DCATTHISWEEK","Bu Hafta Eklenen Yeni Dosya");
define_once("_DDATE1","Tarih (Eskiler Baþa)");
define_once("_DDATE2","Tarih (Yeniler Baþa)");
define_once("_DOWNLOADS","Dosyalar");
define_once("_DOWNLOADPROFILE","Dosya Profili");
define_once("_DOWNLOADRATINGDET","Dosya Puanlama Detaylarý");
define_once("_EDITTHISDOWNLOAD","Bu Dosyayý Düzenle");
define_once("_DOWNLOADRATING","Dosya Puanlarý");
define_once("_DOWNLOADVOTE","Oy Ver!");
define_once("_DONLYREGUSERSMODIFY","Sadece kayýtlý kullanýcýlar dosya deðiþikliði önerebilirler. Lütfen <a href=\"modules.php?name=Your_Account\">kayýt olun yada sisteme giriþ yapýn</a>.");
define_once("_REQUESTDOWNLOADMOD","Dosya Deðiþiklik Ýsteði");
define_once("_DOWNLOADID","Dosya ID");
define_once("_DLETSDECIDE","Sizin gibi kullanýcýlardan gelen giriþler diðer kullanýcýlarýn iyi dosyalarý seçmesine yardýmcý olacaktýr.");
define_once("_DRATENOTE4","<a href=\"downloads.php?op=TopRated\">En Ýyi Kaynaklar</a> listesini görebilirsiniz.");
define_once("_DATE","Tarih");
define_once("_TO","Kime");
define_once("_NEW","Yeni");
define_once("_POPULAR","Popüler");
define_once("_TOPRATED","En Ýyi");
define_once("_ADDITIONALDET","Ek Detaylar");
define_once("_EDITORREVIEW","Editör Ýncelemesi");
define_once("_REPORTBROKEN","Kýrýk Baðlantý Bildir");
define_once("_AND","ve");
define_once("_INDB","bulunuyor");
define_once("_INSTRUCTIONS","Açýklamalar");
define_once("_USERANDIP","Kullanýcý adý ve IP adresi kaydedilir. Bu yüzden sistemi kötüye kullanmayýn.");
define_once("_LDESCRIPTION","Taným: (En fazla 255 karakter)");
define_once("_CHECKFORIT","Bir email adresi yazmadýnýz. Yine de baðlantýnýz kontrol edilecek.");
define_once("_LASTWEEK","Geçen Hafta");
define_once("_LAST30DAYS","Son 30 Gün");
define_once("_1WEEK","1 Hafta");
define_once("_2WEEKS","2 Hafta");
define_once("_30DAYS","30 Gün");
define_once("_SHOW","Göster");
define_once("_DAYS","gün");
define_once("_ADDEDON","Eklenme");
define_once("_RATING","Puan");
define_once("_DETAILS","Detaylar");
define_once("_OF","");
define_once("_TVOTESREQ","minimum oy gerekir");
define_once("_SHOWTOP","En Ýyi");
define_once("_MOSTPOPULAR","En Popüler - Top");
define_once("_OFALL","of all");
define_once("_POPULARITY","Popülerlik");
define_once("_SELECTPAGE","Sayfa Seçin");
define_once("_MAIN","Anasayfa");
define_once("_NEWTODAY","Bugün");
define_once("_NEWLAST3DAYS","Son 3 Gün");
define_once("_NEWTHISWEEK","Bu Hafta");
define_once("_POPULARITY1","Popülerlik (En Azdan En Yükseðe)");
define_once("_POPULARITY2","Popülerlik (En Yüksekten En Aza)");
define_once("_TITLEAZ","Baþlýk (A - Z)");
define_once("_TITLEZA","Baþlýk (Z - A)");
define_once("_RATING1","Puan (Düþükten Yükseðe)");
define_once("_RATING2","Paun (Yüksekten Düþüðe)");
define_once("_SEARCHRESULTS4","Arama Sonuçlarý:");
define_once("_USUBCATEGORIES","Alt-Kategori");
define_once("_TRY2SEARCH","");
define_once("_INOTHERSENGINES","için diðer arama motorlarýný deneyin");
define_once("_EDITORIAL","Editörel");
define_once("_EDITORIALBY","Editörel:");
define_once("_NOEDITORIAL","Bu site için þu an editörel yok.");
define_once("_RATETHISSITE","Bu Dosyaya Puan Ver");
define_once("_ISTHISYOURSITE","Bu sizin dosyanýz mý?");
define_once("_ALLOWTORATE","Diðer kullanýcýlarýn sitenizden oy vermesini saðlayýn!");
define_once("_OVERALLRATING","Puan");
define_once("_TOTALOF","Toplam");
define_once("_USER","Kullanýcý");
define_once("_USERAVGRATING","Ortalama Puan");
define_once("_NUMRATINGS","Puan Sayýsý");
define_once("_REGISTEREDUSERS","Kayýtlý Kullanýcý");
define_once("_NUMBEROFRATINGS","Puan Sayýsý");
define_once("_NOREGUSERSVOTES","Kayýtlý Kullanýcý Oyu Yok");
define_once("_BREAKDOWNBYVAL","Deðer Bakýmýndan Oylar");
define_once("_LTOTALVOTES","toplam oy");
define_once("_HIGHRATING","Yüksek Puan");
define_once("_LOWRATING","Alçak Puan");
define_once("_NUMOFCOMMENTS","Yorum Sayýsý");
define_once("_WEIGHNOTE","* Not: Bu kaynak kayýtlý ve kayýtsýz oylar aðýrlýklýdýr");
define_once("_NOUNREGUSERSVOTES","Kayýtsýz Kullanýcý Oyu Yok");
define_once("_WEIGHOUTNOTE","* Not: Bu kaynak kayýtlý ve dýþarýdan oylar aðýrlýklýdýr");
define_once("_NOOUTSIDEVOTES","Dýþarýdan Oy Yok");
define_once("_OUTSIDEVOTERS","Dýþarýdan Oylayanlar");
define_once("_UNREGISTEREDUSERS","Kayýtsýz Kullanýcýlar");
define_once("_PROMOTEYOURSITE","Sitenizi Tanýtýn");
define_once("_PROMOTE01","Belki 'Dosyaya Puan Ver' seçeneklerimizden biriyle ilgilenebilirsiniz. Bunlar kaynaðýnýza bir grafik (veya bir form) koyarak aldýðýnýz oy sayýsýný artýrmayý amaçlýyor. Lütfen aþaðýdaki seçeneklerden birini seçin:");
define_once("_TEXTLINK","Metin Baðlantý");
define_once("_PROMOTE02","Puanlama formuna ulaþmanýn basit bir yolu metin baðlantýdýr:");
define_once("_HTMLCODE1","Bu durumda kullanmanýz gereken HTML kodu aþaðýdadýr:");
define_once("_THENUMBER","Sayý");
define_once("_IDREFER","HTML kaynaðý referanslarýnda $sitename veritabanýndaki site ID'niz bulunur. Bu numaranýn doðruluðundan emin olun.");
define_once("_BUTTONLINK","Buton Baðlantý");
define_once("_PROMOTE03","Basit bir metin baðlantýdan daha fazlasýný arýyorsanýz, küçük bir buton baðlantý kullanmak isteyebilirsiniz:");
define_once("_RATEIT","Bu Dosyaya Puan Verin!");
define_once("_HTMLCODE2","Yukarýdaki buton için kaynak kodu:");
define_once("_REMOTEFORM","Uzaktan Puanlama Formu");
define_once("_PROMOTE04","Bunda hile yapmaya çalýþýrsanýz baðlantýnýz silinir. Uzaktan puanlama formu buna benzer.");
define_once("_VOTE4THISSITE","Bu Dosyaya Oy Verin!");
define_once("_HTMLCODE3","Bu formu kullanarak kullanýcýlar kaynaðýnýzý kendi sitenizden oylayabilirler. Yukarýdaki form pasiftir, fakat aþaðýdaki kodu sitenize kopyalarsanýz çalýþacaktýr:");
define_once("_PROMOTE05","Teþekkürler! ve puanlamalarda baþarýlar!");
define_once("_STAFF","Takýmý");
define_once("_THANKSBROKEN","Bu dizin çalýþmalarýna katkýda bulunduðunuz için teþekkürler.");
define_once("_SECURITYBROKEN","Güvenlik nedeniyle kullanýcý adý ve IP'niz geçici olarak kaydedilecek.");
define_once("_THANKSFORINFO","Bilgi için teþekkürler.");
define_once("_LOOKTOREQUEST","Ýsteðiniz kýsa süre içinde deðerlendirilecek.");
define_once("_SENDREQUEST","Ýstek Gönder");
define_once("_THANKSTOTAKETIME","Burada bir dosya puanladýðýnýz için teþekkürler:");
define_once("_RETURNTO","Geri Dön:");
define_once("_RATENOTE1","Lütfen bir kaynaðý bir kereden fazla oylamayýn.");
define_once("_RATENOTE2","Ölçü 1 - 10 arasýdýr, 1 zayýf ve 10 mükemmel.");
define_once("_RATENOTE3","Lütfen objektif olun, herkes 1 veya 10 alýrsa, puanlar kullanýþlý olamaz.");
define_once("_RATENOTE5","Kendi dosyanýzý oylamayýn.");
define_once("_YOUAREREGGED","Kayýtlý kullanýcýsýnýz ve giriþ yapmýþsýnýz.");
define_once("_FEELFREE2ADD","Bu site hakkýnda yorum ekleyebilirsiniz.");
define_once("_YOUARENOTREGGED","Kayýtlý deðilsiniz veya giriþ yapmamýþsýnýz.");
define_once("_IFYOUWEREREG","Kayýtlý olsaydýnýz dosya hakkýnda yorum yazabilecektiniz.");
define_once("_TITLE","Baþlýk");
define_once("_MODIFY","Deðiþtir");
define_once("_COMPLETEVOTE1","Oyunuz deðerlendirilmiþtir.");
define_once("_COMPLETEVOTE2","Son $anonwaitdays gün içinde zaten oyunuzu kullanmýþsýnýz.");
define_once("_COMPLETEVOTE3","Sadece bir kez oy kullanýn.<br>Tüm oylar keydedilir ve incelenir.");
define_once("_COMPLETEVOTE4","Kendi önerdiðiniz link için oy kullanamazsýnýz.<br>Tüm oylar keydedilir ve incelenir.");
define_once("_COMPLETEVOTE5","Puan seçilmemiþ - oy verilmedi");
define_once("_COMPLETEVOTE6","Her IP adresi $outsidewaitdays gün içinde sadece bir oy kullanabilir.");
define_once("_LINKSDATESTRING","%e-%m-%y");

