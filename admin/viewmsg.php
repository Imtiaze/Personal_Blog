<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>


<?php
//from inbox.php  msgid
if (!isset($_GET['msgid']) || $_GET['msgid'] == NULL) {
  ?>
  <script type="text/javascript">
  window.location='inbox.php';
  </script>
  <?php
}
else {
  $msgid = $_GET['msgid'];
}
?>

<div class="grid_10">
  <div class="box round first grid">
    <h2>Message View</h2>
    <div class="block copyblock">

      <?php
      $query = "SELECT * FROM tbl_contact WHERE id='$msgid' ";
      $resultMessage = $db->select($query);
      if ($resultMessage) {
        $result = $resultMessage->fetch_assoc();
      }
      else {
        echo "<span class='error'>There is no category Found!</span>";
        exit();
      }

      ?>
      <?php
      if (isset($_POST['ok'])) {
        ?>
        <script type="text/javascript">
        window.location='inbox.php';
        </script>
        <?php
      }
      ?>
      <form action="" method="post">
        <table class="form">
          <tr>
            <td>
              <input type="text" name="" value="<?php echo $result['firstname'].' '.$result['lastname']; ?>" class="medium" />
            </td>
          </tr>
          <tr>
            <td>
              <input type="text" name="" value="<?php echo $result['email']; ?>" class="medium" />
            </td>
          </tr>
          <tr>
            <td>
              <textarea name="name" rows="8" cols="80"><?php echo $result['body']; ?></textarea>
            </td>
          </tr>
          <tr>
            <td>
              <input type="submit" name="ok" value="Go Back">
            </td>
          </tr>


        </table>
      </form>
    </div>
  </div>
</div>

<?php include 'inc/footer.php'; ?>
