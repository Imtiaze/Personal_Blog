<?php include 'inc/header.php'; ?>
<?php include 'inc/slider.php'; ?>

<div class="contentsection contemplete clear">
	<div class="maincontent clear">
		<!-- pagination -->
		<?php
		$limit = 3;
		if (isset($_GET['page'])) {
			$page = $_GET['page'];
			if ($page < 1) {
				$page = 1;
			}
		}
		else {
			$page = 1;
		}
		$start_from = ($page -1) * $limit;
		// we can do this too $start_from = ( $page *$limit ) - $limit; same result will produce;
		?>
		<?php
		$query = "SELECT * FROM tbl_post LIMIT $start_from, $limit";
		$post = $db->select($query);
		if ($post) {
			while ($result = $post->fetch_assoc()) {
				?>
				<div class="samepost clear">
					<h2><a href="post.php?id=<?php echo $result['id']; ?>"><?php echo $result['title']; ?></a></h2>
					<h4><?php echo $fm->formatDate($result['date']); ?>, By <a href="#"><?php echo $result['author']; ?></a></h4>
					<a href="#"><img src="admin/upload/<?php echo $result['image']; ?>" alt="post image"/></a>
					<p><?php echo $fm->formatPost($result['body'], 450); ?></p>
					<div class="readmore clear">
						<a href="post.php?id=<?php echo $result['id']; ?>">Read More</a>
					</div>
				</div>
				<?php
			}  //end of while

			// pagination
			$query1 = "SELECT  * FROM tbl_post";
			$result = $db->select($query1);
			$total_rows = mysqli_num_rows($result);
			$total_pages = ceil($total_rows/$limit);
			?>
			<span class='pagination'><a href='index.php?page=<?php echo $page-1; ?>'>Previous Page</a>
				<?php
				for ($i=1; $i <=$total_pages ; $i++) {
					?>
					<a href='index.php?page=<?php echo $i; ?>'><?php echo $i; ?></a>
					<?php
				}
				?>
				<a href='index.php?page=<?php echo $page+1; ?>'>Next Page</a>
			</span>
			<?php
		}    //end of if
		else{
			header("Location:404.php");
		}
		?>
	</div>
	<?php include 'inc/sidebar.php'; ?>
</div>

<?php include 'inc/footer.php'; ?>
