<?php
  namespace Oop;
  class Log{
    protected $id_lo;
    protected $id_ac;
    protected $event;
    protected $date;
    protected $time;
    function __construct($id_lo, $id_ac, $event, $date, $time){
      $this->id_lo = $id_lo;
      $this->id_ac = $id_ac;
      $this->event = $event;
      $this->date = $date;
      $this->time = $time;
    }
    function get_id_lo(){
      return $this->id_lo;
    }
    function get_id_ac(){
      return $this->id_ac;
    }
    function get_event(){
      return $this->event;
    }
    function get_date(){
      return $this->date;
    }
    function get_time(){
      return $this->time;
    }

  }
 ?>
