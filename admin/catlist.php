<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>

<div class="grid_10">
  <div class="box round first grid">
    <h2>Category List</h2>
    <?php
    if (isset($_GET['delid'])) {
      $delid = $_GET['delid'];
      $delquery = "DELETE FROM tbl_category WHERE id='$delid' ";
      $resultDelete = $db->delete($delquery);
      if ($resultDelete) {
        echo "<span class='success'>Category Deleted successfully</span>";
      }
      else {
        echo "<span class='error'>Category not Deleted</span>";
      }
    }

    ?>
    <div class="block">
      <table class="data display datatable" id="example">
        <thead>
          <tr>
            <th>Serial No.</th>
            <th>Category Name</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $query = "SELECT * FROM tbl_category";
          $catgoryResult = $db->select($query);
          if ($catgoryResult) {
            while($category = $catgoryResult->fetch_assoc()) {
              ?>
              <tr class="odd gradeX">
                <td><?php echo $category['id']; ?></td>
                <td><?php echo $category['name']; ?></td>
                <td>
                  <a href="editcat.php?catid=<?php echo $category['id'];  ?>">Edit</a> ||
                  <a onclick="return confirm('Are you sure to Delete');" href="?delid=<?php echo $category['id'];  ?>">Delete</a>
                </td>
              </tr>
              <?php
            }
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>


<script type="text/javascript">

$(document).ready(function () {
  setupLeftMenu();

  $('.datatable').dataTable();
  setSidebarHeight();


});
</script>

<?php include 'inc/footer.php'; ?>
