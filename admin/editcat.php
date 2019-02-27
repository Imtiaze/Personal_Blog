<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>

<?php
if (!isset($_GET['catid']) || $_GET['catid'] == NULL) {
  ?>
  <script type="text/javascript">
  window.location='catlist.php';
  </script>
  <?php
}
else {
  $catid = $_GET['catid'];
}
?>

<div class="grid_10">
  <div class="box round first grid">
    <h2>Update Category</h2>
    <div class="block copyblock">
      <?php
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $updateCategory = $fm->validate($_POST['updatecategory']);
        if (empty($updateCategory)) {
          echo "<span class='error'>Field must not empty</span>";
        }
        else {
          $query = "UPDATE tbl_category SET name='$updateCategory' WHERE id='$catid' ";
          $resultUpdateCategory = $db->update($query);
          if ($resultUpdateCategory) {
            echo "<span class='success'>Category Updated successfully</span>";
          }
          else {
            echo "<span class='error'>Category not Added</span>";
          }
        }
      }
      ?>
      <?php
      $query = "SELECT * FROM tbl_category WHERE id='$catid' ";
      $result = $db->select($query);
      if ($result) {
        $resultCategory = $result->fetch_assoc();
      }
      else {
        echo "<span class='error'>There is no category Found!</span>";
        exit();
      }

      ?>
      <form action="" method="post">
        <table class="form">
          <tr>
            <td>
              <input type="text" name="updatecategory" value="<?php echo $resultCategory['name']; ?>" class="medium" />
            </td>
          </tr>
          <tr>
            <td>
              <input type="submit" name="submit" Value="Update" />
            </td>
          </tr>
        </table>
      </form>
    </div>
  </div>
</div>

<?php include 'inc/footer.php'; ?>
