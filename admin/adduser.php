<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Add New User</h2>
               <div class="block copyblock"> 
                <?php 

                 if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                    $username = $fm->validation($_POST['username']);
                    $password = $fm->validation(md5($_POST['password']));
                    $role     = $fm->validation($_POST['role']);

                     $username = mysqli_real_escape_string($db->link, $username);
                     $role = mysqli_real_escape_string($db->link, $role);
                     $password = mysqli_real_escape_string($db->link, $password);

                     if (empty($username) || empty($password) || empty($role)) {
                        echo "<span style='color:red;font-weight:bold;font-size:18px;'>Field Must not be empty!</span>";
                     }else{
                        $query = "INSERT INTO tbl_user (username,password,roloe) VALUES('$username','$password', '$role')";
                        $result = $db->insert($query);
                        if ($result) {
                            echo "User Created  successfully";
                            // echo "<script>window.open('userlist.php', '_self');</script>";
                        }
                     }
                    
                 }

                 ?>
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <label>Username</label>
                            </td>
                            <td>
                                <input type="text" placeholder="Enter username..." name="username" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Password</label>
                            </td>
                            <td>
                                <input type="password" placeholder="Enter password ..." name="password" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>User Role</label>
                            </td>
                            <td>
                               <select id="select" name="role" class="medium">
                                    <option>Select Role</option>
                                    <option value="0">Admin</option>
                                    <option value="1">Author</option>
                                    <option value="2">Editor</option>
                               </select>
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
<?php include 'inc/footer.php'; ?>

