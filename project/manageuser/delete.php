<?php
include_once("../menubar.php");
use Oop\Account;
use Oop\Database;


if (!isset($_SESSION['user'])){
  echo "<script type='text/javascript'>window.location.href = \"http://localhost/project/\";</script>";
}

if ($_SESSION['user']->getType()!='admin'){
  echo "<script type='text/javascript'>window.location.href = \"http://localhost/project/\";</script>";
}else{

  $id_ac = $_GET['id_ac'];
  $db=new Database();

  $events=$db->searchEvents($id_ac);
  $num=0;
 foreach($events as $event):
   $num=$num+1;
 endforeach;

 if ($num<=0){
   $db->deleteAccounts($id_ac);
 }
 echo "<script type='text/javascript'>window.location.href = \"http://localhost/project/manageuser\";</script>";
}


 ?>
