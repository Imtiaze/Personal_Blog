<?php include 'config/config.php'; ?>
<?php include 'lib/Database.php'; ?>
<?php include 'helpers/Format.php'; ?>

<?php
$db = new Database();
$fm = new Format();
?>

<!DOCTYPE html>
<html>
<head>

  <?php

  if (isset($_GET['pageid'])) {
    $pageid = $_GET['pageid'];
    $query = "SELECT * FROM tbl_page WHERE id='$pageid' ";
    $resutlQuery = $db->select($query);
    if ($resutlQuery) {
      while($result = $resutlQuery->fetch_assoc()){
        ?>
        <title><?php echo $result['name']; ?> | <?php echo TITLE; ?></title>
        <?php
      }
    }
  }
  elseif (isset($_GET['id'])) {
    $postid = $_GET['id'];
    $query = "SELECT * FROM tbl_post WHERE id='$postid' ";
    $resutlQuery = $db->select($query);
    if ($resutlQuery) {
      while($result = $resutlQuery->fetch_assoc()){
        ?>
        <title><?php echo $result['title']; ?> | <?php echo TITLE; ?></title>
        <?php
      }
    }
  }
  else{
    ?>
    <title><?php echo $fm->title(); ?> | <?php echo TITLE; ?></title>
    <?php
  }
  ?>


  <meta name="language" content="English">
  <meta name="description" content="It is a website about education">
  <meta name="keywords" content="blog,cms blog">
  <meta name="author" content="Delowar">
  <link rel="stylesheet" href="font-awesome-4.5.0/css/font-awesome.css">
  <link rel="stylesheet" href="css/nivo-slider.css" type="text/css" media="screen" />
  <link rel="stylesheet" href="style.css">
  <script src="js/jquery.js" type="text/javascript"></script>
  <script src="js/jquery.nivo.slider.js" type="text/javascript"></script>

  <script type="text/javascript">
  $(window).load(function() {
    $('#slider').nivoSlider({
      effect:'random',
      slices:10,
      animSpeed:500,
      pauseTime:5000,
      startSlide:0, //Set starting Slide (0 index)
      directionNav:false,
      directionNavHide:false, //Only show on hover
      controlNav:false, //1,2,3...
      controlNavThumbs:false, //Use thumbnails for Control Nav
      pauseOnHover:true, //Stop animation while hovering
      manualAdvance:false, //Force manual transitions
      captionOpacity:0.8, //Universal caption opacity
      beforeChange: function(){},
      afterChange: function(){},
      slideshowEnd: function(){} //Triggers after all slides have been shown
    });
  });
  </script>
</head>

<body>
  <div class="headersection templete clear">
    <a href="index.php">
      <div class="logo">
        <?php
        $query = "SELECT * FROM tbl_title WHERE id='1' ";
        $resutlQuery = $db->select($query);
        if ($resutlQuery) {
          while($result = $resutlQuery->fetch_assoc()){
            ?>
            <img src="admin/<?php echo $result['logo']; ?>" alt="Logo"/>
            <h2><?php echo $result['title']; ?></h2>
            <p><?php echo $result['slogan']; ?></p>
            <?php
          }
        }
        ?>

      </div>
    </a>
    <?php
    $socialQuery = "SELECT * FROM tbl_social WHERE id='1' ";
    $resutlSocialQuery = $db->select($socialQuery);
    if ($resutlSocialQuery) {
      while($socialResultQuery = $resutlSocialQuery->fetch_assoc()){
        ?>
        <div class="social clear">
          <div class="icon clear">
            <a href ="<?php echo $socialResultQuery['facebook']; ?>" target="_blank" ><i class="fa fa-facebook"></i></a>
            <a href ="<?php echo $socialResultQuery['twitter']; ?>" target="_blank"><i class="fa fa-twitter"></i></a>
            <a href ="<?php echo $socialResultQuery['linkedin']; ?>" target="_blank"><i class="fa fa-linkedin"></i></a>
            <a href ="<?php echo $socialResultQuery['google']; ?>" target="_blank"><i class="fa fa-google-plus"></i></a>
          </div>

          <?php
        }
      }
      ?>
      <div class="searchbtn clear">
        <form action="search.php" method="GET">
          <input type="text" name="keyword" placeholder="Search keyword..."/>
          <input type="submit" name="search" value="Search"/>
        </form>
      </div>
    </div>
  </div>
  <div class="navsection templete">
    <?php
    $path =$_SERVER['SCRIPT_NAME'];
    $title = basename($path, '.php');
    ?>
    <ul>
      <li><a href="index.php"
        <?php if($title=='index'){echo 'id="active"';} ?>
        >Home</a>
      </li>

      <?php
      $query = "SELECT * FROM tbl_page";
      $queryResult = $db->select($query);
      if ($queryResult) {
        while ($result = $queryResult->fetch_assoc()) {
          ?>
          <li>
            <a href="page.php?pageid=<?php echo $result['id']; ?>"
              <?php
              if (isset($_GET['pageid']) && $_GET['pageid'] == $result['id']) {
                echo 'id="active"';
              }
              ?> >
              <?php echo $result['name']; ?>
            </a>
          </li>
          <?php
        }
      }
      ?>
      <li><a href="about.php"
        <?php if($title=='about'){echo 'id="active"';} ?>
        >About</a>
      </li>
      <li><a href="contact.php"
        <?php if($title=='contact'){echo 'id="active"';} ?>
        >Contact</a>
      </li>


    </ul>
  </div>
