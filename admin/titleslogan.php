<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
        <div class="grid_10">		
            <div class="box round first grid">
                <h2>Update Site Title and Description</h2>
                <div class="block sloginblock">    

                <?php 

                    $query = "SELECT * FROM title_slogan WHERE id = 1";
                    $runQuery = $db->select($query);
                    if ($runQuery) {
                        $runResult = $runQuery->fetch_assoc();
                    }

                 ?>

                 <?php 

                    if (isset($_POST['submit'])) {
                        
                        $title = $_POST['title'];
                        $slogan = $_POST['slogan'];

                        $permitted = array('jpg','png','jpeg', 'gif');
                        $file_name = $_FILES['image']['name'];
                        $file_size = $_FILES['image']['size'];
                        $file_tmp  = $_FILES['image']['tmp_name'];

                        $div = explode('.', $file_name);
                        $file_ext = strtolower(end($div));
                        $unique_image = substr(md5(time()), 0, 15).'.'.$file_ext;
                        $uploaded_image = 'uploads/'.$unique_image;

                        if (empty($title) || empty($slogan)) {
                            echo "<script>alert('Choose an image!')</script>";
                        }

                        if (in_array($file_ext, $permitted)) {
                           echo "<script>alert('Choose only jpg,png,jpeg and gif!')</script>";
                        }

                        if (!empty($file_name)) {
                            
                            $query = "UPDATE tbl_post
                                      SET
                                      title = '$title',
                                      slogan = '$slogan',
                                      logo = '$uploaded_image'
                                      WHERE id = 1";
                            $updateQuery = $db->update($query);
                            if ($updateQuery) {
                                move_uploaded_file($file_tmp, $uploaded_image);
                                echo "<script>alert('Updated successfully!')</script>";
                            }else{
                                echo "<script>alert('Updated not properly!')</script>";
                            }
                        }else{

                            $query = "UPDATE tbl_post
                                      SET
                                      title = '$title',
                                      slogan = '$slogan',
                                      WHERE id = 1";
                            $updateQuery = $db->update($query);
                            if ($updateQuery) {
                                move_uploaded_file($file_tmp, $uploaded_image);
                                echo "<script>alert('Updated successfully!')</script>";
                            }else{
                                echo "<script>alert('Updated not properly!')</script>";
                            }
                        }
                    }

                  ?>

                 <form method="POST" action="" enctype="multipart/form-data">
                    <table class="form">					
                        <tr>
                            <td>
                                <label>Website Title</label>
                            </td>
                            <td>
                                <input value="<?= $runResult['title']; ?>" type="text" placeholder="Enter Website Title..."  name="title" class="medium" />
                            </td>
                        </tr>
						 <tr>
                            <td>
                                <label>Website Slogan</label>
                            </td>
                            <td>
                                <input value="<?= $runResult['slogan'] ?>" type="text" placeholder="Enter Website Slogan..." name="slogan" class="medium" />
                            </td>
                        </tr>


                        <tr>
                            <td>
                                <label>Upload Logo</label>
                            </td>
                            <td>
                                <input type="file" name="image" class="medium" />
                            </td>
                            
                        </tr>
                        <tr>
                            <td>
                                <label>Logo Preview</label>
                            </td>
                            <td>
                                <img width="60px;" height="60px" src="<?= $runResult['logo'];?>">
                            </td>
                        </tr>
						 
						
						 <tr>
                            <td>
                            </td>
                            <td>
                                <input type="submit" name="submit" Value="Update" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php'; ?>