<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>




<div class="grid_10">
  <div class="box round first grid">
    <h2>Update Site Title and Description</h2>
    <div class="block sloginblock">
      <?php

      if (isset($_POST['update'])) {

        $title  = $fm->validate($_POST['title']);
        $slogan = $fm->validate($_POST['slogan']);

        $logo_name     = $_FILES['logo']['name'];
        $logo_size     = $_FILES['logo']['size'];
        $tmp_path = $_FILES['logo']['tmp_name'];

        $permitted = array('png');
        $divide_name = explode('.', $logo_name);
        $extension = end($divide_name);
        $logo_unique_name = 'logo'.'.'.$extension;
        $uploaded_logo='upload/'.$logo_unique_name;

        if ($title == '' || $slogan == '') {
          echo "<span class='error'>Filed should not be Empty !</span>";
        }
        else {
          if(!empty($logo_name)){
            if($logo_name > 1048576) {  //1048576 bytes = 1MB
              echo "<span class='error'>File size should be less than 1MB!</span>";
            }
            else if(in_array($extension, $permitted) ===false) {
              echo "<span class='error'>You can upload only :- ".implode(', ',$permitted)."</span>";
            }
            // else {
            //   $querydelete = "SELECT image FROM tbl_post WHERE id ='$postid' ";
            //   $getImage = $db->select($querydelete);
            //   if($getImage){
            //     while($imageData = $getImage->fetch_assoc()) {
            //       $deleteImage = $imageData['image'];
            //       unlink($deleteImage);
            //     }
            //   }

            else{
              move_uploaded_file($tmp_path, $uploaded_logo);

              $updateWithoutLogo = "UPDATE tbl_title SET title='$title', slogan='$slogan', logo='$uploaded_logo' WHERE id='1' ";


              $updateLogo= $db->update($updateWithoutLogo);
              if ($updateLogo) {
                echo "<span class='success'> Updated successfully</span>";
              }
              else {
                echo "<span class='error'> Not Updated !</span>";
              }
            }
          }
          else{
            $updateWithoutLogo = "UPDATE tbl_title SET title='$title', slogan='$slogan' WHERE id='1' ";
            $updateLogo= $db->update($updateWithoutLogo);
            if ($updateLogo) {
              echo "<span class='success'> Updated successfully</span>";
            }
            else {
              echo "<span class='error'> Not Updated !</span>";
            }
          }
        }

      }




    ?>
    <?php
    $query = "SELECT * FROM tbl_title WHERE id='1' ";
    $sloganResult = $db->select($query);
    if ($sloganResult) {
      while($result = $sloganResult->fetch_assoc()){
        ?>
        <form action="" method="post" enctype="multipart/form-data">
          <table class="form">
            <tr>
              <td>
                <label>Website Title</label>
              </td>
              <td>
                <input type="text" value="<?php echo $result['title']; ?>"  name="title" class="medium" />
              </td>
            </tr>
            <tr>
              <td>
                <label>Website Slogan</label>
              </td>
              <td>
                <input type="text" value="<?php echo $result['slogan']; ?>" name="slogan" class="medium" />
              </td>
            </tr>

            <tr>
              <td>
                <label>Upload Logo</label>
              </td>
              <td>
                <input type="file"  name="logo" class="medium" />
              </td>
              <td>Logo</td>
              <td> <img src="<?php echo $result['logo']; ?>" alt="" height="100" width="120">  </td>
            </tr>


            <tr>
              <td>
              </td>
              <td>
                <input type="submit" name="update" Value="Update" />
              </td>
            </tr>
          </table>
        </form>
        <?php
      }
    }
    ?>
  </div>
</div>
</div>
<?php include 'inc/footer.php'; ?>
