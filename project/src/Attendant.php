<?php
  namespace Oop;

  class Attendant{

    protected $id_at;
    protected $id_ev;
    protected $id_ac;
    protected $image1;
    protected $image2;
    protected $num;
    protected $status;

    function __construct($id_at,$id_ev,$id_ac,$image1,$image2,$num,$status){
      $this->id_at = $id_at;
      $this->id_ev = $id_ev;
      $this->id_ac = $id_ac;
      $this->image1 = $image1;
      $this->image2 = $image2;
      $this->num = $num;
      $this->status = $status;
    }

    function get_id_at(){
      return $this->id_at;
    }

    function get_id_ev(){
      return $this->id_ev;
    }

    function get_id_ac(){
      return $this->id_ac;
    }

    function get_image1(){
      return $this->image1;
    }

    function get_image2(){
      return $this->image2;
    }
    function get_num(){
      return $this->num;
    }

    function get_status(){
      return $this->status;
    }

  }
 ?>
