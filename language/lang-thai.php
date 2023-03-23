<?php
if(!isset($subscription_url)) $subscription_url = '';

/**************************************************************************/
/* PHP-NUKE: Advanced Content Management System                           */
/* ============================================                           */
/*                                                                        */
/* This is the language module with all the system messages               */
/*                                                                        */
/* If you made a translation, please sent to me (fburzi@gmail.com)        */
/* the translated file. Please keep the original text order by modules,   */
/* and just one message per line, also double check your translation!     */
/*                                                                        */
/* You need to change the second quoted phrase, not the capital one!      */
/*                                                                        */
/* If you need to use double quotes (") remember to add a backslash (\),  */
/* so your entry will look like: This is \"double quoted\" text.          */
/* And, if you use HTML code, please double check it.                     */
/**************************************************************************/

define_once("_CHARSET","windows-874");
define_once("_SEARCH","ค้นหา");
define_once("_LOGIN","เข้าสู่ระบบ");
define_once("_WRITES","บันทึก");
define_once("_POSTEDON","ติดประกาศ");
define_once("_NICKNAME","ชื่อเรียก");
define_once("_PASSWORD","รหัสผ่าน");
define_once("_WELCOMETO","ขอต้อนรับสู่");
define_once("_EDIT","แก้ไข");
define_once("_DELETE","ลบ");
define_once("_POSTEDBY","ผู้บันทึก");
define_once("_READS","คนอ่าน");
define_once("_GOBACK","[ <a href=\"javascript:history.go(-1)\">ย้อนกลับ</a> ]");
define_once("_COMMENTS","ข้อคิดเห็นต่างๆ");
define_once("_PASTARTICLES","บทความที่ผ่านมา");
define_once("_OLDERARTICLES","บทความเก่าๆ");
define_once("_BY","โดย");
define_once("_ON","เมื่อ");
define_once("_LOGOUT","ออกจากโปรแกรม");
define_once("_WAITINGCONT","เนื้อหารอการอนุมัติ");
define_once("_SUBMISSIONS","เรื่องที่ส่งเข้ามา");
define_once("_WREVIEWS","บทวิจารณ์ที่ส่งเข้ามา");
define_once("_WLINKS","ลิงก์ที่ส่งเข้ามา");
define_once("_EPHEMERIDS","เนื้อหาอัตโนมัติ");
define_once("_ONEDAY","วันนี้ในอดีต...");
define_once("_ASREGISTERED","ถ้าท่านยังไม่ได้เป็นสมาชิก? ท่านสามารถ <a href=\"modules.php?name=Your_Account\">สมัครได้ที่นี่</a> ในการเป็นสมาชิก ท่านจะได้ประโยชน์จากการตั้งค่าส่วนตัวต่างๆ เช่น ฉากหรือพื้นโปรแกรม ค่าอ่านความคิดเห็น และการแสดงความเห็นด้วยชื่อท่านเอง");
define_once("_MENUFOR","เมนูสำหรับ");
define_once("_NOBIGSTORY","ยังไม่มีข่าวใหญ่สำหรับวันนี้");
define_once("_BIGSTORY","เรื่องที่คนอ่านมากที่สุดคือ :");
define_once("_SURVEY","สำรวจความเห็น");
define_once("_POLLS","แบบสำรวจอื่นๆ");
define_once("_PCOMMENTS","คำแนะนำ:");
define_once("_RESULTS","ผลสำรวจ");
define_once("_HREADMORE","อ่านต่อ...");
define_once("_CURRENTLY","ขณะนี้มี ");
define_once("_GUESTS","บุคคลทั่วไป และ");
define_once("_MEMBERS","สมาชิกเข้าชม ");
define_once("_YOUARELOGGED","ท่านใช้ชื่อสมาชิกว่า");
define_once("_YOUHAVE","คุณมี");
define_once("_PRIVATEMSG","ข้อความใหม่");
define_once("_YOUAREANON","ท่านยังไม่ได้ลงทะเบียนเป็นสมาชิก หากท่านต้องการ กรุณาสมัครฟรีได้<a href=\"modules.php?name=Your_Account\">ที่นี่</a>");
define_once("_NOTE","หมายเหตุ:");
define_once("_ADMIN","ผู้ดูแลระบบ:");
define_once("_WERECEIVED","มีผู้เข้าเยี่ยมชม");
define_once("_PAGESVIEWS","คน ตั้งแต่");
define_once("_TOPIC","หัวข้อ");
define_once("_UDOWNLOADS","ดาวน์โหลด");
define_once("_VOTE","ลงคะแนน");
define_once("_VOTES","จำนวนผู้ลงคะแนน");
define_once("_MVIEWADMIN","แสดง: ผู้ดูแลระบบเท่านั้น");
define_once("_MVIEWUSERS","แสดง: ผู้สมัครสมาชิกเท่านั้น");
define_once("_MVIEWANON","แสดง: ผู้ไม่ประสงค์ออกนามเท่านั้น");
define_once("_MVIEWALL","แสดง: ทุกคน");
define_once("_EXPIRELESSHOUR","ยกเลิกใน 1 ชม.");
define_once("_EXPIREIN","ยกเลิกใน ");
define_once("_HTTPREFERERS","HTTP ที่ส่งผู้ชมเข้ามา");
define_once("_UNLIMITED","ตลอดชีพ");
define_once("_HOURS","ชั่วโมง");
define_once("_RSSPROBLEM","ขณะนี้มีปัญหาเรื่อง headlines จากเจ้าของเว็บ");
define_once("_SELECTLANGUAGE","โปรดเลือกภาษา");
define_once("_SELECTGUILANG","เลือกรูปแบบภาษา:");
define_once("_NONE","ไม่มี");
define_once("_BLOCKPROBLEM","<center>เมนูนี้มีปัญหา</center>");
define_once("_BLOCKPROBLEM2","<center>ยังไม่มีข้อมูล</center>");
define_once("_MODULENOTACTIVE","เสียใจโมดูลนี้ไม่ทำงาน!");
define_once("_NOACTIVEMODULES","โมดูลที่ยังไม่ได้นำมาใช้งาน");
define_once("_FORADMINTESTS","(สำหรับผู้ควบคุมระบบ)");
define_once("_BBFORUMS","กระดานข่าว");
define_once("_ACCESSDENIED", "ระงับการใช้งาน");
define_once("_RESTRICTEDAREA", "คุณพยายามที่จะใช้งานในที่ส่วนตัว");
define_once("_MODULEUSERS", "เสียใจส่วนนี้ของเว็บสำหรับ <i>สมาชิกเท่านั้น</i><br><br>คุณสามารถสมัครสมาชิกฟรีโดยคลิ๊ก<a href=\"modules.php?name=Your_Account&op=new_user\">ที่นี่</a>คุณถึงสามารถ<br>ใช้งานในส่วนนี้ได้ ขอบคุณ <br><br>");
define_once("_MODULESADMINS", "เสียใจส่วนนี้ของเว็บสำหรับ <i>ผู้ดูแลระบบเท่านั้น</i><br><br>");
define_once("_HOME","หน้าแรก");
define_once("_HOMEPROBLEM","ขณะนี้มีปัญหาใหญ่: เรายังไม่มีโฮมเพจ!!!");
define_once("_ADDAHOME","เพิ่มโมดูลในหน้าแรก");
define_once("_HOMEPROBLEMUSER","มีปัญหาเกิดขึ้นที่หน้าแรก กรุณากลับมาตรวจสอบอีกครั้ง");
define_once("_MORENEWS","More in News Section"); 
define_once("_ALLCATEGORIES","ทุกประเภท");
define_once("_DATESTRING","%A %d %b %y@ %T %Z"); 
define_once("_DATESTRING2","%A %d %b ");
define_once("_DATE","วัน");
define_once("_HOUR","ชั่วโมง");
define_once("_UMONTH","เดือน");
define_once("_YEAR","ปี");
define_once("_JANUARY","มกราคม");
define_once("_FEBRUARY","กุมภาพันธ์");
define_once("_MARCH","มีนาคม");
define_once("_APRIL","เมษายน");
define_once("_MAY","พฤษภาคม");
define_once("_JUNE","มิถุนายน");
define_once("_JULY","กรกฎาคม");
define_once("_AUGUST","สิงหาคม");
define_once("_SEPTEMBER","กันยายน");
define_once("_OCTOBER","ตุลาคม");
define_once("_NOVEMBER","พฤศจิกายน");
define_once("_DECEMBER","ธันวาคม");
define_once("_BWEL","สวัสดี");
define_once("_BPM","ข่าวสารส่วนตัว");
define_once("_BUNREAD","ยังไม่อ่าน");
define_once("_BREAD","อ่านแล้ว");
define_once("_BMEMP","ข้อมูลสมาชิก");
define_once("_BLATEST","สมาชิกคนล่าสุด");
define_once("_BTD","สมาชิกใหม่วันนี้");
define_once("_BYD","สมาชิกใหม่เมื่อวาน");
define_once("_BOVER","สมาชิกทั้งหมด");
define_once("_BVISIT","ผู้ที่กำลังใช้งานขณะนี้");
define_once("_BVIS","บุคคลทั่วไป");
define_once("_BMEM","สมาชิก");
define_once("_BTT","ทั้งหมด");
define_once("_BON","กำลังใช้งานขณะนี้");
define_once("_BREG","สมัครสมาชิก");
define_once("_BROADCAST","กระจายข่าวสารสาธารณะ");
define_once("_BROADCASTFROM","ข่าวสารสาธารณะจาก");
define_once("_TURNOFFMSG","ปิดข่าวสารสาธารณะ");
define_once("_JOURNAL","วรสาร");
define_once("_READMYJOURNAL","อ่านวรสารของเรา");
define_once("_ADD","เพิ่ม");
define_once("_YES","ใช่");
define_once("_NO","ไม่");
define_once("_INVISIBLEMODULES","โมดูลที่ไม่แสดง");
define_once("_ACTIVEBUTNOTSEE","(ทำงานแต่ไม่ปรากฏลิงก์)");
define_once("_THISISAUTOMATED","นี่คือ อีเมล์อัตโนมัติ ที่แจ้งให้คุณทราบถึงป้ายโฆษณาในไซต์ของเราที่หมดอายุ");
define_once("_THERESULTS","ผลของการทำงานของคุณมีดังนี้:");
define_once("_TOTALIMPRESSIONS","จำนวนคลิ๊กทั้งหมดที่กำหนด:");
define_once("_CLICKSRECEIVED","จำนวนคลิ๊กที่ได้รับ:");
define_once("_IMAGEURL","รูปภาพของ URL");
define_once("_CLICKURL","คลิ๊กของ URL:");
define_once("_ALTERNATETEXT","ข้อความอื่นๆ:");
define_once("_HOPEYOULIKED","หวังว่าท่านจะพอใจในบริการของเรา และทางเราปรารถนาให้ท่านเป็นลูกค้าของเราอีกในอนาคต");
define_once("_THANKSUPPORT","ขอบคุณที่ท่านให้การสนับสนุน");
define_once("_TEAM","ทีมงาน");
define_once("_BANNERSFINNISHED","ป้ายโฆษณาที่หมดอายุ");
define_once("_MODREQLINKS","คำขอแก้ไขลิงก์");
define_once("_BROKENLINKS","ลิงก์เสีย");
define_once("_MODREQDOWN","คำขอแก้ไขดาวน์โหลด");
define_once("_BROKENDOWN","ดาวน์โหลดเสีย");
define_once("_PAGEGENERATION","การสร้างหน้าเอกสาร:");
define_once("_SECONDS","วินาที");
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

