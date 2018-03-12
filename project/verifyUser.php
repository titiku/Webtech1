<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
      include_once("menubar.php");
      use Oop\Database;

      if(!isset($_GET['username'])){
        echo '<script type="text/javascript">window.location.href = "index.php";</script>';
      }

      $database = new Database();
      $database->vertifyUser($_GET['username']);

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
        <p style=" font-size:20px">Your E-Mail are avaliable</p>


    <a href="login.php" style="background-color:#78B347;border-radius:8px;font-size:25px ;color:white;width=30%;
    height: 100px;
    position: relative;
    -webkit-animation-name: example; /* Safari 4.0 - 8.0 */
    -webkit-animation-duration: 4s; /* Safari 4.0 - 8.0 */
    animation-name: example;
    animation-duration: 10s; "
    >Go to Login</a>



  </center>

  </body>
</html>
