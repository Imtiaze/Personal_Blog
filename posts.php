<?php include 'inc/header.php'; ?>
<?php include 'inc/slider.php'; ?>

<div class="contentsection contemplete clear">
  <div class="maincontent clear">
    <?php
    if (!isset($_GET['category']) || $_GET['category'] == NULL) {
      header("Location:404.php");
    }
    else {
      $category = $_GET['category'];
    }
    $query = "SELECT * FROM tbl_post WHERE cat='$category' ";
    $post = $db->select($query);
    if ($post) {
      while ($result = $post->fetch_assoc()) {
        ?>
        <div class="samepost clear">
          <h2><a href="post.php?id=<?php echo $result['id']; ?>"><?php echo $result['title']; ?></a></h2>
          <h4><?php echo $fm->formatDate($result['date']); ?>, By <a href="#"><?php echo $result['author']; ?></a></h4>
          <a href="#"><img src="admin/<?php echo $result['image']; ?>" alt="post image"/></a>
          <p><?php echo $fm->formatPost($result['body'], 450); ?></p>
          <div class="readmore clear">
            <a href="post.php?id=<?php echo $result['id']; ?>">Read More</a>
          </div>
        </div>
        <?php
      }
    }
    else{
      echo "<span class='error'>There is no post in this category !!!</span>";
    }
    ?>
  </div>
  <?php include 'inc/sidebar.php'; ?>
</div>

<?php include 'inc/footer.php'; ?>
