<!DOCTYPE html>
<?php
require 'vendor/autoload.php';
use Oop\Account;
use Oop\Database;
$db=new Database();
if(!isset($_SESSION)){
    session_start();
}
if(isset($_SESSION['user'])){
  $_SESSION['user']=$db->loadAccount($_SESSION['user']->getIdAcount());
}
 ?>
<html>
  <head>
    <meta charset="utf-8">
    <title>Surat Event</title>
      <style>
      @import url('https://fonts.googleapis.com/css?family=Coiny');
    a.menubar{
       font-family: 'Coiny', cursive;
      color: #7C7C7D;
    }
    </style>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
  </head>
  <body>
   <nav class="navbar navbar-expand-sm bg-light navbar-light fixed-top"  style="background-color:#BECDDA;">
     <div class="container-fluid" >
       <div class="navbar-header">
         <a class="navbar-brand menubar" style='font-size: 36px;color:#F44362;font-family: 'Coiny', cursive;
         color: #7C7C7D; ' href="/project/index.php">Surat Event</a>
       </div>
       <ul class="nav navbar-nav" >
         <li id="login" class="nav-item">
           <?php
             if (isset($_GET['id_ev'])){
               echo '<a class="nav-link menubar" href="/project/login.php?id_ev='.$_GET['id_ev'].'">Login</a>';
             } else {
               echo '<a class="nav-link menubar" href="/project/login.php">Login</a>';
             }
            ?>
          </li>
          <li id="regis" class="nav-item">
            <a class="nav-link menubar" href="/project/regis.php">Register</a>
           </li>
         <li class="nav-item dropdown" id="menu">
           <a class="nav-link dropdown-toggle menubar" href="#" id="navbardrop" data-toggle="dropdown">
             Menu
           </a>
           <div class="dropdown-menu">
              <a id="profile" class="dropdown-item menubar" href="/project/profile.php">Profile</a>
             <a id="manage" class="dropdown-item menubar" href="/project/manageuser/">Manage User</a>
             <a id="createEvent" class="dropdown-item menubar" href="/project/createEvent.php">Create Event</a>
              <a id="eventPdf" class="dropdown-item menubar" href="/project/manageevent/manageevent.php">Manage Event</a>
              <a id="manageattendant" class="dropdown-item menubar" href="/project/manageattendant/">Manage Attendant</a>
              <a id="changePassword" class="dropdown-item menubar" href="/project/changePassword.php">Change Password</a>
              <?php
                if (isset($_GET['id_ev'])){
                  echo '<a id="logout" class="dropdown-item menubar" href="/project/logout.php?id_ev='.$_GET['id_ev'].'">Logout</a>';
                } else {
                  echo '<a id="logout" class="dropdown-item menubar" href="/project/logout.php">Logout</a>';
                }
               ?>
           </div>
         </li>
         <?php if(isset($_SESSION['user'])){
          $username=$_SESSION['user']->getUsername();
          $pic=$_SESSION['user']->getImage();
          echo "<img src='$pic' class='rounded-circle' height='50px' width='50px'>";
          echo "<span class='menubar'>$username</span>";
        }
         ?>
       </ul>
     </div>
   </nav>
    <br>
    <br><br><br>
  </body>
</html>
<?php
echo
"<script type='text/javascript'>
document.getElementById('menu').style.display = 'none';
document.getElementById('manage').style.display = 'none';
document.getElementById('createEvent').style.display = 'none';
document.getElementById('logout').style.display = 'none';
document.getElementById('eventPdf').style.display = 'none';
document.getElementById('manageattendant').style.display = 'none';
</script>";
if(isset($_SESSION) ){
  if(isset($_SESSION['user'])){
    echo
    "<script type='text/javascript'>
    document.getElementById('regis').style.display = 'none';
    document.getElementById('menu').style.display = 'block';
    document.getElementById('manage').style.display = 'none';
    document.getElementById('createEvent').style.display = 'none';
    document.getElementById('logout').style.display = 'block';
    document.getElementById('manageattendant').style.display = 'block';
    document.getElementById('login').style.display = 'none';
    document.getElementById('eventPdf').style.display = 'none';
    </script>";
   if($_SESSION['user']->getType()=='admin'){
     echo
     "<script type='text/javascript'>
     document.getElementById('manage').style.display = 'block';
     document.getElementById('createEvent').style.display = 'block';
     document.getElementById('eventPdf').style.display = 'block';
     </script>";
   }
   if($_SESSION['user']->getType()=='organizer'){
     echo
     "<script type='text/javascript'>
     document.getElementById('manage').style.display = 'none';
     document.getElementById('createEvent').style.display = 'block';
      document.getElementById('eventPdf').style.display = 'block';
     </script>";
   }
  }else{
    echo
    "<script type='text/javascript'>
    document.getElementById('menu').style.display = 'none';
    document.getElementById('manage').style.display = 'none';
    document.getElementById('createEvent').style.display = 'none';
    document.getElementById('logout').style.display = 'none';
    document.getElementById('manageattendant').style.display = 'none';
    document.getElementById('login').style.display = 'block';
    </script>";
        }
}
?>
