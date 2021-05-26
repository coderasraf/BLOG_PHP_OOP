<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Update Category</h2>
               <div class="block copyblock"> 
                <?php 

                if (isset($_GET['cat_id'])) {
                    $id = $_GET['cat_id'];
                }
                 if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                     $name = mysqli_real_escape_string($db->link, $_POST['name']);
                     if (empty($name)) {
                        echo "<span style='color:red;font-weight:bold;font-size:18px;'>Please, Insert text!</span>";
                     }else{
                        $query = "UPDATE tbl_category SET name='$name' WHERE id='$id'";
                        $result = $db->update($query);
                        if ($result) {
                               echo "<span style='color:green;font-weight:bold;font-size:18px;'>Data Updated Successfully!</span>";
                        }
                     }
                    
                 }

                 ?>
                 <form action="" method="post">
                    <table class="form">
                    <?php 
                        $sql = "SELECT * FROM tbl_category WHERE id='$id'";
                        $runSql = $db->select($sql);
                        $result = $runSql->fetch_assoc();
                        if ($result) {
                          $catName = $result['name'];
                        }
                     ?>					
                        <tr>
                            <td>
                                <input type="text" placeholder="Enter Category Name..." name="name" value="<?= $catName; ?>" class="medium" />
                            </td>
                        </tr>
						<tr> 
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

