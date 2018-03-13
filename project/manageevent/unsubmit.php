<?php
include_once("../menubar.php");
use Oop\Database;
use Oop\Attendant;
use Oop\Event;
use Oop\Account;

  $id_ev=$_POST['id_ev2'];
 $database = new Database();
$attendant  = $database->loadAttendant($_POST['id_at2']);
$database->updateAttendant($attendant,'w');

$event=$database->loadEvent($_POST['id_ev2']);

$eventNew = new Event($event->get_id_ev(),$event->get_id_ac(),$event->get_name_event(),$event->get_detail(),$event->get_image(),$event->get_teaser_VDO(),
$event->get_date(),$event->get_time(),$event->get_location(),$event->get_map(),$event->get_current_capacity()-$attendant->get_num(),
$event->get_capacity(),$event->get_free(),$event->get_type(),$event->get_precondition(),$event->get_create_time(),$event->get_status(),$event->get_google_form_url()
,$event->get_payment());

$database->updateEvent($eventNew);

$account = $database->loadAccount($attendant->get_id_ac());
echo '<script type="text/javascript">window.location.href = "attendantstable.php?id_ev='.$id_ev.'&submit=button&type=unacceptEvent&email='.$account->getEmail().'";</script>';
 ?>
