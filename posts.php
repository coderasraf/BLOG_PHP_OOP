<?php include 'inc/header.php'; ?>
<?php include 'inc/slider.php'; ?>

	<div class="contentsection contemplete clear">
		<div class="maincontent clear">

			<?php 

				if (!isset($_GET['category']) || $_GET['category'] == NULL || $_GET['category'] == '') {
					header('Location:404.php');
				}else{
					$id = $_GET['category'];
					print_r($id);
				}

				$sql = "SELECT * FROM tbl_post WHERE cat='$id'";
				$posts = $db->select($sql);
				if ($posts) {
				foreach ($posts as $post) { ?>
				<div class="samepost clear">
					<h2><a href="post?id=<?= $post['id']; ?>"><?= $post['title']; ?></a></h2>
					<h4><?= $fm->formatDate($post['date']); ?>, By <a href="#"><?= $post['author']; ?></a></h4>
					 <a href="post?id=<?= $post['id']; ?>"><img src="admin/uploads/<?= $post['image']; ?>" alt="post image"/></a>

					 <?= $fm->textShorten($post['body'], 400); ?>

					<div class="readmore clear">
						<a href="post?id=<?= $post['id']; ?>">Read More</a>
					</div>
				</div>
			<?php } ?> <!--- endforeach loop -->

			<?php } else{ header("Location:404.php"); } ?>
		</div>
		<?php include 'inc/sidebar.php'; ?>
	</div>

<?php include 'inc/footer.php'; ?>