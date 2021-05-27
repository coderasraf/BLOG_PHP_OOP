<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php 

     if (isset($_GET['id'])) {
             $id = $_GET['id'];
        }


    if (isset($_GET['delid'])) {
        
            $delid = $_GET['delid'];
            $delQuery = "DELETE FROM tbl_page WHERE id='$delid'";
            $runDel   = $db->delete($delQuery);
            if ($runDel) {
                echo "<script>alert('Page Deleted Succesfully!')</script>";
                echo "<script>window.open('index.php', '_self')</script>";
        } 
    }

   

    if (isset($_SERVER['REQUEST_METHOD']) == 'POST') {
        if (isset($_POST['submit'])) {

            $title = mysqli_real_escape_string($db->link, $_POST['title']);
	        $body  = mysqli_real_escape_string($db->link, $_POST['body']);

        if (empty($title) || empty($body)) {
          	
        	echo "<script>alert('Field should not be empty!')</script>";

        }else{
            $query ="UPDATE tbl_page
                    SET
                    title = '$title',
                    body  = '$body' WHERE id='$id'";
                    $updateRows = $db->update($query);

            if ($updateRows) {
             echo "<script>alert('Page Updated Succesfully!')</script>";
            }else{
                echo "<script>alert('Some error occoured!')</script>";
            }
        }
        }
    }

 ?>
        <div class="grid_10">
            <?php 
                $query = "SELECT * FROM tbl_page WHERE id='$id'";
                $runSocial = $db->select($query);
                if ($runSocial) {
                  $rows = $runSocial->fetch_assoc();
                }
                
            ?>
		
            <div class="box round first grid">
                <h2>Page - <?= $rows['title']; ?></h2>
                <div class="block">               
                 <form action="" method="POST">
                    <table class="form">
                       
                        <tr>
                            <td>
                                <label>Title</label>
                            </td>
                            <td>
                                <input value="<?= $rows['title']; ?>" name="title" type="text" placeholder="Enter Post Title..." class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Content</label>
                            </td>
                            <td>
                                <textarea name="body" class="tinymce">
                                    <?= $rows['body']; ?>
                                </textarea>
                            </td>
                        </tr>
						<tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Update" />
                                <a href="page.php?delid=<?= $id; ?>" onclick="return confirm('Are you sure to delete!')"> Delete </a>
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


