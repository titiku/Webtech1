<?php
  include_once("menubar.php");
  require 'vendor/autoload.php';
  use Oop\Account;
  use Oop\Database;

  if(!isset($_SESSION)){
      session_start();
  }

  $username="";
  $password="";
?>

<?php
    if(isset($_POST["username"])){
      $username = $_POST["username"];
    }

    if(isset($_POST["password"])){
      $password = $_POST["password"];
    }

    // echo "$password";
    echo "<br>";
    if(password_verify('1234', '$2y$10$VhjJhitVLbR4Hp1C2bPEw.mWxhbm0ONsOAjTBgm/F/KZuXmRlQOVG')){
      // echo "true";
    }else{
      // echo "false";
    }

    if ($username!="" && $password!=""){
      $db=new Database();

      if ($db->checkUsernameAndPassword($username,$password)!="wrong" && $db->checkUsernameAndPassword($username,$password)->getStatus()!='b'){

          $_SESSION['user']=$db->checkUsernameAndPassword($username,$password);
          if (isset($_GET['id_ev'])){
            echo '<script type="text/javascript">window.location.href = "http://localhost/project/page.php?id_ev='.$_GET['id_ev'].'";</script>';
          } else {
            echo "<script type='text/javascript'>window.location.href = \"http://localhost/project\";</script>";
          }
      } else {
          if ($db->checkUsernameAndPassword($username,$password)=='wrong'){
              echo '<script>alert("Your username or password is incorrect.");</script>';
          }else{
            echo '<script>alert("Your account has been suspended.");</script>';
          }
      }

    }

 ?>

<!DOCTYPE html>
<html>
  <head>

    <meta charset="utf-8">
    <title></title>
    <style media="screen">

    @import url('https://fonts.googleapis.com/css?family=Roboto+Condensed');
       body{
         /* background-color: #F1F1F1; */
           align-items: center;
             /* background-image: url("/project/picture/img/gray2.jpg"); */
         /* background-image: url("HomeBg.jpg"); */
       }
      form{
        padding: 10px 10px ;
        border:2px  ;
        border:2px solid black ;
        border-color: #989090 ;
        border-width: 5px;
        border-radius: 25px;

        /* padding-top: 40px; */
        margin:auto;
          margin-top: 40px ;
        width: 60%;

        font-family: 'Roboto Condensed', sans-serif;
        text-align: center;
        align-items: center;


      }

      h1.login{
        margin-left: 42% ;
      }
      h1.id{
        font-size: 20px;
        padding: 10px;
        /* padding-left: 40px; */
        /* padding-right: 40px ; */
        /* margin: 0px 40px 0px 40px ; */
        margin: auto;
        width: 60%;
        align-items: center ;
        text-align: center;


        /* margin-left: 35% ; */
      }



      h1.ac{
        /* margin-right: 20px; */
        font-size: 20px;
      }

    </style>
  </head>
  <body id="main"  >

  <form  method="post" style="background-color: #F1F1F1;">
      <br>
      <img src="picture/img/id2.png" width="150" Heigh="150" style="">

      <!-- <h1 class='id'>ID  <input class="input-group input-group-sm mb-3" type="text" name="username" value=""><br></h1> -->
      <h1 class='id'>
      <div class="input-group input-group-sm mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroup-sizing-sm" style="background-color: #343A40; color: white;">ID</span>
        </div>
        <input type="text"  name="username" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
      </div>
    </h1>

    <h1 class='id'>
    <div class="input-group input-group-sm mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text" id="inputGroup-sizing-sm" style="background-color: #343A40; color: white;">Password</span>
      </div>
      <input type="password"  name="password" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" >
    </div>
  </h1>


      <!-- <h1 class="pw">Password  <input class="form-control" type="text" name="password" value=""><br></h1> -->
      <h1 class="ac"><center><input class="btn btn-info" type="submit" name="submit" value="Login" id="but"></center><h1>

        <a  href="forgotPassword.php" style="font-size:16px">Forgot password?</a>
    </form>

  </body>

</html>
