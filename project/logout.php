<?php
session_start();
session_unset();
session_destroy();
 ?>

<?php
  if (isset($_GET['id_ev'])){
    echo '<script type="text/javascript">window.location.href = "http://localhost/project/page.php?id_ev='.$_GET['id_ev'].'";</script>';
  } else {
    header("Refresh:0; url=login.php");
  }
?>
