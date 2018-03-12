<?php
include_once("../menubar.php");
use Oop\Database;
use Oop\Attendant;
use Oop\Event;
use Oop\Account;

$database = new Database();
$attendant  = $database->loadAttendant($_POST['id_at']);
$event=$database->loadEvent($_POST['id_ev']);
$eventNew = new Event($event->get_id_ev(),$event->get_id_ac(),$event->get_name_event(),$event->get_detail(),$event->get_image(),$event->get_teaser_VDO(),
$event->get_date(),$event->get_time(),$event->get_location(),$event->get_map(),$event->get_current_capacity()-$attendant->get_num(),
$event->get_capacity(),$event->get_free(),$event->get_type(),$event->get_precondition(),$event->get_create_time(),$event->get_status(),$event->get_google_form_url());


$database->deleteAttendant($_POST['id_at']);
$database->updateEvent($eventNew);
echo "<script type='text/javascript'>window.location.href = \"http://localhost/project/manageattendant/\";</script>";
 ?>
