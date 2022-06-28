<?php

	session_start();
	include('../dashboard-header.php');

?>
	
	<div class="vertical-nav" id="vertical-nav-toggle">
		<div class="logo">
			<a class="navbar-brand" href="index.php"><h2>ipaprint<span class="text-primary">.co</span></h2></a>
		</div>
  	<ul class="nav">
			<p class="nav-text">Menu</p>
			<li class="nav-item">
      	<a href="admin-dashboard.php" class="nav-link active">
					<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-speedometer" viewBox="0 0 16 16">
						<path d="M8 2a.5.5 0 0 1 .5.5V4a.5.5 0 0 1-1 0V2.5A.5.5 0 0 1 8 2zM3.732 3.732a.5.5 0 0 1 .707 0l.915.914a.5.5 0 1 1-.708.708l-.914-.915a.5.5 0 0 1 0-.707zM2 8a.5.5 0 0 1 .5-.5h1.586a.5.5 0 0 1 0 1H2.5A.5.5 0 0 1 2 8zm9.5 0a.5.5 0 0 1 .5-.5h1.5a.5.5 0 0 1 0 1H12a.5.5 0 0 1-.5-.5zm.754-4.246a.389.389 0 0 0-.527-.02L7.547 7.31A.91.91 0 1 0 8.85 8.569l3.434-4.297a.389.389 0 0 0-.029-.518z"/>
						<path fill-rule="evenodd" d="M6.664 15.889A8 8 0 1 1 9.336.11a8 8 0 0 1-2.672 15.78zm-4.665-4.283A11.945 11.945 0 0 1 8 10c2.186 0 4.236.585 6.001 1.606a7 7 0 1 0-12.002 0z"/>
					</svg> Dashboard
        </a>
    	</li>
			<li class="nav-item">
    		<a href="admin-documents.php" class="nav-link">
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
  	<h2 class="display-4 text-dark">Dashboard</h2>
		<div class="row">
			<div class="col-12">
				<div class="box-body p-4">
					<p class="h4">Hello, <span class="lead"><?= $_SESSION['first_name'] . ' ' . $_SESSION['last_name'];?></span></p>
					<p>Welcome to the seller dashboard. You can now start selling items.</p>
				</div>
			</div>
			<div class="col-lg-6">
				<!-- Shops -->
				<div class="box-body">
					<div class="box-image">
						<i class="fa fa-motorcycle"></i>
					</div>
					<div class="box-text">
						<h4>Products:</h4>
						<p>
							<?php
								$sql="SELECT order_id FROM orders WHERE status = 'Delivering' AND rider_id = '$riderId'";

								if ($result=mysqli_query($conn,$sql)) {
									// RETURN THE NUMBER OF ROWS IN RESULT SET 
									$rowcount=mysqli_num_rows($result);
									printf($rowcount);
									// FREE RESULT FROM MEMORY
									mysqli_free_result($result);
								}
							?>
						</p>
					</div>
				</div>
			</div>
			<div class="col-lg-6">
				<!-- Earned-->
				<div class="box-body">
					<div class="box-image">
						<i class="fa fa-product-hunt"></i>
					</div>
					<div class="box-text">
						<h4>Earned:</h4>
						<p>
							<?php
								$sql4="SELECT SUM(rider_fee) AS earned FROM orders WHERE status = 'Delivered' AND rider_id = '$riderId'";
								$result4 = mysqli_query($conn, $sql4);
								while ($row = mysqli_fetch_assoc($result4)) {
									echo '&#8369; ' . number_format($row['earned'],2);
								}
							?>
						</p>
					</div>
				</div>
			</div>	
		</div>
	</div>


	<?php 
	
		include('../dashboard-footer.php');

	?>

</body>
</html>