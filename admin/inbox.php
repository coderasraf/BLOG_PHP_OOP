<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php 
	if (isset($_GET['seenID'])) {
		$msgid = $_GET['seenID'];
   		$updateQuery = "UPDATE tbl_contact
   						SET
   						status = 1 WHERE id='$msgid'";	
   		$runUpdate = $db->update($updateQuery);
   		if ($runUpdate) {
   			echo "<script>window.open('inbox.php', '_self')</script>";

   		}
	}

	if (isset($_GET['delid'])) {
		$delid = $_GET['delid'];
   		$delQuery = "DELETE FROM tbl_contact WHERE id='$delid'";	
   		$runDel = $db->delete($delQuery);
	}
 ?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Inbox</h2>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>SL No.</th>
							<th>Name</th>
							<th>Email</th>
							<th>Message</th>
							<th>Date</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php 

							$query = "SELECT * FROM tbl_contact WHERE status=0 ORDER BY id DESC";
							$run_query = $db->select($query);
							$i = 0;
							if ($run_query) {  while ($row = $run_query->fetch_assoc()) { $i++; ?>
								<tr class="odd gradeX">
									<td><?= $i; ?></td>
									<td><?= $row['firstname'].' '. $row['lastname']; ?></td>
									<td><?= $row['email']; ?></td>
									<td><?= $fm->textShorten($row['body'], 50); ?></td>
									<td><?= $fm->formatDate($row['date']); ?></td>
									<td>
										<a href="viewmsg.php?msgid=<?= $row['id']; ?>">View</a> || 
										<a onclick="return confirm('Are you sure to move this message to seenbox!')" href="?seenID=<?= $row['id']; ?>">Seen</a> ||
										<a href="replaymsg.php?msgid=<?= $row['id']; ?>">Replay</a>
									</td>
								</tr>
							<?php } } ?>
					</tbody>
				</table>
               </div>
            </div>

            <div class="box round first grid">
                <h2>Seen Messages</h2>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>SL No.</th>
							<th>Name</th>
							<th>Email</th>
							<th>Message</th>
							<th>Date</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php 

							$query = "SELECT * FROM tbl_contact WHERE status=1 ORDER BY id DESC";
							$run_query = $db->select($query);
							$i = 0;
							if ($run_query) {  while ($row = $run_query->fetch_assoc()) { $i++; ?>
								<tr class="odd gradeX">
									<td><?= $i; ?></td>
									<td><?= $row['firstname'].' '. $row['lastname']; ?></td>
									<td><?= $row['email']; ?></td>
									<td><?= $fm->textShorten($row['body'],50); ?></td>
									<td><?= $fm->formatDate($row['date']); ?></td>
									<td>
										<a onclick="return confirm('Are you sure to delete this message!')" href="?delid=<?= $row['id']; ?>">Delete</a>
									</td>
								</tr>
							<?php } } ?>
					</tbody>
				</table>
               </div>
            </div>
        </div>
<?php include 'inc/footer.php'; ?>