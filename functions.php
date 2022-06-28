<?php

  define('DB_SERVER','localhost');
  define('DB_USERNAME','root');
  define('DB_PASSWORD','');
  define('DB_NAME','ipaprint_db');

  $errors = array();
  $errorSuccess = array();
  $errorInfo = array();

  class Functions {

    // DATABASE CONNECTION
    function __construct() {
      $conn = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_NAME);
      $this->dbh = $conn;
      if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }
      $_SESSION['conn'] = $conn;
    }

    // VALIDATE DATA
    function validate($data){
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      $data = str_replace("'", "\'", $data);
      return $data;
    }

    // SELECT QUERIES
    function fetchAllDocuments() {
      $result = mysqli_query($this->dbh, "SELECT * FROM documents_tbl");
      return $result;
    }
    function fetchDownloads() {
      $result = mysqli_query($this->dbh, "SELECT dl_id FROM downloads_tbl");
      return $result;
    }

    // INSER QUERIES
    function addDocument($documentOldName, $documentNewName, $pageOrientation, $pageSize, $copies, $firstName, $lastName, $deliveryAddress, $mobileNumber) {
      $result = mysqli_query($this->dbh, "INSERT INTO documents_tbl (document_old_name, document_new_name, page_orientation, page_size, copies, first_name, last_name, delivery_address, mobile_number) VALUES ('$documentOldName','$documentNewName','$pageOrientation','$pageSize','$copies','$firstName','$lastName','$deliveryAddress','$mobileNumber')");
      return $result;
    }
    function downloadApp($dlDate) {
      $result = mysqli_query($this->dbh, "INSERT INTO downloads_tbl (dl_date) VALUES ('$dlDate')");
      return $result;
    }

    // DELETE QUERIES
    function deleteDocument($docId) {
      $result = mysqli_query($this->dbh, "DELETE FROM documents_tbl WHERE document_id = '$docId'");
      return $result;
    }




  }
