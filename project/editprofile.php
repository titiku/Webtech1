<?php include_once("menubar.php");
  use Oop\Database;
  use Oop\Account;

  if (isset($_SESSION['user'])){
    $user=$_SESSION['user'];
  } else {
    echo '<script type="text/javascript">window.location.href = "index.php";</script>';
  }

  $id_ac=$_SESSION['user']->getIdAcount();
  $username=$_SESSION['user']->getUsername();
  $password=$_SESSION['user']->getPassword();

  $first_name=$_SESSION['user']->getFirst_name();
  $last_name=$_SESSION['user']->getLast_name();
  $age=$_SESSION['user']->getAge();
  $gender=$_SESSION['user']->getGender();
  $email=$_SESSION['user']->getEmail();
  $phone=$_SESSION['user']->getPhone();
  $address=$_SESSION['user']->getAddress();
  $id=$_SESSION['user']->getId();
  $type=$_SESSION['user']->getType();
  $image=$_SESSION['user']->getImage();
  if(isset($_POST["form"])){
  if(isset($_POST["first_name"])){
    $first_name = $_POST["first_name"];
  }
  if(isset($_POST["last_name"])){
    $last_name = $_POST["last_name"];
  }
  if(isset($_POST["age"])){
    $age = $_POST["age"];

  }
  if(isset($_POST["gender"])){
    $gender = $_POST["gender"];
  }

  if(isset($_POST["email"])){
    $email = $_POST["email"];
  }
  if(isset($_POST["phone"])){
    $phone = $_POST["phone"];
  }
  if(isset($_POST["address"])){
    $address = $_POST["address"];
  }
  if(isset($_POST["id"])){
    $id = $_POST["id"];
  }
  if(isset($_POST["type"])){
  $type = $_POST["type"];
  }


  if (isset($_FILES['file'])){
    $pic= basename($_FILES['file']["name"]);
    $image= "/project/picture/user/$pic";
    if (move_uploaded_file($_FILES["file"]["tmp_name"],"picture/user/$pic")){
        // echo "uploaded";
    }else{
      $image=$_SESSION['user']->getImage();
    }
  }


  $user = new Account($id_ac,$username,$password,$first_name,$last_name,$age,$gender,$email,$phone,$address,$id,$type,$image,$_POST["status"]);
  $db =new Database();
  $db->updateAccounts($user);

   echo "<script type='text/javascript'>window.location.href = \"http://localhost/project/profile.php\";</script>";
  }


?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Profile</title>
<style>

form{
  padding: 20px 20px ;
  border:2px  ;
  border:2px solid black ;
  border-color: #989090 ;
  border-width: 5px;
  border-radius: 25px;
  /* margin:40px 250px 250px 250px; */
  margin: auto;
  margin-top: 40px ;
  width: 60%;
  font-family: 'Roboto Condensed', sans-serif;
  background-color: #F1F1F1;
}
p{

  font-size: 20px;
  padding: 10px;

  /* margin: 0px 40px 0px 40px ; */
  margin: auto;
  width: 80%;
  padding-left: 40px;
  padding-right: 40px ;
  color:#25A2B7
  /* align-items: center ;
  text-align: center; */
}
h1{
  color: #2FA2B6;
  /* padding-left: 30px; */
  /* background-color: white; */
  text-shadow:1px 2px 20px #000000 ;

  margin-right:75% ;
  margin-left: 10%;
}
span{
  color: #343A40;
  font-size:16px ;
  background-color: #25A2B7;
}
</style>
  </head>
  <body>

    <div class="container-fluid">
      <form  class="" method="post" enctype="multipart/form-data" >
        <center><img id="imageold" style="height:300px;weight:300px;"  src='<?php echo $_SESSION["user"]->getImage(); ?>' > </center>
        <br>
     <center><input onchange="readURL(this)" type="file" class="btn btn-success" id="inputGroupFile02" name='file'></center>
       <br>
     <p>

     <div class="input-group input-group-sm mb-3">
       <div class="input-group-prepend">
         <span class="input-group-text" style="color: #343A40;font-size:16px ;background-color: #25A2B7;"  id="inputGroup-sizing-sm">Name</span>
       </div>
       <input type="text" name="first_name" placeholder="ใส่ชื่อ" required value="<?php echo $_SESSION["user"]->getFirst_name(); ?>"  class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" id="firstnameold">

     </div>
     <!-- firstname: <input type="text" name:"firstname" size="50px" required value="" id="firstnameold"> -->
     <br>
     <div class="input-group input-group-sm mb-3">
       <div class="input-group-prepend">
         <span class="input-group-text" style="color: #343A40;font-size:16px ;background-color: #25A2B7;" id="inputGroup-sizing-sm">Surname</span>
       </div>
       <input type="text" name="last_name" placeholder="ใส่นามสกุล" required value="<?php echo $_SESSION["user"]->getLast_name(); ?>" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" id="lastnameold">

     </div>
     <!-- lastname:  <input type="text" name:"lastname" size="50px" required value="" id="lastnameold"> -->
     <br>

     <div class="input-group input-group-sm mb-3">
       <div class="input-group-prepend">
         <span class="input-group-text" style="color: #343A40;font-size:16px ;background-color: #25A2B7;" id="inputGroup-sizing-sm">Age</span>
       </div>
       <input type="number" name="age" placeholder="อายุ" min="5" max="99"  data-format = "iii" required value="<?php echo $_SESSION["user"]->getAge(); ?>" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" id="ageold">

     </div>
     <!-- age: <input type="number" name="age" min="15" max="99" size="50px" required value="" id="ageold"> -->
     <br>
     <div class="input-group input-group-sm mb-3">
       <div class="input-group-prepend">
         <span class="input-group-text" style="color: #343A40;font-size:16px ;background-color: #25A2B7;" id="inputGroup-sizing-sm" style="margin-right:10px">Gender</span>
         <select class="genderID" name='gender' required value="" id="genderold">
            <option value="m" <?php if($_SESSION["user"]->getGender()=='m'){
              echo "selected";
            } ?>>Male</option>
            <option  value="f" <?php if($_SESSION["user"]->getGender()=='f'){
              echo "selected";
            } ?>>Female</option>
          </select>
       </div>

     </div>

     <br>
     <div class="input-group input-group-sm mb-3">
       <div class="input-group-prepend">
         <span class="input-group-text" style="color: #343A40;font-size:16px ;background-color: #25A2B7;" id="inputGroup-sizing-sm">E-mail</span>
       </div>
        <input type="email" name="email" placeholder="ใส่อีเมล" value="<?php echo $_SESSION["user"]->getEmail(); ?>" required value="" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm"  id="emailold">

     </div>
     <!-- email: <input type="email" name="email" size="50px" id="emailold" placeholder="Email"> -->
     <br>
     <div class="input-group input-group-sm mb-3">
       <div class="input-group-prepend">
         <span class="input-group-text" style="color: #343A40;font-size:16px ;background-color: #25A2B7;" id="inputGroup-sizing-sm">Contact</span>
       </div>
       <input type="text" name="phone" placeholder="เบอร์โทร" minlength="9" maxlength="10" required value="<?php echo $_SESSION["user"]->getPhone(); ?>"
       onKeyUp="if(this.value*1!=this.value) this.value='' ;" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm"
       id="phoneold">

     </div>
     <br>
     <div class="input-group input-group-sm mb-3">
       <div class="input-group-prepend">
         <span class="input-group-text" style="color: #343A40;font-size:16px ;background-color: #25A2B7;" id="inputGroup-sizing-sm">ID card </span>
       </div>
       <input type="text" name="id" placeholder="รหัสบัตรประชาชน" onKeyUp="if(this.value*1!=this.value) this.value='' ;"  minlength = "13" maxlength = "13" data-format = "ddddddddddddd" required
       value="<?php echo $_SESSION["user"]->getId(); ?>" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">

     </div>
     <!-- phone: <input type="text" minlength="9" maxlength="10" required value="" onKeyUp="if(this.value*1!=this.value) this.value=''" id="phoneold"> -->
     <br>


     <div class="input-group input-group-sm mb-3">
       <div class="input-group-prepend">
         <span class="input-group-text" style="color: #343A40;font-size:16px ;background-color: #25A2B7;" id="inputGroup-sizing-sm">Address</span>
       </div>
       <input type="text" name="address" value="<?php echo $_SESSION["user"]->getAddress(); ?>"  placeholder="ที่อยู่" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">

     </div>

        <br>

    <input type="submit" style="margin-left:90%" class="btn btn-success" name="form" value="Submit" >

        <br>
        <br>


        </form>









    </div>



    <script type="text/javascript">
          function readURL(input) {
              if (input.files && input.files[0]) {
                  var reader = new FileReader();
                  reader.onload = function (e) {
                      $('#imageold').attr('src', e.target.result);
                  }

                  reader.readAsDataURL(input.files[0]);
              }
          }
    </script>
  </body>


</html>
