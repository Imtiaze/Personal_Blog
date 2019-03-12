<div class="footersection templete clear">
  <div class="footermenu clear">
    <ul>
      <li><a href="#">Home</a></li>
      <li><a href="#">About</a></li>
      <li><a href="#">Contact</a></li>
      <li><a href="#">Privacy</a></li>
    </ul>
  </div>
  <?php
  $copyrightQuery = "SELECT * FROM tbl_footer WHERE id='1' ";
  $copyrightResult = $db->select($copyrightQuery);
  if ($copyrightResult) {
    while ($resultCopyright = $copyrightResult->fetch_assoc()) {
      ?>
      <p>&copy; <?php echo $resultCopyright['note']; ?></p>
      <?php
    }
  }
  ?>
</div>

<?php
$socialQuery = "SELECT * FROM tbl_social WHERE id='1' ";
$resutlSocialQuery = $db->select($socialQuery);
if ($resutlSocialQuery) {
  while($socialResultQuery = $resutlSocialQuery->fetch_assoc()){
    ?>

    <div class="fixedicon clear">
      <a href="<?php echo $socialResultQuery['facebook']; ?>"><img src="images/fb.png" alt="Facebook"/></a>
      <a href="<?php echo $socialResultQuery['twitter']; ?>"><img src="images/tw.png" alt="Twitter"/></a>
      <a href="<?php echo $socialResultQuery['linkedin']; ?>"><img src="images/in.png" alt="LinkedIn"/></a>
      <a href="<?php echo $socialResultQuery['google']; ?>"><img src="images/gl.png" alt="GooglePlus"/></a>
    </div>

    <?php
  }
}
?>


<script type="text/javascript" src="js/scrolltop.js"></script>
</body>
</html>
