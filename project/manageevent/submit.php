<?php
include_once("../menubar.php");
use Oop\Database;
use Oop\Attendant;
use Oop\Account;

  $id_ev=$_POST['id_ev'];
 $database = new Database();
$attendant  = $database->loadAttendant($_POST['id_at']);
$database->updateAttendant($attendant,'y');

$account = $database->loadAccount($attendant->get_id_ac());
echo '<script type="text/javascript">window.location.href = "attendantstable.php?id_ev='.$id_ev.'&submit=button&type=acceptEvent&email='.$account->getEmail().'";</script>';
 ?>
