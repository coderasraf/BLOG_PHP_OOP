<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php 

                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                     
                     $note = $fm->validation($_POST['copyright']);
                     $note = mysqli_real_escape_string($db->link, $note);

                     if ($note == '') {
                       echo "<script>alert('Field must not be empty!')</script>";
                    }else{

                        $query = "UPDATE tbl_footer
                                  SET note = '$note' WHERE id = 1";

                        $insertSocial = $db->update($query);
                        if ($insertSocial) {
                            echo "<script>alert('Updated social links succcfully!')</script>";
                        }
                    }
                }

             ?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Update Copyright Text</h2>
                <div class="block copyblock"> 
                 <form method="POST" action="">
                    <table class="form">	
                    <?php 
                        $query = "SELECT * FROM tbl_footer";
                        $runCopyright = $db->select($query);
                        if ($runCopyright) {
                            $rows = $runCopyright->fetch_assoc();
                        }
                     ?>				
                        <tr>
                            <td>
                                <input value="<?= $rows['note']; ?>" type="text" placeholder="Enter Copyright Text..." name="copyright" class="large" />
                            </td>
                        </tr>
						
						 <tr> 
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