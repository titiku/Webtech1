<?php
  namespace Oop;

  class Comment{
    protected $id_co;
    protected $id_ac;
    protected $id_ev;
    protected $message;
    protected $date;
    protected $time;

    function __construct($id_co, $id_ac, $id_ev, $message, $date, $time){
      $this->id_co = $id_co;
      $this->id_ac = $id_ac;
      $this->id_ev = $id_ev;
      $this->message = $message;
      $this->date = $date;
      $this->time = $time;
    }

    function get_id_co(){
      return $this->id_co;
    }

    function get_id_ac(){
      return $this->id_ac;
    }

    function get_id_ev(){
      return $this->id_ev;
    }

    function get_message(){
      return $this->message;
    }

    function get_date(){
      return $this->date;
    }

    function get_time(){
      return $this->time;
    }

  }
 ?>
