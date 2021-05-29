<link rel="stylesheet" href="font-awesome-4.5.0/css/font-awesome.css">	
<link rel="stylesheet" href="css/nivo-slider.css" type="text/css" media="screen" />
<link rel="stylesheet" href="style.css">

<style type="text/css">
	@import url('https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400;1,600&display=swap');

	/*Default*/
	<?php 
	$theme = "SELECT * FROM  tbl_theme";
    $themes = $db->select($theme);
    $runTheme = $themes->fetch_assoc();

    if ($runTheme['theme'] == 'default') {
    	include 'theme/default.css';
    }
    elseif ($runTheme['theme'] == 'green') {
    	include 'theme/green.css';
    }
    elseif ($runTheme['theme'] == 'red') {
    	include 'theme/green.css';
    }else{
    	include 'theme/default.css';
    }

    ?>
	<?php  ?>
</style>