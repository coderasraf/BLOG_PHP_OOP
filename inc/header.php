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
	<?php include 'scripts/meta.php'; ?>
	<?php include 'scripts/css.php'; ?>
	<?php include 'scripts/js.php'; ?>
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
