<?php include 'inc/header.php'; ?>

<?php
if(!isset($_GET['pageid']) || $_GET['pageid'] == NULL){
	header("Location:404.php");
}
else {
	$pageid = $_GET['pageid'];
}
?>

<div class="contentsection contemplete clear">
	<div class="maincontent clear">
		<div class="about">
			<?php
			$query = "SELECT * FROM tbl_page WHERE id='$pageid' ";
			$resutlQuery = $db->select($query);
			if ($resutlQuery) {
				while($result = $resutlQuery->fetch_assoc()){
					?>
					<h2><?php echo $result['name']; ?></h2>
				<?php echo $result['body']; ?>
					<?php
				}
			}
			?>
		</div>
	</div>
	<?php include 'inc/sidebar.php'; ?>
</div>

<?php include 'inc/footer.php'; ?>
