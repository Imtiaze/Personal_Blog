<?php
include '../lib/Session.php';
Session::init();
?>

<?php Session::loginSession(); ?>


<?php include '../config/config.php'; ?>
<?php include '../lib/Database.php'; ?>
<?php include '../helpers/Format.php'; ?>

<?php
$db = new Database();
$fm = new Format();
?>

<!DOCTYPE html>
<head>
  <meta charset="utf-8">
  <title>Login</title>
  <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>
<body>
  <div class="container">
    <section id="content">
      <?php
      if ($_SERVER['REQUEST_METHOD']== 'POST') {
        $username = $fm->validate($_POST['username']);
        $password = $fm->validate(md5($_POST['password']));

        $query = "SELECT * FROM tbl_user WHERE username='$username' AND password='$password' ";
        $result = $db->select($query);
        if($result){
          $value = mysqli_fetch_array($result);
          $row = mysqli_num_rows($result);
          if ($row > 0) {
            Session::set('login', true);
            Session::set('userID', $value['id']);
            Session::set('username', $value['username']);
            header('Location:index.php');
          }
          else {
            echo "<span style='color:red;font-size:16px;'>You are not Permitted to enter this page</span>";
          }
        }
        else {
          echo "<span style='color:red;font-size:16px;'>Username and Password not Correct</span>";
        }
      }
      ?>
      <form action="" method="post">
        <h1>Admin Login</h1>
        <div>
          <input type="text" placeholder="Username" required="" name="username"/>
        </div>
        <div>
          <input type="password" placeholder="Password" required="" name="password"/>
        </div>
        <div>
          <input type="submit" value="Log in" />
        </div>
      </form><!-- form -->
      <div class="button">
        <a href="#">github.com/imtiaze</a>
      </div><!-- button -->
    </section><!-- content -->
  </div><!-- container -->
</body>
</html>
