<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Update Category</h2>
               <div class="block copyblock"> 
                <?php 

                 if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                     $name = mysqli_real_escape_string($db->link, $_POST['theme']);
                     if (empty($name)) {
                        echo "<span style='color:red;font-weight:bold;font-size:18px;'>Please, Select Any theme</span>";
                     }else{
                        $query = "UPDATE tbl_theme SET theme='$name'";
                        $result = $db->update($query);
                        if ($result) {
                               echo "<span style='color:green;font-weight:bold;font-size:18px;'>Theme updated successfully!</span>" . "<br>";

                                $link = "<a style='color:green;font-weight:500;font-size:14px;' href='../index'>Go Website to check</a>";
                        }
                     }
                    
                 }

                 ?>
                 <form action="" method="post">
                    <table class="form">
                    <?php 
                        $theme = "SELECT * FROM  tbl_theme";
                        $themes = $db->select($theme);
                        while ($runTheme = $themes->fetch_assoc()) {?>			
                        <tr>
                            <td>
                               <input 
                               <?php 
                                   if ($runTheme['theme'] == 'default') {
                                     echo "checked";
                                   }
                                ?>
                                id="default" type="radio" value="default" name="theme">
                               <label for="default">Default</label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                               <input 
                                <?php 
                                   if ($runTheme['theme'] == 'green') {
                                     echo "checked";
                                   }
                                ?>
                                id="green" type="radio" value="green" name="theme">
                               <label for="green">Green</label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                               <input
                               <?php 
                                   if ($runTheme['theme'] == 'red') {
                                     echo "checked";
                                   }
                                ?>
                                id="red" type="radio" value="red" name="theme">
                               <label for="red">Red</label>
                            </td>
                        </tr>
                    <?php } ?>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Change Site Theme" />
                            </td>
                        </tr>
                        <?php 
                            if (isset($link)) {
                                echo $link;
                            }
                         ?>
                    </table>
                    </form>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php'; ?>

