<?php include '../lib/Session.php'; Session::checkSession(); ?>

<?php include '../config/config.php'; ?>
<?php include '../lib/Database.php'; ?>
<?php include '../helpers/Format.php'; ?>

<?php $db = new Database(); $fm = new Format(); ?>


<?php

if(!isset($_GET['deleteid']) || $_GET['deleteid'] == NULL){
  ?>
  <script type="text/javascript">
  window.location="index.php";
  </script>
  <?php
}

else{
  $id = $_GET['deleteid'];
  $query = "DELETE FROM tbl_page WHERE id='$id' ";
  $deleterow = $db->delete($query);
  if($deleterow){
    echo "<script>alert('Page Deleted Successfully');</script>";
    echo "<script>window.location = 'index.php';</script>";
  }
}



?>
