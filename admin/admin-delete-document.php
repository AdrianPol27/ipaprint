<?php

  include_once("../functions.php");
  $functions = new Functions();

  $docId = $_GET['doc_id'];
  $fileName = $_GET['file_name'];

  $sql = $functions->deleteDocument($docId);
  unlink('../assets/documents/' . $fileName); // DELETE DOCUMENT FROM FOLDER

  if ($sql) {
    header("Location: admin-documents.php");
    $_SESSION['error_success'] = "";
  }

?>