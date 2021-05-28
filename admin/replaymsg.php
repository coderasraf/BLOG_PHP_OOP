<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php 

	if (isset($_POST['submit'])) {

		$to  = $fm->validation($_POST['toEmail']);
		$from  = $fm->validation($_POST['fromEmail']);
		$subject  = $fm->validation($_POST['subject']);
		$body  = $fm->validation($_POST['body']);

		$sendMail = mail($to, $subject, $body, $from);
		if ($sendMail) {
			echo "Message Sent Successfully!";
		}else{
			echo "Message not Sent Successfully!";
		}

	}

   
   if (!isset($_GET['msgid']) || $_GET['msgid'] == NULL) {
   		echo "<script>window.open('inbox.php','_self')</script>";
   }else{
		$msgid = $_GET['msgid'];
   		$updateQuery = "UPDATE tbl_contact
   						SET
   						status = 1 WHERE id='$msgid'";	

   		$runUpdate = $db->update($updateQuery);
   		$selectMsg = "SELECT * FROM tbl_contact WHERE id='$msgid'";
   		$message = $db->select($selectMsg);
   		if ($message) {
   			$row = $message->fetch_assoc();
   		}

   }

 ?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Send Message TO - <?= $row['firstname'].' '. $row['lastname']; ?> </h2>
                <div class="block">               
                 <form action="" method="POST">
                    <table class="form">

                        <tr>
                            <td>
                                <label>To</label>
                            </td>
                            <td>
                                <input readonly="" value="<?= $row['email']; ?>" name="toEmail" type="text" placeholder="Enter Post Title..." class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>From</label>
                            </td>
                            <td>
                                <input name="fromEmail" type="text" placeholder="Please Enter your email address" class="medium" />
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label>Subject</label>
                            </td>
                            <td>
                                <input  name="subject" type="text" placeholder="Subject" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Content</label>
                            </td>
                            <td>
                                <textarea name="body" class="tinymce">
                                  
                                </textarea>

                            </td>
                        </tr>
						<tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Sent Message" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
         <!-- Load TinyMCE -->
    <script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            setupTinyMCE();
            setDatePicker('date-picker');
            $('input[type="checkbox"]').fancybutton();
            $('input[type="radio"]').fancybutton();
        });
    </script>
<?php include 'inc/footer.php'; ?>


\