<?php

  include('header.php');
  include_once("functions.php");

	$functions = new Functions();

  if (isset($_POST['submit'])) {

    $documentOldName = $_POST['document-name'];
    $pageOrientation = $_POST['page-orientation'];
    $pageSize = $_POST['page-size'];
    $copies = $_POST['copies'];
    $firstName = $_POST['first-name'];
    $lastName = $_POST['last-name'];
    $deliveryAddress = $_POST['delivery-address'];
    $mobileNumber = $_POST['mobile-number'];

    $file = $_FILES['file'];
    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];
    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));
    $allowed = array('doc', 'docx', 'pdf');

    if (in_array($fileActualExt, $allowed)) {
      if ($fileError === 0) {
        $fileNewName = uniqid('', true) . "." . $fileActualExt;
        $fileDestination = './assets/documents/' . $fileNewName;
        $documentNewName = $fileNewName;
        $sql = $functions->addDocument($documentOldName, $documentNewName, $pageOrientation, $pageSize, $copies, $firstName, $lastName, $deliveryAddress, $mobileNumber);
        if ($sql) {
          move_uploaded_file($fileTmpName, $fileDestination);
          array_push($errorSuccess, "Document Uploaded Successfully!");
        }
      } else {
        array_push($errors, "There was an error uploading your file!");
      }
    } else {
      array_push($errors, "You cannot upload file of this type!");
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
                <a href="#" class="btn btn-danger">Download App</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </div>
  </section>

  <section class="site-upload-file d-flex align-items-center">
    <div class="container">
      <?php include('errors.php'); ?>
      <form action="upload-file.php" method="post" enctype="multipart/form-data">
        <div class="row align-items-center">
          <div class="col-lg-6">
            <div class="card">
              <div class="card-body">
                <fieldset>
                  <legend>Upload Document:</legend>
                  <!-- Upload Document -->
                  <input type="file" class="form-control" id="file-document" name="file" placeholder="File">
                  <!-- Document Name -->
                  <div class="form-floating my-2">
                    <input type="text" class="form-control" id="document-name" name="document-name" placeholder="File Name">
                    <label for="document-name">Document Name</label>
                  </div>
                  <!-- Page Orientation -->
                  <div class="form-floating my-2">
                    <select class="form-select" id="page-orientation" name="page-orientation">
                      <option value="Portrait">Portrait</option>
                      <option value="Landscape">Landscape</option>
                    </select>
                    <label for="page-orientation">Page Orientation</label>
                  </div>
                  <!-- Page Size -->
                  <div class="form-floating my-2">
                    <select class="form-select" id="page-size" name="page-size">
                      <option value="A4">A4</option>
                      <option value="Letter">Letter (Short)</option>
                      <option value="Legal">Legal (Long)</option>
                    </select>
                    <label for="page-size">Page Size</label>
                  </div>
                  <!-- Copy/s Per Page -->
                  <div class="form-floating">
                    <input type="number" class="form-control" id="copies" name="copies" value="1" min="1">
                    <label for="copies">Copy/s Per Page</label>
                  </div>
                </fieldset>
              </div>
            </div>
          </div>
          <div class="col-lg-6 my-2">
            <div class="card">
              <div class="card-body">
                <fieldset>
                  <legend>Delivery Details:</legend>
                  <!-- First Name -->
                  <div class="form-floating my-2">
                    <input type="text" class="form-control" id="first-name" name="first-name" placeholder="First Name">
                    <label for="first-name">First Name</label>
                  </div>
                  <!-- Last Name -->
                  <div class="form-floating my-2">
                    <input type="text" class="form-control" id="last-name" name="last-name" placeholder="Last Name">
                    <label for="document-name">Last Name</label>
                  </div>
                   <!-- Delivery Address -->
                   <div class="form-floating my-2">
                    <input type="text" class="form-control" id="delivery-address" name="delivery-address" placeholder="Delivery Address">
                    <label for="delivery-address">Delivery Address</label>
                  </div>
                   <!-- Mobile Number -->
                   <div class="form-floating my-2">
                    <input type="text" class="form-control" id="mobile-number" name="mobile-number" placeholder="Mobile Number">
                    <label for="mobile-number">Mobile Number</label>
                  </div>
                </fieldset>
                <button type="submit" class="btn btn-primary w-100" name="submit">Submit</button>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </section>

  <script>
    $('#file-document').inputFileText({
      text: 'Select File'
    });
  </script>
<?php include('footer.php') ?>