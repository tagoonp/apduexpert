<?php
include "config.class.php";

if(
    (!isset($_POST['fname_en'])) ||
    (!isset($_POST['fname_th'])) ||
    (!isset($_POST['lname_en'])) ||
    (!isset($_POST['lname_th'])) ||
    (!isset($_POST['uid']))
  ){
  mysqli_close($conn);
  die();
}

$fname_en = mysqli_real_escape_string($conn, $_POST['fname_en']);
$fname_th = mysqli_real_escape_string($conn, $_POST['fname_th']);
$lname_en = mysqli_real_escape_string($conn, $_POST['lname_en']);
$lname_th = mysqli_real_escape_string($conn, $_POST['lname_th']);
$position_en = mysqli_real_escape_string($conn, $_POST['position_en']);
$position_th = mysqli_real_escape_string($conn, $_POST['position_th']);
$per_id = mysqli_real_escape_string($conn, $_POST['per_id']);
$uid = mysqli_real_escape_string($conn, $_POST['uid']);

$return = [];
$buffer = [];

$strSQL = "SELECT * FROM expertise_person WHERE p_pid = '$per_id' AND (p_pid != '' OR p_pid IS NOT NULL) AND p_delete = 'N'";
if($query = mysqli_query($conn, $strSQL)){
  if(mysqli_num_rows($query) > 0){
    $buffer['status'] = 'D';
    $return[] = $buffer;
    echo json_encode($return);
    mysqli_close($conn);
  }
}


$strSQL = "INSERT INTO expertise_person
           (p_pid, p_fname_en, p_lname_en, p_fname_th, p_lname_th, p_position_en, p_position_th, p_rdate, p_udate)
           VALUES
           ('$per_id', '$fname_en', '$lname_en', '$fname_th', '$lname_th', '$position_en', '$position_en', '$sysdatetime', '$sysdatetime')
          ";
$query = mysqli_query($conn, $strSQL);

if($query){

  $insert_id = mysqli_insert_id($conn);

  $buffer['status'] = 'Y';
  $buffer['p_id'] = $insert_id;
  $return[] = $buffer;

  echo json_encode($return);
  mysqli_close($conn);

}else{
  $buffer['status'] = 'N';
  $buffer['response'] = $strSQL;
  $return[] = $buffer;
  echo json_encode($return);
  mysqli_close($conn);
}

die();

?>
