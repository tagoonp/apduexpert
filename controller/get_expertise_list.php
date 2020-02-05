<?php
include "config.class.php";

if(
    (!isset($_POST['uid']))
  ){
  mysqli_close($conn);
  die();
}

$return = [];
$buffer = [];

$strSQL = "SELECT * FROM expertise_person a
            LEFT JOIN dept d ON a.p_dept = d.id_dept
              -- LEFT JOIN expertise_info b ON a.pid = b.ept_uid
              -- LEFT JOIN expertise_publication c ON a.pid = c.pub_uid
           WHERE
            a.p_approved = 'Y'
            AND a.p_delete = 'N'
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
