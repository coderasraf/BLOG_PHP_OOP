<?php include 'inc/header.php'; ?>

	<div class="contentsection contemplete clear">
		<div class="maincontent clear">

			<?php 

				if (!isset($_GET['search']) || $_GET['search'] == NULL || $_GET['search'] == '') {
					header('Location:404.php');
				}else{

					$search = $_GET['search'];

				$sql = "SELECT * FROM tbl_post WHERE title LIKE '%$search%' || body LIKE '%$search%'";
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

			<?php } else{ ?>
				<div class="alert text-center alert-warning">
					<h2 class="text-center">Not data found <span style="color:red;">
						<?= $search; ?>
					</span> in this search query!</h2>
					<a href="index" class="btn btn-primary text-center">Go back to the Homepage</a>
				</div>
			<?php } ?>
		</div>
		<?php include 'inc/sidebar.php'; ?>
	</div>
<?php } ?>

<?php include 'inc/footer.php'; ?>