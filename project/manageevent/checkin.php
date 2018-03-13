
 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title></title>
   </head>
   <body>
     <?php
     include_once("../menubar.php");
     use Oop\Account;
     use Oop\Database;
     use Oop\Event;
     use Oop\Attendant;


     if (!isset($_GET['id_at'])){
       echo "<script type='text/javascript'>window.location.href = \"http://localhost/project/\";</script>";
     }

     $database = new Database();
     $attendant  = $database->loadAttendant($_GET['id_at']);
     $database->updateAttendant($attendant,'c');

     // echo "check in complete";
      ?>
     <style media="screen">
     @import url('https://fonts.googleapis.com/css?family=Roboto+Condensed');
       p{
         font-family: 'Roboto Condensed', sans-serif;
       }
       a:hover{
         background-color: red;
       }
       a{
         font-family: 'Roboto Condensed', sans-serif;
       }
       @keyframes example {


     0%   { left:0px; top:0px;}
     25%  {color:white; left:0px; top:40px;}
     50%  { left:0px; top:0px;}
     75%  { left:0px; top:40px; transform: rotateX(50deg)}
     100% { left:0px; top:0px;}
     }
     </style>
     <center>
       <br><br><br>
         <img src="/project/picture/img/check-circle.gif" width=20%;  >

         <p style=" font-size:35px ">Successfully</p>
         <p style=" font-size:20px">You checkin success</p>






   </center>

   </body>
 </html>
