<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>

<?php 
    
    if (Session::get('userrole') != '0') {
         echo "<script>window.open('userlist.php', '_self')</script>";
    }

 ?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Add New User</h2>
               <div class="block copyblock"> 
                <?php 

                 if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                    $username = $fm->validation($_POST['username']);
                    $password = $fm->validation(md5($_POST['password']));
                    $role     = $fm->validation($_POST['role']);
                    $email    = $fm->validation($_POST['email']);
                    $name     = $fm->validation($_POST['name']);

                     $username = mysqli_real_escape_string($db->link, $username);
                     $role = mysqli_real_escape_string($db->link, $role);
                     $password = mysqli_real_escape_string($db->link, $password);
                     $email = mysqli_real_escape_string($db->link, $email);

                     if (empty($name) ||empty($username) || empty($password) || empty($role) || empty($email)) {
                        echo "<span style='color:red;font-weight:bold;font-size:18px;'>Field Must not be empty!</span>";
                     }else{

                     $selectEmail = "SELECT * FROM tbl_user WHERE email='$email'";
                     $emailChk = $db->select($selectEmail);
                     if ($emailChk != FALSE) {
                         echo "<script>alert('Email Already Exist!')</script>";
                     } else{
                        $query = "INSERT INTO tbl_user (name,username,password,email,roloe) VALUES('$name',$username','$password','$email','$role')";
                        $result = $db->insert($query);
                        if ($result) {
                            echo "User Created  successfully";
                            echo "<script>window.open('userlist.php', '_self');</script>";
                        }
                     }
                   } 
                 }

                 ?>
                 <form action="" method="post">
                    <table class="form">
                        <tr>
                            <td>
                                <label>Name</label>
                            </td>
                            <td>
                                <input type="text" placeholder="Enter Name..." name="name" class="medium" />
                            </td>
                        </tr>					
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
                                <label>Email</label>
                            </td>
                            <td>
                                <input type="email" placeholder="Enter email ..." name="email" class="medium" />
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

