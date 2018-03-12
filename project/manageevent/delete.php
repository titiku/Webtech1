<?php
include_once("../menubar.php");
use Oop\Account;
use Oop\Database;


if (!isset($_SESSION['user'])){
  echo "<script type='text/javascript'>window.location.href = \"http://localhost/project/\";</script>";
}
if ($_SESSION['user']->getType()=='attendant'){
  echo "<script type='text/javascript'>window.location.href = \"http://localhost/project/\";</script>";
}else{
  $id_ev = $_GET['id_ev'];

  $db=new Database();
  $db->updateEventStatus($id_ev,"n");
  echo "<script type='text/javascript'>window.location.href = \"http://localhost/project/manageevent/manageevent.php\";</script>";
}

 ?>
