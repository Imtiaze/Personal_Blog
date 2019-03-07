<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>




<div class="grid_10">
  <div class="box round first grid">
    <h2>Add New Post</h2>
    <div class="block">
      <?php
      //if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      if (isset($_POST['submit'])) {

        $cat = $fm->validate($_POST['cat']);
        $body = $_POST['body'];
        $title = $fm->validate($_POST['title']);
        $author = $fm->validate($_POST['author']);
        $tag = $fm->validate($_POST['tag']);

        $permitted = array('jpg', 'jpeg', 'png', 'gif');
        $image_name = $_FILES['image']['name'];
        $image_size = $_FILES['image']['size'];
        $tmp_path = $_FILES['image']['tmp_name'];

        $divide_name = explode('.', $image_name);
        $image_extension=strtolower(end($divide_name));
        $image_unique_name =  substr(md5(time()),0,10).'.'.$image_extension;
        $uploaded_image='upload/'.$image_unique_name;

        if (empty($cat) || empty($body) || empty($title) || empty($author) || empty($tag) || empty($image_name)) {
          echo "<span class='error'>Filed should not be Empty !<span/>";
        }
        elseif($image_size > 1048576) {  //1048576 bytes = 1MB
          echo "<span class='error'>File size should be less than 1MB!</span>";
        }
        elseif(in_array($image_extension, $permitted) ===false) {
          echo "<span class='error'>You can upload only :- ".implode(', ',$permitted)."</span>";
        }
        else {
          move_uploaded_file($tmp_path, $uploaded_image);
          $query = "INSERT INTO tbl_post(cat,title,body,image,author,tags) VALUES('$cat','$title', '$body','$uploaded_image','$author','$tag')";
          $resultInsert= $db->insert($query);
          if ($resultInsert) {
            echo "<span class='success'>Post inserted successfully</span>";
          }
          else {
            echo "<span class='error'>Post not Inserted !</span>";
          }
        }


      }

      ?>
      <form action="" method="POST" enctype="multipart/form-data">
        <table class="form">
          <tr>
            <td>
              <label>Title</label>
            </td>
            <td>
              <input type="text" name="title" placeholder="Enter Post Title..." class="medium" />
            </td>
          </tr>
          <tr>
            <td>
              <label>Category</label>
            </td>
            <td>
              <select id="select" name="cat">
                <option>Select Category</option>
                <?php
                $queryCategory = "SELECT * FROM tbl_category";
                $resultCategorty = $db->select($queryCategory);
                if ($resultCategorty) {
                  while($category = $resultCategorty->fetch_assoc()){
                    ?>
                    <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
                    <?php
                  }
                }
                ?>
              </select>
            </td>
          </tr>
          <tr>
            <td>
              <label>Upload Image</label>
            </td>
            <td>
              <input type="file" name="image"/>
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
            <td>
              <label>Author Name</label>
            </td>
            <td>
              <input type="text" name="author" placeholder="Enter Post Author..." class="medium" />
            </td>
          </tr>
          <tr>
            <td>
              <label>Post Tags</label>
            </td>
            <td>
              <input type="text" name="tag" placeholder="Enter Post Tags..." class="medium" />
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
