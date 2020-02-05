<?php
include "config.class.php";

if(
    (!isset($_POST['title'])) ||
    (!isset($_POST['author'])) ||
    (!isset($_POST['year'])) ||
    (!isset($_POST['cat1'])) ||
    (!isset($_POST['cat2'])) ||
    (!isset($_POST['cat3'])) ||
    (!isset($_POST['cat4'])) ||
    (!isset($_POST['method'])) ||
    (!isset($_POST['epid'])) ||
    (!isset($_POST['uid']))
  ){
  mysqli_close($conn);
  die();
}

$title = mysqli_real_escape_string($conn, $_POST['title']);
$author = mysqli_real_escape_string($conn, $_POST['author']);
$year = mysqli_real_escape_string($conn, $_POST['year']);
$cat1 = mysqli_real_escape_string($conn, $_POST['cat1']);
$cat2 = mysqli_real_escape_string($conn, $_POST['cat2']);
$cat3 = mysqli_real_escape_string($conn, $_POST['cat3']);
$cat4 = mysqli_real_escape_string($conn, $_POST['cat4']);
$method = mysqli_real_escape_string($conn, $_POST['method']);
$epid = mysqli_real_escape_string($conn, $_POST['epid']);
$uid = mysqli_real_escape_string($conn, $_POST['uid']);

$return = [];
$buffer = [];

if($method == 'add'){
    $strSQL = "INSERT INTO expertise_publication
              (pub_research_title, pub_author, pub_year, pub_scopus, pub_pubmed, pub_isi, pub_tci, pub_rdatetime, pub_udatetime, pub_by, pub_uid)
               VALUES ('$title', '$author', '$year', '$cat1', '$cat2', '$cat3', '$cat4', '$sysdatetime', '$sysdatetime', '$uid', '$epid')
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
