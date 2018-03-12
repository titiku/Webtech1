<?php include_once("menubar.php");

if (isset($_SESSION['user'])){
  $user=$_SESSION['user'];
} else {
  echo '<script type="text/javascript">window.location.href = "index.php";</script>';
}


?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">

  <title>Profile</title>
  <style>
  @import url('https://fonts.googleapis.com/css?family=Roboto+Condensed');
  body{
    font-family: 'Roboto Condensed', sans-serif;
    /* background-color: #F1F1F1; */
    /* background-image: url("/project/picture/img/gray2.jpg"); */

  }


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
    /* text-shadow:1px 2px 20px #000000 ; */

    margin-right:75% ;
    margin-left: 10%;
  }

</style>
</head>
<body>
  <form style="">


    <p>
      <h1> Profile</h1><br>
      <div class="container-fluid" style="">

        <center><img id="image" class="img-rounded" src='<?= $user->getImage() ?>' height='300' width='300'> </center>
        <br>
        <form class="" method="post" enctype="multipart/form-data" style="">


          <!-- <center><input type="file" class="btn btn-success" id="inputGroupFile02" name='file'></center> -->
          <br>
          <div class="input-group input-group-sm mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="inputGroup-sizing-sm" style="color:#343A40 ;  font-size:16px ;background-color: #25A2B7;">Name</span>
            </div>
            <input type="text" name="firstname" placeholder="Enter your name" required value="<?= $user->getFirst_name() ?>" readonly  class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" id="firstnameold">

          </div>
          <!-- firstname: <input type="text" name:"firstname" size="50px" required value="" id="firstnameold"> -->

          <div class="input-group input-group-sm mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="inputGroup-sizing-sm" style="color:343A40 ;  font-size:16px ;background-color: #25A2B7;">Surname</span>
            </div>
            <input type="text" name="last_name" placeholder="Enter your Surname" required value="<?= $user->getLast_name() ?>" readonly class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" id="lastnameold">

          </div>
          <!-- lastname:  <input type="text" name:"lastname" size="50px" required value="" id="lastnameold"> -->


          <div class="input-group input-group-sm mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="inputGroup-sizing-sm" style="color:343A40 ;  font-size:16px ;background-color: #25A2B7;">Age</span>
            </div>
            <input type="number" readonly name="age" placeholder="Enter your age" min="15" max="99"  data-format = "iii" required value="<?= $user->getAge() ?>" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" id="ageold">

          </div>
          <!-- age: <input type="number" name="age" min="15" max="99" size="50px" required value="" id="ageold"> -->

          <div class="input-group input-group-sm mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="inputGroup-sizing-sm" style="color:343A40 ;  font-size:16px ;background-color: #25A2B7;">Gender</span>
            </div>
            <?php
            $gen='Male';
            if($user->getGender()=='f'){
              $gen='Female';
            }
            ?>
            <input type="text" readonly name="gender" value="<?= $gen ?>" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
          </div>



          <div class="input-group input-group-sm mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="inputGroup-sizing-sm" style="color:343A40 ;  font-size:16px ;background-color: #25A2B7;">E-mail</span>
            </div>
            <input type="email" name="email"readonly placeholder="Enter your E-Mail" value="<?= $user->getEmail() ?>" required value="" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm"  id="emailold">

          </div>


          <div class="input-group input-group-sm mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="inputGroup-sizing-sm" style="color:343A40 ;  font-size:16px ;background-color: #25A2B7;">Contact</span>
            </div>
            <input type="text" readonly name="phone" placeholder="Enter your number"
            class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" value="<?= $user->getPhone() ?>">

          </div>


          <div class="input-group input-group-sm mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="inputGroup-sizing-sm" style="color:343A40 ;  font-size:16px ;background-color: #25A2B7;">Address</span>
            </div>

            <input type="text" readonly name="address" value="<?= $user->getAddress() ?>"  placeholder="Enter your address"
            class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
          </div>

          <div class="input-group input-group-sm mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="inputGroup-sizing-sm" style="color:343A40 ;  font-size:16px ;background-color: #25A2B7;">ID Card</span>
            </div>
            <input type="text" readonly name="id" placeholder="Enter your ID Card"
            required  value="<?= $user->getId() ?>" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">

          </div>

        </p>

        <input hidden type="text" name="status" value=""<?= $user->getStatus() ?>"">
        <a href="/project/editprofile.php" ><input style="margin-left:90%" type="button" class="btn btn-secondary"name=""  value="Edit" ></a>

        <br>


      </form>
      <?php
      // $connection = new PDO(
      //  'mysql:host=localhost:3306;dbname=project;charset=utf8mb4',
      //  'root',
      //  '');
      //
      //
      //   $num=0;
      //    $statement = $connection->query('SELECT * FROM accounts');
      //
      //       while($row = $statement->fetch(PDO::FETCH_OBJ)) {
      //           $num=$row->id_ac;
      //       }
      ?>









    </div>







  </body>
</form>
</html>
