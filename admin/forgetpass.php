<?php 
	include 'lib/Session.php';
?>
<?php include '../config/config.php'; ?>
<?php include '../lib/Database.php'; ?>
<?php include '../helpers/Format.php'; ?>
<?php 
	$db = new Database; 
	$fm = new Format;
?>
<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Recover Password</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>
<body>
<div class="container">
	<section id="content">
<?php 

	if (isset($_POST['forgot'])) {
		$email = $fm->validation($_POST['email']);
		$email = mysqli_real_escape_string($db->link,$email);

		if (filter_var($email, FILTER_VALIDATE_EMAIL) == FALSE) {
			echo "<span style='color:red;font-weight:bold;font-size:18px;'>Please, Enter a valid email!</span>";
		}else{

		// Fetching data from database
		$query = "SELECT * FROM tbl_user WHERE email = '$email' LIMIT 1";
		$result = $db->select($query);
		if ($result != false) {
				while ($value  = $result->fetch_assoc()) {
					$userid  = $value['id'];
					$username = $value['username'];
				}
			// Genarate new password
				$text = substr($email, 0, 4);
				$rand = rand(8000, 9000);
				$newpass  = "$text$rand";
				$password = md5($newpass);

				// Update existing password from database
				$updateQuery  ="UPDATE tbl_user
								SET
								password = '$password' WHERE id='$userid'";
				$update   = $db->update($updateQuery);
					// After updating password user will getting an email with new password
					$to 	  = "$email";
					$subject  = "<strong>Your New Password!</strong>". "\n";
					$from     = "hassasraf@gmail.com";
					$headers  = "From: $from\n";
					$headers  .= "MIME-Version: 1.0" . "\r\n";
					$headers  .= "Content-type: text/html; charset=iso-8859-1";
					$message  = "Hi,"."\n"."Your username is: $username and Password: $newpass";
					$sendmail  = mail($to, $subject, $message, $headers);
					if ($sendmail) {
						echo "<span style='color:red;font-weight:bold;font-size:18px;'>Please Check your email!</span>";
					}else{
						echo "<span style='color:red;font-weight:bold;font-size:18px;'>Some error occoured!</span>";
					}
		}else{
			echo "<span style='color:red;font-weight:bold;font-size:18px;'>Your Email Not exist!</span>";
		}
	}
}
?>
		<form action="forgetpass.php" method="post">
			<h1>Recover Password</h1>
			<div>
				<input type="text" placeholder="Enter valid email" name="email"/>
			</div>
			<div>
				<input type="submit" name="forgot" value="Send Email" />
			</div>
		</form><!-- form -->
		<div class="button">
			<!-- <a href="login.php">Back to Login</a> -->
			<a href="#">www.hassasraf.com</a>
		</div><!-- button -->
	</section><!-- content -->
</div><!-- container -->
</body>
</html>