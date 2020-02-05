<?php
include "config.class.php";

if(!isset($_POST['txtEid'])){
  mysqli_close($conn);
  die();
}

$txtEid = mysqli_real_escape_string($conn, $_POST['txtEid']);

if (!empty($_FILES)) {


  // mkdir("../tmp_file/".$id_apdu);

  // $path = "../img/profile/".$txtEid;
  $path = "../img/profile/".$txtEid."/";
  if(!is_dir($path)){
    mkdir($path);
  }

  $tempFile = $_FILES['file']['tmp_name'];
  $targetPath = $path;  //4
  $filename = $txtEid.'-'.$sysdateu.'-'.$_FILES['file']['name'];
  $targetFile =  $targetPath. $filename;  //5
  // move_uploaded_file($tempFile,$targetFile); //6
  if(move_uploaded_file($tempFile,$targetFile)){
    $fullpart = "img/profile/".$txtEid."/".$filename;

    $strSQL = "UPDATE user_profile SET profile_status = 'N' WHERE profile_pid = '$txtEid'";
              mysqli_query($conn, $strSQL);

    $strSQL = "INSERT INTO user_profile (profile_full_path, profile_filename, profile_udate, profile_pid)
                VALUES ('$filename', '$fullpart', '$sysdatetime', '$txtEid')";
    $query = mysqli_query($conn, $strSQL);

    echo "Y";
  }else{
    echo "N";
  }

}

mysqli_close($conn);
die();



?>
