<html>
<?php include_once("menubar.php");
use Oop\Database;
use Oop\Account;
use Oop\Event;

if (isset($_SESSION['user'])){
  $user=$_SESSION['user'];
} else {
  echo '<script type="text/javascript">window.location.href = "index.php";</script>';
}

if ($_SESSION['user']->getType()=='attendant'){
  echo "<script type='text/javascript'>window.location.href = \"http://localhost/project/\";</script>";
}


if(isset($_POST['submit'])){
  $name=$_POST['nameevent'];
  $detail=$_POST['detail'];
  $date=$_POST['date'];
  $time=$_POST['time'];
  $location=$_POST['location'];
  $latlng=$_POST['latlng'];
  $capacity=$_POST['capacity'];
  $price=$_POST['free'];

  $img='fileimage';
  $teaser='teaser';

  $type=$_POST['type'];

  $totalimg='';
  for ($i=0; $i <=$_POST['numfile'] ; $i++) {
      if (isset($_FILES['fileimage'.$i])){
        $pic= basename($_FILES['fileimage'.$i]["name"]);
        $image= "/project/picture/event/$pic";
        if (move_uploaded_file($_FILES['fileimage'.$i]["tmp_name"],"picture/event/$pic")){
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

  if (move_uploaded_file($_FILES["teaser"]["tmp_name"],"picture/video/$video")){
      // echo "uploaded";
      // echo "<br>";
  }else{
      // echo "cant";
      $video2="/project/picture/img/no-video.png";
  }

}



$db=new Database();
// $count=$db->loadEvents();
// $num=0;
// if (sizeof($count)<=0){
//
// }else{
//   $num= $count[sizeof($count)-1]->get_id_ev();
// }
//
// $num+=1;

  // echo $totalimg;

$event = new Event(1,$_SESSION['user']->getIdAcount(),$name,$detail,$totalimg,$video2,$date,$time,$location,$latlng,0,$capacity,$price,$type,$_POST['precondition'],$_POST['create_time'],'y',$_POST['googleform'],$_POST['payment']);

    $db->addEvents($event);
   echo "<script type='text/javascript'>window.location.href = \"http://localhost/project\";</script>";

}
?>
  <head>
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
  border-radius: 25px;
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
      form{
        padding: 20px 20px ;
        border:2px  ;
        border:2px solid black ;
        border-color: #989090 ;
        border-width: 5px;
        border-radius: 25px;
        margin:40px 250px 250px 250px;
        margin: auto;
        margin-top: 40px ;
        width: 70%;
        font-family: 'Roboto Condensed', sans-serif;
        padding-left: 40px;
        padding-right: 40px ;
      }

      #map {
        height: 50%;
        width: 100%;
        margin-top: 10px;
      }

    </style>


    <title>even details</title>
    <script>
        // $(document).ready(function() {
        // $(window).keydown(function(event){
        //   if(event.keyCode == 13) {
        //     event.preventDefault();
        //     return false;
        //   }
        // });
        // });
        // $('textarea').keypress(function(event) {
        //    if (event.which == 13) {
        //       event.preventDefault();
        //       var s = $(this).val();
        //       $(this).val(s+"\n");
        //    }
        // });​
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
              src: 'picture/img/delete-button.png',
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


      <div class="container">
        <br>
      <form  action="" method="post" enctype="multipart/form-data" >

        <h2 style="color:#FFFFFF;margin-right:80% ; background-color:#343A40 ;padding:10px  ; padding-left:20px ;border-radius: 20px; " >Create Event</h2>
        <!-- name event:<input type="text" name:"event" size="50px"> -->

        <div class="input-group input-group-sm mb-3" style="padding-right:35%">
          <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroup-sizing-sm"  style="color:#343A40  ;margin-top:10px ;  font-size:18px ;background-color: #00cc99;border-radius: 20px;">Name event</span>
          </div>
          <input required value="" onkeypress="return event.keyCode != 13;" type="text"  name="nameevent" size="50px" style="margin-top:10px ;border-radius: 20px;  " class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" >
        </div>


        <!-- details: -->
        <div class="input-group input-group-sm mb-3 detailbox"  style="padding-right:35%">
          <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroup-sizing-sm" style="color:343A40 ; font-size:18px ;background-color: #00cc99;border-radius: 20px;" >Details</span>
            <textarea rows=6% cols="70%" name="detail" style="border-radius: 20px;" ></textarea>
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
            <span class="input-group-text" id="inputGroup-sizing-sm" style="color:343A40 ; margin-top:10px ;  font-size:18px ;background-color: #00cc99;border-radius: 20px; ">Date</span>
          </div>
          <input required value="" onkeypress="return event.keyCode != 13;" type="date"  name="date" size="50px" style="margin-top:10px; border-radius: 20px; "class="form-control; "  aria-label="Small" aria-describedby="inputGroup-sizing-sm" >
        </div>
        <!-- date:<input type="date" name="date" > -->



        <!-- time:<input type="number" name="hours" min="1"max="12">:<input type="number" name="minute"min="0" max="59"><input type="radio" name="am" value="am">am <input type="radio" name="pm" value="pm">pm -->


        <div class="input-group input-group-sm mb-3" style="padding-right:68%">
          <div class="input-group-prepend">
            <span class="input-group-text form-control " type="time" value="00:00:00"  id="example-time-input" style="color:343A40 ; font-size:18px ;background-color: #00cc99;border-radius:20px ;">Time</span>
          </div>
          <input required value="" onkeypress="return event.keyCode != 13;" type="time" name="time"  size="50px" style="border-radius: 20px;" class="form-control;" aria-label="Small" aria-describedby="inputGroup-sizing-sm" >
        </div>

        <!-- <label for="example-time-input" class="col-2 col-form-label">Time</label>
        <input class="form-control" type="time" value="00:00:00" id="example-time-input"> -->




    <div class="input-group input-group-sm mb-3 detailbox" style="padding-right:35%">
      <div class="input-group-prepend" style="padding-right:68%">
        <span class="input-group-text" id="inputGroup-sizing-sm" style="color:343A40 ; font-size:18px ;background-color: #00cc99;border-radius: 20px;" >Location</span>
        <textarea rows=5% cols="70%" name="location" style="border-radius: 20px;" ></textarea>
      </div>


    <br>
    <input onkeypress="return event.keyCode != 13;" id="pac-input" class="controls" type="text" placeholder="Search Box" style="border-radius: 20px;opacity:0.9">


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
             markers = [];
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
    <input hidden id="latlng" type="text" name="latlng" value="">
    <br>
    <br>



    <br>
    <div class="input-group input-group-sm mb-3">
    <div class="input-group-prepend">
      <span class="input-group-text" id="inputGroup-sizing-sm" style="color:343A40 ; margin-top:10px ; font-size:18px ;background-color: #00cc99;border-radius: 20px;">Capacity</span>
    </div>
    <input required value="" onkeypress="return event.keyCode != 13;" type="number"  name="capacity"  min="1" size="40px" style="margin-top:10px ;border-radius: 20px; "  class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" >
    </div>

    <br>
    <br>

    <br>


    <div class="input-group-prepend">
      <span class="input-group-text" id="inputGroup-sizing-sm" style="color:343A40 ; margin-top:10px ; font-size:18px ;background-color: #00cc99;border-radius: 20px;">Price(baht)</span>
    </div>
    <input  required value="" onkeypress="return event.keyCode != 13;" type="number"  name="free"  min="0" size="40px" style="margin-top:10px ;border-radius: 20px; "  class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" >
    </div>



    <h1 style="color:#5FBF89 ; font-size:22px ; padding-right:10px ;border-radius: 20px;">Image</h1>

    <!-- <form class="" action="index.html" method="post" enctype="multipart/form-data"> -->
    <!-- <img  id="image" style="height:200px;weight:200px;"  src="/project/picture/img/icon.png" > -->
    <br>
    <!-- <h2 style="color:#5FBF89 ; font-size:22px ; padding-right:10px ;border-radius: 20px;">Multiple Image Upload Form</h2> -->

    <div id="filediv">
      <input name="fileimage0" class="btn btn-info" type="file" id="file"/>
    </div>
    <input  onclick="numfile2()" type="button" id="add_more" class="upload btn btn-info" value="Add More Files"/>

    <!-- <input type="submit" value="Upload File" name="submit" id="upload" class="upload"/> -->

    <!-- <input onchange="readURL(this)" onkeypress="return event.keyCode != 13;" type="file" class="btn btn-success"   style="margin-bottom:10px"  id="inputGroupFile02" name="fileimage"  > -->

    <!-- <input  type="file" name="image"> -->


    <br>
    <h1 style="color:#25A2B7 ; font-size:22px ;padding-right:10px">Teaser</h1>
    <video id="video" width="320" height="240" controls autoplay preload="none">
      <source type="video/mp4">
      <source type="video/ogg">
      Your browser does not support the video tag.
    </video>

    <br>
    <input onchange="readURL(this);" onkeypress="return event.keyCode != 13;" type="file" class="btn btn-info" class="custom-file-input"  class="custom-file-label" style="margin-right:20px" id="inputGroupFile03" name="teaser">
    <br>


    <br>

      <p style="color:#343A40; font-size:20px;background-color:#20CB9A ;margin-right:93.6%;border-radius: 20px;">Type</p>
    <select class="typedetail" name="type" style="border-radius: 20px;">
      <option value="sport">sport</option>
      <option value="education">education</option>
      <option value="entertainment">entertainment</option>
      <option value="Workshops">workshops</option>
      <option value="Technology">technology</option>
      <option value="party">party</option>
    </select>
    <br>

    <br>
    <div class="input-group input-group-sm mb-3">
    <div class="input-group-prepend">
      <span class="input-group-text" id="inputGroup-sizing-sm" style="color:343A40 ; margin-top:10px ; font-size:18px ;background-color: #00cc99;border-radius: 20px;">precondition</span>
    </div>
    <input  onkeypress="return event.keyCode != 13;" type="text"  name="precondition"   size="40px" style="margin-top:10px ;border-radius: 20px; "  class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" >
    </div>
<!--
      <p style="color:#25A2B7; font-size:20px">
       Time Create:<?php date_default_timezone_set('Asia/Bangkok');
        echo date('Y-m-d H:i:s'); ?>
      </p> -->
      <input hidden type="text" name="create_time" value="<?php date_default_timezone_set('Asia/Bangkok');
       echo date('Y-m-d H:i:s'); ?>">
      <!-- <br> -->

        <input hidden id='numfile'  type="text" name="numfile" value="0" >


        <div class="input-group input-group-sm mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroup-sizing-sm" style="color:343A40 ; margin-top:10px ; font-size:18px ;background-color: #00cc99;border-radius: 20px;">Google Form URL</span>
        </div>
        <input  onkeypress="return event.keyCode != 13;" type="text"  name="googleform"   size="40px" style="margin-top:10px ;border-radius: 20px; "  class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" >
        </div>

        <div class="input-group input-group-sm mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroup-sizing-sm" style="color:343A40 ; margin-top:10px ; font-size:18px ;background-color: #00cc99;border-radius: 20px;">Payment</span>
        </div>
        <input  onkeypress="return event.keyCode != 13;" type="text"  name="payment"   size="40px" style="margin-top:10px ;border-radius: 20px; "  class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" >
        </div>

          <?php
              if($_SESSION['user']->getStatus()=='y'){
                  echo '<input  type="submit" class="btn btn-secondary" name="submit" value="submit" style="margin-left:75%" >';
              }else{
                    echo '<input  onclick="myFunction()" type="button" class="btn btn-secondary" name="submit" value="submit" style="margin-left:75%" >';

              }
           ?>

      </form>

    </div>
      <br>


  </body>
  <script type="text/javascript">
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

function myFunction() {
    alert("Please verify email.");

}

  </script>

</html>
