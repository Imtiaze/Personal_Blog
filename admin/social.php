<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>




<div class="grid_10">
  <div class="box round first grid">
    <h2>Update Social Media</h2>
    <div class="block">
      <?php
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $facebook = $fm->validate($_POST['facebook']);
        $twitter  = $fm->validate($_POST['twitter']);
        $linkedin = $fm->validate($_POST['linkedin']);
        $google   = $fm->validate($_POST['googleplus']);

        if(empty($facebook) || empty($twitter) || empty($linkedin) || empty($google)){
          echo "<span class='error'>Field should not be empty</span>";
        }
        else {
          $updateQuery = "UPDATE tbl_social SET facebook='$facebook', twitter='$twitter', linkedin='$linkedin', google='$google' WHERE id='1' ";
          $updateResult = $db->update($updateQuery);
          if ($updateResult) {
            echo "<span class='success'>Social links updated successfully !</span>";
          }
          else{
            echo "<span class='error'>Social links Not updated  !</span>";
          }
        }


      }

      ?>
      <form action="" method="post">
        <?php
        $query = "SELECT * FROM tbl_social WHERE id='1' ";
        $queryResult = $db->select($query);
        if ($queryResult) {
          while ($result = $queryResult->fetch_assoc()) {
            ?>
            <table class="form">
              <tr>
                <td>
                  <label>Facebook</label>
                </td>
                <td>
                  <input type="text" name="facebook" value="<?php echo $result['facebook']; ?>" class="medium" />
                </td>
              </tr>
              <tr>
                <td>
                  <label>Twitter</label>
                </td>
                <td>
                  <input type="text" name="twitter" value="<?php echo $result['twitter']; ?>" class="medium" />
                </td>
              </tr>

              <tr>
                <td>
                  <label>LinkedIn</label>
                </td>
                <td>
                  <input type="text" name="linkedin" value="<?php echo $result['linkedin']; ?>" class="medium" />
                </td>
              </tr>

              <tr>
                <td>
                  <label>Google Plus</label>
                </td>
                <td>
                  <input type="text" name="googleplus" value="<?php echo $result['google']; ?>" class="medium" />
                </td>
              </tr>

              <tr>
                <td></td>
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
