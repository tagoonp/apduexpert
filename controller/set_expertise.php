<?php
include "config.class.php";

if(
    (!isset($_POST['keyword'])) ||
    (!isset($_POST['method'])) ||
    (!isset($_POST['epid'])) ||
    (!isset($_POST['uid']))
  ){
  mysqli_close($conn);
  die();
}

$keyword = mysqli_real_escape_string($conn, $_POST['keyword']);
$method = mysqli_real_escape_string($conn, $_POST['method']);
$epid = mysqli_real_escape_string($conn, $_POST['epid']);
$uid = mysqli_real_escape_string($conn, $_POST['uid']);

$return = [];
$buffer = [];

if($method == 'add'){
    $strSQL = "INSERT INTO expertise_info
              (ept_expertize, ept_rdatetime, ept_udatetime, ept_by, ept_uid)
               VALUES ('$keyword','$sysdatetime', '$sysdatetime', '$uid', '$epid')
              ";
    $query = mysqli_query($conn, $strSQL);
    if($query){
      echo "Y";
    }else{
      echo "N";
    }
}else{

}

mysqli_close($conn);
die();

?>
