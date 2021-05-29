<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php 

    if (!isset($_GET['userid']) || $_GET['userid'] == NULL) {
         echo "<script>window.open('userlist.php', '_self')</script>";
    }else{
        $id = $_GET['userid'];
    }

  	if (isset($_POST['submit'])) {
  		 echo "<script>window.open('userlist.php', '_self')</script>";
  	}
 ?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Users Details</h2>
                <div class="block">
                <?php 

                    $query = "SELECT * FROM tbl_user WHERE id='$id'";
                    $getPost = $db->select($query);
                    $result  = $getPost->fetch_assoc();
                 ?>               
                 <form action="" method="POST" enctype="multipart/form-data">
                    <?php if (isset($error)) {
                        echo "<div class='alert alert-warning'>$error</div>";
                    } ?>
                    <table class="form">
                       
                        <tr>
                            <td>
                                <label>Name</label>
                            </td>
                            <td>
                                <input name="name" type="text" placeholder="Name" value="<?= $result['name']; ?>" class="medium" />
                            </td>
                        </tr>
                         <tr>
                            <td>
                                <label>Username</label>
                            </td>
                            <td>
                                <input name="username" type="text" placeholder="Username...." value="<?= $result['username']; ?>" class="medium" />
                            </td>
                        </tr>
                         <tr>
                            <td>
                                <label>Email</label>
                            </td>
                            <td>
                                <input name="email" type="email" placeholder="Email" value="<?= $result['email']; ?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>About You</label>
                            </td>
                            <td>
                                <textarea name="body" class="tinymce">
                                    <?= $result['details']; ?>
                                </textarea>
                            </td>
						<tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="ok" />
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


