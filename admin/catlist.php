<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php 
	
	if (isset($_GET['del_id'])) {
		$delId = $_GET['del_id'];

		$query = "DELETE FROM tbl_category WHERE id='$delId'";
		$delete = $db->delete($query);
		if ($delete) {
			echo "<script>alert('Category Deleted Successfully!');</script>";
		}else{
			echo "<script>alert('Category not Deleted Successfully!');</script>";
		}
	}

 ?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Category List</h2>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Category Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
				<?php

					$query = "SELECT * FROM tbl_category ORDER BY id DESC";
					$category = $db->select($query);
					$i = 0;
					if ($category) {
						while ($result = $category->fetch_assoc()) {
								$i++;
								?>
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $result['name']; ?></td>
							<td><a href="editcat.php?cat_id=<?php echo $result['id']; ?>">Edit</a> || <a onclick='return confirm("Are u sure to delete!");' href="?del_id=<?php echo $result['id']; ?>">Delete</a></td>
						</tr>
						<?php } }  ?>
					</tbody>
				</table>
               </div>
            </div>
        </div>
<?php include 'inc/footer.php'; ?>