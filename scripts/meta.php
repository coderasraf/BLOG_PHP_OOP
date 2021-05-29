<!-- [PAGE TITLE DYNAMIC CHANGING CODE] -->
	<?php 
		if (isset($_GET['pagename'])) {

			$pageTitle = $_GET['pagename']; ?>
			<title><?= $pageTitle; ?> - <?= TITLE ?></title>

		<?php }elseif (isset($_GET['id'])) { 

			$postID = $_GET['id']; 
			$post = "SELECT * FROM tbl_post WHERE id='$postID'";
			$runPost = $db->select($post);
			if ($runPost) {
				$rowPost = $runPost->fetch_assoc();
			}?>
			<title><?= $rowPost['title']; ?> - <?= TITLE ?></title>

		<?php }elseif (isset($_GET['category'])) {
			$catID = $_GET['category'];
			$category = "SELECT * FROM tbl_category WHERE id='$catID'";
			$runCategory = $db->select($category);
			if ($runCategory) {
				$rowCategory = $runCategory->fetch_assoc();
			} ?>
			<title><?= $rowCategory['name']; ?> - <?= TITLE ?></title>
			
		<?php } else{ ?>
			<title><?= $fm->title(); ?> - <?= TITLE ?></title>
		<?php } ?>

		<!-- ![PAGE TITLE DYNAMIC CHANGING CODE] -->

	<meta name="language" content="English">
	<meta name="description" content="It is a website about education">
	<?php 

		$tags = '';
		if (isset($_GET['id'])) {
			$keywordid = $_GET['id'];
			$query = "SELECT * FROM tbl_post WHERE id='$keywordid'";
			$keyword = $db->select($query);
			if ($keyword) {
				$row = $keyword->fetch_assoc();
				$tags = $row['tags'];
			}
		}else{
			$tags = KEYWORDS;
		}

	 ?>
	<meta name="keywords" content="<?= $tags; ?>">
	<meta name="author" content="Delowar">