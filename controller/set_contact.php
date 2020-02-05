<?php
include "config.class.php";

if(
    (!isset($_POST['email'])) ||
    (!isset($_POST['dept'])) ||
    (!isset($_POST['method'])) ||
    (!isset($_POST['epid'])) ||
    (!isset($_POST['uid']))
  ){
  mysqli_close($conn);
  die();
}

$email = mysqli_real_escape_string($conn, $_POST['email']);
$dept = mysqli_real_escape_string($conn, $_POST['dept']);
$method = mysqli_real_escape_string($conn, $_POST['method']);
$epid = mysqli_real_escape_string($conn, $_POST['epid']);
$uid = mysqli_real_escape_string($conn, $_POST['uid']);

$return = [];
$buffer = [];

if($method == 'add'){
    $strSQL = "UPDATE expertise_person
               SET
                p_email = '$email',
                p_dept = '$dept',
                p_udate = '$sysdatetime'
               WHERE
                pid = '$epid'
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
