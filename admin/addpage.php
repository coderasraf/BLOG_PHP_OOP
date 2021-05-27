<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php 
    
    if (isset($_SERVER['REQUEST_METHOD']) == 'POST') {
        if (isset($_POST['submit'])) {
            $title = mysqli_real_escape_string($db->link, $_POST['title']);
	        $body  = mysqli_real_escape_string($db->link, $_POST['body']);


        if (empty($title) || empty($body)) {
          	
        	echo "<script>alert('Field should not be empty!')</script>";

        }else{
            $query = "INSERT INTO tbl_page (title,body) 
                      VALUES 
                      ('$title','$body')";
                    $inserted_rows = $db->insert($query);

            if ($inserted_rows) {
             echo "<script>alert('Page Created Succesfully!')</script>";
            }else{
                echo "<script>alert('Some error occoured!')</script>";
            }
        }
        }
    }

 ?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Add New Page</h2>
                <div class="block">               
                 <form action="" method="POST">
                    <table class="form">
                       
                        <tr>
                            <td>
                                <label>Title</label>
                            </td>
                            <td>
                                <input name="title" type="text" placeholder="Enter Post Title..." class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Content</label>
                            </td>
                            <td>
                                <textarea name="body" class="tinymce"></textarea>
                            </td>
                        </tr>
						<tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Save" />
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


