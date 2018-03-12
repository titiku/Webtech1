<html>


<?php
  include_once("menubar.php");
  echo
  "<script>  document.getElementById('profile').href = '../profile.php';
  document.getElementById('manage').href = '';
  document.getElementById('createEvent').href = '../createEvent.php';
  document.getElementById('eventPdf').href = '../manageevent/manageevent.php';

  document.getElementById('surat2').href = '../';
    document.getElementById('logout').href = '../logout.php';
  </script>";
  use Oop\Account;
  use Oop\Database;

  $db=new Database();
  //
  // if (isset($_SESSION['user'])){
  //   if ($_SESSION['user']->getType()=='attendant'){
  //     echo '<script type="text/javascript">window.location.href = "../index.php";</script>';
  //   }
  // } else {
  //   echo '<script type="text/javascript">window.location.href = "index.php";</script>';
  // }

  if (isset($_SESSION['user'])){
    if ($_SESSION['user']->getType()=='attendant'){
      echo "<script type='text/javascript'>window.location.href = \"http://localhost/project/\";</script>";
    }
  }else {
    echo "<script type='text/javascript'>window.location.href = \"http://localhost/project/\";</script>";
  }

function checkOrganizer($list){
  $list2=array();
  $count=0;
  if ($_SESSION['user']->getType()=='organizer'){
      for ($j = 0; $j < count($list); $j++){
        if ($_SESSION['user']->getIdAcount()==$list[$j]->get_id_ac()){
          $list2[$count]=$list[$j];
          $count=$count+1;
        }
      }
      return $list2;
  }else{
    return $list;
  }
}

        $people = $db->loadEvents();

        if (isset($_GET['day3'])) {

          $numday= $_GET['day3'];
          if($numday!=0){
            $n=0;
            $ar=array();
                for ($j = 0; $j < count($people); $j++){
                   $date=date_create($people[$j]->get_date());
                    if (  date_format($date,"N")==$numday){
                      $ar[$n]=$people[$j];
                      $n+=1;
                    }
                }

            $people=$ar;

          }

        }
        if (isset($_GET['day31'])) {

          $numday= $_GET['day31'];
          if($numday!=0){
            $n=0;
            $ar=array();
                for ($j = 0; $j < count($people); $j++){
                   $date=date_create($people[$j]->get_date());
                    if (  date_format($date,"d")==$numday){
                      $ar[$n]=$people[$j];
                      $n+=1;
                    }
                }

            $people=$ar;

          }

        }


        if (isset($_GET['month3'])) {
          $nummonth= $_GET['month3'];


          if($nummonth!=0){
            $n=0;
            $ar=array();
                for ($j = 0; $j < count($people); $j++){
                   $date=date_create($people[$j]->get_date());
                    if (  date_format($date,"m")==$nummonth){
                      $ar[$n]=$people[$j];
                      $n+=1;
                    }
                }
            $people=$ar;
          }


        }
        if (isset($_GET['year3'])) {

          $numyear= $_GET['year3'];

          if($numyear!=0){
            $n=0;
            $ar=array();

                for ($j = 0; $j < count($people); $j++){
                   $date=date_create($people[$j]->get_date());
                    if (  date_format($date,"Y")==$numyear){
                      $ar[$n]=$people[$j];
                      $n+=1;
                    }
                }

            $people=$ar;

          }

        }




        if (isset($_GET['searchusername'])) {

          $searchname= $_GET['searchusername'];
          if($searchname!=""){
            $n=0;
            $ar=array();
                for ($j = 0; $j < count($people); $j++){
                    $user3 = $db->loadAccount($people[$j]->get_id_ac());
                    if (  $user3->getUsername()==$searchname){
                      $ar[$n]=$people[$j];
                      $n+=1;
                    }
                }
            $people=$ar;
          }
        }

        if (isset($_GET['searchaddress'])) {
          $searchaddress= $_GET['searchaddress'];
          if($searchaddress!=""){
            $n=0;
            $ar=array();
                for ($j = 0; $j < count($people); $j++){
                  if (strpos($people[$j]->get_location(), $searchaddress) !== false) {
                    $ar[$n]=$people[$j];
                    $n+=1;
                  }
                }
            $people=$ar;
          }
        }


        $people=checkOrganizer($people);

        if(isset($_POST['pdf'])){
          echo "pdf";

        }






        function fetch_data($list){
             foreach ($list as &$event) {
                 $db=new Database();
               $a=$db->loadAccount($event->get_id_ac());
               $date=date_create($event->get_date());
               $day=date_format($date,"N");

                 if (date_format($date,"N")==1) {
                     $day='Monday';
                 }elseif (date_format($date,"N")==2) {
                     $day='Tuesday';
                 }elseif (date_format($date,"N")==3) {
                     $day='Wednesday';
                 }elseif (date_format($date,"N")==4) {
                     $day='Thursday';
                 }elseif (date_format($date,"N")==5) {
                     $day='Friday';
                 }elseif (date_format($date,"N")==6) {
                     $day='Saturday';
                 }elseif (date_format($date,"N")==7) {
                   $day='Sunday';
                 }


                 // $output .= '<tr>
                 //               <td>'.$event->get_id_ev().'</td>
                 //               <td>'.$event->get_name_event().'</td>
                 //               <td>'.$event->get_id_ac().'</td>
                 //               <td>'.$a->getUsername().'</td>
                 //               <td>'.$event->get_current_capacity().'</td>
                 //               <td>'.$event->get_capacity().'</td>
                 //               <td>'.$event->get_free().'</td>
                 //               <td>'.$event->get_type().'</td>
                 //               <td>'.$event->get_location().'</td>
                 //               <td>'.$event->get_time().'</td>
                 //               <td>'.$day.'</td>
                 //               <td>'.$event->get_date().'</td>
                 //             </tr>
                 //                      ';

              $output = '<tr>
                            <td>'.$event->get_id_ev().'</td>
                            <td>'.$event->get_name_event().'</td>
                            <td>'.$a->getUsername().'</td>

                            <td>'.$event->get_type().'</td>
                            <td>'.$event->get_location().'</td>
                            <td>'.$event->get_time().'</td>

                            <td>'.$event->get_date().'</td>
                          </tr>';

              }
             return $output;
        }



        if (isset($_POST["create_pdf"])){
          require_once('tcpdf/tcpdf.php');
          $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
          $obj_pdf->SetCreator(PDF_CREATOR);
          $obj_pdf->SetTitle("Export HTML Table data to PDF using TCPDF in PHP");
          $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);
          $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
          $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
          $obj_pdf->SetDefaultMonospacedFont('helvetica');
          $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
          $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);
          $obj_pdf->setPrintHeader(false);
          $obj_pdf->setPrintFooter(false);
          $obj_pdf->SetAutoPageBreak(TRUE, 10);
          $obj_pdf->SetFont('freeserif', '', 12);
              $obj_pdf->AddPage();
          $content = '';
          $content .= '
              <h3 align="center">Events</h3><br /><br />
              <table border="1" cellspacing="0" cellpadding="5" align="center">
                   <tr>


                        <th>id_ev</th>
                        <th>name_event</th>

                          <th>username</th>



                        <th>type</th>
                            <th>address</th>

                          <th>time</th>


                          <th>date</th>

                   </tr>
              ';

              $content .= fetch_data($people);
              $content .= '</table>';
              $obj_pdf->writeHTML($content);
              ob_end_clean();
              $obj_pdf->Output('sample.pdf', 'I');
              ob_end_flush();
        }


?>

  <head>
    <meta charset="utf-8">
    <title></title>
    <style>

    html, body {
    height: 100%;
    margin: 0;
    padding: 0;
    }
    #description {
    font-family: Roboto;
    font-size: 15px;
    font-weight: 300;
    }

    #infowindow-content .title {
    font-weight: bold;
    }

    #infowindow-content {
    display: none;
    }

    #map #infowindow-content {
    display: inline;
    }

    .pac-card {
    margin: 10px 10px 0 0;
    border-radius: 2px 0 0 2px;
    box-sizing: border-box;
    -moz-box-sizing: border-box;
    outline: none;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
    background-color: #fff;
    font-family: Roboto;
    }

    #pac-container {
    padding-bottom: 12px;
    margin-right: 12px;
    }

    .pac-controls {
    display: inline-block;
    padding: 5px 11px;
    }

    .pac-controls label {
    font-family: Roboto;
    font-size: 13px;
    font-weight: 300;
    }

    #pac-input {
    background-color: #fff;
    font-family: Roboto;
    font-size: 15px;
    font-weight: 300;
    margin-left: 12px;
    padding: 0 11px 0 13px;
    text-overflow: ellipsis;
    width: 400px;
    }

    #pac-input:focus {
    border-color: #4d90fe;
    }

    #title {
    color: #fff;
    background-color: #4d90fe;
    font-size: 25px;
    font-weight: 500;
    padding: 6px 12px;
    }
    #target {
    width: 345px;
    }
    #floating-panel {
    position: absolute;
    top: 10px;
    left: 25%;
    z-index: 5;
    background-color: #fff;
    padding: 5px;
    border: 1px solid #999;
    text-align: center;
    font-family: 'Roboto','sans-serif';
    line-height: 30px;
    padding-left: 10px;
    }


    /* aaa */

    @import url('https://fonts.googleapis.com/css?family=Roboto+Condensed');
      body{
          font-family: 'Roboto Condensed', sans-serif;
        background-color: #F1F1F1;
      }
      h1{
        color: #AA2231;
        padding-left: 10px;
      }
      #formupdate{
        padding: 20px 20px ;
        border:2px  ;
        border:2px solid black ;
        border-color: #989090 ;
        border-width: 5px;
        margin:40px 250px 250px 250px;
        margin: auto;
        margin-top: 40px ;
        width: 80%;
        font-family: 'Roboto Condensed', sans-serif;
      }

      #map {
        height: 50%;
        width: 100%;
        margin-top: 10px;
      }



/* asasaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa */
    table{
      table-layout: fixed;
    }


th {
  text-align: center;

}
td{
  word-wrap: break-word;
}
body {font-family: Arial, Helvetica, sans-serif;}

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 80px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
    position: relative;
    background-color: #fefefe;
    margin: auto;
    padding: 0;
    border: 1px solid #888;
    width: 45%;
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
    -webkit-animation-name: animatetop;
    -webkit-animation-duration: 0.4s;
    animation-name: animatetop;
    animation-duration: 0.4s
}

/* Add Animation */
@-webkit-keyframes animatetop {
    from {top:-300px; opacity:0}
    to {top:0; opacity:1}
}

@keyframes animatetop {
    from {top:-300px; opacity:0}
    to {top:0; opacity:1}
}


.close  {
    color: white;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,.close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}


.modal-header {
    padding: 2px 16px;
    background-color: SkyBlue   ;
    color: white;
}

.modal-body {padding: 2px 16px;}

.modal-footer {
    padding: 2px 16px;
    color: white;
}
</style>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
        <script>
            $(document).ready(function() {
              // $('#example').dataTable( {
              //     "ordering": false
              //   } );
                  $('#example').DataTable();
                } );


                var num=0;
                var abc = 0;      // Declaring and defining global increment variable.
                $(document).ready(function() {
                //  To add new input file field dynamically, on click of "Add More Files" button below function will be executed.
                $('#add_more').click(function() {
                  num=num+1;
                $(this).before($("<div/>", {
                id: 'filediv',
                }).fadeIn('slow').append($("<input/>", {
                name: 'fileimage'+num,
                type: 'file',
                id: 'file',
                class: 'btn-info'
                }), $("<br/><br/>")));
                });
                // Following function will executes on change event of file input to select different file.
                $('body').on('change', '#file', function() {
                if (this.files && this.files[0]) {
                abc += 1; // Incrementing global variable by 1.
                var z = abc - 1;
                var x = $(this).parent().find('#previewimg' + z).remove();
                $(this).before("<div id='abcd" + abc + "' class='abcd'><img style='width:100%;display: block;height: 100px;object-fit: contain;' id='previewimg" + abc + "' src=''/></div>");
                var reader = new FileReader();
                reader.onload = imageIsLoaded;
                reader.readAsDataURL(this.files[0]);
                $(this).hide();
                      $("#abcd" + abc).append($("<img/>", {
                      id: 'img',
                      src: '../picture/img/delete-button.png',
                      alt: 'delete',
                      style:'display: block;height: 20px;object-fit: contain; margin-left:80%;'
                      }).click(function() {
                      $(this).parent().parent().remove();
                      }));
                      }
                      });
                      // To Preview Image
                            function imageIsLoaded(e) {
                            $('#previewimg' + abc).attr('src', e.target.result);
                            };
                            $('#upload').click(function(e) {
                            var name = $(":file").val();
                            if (!name) {
                            alert("First Image Must Be Selected");
                            e.preventDefault();
                            }
                            });
                      });


        </script>
  </head>
  <body>




<center> <form class="" action="" method="get">

<span>Filter</span>
<select name="day3">
    <option  value="0">select weekday</option>
    <option  value="1">Monday</option>
    <option  value="2">Tuesday</option>
    <option  value="3">Wednesday</option>
    <option  value="4">Thursday</option>
      <option  value="5">Friday</option>
      <option  value="6">Saturday</option>
      <option  value="7">Sunday</option>
</select>

<select name="day31">
    <option  value="0">select day</option>
    <option  value="1">1</option>
    <option  value="2">2</option>
    <option  value="3">3</option>
    <option  value="4">4</option>
      <option  value="5">5</option>
      <option  value="6">6</option>
      <option  value="7">7</option>
      <option  value="8">8</option>
      <option  value="9">9</option>
      <option  value="10">10</option>
      <option  value="11">11</option>
        <option  value="12">12</option>
        <option  value="13">13</option>
        <option  value="14">14</option>
        <option  value="15">15</option>
        <option  value="16">16</option>
        <option  value="17">17</option>
        <option  value="18">18</option>
          <option  value="19">19</option>
          <option  value="20">20</option>
          <option  value="21">21</option>
          <option  value="22">22</option>
          <option  value="23">23</option>
          <option  value="24">24</option>
            <option  value="25">25</option>
            <option  value="26">26</option>
            <option  value="27">27</option>
            <option  value="28">28</option>
            <option  value="29">29</option>
            <option  value="30">30</option>
              <option  value="31">31</option>

</select>


<select name="month3">
      <option  value="0">select month</option>
    <option  value="1">January</option>
      <option  value="2">February</option>
      <option  value="3">March</option>
      <option  value="4">April</option>
        <option  value="5">May</option>
        <option  value="6">June</option>
        <option  value="7">July</option>
          <option  value="8">August</option>
          <option  value="9">September</option>
          <option  value="10">October</option>
            <option  value="11">November</option>
            <option  value="12">December</option>
</select>

    <select name="year3">
      <option  value="0">select year</option>
      <option  value="2015">2015</option>
      <option  value="2016">2016</option>
      <option  value="2017">2017</option>
      <option  value="2018"  >2018</option>
      <option  value="2019">2019</option>
      <option  value="2020">2020</option>
    </select>

    <input type="text" name="searchusername" value="" placeholder="Search Username">
    <input type="text" name="searchaddress" value="" placeholder="Search Address">

    <input type="submit" name="" value="Search">

</form></center>

<center>  <form class=""  method="post">
        <input  type="submit" name="create_pdf" value="Create Pdf">
  </form></center>



    <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">

     <thead>
  <tr>
    <th>id_ev</th>
    <th>name_event</th>
    <th>id_ac</th>
      <th>username</th>


      <th >current</th>
    <th >capacity</th>
    <th >price</th>
    <th>type</th>
        <th>address</th>
      <th>time</th>
    <th>day</th>
    <th>month</th>
      <th>date</th>
    <th>action</th>


  </tr>
</thead>
<tbody>
  <?php foreach($people as $person): ?>

    <tr>
      <td><?= $person->get_id_ev(); ?></td>
      <td><?= $person->get_name_event(); ?></td>
      <td><?= $person->get_id_ac(); ?></td>

      <?php

        $a=$db->loadAccount($person->get_id_ac());
        ?>

      <td><?= $a->getUsername() ?></td>
        <td><?= $person->get_current_capacity(); ?></td>
      <td><?= $person->get_capacity(); ?></td>
      <td><?= $person->get_free(); ?></td>
      <td><?= $person->get_type(); ?></td>
        <td><?= $person->get_location(); ?></td>

      <td><?= $person->get_time(); ?></td>




      <?php


      ?>
      <?php   $date=date_create($person->get_date());
          $day=date_format($date,"N");

        if (date_format($date,"N")==1) {
            $day='Monday';
        }elseif (date_format($date,"N")==2) {
            $day='Tuesday';
        }elseif (date_format($date,"N")==3) {
            $day='Wednesday';
        }elseif (date_format($date,"N")==4) {
            $day='Thursday';
        }elseif (date_format($date,"N")==5) {
            $day='Friday';
        }elseif (date_format($date,"N")==6) {
            $day='Saturday';
        }elseif (date_format($date,"N")==7) {
          $day='Sunday';
        }

      ?>
      <td ><?= $day ?></td>

      <?php   $date=date_create($person->get_date());
          $month=date_format($date,"n");

        if ($month==1) {
            $month='January('.$month.') ';
        }elseif ($month==2) {
              $month='February('.$month.') ';
        }elseif ($month==3) {
              $month='March('.$month.') ';
        }elseif ($month==4) {
              $month='April('.$month.') ';
        }elseif ($month==5) {
              $month='May('.$month.') ';
        }elseif ($month==6) {
              $month='June('.$month.') ';
        }elseif ($month==7) {
            $month='July('.$month.') ';
        }elseif ($month==8) {
            $month='August('.$month.') ';
        }elseif ($month==9) {
            $month='September('.$month.') ';
        }elseif ($month==10) {
            $month='October('.$month.') ';
        }elseif ($month==11) {
            $month='November('.$month.') ';
        }elseif ($month==12) {
            $month='December('.$month.') ';
        }

      ?>
      <td><?= $month ?></td>
      <td><?= $person->get_date(); ?></td>

      <textarea hidden id="<?= $person->get_id_ev() ?>"  rows="8" cols="80" ><?= $person->get_detail() ?></textarea>
      <textarea hidden id="<?= $person->get_id_ev() ?>_2"  rows="8" cols="80" ><?= $person->get_location() ?></textarea>
      <td>

        <form class="" action="attendantstable.php" method="get">
            <input hidden type="text" name="id_ev" value="<?= $person->get_id_ev()?>">
          <input class="btn btn-info" type="submit" name="submit" value="button">
        </form>

        <button class="btn btn-info" onclick="ball('<?= $person->get_id_ev() ?>','<?= $person->get_id_ac() ?>','<?= $person->get_name_event() ?>
          ','<?= $person->get_image() ?>','<?= $person->get_teaser_VDO() ?>','<?= $person->get_date() ?>','<?= $person->get_time() ?>
          ','<?= $person->get_map() ?>','<?= $person->get_capacity() ?>','<?= $person->get_free() ?>','<?= $person->get_type() ?>','<?= $person->get_current_capacity() ?>')">Edit</button>

        <a onclick="return confirm('Are you sure you want to delete this entry?')" href="delete.php?id_ev=<?= $person->get_id_ev() ?>" class='btn btn-danger'>Delete</a>
      </td>
    </tr>
  <?php endforeach;
  ?>



</tr>
</tbody>
</table>




<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content" >
    <div class="modal-header">
      <span class="close">&times;</span>

    </div>
    <div class="modal-body">

            <form id="formupdate" action="update.php" method="post" enctype="multipart/form-data" >
              <input hidden id="id_ev" type="text" name="id_ev" value="">
                <input hidden id="id_ac" type="text" name="id_ac" value="">
                <input hidden id="current" type="text" name="current" value="">

              <div class="input-group input-group-sm mb-3" style="padding-right:35%">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroup-sizing-sm"  style="color:#343A40  ;margin-top:10px ;  font-size:18px ;background-color: #00cc99;">Name event</span>
                </div>
                <input id='nameevent' required value="" onkeypress="return event.keyCode != 13;" type="text"  name="nameevent" size="50px" style="margin-top:10px ;  " class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" >
              </div>


              <!-- details: -->
              <div class="input-group input-group-sm mb-3 detailbox"  style="padding-right:35%">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroup-sizing-sm" style="color:343A40 ; font-size:18px ;background-color: #00cc99;" >Details</span>
                  <textarea id="textarea" rows=5% cols="50%" name="detail" >
                  </textarea>
                </div>
                <!-- <input type="text"  name="comment"  class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" > -->
              </div>

              <!-- <br> -->
              <!-- <div class="detailbox">
                <textarea rows="4" cols="50" name="comment" >
                </textarea>
              </div> -->



              <div class="input-group input-group-sm mb-3 "  style="padding-right:68%">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroup-sizing-sm" style="color:343A40 ; margin-top:10px ;  font-size:18px ;background-color: #00cc99;">Date</span>
                </div>
                <input id='date' required value="" onkeypress="return event.keyCode != 13;" type="date"  name="date" size="50px" style="margin-top:10px ; "class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" >
              </div>
              <!-- date:<input type="date" name="date" > -->



              <!-- time:<input type="number" name="hours" min="1"max="12">:<input type="number" name="minute"min="0" max="59"><input type="radio" name="am" value="am">am <input type="radio" name="pm" value="pm">pm -->


              <div class="input-group input-group-sm mb-3" style="padding-right:68%">
                <div class="input-group-prepend">
                  <span class="input-group-text form-control " type="time" value="00:00:00"  id="example-time-input" style="color:343A40 ; font-size:18px ;background-color: #00cc99;">Time</span>
                </div>
                <input id='time' required value="" onkeypress="return event.keyCode != 13;" type="time" name="time"  size="50px" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" >
              </div>

              <!-- <label for="example-time-input" class="col-2 col-form-label">Time</label>
              <input class="form-control" type="time" value="00:00:00" id="example-time-input"> -->




          <div class="input-group input-group-sm mb-3 detailbox" style="padding-right:35%">
            <div class="input-group-prepend" style="padding-right:68%">
              <span class="input-group-text" id="example-time-input" style="color:343A40 ; font-size:18px ;background-color: #00cc99;" >Location</span>
              <textarea id="location" rows=5% cols="50%" name="location" >
              </textarea>
            </div>



          <input onkeypress="return event.keyCode != 13;" id="pac-input" class="controls" type="text" placeholder="Search Box">


          <div id="map"></div>

          <script>
          var b=1;
          var map;
          var markers = [];

            function initAutocomplete() {
               map = new google.maps.Map(document.getElementById('map'), {
                center: {lat:13.7563, lng: 100.5018},
                zoom: 10,
                mapTypeId: 'roadmap'
              });
              var input = document.getElementById('pac-input');
              var searchBox = new google.maps.places.SearchBox(input);
              map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
              map.addListener('bounds_changed', function() {
                searchBox.setBounds(map.getBounds());
              });


              searchBox.addListener('places_changed', function() {
                var places = searchBox.getPlaces();
                if (places.length == 0) {
                  return;
                }
                markers.forEach(function(marker) {
                  marker.setMap(null);
                });
                // markers = [];
                var bounds = new google.maps.LatLngBounds();
                places.forEach(function(place) {
                  if (!place.geometry) {
                    console.log("Returned place contains no geometry");
                    return;
                  }
                  var icon = {
                    url: place.icon,
                    size: new google.maps.Size(71, 71),
                    origin: new google.maps.Point(0, 0),
                    anchor: new google.maps.Point(17, 34),
                    scaledSize: new google.maps.Size(25, 25)
                  };
                  markers.push(new google.maps.Marker({
                    map: map,
                    icon: icon,
                    title: place.name,
                    position: place.geometry.location
                  }));
                  if (place.geometry.viewport) {
                    bounds.union(place.geometry.viewport);
                  } else {
                    bounds.extend(place.geometry.location);
                  }
                });
                map.fitBounds(bounds);
              });

            map.addListener('click', function(event) {
            addMarker(event.latLng);
          });

          function addMarker(location) {

                  setMapOnAll(null);
                   // markers = [];
                 var marker = new google.maps.Marker({
                   position: location,
                   map: map
                 });
                 markers.push(marker);
                 document.getElementById("latlng").value = location.lat()+","+location.lng();
               }

               function setMapOnAll(map) {
                 for (var i = 0; i < markers.length; i++) {
                   markers[i].setMap(map);
                 }

               }

              }


          </script>
          <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDPofnI_kmNRH6rSTH-AZbIwQiywFwQLmk&libraries=places&callback=initAutocomplete"
          async defer></script>

          <br>
          <input hidden latlng id="latlng" type="text" name="latlng" value="">
          <br>
          <br>



          <br>
          <div class="input-group input-group-sm mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroup-sizing-sm" style="color:343A40 ; margin-top:10px ; font-size:18px ;background-color: #00cc99;">Capacity</span>
          </div>
          <input id='capacity' required value="" onkeypress="return event.keyCode != 13;" type="number"  name="capacity"  min="1" size="40px" style="margin-top:10px ; "  class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" >
          </div>

          <br>
          <br>

          <br>


          <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroup-sizing-sm" style="color:343A40 ; margin-top:10px ; font-size:18px ;background-color: #00cc99;">Price(bath)</span>
          </div>
          <input  id="price" required value="" onkeypress="return event.keyCode != 13;" type="number"  name="free"  min="0" size="40px" style="margin-top:10px ; "  class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" >
          </div>


          <h1 style="color:#5FBF89 ; font-size:22px ; padding-right:10px">Image</h1>
          <div id="filediv">
            <input name="fileimage0" class="btn btn-info" type="file" id="file"/>
          </div>
          <input  onclick="numfile2()" type="button" id="add_more" class="upload btn btn-info" value="Add More Files"/>
              <input  id='numfile'  type="text" name="numfile" value="0" >


          <!-- <h1 style="color:#5FBF89 ; font-size:22px ; padding-right:10px">Image</h1> -->

          <!-- <form class="" action="index.html" method="post" enctype="multipart/form-data"> -->
          <!-- <img id="imageold" style="height:150px;weight:150px;"  src='/project/picture/img/icon.png' >
          <input  hidden id='imageNew' type="text" name="imageNew" value="" >
          <br>
          <input onchange="readURL(this)" onkeypress="return event.keyCode != 13;" type="file" class="btn btn-success"   style="margin-bottom:10px"  id="inputGroupFile02" name="fileimage"  > -->

          <!-- <input  type="file" name="image"> -->


          <br>
          <h1 style="color:#25A2B7 ; font-size:22px ;padding-right:10px">Teaser</h1>

          <!-- <input type="file" name="teaser" > -->
          <video src='' id="video" width="320" height="240" controls autoplay preload="none">
            <source type="video/mp4">
            <source type="video/ogg">
            Your browser does not support the video tag.
          </video>

          <input  hidden id='videoNew' type="text" name="videoNew" value="" >

          <input onchange="readURL(this)" onkeypress="return event.keyCode != 13;" type="file" class="btn btn-info" class="custom-file-input"  class="custom-file-label" style="margin-right:20px" id="inputGroupFile03" name="teaser">
          <br>


          <br>

            <p style="color:#343A40; font-size:20px;background-color:#20CB9A ;margin-right:93.6%">Type</p>
          <select id='type' class="typedetail" name="type">
            <option value="sport">sport</option>
            <option value="education">education</option>
            <option value="entertainment">entertainment</option>
            <option value="Workshops">Workshops</option>
            <option value="Technology">Technology</option>
            <option value="party">party</option>
          </select>
          <br>
          <br>

            <!-- <br> -->


            <input type="submit" class="btn btn-secondary" name="submit" value="submit" >


            </form>


            <br>




  </div>
</div>



  </body>
</html>
<script>

var modal = document.getElementById('myModal');


var span = document.getElementsByClassName("close")[0];

function ball(id_ev,id_ac,name_event,image,teaser_VDO,date,time,location,capacity,free,type,current) {
    modal.style.display = "block";

    document.getElementById("current").value=current.trim();
    document.getElementById("id_ac").value=id_ac.trim();
    document.getElementById("nameevent").value=name_event.trim();
    document.getElementById("textarea").value=document.getElementById(id_ev).value.trim();
    document.getElementById("location").value=document.getElementById(id_ev+"_2").value.trim();
    document.getElementById("date").value=date.trim();

    document.getElementById("time").value=time.trim();
    document.getElementById("capacity").value=capacity.trim();
    document.getElementById("price").value=free.trim();
    document.getElementById("latlng").value=location.trim();

    document.getElementById("video").src=teaser_VDO.trim();
    document.getElementById("videoNew").value=teaser_VDO.trim();




    var element = document.getElementById('type');
    element.value = type.trim();

    var res = location.split(",");

      var latlng = {lat: parseFloat(res[0]), lng: parseFloat(res[1])};
      console.log(latlng);

    map.setCenter(latlng);
    for (var i = 0; i < markers.length; i++) {
      markers[i].setMap(null);
    }
    var marker = new google.maps.Marker({
      position: latlng,
      map: map
    });
    markers.push(marker);

}




span.onclick = function() {
    modal.style.display = "none";
    document.getElementById("video").src='';
}


window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
        document.getElementById("video").src='';
    }

}
function readURL(input) {
  var id = input.id;
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
          console.log(e.target.result);
            if (id == "inputGroupFile02"){
              $('#imageold').attr('src', e.target.result);
            } else {
              $('#video').attr('src', e.target.result);
            }

        }

        reader.readAsDataURL(input.files[0]);
    }
}

function readURL(input) {
  var id = input.id;
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
          console.log(e.target.result);
            if (id == "inputGroupFile02"){
              $('#image').attr('src', e.target.result);
            } else {
              $('#video').attr('src', e.target.result);
            }

        }

        reader.readAsDataURL(input.files[0]);
    }
}
function numfile2(){
    document.getElementById("numfile").value=num+1;
}

</script>
<?php
      if (isset($_GET['day'])) {
          echo "<script>document.getElementById('day2').checked = true;</script>";
          }

      if (isset($_GET['id'])) {
            echo "<script>document.getElementById('id2').checked = true;</script>";
      }
      if (isset($_GET['month'])) {
        echo "<script>document.getElementById('month2').checked = true;</script>";
      }
      if (isset($_GET['year'])) {
      echo "<script>document.getElementById('year2').checked = true;</script>";
      }
      if (isset($_GET['user'])) {
      echo "<script>document.getElementById('user2').checked = true;</script>";
      }
      if (isset($_GET['capacity'])) {
        echo "<script>document.getElementById('capacity2').checked = true;</script>";
      }
      if (isset($_GET['location'])) {
        echo "<script>document.getElementById('location2').checked = true;</script>";
      }


      ?>
