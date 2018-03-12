<?php
  include_once('menubar.php');

  if (isset($_SESSION['user'])){
    echo '<script type="text/javascript">window.location.href = "index.php";</script>';
  }



 ?>
 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title></title>
     <style media="screen">
     @import url('https://fonts.googleapis.com/css?family=Roboto+Condensed');
       form{
         padding: 20px 20px ;
         border:2px  ;
         border:2px solid black ;
         border-color: #989090 ;
         border-width: 5px;
         border-radius: 25px;
         /* margin:40px 250px 250px 250px; */
         margin: auto;
         margin-top: 40px ;
         width: 60%;
         font-family: 'Roboto Condensed', sans-serif;
         padding-left: 40px;
         padding-right: 40px ;
       }
       p{

         font-size: 20px;
         padding: 10px;

         /* margin: 0px 40px 0px 40px ; */
         margin: auto;
         width: 80%;
         padding-left: 40px;
         padding-right: 40px ;
         /* align-items: center ;
         text-align: center; */
       }
       h1{
         color: #F04D6A;
         /* padding-left: 30px; */
         /* background-color: white; */
         text-shadow:1px 2px 40px #FFFFFF ;
         margin-top: 3%;
         /* margin-right:85% ; */
         /* margin-left: 5%; */

         /* width: 100px; */
         /* position: relative; */
         /* animation-name: example; */
         /* animation-duration: 6s; */
       }
       body{
         background-color: #F1F1F1;
       }
       /* @keyframes example {

     0%   { left:0px; top:0px;}
     25%  {color:#F24664; left:200px; top:0px;}
     50%  { left:200px; top:0px;}
     75%  {color:#F24664; left:0px; top:0px;}
     100% {color:#404D5C; left:0px; top:0px;}
   } */
     </style>
   </head>
   <body>
     <center>

       <form method="get" action="phpSendMailGmail.php">
         <h1>Forgot Password</h1>
       <p>

       <div class="input-group input-group-sm mb-3">
         <div class="input-group-prepend">
           <span  class="input-group-text" id="inputGroup-sizing-sm"style="color:343A40 ; border-radius: 20px; font-size:16px ;background-color: #F1D9D9;border-radius: 20px;">Username</span>
         </div>

         <input type="text" style="border-radius: 20px;" name="username" placeholder="Enter your username" required value="" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
       </div>
        <input  style="" type="text" hidden name="type" value="forgotPassword">
       <br>
         <input  style="" type="submit" class="btn btn-info" name="submit" value="Submit" id="but">

        </p>

            <br>
        </form>

     </center>
   </body>
 </html>
