<?php

  session_start();
  include_once("functions.php");
	$functions = new Functions();
 
  $query = $functions->fetchDownloads();
  $num_rows = mysqli_num_rows($query);
  echo $num_rows + 1;

?>