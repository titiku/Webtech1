<?php
namespace Oop;
 class Account{
   protected $id_ac;
   protected $username;
   protected $password;
   protected $first_name;
   protected $last_name;
   protected $age;
   protected $gender;
   protected $email;
   protected $phone;
   protected $address;
   protected $id;
   protected $type;
   protected $image;
   protected $status;

    function __construct($id_ac,$username, $password,$first_name, $last_name,$age, $gender,$email, $phone,$address, $id,$type, $image,$status)
    {
       $this->id_ac = $id_ac;
       $this->username = $username;
       $this->password = $password;
       $this->first_name = $first_name;
       $this->last_name = $last_name;
       $this->age = $age;
       $this->gender = $gender;
       $this->email = $email;
       $this->phone = $phone;
       $this->address = $address;
       $this->id = $id;
       $this->type = $type;
       $this->image = $image;
       $this->status = $status;
    }

    function getIdAcount(){
         return $this->id_ac;
      }

    function getUsername(){
         return $this->username;
      }
    function getPassword(){
        return $this->password;
    }
    function getFirst_name(){
        return $this->first_name;
    }

    function getLast_name(){
        return $this->last_name;
    }

    function getAge(){
        return $this->age;
    }
    function getGender(){
        return $this->gender;
    }

    function getEmail(){
        return $this->email;
    }
    function getPhone(){
        return $this->phone;
    }
    function getAddress(){
        return $this->address;
    }
    function getId(){
        return $this->id;
    }
    function getType(){
        return $this->type;
    }
    function getImage(){
        return $this->image;
    }

    function getStatus(){
      return $this->status;
    }

    function setUsername($username){
         $this->username = $username;
    }

}
?>
