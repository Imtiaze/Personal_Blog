<?php include '../lib/Session.php'; Session::checkSession(); ?>

<?php include '../config/config.php'; ?>
<?php include '../lib/Database.php'; ?>
<?php include '../helpers/Format.php'; ?>

<?php $db = new Database(); $fm = new Format(); ?>


<?php

if(!isset($_GET['delid']) || $_GET['delid'] == NULL){
  ?>
  <script type="text/javascript">
  window.location="postlist.php";
  </script>
  <?php
}

else{
  $id = $_GET['delid'];
  $delimage = "SELECT image FROM tbl_post WHERE id='$id' ";
  $image = $db->select($delimage);
  if($image){
    while($imagedata = $image->fetch_assoc()){
      $delimg = $imagedata['image'];
      unlink($delimg);
    }

  }

  $query = "DELETE FROM tbl_post WHERE id='$id' ";
  $deleterow = $db->delete($query);
  if($deleterow){
    echo "<script>alert('Data Deleted Successfully');</script>";
    echo "<script>window.location = 'postlist.php';</script>";
  }
}



?>
