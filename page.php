<?php include 'inc/header.php'; ?>

<?php
	
	if (!isset($_GET['pagename']) || $_GET['pagename'] == NULL || $_GET['pagename'] == '') {
			header('Location:404');
	}else{
		$pagename = $_GET['pagename'];
		$query = "SELECT * FROM tbl_page WHERE title = '$pagename'";
		$page = $db->select($query);
		if ($page) {
			$pageContent = $page->fetch_assoc();
		}
	}

 ?>

	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<div class="about">
				<h2>
					<?php 
						 if (!isset($pageContent['title'])) {
						 	header('Location:404');
						 }else{
						 	echo $pageContent['title']; 
						 }
					?>
				</h2>
				<?php 
					 if (!isset($pageContent['body'])) {
					 	header('Location:404');
					 }else{
					 	echo $pageContent['body']; 
					 }
				 ?>
			</div>
		</div>
		<?php include 'inc/sidebar.php'; ?>
	</div>

<?php include 'inc/footer.php'; ?>