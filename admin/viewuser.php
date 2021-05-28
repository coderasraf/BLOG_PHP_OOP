<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php 

    $userid = Session::get('userId');
    $role   = Session::get('userrole');


    if (isset($_SERVER['REQUEST_METHOD']) == 'POST') {
        if (isset($_POST['submit'])) {
            $name = mysqli_real_escape_string($db->link, $_POST['name']);
            $username   = mysqli_real_escape_string($db->link, $_POST['username']);
            $email  = mysqli_real_escape_string($db->link, $_POST['email']);
            $details  = mysqli_real_escape_string($db->link, $_POST['body']);

            $query ="UPDATE tbl_user 
                       SET
                       name         = '$name',
                       username     = '$username',
                       details      = '$details',
                       email        = '$email' WHERE id='$userid'";

               $updated_rows = $db->update($query);

                if ($updated_rows) {
                    echo "<script>alert('User updated successfully!')</script>";
                }else{
                    echo "<script>alert('Some error occoured!')</script>";
                }
        }
    }
 ?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Update Post</h2>
                <div class="block">
                <?php 

                    $query = "SELECT * FROM tbl_user WHERE id='$userid' AND roloe='$role'";
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


