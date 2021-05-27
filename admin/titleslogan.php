<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>


<?php 


    if (isset($_SERVER['REQUEST_METHOD']) == 'POST') {
        if (isset($_POST['submit'])) {

         $title    = $fm->validation($_POST['title']);
         $slogan   = $fm->validation($_POST['slogan']);

         $title    = mysqli_real_escape_string($db->link, $title);
         $slogan   = mysqli_real_escape_string($db->link, $slogan);


        $permitted = array('jpg','png','jpeg', 'gif');
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_tmp  = $_FILES['image']['tmp_name'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 15).'.'.$file_ext;
        $uploaded_image = 'uploads/'.$unique_image;


        if ($title == '' || $slogan == '') {
          $error = 'Fields must not be empty!';
        }else{

           

        if (!empty($file_name)) {
            
           
           

            if($file_size > 1048567){
                echo "<script>alert('Image size should be less that 1 MB')</script>";
            }elseif(in_array($file_ext, $permitted) === false){
                echo "<script>alert('Your file should be jpg,png,gif,jpeg');</script>";
            }else{
                
                $selectCurrentIMG = "SELECT * FROM title_slogan WHERE id=1";
                $runIMG = $db->select($selectCurrentIMG);
                $rowIMG = $runIMG->fetch_assoc();

                if ($rowIMG) {
                    if (file_exists($rowIMG['logo'])) {
                       unlink($rowIMG['logo']);
                   }
                }

              $query ="UPDATE title_slogan
                       SET
                       title      = '$title',
                       slogan    = '$slogan',
                       logo      = '$uploaded_image'
                       WHERE id=1";

               $updated_rows = $db->insert($query);
                    if ($updated_rows) {
                        move_uploaded_file($file_tmp, $uploaded_image);
                        echo "<script>alert('Data updated successfully!')</script>";
                    }else{
                        echo "<script>alert('Some error occoured!')</script>";
                    }
            }
        }else{

            $query ="UPDATE title_slogan 
                       SET
                        title      = '$title',
                        slogan    = '$slogan'
                        WHERE id=1";

               $updated_rows = $db->insert($query);

                if ($updated_rows) {
                    echo "<script>alert('Data updated successfully!')</script>";
                }else{
                    echo "<script>alert('Some error occoured!')</script>";
                }
        }
    }
}
}
 ?>

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