<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>

<?php 
	
	if (isset($_GET['delID'])) {

		$delID = $_GET['delID'];

		  	$selectCurrentIMG = "SELECT * FROM tbl_post WHERE id='$delID'";
            $runIMG = $db->select($selectCurrentIMG);
            if ($runIMG) {
            	$rowIMG = $runIMG->fetch_assoc();
                   unlink($rowIMG['image']);
           	}
         	$query = "DELETE FROM tbl_post WHERE id='$delID'";
			$runQuery = $db->delete($query);
			
		if ($runQuery) {
			echo "<script>alert('Post deleted Successfully!')</script>";
		}else{
			echo "<script>alert('Post not deleted Successfully!')</script>";
		}
	}

 ?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Post List</h2>
        <div class="block">  
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th width="5%">No.</th>
					<th width="20%">Post Title</th>
					<th width="20%">Description</th>
					<th width="10%">Category</th>
					<th width="10%">Image</th>
					<th width="10%">Tags</th>
					<th width="10%">Date</th>
					<th width="10%">Author</th>
					<th width="10%">Action</th>
				</tr>
			</thead>
			<tbody>
				<?php 

					$query = "SELECT tbl_post.*, tbl_category.name FROM tbl_post INNER JOIN tbl_category ON tbl_post.cat = tbl_category.id ORDER BY tbl_post.id DESC";
					$post = $db->select($query);
					if ($post) {
						$i = 0;
						foreach ($post as $single) {
							$i++;
						?>
					<tr class="odd gradeX">
						<td><?= $i; ?></td>
						<td><?= $single['title']; ?></td>
						<td><?= $fm->textShorten($single['body'], 100); ?></td>
						<td><?= $single['name']; ?></td>
						<td>
							<img width="40px" height="40px" src="<?= $single['image']; ?>">
						</td>
						<td><?= $single['tags']; ?></td>
						<td><?= $fm->formatDate($single['date']); ?></td>
						<td class="center"><?= $single['author']; ?></td>
		<td>

			<a href="viewpost.php?postid=<?= $single['id']; ?>">View</a>
			<?php 
				if (Session::get('userId') == $single['userid'] || Session::get('userrole') == '0') { ?> 
			||<a href="editpost.php?editID=<?= $single['id']; ?>">Edit</a> ||
			<a onclick="return confirm('Are you sure to delete!')" href="?delID=<?= $single['id']; ?>">Delete</a>
			<?php } ?>
		</td>
					</tr>
				<?php }}else{
					echo "No post available";
				} ?>
			</tbody>
		</table>

       </div>
    </div>
</div>
<script type="text/javascript">
$(document).ready(function () {
    setupLeftMenu();
    $('.datatable').dataTable();
	setSidebarHeight();
});
</script>

<?php include 'inc/footer.php'; ?>

