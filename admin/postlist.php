<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>

<div class="grid_10">
  <div class="box round first grid">
    <h2>Post List</h2>
    <div class="block">
      <table class="data display datatable" id="example">
        <thead>
          <tr>
            <th width="5%">Post No</th>
            <th width="10%">Post Title</th>
            <th width="20%">Description</th>
            <th width="10%">Category</th>
            <th width="10%">Image</th>
            <th width="10%">Author</th>
            <th width="15%">Tags</th>
            <th width="10%">Date</th>
            <th width="10%">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $query = "SELECT tbl_post.*, tbl_category.name FROM tbl_post
                    INNER JOIN tbl_category
                    ON tbl_post.cat = tbl_category.id
                    ORDER BY tbl_post.id DESC";
          $resultPost = $db->select($query);
          if ($resultPost) {
            while ($result = $resultPost->fetch_assoc()) {
              ?>
              <tr class="odd gradeX">
                <td><?php echo $result['id']; ?></td>
                <td><?php echo $result['title']; ?></td>
                <td><?php echo $fm->formatPost($result['body'], 80); ?></td>
                <td><?php echo $result['name']; ?></td>
                <td> <img src="<?php echo $result['image']; ?>" alt="" height="70" width="90"> </td>
                <td><?php echo $result['author']; ?></td>
                <td><?php echo $result['tags']; ?></td>
                <td ><?php echo $fm->formatDate($result['date']); ?></td>
                <td><a href="">Edit</a> || <a href="">Delete</a></td>
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
