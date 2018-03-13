<?php

include_once("../menubar.php");
use Oop\Account;
use Oop\Database;
use Oop\Event;


if (!isset($_SESSION['user'])){
  echo "<script type='text/javascript'>window.location.href = \"http://localhost/project/\";</script>";
}

if ($_SESSION['user']->getType()=='attendant'){
  echo "<script type='text/javascript'>window.location.href = \"http://localhost/project/\";</script>";
}
else{
  $id_ev=$_POST["id_ev"];
  $id_ac=$_POST["id_ac"];
  $name_event=$_POST["nameevent"];
  $detail =$_POST["detail"];

  $date=$_POST["date"];
  $time=$_POST["time"];
  $location=$_POST["location"];
  $map=$_POST["latlng"];
  $capacity=$_POST["capacity"];
  $free=$_POST["free"];
  $type=$_POST["type"];

  // echo "$id_ev";
  // echo "<br>";
  // echo "$name_event";
  // echo "<br>";
  // echo "$detail";
  // echo "<br>";

  // $video2="/project/picture/img/no-video.png";

  $totalimg='';
  for ($i=0; $i <=$_POST['numfile'] ; $i++) {
      if (isset($_FILES['fileimage'.$i])){
        $pic= basename($_FILES['fileimage'.$i]["name"]);
        $image= "/project/picture/event/$pic";
        if (move_uploaded_file($_FILES['fileimage'.$i]["tmp_name"],"../picture/event/$pic")){
            // echo "uploaded";
            // echo "<br>";
        }else{
            // echo "cant";
            $image="/project/picture/img/icon.png";
        }

      }

      if ($i==$_POST['numfile']){

      }else{
        if ($image!=''){
          $image=$image.",";
        }

      }
      $totalimg=$totalimg.$image;
}

  if (isset($_FILES['teaser'])){
    $video= basename($_FILES['teaser']["name"]);
    $video2= "/project/picture/video/$video";
    if (move_uploaded_file($_FILES["teaser"]["tmp_name"],"../picture/video/$video")){
        // echo "uploaded";
    }else{
        // echo "cant";
        $video2=$_POST["videoNew"];
    }
  }


  // echo $image;
  // echo $video2;

  $db=new Database();
  $event = new Event($id_ev,$id_ac,$name_event,$detail,$totalimg,$video2,$date,$time,$location,$map,$_POST['current'],$capacity,$free,$type,

$_POST['precondition'],$_POST['create_time'],$_POST['status'],$_POST['google_form_url'],$_POST['payment']);

  $db->updateEvent($event);
  // echo "<br>";
  // echo "ball";
  echo "<script type='text/javascript'>window.location.href = \"http://localhost/project/manageevent/manageevent.php\";</script>";
}



 ?>
