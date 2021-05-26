<div class="sidebar clear">
			<div class="samesidebar clear">
				<h2>Categories</h2>
					<ul>
						<?php 
							$query = "SELECT * FROM tbl_category";
							$categories = $db->select($query);
							if ($categories) {
								foreach ($categories as $category ) { ?>
							<li><a href="posts?category=<?= $category['id']; ?>"><?= $category['name']; ?></a></li>
							<?php } } ?>			
					</ul>
			</div>
			
			<div class="samesidebar clear">
				<h2>Latest articles</h2>

				<?php 
				$query = "SELECT * FROM tbl_post ORDER BY id DESC LIMIT 5";
				$posts = $db->select($query);
				if ($posts) {
					foreach ($posts as $post ) { ?>
					<div class="popular clear">
						<h3><a href="post?id=<?= $post['id']; ?>"><?= $post['title'] ?></a></h3>
						<a href="#"><img src="admin/<?= $post['image']; ?>" alt="post image"/></a>
						<?= $fm->textShorten($post['body'], 100); ?>
					</div>
				<?php } } ?>		
			</div>
			
		</div>