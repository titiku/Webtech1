<?php
include_once("../menubar.php");
use Oop\Database;
use Oop\Attendant;

  $id_ev=$_POST['id_ev3'];
 $database = new Database();
 $attendant  = $database->loadAttendant($_POST['id_at3']);
 $database->updateAttendant($attendant,'r');


echo "<script type='text/javascript'>window.location.href = \"attendantstable.php?id_ev=$id_ev&submit=button\";</script>";


 ?>
