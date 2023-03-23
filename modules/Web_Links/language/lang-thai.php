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
/* If you made a translation, please sent to me (fburzi@gmail.com)    */
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
define_once("_PREVIOUS","หน้าก่อน");
define_once("_NEXT","หน้าถัดไป");
define_once("_YOURNAME","ชื่อคุณ");
define_once("_CATEGORY","กลุ่ม");
define_once("_CATEGORIES","ประเภท");
define_once("_LVOTES","ผู้แสดงความเห็น");
define_once("_TOTALVOTES","ความเห็นทั้งหมด:");
define_once("_LINKTITLE","ชื่อลิงก์");
define_once("_HITS","จำนวนครั้งผู้อ่าน");
define_once("_THEREARE","ขณะนี้มีทั้งหมด");
define_once("_NOMATCHES","ไม่พบข้อมูลตรงตามเงื่อนไข");
define_once("_SCOMMENTS","ความเห็น");
define_once("_DESCRIPTION","รายละเอียด");
define_once("_DATE","วันที่");
define_once("_TO","ถึง");
define_once("_ADDLINK","เพิ่มลิงก์");
define_once("_NEW","ลิงก์มาใหม่");
define_once("_POPULAR","ลิงก์ยอดนิยม");
define_once("_TOPRATED","ลิงก์ที่คะแนนสูงสุด ");
define_once("_RANDOM","สุ่มโชว์ลิงก์ ");
define_once("_LINKSMAIN","หน้าลิงก์หลัก ");
define_once("_LINKCOMMENTS","ความเห็นต่อลิงก์");
define_once("_ADDITIONALDET","รายละเอียดเพิ่มเติม");
define_once("_EDITORREVIEW","ข้อมูลจากผู้เสนอแนะ");
define_once("_REPORTBROKEN","รายงานลิงก์เสีย");
define_once("_LINKSMAINCAT","ดัชนีลิงก์");
define_once("_AND","และ");
define_once("_INDB","ในฐานข้อมูลนี้");
define_once("_ADDALINK","เพิ่มลิงก์ใหม่");
define_once("_INSTRUCTIONS","คำแนะนำ");
define_once("_SUBMITONCE","ส่งแต่ละลิงก์  เพียงครั้งเดียว");
define_once("_POSTPENDING","ทุกลิงก์ จะต้องผ่านการตรวจสอบก่อนเผยแพร่");
define_once("_USERANDIP","ชื่อเรียก และ รหัสเครื่อง IP จะถูกบันทึกเพื่อป้องกันการกระทำที่ก่อให้เกิดความเสียหาย");
define_once("_PAGETITLE","ชื่อ");
define_once("_PAGEURL","URL");
define_once("_YOUREMAIL","อีเมล์");
define_once("_LDESCRIPTION","รายละเอียด: (ไม่เกิน 255 ตัวอักษร)");
define_once("_ADDURL","เพิ่ม URLนี้");
define_once("_LINKSNOTUSER1","คุณไม่ใช่สมาชิกที่ log in เข้าระบบ");
define_once("_LINKSNOTUSER2","ต้องเป็นสมาชิกที่จึงสามารถ เพิ่ม link เข้ามาได้");
define_once("_LINKSNOTUSER3","การจะเป็นสมาชิกนั้น ง่ายมาก");
define_once("_LINKSNOTUSER4","การที่ต้องให้เป็นสมาชิกเพื่อเข้าสู่บางระบบนั้น ");
define_once("_LINKSNOTUSER5","ก็เพื่อจะได้ข้อมูลที่มีคุณค่าสูงสุดจากสมาชิก");
define_once("_LINKSNOTUSER6","แต่ละรายการจะมีการพิจารณาโดยทีมงาน ");
define_once("_LINKSNOTUSER7","ด้วยความหวังว่าจะได้ข้อมูลที่มีค่า");
define_once("_LINKSNOTUSER8","<a href=\"modules.php?name=Your_Account\">สมัครสมาชิก</a>");
define_once("_LINKALREADYEXT","ผิดพลาด: URL นี้มีอยู่ในฐานข้อมูลแล้ว");
define_once("_LINKNOTITLE","ผิดพลาด: ท่านต้องพิมพ์ ชื่อ Page สำหรับ URL นี้! ");
define_once("_LINKNOURL","ผิดพลาด: ท่านต้องพิมพ์  URL สำหรับ URL นี้!");
define_once("_LINKNODESC","ผิดพลาด: ท่านต้องพิมพ์  รายละเอียดสำหรับ URL นี้!!");
define_once("_LINKRECEIVED","เราได้รับลิงก์ ที่ท่านส่งมาแล้ว ขอบคุณมาก!");
define_once("_EMAILWHENADD","ท่านจะได้รับ อีเมล์ เมื่อผ่านการอนุมัติ");
define_once("_CHECKFORIT","ท่านไม่ได้ระบุ อีเมล์ อย่างไรก็ตาม  เราจะทำการตรวจสอบลิงก์ที่เสนอมา ในภายหลัง");
define_once("_NEWLINKS","ลิงก์มาใหม่");
define_once("_TOTALNEWLINKS"," ที่มาใหม่ทั้งหมด");
define_once("_LASTWEEK","ช่วงสัปดาห์ที่แล้ว");
define_once("_LAST30DAYS","ช่วง 30 วันที่ผ่านมา ");
define_once("_1WEEK","1 สัปดาห์");
define_once("_2WEEKS","2 สัปดาห์");
define_once("_30DAYS","30 วัน");
define_once("_SHOW","แสดง");
define_once("_TOTALFORLAST","ลิงก์มาใหม่ทั้งหมดใน");
define_once("_DAYS","วัน");
define_once("_ADDEDON","เพิ่มเมื่อ");
define_once("_RATING","คะแนน");
define_once("_RATESITE","ให้คะแนน");
define_once("_DETAILS","รายละเอียด");
define_once("_BESTRATED","ที่คะแนนสูงที่สุด - Top");
define_once("_OF","ของ");
define_once("_TRATEDLINKS","ลิงก์ทั้งหมดที่ได้คะแนน");
define_once("_TVOTESREQ","(จำนวนโหวตอย่างต่ำ) ");
define_once("_SHOWTOP","แสดงจากจำนวน ");
define_once("_MOSTPOPULAR","ที่ได้รับความนิยมสุด  - Top");
define_once("_OFALL","ของทั้งหมด");
define_once("_SORTLINKSBY"," เรียงลำดับตาม");
define_once("_SITESSORTED","เว็บเหล่านี้เรียงตาม ");
define_once("_POPULARITY","ความนิยม");
define_once("_SELECTPAGE","เลือกหน้า");
define_once("_MAIN","หน้าแรก");
define_once("_NEWTODAY","ใหม่สำหรับวันนี้ ");
define_once("_NEWLAST3DAYS","ใหม่ช่วง 3 วัน");
define_once("_NEWTHISWEEK","ใหม่สัปดาห์นี้");
define_once("_CATNEWTODAY","์ใหม่ในกลุ่มนี้เพิ่มวันนี้");
define_once("_CATLAST3DAYS","์ใหม่ในกลุ่มนี้เพิ่มเมื่อ 3 วันก่อน");
define_once("_CATTHISWEEK","ใหม่ในกลุ่มนี้เพิ่มในสัปดาห์นี้");
define_once("_POPULARITY1","ความนิยม (น้อยไปมาก)");
define_once("_POPULARITY2","ความนิยม(มากไปน้อย)");
define_once("_TITLEAZ","ชื่อ (A ถึง Z)");
define_once("_TITLEZA","ชื่อ (Z ถึง A)");
define_once("_DATE1","วัน (เก่ามาก่อน)");
define_once("_DATE2","วัน (ใหม่มาก่อน)");
define_once("_RATING1","คะแนน (น้อยไปมาก)");
define_once("_RATING2","คะแนน (มากไปน้อย)");
define_once("_SEARCHRESULTS4","ค้นหาข้อมูลสำหรับ");
define_once("_USUBCATEGORIES","หมวดย่อย");
define_once("_LINKS","ลิงก์");
define_once("_TRY2SEARCH","ค้นหา");
define_once("_INOTHERSENGINES","ในเครื่องมือค้นหาอื่น");
define_once("_EDITORIAL","ผู้เสนอแนะ");
define_once("_LINKPROFILE","ข้อมูลทั่วไป");
define_once("_EDITORIALBY","เสนอแนะโดย");
define_once("_NOEDITORIAL","ไม่มีผู้เสนอแนะ");
define_once("_VISITTHISSITE","ไปเว็บนี้");
define_once("_RATETHISSITE","ให้คะแนนเว็บนี้");
define_once("_ISTHISYOURSITE","ข้อมูลเพิ่มเติม?");
define_once("_ALLOWTORATE","อนุญาตให้ผู้อื่นให้คะแนนจากเว็บคุณ!");
define_once("_LINKRATINGDET","รายละเอียดคะแนน");
define_once("_OVERALLRATING","คะแนนโดยรวม");
define_once("_TOTALOF","ทั้งหมด");
define_once("_USER","สมาชิก");
define_once("_USERAVGRATING","คะแนนเฉลี่ยของสมาชิก");
define_once("_NUMRATINGS","# ของคะแนน");
define_once("_EDITTHISLINK","แก้ไขลิงก์");
define_once("_REGISTEREDUSERS","สมาชิก");
define_once("_NUMBEROFRATINGS","โหวต(คน)");
define_once("_NOREGUSERSVOTES","ไม่มีสมาชิกลงคะแนน");
define_once("_BREAKDOWNBYVAL","กราฟแสดงการลงคะแนน");
define_once("_LTOTALVOTES","คะแนนทั้งหมด");
define_once("_LINKRATING","คะแนนเฉลี่ย");
define_once("_HIGHRATING","คะแนนสูงสุด");
define_once("_LOWRATING","คะแนนต่ำสุด");
define_once("_NUMOFCOMMENTS","จำนวนข้อเสนอแนะ");
define_once("_WEIGHNOTE","* หมายเหตุ: เว็บนี้ให้น้ำหนักต่างกันระหว่างสมาชิก vs. ผู้ใช้ทั่วไปในการให้คะแนน");
define_once("_NOUNREGUSERSVOTES","ไม่มีผู้ใช้ทั่วไปลงคะแนน");
define_once("_WEIGHOUTNOTE","* หมายเหตุ: เว็บนี้ให้น้ำหนักต่างกันระหว่างสมาชิก vs. การให้คะแนนจากภายนอก");
define_once("_NOOUTSIDEVOTES","ไม่มีลงคะแนนจากภายนอก");
define_once("_OUTSIDEVOTERS","ลงคะแนนจากภายนอก");
define_once("_UNREGISTEREDUSERS","ผู้ใช้ทั่วไป");
define_once("_PROMOTEYOURSITE","ประชาสัมพันธ์เว็บคุณ");
define_once("_PROMOTE01","มีหลายวิธีในการเพิ่มคะแนนของเว็บ โดยอนุญาตให้คุณใส่รูปบนเว็บคุณเพื่อเพิ่มจำนวนคะแนน กรุณาเลือกจากส่วนข้างล่างนี้:");
define_once("_TEXTLINK","ลิงก์ข้อความ");
define_once("_PROMOTE02","ทางหนึ่งที่จะลิงก์ไป rating form โดยลิงก์ข้อความ:");
define_once("_HTMLCODE1","ใช้ HTML คุณสามารถใช้ในกรณีนี้ดังนี้:");
define_once("_THENUMBER","จำนวน");
define_once("_IDREFER","ใน HTML ที่อ้างอิงถึงคือรหัสของเว็บคุณในฐานข้อมูลของ $sitename จะต้องตรงกัน");
define_once("_BUTTONLINK","ปุ่มลิงก์");
define_once("_PROMOTE03","ถ้าคุณมองหาอะไรที่ดีกว่างลิงก์ข้อความ คุณอาจจะใช้ปุ่มลิงก์:");
define_once("_RATEIT","ให้คะแนนเว็บนี้!");
define_once("_HTMLCODE2","source code สำหรับปุ่มนี้:");
define_once("_REMOTEFORM","แบบฟอร์มการให้คะแนนแบบ Remote");
define_once("_PROMOTE04","ถ้าคุณโกง จะทำการย้ายลิงก์คุณออก");
define_once("_VOTE4THISSITE","ให้คะแนนเว็บนี้!");
define_once("_LINKVOTE","ลงคะแนน!");
define_once("_HTMLCODE3","ใช้แบบฟอร์มนี้จะอนุญาตให้สมาชิกให้คะแนนเว็บคุณโดยตรงและจะบันทึกทันที โดยคุณจะต้องตัดแปะ source code ไปไว้ในเว็บของคุณโดย source code จะอยู่ข้างล่าง:");
define_once("_PROMOTE05","ขอบคุณ! และขอให้โชคดี!");
define_once("_STAFF","ทีมงาน");
define_once("_THANKSBROKEN","ขอบคุณที่ช่วยดูแลระบบ");
define_once("_THANKSFORINFO","ขอบคุณสำหรับข้อมูลของท่าน");
define_once("_LOOKTOREQUEST","เราจะพิจารณาแก้ไขอย่างรวดเร็ว");
define_once("_ONLYREGUSERSMODIFY","เฉพาะสมาชิกที่สามารถแนะนำการแก้ไขลิงก์กรุณา<a href=\"modules.php?name=Your_Account\">สมัครสมาชิก/เข้าระบบ</a>");
define_once("_REQUESTLINKMOD","แก้ไขคำขอลิงก์");
define_once("_LINKID","รหัสลิงก์");
define_once("_SENDREQUEST","ส่งคำขอ");
define_once("_THANKSTOTAKETIME","ขอบคุณสำหรับการให้คะแนนเว็บที่นี่");
define_once("_LETSDECIDE","การกรอกแบบฟอร์มของคุณจะช่วยให้ผู้อื่นตัดสินใจได้ดีขึ้นว่าควรจะเข้าไปลิงก์ที่ไหนดี");
define_once("_RETURNTO","กลับไปที่");
define_once("_RATENOTE1","กรุณาอย่าให้คะแนนที่เดียวมากกว่า 1 ครั้ง");
define_once("_RATENOTE2","คะแนนจะอยู่ระหว่าง 1 - 10 (1-แย่ ,10-เจ๋ง)");
define_once("_RATENOTE3","กรุณาให้คะแนนตามจริงถ้าทุกคนให้คะแนน 1 หรือ 10 ระดับคะแนนก็ไม่มีประโยชน์");
define_once("_RATENOTE4","คุณสามารถดู <a href=\"modules.php?op=modload&name=Web_Links&file=index&l_op=TopRated\">ลิงก์คะแนนสูงสุด</a>");
define_once("_RATENOTE5","อย่าลงคะแนนให้พรรคพวกของคุณ");
define_once("_YOUAREREGGED","คุณต้องเป็นสมาชิกและกำลังอยู่ในระบบ");
define_once("_FEELFREE2ADD","แสดงความคิดเห็นได้");
define_once("_YOUARENOTREGGED","คุณยังไม่ได้สมัครสมาชิกหรือยังไม่เข้าระบบ");
define_once("_IFYOUWEREREG","ถ้าคุณสมัครสมาชิกคุณสามารถส่งข้อเสนอแนะในเว็บนี้ได้");
define_once("_WEBLINKS","เว็บลิงก์");
define_once("_TITLE","ชื่อ");
define_once("_MODIFY","ปรับปรุงแก้ไข");
define_once("_COMPLETEVOTE1","ได้รับการลงคะแนนของคุณแล้ว");
define_once("_COMPLETEVOTE2","คุณได้ลงคะแนนเมื่อ $anonwaitdays วันที่ผ่านมา");
define_once("_COMPLETEVOTE3","ลงคะแนนได้ครั้งเดียว");
define_once("_COMPLETEVOTE4","ไม่สามารถลงคะแนนในลิงก์ที่คุณส่งมา");
define_once("_COMPLETEVOTE5","ไม่จัดอันดับ");
define_once("_COMPLETEVOTE6","ลงคะแนนได้ครั้งเดียวต่อ 1 IP  ลงคะแนนได้ในอีก $outsidewaitdays วัน");
define_once("_LINKSDATESTRING","%d-%b -%Y"); 

