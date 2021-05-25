<?php include 'inc/header.php'; ?>

<?php 
	
	if (!isset($_GET['id']) || $_GET['id'] == NULL || $_GET['id'] == '') {
		header("Location:404.php");
	}else{
		$id = $_GET['id'];
	}

 ?>
	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<div class="about">
				<?php 

					$query = "SELECT * FROM tbl_post WHERE id = '$id'";
					$post  = $db->select($query);
					$result = $post->fetch_assoc();

					if ($post) {  ?>
						<h2><?= $result['title']; ?></h2>
						<h4><?= $fm->formatDate($result['date']); ?>, By <?= $result['author']; ?></h4>
						<img src="admin/uploads/<?= $result['image']; ?>" alt="MyImage"/>
						
						<?= $result['body']; ?>
					
					<?php }else{ header("Location:404.php"); ?>

					<?php } ?>

				<div class="relatedpost clear">
					
					<h2>Related articles</h2>
					<?php 

						$catid = $result['cat'];
						$queryReleated = "SELECT * FROM tbl_post WHERE cat='$catid' LIMIT 6";
						$relatedpost = $db->select($queryReleated);

						if ($relatedpost) {
							while ($row = $relatedpost->fetch_assoc()) { 
								if ($result['id'] != $row['id']) { ?>
						<a href="post?id=<?= $row['id']; ?>"><img src="admin/uploads/<?= $row['image']; ?>" alt="post image"/></a>
						<?php }}}else{ ?>
							<div class="alert alert-warning">
								<h2 class="text-center">
									No releated post found!
									<a href="index" class="btn btn-primary">
										Go Back to the Homepage!
									</a>
								</h2>
							</div>
						<?php } ?>
				</div>
			</div>
		</div>
		<?php include 'inc/sidebar.php'; ?>
	</div>

	<?php include 'inc/footer.php'; ?>