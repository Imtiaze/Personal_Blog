<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>

<div class="grid_10">
  <div class="box round first grid">
    <h2>Add New Category</h2>
    <div class="block copyblock">
      <?php
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $category = $fm->validate($_POST['addcategory']);
        if (empty($category)) {
          echo "<span class='error'>Field must not empty</span>";
        }
        else {
          $query = "INSERT INTO tbl_category(name) VALUES('$category')";
          $resultCategory = $db->insert($query);
          if ($resultCategory) {
            echo "<span class='success'>Category Added successfully</span>";
          }
          else {
            echo "<span class='error'>Category not Added</span>";
          }
        }
      }
      ?>
      <form action="" method="post">
        <table class="form">
          <tr>
            <td>
              <input type="text" name="addcategory" placeholder="Enter Category Name..." class="medium" />
            </td>
          </tr>
          <tr>
            <td>
              <input type="submit" name="submit" Value="Save" />
            </td>
          </tr>
        </table>
      </form>
    </div>
  </div>
</div>

<?php include 'inc/footer.php'; ?>
