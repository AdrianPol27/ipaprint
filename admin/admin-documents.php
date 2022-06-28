<?php

	session_start();
	include('../dashboard-header.php');
	include_once("../functions.php");
	$functions = new Functions();

	$userId = $_SESSION['user_id'];
	$conn = $_SESSION['conn'];

	if (isset($_SESSION['error_success'])) {
		array_push($errorSuccess, "Product deleted successfully!");
	}

?>
	
	<div class="vertical-nav" id="vertical-nav-toggle">
		<div class="logo">
			<img src=".././assets/images/gcmart-logo.png" alt="GCMart Logo">
		</div>
  	<ul class="nav">
			<p class="nav-text">Menu</p>
			<li class="nav-item">
      	<a href="admin-dashboard.php" class="nav-link">
					<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-speedometer" viewBox="0 0 16 16">
						<path d="M8 2a.5.5 0 0 1 .5.5V4a.5.5 0 0 1-1 0V2.5A.5.5 0 0 1 8 2zM3.732 3.732a.5.5 0 0 1 .707 0l.915.914a.5.5 0 1 1-.708.708l-.914-.915a.5.5 0 0 1 0-.707zM2 8a.5.5 0 0 1 .5-.5h1.586a.5.5 0 0 1 0 1H2.5A.5.5 0 0 1 2 8zm9.5 0a.5.5 0 0 1 .5-.5h1.5a.5.5 0 0 1 0 1H12a.5.5 0 0 1-.5-.5zm.754-4.246a.389.389 0 0 0-.527-.02L7.547 7.31A.91.91 0 1 0 8.85 8.569l3.434-4.297a.389.389 0 0 0-.029-.518z"/>
						<path fill-rule="evenodd" d="M6.664 15.889A8 8 0 1 1 9.336.11a8 8 0 0 1-2.672 15.78zm-4.665-4.283A11.945 11.945 0 0 1 8 10c2.186 0 4.236.585 6.001 1.606a7 7 0 1 0-12.002 0z"/>
					</svg> Dashboard
        </a>
    	</li>
			<li class="nav-item">
    		<a href="admin-documents.php" class="nav-link active">
					<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-archive" viewBox="0 0 16 16">
						<path d="M0 2a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1v7.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 12.5V5a1 1 0 0 1-1-1V2zm2 3v7.5A1.5 1.5 0 0 0 3.5 14h9a1.5 1.5 0 0 0 1.5-1.5V5H2zm13-3H1v2h14V2zM5 7.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"/>
					</svg> Documents
					<div class="badge bg-primary">
						0
					</div>
        </a>
    	</li>
    	<li class="nav-item">
      	<a href=".././index.php" class="nav-link">
					<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
						<path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
					</svg> Back
        </a>
  	 	</li>
  	</ul>
	</div>

	<div id="content" class="content-wrapper p-3">
  	<button id="sidebarCollapse" type="button" class="btn btn-light bg-white rounded-pill shadow-sm px-4 mb-4">
			<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
				<path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
			</svg>
		</button>
  	<h2 class="display-4 text-dark">Documents</h2>
		<?php include('../errors.php'); ?>
		<div class="row">
			<div class="col-12">
				<div class="box-body">
					<table id="myTable" class="table table-bordered display nowrap w-100">
						<thead>
							<tr>
								<th>ID</th>
								<th>Document Name</th>
								<th>File Name</th>
								<th>Page Orientation</th>
								<th>Page Size</th>
								<th>Copies Per Page</th>
								<th>First Name</th>
								<th>Last Name</th>
								<th>Delivery Address</th>
								<th>Mobile Number</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$cnt = 1;
								$sql = $functions->fetchAllDocuments();
								while($row = mysqli_fetch_array($sql)) {
							?>
							<tr>
								<td><?= $cnt ?></td>
								<td><?= $row['document_old_name'] ?></td>
								<td><?= $row['document_new_name'] ?></td>
								<td><?= $row['page_orientation'] ?></td>
								<td><?= $row['page_size'] ?></td>
								<td><?= $row['copies'] . ' Copy/s' ?></td>
								<td><?= $row['first_name'] ?></td>
								<td><?= $row['last_name'] ?></td>
								<td><?= $row['delivery_address'] ?></td>
								<td><?= $row['mobile_number'] ?></td>
								<td>
									<a href=".././assets/documents/<?= $row['document_new_name'] ?>" class="btn btn-primary">Download</a>
									<a href="admin-delete-document.php?doc_id=<?= $row["document_id"]?>&file_name=<?= $row["document_new_name"]?>" class="btn btn-danger">Delete</a>
								</td>
							</tr>
							<?php $cnt=$cnt+1;} ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

	<?php 
	
		include('../dashboard-footer.php');

	?>

</body>
</html>