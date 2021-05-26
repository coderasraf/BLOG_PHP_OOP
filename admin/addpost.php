<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php 
    
    if (isset($_SERVER['REQUEST_METHOD']) == 'POST') {
        if (isset($_POST['submit'])) {
         $title = mysqli_real_escape_string($db->link, $_POST['title']);
        $cat   = mysqli_real_escape_string($db->link, $_POST['cat']);
        $date  = mysqli_real_escape_string($db->link, $_POST['date']);
        $tags  = mysqli_real_escape_string($db->link, $_POST['tags']);
        $body  = mysqli_real_escape_string($db->link, $_POST['body']);
        $author  = mysqli_real_escape_string($db->link, $_POST['author']);

        $permitted = array('jpg','png','jpeg', 'gif');
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_tmp  = $_FILES['image']['tmp_name'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 15).'.'.$file_ext;
        $uploaded_image = 'uploads/'.$unique_image;


        if ($title == '' || $tags == '' || $cat == '' || $date == '' || $body == '' || $author == '' || $file_name == '') {
          $error = 'Fields must not be empty!';
        }elseif($file_size > 1048567){
            echo "<script>alert('Image size should be less that 1 MB')</script>";
        }elseif(in_array($file_ext, $permitted) === false){
            echo "<script>alert('Your file should be jpg,png,gif,jpeg');</script>";
        }else{
            $query = "INSERT INTO tbl_post (cat,title,body,image,author,tags,date) 
                      VALUES 
                      ('$cat','$title','$body','$uploaded_image','$author','$tags','$date')";

                    $inserted_rows = $db->insert($query);

            if ($inserted_rows) {
                move_uploaded_file($file_tmp, $uploaded_image);
             echo "<script>window.open('postlist.php', '_self')</script>";
            }else{
                echo "<script>alert('Some error occoured!')</script>";
            }
        }
        }
    }

 ?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Add New Post</h2>
                <div class="block">               
                 <form action="" method="POST" enctype="multipart/form-data">
                    <?php if (isset($error)) {
                        echo "<div class='alert alert-warning'>$error</div>";
                    } ?>
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
                            <td>
                                <label>Category</label>
                            </td>
                            <td>
                                <select id="select" name="cat">
                                    <option value="">Select Category</option>
                                    <?php 
                                        $sql = "SELECT * FROM tbl_category";
                                        $runSql = $db->select($sql);
                                        if ($runSql) {
                                            foreach ($runSql as $category) {?>
                                            <option value="<?= $category['id']; ?>"><?= $category['name']; ?></option>
                                        <?php } } ?>
                                </select>
                            </td>
                        </tr>
                   
                    
                        <tr>
                            <td>
                                <label>Date Picker</label>
                            </td>
                            <td>
                                <input name="date" type="date" id="date-picker" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Upload Image</label>
                            </td>
                            <td>
                                <input name="image" type="file" />
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
                            <td>
                                <label>Tags</label>
                            </td>
                            <td>
                                <input name="tags" type="text" placeholder="Author Name ..." />
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label>Author Name</label>
                            </td>
                            <td>
                                <input name="author" type="text" placeholder="Author Name ..." />
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


