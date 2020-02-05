<?php
include "config.class.php";

if(
    (!isset($_POST['epid'])) ||
    (!isset($_POST['uid']))
  ){
  mysqli_close($conn);
  die();
}

$epid = mysqli_real_escape_string($conn, $_POST['epid']);

$return = [];
$buffer = [];

$strSQL = "SELECT * FROM expertise_research_portal
           WHERE
            por_uid = '$epid'
            ORDER BY ID DESC
            LIMIT 1
          ";

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
          mysqli_close($conn);
die();

?>
