<?php
include_once("../menubar.php");
use Oop\Account;
use Oop\Database;

if (!isset($_SESSION['user'])){
  echo "<script type='text/javascript'>window.location.href = \"http://localhost/project/\";</script>";
}
if ($_SESSION['user']->getType()!='admin'){
  echo "<script type='text/javascript'>window.location.href = \"http://localhost/project/\";</script>";
}else{
  $image="/project/picture/img/icon.png";
  if(isset($_POST["username"])){
    $username = $_POST["username"];
  }

  if(isset($_POST["password"])){
    $password = $_POST["password"];
  }
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
  if(isset($_POST["status"])){
    $status=$_POST["status"];

  }

  // if (isset($_FILES['file'])){
  //   $pic= basename($_FILES['file']["name"]);
  //
  //   $image= "/project/picture/user/$pic";
  //   if ($image="/project/picture/user/"){
  //       $image="/project/picture/img/icon.png";
  //   }
  //   if (move_uploaded_file($_FILES["file"]["tmp_name"],"../picture/$pic")){
  //       echo "uploaded";
  //   }else{
  //       echo "cant";
  //   }
  //
  // }


    if ($username!="" && $password!=""  && $first_name!=""  && $last_name!=""  && $age!=""){

      $db=new Database();

      $passhash=password_hash($password, PASSWORD_DEFAULT);
      $user = new Account(0,$username,$passhash,$first_name,$last_name,$age,$gender,$email,$phone,$address,$id,$type,$image,$status);
      $db->addAccounts($user);


      //
      //   $connection = new PDO('mysql:host=localhost:3306;dbname=project;charset=utf8mb4','root','');
      //
      //     $num=0;
      //      $statement = $connection->query('SELECT * FROM accounts');
      //
      //         while($row = $statement->fetch(PDO::FETCH_OBJ)) {
      //             $num=$row->id_ac;
      //         }
      //     $num+=1;
      //
      // $affectedRows = $connection->exec(
      //   "INSERT INTO accounts VALUES ('".$num."','".$username."','" .$password."','".$first_name."','".$last_name."','" .$age."'
      //   ,'".$gender."','".$email."','" .$phone."','".$address."','".$id."','" .$type."','" .$image."')"
      // );

  }


    echo "<script type='text/javascript'>window.location.href = \"http://localhost/project/manageuser\";</script>";
}

 ?>
