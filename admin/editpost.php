<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>

<?php
if (!isset($_GET['editid']) && $_GET['editid'] == NULL) {
  ?>
  <script type="text/javascript">
  window.location='postlist.php';
  </script>
  <?php
}
else {
  $postid = $_GET['editid'];
  //echo $postid;
}
?>

<div class="grid_10">
  <div class="box round first grid">
    <h2>Update the Post</h2>
    <div class="block">
      <?php
      //if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      if (isset($_POST['update'])) {

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

        if (empty($cat) || empty($body) || empty($title) || empty($author) || empty($tag)) {
          echo "<span class='error'>Filed should not be Empty !<span/>";
        }
        else{
          if(!empty($image_name)){
            if($image_size > 1048576) {  //1048576 bytes = 1MB
              echo "<span class='error'>File size should be less than 1MB!</span>";
            }
            elseif(in_array($image_extension, $permitted) ===false) {
              echo "<span class='error'>You can upload only :- ".implode(', ',$permitted)."</span>";
            }
            else {
              $querydelete = "SELECT image FROM tbl_post WHERE id ='$postid' ";
              $getImage = $db->select($querydelete);
              if($getImage){
                while($imageData = $getImage->fetch_assoc()) {
                  $deleteImage = $imageData['image'];
                  unlink($deleteImage);
                }
              }

              move_uploaded_file($tmp_path, $uploaded_image);

              $query = "UPDATE tbl_post SET cat='$cat', title='$title',body='$body', image='$uploaded_image', author='$author', tags='$tag'  WHERE id='$postid' ";

              $updatePost= $db->update($query);
              if ($updatePost) {
                echo "<span class='success'>Post Updated successfully</span>";
              }
              else {
                echo "<span class='error'>Post not Updated !</span>";
              }
            }
          }
          else{
            $query = "UPDATE tbl_post SET cat='$cat', title ='$title', body='$body', author='$author', tags='$tag'  WHERE id='$postid' ";

            $updatePost= $db->update($query);
            if ($updatePost) {
              echo "<span class='success'>Post Updated successfully</span>";
            }
            else {
              echo "<span class='error'>Post not Updated !</span>";
            }
          }
        }
      }

      ?>

      <?php
      $postquery = "SELECT * FROM tbl_post WHERE id='$postid' ";
      $postResult = $db->select($postquery);
      if ($postResult) {
        while($post = $postResult->fetch_assoc()){
          ?>
          <form action="" method="POST" enctype="multipart/form-data">
            <table class="form">
              <tr>
                <td>
                  <label>Title</label>
                </td>
                <td>
                  <input type="text" name="title" value="<?php echo $post['title']; ?>" class="medium" />
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
                        <option
                        <?php
                        if ($post['cat'] == $category['id']) {
                          ?>selected<?php
                        }
                        ?>
                        value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?>
                      </option>
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
              <td><input type="file" name="image"/></td>
              <td>
                <img src="<?php echo $post['image']; ?>" alt="" height="80" width="170">
              </td>
            </tr>
            <tr>
              <td style="vertical-align: top; padding-top: 9px;">
                <label>Content</label>
              </td>
              <td>
                <textarea class="tinymce" name="body"><?php echo $post['body']; ?></textarea>
              </td>
            </tr>
            <tr>
              <td>
                <label>Author Name</label>
              </td>
              <td>
                <input type="text" name="author" value="<?php echo $post['author']; ?>" class="medium" />
              </td>
            </tr>
            <tr>
              <td>
                <label>Post Tags</label>
              </td>
              <td>
                <input type="text" name="tag" value="<?php echo $post['tags']; ?>" class="medium" />
              </td>
            </tr>
            <tr>
              <td></td>
              <td>
                <input type="submit" name="update" Value="Update" />
              </td>
            </tr>
          </table>
        </form>
        <?php
      }
    }
    else{
      ?>
      <script type="text/javascript">
      window.location='postlist.php';
      </script>
      <?php
    }
    ?>
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
