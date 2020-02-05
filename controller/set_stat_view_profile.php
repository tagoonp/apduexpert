<?php
include "config.class.php";

if(
    (!isset($_POST['epid'])) ||
    (!isset($_POST['method']))
  ){
  mysqli_close($conn);
  die();
}
$epid = mysqli_real_escape_string($conn, $_POST['epid']);
$method = mysqli_real_escape_string($conn, $_POST['method']);

$return = [];
$buffer = [];

if($method == 'add'){
  $strSQL = "SELECT view_count FROM stat_view WHERE view_date = '$sysdate' AND view_eid = '$epid'";
  if($query = mysqli_query($conn, $strSQL)){
    if(mysqli_num_rows($query) > 0){
      $row = mysqli_fetch_assoc($query);
      $new = $row['view_count'] + 1;
      $strSQL = "UPDATE stat_view SET view_count = '$new' WHERE view_date = '$sysdate' AND view_eid = '$epid' ";
      $query = mysqli_query($conn, $strSQL);
    }else{
      $strSQL = "INSERT INTO stat_view
                (view_date, view_eid, view_count)
                 VALUES ('$sysdate','$epid', '1')
                ";
      $query = mysqli_query($conn, $strSQL);
    }
  }else{
    $strSQL = "INSERT INTO stat_view
              (view_date, view_eid, view_count)
               VALUES ('$sysdate','$epid', '1')
              ";
    $query = mysqli_query($conn, $strSQL);
  }
}else if($method == 'view_stat'){

  $b = [];
  $cdate = $sysdate;

  // $b[] = $sysdate;
  for ($i=0; $i < 15; $i++) {
    $prev_date = new DateTime($cdate);
    $prev_date = $prev_date->modify("-".$i." days");
    $b[] = $prev_date->format("Y-m-d");
  }

  $b2 = [];
  $data_b = [];

  for ($i=(sizeof($b) - 1); $i >= 0; $i--) {
    $b2[] = $b[$i];

    $strSQL = "SELECT view_count FROM stat_view WHERE view_date = '".$b[$i]."' AND view_eid = '$epid'";
    if($query = mysqli_query($conn, $strSQL)){
      if(mysqli_num_rows($query) > 0){
        $row = mysqli_fetch_assoc($query);
        $data_b[] = intval($row['view_count']);
      }else{
        $data_b[] = 0;
      }

    }else{
      $data_b[] = 0;
    }
  }

  $return[0]['label'] = $b2;
  $return[0]['data'] = $data_b;

  echo json_encode($return);
}

mysqli_close($conn);
die();

?>
