<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>

<?php
if (!isset($_GET['pageid']) && $_GET['pageid'] == NULL) {
  echo "<script>window.location='index.php';</script>";
}
else {
  $id = $_GET['pageid'];
}
?>

<style media="screen">
.button{
  margin-left: 20px;
  border: 1px solid #ddd;
  color: #444;
  cursor: pointer;
  font-size: 20px;
  padding: 2px 10px;
}
.button a{
  font-weight: normal;
}

</style>

<div class="grid_10">
  <div class="box round first grid">
    <h2>Add New Page</h2>
    <!-- add new page -->
    <?php
    if (isset($_POST['update'])) {
      $name = $fm->validate($_POST['name']);
      $body = $_POST['body'];
      if (empty($name) || empty($body) ) {
        echo "<span class='error'>Filed should not be Empty !</span>";
      }
      else {
        $query = "UPDATE tbl_page SET name='$name', body='$body' WHERE id='$id' ";
        $resultInsert= $db->insert($query);
        if ($resultInsert) {
          echo "<span class='success'>Page Updated Successfully</span>";
        }
        else {
          echo "<span class='error'>Page Not Updated !</span>";
        }
      }
    }
    ?>


    <div class="block">
      <form action="" method="POST">
        <?php
        $query = "SELECT * FROM tbl_page WHERE id='$id' ";
        $queryResult = $db->select($query);
        if ($queryResult) {
          while ($result = $queryResult->fetch_assoc()) {
            ?>
            <table class="form">
              <tr>
                <td>
                  <label>Title</label>
                </td>
                <td>
                  <input type="text" name="name" value="<?php echo $result['name']; ?>" class="medium" />
                </td>
              </tr>


              <tr>
                <td style="vertical-align: top; padding-top: 9px;">
                  <label>Content</label>
                </td>
                <td>
                  <textarea class="tinymce" name="body"><?php echo $result['body']; ?></textarea>
                </td>
              </tr>

              <tr>
                <td></td>
                <td>
                  <input type="submit" name="update" Value="Update" />
                  <span class="button"><a onclick="return confirm('Are You Sure to delete the Page?');" href="deletepage.php?deleteid=<?php echo  $id; ?>">Delete</a></span>
                </td>
              </tr>
            </table>
            <?php
          }
        }
        ?>
      </form>
    </div>
  </div>
</div>

<script type="text/javascript">
$(document).ready(function () {
  setupTinyMCE();
  setDatePicker('date-picker');
  $('input[type="checkbox"]').fancybutton();
  $('input[type="radio"]').fancybutton();
});
</script>

<?php include 'inc/footer.php'; ?>
