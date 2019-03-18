<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $userMail  = $fm->validate($_POST['useremail']);
  $myMail    = $fm->validate($_POST['myemail']);
  $subject   = $fm->validate($_POST['subject']);
  $body      = $fm->validate($_POST['body']);
  $message = '';



  if (empty($userMail)) {
    $message = "<p style='color:red;font-size:21px;'>User mail filled is empty</p>";
  }
  elseif(empty($myMail)){
    $message =  "<p style='color:red;font-size:21px;'>My email filled is empty</p>";
  }
  elseif(empty($subject)){
    $message = "<p style='color:red;font-size:21px;'>Subject filled is empty</p>";
  }
  elseif(empty($body)){
    $message = "<p style='color:red;font-size:21px;'>Message filled is empty</p>";
  }
  elseif(!filter_var($userMail, FILTER_VALIDATE_EMAIL)){
    $message = "<p style='color:red;font-size:21px;'>Write a Valid Email</p>";
  }
  elseif(!filter_var($myMail, FILTER_VALIDATE_EMAIL)){
    $message = "<p style='color:red;font-size:21px;'>Write a Valid Email</p>";
  }
  else{
    $sendMail = mail($userMail, $subject, $body, $myMail);
    if ($sendMail) {
      $message = "<p style='color:green;font-size:21px;'>Write a Valid Email</p>";
    }
    else{
      $message = "<p style='color:red;font-size:21px;'>Something went Wrong</p>";
    }
  }
}

?>


<?php
//from inbox.php  msgid
if (!isset($_GET['replyid']) || $_GET['replyid'] == NULL) {
  ?>
  <script type="text/javascript">
  window.location='inbox.php';
  </script>
  <?php
}
else {
  $replyid = $_GET['replyid'];
}
?>

<div class="grid_10">
  <div class="box round first grid">
    <h2>Add New Post</h2>
    <div class="block">
      <?php if (isset($message)): ?>
        <?php echo $message; ?>
      <?php endif; ?>
      <form action="" method="POST" enctype="multipart/form-data">
        <table class="form">
          <?php
          $query = "SELECT email FROM tbl_contact WHERE id='$replyid' ";
          $email = $db->select($query);
          if ($email) {
            while($resultEmail = $email->fetch_assoc()){
              ?>
              <tr>
                <td>
                  <label>To</label>
                </td>
                <td>

                  <input type="text" name="useremail" value="<?php echo $resultEmail['email']; ?>" class="medium" />
                </td>
              </tr>
              <?php
            }
          }
          ?>

          <tr>
            <td>
              <label>From</label>
            </td>
            <td>
              <input type="text" name="myemail" value="" placeholder="Enter your email" class="medium" />
            </td>
          </tr>

          <tr>
            <td>
              <label>Subject</label>
            </td>
            <td>
              <input type="text" name="subject" placeholder="Enter Subject..." class="medium" />
            </td>
          </tr>


          <tr>
            <td style="vertical-align: top; padding-top: 9px;">
              <label>Reply</label>
            </td>
            <td>
              <textarea class="tinymce" name="body"></textarea>
            </td>
          </tr>


          <tr>
            <td></td>
            <td>
              <input type="submit" name="send" Value="Send" />
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
