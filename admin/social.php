<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
        <div class="grid_10">
		
            <?php 

                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                     
                     $fb = $fm->validation($_POST['fb']);
                     $tw = $fm->validation($_POST['tw']);
                     $ln = $fm->validation($_POST['ln']);
                     $gp = $fm->validation($_POST['gp']);

                     $fb = mysqli_real_escape_string($db->link, $fb);
                     $tw = mysqli_real_escape_string($db->link, $tw);
                     $ln = mysqli_real_escape_string($db->link, $ln);
                     $gp = mysqli_real_escape_string($db->link, $gp);

                     if ($fb == '' || $tw == '' || $ln == '' || $gp == '') {
                       echo "<script>alert('Field must not be empty!')</script>";
                    }else{

                        $query = "UPDATE tbl_social
                                  SET
                                  fb = '$fb',
                                  tw = '$tw',
                                  ln = '$ln',
                                  gp = '$gp' WHERE id = 1";

                        $insertSocial = $db->update($query);
                        if ($insertSocial) {
                            echo "<script>alert('Updated social links succcfully!')</script>";
                        }
                    }
                }

             ?>

            <div class="box round first grid">
                <h2>Update Social Media</h2>
                <div class="block">               
                 <form method="POST" action="">
                    <table class="form">
                        <?php 
                            $query = "SELECT * FROM tbl_social";
                            $runSocial = $db->select($query);
                            $rows = $runSocial->fetch_assoc();
                         ?>					
                        <tr>
                            <td>
                                <label>Facebook</label>
                            </td>
                            <td>
                                <input name="fb" type="text" placeholder="Facebook link.." value="<?= $rows['fb']; ?>" class="medium" />
                            </td>
                        </tr>
						 <tr>
                            <td>
                                <label>Twitter</label>
                            </td>
                            <td>
                                <input name="tw" value="<?= $rows['tw']; ?>" type="text" placeholder="Twitter link.." class="medium" />
                            </td>
                        </tr>
						
						 <tr>
                            <td>
                                <label>LinkedIn</label>
                            </td>
                            <td>
                                <input value="<?= $rows['ln']; ?>" type="text" name="ln" placeholder="LinkedIn link.." class="medium" />
                            </td>
                        </tr>
						
						 <tr>
                            <td>
                                <label>Google Plus</label>
                            </td>
                            <td>
                                <input value="<?= $rows['gp']; ?>" type="text" name="gp" placeholder="Google Plus link.." class="medium" />
                            </td>
                        </tr>
						
						 <tr>
                            <td></td>
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