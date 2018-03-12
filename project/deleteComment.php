<?php
include_once("menubar.php");
use Oop\Database;

if (!isset($_SESSION['user'])){
  echo '<script type="text/javascript">window.location.href = "index.php";</script>';
}

if (isset($_GET['id_co']) && isset($_GET['id_ac']) && $_SESSION['user']->getIdAcount() == $_GET['id_ac'] && isset($_GET['id_ev'])){
  $database = new Database();
  $database->deleteComment($_GET['id_co']);
  echo '<script type="text/javascript">window.location.href = "page.php?id_ev='.$_GET['id_ev'].'";</script>';
}

 ?>
