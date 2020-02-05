<?php
header("Access-Control-Allow-Origin: *");
error_reporting(E_ALL);
ini_set('display_errors', 1);
date_default_timezone_set("Asia/Bangkok");

$host = 'localhost';
$dbname = 'expert_database';

$user = 'root';
$password = 'mandymorenn';

// $user = 'apdu';
// $password = 'apdu0303';


$conn = mysqli_connect($host, $user, $password, $dbname);


if (!$conn) {

  echo "Can not connect datase";
  die();
}

$conn->set_charset("utf8");

$sysdate = date('Y-m-d');
$sysdatetime = date('Y-m-d H:i:s');
$sysdateu = date('U');
$client_ip = $_SERVER['REMOTE_ADDR'];
?>
