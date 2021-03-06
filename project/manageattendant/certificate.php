<!DOCTYPE html>
<?php
  require '../vendor/autoload.php';
  use Oop\Account;
  use Oop\Database;

  $user;
  if (!isset($_GET['id'])) {
    echo '<script type="text/javascript">window.location.href = "index.php";</script>';
  } else {
    $database = new Database();
    $attendant = $database->loadAttendant($_GET['id']);
    if (!is_null($attendant)){
      $user = $database->loadAccount($attendant->get_id_ac());
      $event = $database->loadEvent($attendant->get_id_ev());
    } else {
      echo '<script type="text/javascript">window.location.href = "index.php";</script>';
    }
  }
 ?>
<html>
  <head>
    <meta charset="utf-8">
    <title>Certificate</title>
  </head>
  <style media="screen">
      @import url('https://fonts.googleapis.com/css?family=Roboto+Condensed');
      body{
                font-family: 'Roboto Condensed', sans-serif;
      }
  </style>
  <body style="background-color:#FDFDF1">
    <center>

    <!-- <div style="width:800px; height:600px; padding:20px; text-align:center; border: 7px solid #989090;border-radius: 25px;"> -->
<div style="width:750px; height:550px; padding:20px; text-align:center; border: 5px solid #D42226;border-radius: 10px;">
        <br><br>
       <span style="font-size:50px; font-weight:bold ;color:#C11623">Certificate of Completion</span>
       <br><br>
       <span style="font-size:25px;"><i>This is to certify that</i></span><br>
       <br><br><br>
       <span style="font-size:50px ; text-decoration: underline;text-decoration-color: #C11623;"><b><?php echo $user->getFirst_name().' '.$user->getLast_name(); ?></b></span><br/><br/><br><br>
       <span style="font-size:25px"><i>has completed the event</i></span> <br/><br/>
       <span style="font-size:40px"><?php echo $event->get_name_event(); ?></span> <br/><br/>
       <!-- <span style="font-size:20px">with score of <b>$grade.getPoints()%</b></span> <br/><br/><br/><br/> -->
       <span style="font-size:25px"><i>dated</i></span><br><br>
       <span style="font-size:30px"><?php echo date("Y-m-d"); ?></span>


</div>
</div>




  </body>
</center>
</html>
