<?php
  include_once("../menubar.php");
  use Oop\Account;
  use Oop\Database;

  $db=new Database();
  $people=$db->loadAllaccounts();

  if (isset($_SESSION['user'])){
    if ($_SESSION['user']->getType()!='admin'){
      echo "<script type='text/javascript'>window.location.href = \"http://localhost/project/\";</script>";
    }
  }else {
    echo "<script type='text/javascript'>window.location.href = \"http://localhost/project/\";</script>";
  }


?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <style>

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
.close2  {
    color: white;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close2:hover,.close2:focus {
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
                  $('#example').DataTable();
                } );
        </script>
  </head>
  <body>


  <button class="btn btn-info" onclick="add()">Add user</button>
    <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">

     <thead>
  <tr>
    <th>ac_id</th>
    <th>username</th>
    <!-- <th>password</th> -->
    <th>firstname</th>
    <th>lastname</th>
    <th >age</th>
    <th >gender</th>
    <th>email</th>
    <th >phone</th>
    <th>address</th>
    <th >id</th>
    <th >type</th>
    <th >image</th>
    <th >status</th>
    <th>action</th>
  </tr>
</thead>
<tbody>
  <?php foreach($people as $person): ?>
    <tr>
      <td><?= $person->id_ac; ?></td>
      <td><?= $person->username; ?></td>
      <!-- <td><?= $person->password; ?></td> -->
      <td><?= $person->first_name; ?></td>
      <td><?= $person->last_name; ?></td>
      <td><?= $person->age; ?></td>
      <td><?= $person->gender; ?></td>
      <td><?= $person->email; ?></td>
      <td><?= $person->phone; ?></td>
      <td><?= $person->address; ?></td>
      <td><?= $person->ID; ?></td>

      <td><?= $person->type; ?></td>
      <?php

       $pic=$person->image;

      echo "  <td><img src=$pic class='rounded-circle' height='35' width='35'></td>";

       $person->address

      ?>
      </td>
      <?php
          if ($person->status=='y'){
              $m='verify email';
          }else if($person->status=='n'){
            $m='not verify email';
          }else{
            $m='baned';
          }
       ?>

      <td><?= $m ?></td>
      <td>


        <button class="btn btn-info" style="margin-bottom:20%;width:100%;" onclick="ball('<?= $person->username ?>','<?= $person->password ?>','<?= $person->first_name ?>
          ','<?= $person->last_name ?>','<?= $person->age ?>','<?= $person->gender ?>','<?= $person->email ?>','<?= $person->phone ?>
          ','<?= $person->address ?>','<?= $person->ID ?>','<?= $person->type ?>','<?= $person->image ?>','<?= $person->id_ac ?>','<?= $person->status ?>')">Edit</button>
          <a style="margin-bottom:20%;width:100%;" onclick="return confirm('Are you sure you want to ban this entry?')" href="ban.php?id_ac=<?= $person->id_ac ?>" class='btn btn-danger'>Ban</a>
        <!-- <a hidden onclick="return confirm('Are you sure you want to delete this entry?')" href="delete.php?id_ac=<?= $person->id_ac ?>" class='btn btn-danger'>Delete</a> -->

      </td>
    </tr>
  <?php endforeach;
  ?>

</tr>
</tbody>
</table>




<!-- The Modal -->
<div id="myModal" class="modal" >

  <div class="modal-content" >
    <div class="modal-header">
      <span class="close">&times;</span>

    </div>
    <div class="modal-body">
      <form id='mo1' class="" action="update.php" method="post" enctype="multipart/form-data">

          <input  hidden type="text" id="id_ac" name="id_ac" value=""></p>

        <div class="input-group input-group-sm mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroup-sizing-sm">username </span>
          </div>
        <input id='usernameNew' readonly type="text" name="usernameNew" value="" placeholder="Enter your username" required value="" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
        </div>

        <div class="input-group input-group-sm mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroup-sizing-sm">password </span>
          </div>
        <input readonly onclick="myFunction()" id='passwordNew' type="text" name="passwordNew" value="" placeholder="Enter password" required value="" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
        </div>

        <div class="input-group input-group-sm mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroup-sizing-sm">first_name </span>
          </div>
          <input id='first_nameNew' type="text" name="first_nameNew" value="" placeholder="ใส่ชื่อ" required value="" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
        </div>

        <div class="input-group input-group-sm mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroup-sizing-sm">last_name </span>
          </div>
          <input id='last_nameNew' type="text" name="last_nameNew" value="" placeholder="ใส่นามสกุล" required value="" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
        </div>

        <div class="input-group input-group-sm mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroup-sizing-sm">age </span>
          </div>
            <input id='ageNew' type="number" name="ageNew" value="" placeholder="อายุ" min="1" max="200"  data-format = "iii" required value="" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
        </div>

        <div class="input-group input-group-sm mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroup-sizing-sm">gender </span>
          </div>
          <select id="genderNew" name="genderNew">
            <option  value="m">ชาย</option>
             <option  value="f">หญิง</option>
           </select>
        </div>

          <div class="input-group input-group-sm mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="inputGroup-sizing-sm">email </span>
            </div>
            <input id='emailNew' type="email" name="emailNew" value="" placeholder="ใส่อีเมล" value="" required value="" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
          </div>

          <div class="input-group input-group-sm mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="inputGroup-sizing-sm">phone </span>
            </div>
            <input id='phoneNew' type="text" name="phoneNew" value="" placeholder="เบอร์โทร" minlength="9" maxlength="10" required value="" onKeyUp="if(this.value*1!=this.value) this.value='' ;" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
          </div>

      <!-- address : <input id='addressNew' type="text" name="addressNew" value="" placeholder="ที่อยู่" value=""><br><br> -->

      <div class="input-group input-group-sm mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroup-sizing-sm">Address</span>
        </div>
        <!-- <textarea input id='addressNew' rows="3" cols="20" name="addressNew" ></textarea> -->
        <input type="text" id="addressNew" name="addressNew" value=""  placeholder="ที่อยู่" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
      </div>

      <div class="input-group input-group-sm mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroup-sizing-sm">id </span>
        </div>
        <input id='idNew' type="text" name="idNew" value="" placeholder="รหัสบัตรประชาชน"
          onKeyUp="if(this.value*1!=this.value) this.value='' ;"  minlength = "13" maxlength = "13" data-format = "ddddddddddddd" required value="" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
      </div>

      <center><img id="imageold" style="height:150px;weight:150px;"  src='/project/picture/img/icon.png' > </center>
       <input  hidden id='imageNew' type="text" name="imageNew" value="" >
        <input onchange="readURL(this)" type="file" class="form-control" id="inputGroupFile02" name='file'>
        <br>


      <div class="input-group input-group-sm mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroup-sizing-sm">type </span>
        </div>
        <select id="select" name="select">
           <option  value="admin">admin</option>
            <option  value="organizer">organizer</option>
            <option  value="attendant">attendant</option>
          </select>
      </div>
    </div>

    <input hidden id='statusNew' type="text" name="statusNew" value="">
    <div class="modal-footer">
        <input class='btn btn-danger'  type="submit" name="" value="OK">
    </form>
    </div>
  </div>
</div>

<div id="myModal2" class="modal" >
  <div class="modal-content" >
    <div class="modal-header">
      <span class="close2" >&times;</span>
    </div>
    <div class="modal-body">
      <form id='mo1' class="" action="add.php" method="post" enctype="multipart/form-data">


        <div class="input-group input-group-sm mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroup-sizing-sm">username </span>
          </div>
        <input  type="text" name="username" value="" placeholder="Enter your username" required value="" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
        </div>

        <div class="input-group input-group-sm mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroup-sizing-sm">password </span>
          </div>
        <input type="text" name="password" value="" placeholder="Enter password" required value="" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
        </div>

        <div class="input-group input-group-sm mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroup-sizing-sm">first_name </span>
          </div>
        <input type="text" name="first_name" value="" placeholder="ใส่ชื่อ" required value="" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
        </div>

        <div class="input-group input-group-sm mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroup-sizing-sm">last_name </span>
          </div>
        <input  type="text" name="last_name" value="" placeholder="ใส่นามสกุล" required value="" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
        </div>

        <div class="input-group input-group-sm mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroup-sizing-sm">age </span>
          </div>
        <input  type="number" name="age" value="" placeholder="อายุ" min="1" max="999"  data-format = "iii" required value="" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
        </div>

        <div class="input-group input-group-sm mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroup-sizing-sm">gender </span>
          </div>
          <select  name="gender">
             <option  value="m">ชาย</option>
              <option  value="f">หญิง</option>
            </select>
          </div>


          <div class="input-group input-group-sm mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="inputGroup-sizing-sm">email </span>
            </div>
            <input type="email" name="email" value="" placeholder="ใส่อีเมล" value="" required value="" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">

          </div>

          <div class="input-group input-group-sm mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="inputGroup-sizing-sm">phone </span>
            </div>
            <input type="text" name="phone" value="" placeholder="เบอร์โทร" minlength="9" maxlength="10" required value="" onKeyUp="if(this.value*1!=this.value) this.value='' ;" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
        </div>



      <!-- address : <input  type="text" name="address" value="" placeholder="ที่อยู่" value=""><br><br> -->
      <div class="input-group input-group-sm mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroup-sizing-sm">Address</span>
        </div>
        <!-- <textarea rows="3" cols="20" name="address" ></textarea> -->
        <input type="text" name="address" value=""  placeholder="ที่อยู่" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
      </div>

      <div class="input-group input-group-sm mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroup-sizing-sm">id </span>
        </div>
        <input  type="text" name="id" value="" placeholder="รหัสบัตรประชาชน"
        onKeyUp="if(this.value*1!=this.value) this.value='' ;"  minlength = "13" maxlength = "13" data-format = "ddddddddddddd" required value="" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
    </div>

      <!-- image : <input  type="text" name="image" value="" ><br><br> -->
      <!-- <input type="file" class="form-control" id="inputGroupFile02" name='file' > -->
      <!-- <br> -->

      <div class="input-group input-group-sm mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroup-sizing-sm">type </span>
        </div>
        <select  name="type">
             <option  value="admin">admin</option>
              <option  value="organizer">organizer</option>
              <option  value="attendant">attendant</option>
            </select>
        </div>


        <div class="input-group input-group-sm mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroup-sizing-sm">status verify email</span>
          </div>
          <select  name="status">
               <option  value="n">n</option>
                <option  value="y">y</option>
              </select>
          </div>

    </div>
        <input class='btn btn-info'  type="submit" name="" value="OK">

    </div>

      </form>

  </div>

</div>

  </body>
</html>
<script>

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#imageold').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

var modal = document.getElementById('myModal');
var modal2 = document.getElementById('myModal2');


var span = document.getElementsByClassName("close")[0];
var span2 = document.getElementsByClassName("close2")[0];


function ball(username,password,first_name,last_name,age,gender,email,phone,address,id,type,image,id_ac,status) {

    modal.style.display = "block";
    document.getElementById("id_ac").value=id_ac.trim();
    document.getElementById("usernameNew").value=username.trim();
    document.getElementById("passwordNew").value=password.trim();
    document.getElementById("first_nameNew").value=first_name.trim();
    document.getElementById("last_nameNew").value=last_name.trim();
    document.getElementById("ageNew").value=age.trim();
    document.getElementById("emailNew").value=email.trim();
    document.getElementById("phoneNew").value=phone.trim();
    document.getElementById("addressNew").value=address.trim();
    document.getElementById("idNew").value=id.trim();
    document.getElementById("imageNew").value=image.trim();
    document.getElementById("imageold").src=image.trim();

    document.getElementById("statusNew").value=status.trim();

    var element = document.getElementById('select');
    element.value = type.trim();

    var element = document.getElementById('genderNew');
    element.value = gender.trim();
}

function add() {

    modal2.style.display = "block";


}



span.onclick = function() {
    modal.style.display = "none";
    document.getElementById('passwordNew').readOnly=true;
}
span2.onclick = function() {
    modal2.style.display = "none";


}


window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
        modal2.style.display = "none";
        document.getElementById('passwordNew').readOnly=true;
    }
    if (event.target == modal2) {
        modal2.style.display = "none";
    }
}

function myFunction() {

    if(confirm('Are you sure you want to change password ?')){
      document.getElementById('passwordNew').readOnly=false;
    }

}

</script>
