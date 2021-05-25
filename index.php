<?php include 'inc/header.php'; ?>
<?php include 'inc/slider.php'; ?>

<?php 
	$db = new Database();
	$fm = new Format();
 ?>
	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<?php 
				$sql = "SELECT * FROM tbl_post LIMIT 3";
				$posts = $db->select($sql);
				if ($posts) {
				foreach ($posts as $post) { ?>
				<div class="samepost clear">
					<h2><a href="post.php?id=<?= $post['id']; ?>"><?= $post['title']; ?></a></h2>
					<h4><?= $fm->formatDate($post['date']); ?>, By <a href="#"><?= $post['author']; ?></a></h4>
					 <a href="post.php?id=<?= $post['id']; ?>"><img src="admin/uploads/<?= $post['image']; ?>" alt="post image"/></a>

					 <?= $fm->textShorten($post['body'], 400); ?>

					<div class="readmore clear">
						<a href="post.php?id=<?= $post['id']; ?>">Read More</a>
					</div>
				</div>
			<?php } ?> <!--- endforeach loop -->

			<!-- Pagination -->
			
			<span class="pagination">
				<a href="index.php?page=1">First Page</a>
				<a class="active" href="index.php?page=1">1</a>
				<a class="active" href="index.php?page=2">2</a>
				<a href="index.php?page=2">Last Page</a>
			</span>

			<?php }else{ header("Location:404.php"); } ?>
		</div>
		<?php include 'inc/sidebar.php'; ?>
	</div>

<?php include 'inc/footer.php'; ?>