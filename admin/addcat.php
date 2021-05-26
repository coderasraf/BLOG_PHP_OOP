<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Add New Category</h2>
               <div class="block copyblock"> 
                <?php 

                 if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                     $name = mysqli_real_escape_string($db->link, $_POST['name']);
                     if (empty($name)) {
                        echo "<span style='color:red;font-weight:bold;font-size:18px;'>Please, Insert text!</span>";
                     }else{
                        $query = "INSERT INTO tbl_category (name) VALUES('$name')";
                        $result = $db->insert($query);
                        if ($result) {
                            echo "Data inserted successfully";
                            echo "<script>window.open('catlist.php', '_self');</script>";
                        }
                     }
                    
                 }

                 ?>
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" placeholder="Enter Category Name..." name="name" class="medium" />
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

