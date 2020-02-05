<?php
include "config.class.php";

if(
    (!isset($_POST['ept_id'])) ||
    (!isset($_POST['uid']))
  ){
  mysqli_close($conn);
  die();
}

$ept_id = mysqli_real_escape_string($conn, $_POST['ept_id']);

$return = [];
$buffer = [];

$strSQL = "DELETE FROM expertise_info
           WHERE
            ept_id = '$ept_id'
          ";

$query = mysqli_query($conn, $strSQL);
if($query){
  echo "Y";
}else{
  echo "N";
}

mysqli_close($conn);
die();

?>
