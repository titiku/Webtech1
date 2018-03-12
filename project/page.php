
<html lang="en">
<?php
include_once("menubar.php");
use Oop\Database;
use Oop\Attendant;

  $database = new Database();
  $event = $database->loadEvent($_GET['id_ev']);


 ?>

  <head>
    <title>My page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel='stylesheet' type='text/css' href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script> -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
  <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
    <!-- <script src="https://code.jquery.com/jquery-4.0.0.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <style>


    /* The Modal (background) */
    .modal  {
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
        width: 50%;
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




    body {
      padding-top: 50px;
    }

    h1 {
      margin-bottom: 20px;
      padding-bottom: 9px;
      /* border-bottom: 1px solid #eee; */
    }

    .sidebar {
      position: fixed;
      top: 51px;
      bottom: 0;
      left: 0;
      z-index: 1000;
      padding: 20px;
      overflow-x: hidden;
      overflow-y: auto; /* Scrollable contents if viewport is shorter than content. */
      border-right: 1px solid #eee;
    }

    /* Sidebar navigation */
    .sidebar {
      padding-left: 0;
      padding-right: 0;
    }

    .sidebar .nav {
      margin-bottom: 20px;
    }

    .sidebar .nav-item {
      width: 100%;
    }

    .sidebar .nav-item + .nav-item {
      margin-left: 0;
    }

    .sidebar .nav-link {
      border-radius: 0;
    }

    .placeholders {
      padding-bottom: 3rem;
    }

    .placeholder img {
      padding-top: 1.5rem;
      padding-bottom: 1.5rem;
    }

    .banner {
      display: inline-block;
      text-align: left;
      vertical-align: middle;
    }
    .navbar-logo{
      margin-right: 1000px;
    }
    .mybar {
      width: 100%;
    }
    body {
  font-family: Arial;
  margin: 0;
}

* {
  box-sizing: border-box;
}

img {
  vertical-align: middle;
}

/* Position the image container (needed to position the left and right arrows) */
.container {
  position: relative;
}

/* Hide the images by default */
.mySlides {
  display: none;
}

/* Add a pointer when hovering over the thumbnail images */
.cursor {
  cursor: pointer;
}

/* Next & previous buttons */
.prev,
.next {
  cursor: pointer;
  position: absolute;
  top: 40%;
  width: auto;
  padding: 16px;
  margin-top: -50px;
  color: white;
  font-weight: bold;
  font-size: 20px;
  border-radius: 0 3px 3px 0;
  user-select: none;
  -webkit-user-select: none;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover,
.next:hover {
  background-color: rgba(0, 0, 0, 0.8);
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* Container for image text */
.caption-container {
  text-align: center;
  background-color: #222;
  padding: 2px 16px;
  color: white;
}

.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Six columns side by side */
.column {
  float: left;
  width: 16.66%;
}

/* Add a transparency effect for thumnbail images */
.demo {
  opacity: 0.6;
}

.active,
.demo:hover {
  opacity: 1;
}
#map {
  height: 50%;
  width: 60%;
  margin-top: 10px;
}

</style>
  </head>
  <body>
       <center> <h1>Name Event: <?php echo $event->get_name_event() ?></h1></center>
       <br>
    <?php
    $list = explode(",", $event->get_image() );
    $check = 0;
    for ($i=0; $i <count($list) ; $i++) {
      if ($list[$i]!="/project/picture/img/icon.png"){
        $check = $check+1;
      }
    }

    if ($check > 0){
      echo '<h2 style="text-align:center">Photo</h2>
      <div class="container" style="width:60%;height:50%">';
    }

       // echo count($list);

          for ($i=0; $i <count($list) ; $i++) {
            if ($list[$i]!="/project/picture/img/icon.png"){
              echo '  <div class="mySlides">
                   <div class="numbertext">1 / 2</div>
                   <img src="'. $list[$i] .'" style="width:100%;display: block;height: 300px;object-fit: contain;">
                 </div>';
            }
          }



          if ($check > 0){
            echo '<a class="prev" onclick="plusSlides(-1)">❮</a>
            <a class="next" onclick="plusSlides(1)">❯</a>
            <div class="caption-container">
              <p id="caption"></p>
            </div>
            <div class="row">';
          }


         for ($i=0; $i <count($list) ; $i++) {
           // echo $list[$i];
           // echo "<br>";
           if ($list[$i]!="/project/picture/img/icon.png"){
             echo '  <div class="column">
               <img class="demo cursor" src="'.$list[$i]. '" style="padding:0%;  width:100%;height:30%;display: block;object-fit: contain;" onclick="currentSlide('.((int)$i+1).')">
             </div>';
            }
         }
          ?>




       </div>
     </div><br><br><br>

     <div class="">
       <center><?php if ($event->get_teaser_VDO() != '/project/picture/img/no-video.png'){ echo '<h2 style="text-align:center">Teaser Video</h2><video src="'.$event->get_teaser_VDO().'"  controls style="width:60%;height:50%"></video>'; } ?>
         <br><br>


         <h1>Detail</h1>


         <p style="word-wrap: break-word;width:60%"><?php echo $event->get_detail() ?></p><br>

              <h1>location</h1>
              <p><?=$event->get_location() ?></p>




                  <div id="map"></div>

                  <script>
                  var map;
                  var markers = [];

                    function initAutocomplete() {
                      var map = new google.maps.Map(document.getElementById('map'), {
                        center: {lat:13.7563, lng: 100.5018},
                        zoom: 10,
                        mapTypeId: 'roadmap'
                      });







                  //   map.addListener('click', function(event) {
                  //   addMarker(event.latLng);
                  // });

                  function addMarker(location) {

                          setMapOnAll(null);
                           markers = [];
                         var marker = new google.maps.Marker({
                           position: location,
                           map: map
                         });
                         markers.push(marker);

                         // document.getElementById("latlng").value = location.lat()+","+location.lng();

                       }

                       function setMapOnAll(map) {
                         for (var i = 0; i < markers.length; i++) {
                           markers[i].setMap(map);
                         }

                       }

                        var location='<?php echo $event->get_map(); ?>';
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
                  </script>
                  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDPofnI_kmNRH6rSTH-AZbIwQiywFwQLmk&libraries=places&callback=initAutocomplete"
                  async defer></script>



         <p>

           <!-- <a href="#" class="btn btn-secondary">แชร์</a> -->
       <p class="lead text-muted">จำนวนผู้เข้าร่วม</p>
       <div class="progress mybar" style="background-color: gray;width:60%">

         <div class="progress-bar bg-blue progress-bar-striped progress-bar-animated " style="width:<?php echo strval(($event->get_current_capacity()/$event->get_capacity())*100); ?>%" ><span style="color:black;"><?php echo strval($event->get_current_capacity())."/".strval($event->get_capacity()); ?></span></div>
       </div><br><br>

        <h1>precondition: <?= $event->get_precondition()?> Baht</h1>
       <h1>Price: <?= $event->get_free()?> Baht</h1>
       <?php
       if (isset($_SESSION['user'])){
                if ($event->get_current_capacity() < $event->get_capacity()){
                  if ($_SESSION['user']->getStatus()!='y'){
                      echo '<button  class="btn btn-primary" onclick="myFunction()" type="button" name="button">submit</button>';
                  }else{
                        echo '<a onclick="callmodal()"  class="btn btn-primary">เข้าร่วม</a>';
                  }
                } else {
                  echo '<a class="btn btn-primary" style="color:white">เต็ม</a>';
                }
              } else {
                if ($event->get_current_capacity() < $event->get_capacity()){
                  echo '<a href="login.php?id_ev='.$_GET['id_ev'].'" class="btn btn-primary">เข้าร่วม</a>';
                } else {
                  echo '<a class="btn btn-primary" style="color:white">เต็ม</a>';
                }
              }


        ?>
       <!-- <a href="#" class="btn btn-primary">เข้าร่วม</a> -->
     </center><br><br><br>
     </div>


     <center><p style="width:80%;border-bottom: 3px solid lightgray;"></p>
      <div class="" style="text-align:left;width:60%;">
        <h2>All Comments</h2>
        <?php
           $comments = $database->loadComments($_GET['id_ev']);
           $count = 1;
           foreach ($comments as $value) {
              $username = $database->loadUsername($value->get_id_ac());
              if (isset($_SESSION['user']) && ($_SESSION['user']->getIdAcount() == $value->get_id_ac() || $_SESSION['user']->getType() == 'admin' || $database->checkEventOfAccount($_GET['id_ev']) != '')){
                $output = '<div style="border-style: groove;width:100%;margin-bottom:3%"><p style="word-wrap: break-word;padding:2%">Comment '.$count.'<a style="text-decoration: none;margin-left:82%" onclick="'."return confirm('Are you sure you want to delete this comment?')".'" href="deleteComment.php?id_co='.$value->get_id_co().'&id_ac='.$_SESSION['user']->getIdAcount().'&id_ev='.$value->get_id_ev().'"><font style="color:red">Delete</font></a></p><p style="word-wrap: break-word;padding:2%">'.$value->get_message().'</p><p style="word-wrap: break-word;padding:2%">Comment by '.$username.' Date: '.$value->get_date().' Time: '.$value->get_time().'น.</p></div>';
              } else {
                $output = '<div style="border-style: groove;width:100%;margin-bottom:3%"><p style="word-wrap: break-word;padding:2%">Comment '.$count.'</p><p style="word-wrap: break-word;padding:2%">'.$value->get_message().'</p><p style="word-wrap: break-word;padding:2%">Comment by '.$username.' Date: '.$value->get_date().' Time: '.$value->get_time().'น.</p></div>';
              }
              $count = $count+1;
              echo $output;
            }
         ?>
      </div>

      <center><p style="width:80%;border-bottom: 3px solid lightgray;"></p>
      <div class="" style="text-align:left;width:60%;">
        <h2>Comment</h2>
        <form id="comment" class="" action="comment.php" method="post">
          <textarea required style="width:100%;resize: none;" name="comment" rows="8" cols="80" Type="text" placeholder="Enter your comment"></textarea><br>
          <input type="submit" name="" value="Sent">
          <input type="text" hidden name="id_ev" value="<?php echo $_GET['id_ev']; ?>">
          <input type="text" hidden name="id_ac" value="<?php if (isset($_SESSION['user'])){echo $_SESSION['user']->getIdAcount();} ?>">
        </form>
        <br><br>
      </div>
      </center>




     <div id="myModal" class="modal" >

       <div class="modal-content" >
         <div class="modal-header">
           <span class="close">&times;</span>

         </div>
         <div class="modal-body">
           <h1>อัพรูปหลักฐานการโอนเงินและบัตรประชาชน</h1>
           <form id='mo1' class="" action="addpage.php" method="post" enctype="multipart/form-data">

           <center><img id="imageold1" style="height:150px;weight:150px;"  src='/project/picture/img/icon.png' > </center>
            <input  hidden id='imageNew1' type="text" name="imageNew1" value="" >
             <input onchange="readURL1(this)" type="file" class="form-control" id="inputGroupFile02" name='file1'>
             <br>

             <center><img id="imageold2" style="height:150px;weight:150px;"  src='/project/picture/img/icon.png' > </center>
              <input  hidden id='imageNew2' type="text" name="imageNew2" value="" >
               <input onchange="readURL2(this)" type="file" class="form-control" id="inputGroupFile02" name='file2'>
               <br>

               จำนวนที่จะจอง <input type="number" name="capacity" value="" required='' min='1' max='<?= $event->get_capacity()-$event->get_current_capacity()?>'>

         </div>
            <input hidden type="text" name="id_ev2" value='<?= $event->get_id_ev() ?>' >

         <div class="modal-footer">
             <input class='btn btn-danger'  type="submit" name="submit" value="OK">
         </form>
         </div>
       </div>
     </div>



     <script>
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  var captionText = document.getElementById("caption");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  try {
    slides[slideIndex-1].style.display = "block";
    dots[slideIndex-1].className += " active";
    captionText.innerHTML = dots[slideIndex-1].alt;
  }
  catch(err) {

  }

}


var modal = document.getElementById('myModal');

var span = document.getElementsByClassName("close")[0];
  function callmodal(){
    console.log('ball');
    modal.style.display = "block";
  }




  span.onclick = function() {
      modal.style.display = "none";
  }


  window.onclick = function(event) {
      if (event.target == modal) {
          modal.style.display = "none";
      }

  }

  function readURL1(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function (e) {
              $('#imageold1').attr('src', e.target.result);
          }

          reader.readAsDataURL(input.files[0]);
      }
  }
  function readURL2(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function (e) {
              $('#imageold2').attr('src', e.target.result);
          }

          reader.readAsDataURL(input.files[0]);
      }
  }

  function myFunction() {
      alert("Please verify email.");

  }
</script>

  </body>
</html>
