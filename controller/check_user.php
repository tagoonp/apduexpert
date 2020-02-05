<?php
include "config.class.php";

if((!isset($_POST['username'])) || (!isset($_POST['password']))){
  mysqli_close($conn);
  die();
}

$username = mysqli_real_escape_string($conn, $_POST['username']);
$password = mysqli_real_escape_string($conn, base64_encode($_POST['password']));

$return = [];
$buffer = [];
$strSQL = '';

$strSQL = "SELECT * FROM user
           WHERE username = '$username' AND password = '$password' AND delete_status = 'N' AND active_status = 'Y' ";

$query = mysqli_query($conn, $strSQL);
if($query){

 while ($row = mysqli_fetch_array($query)) {
        $buf = [];
        foreach ($row as $key => $value) {
            if(!is_int($key)){
              $buf[$key] = $value;
            }
        }
        $return[] = $buf;
      }
}

echo json_encode($return);
// echo json_encode($strSQL);
mysqli_close($conn);
die();

?>
