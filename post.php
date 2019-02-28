<?php include 'inc/header.php'; ?>

<?php
if (!isset($_GET['id']) || $_GET['id'] == NULL) {
	header("Location:404.php");
}
else{
	$idPost = $_GET['id'];
}
?>

<div class="contentsection contemplete clear">
	<div class="maincontent clear">
		<div class="about">
			<?php
			$query = "SELECT * FROM tbl_post WHERE id='$idPost' ";
			$post = $db->select($query);
			if ($post) {
				while ($resultPost = $post->fetch_assoc()) {
					?>
					<h2><?php echo $resultPost['title']; ?></h2>
					<h4><?php echo $fm->formatDate($resultPost['date']); ?>, By <a href="#"><?php echo $resultPost['author']; ?></a></h4>
					<img src="admin/<?php echo $resultPost['image']; ?>" alt="MyImage"/>
					<p><?php echo $resultPost['body']; ?></p>
					<div class="relatedpost clear">
						<h2>Related articles</h2>
						<?php
						$idCategory=$resultPost['cat'];
						$queryCat = "SELECT * FROM tbl_post WHERE cat='$idCategory' ORDER BY rand() LIMIT 6";
						$relatedPost = $db->select($queryCat);
						if ($relatedPost) {
							while($resultCatetory = $relatedPost->fetch_assoc()){
								?>
								<a href="post.php?id=<?php echo $resultCatetory['id']; ?>"><img src="admin/<?php echo $resultCatetory['image']; ?>" alt="post image"/></a>
								<?php
							}
						}
						?>
					</div>
					<?php
				}
			}
			?>
		</div>
	</div>
	<?php include 'inc/sidebar.php'; ?>
</div>

<?php include 'inc/footer.php'; ?>
