<?php
include_once("../menubar.php");
use Oop\Account;
use Oop\Database;
use Oop\Event;
$database = new Database();
if (!isset($_SESSION['user'])){
  echo "<script type='text/javascript'>window.location.href = \"http://localhost/project/\";</script>";

}


$list = $database->loadAttendantIDAC($_SESSION['user']->getIdAcount());



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
            <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">

             <thead>
          <tr>

            <th>id_at</th>

            <th>id_ev</th>
            <th>name_event</th>
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

              <td><?= $person->get_id_ev(); ?></td>

              <?php

                $a=$db->loadEvent($person->get_id_ev());
                ?>

              <td><?= $a->get_name_event() ?></td>
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
                elseif ($person->get_status() =='w'){
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
                <td><?= $status  ?></td>

                 <td><form class="" action="cancel.php" method="post">
                     <input hidden type="text" name="id_ev" value="<?= $person->get_id_ev()?>">
                   <input hidden type="text" name="id_at" value="<?= $person->get_id_at()?>">



                  <?php
                    if($person->get_status()=='n'){
                      echo '<input  type="submit" style="margin-bottom:30%;width:100%;" class="btn btn-info" name="" value="cancel">';
                    }
                    if($person->get_status()=='c'){

                      $ac=$database->loadAccount($person->get_id_ac());
                      $ev=$database->loadEvent($person->get_id_ev());
                      echo ' <a class="btn btn-info" style="margin-bottom:20%;width:100%;" target="_blank" href="certificate.php?first_name='.$ac->getFirst_name().'&last_name='.$ac->getLast_name().'&event_name='.$ev->get_name_event().'&date='.$ev->get_date().'">Certificate</a>';
                    }
                   ?>
                </form>

                <a href="#"></a>




              </td>

            </tr>
          <?php endforeach;
          ?>



        </tr>
        </tbody>
        </table>
  </body>
</html>
