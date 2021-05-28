<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php 
   
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

    if (isset($_POST['submit'])) {
    	echo "<script>window.open('inbox.php','_self')</script>";
    }

 ?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Message From - <?= $row['firstname'].' '. $row['lastname']; ?> </h2>
                <div class="block">               
                 <form action="" method="POST">
                    <table class="form">
                       
                        <tr>
                            <td>
                                <label>Name</label>
                            </td>
                            <td>
                                <input readonly="" value="<?= $row['firstname'].' '. $row['lastname']; ?>" name="name" type="text" placeholder="Enter Post Title..." class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Email</label>
                            </td>
                            <td>
                                <input readonly="" value="<?= $row['email']; ?>" name="name" type="text" placeholder="Enter Post Title..." class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Date</label>
                            </td>
                            <td>
                                <input readonly="" value="<?= $fm->formatDate($row['firstname']); ?>" name="name" type="text" placeholder="Enter Post Title..." class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Content</label>
                            </td>
                            <td>
                                <p style="border: 1px solid #ddd;padding: 20px; border-radius: 5px; width: 80%;">
                                	<?php echo $row['body']; ?>
                            
                                </p>

                            </td>
                        </tr>
						<tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Ok, Go to Inbox" />
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


