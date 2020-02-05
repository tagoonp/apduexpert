<?php
include "config.class.php";

if(
    (!isset($_POST['epid'])) ||
    (!isset($_POST['par']))
  ){
  mysqli_close($conn);
  die();
}

$epid = mysqli_real_escape_string($conn, $_POST['epid']);
$par = mysqli_real_escape_string($conn, $_POST['par']);

$return = [];
$buffer = [];

$strSQL = "SELECT $par FROM expertise_research_portal
           WHERE
            por_uid = '$epid'
            LIMIT 1
          ";

$query = mysqli_query($conn, $strSQL);
if(($query) && (mysqli_num_rows($query) > 0)){
  $data = mysqli_fetch_assoc($query);
  echo $data[$par];
}


mysqli_close($conn);
die();

?>
