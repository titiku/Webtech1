<?php
include_once('menubar.php');
use Oop\Database;

if (isset($_SESSION['user'])){
  $user=$_SESSION['user'];
} else {
  echo '<script type="text/javascript">window.location.href = "index.php";</script>';
}

if (isset($_POST['username']) && isset($_POST['old_password']) && isset($_POST['new_password']) && isset($_POST['re-new_password'])){

  $database = new Database();

  if ($database->checkUsernameAndPassword($_POST['username'],$_POST['old_password']) == "wrong" || $_POST['new_password'] != $_POST['re-new_password']){
    echo '<script>alert("Your password is incorrect.");</script>';
  } else {
    $passhash=password_hash($_POST['new_password'], PASSWORD_DEFAULT);
    $database->changePassword($_POST['username'],$passhash);
    echo '<script>alert("Change your password is success.");</script>';
    echo '<script type="text/javascript">window.location.href = "logout.php";</script>';
  }
}

  // date_default_timezone_set('Asia/Bangkok');
  // $date = date("Y-m-d");
  // $time = date("H:i:s");
  // $comment = new Comment(0,$_POST['id_ac'],$_POST['id_ev'],$_POST['comment'],$date,$time);
  // $database->addComment($comment);
  // echo '<script type="text/javascript">window.location.href = ".php?id_ev='.$_POST['id_ev'].'";</script>';

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

       <form method="post" action="">
         <h1>Change Password</h1>
       <p>
         <div class="input-group input-group-sm mb-3">
           <div class="input-group-prepend">
             <span  class="input-group-text" id="inputGroup-sizing-sm"style="color:343A40 ; border-radius: 20px; font-size:16px ;background-color: #F1D9D9;border-radius: 20px;">Old Password</span>
           </div>

           <input type="password" style="border-radius: 20px;" name="old_password" placeholder="Enter your old password" required value="" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
         </div>

       <div class="input-group input-group-sm mb-3">
         <div class="input-group-prepend">
           <span  class="input-group-text" id="inputGroup-sizing-sm"style="color:343A40 ; border-radius: 20px; font-size:16px ;background-color: #F1D9D9;border-radius: 20px;">New Password</span>
         </div>

         <input type="password" style="border-radius: 20px;" name="new_password" placeholder="Enter your new password" required value="" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
       </div>

       <div class="input-group input-group-sm mb-3">
         <div class="input-group-prepend">
           <span class="input-group-text" id="inputGroup-sizing-sm"style="color:343A40 ;  font-size:16px ;background-color: #F1D9D9;border-radius: 20px;">Re-New Password</span>
         </div>
         <input style="border-radius: 20px;" type="password" name="re-new_password" placeholder="Enter your re-new password" required value=""  class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">

       </div>
       <br>
       <input type="text" hidden name="username" value="<?php if (isset($_SESSION['user'])){echo $_SESSION['user']->getUsername();} ?>">
      <input type="submit" class="btn btn-info" name="submit" value="Submit" id="but">



        </p>

            <br>
        </form>

     </center>
   </body>
 </html>
