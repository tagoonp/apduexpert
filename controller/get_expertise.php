<?php
include "config.class.php";

if(
    (!isset($_POST['p_id'])) ||
    (!isset($_POST['uid']))
  ){
  mysqli_close($conn);
  die();
}

$p_id = mysqli_real_escape_string($conn, $_POST['p_id']);
$uid = mysqli_real_escape_string($conn, $_POST['uid']);

$return = [];
$buffer = [];

$strSQL = "SELECT * FROM expertise_person a
              LEFT JOIN expertise_info b ON a.pid = b.ept_uid
              LEFT JOIN expertise_publication c ON a.pid = c.pub_uid
              LEFT JOIN dept d ON a.p_dept = d.id_dept
              LEFT JOIN user_profile p ON a.pid = p.profile_pid
           WHERE
            a.pid = '$p_id'
            AND a.p_approved = 'Y'
            AND a.p_delete = 'N'
            -- AND p.profile_status = 'Y'
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
