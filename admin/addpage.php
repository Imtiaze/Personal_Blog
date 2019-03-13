<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>




<div class="grid_10">
  <div class="box round first grid">
    <h2>Add New Page</h2>
    <?php

    if (isset($_POST['submit'])) {
      $name = $fm->validate($_POST['name']);
      $body = $_POST['body'];
      if (empty($name) || empty($body) ) {
        echo "<span class='error'>Filed should not be Empty !</span>";
      }
      else {
        $query = "INSERT INTO tbl_page(name,body) VALUES('$name','$body')";
        $resultInsert= $db->insert($query);
        if ($resultInsert) {
          echo "<span class='success'>Page Created Successfully</span>";
        }
        else {
          echo "<span class='error'>Page Not Created !</span>";
        }
      }
    }
    ?>
    <div class="block">
      <form action="" method="POST" enctype="multipart/form-data">
        <table class="form">
          <tr>
            <td>
              <label>Title</label>
            </td>
            <td>
              <input type="text" name="name" placeholder="Enter Post Title..." class="medium" />
            </td>
          </tr>


          <tr>
            <td style="vertical-align: top; padding-top: 9px;">
              <label>Content</label>
            </td>
            <td>
              <textarea class="tinymce" name="body"></textarea>
            </td>
          </tr>

          <tr>
            <td></td>
            <td>
              <input type="submit" name="submit" Value="Save" />
            </td>
          </tr>
        </table>
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
