<div class="sidebar clear">
  <div class="samesidebar clear">
    <h2>Categories</h2>
    <ul>
      <?php
      $query = "SELECT * FROM tbl_category";
      $category = $db->select($query);
      if ($category) {
        while ($resultCategory = $category->fetch_assoc()) {
          ?>
          <li><a href="posts.php?category=<?php echo $resultCategory['id']; ?>"><?php echo $resultCategory['name']; ?></a></li>
          <?php
        }
      }
      else {
        ?>
        <li>No category  Created.</li>
        <?php
      }
      ?>
    </ul>
  </div>
  <div class="samesidebar clear">
    <h2>Latest articles</h2>
    <?php
    $query = "SELECT * FROM tbl_post ORDER BY id DESC LIMIT 6";
    $latestPost = $db->select($query);
    if ($latestPost) {
      while ($resultLatestPost = $latestPost->fetch_assoc()) {
        ?>
        <div class="popular clear">
          <h3><a href="post.php?id=<?php echo $resultLatestPost['id']; ?>"><?php echo $resultLatestPost['title']; ?></a></h3>
          <a href="post.php?id=<?php echo $resultLatestPost['id']; ?>"><img src="admin/<?php echo $resultLatestPost['image']; ?>" alt="post image"/></a>
          <p><?php echo $fm->formatPost($resultLatestPost['body'], 110); ?></p>
        </div>
        <?php
      }
    }
    else {
      ?>
      <li>No Latest Post.</li>
      <?php
    }
    ?>
  </div>
</div>
