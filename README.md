<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
</head>
<body>
<h1>Project Webtech(The Event)</h1>
<p>By Surat Event</p>
====================================================
<h3>โครงสร้าง Directory ของ Project</h3>
--------------------------------------------------
<h3>ขั้นตอนการติดตั้งและวิธีการทำงาน</h3>
--------------------------------------------------
<h1>ขั้นตอนการติดตั้ง</h1>
<p>1. Download file จาก github แล้วทำการแตกไฟล์และนำไปวางไว้ที่ :C-->xampp-->htdocs โดยให้แยกไฟล์ออกมาเป็น Folder ชื่อ project </p>
<p>2. นำ File ที่อยู่ใน Folder project-->projcet.sql เพื่อ ้สร้าง Database ที่ชื่อ project แล้วเลือก Collation เป็น UTF-8-general-ci</p>
<p>3.หลังจากนั้นให้กด import file project.sql มาลงใน Surat Garden ใน localhost/phpMyadmin</p>

<h1>ขั้นตอนการ database configuration</h1>
<p>1.เพิ่ม privileges ให้กับ user ใน phpMyadmin โดยเข้าไปที่ projcet-->privileges</P>
<p>2.เลือก  Add user account </p>
<p>3.ใส่ username:admin </p>
<p>4.ใส่ host name เลือก localhost</p>
<p>5.ใส่ password:admin1234</p>
<p>6.ใส่ Re-type:admin1234</P>
<p>7.เลือก checkall global privileges</p>
<p>8.click go</p>
<p>9.เข้าไปืที่ :C-->xampp-->php--> เปิด php.ini </p>
<p>10.กด ctrl+f(command+f) หา upload_max_filesize:แก้เป็น100mb</p>
<p>11.กด ctrl+f(command+f) หา post_max_size:แก้เป็น100mb</p>
<br>


<h3>เริ่มการทำงาน</h3>
--------------------------------------------------
<p>1.เปิดโปรแกรม xampp จากนั้นเปิด server ของ Apache และ MySQL </p>
<p>2.เปิด Web browser ขึ้นมา ใส่ URL เป็น localhost/project/index.php   หรือใส่แค่ localhost แล้วคลิกเลือก Folder ที่คุณต้องการ </p>
<p>3.หลังจากนั้นหน้าเว็บ The Event จะแเสดงขึ้นมาอยู่บน Web browser ของคุณแล้วเริ่มการใช้งานได้อย่างปกติ</p>
<br>


<h3>การทำงาน user </h3>
--------------------------------------------------
<p>1.Web Event คุณสามารถทำการ regis ได้ 2แบบ คือ organiztion กับ attendant หรือถ้าคุณมี user อยู่แล้วคุณสามารถทำการ login ได้เลย</p>
<p>2.ในการทำงานจะมีรูปแบบ user หลายรูปแบบ
  <p style="margin-left:5px"> 2.1 การทำงานในหน้า Admin จะสามารถทำงานได้โดยสามารถควบคุมทุกอย่างได้หมด โดยจะสามารถลบeventหรือสร้างตารางที่ไม่ถูกต้องตามกฎได้ สามารถจัดการ Username กับ  Attendant ที่อยู่ในระบบได้ ,เข้าร่วม event และแก้ไขทุกอย่างในระบบได้</p>
  <p style="margin-left:5px"> 2.2 การทำงานในหน้า Organization จะสามารถสร้าง event และดู event ทั่วไปได้และสามารถเข้าร่วม event อื่นได้ด้วย สามารถสร้างหรือตอบ Webboard ได้ และยังสามารถจัดการ attendant ที่มาร่วม event ที่สร้างขึ้นได้</p>
  <p style="margin-left:5px"> 2.3 การทำงานในหน้า Attendant สามารถเข้าร่วม event ค้นหา ตอบ Webboard และยกเลิกได้กรณีที่ organization ยังไม่กดยอมรับ แต่ไม่สามารถสร้าง event ได้ </p>
  <p style="margin-left:5px"> 2.4 การทำงานในหน้า Guest(ในรูปแบบของ Guest คือเป็นผู้ใช้ปกติทั่วไปที่ไม่ต้องจำเป็นต้องสมัครสมาชิก และ login เข้ามา)จะมาสามารถดูและค้นหา Event ได้เพียงอย่างเดียว</p>


<br>
<h3>การสมัครสมาชิก</h3>
--------------------------------------------------
<p>1.Web Event คุณสามารถทำการสมัครสมาชิกได้ 2 แบบคือ Organiztion และ Attendant หรือถ้าคุณมี user อยู่แล้วคุณสามารถทำการ login ได้เลย
<p>2.เมือสมัครสมาชิกต้องทำการ ยืนยันตัวตนผ่าน E-mail เพื่อความปลอดภัย หลังจากนั้นคุณจะสามารถเข้าร่วม event และสร้าง event ได้
<br>
<h3>สิ่งที่webสามารถทำงานได้</h3>
--------------------------------------------------
<p>1.สามารถสร้างeventได้ลบได้แก้ไขeventได้</p>
<p>2.สามารถพูดคุยในeventได้</p>
<p>3.สามารถใส่แบบสอบถามได้โดยเว็บได้แปลงเป็นQR code</p>
<p>4.มี QR code ในการยืนยันการเข้างาน</p>
<br>
<h3>Status ต่างๆ</h3>
--------------------------------------------------
<p>1.status accounts not verify email(n)=ไม่ได้ยืนยันEmail verify email(y)=ยืนยันEmailแล้ว baned(b)=ถูกแบน</p>
<p>2.status events y=ยังมีeventอยู่ n=eventได้ถูกลบไปแล้ว</p>
<p>3.status attendans wait accept(n)=ยังไม่ได้รับการยืนยันจากผู้สร้างหรือไม่ผ่านเงื่อนไข  wait refund=รอรับเงินคืน join(y)=ได้เข้าร่วม refunded=ได้รับเงินคืน checkin=เช็คอิน</p>
ิ<br>
<h3>ไฟล์ที่รองรับการอัพ</h3>
<p>video ที่รองรับ mp4,ogg </p>
<p>image ที่รองรับ jpg,png</p>
--------------------------------------------------
<p>manageattendant ตัวจัดการผู้เข้าร่วม</p>
<p>manageevent ตัวจัดการ events</p>
<p>manageuser ตัวจัดการผู้ใช้</p>
<p>picture เก็บรวบรวมรูปภาพที่ใช้</p>
<p>project ตรวจสอบผู้ใช้ในระบบ</p>
<p>src ทำหน้าที่เก็บ class ควบคุมการทำงาน</p>
<p>tcpdf ใช้สร้างไฟล์ข้อมูล pdf</p>
<p>addpage เพิ่มหน้า page</p>
<p>changePassword เป็น class ใช้เปลี่ยน password</p>
<p>comment ใช้แสดงความคิดเห็น</p>
<p>createEvent เป็น class ที่ใช้สร้าง event</p>
<p>deleteComment เป็น class ที่ใช้ลบ comment</p>
<p>editprofile เป็น class ที่ใช้แก้ไขโปรไฟล์</p>
<p>forgotPassword เป็น class สำหรับผู้ใช้ในกรณีลืมรหัสผ่าน</p>
<p>index หน้าแรกของระบบ</p>
<p>login เป็น class ที่ใช้ในการเข้าสู่ระบบ</p>
<p>logout เป็น class ที่ใช้ในการลงชื่อออกจากระบบ</p>
<p>menubar ปุ่มควบคุมการทำงานต่างๆ</p>
<p>newPassword เป็น class ในการส่ง password ใหม่</p>
<p>page หน้าแสดง event</p>
<p>phpSendMailGmail เป็น class ที่ใช้ในการส่งเมล</p>
<p>profile เป็น class ที่แสดงประวัติส่วนตัวผู้ใช้</p>
<p>qrCode ใช้ในการตรวจสอบผู้ใช้ด้วย QRcode</p>
<p>regis ใช้ในการสมัครสมาชิก</p>

</body>
</html>
