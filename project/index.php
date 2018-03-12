<!DOCTYPE html>
<?php include_once("menubar.php"); ?>
<html>
  <head>
    <meta charset="utf-8">
    <title style="font-family: 'Roboto Condensed', sans-serif;">Surat Garden</title>
    <style media="screen">
    @import url('https://fonts.googleapis.com/css?family=Roboto+Condensed');
      .contain_box{
        text-align: center;
        /* font-family: 'Itim', cursive; */
        font-size : 30px;
        display : flex;
        flex-direction : row;
        flex-wrap : wrap;
        justify-content : center;
        align-items: center;
        /* border: 5px solid #00e676; */
        /* background-color:lightyellow; */
        width: 100%;
      }

      .box{
        border: 3px solid #A1B0BF;
        height: 300px;
        width: 350px;
        margin: 3%;
      }

      #event > form{
           background-position: center;
           background-repeat: no-repeat;
           background-size: cover;

             padding: 20px 20px ;
             border:2px  ;
             border:2px solid black ;
             border-color: #A1B0BF ;
             border-width: 2px;
             border-radius: 5%;
             margin:40px 250px 250px 250px;
             margin: auto;
             margin-top: 40px ;
             /* width: 80%; */
             font-family: 'Roboto Condensed', sans-serif;
      }
      p,span{

        font-size: 30px;
        color: #404D5D;
        text-shadow:3px 3px 30px #C3CED1 ;
        font-family: 'Roboto Condensed', sans-serif;


      }
      body{
          /* background-image: url("/project/picture/img/gray2.jpg"); */
          background-color: #FFFFFF;
          background-size: cover ;
          background-attachment: fixed;
      }

      .round {
        border-radius: 50%;
        padding: 10px 16px;
      }

      .green {
        background-color: #4CAF50;
        color: white;
      }
      @keyframes example {


    0%   { left:0px; top:0px;}
    25%  {color:#F24664; left:0px; top:40px;}
    50%  { left:0px; top:0px;}
    75%  {color:#F24664; left:0px; top:0px; transform: rotateX(50deg)}
    100% {color:#404D5C; left:0px; top:0px;}
}

    </style>


      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  </head>
  <body >
    <br>

    <center><p style=" height: 100px;

    position: relative;
    -webkit-animation-name: example; /* Safari 4.0 - 8.0 */
    -webkit-animation-duration: 4s; /* Safari 4.0 - 8.0 */
    animation-name: example;
    animation-duration: 5s;">What do you love?<br>
      Do more of it with Meetup</p></center><br>

    <center><img src="/project/picture/img/people.png" style="opacity: 0.9;" class="img-rounded " alt="Cinque Terre" width="30%"></center>

    <p style="margin:40px 50px 40px ;">Meetups Lists</p>


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
          <option  value="2018">2018</option>
          <option  value="2019">2019</option>
          <option  value="2020">2020</option>
        </select>
        <input type="text" name="searchusername" value="" placeholder="Search Username">
        <input type="text" name="searchaddress" value="" placeholder="Search Address">
        <input type="submit" name="" value="Search">
    </form></center>

    <?php
    require 'vendor/autoload.php';
    use Oop\Account;
    use Oop\Database;
    use Oop\Event;


    $database = new Database();
    $numberOfEventForPerPage = 15;
    $events = $database->loadEvents();
    $people=$events;
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
    $events=$people;

    function renderEvents($events,$page,$numberOfEventForPerPage){
      for ($i = ($page*$numberOfEventForPerPage)-$numberOfEventForPerPage; $i < count($events) && $i < $page*$numberOfEventForPerPage; $i++){
            $pic=$events[$i]->get_image();
            $listimg = explode(",", $pic);
            // echo count($listimg);
              $pic2="/project/picture/img/icon.png";
          for ($a=0; $a <count($listimg) ; $a++) {
              if ($listimg[$a]!="/project/picture/img/icon.png"){
                  $pic2=$listimg[$a];
                  break;
              }
          }

        $output = '<form id="form'.$i.'" class="box" action="page.php" method="get" style="background-image: url('.$pic2.') ">
                      <input hidden type="text" name="id_ev" value="'.$events[$i]->get_id_ev().'">
                      <div style="word-wrap: break-word;width: 100%;height:100%;" >'.($i+1).'.'.$events[$i]->get_name_event().'</div>
                      <input hidden type="submit" value="Submit">
                  </form>'

                  ;



        echo $output;

      }
    }
    $totalNumberPage = ceil(count($events)/$numberOfEventForPerPage);
    if ($totalNumberPage == 0){
      $totalNumberPage = 1;
    }
    echo '<div id="event" class="contain_box">';
    if (isset($_GET['page'])){
      if ($_GET['page'] > $totalNumberPage){
        $page = $totalNumberPage;
      } else if ($_GET['page'] < 1){
        $page = 1;
      } else {
        $page = $_GET['page'];
      }
    } else {
      $page = 1;
    }
    renderEvents($events,$page,$numberOfEventForPerPage);
    echo '</div>';

    $movePage;
    if ($page == $totalNumberPage && $page != 1){
      $movePage = '<div class="contain_box" style="width:100%; padding:5%">
                      <form id="backPage" class="" action="" method="get">
                        <a id="backPageBth" style="text-decoration: none" class="green round">&#8249;</a>
                        <input hidden type="number" name="page" value="'.strval($page-1).'">
                      </form>
                      <form id="gotoPage" class="" action="" method="get">
                        <input type="number" style="width:60%" name="page" min="1" max="'.strval($totalNumberPage).'" value="'.$page.'"><span>/'.strval($totalNumberPage).'</span>
                      </form>
                      <form id="nextPage" hidden class="" action="" method="get">
                        <a id="nextPageBth" style="text-decoration: none" class="green round">&#8250;</a>
                        <input hidden type="number" name="page" value="'.strval($page+1).'">
                      </form>
                   </div>';
    } else if ($page == 1 && $page != $totalNumberPage){
      $movePage = '<div class="contain_box" style="width:100%;padding:5%">
                      <form id="backPage" hidden class="" action="" method="get">
                        <a id="backPageBth" style="text-decoration: none" class="green round">&#8249;</a>
                        <input hidden type="number" name="page" value="'.strval($page-1).'">
                      </form>
                      <form id="gotoPage" class="" action="" method="get">
                        <input type="number" style="width:60%" name="page" min="1" max="'.strval($totalNumberPage).'" value="'.$page.'"><span>/'.strval($totalNumberPage).'</span>
                      </form>
                      <form id="nextPage" class="" action="" method="get">
                        <a id="nextPageBth" style="text-decoration: none" class="green round">&#8250;</a>
                        <input hidden type="number" name="page" value="'.strval($page+1).'">
                      </form>
                   </div>';
    } else if ($page == 1 && $page == $totalNumberPage){
      $movePage = '<div class="contain_box" style="width:100%;padding:5%">
                      <form id="backPage" hidden class="" action="" method="get">
                        <a id="backPageBth" style="text-decoration: none" class="green round">&#8249;</a>
                        <input hidden type="number" name="page" value="'.strval($page-1).'">
                      </form>
                      <form id="gotoPage" class="" action="" method="get">
                        <input type="number" style="width:60%" name="page" min="1" max="'.strval($totalNumberPage).'" value="'.$page.'"><span>/'.strval($totalNumberPage).'</span>
                      </form>
                      <form id="nextPage" hidden class="" action="" method="get">
                        <a id="nextPageBth" style="text-decoration: none" class="green round">&#8250;</a>
                        <input hidden type="number" name="page" value="'.strval($page+1).'">
                      </form>
                   </div>';
    } else {
      $movePage = '<div class="contain_box" style="width:100%;padding:5%">
                      <form id="backPage" class="" action="" method="get">
                        <a id="backPageBth" style="text-decoration: none" class="green round">&#8249;</a>
                        <input hidden type="number" name="page" value="'.strval($page-1).'">
                      </form>
                      <form id="gotoPage" class="" action="" method="get">
                        <input type="number" style="width:60%" name="page" min="1" max="'.strval($totalNumberPage).'" value="'.$page.'"><span>/'.strval($totalNumberPage).'</span>
                      </form>
                      <form id="nextPage" class="" action="" method="get">
                        <a id="nextPageBth" style="text-decoration: none" class="green round">&#8250;</a>
                        <input hidden type="number" name="page" value="'.strval($page+1).'">
                      </form>
                   </div>';
    }


    echo $movePage;

     ?>
     <!-- <script src="jquery-3.3.1.min.js" charset="utf-8"></script> -->

     <script type="text/javascript">
          $(document).ready(function(){
            console.log("Ready start");
            <?php
              function renderScriptEvents($events,$page,$numberOfEventForPerPage){
                for ($i = ($page*$numberOfEventForPerPage)-$numberOfEventForPerPage; $i < count($events) && $i < $page*$numberOfEventForPerPage; $i++){
                $output = '$("#form'.$i.'").on({
                  click: function(){
                    document.getElementById("form'.$i.'").submit();
                  }
                });';
                echo $output;
                }
              }

              renderScriptEvents($events,$page,$numberOfEventForPerPage);

           ?>

           $("#backPageBth").on({
             click: function(){
               document.getElementById("backPage").submit();
             }
           });

           $("#nextPageBth").on({
             click: function(){
               document.getElementById("nextPage").submit();
             }
           });

          });
    </script>


    <br>
  </body>
</html>
