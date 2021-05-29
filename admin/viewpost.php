<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php 

    if (!isset($_GET['postid']) || $_GET['postid'] == NULL) {
         echo "<script>window.open('postlist.php', '_self')</script>";
    }else{
        $id = $_GET['postid'];
    }
 ?>
        <div class="grid_10">
		      <?php 
                    $query = "SELECT * FROM tbl_post WHERE id='$id' LIMIT 1";
                    $getPost = $db->select($query);
                    $result  = $getPost->fetch_assoc();
                 ?> 
            <div class="box round first grid">
                <h2>Post - <?php echo $result['title']; ?></h2>
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
                                <input readonly="" name="title" type="text" placeholder="Enter Post Title..." value="<?= $result['title']; ?>" class="medium" />
                            </td>
                        </tr>
                     
                        <tr>
                            <td>
                                <label>Category</label>
                            </td>
                            <td>
                                <select id="select" name="cat">
                                    <option value="">Category</option>
                                    <?php 
                                        $sql = "SELECT * FROM tbl_category";
                                        $runSql = $db->select($sql);
                                        if ($runSql) {

                                            foreach ($runSql as $category) {?>
                                            <option
                                            <?php 
                                                if ($result['cat'] == $category['id']) {?>
                                                selected='selected'
                                                <?php } ?>
                                             value="<?= $category['id']; ?>"><?= $category['name']; ?></option>
                                        <?php } } ?>
                                </select>
                            </td>
                        </tr>
                   
                    
                        <tr>
                            <td>
                                <label>Date</label>
                            </td>
                            <td>
                                <input readonly="" value="<?= $result['date']; ?>" name="date" type="date" id="date-picker" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label> Image</label>
                            </td>
                            <td>
                                <input name="image" type="file" />
                                <img width="50px" height="50px" src="<?= $result['image']; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Content</label>
                            </td>
                            <td>
                                <textarea readonly="" name="body" class="tinymce">
                                    <?= $result['body']; ?>
                                </textarea>
                            </td>
                        </tr>
                         <tr>
                            <td>
                                <label>Tags</label>
                            </td>
                            <td>
                                <input value="<?= $result['tags']; ?>" name="tags" type="text" placeholder="Author Name ..." />
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label>Author Name</label>
                            </td>
                            <td>
                                <input value="<?= $result['author']; ?>" name="author" type="text" placeholder="Author Name ..." />
                            </td>
                            <td>
                                <input hidden="" value="<?= Session::get('userId'); ?>" name="userid" type="text" placeholder="Author Name ..." />
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


