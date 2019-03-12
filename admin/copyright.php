<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<div class="grid_10">
  <div class="box round first grid">
    <h2>Update Copyright Text</h2>
    <div class="block copyblock">

      <?php
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $copyright = $fm->validate($_POST['copyright']);


        if(empty($copyright)){
          echo "<span class='error'>Field should not be empty</span>";
        }
        else {
          $updateQuery = "UPDATE tbl_footer SET note='$copyright' WHERE id='1' ";
          $updateResult = $db->update($updateQuery);
          if ($updateResult) {
            echo "<span class='success'>Footer updated successfully !</span>";
          }
          else{
            echo "<span class='error'>Footer Not updated  !</span>";
          }
        }


      }

      ?>

      <form action="" method="post">
        <?php
        $query = "SELECT * FROM tbl_footer WHERE id='1' ";
        $queryResult = $db->select($query);
        if ($queryResult) {
          while ($result = $queryResult->fetch_assoc()) {
            ?>
            <table class="form">
              <tr>
                <td>
                  <input type="text" value="<?php echo $result['note']; ?>" name="copyright" class="large" />
                </td>
              </tr>

              <tr>
                <td>
                  <input type="submit" name="update" Value="Update" />
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

<?php include 'inc/footer.php'; ?>
