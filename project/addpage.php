<?php
include_once("menubar.php");
use Oop\Database;
use Oop\Attendant;
use Oop\Event;
$database = new Database();


$image1="/project/picture/img/icon.png";
$image2="/project/picture/img/icon.png";
if (isset($_POST['submit'])){

if (isset($_FILES['file1'])){
  $pic= basename($_FILES['file1']["name"]);
  $image1= "/project/picture/attendant/$pic";
  if (move_uploaded_file($_FILES["file1"]["tmp_name"],"picture/attendant/$pic")){
      // echo "uploaded";
  }else{
      $image1="/project/picture/img/icon.png";
  }
}

if (isset($_FILES['file2'])){
  $pic= basename($_FILES['file2']["name"]);
  $image2= "/project/picture/attendant/$pic";
  if (move_uploaded_file($_FILES["file2"]["tmp_name"],"picture/attendant/$pic")){
      // echo "uploaded";
  }else{
$image2="/project/picture/img/icon.png";
  }
}



  $attendant=new Attendant(0,$_POST['id_ev2'], $_SESSION['user']->getIdAcount(),$image1,$image2,$_POST['capacity'],"n");

  $database->addAttendant($attendant);

  $event=$database->loadEvent($_POST['id_ev2']);
  $eventNew = new Event($event->get_id_ev(),$event->get_id_ac(),$event->get_name_event(),$event->get_detail(),$event->get_image(),$event->get_teaser_VDO(),
  $event->get_date(),$event->get_time(),$event->get_location(),$event->get_map(),$event->get_current_capacity()+$attendant->get_num(),
  $event->get_capacity(),$event->get_free(),$event->get_type(),$event->get_precondition(),$event->get_create_time(),$event->get_status(),$event->get_google_form_url());

  $database->updateEvent($eventNew);

  echo '<script type="text/javascript">window.location.href = "http://localhost/project/page.php?id_ev='.$_POST['id_ev2'].'";</script>';




}
 ?>
