<?php include 'config/config.php'; ?>
<?php include 'lib/Database.php'; ?>
<?php include 'helpers/Format.php'; ?>
<?php 
		$db = new Database();
		$fm = new Format();
 ?>

<!DOCTYPE html>
<html>
<head>
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
	<link rel="stylesheet" href="font-awesome-4.5.0/css/font-awesome.css">	
	<link rel="stylesheet" href="css/nivo-slider.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="style.css">
	<script src="js/jquery.js" type="text/javascript"></script>
	<script src="js/jquery.nivo.slider.js" type="text/javascript"></script>

<script type="text/javascript">
$(window).load(function() {
	$('#slider').nivoSlider({
		effect:'random',
		slices:10,
		animSpeed:500,
		pauseTime:5000,
		startSlide:0, //Set starting Slide (0 index)
		directionNav:false,
		directionNavHide:false, //Only show on hover
		controlNav:false, //1,2,3...
		controlNavThumbs:false, //Use thumbnails for Control Nav
		pauseOnHover:true, //Stop animation while hovering
		manualAdvance:false, //Force manual transitions
		captionOpacity:0.8, //Universal caption opacity
		beforeChange: function(){},
		afterChange: function(){},
		slideshowEnd: function(){} //Triggers after all slides have been shown
	});
});
</script>
</head>

<body>
	<div class="headersection templete clear">
			<?php 

	        $query = "SELECT * FROM title_slogan";
	        $runData = $db->select($query);
	        if ($runData) {
	            $rows = $runData->fetch_assoc();
	        }

	     ?>
		<a href="#">
			<div class="logo">
				<img src="admin/<?= $rows['logo']; ?>" alt="Logo"/>
				<h2><?= $rows['title']; ?></h2>
				<p><?= $rows['slogan']; ?></p>
			</div>
		</a>
		<div class="social clear">
			<div class="icon clear">
				<?php 
                    $query = "SELECT * FROM tbl_social";
                    $runSocial = $db->select($query);
                    $rows = $runSocial->fetch_assoc();
                 ?>		
				<a href="<?= $rows['fb']; ?>" target="_blank"><i class="fa fa-facebook"></i></a>
				<a href="<?= $rows['tw']; ?>" target="_blank"><i class="fa fa-twitter"></i></a>
				<a href="<?= $rows['ln']; ?>" target="_blank"><i class="fa fa-linkedin"></i></a>
				<a href="<?= $rows['gp']; ?>" target="_blank"><i class="fa fa-google-plus"></i></a>
			</div>
			<div class="searchbtn clear">
			<form action="search" method="GET">
				<input type="text" name="search" required="" placeholder="Search keyword..."/>
				<input type="submit" name="searchBtn" value="Search"/>
			</form>
			</div>
		</div>
	</div>
<div class="navsection templete">
	<ul>
		<?php 
			$path = $_SERVER['SCRIPT_FILENAME'];
			$currentPage = basename($path, '.php');
		 ?>
		<li>
			<a <?php if ($currentPage == 'index') {echo "id='active'";}?> href="index">Home</a>
		</li>
		 <?php 
            $query = "SELECT * FROM tbl_page";
            $runSocial = $db->select($query);
            if ($runSocial) {
            while ( $rows = $runSocial->fetch_assoc()) {
            	$pageSlug = $rows['title']; ?>
            <li>
            <a
            <?php 
            	if (isset($_GET['pagename'])) {
            		if ($pageTitle == $rows['title']) {
            			echo "id='active'";
            	}
            	}
             ?>
             href="page?pagename=<?= $pageSlug; ?>"><?= $rows['title'] ?></a></li> 
        <?php }} ?>
        <li><a
         <?php if ($currentPage == 'contact') {
				echo "id='active'";
			} ?>
         href="contact">Contact US</a></li>
	</ul>
</div>
