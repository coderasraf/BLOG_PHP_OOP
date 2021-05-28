<?php include 'inc/header.php'; ?>

<?php 
	
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$firstname = $fm->validation($_POST['firstname']);
		$lastname = $fm->validation($_POST['lastname']);
		$email    = $fm->validation($_POST['email']);
		$body = $fm->validation($_POST['body']);

		$firstname = mysqli_real_escape_string($db->link,$firstname);
		$lastname = mysqli_real_escape_string($db->link,$lastname);
		$email = mysqli_real_escape_string($db->link,$email);
		$body  = mysqli_real_escape_string($db->link,$body);

		$error = '';
		$success = '';
		if (empty($firstname)) {
			$error .= 'Please Enter first name';
		}elseif (empty($lastname)) {
			$error .= 'Please Enter Last name';
		}elseif (empty($email) ||  filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
			$error .= 'Enter your valid email';
		}elseif (empty($body)) {
			$error .= 'Enter your Message!';
		}else{

			$insert = "INSERT INTO tbl_contact 
						(firstname,lastname,email,body)
						VALUES
						('$firstname','$lastname','$email','$body')";

			$runQuery = $db->insert($insert);
			if ($runQuery) {
				$success .= "Your Message sent was successfully!";
			}else{
				$error .= 'Something went to be wrong!';
			}
		}
	}

 ?>

	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<div class="about">
				<h2>Contact us</h2>
				<?php 
					if (isset($error)) {?>
						<div class="alert alert-warning">
							<h3><?php echo $error; ?></h3>
						</div>
					<?php } ?>
					<?php 
					if (isset($success)) {?>
						<div class="alert alert-success">
							<h3><?php echo $success; ?></h3>
						</div>
					<?php } ?>
			<form action="" method="post">
				<table>
				<tr>
					<td>Your First Name:</td>
					<td>
					<input value="<?php if(isset($firstname)){echo($firstname);} ?>" type="text" name="firstname" placeholder="Enter first name"/>
					</td>
				</tr>
				<tr>
					<td>Your Last Name:</td>
					<td>
					<input value="<?php if(isset($lastname)){echo($lastname);} ?>" type="text" name="lastname" placeholder="Enter Last name" />
					</td>
				</tr>
				
				<tr>
					<td>Your Email Address:</td>
					<td>
					<input value="<?php if(isset($email)){echo($email);} ?>" type="email" name="email" placeholder="Enter Email Address"/>
					</td>
				</tr>
				<tr>
					<td>Your Message:</td>
					<td>
					<textarea  name="body">
						<?php 
							if (isset($body)) {
								echo $body;
							}
						 ?>
					</textarea>
					</td>
				</tr>
				<tr>
					<td></td>
					<td>
					<input type="submit" name="send" value="Submit"/>
					</td>
				</tr>
		</table>
	<form>				
 </div>

		</div>
		<?php include 'inc/sidebar.php'; ?>
	</div>

	<?php include 'inc/footer.php'; ?>