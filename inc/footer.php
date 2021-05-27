<div class="footersection templete clear">
	  <div class="footermenu clear">
		<ul>
			<li><a href="#">Home</a></li>
			<li><a href="#">About</a></li>
			<li><a href="#">Contact</a></li>
			<li><a href="#">Privacy</a></li>
		</ul>
	  </div>
	  <?php 
        $query = "SELECT * FROM tbl_footer";
        $runCopyright = $db->select($query);
        if ($runCopyright) {
            $rows = $runCopyright->fetch_assoc();
        }
     ?>			
	  <p>&copy; <?= $rows['note']; ?> <?php echo date('Y'); ?></p>
	</div>
	<div class="fixedicon clear">
		<?php 
            $query = "SELECT * FROM tbl_social";
            $runSocial = $db->select($query);
            $rows = $runSocial->fetch_assoc();
         ?>		
		<a href="<?= $rows['fb']; ?>"><img src="images/fb.png" alt="Facebook"/></a>
		<a href="<?= $rows['tw']; ?>"><img src="images/tw.png" alt="Twitter"/></a>
		<a href="<?= $rows['ln']; ?>"><img src="images/in.png" alt="LinkedIn"/></a>
		<a href="<?= $rows['gp']; ?>"><img src="images/gl.png" alt="GooglePlus"/></a>
	</div>
<script type="text/javascript" src="js/scrolltop.js"></script>
</body>
</html>