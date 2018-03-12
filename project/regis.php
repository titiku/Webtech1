<!DOCTYPE html>
<?php include("menubar.php");

require 'vendor/autoload.php';
use Oop\Database;
  use Oop\Account;
?>
<?php
$username="";
$password="";
$first_name="";
$last_name="";
$age="";
$gender="";
$email="";
$phone="";
$address="";
$id="";
$type="";
$image="/project/picture/img/icon.png";





      if(isset($_POST["username"])){
        $username = $_POST["username"];
      }

      if(isset($_POST["password"])){
        $password = $_POST["password"];
      }
      if(isset($_POST["first_name"])){
        $first_name = $_POST["first_name"];
      }
      if(isset($_POST["last_name"])){
        $last_name = $_POST["last_name"];
      }
      if(isset($_POST["age"])){
        $age = $_POST["age"];
      }
      if(isset($_POST["gender"])){
        $gender = $_POST["gender"];
      }

      if(isset($_POST["email"])){
        $email = $_POST["email"];
      }
      if(isset($_POST["phone"])){
        $phone = $_POST["phone"];
      }
      if(isset($_POST["address"])){
        $address = $_POST["address"];
      }
      if(isset($_POST["id"])){
        $id = $_POST["id"];
      }
      if(isset($_POST["type"])){
      $type = $_POST["type"];
      }


      if(isset($_POST["username"])){
        $db=new Database();
        $users=$db->loadAccounts();
        $same = 0;

        foreach ($users as $user) {
          if ($user->getUsername() == $_POST["username"]){
            $same=1;
            break;
          }
        }

        if ($same == 0){
          $passhash=password_hash($password, PASSWORD_DEFAULT);
          $user = new Account(0,$username,$passhash,$first_name,$last_name,$age,$gender,$email,$phone,$address,$id,$type,$image,'n');
          $db->addAccounts($user);

           echo '<script type="text/javascript">window.location.href = "http://localhost/project/phpSendMailGmail.php?email='.$email."&username=".$username.'&type=regis";</script>';
        } else {
          echo '<script>alert("Your username have already");</script>';
        }

        }
?>


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
        margin-right:85% ;
        margin-left: 5%;

        width: 100px;
        position: relative;
        animation-name: example;
        animation-duration: 6s;
      }
      body{
        background-color: #F1F1F1;
      }
      @keyframes example {

    0%   { left:0px; top:0px;}
    25%  {color:#F24664; left:200px; top:0px;}
    50%  { left:200px; top:0px;}
    75%  {color:#F24664; left:0px; top:0px;}
    100% {color:#404D5C; left:0px; top:0px;}
  }
    </style>
  </head>

  <body>



    <form method="post" >
      <img src="/project/picture/img/register.gif" width=30%; >

    <p>
    <div class="input-group input-group-sm mb-3" >
      <div class="input-group-prepend">
        <span class="input-group-text" id="inputGroup-sizing-sm" style="color:343A40 ;  font-size:16px ;background-color: #F1D9D9;border-radius: 20px;">Username</span>
      </div>

      <input onblur="" style="border-radius: 20px;" type="text"  name="username" placeholder="Enter your username" required value="<?php if(isset($_POST["username"])){echo $_POST["username"];} ?>"
      class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
    </div>

    <div class="input-group input-group-sm mb-3">
      <div class="input-group-prepend">
        <span  class="input-group-text" id="inputGroup-sizing-sm"style="color:343A40 ; border-radius: 20px; font-size:16px ;background-color: #F1D9D9;border-radius: 20px;">Password</span>
      </div>

      <input type="password" style="border-radius: 20px;" name="password" placeholder="Enter your password" required value="<?php if(isset($_POST["password"])){echo $_POST["password"];} ?>" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
    </div>

    <div class="input-group input-group-sm mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text" id="inputGroup-sizing-sm"style="color:343A40 ;  font-size:16px ;background-color: #F1D9D9;border-radius: 20px;">Name</span>
      </div>
      <input style="border-radius: 20px;" type="text" name="first_name" placeholder="Enter your name" required value="<?php if(isset($_POST["first_name"])){echo $_POST["first_name"];} ?>"  class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">

    </div>

    <div class="input-group input-group-sm mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text" id="inputGroup-sizing-sm" style="color:343A40 ;  font-size:16px ;background-color: #F1D9D9;;border-radius: 20px;">Surname</span>
      </div>
      <input type="text" name="last_name" placeholder="Enter your surname" required value="<?php if(isset($_POST["last_name"])){echo $_POST["last_name"];} ?>" style="border-radius: 20px;" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">

    </div>

    <div class="input-group input-group-sm mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text" id="inputGroup-sizing-sm"style="color:343A40 ;  font-size:16px ;background-color: #F1D9D9;border-radius: 20px;">Age</span>
      </div>
      <input type="number" style="border-radius: 20px;" name="age" placeholder="Enter your age" min="1" max="999"  data-format = "iii" required value="<?php if(isset($_POST["age"])){echo $_POST["age"];} ?>" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">

    </div>

    <div class="input-group input-group-sm mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text" id="inputGroup-sizing-sm"style="color:343A40 ;  font-size:16px ;background-color: #F1D9D9;border-radius: 20px;">Gender</span>
      </div>
      <input id="male" type="radio" style="border-radius: 20px;" name="gender" value="male" checked="checked" > Male <input id="female" type="radio" name="gender" value="female">  Female

    </div>

    <div class="input-group input-group-sm mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text" id="inputGroup-sizing-sm"style="color:343A40 ;  font-size:16px ;background-color: #F1D9D9;border-radius: 20px;">E-mail</span>
      </div>
       <input type="email" name="email" style="border-radius: 20px;" placeholder="Enter your E-Mail" value="<?php if(isset($_POST["email"])){echo $_POST["email"];} ?>" required value="" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">

    </div>

    <div class="input-group input-group-sm mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text" id="inputGroup-sizing-sm" style="color:343A40 ;  font-size:16px ;background-color: #F1D9D9;border-radius: 20px;">Contact</span>
      </div>
      <input type="text" name="phone" style="border-radius: 20px;" placeholder="Enter your phone-number" minlength="9" maxlength="10" required value="<?php if(isset($_POST["phone"])){echo $_POST["phone"];} ?>" onKeyUp="if(this.value*1!=this.value) this.value='' ;" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">

    </div>

    <div class="input-group input-group-sm mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text" id="inputGroup-sizing-sm" style="color:343A40 ;  font-size:16px ;background-color: #F1D9D9;border-radius: 20px;">Address</span>
      </div>
      <input type="text" name="address" style="border-radius: 20px;" value="<?php if(isset($_POST["address"])){echo $_POST["address"];} ?>"  placeholder="Enter your location" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">

    </div>

    <div class="input-group input-group-sm mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text" id="inputGroup-sizing-sm" style="color:343A40 ;  font-size:16px ;background-color: #F1D9D9;border-radius: 20px;">ID card </span>
      </div>
      <input type="text" name="id" style="border-radius: 20px;" placeholder="Enter your ID-number" onKeyUp="if(this.value*1!=this.value) this.value='' ;"  minlength = "13" maxlength = "13" data-format = "ddddddddddddd" required  value="<?php if(isset($_POST["id"])){echo $_POST["id"];} ?>" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">

    </div>
    </p>


      Role
        <select name="type">
            <option id='organizer' value="organizer">Organizer</option>
            <option id='attendant' value="attendant">Attendant</option>
          </select>

      <br>

      <input  style="margin-left:85%" type="submit" class="btn btn-info" name="submit" value="Accept" id="but">
     </p>

         <br>
     </form>

     <?php
     if(isset($_POST["gender"])){
       if ($_POST["gender"] == 'male'){
         echo '<script type="text/javascript">
          document.getElementById("male").checked = true;
         </script>';
       } else {
         echo '<script type="text/javascript">
          document.getElementById("female").checked = true;
         </script>';
       }

     }

     if(isset($_POST["type"])){
       if ($_POST["type"] == 'organizer'){
         echo '<script type="text/javascript">
          document.getElementById("organizer").selected = true;
         </script>';
       } else {
         echo '<script type="text/javascript">
          document.getElementById("attendant").selected = true;
         </script>';
       }

     }
     ?>


  </body>
</html>
