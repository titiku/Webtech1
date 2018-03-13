<?php

include_once("../menubar.php");
use Oop\Account;
use Oop\Database;

if (!isset($_SESSION['user'])){
  echo "<script type='text/javascript'>window.location.href = \"http://localhost/project/\";</script>";
}
if ($_SESSION['user']->getType()!='admin'){
  echo "<script type='text/javascript'>window.location.href = \"http://localhost/project/\";</script>";
}
else{
  $id_ac=$_POST["id_ac"];

  $username = $_POST["usernameNew"];
  $password = $_POST["passwordNew"];
  $first_name = $_POST["first_nameNew"];
  $last_name = $_POST["last_nameNew"];
  $age = $_POST["ageNew"];
  $gender = $_POST["genderNew"];
  $email = $_POST["emailNew"];
  $phone = $_POST["phoneNew"];
  $address = $_POST["addressNew"];
  $id = $_POST["idNew"];
  $type = $_POST["select"];
  $status=$_POST["statusNew"];



  if (isset($_FILES['file'])){
    $pic= basename($_FILES['file']["name"]);
    $image= "/project/picture/user/$pic";
    if (move_uploaded_file($_FILES["file"]["tmp_name"],"../picture/user/$pic")){
        // echo "uploaded";
    }else{
        $image = $_POST["imageNew"];
    }
  }

  $db=new Database();
  $userold=$db->loadAccount($id_ac);
if ($userold->getEmail()==$email){
   $user = new Account($id_ac,$username,$password,$first_name,$last_name,$age,$gender,$email,$phone,$address,$id,$type,$image,$status);
}else{
    $user = new Account($id_ac,$username,$password,$first_name,$last_name,$age,$gender,$email,$phone,$address,$id,$type,$image,'n');
}
   $db->updateAccounts($user);

  echo "<script type='text/javascript'>window.location.href = \"http://localhost/project/manageuser\";</script>";
}



 ?>
