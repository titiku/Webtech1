<?php
 include_once("../menubar.php");
 use Oop\Account;
 use Oop\Database;
 use Oop\Event;



 $database = new Database();

 $event = $database->loadEvent( $_GET['id_ev']);

 if (isset($_GET['type'])){
   echo "<script type='text/javascript'>console.log('test');</script>";
   $type = $_GET['type'];
   $id_ev = $_GET['id_ev'];
   $email = $_GET['email'];
   $name = $event->get_name_event();
   echo "<script type='text/javascript'>window.location.href = \"/project/phpSendMailGmail.php?type=$type&name=$name&id_ev=$id_ev&email=$email\";</script>";
 } else {
   echo "<script type='text/javascript'>console.log('tes5asdasdt');</script>";
 }


 if (!isset($_SESSION['user'])){
   echo "<script type='text/javascript'>window.location.href = \"http://localhost/project/\";</script>";
 }
 if ($_SESSION['user']->getType()=='attendant'){
   echo "<script type='text/javascript'>window.location.href = \"http://localhost/project/\";</script>";
 }else{

   if ($_SESSION['user']->getType()=='organizer'){

      if(  $_SESSION['user']->getIdAcount()!=$event->get_id_ac()){
        echo "<script type='text/javascript'>window.location.href = \"http://localhost/project/\";</script>";
      }
   }


 }
   $list=$database->loadAttendants($_GET['id_ev']);

 ?>


 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title></title>
       <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
       <script type="text/javascript">
       $(document).ready(function() {

             $('#example').DataTable();
           } );
       </script>
   </head>
   <body>

      <center>  <h1>  <?= $event->get_name_event() ?></h1></center>

     <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">

      <thead>
   <tr>

     <th>id_at</th>

     <th>id_ac</th>
     <th>username</th>
     <th>num</th>
      <th>image1</th>
      <th >image2</th>
        <th >status</th>
      <th >action</th>
   </tr>
 </thead>
 <tbody>
   <?php foreach($list as $person): ?>

     <tr>

       <td><?= $person->get_id_at(); ?></td>

       <td><?= $person->get_id_ac(); ?></td>

       <?php

         $a=$db->loadAccount($person->get_id_ac());
         ?>

       <td><?= $a->getUsername() ?></td>
         <td><?= $person->get_num() ?></td>
       <?php $pic=$person->get_image1();
              $pic2=$person->get_image2();
       ?>

         <td><?php echo "<img src=$pic  height='300' width='300'>"; ?></td>
         <td><?php echo "<img src=$pic2  height='300' width='300'>"; ?></td>
         <?php
         if ($person->get_status() =='c'){
               $status='checkin';
         }
        else if ($person->get_status() =='w'){
               $status='wait refund';
         }
          else if ($person->get_status() =='r'){
                  $status='refunded';
            }else if($person->get_status() =='y'){
                $status='join';
            }else{
                $status='wait accept';
            }

           ?>
         <td><?= $status ?></td>



          <td>

            <form class="" action="submit.php" method="post">
              <input hidden type="text" name="id_ev" value="<?= $person->get_id_ev()?>">
            <input hidden type="text" name="id_at" value="<?= $person->get_id_at()?>">



           <?php
             if($person->get_status()=='n'){
               echo '<input  type="submit" style="margin-bottom:30%;width:100%;" class="btn btn-info" name="" value="Submit">';
             }
            ?>
         </form>
         <form class="" action="unsubmit.php" method="post">
           <input hidden type="text" name="id_ev2" value="<?= $person->get_id_ev()?>">
           <input hidden type="text" name="id_at2" value="<?= $person->get_id_at()?>">
           <?php
           if($person->get_status()=='n'){
             echo '<input type="submit" style="margin-bottom:30%;width:100%;" class="btn btn-danger" name="" value="Unsubmit">';
           }
            ?>
         </form>

         <form class="" action="refundattendant.php" method="post">
           <input hidden type="text" name="id_ev3" value="<?= $person->get_id_ev()?>">
           <input hidden type="text" name="id_at3" value="<?= $person->get_id_at()?>">
           <?php
           if($person->get_status()=='w'){
             echo '  <input  type="submit" class="btn btn-danger" name="" value="Refund">';
           }
            ?>
         </form>

         <?php
         if($person->get_status()=='y'){
           echo ' <a class="btn btn-info" style="margin-bottom:20%;width:100%;" target="_blank" href="qrcodecheckin.php?id_at='.$person->get_id_at().'">QRCode</a>';
         }
          ?>


       </td>

     </tr>


   <?php endforeach;?>



 </tr>
 </tbody>
 </table>




   </body>
 </html>
