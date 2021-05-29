<?php include 'inc/header.php'; ?>
<?php include 'inc/slider.php'; ?>

	<div class="contentsection contemplete clear">
		<div class="maincontent clear">

			<!-- Pagination code -->
			<?php 
				$per_page = 3;
				if (isset($_GET['page'])) {
					$page = $_GET['page'];
				}else{
					$page = 1;
				}

				$start_from = ($page - 1) * $per_page;
			 ?>
			<!-- End paginatio code -->

			<?php 
				$sql = "SELECT * FROM tbl_post ORDER BY id DESC LIMIT $start_from, $per_page";
				$posts = $db->select($sql);
				if ($posts) {
				foreach ($posts as $post) { ?>
				<div class="samepost clear">
					<h2><a href="post?id=<?= $post['id']; ?>"><?= $post['title']; ?></a></h2>
					<h4><?= $fm->formatDate($post['date']); ?>, By <a href="#"><?= $post['author']; ?></a></h4>
					 <a href="post?id=<?= $post['id']; ?>"><img src="admin/<?= $post['image']; ?>" alt="post image"/></a>

					 <?= $fm->textShorten($post['body'], 400); ?>

					<div class="readmore clear">
						<a href="post?id=<?= $post['id']; ?>">Read More</a>
					</div>
				</div>
			<?php } ?> <!--- endforeach loop -->

			<!-- Pagination -->

			<?php 

				$query = "SELECT * FROM tbl_post";
				$result = $db->select($query);
				$total_rows = mysqli_num_rows($result);
				$total_pages = ceil($total_rows / $per_page);
			 ?>
			
			<span class="pagination">
				<a href="index?page=1">First Page</a>
				<?php for ($i=1; $i < $total_pages ; $i++) { 
						if ($page == $i) {
							$active = 'active';
						}else{
							$active = '';
						}

					?>
				<a class="<?php if(isset($active)){echo $active; } ?>" href="index?page=<?= $i; ?>"><?= $i; ?></a>	
				<?php }?>
				<a href="index?page=<?= $total_pages; ?>">Last Page</a>
			</span>

			<?php } else{ header("Location:404.php"); } ?>
		</div>
		<?php include 'inc/sidebar.php'; ?>
	</div>

<?php include 'inc/footer.php'; ?>