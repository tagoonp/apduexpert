<?php
include "config.class.php";

if(
    (!isset($_POST['pid'])) ||
    (!isset($_POST['uid']))
  ){
  mysqli_close($conn);
  die();
}

$pid = mysqli_real_escape_string($conn, $_POST['pid']);

$return = [];
$buffer = [];

$strSQL = "UPDATE expertise_person
           SET p_delete = 'Y'
           WHERE
            pid = '$pid'
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
