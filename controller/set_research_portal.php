<?php
include "config.class.php";

if(
    (!isset($_POST['portal_1'])) ||
    (!isset($_POST['portal_2'])) ||
    (!isset($_POST['portal_3'])) ||
    (!isset($_POST['portal_4'])) ||
    (!isset($_POST['method'])) ||
    (!isset($_POST['epid'])) ||
    (!isset($_POST['uid']))
  ){
  mysqli_close($conn);
  die();
}

$portal_1 = mysqli_real_escape_string($conn, $_POST['portal_1']);
$portal_2 = mysqli_real_escape_string($conn, $_POST['portal_2']);
$portal_3 = mysqli_real_escape_string($conn, $_POST['portal_3']);
$portal_4 = mysqli_real_escape_string($conn, $_POST['portal_4']);

$method = mysqli_real_escape_string($conn, $_POST['method']);
$epid = mysqli_real_escape_string($conn, $_POST['epid']);
$uid = mysqli_real_escape_string($conn, $_POST['uid']);

$return = [];
$buffer = [];

if($method == 'add'){
    $strSQL = "SELECT * FROM expertise_research_portal WHERE por_uid = '$epid'";
    $query = mysqli_query($conn, $strSQL);
    if(($query) && (mysqli_num_rows($query) > 0)){
      $strSQL = "UPDATE expertise_research_portal
                 SET
                  researchgate = '$portal_1',
                  googlescholar = '$portal_2',
                  scopus = '$portal_3',
                  pubmed = '$portal_4'
                 WHERE
                  por_uid = '$epid'
                ";
    }else{
      $strSQL = "INSERT INTO expertise_research_portal (researchgate, googlescholar, scopus, pubmed, por_uid)
                 VALUES ('$portal_1', '$portal_2', '$portal_3', '$portal_4', '$epid')
                ";
    }

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
