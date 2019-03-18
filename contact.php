<?php include 'inc/header.php'; ?>

<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$firstName = $fm->validate($_POST['firstname']);
	$lastName  = $fm->validate($_POST['lastname']);
	$email     = $fm->validate($_POST['email']);
	$body      = $fm->validate($_POST['body']);
	$message = '';

	if (empty($firstName)) {
		$message = "<p style='color:red;font-size:21px;'>First Name filled is empty</p>";
	}
	elseif(empty($lastName)){
		echo "<p style='color:red;font-size:21px;'>Last Name filled is empty</p>";
	}
	elseif(empty($email)){
		$message = "<p style='color:red;font-size:21px;'>Email filled is empty</p>";
	}
	elseif(empty($body)){
		$message = "<p style='color:red;font-size:21px;'>Message filled is empty</p>";
	}
	elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
		$message = "<p style='color:red;font-size:21px;'>Write a Valid Email</p>";
	}
	else{
		$query = "INSERT INTO tbl_contact(firstname, lastname, email, body,status) VALUES('$firstName', '$lastName', '$email', '$body', '0')";
		$queryInsert = $db->insert($query);
		if ($queryInsert) {
			$message = "<p style='color:green;font-size:21px;'>Your message sent successfully</p>";
		}
		else{
			$message = "<p style='color:red;font-size:21px;'>Your message not sent</p>";
		}
	}
}

?>


<div class="contentsection contemplete clear">
	<div class="maincontent clear">
		<div class="about">
			<h2>Contact us</h2>
			<?php
			if (isset($message)) {
				echo $message;
			}
			?>
			<form action="" method="post">
				<table>
					<tr>
						<td>Your First Name:</td>
						<td>
							<input type="text" name="firstname" placeholder="Enter first name" />
						</td>
					</tr>
					<tr>
						<td>Your Last Name:</td>
						<td>
							<input type="text" name="lastname" placeholder="Enter Last name" />
						</td>
					</tr>

					<tr>
						<td>Your Email Address:</td>
						<td>
							<input type="text" name="email" placeholder="Enter Email Address" />
						</td>
					</tr>
					<tr>
						<td>Your Message:</td>
						<td>
							<textarea name="body"></textarea>
						</td>
					</tr>
					<tr>
						<td></td>
						<td>
							<input type="submit" name="submit" value="Submit"/>
						</td>
					</tr>
				</table>
			</form>
		</div>
	</div>
	<?php include 'inc/sidebar.php'; ?>
</div>
<?php include 'inc/footer.php'; ?>
