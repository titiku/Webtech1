<?php
include_once("menubar.php");
use Oop\Account;
use Oop\Database;
use Oop\Comment;

if (isset($_SESSION['user'])){
  $user=$_SESSION['user'];
} else {
  echo '<script type="text/javascript">window.location.href = "index.php";</script>';
}

  if (isset($_POST['id_ac']) && isset($_POST['id_ev']) && isset($_POST['comment'])){
    if ($_POST['id_ac'] == ""){
      echo '<script type="text/javascript">window.location.href = "http://localhost/project/login.php?id_ev='.$_POST['id_ev'].'";</script>';
    }
    $database = new Database();
    date_default_timezone_set('Asia/Bangkok');
    $date = date("Y-m-d");
    $time = date("H:i:s");
    $comment = new Comment(0,$_POST['id_ac'],$_POST['id_ev'],$_POST['comment'],$date,$time);
    $database->addComment($comment);
    echo '<script type="text/javascript">window.location.href = "http://localhost/project/page.php?id_ev='.$_POST['id_ev'].'";</script>';
  } else {
    echo '<script type="text/javascript">window.location.href = "http://localhost/project/login.php?id_ev='.$_POST['id_ev'].'";</script>';
  }

 ?>
