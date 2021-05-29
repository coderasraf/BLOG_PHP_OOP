<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php 
	
	if (isset($_GET['del_id'])) {
		$delId = $_GET['del_id'];

		$query = "DELETE FROM tbl_user WHERE id='$delId'";
		$delete = $db->delete($query);
		if ($delete) {
			echo "<script>alert('User Deleted Successfully!');</script>";
		}else{
			echo "<script>alert('Category not Deleted Successfully!');</script>";
		}
	}

 ?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>ALL Users</h2>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>SL NO.</th>
							<th>Name</th>
							<th>Username</th>
							<th>Email</th>
							<th>Details</th>
							<th>Role</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
				<?php

					$query = "SELECT * FROM tbl_user ORDER BY id DESC";
					$user = $db->select($query);
					$i = 0;
					if ($user) {
						while ($result = $user->fetch_assoc()) {
								$i++;
								?>
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $result['name']; ?></td>
							<td><?php echo $result['username']; ?></td>
							<td><?php echo $result['email']; ?></td>
							<td><?php echo $result['details']; ?></td>
							<td>
								<?php 
									if ($result['roloe'] == 0) {
									 	echo "Admin";
									 }elseif ($result['roloe'] == 1) {
									 	echo "Author";
									 }elseif ($result['roloe'] == 2) {
									 	echo "Editor";
									 }
								?>	
							</td>
							<td><a href="viewuser.php?userid=<?php echo $result['id']; ?>">View User</a> 
								<?php 
									if (Session::get('userrole') == '0') {?>
								||<a onclick='return confirm("Are u sure to delete!");' href="?del_id=<?php echo $result['id']; ?>">Delete</a>
							<?php } ?>
							</td>
						</tr>
						<?php } }  ?>
					</tbody>
				</table>
               </div>
            </div>
        </div>
<?php include 'inc/footer.php'; ?>