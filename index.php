<?php
  session_start();
  include('header.php');
  include_once("functions.php");
	$functions = new Functions();
  $dlDate = date("Y-m-d");
  $file = 'spongebob.png';

  if (isset($_POST['submit'])) {
    if (file_exists($file)) {
      $query = $functions->downloadApp($dlDate);
      header('Content-Description: File Transfer');
      header('Content-Type: application/octet-stream');
      header('Content-Disposition: attachment; filename="'.basename($file).'"');
      header('Expires: 0');
      header('Cache-Control: must-revalidate');
      header('Pragma: public');
      header('Content-Length: ' . filesize($file));
      readfile($file);
      exit;
    }
  }
?>

  <section class="site-navbar">
    <div class="container">
      <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="index.php">ipaprint<span class="text-danger">.co</span></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
              <li class="nav-item me-2">
                <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
                  <button type="submit" name="submit" class="btn btn-danger" id="download-app-btn">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
                      <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                      <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
                    </svg> Download App
                  </button>
                </form>
              </li> 
            </ul>
          </div>
        </div>
      </nav>
    </div>
  </section>

  <section class="site-hero d-flex align-items-center">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6 order-lg-1 order-2">
          <h1 class="py-3 text-uppercase text-white">We'll print it for you.</h1>
          <p class="lead text-white">Upload your document then we'll print and deliver it to you wherever you are inside the campus.</p>
          <a href="upload-file.php" class="btn btn-danger btn-lg">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-upload" viewBox="0 0 16 16">
              <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
              <path d="M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708l3-3z"/>
            </svg> Upload Document
          </a>
        </div>
        <div class="col-lg-6 order-lg-2 order-1 d-flex justify-content-around d-block d-lg-flex d-none">
          <img src="./assets/images/ipaprint-app-1.png" id="hero-img" alt="Hero Image">
        </div>
      </div>
    </div>
  </section>

  <section class="site-how-to-use">
    <div class="container p-4 shadow-lg">
      <div class="row">
        <div class="col-lg-4 py-2 py-lg-0">
          <div class="card">
            <div class="card-body">
              <div class="text-center py-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-file-earmark" viewBox="0 0 16 16">
                  <path d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5L14 4.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h-2z"/>
                </svg>
                <h5 class="py-1">File Type</h5>
              </div>
              <p class="lead text-justify">Make sure that your document extension is .doc, .docx or .pdf.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 py-2 py-lg-0">
          <div class="card">
            <div class="card-body">
              <div class="text-center py-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-check" viewBox="0 0 16 16">
                  <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                  <path fill-rule="evenodd" d="M15.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                </svg>
                <h5 class="py-1">Ease of Use</h5>
              </div>
              <p class="lead text-justify">ipaprint is designed to be easy for an untrained user to use.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 py-2 py-lg-0">
          <div class="card">
            <div class="card-body">
              <div class="text-center py-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-phone-flip" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M11 1H5a1 1 0 0 0-1 1v6a.5.5 0 0 1-1 0V2a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v6a.5.5 0 0 1-1 0V2a1 1 0 0 0-1-1Zm1 13a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-2a.5.5 0 0 0-1 0v2a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-2a.5.5 0 0 0-1 0v2ZM1.713 7.954a.5.5 0 1 0-.419-.908c-.347.16-.654.348-.882.57C.184 7.842 0 8.139 0 8.5c0 .546.408.94.823 1.201.44.278 1.043.51 1.745.696C3.978 10.773 5.898 11 8 11c.099 0 .197 0 .294-.002l-1.148 1.148a.5.5 0 0 0 .708.708l2-2a.5.5 0 0 0 0-.708l-2-2a.5.5 0 1 0-.708.708l1.145 1.144L8 10c-2.04 0-3.87-.221-5.174-.569-.656-.175-1.151-.374-1.47-.575C1.012 8.639 1 8.506 1 8.5c0-.003 0-.059.112-.17.115-.112.31-.242.6-.376Zm12.993-.908a.5.5 0 0 0-.419.908c.292.134.486.264.6.377.113.11.113.166.113.169 0 .003 0 .065-.13.187-.132.122-.352.26-.677.4-.645.28-1.596.523-2.763.687a.5.5 0 0 0 .14.99c1.212-.17 2.26-.43 3.02-.758.38-.164.713-.357.96-.587.246-.229.45-.537.45-.919 0-.362-.184-.66-.412-.883-.228-.223-.535-.411-.882-.571ZM7.5 2a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1Z"/>
                </svg>
                <h5 class="py-1">Mobile Friendly</h5>
              </div>
              <p class="lead text-justify">ipaprint layout changes to fit depends on the user device.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="document-tracker" id="document-tracker">
    <div class="container py-5">
      <div class="col-12">
				<div class="box-body">
					<table id="myTable" class="table table-bordered display nowrap w-100">
						<thead>
							<tr>
								<th>ID</th>
								<th>Document Name</th>
                <th>To Pay</th>
                <th>Status</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$cnt = 1;
								$query = $functions->fetchAllDocuments();
								while($row = mysqli_fetch_array($query)) {
							?>
							<tr>
								<td><?= $cnt ?></td>
								<td><?= $row['document_old_name'] ?></td>
                <td><p>Calculating</p></td>
                <td><p>Queued</p></td>
							</tr>
							<?php $cnt=$cnt+1;} ?>
						</tbody>
					</table>
				</div>
			</div>
    </div>
  </section>

  <section class="site-downloads">
    <div class="container py-5 text-center text-white">
      <h1>Downloads</h1>
      <div id="downloads">
        <?php
          $query = $functions->fetchDownloads();
          $num_rows = mysqli_num_rows($query);
          echo $num_rows;
        ?>
      </div>
    </div>
  </section>

  <!-- <section class="site-testimonials">
    <div class="container py-5">

      <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="row">
              <div class="col-lg-6">
                <div class="card">
                  <div class="card-header">
                    Quote
                  </div>
                  <div class="card-body">
                    <blockquote class="blockquote mb-0">
                      <p>A well-known quote, contained in a blockquote element.</p>
                      <footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>
                    </blockquote>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item active">
            <img src="..." class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item active">
            <img src="..." class="d-block w-100" alt="...">
          </div>
        </div>
      </div>
    </div>
  </section> -->
  
<?php include('footer.php') ?>

<script type="text/javascript">
  // Initialize images in an array
  var picPaths = ['./assets/images/ipaprint-app-2.png','./assets/images/ipaprint-app-1.png'];
  // An index to track the contender image 
  var imageIndex = 0;
  var bannerImage; 
  // An event callback for starting the interval
  function startInterval() {
  setInterval(displayNextImage, 2000);
  }
  // Display next image function
  function displayNextImage() {
    bannerImage.src = picPaths[imageIndex];
    if(imageIndex === (picPaths.length-1)) {
      imageIndex = 0;
    }
    else {
      imageIndex = imageIndex + 1; // It can be replaced with imageIndex ++  
    }
  }
  // Load images
  window.onload=function() {
    bannerImage = document.getElementById('hero-img');
    startInterval();
  }

  // Load number of downloads
  $(document).ready(function() {
    $("#download-app-btn").click(function() {
      $('#downloads').load("load-downloads.php");
    });
  });
</script>
