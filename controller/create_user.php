<?php
include "config.class.php";

if(
    (!isset($_POST['username'])) ||
    (!isset($_POST['password'])) ||
    (!isset($_POST['per_id'])) ||
    (!isset($_POST['rmis_id']))
  ){
  mysqli_close($conn);
  die();
}

$username = mysqli_real_escape_string($conn, $_POST['username']);
$password = mysqli_real_escape_string($conn, base64_encode($_POST['password']));
$per_id = mysqli_real_escape_string($conn, $_POST['per_id']);
$rmis_id = mysqli_real_escape_string($conn, $_POST['rmis_id']);

$return = [];
$buffer = [];
$strSQL = "INSERT INTO user (per_id, rmis_id, username, password, rdatetime, udatetime)
           VALUES ('$per_id', '$rmis_id', '$username', '$password', '$sysdatetime', '$sysdatetime')
          ";
if($query = mysqli_query($conn, $strSQL)){
  $strSQL = "INSERT INTO userinfo (info_udatetime, info_uid)
             VALUES ('$sysdatetime', '$per_id')
            ";
  $query = mysqli_query($conn, $strSQL);


  $strSQL = "SELECT * FROM user
             WHERE username = '$username' AND password = '$password' AND delete_status = 'N' AND active_status = 'Y' ";

  $query = mysqli_query($conn, $strSQL);
  if($query){
    echo "Y";
  }else{
    echo "N";
  }
}else{
  echo "N";
}

mysqli_close($conn);
die();

?>
