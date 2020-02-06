<?php
include "config.class.php";

if(
    (!isset($_POST['meth'])) ||
    (!isset($_POST['searchkey']))
  ){
  mysqli_close($conn);
  die();
}

$method = mysqli_real_escape_string($conn, $_POST['meth']);
$searchkey = mysqli_real_escape_string($conn, $_POST['searchkey']);

$return = [];
$buffer = [];

if($method == '1'){
  $strSQL = "SELECT *, a.pid pid FROM expertise_person a
              LEFT JOIN expertise_info b ON a.pid = b.ept_uid
              LEFT JOIN expertise_publication c ON a.pid = c.pub_uid
              LEFT JOIN dept d ON a.p_dept = d.id_dept
              -- LEFT JOIN user_profile p ON a.pid = p.profile_pid
           WHERE
            (
              a.p_fname_en LIKE '%$searchkey%'
              OR a.p_lname_en LIKE '%$searchkey%'
              OR a.p_fname_th LIKE '%$searchkey%'
              OR a.p_lname_th LIKE '%$searchkey%'
              OR b.ept_expertize LIKE '%$searchkey%'
              OR c.pub_research_title LIKE '%$searchkey%'
            )
            AND a.p_approved = 'Y'
            AND a.p_delete = 'N'
            -- AND p.profile_status = 'Y'
          ";
  $query = mysqli_query($conn, $strSQL);
  if($query){
    $b = [];
    while ($row = mysqli_fetch_array($query)) {
      if (!in_array($row['pid'], $b)) {
        $b[] = $row['pid'];
      }
    }

    if(sizeof($b > 0)){
      $buf_string = implode("', '", $b);

      $strSQL = "SELECT * FROM expertise_person a LEFT JOIN dept d ON a.p_dept = d.id_dept
                  -- LEFT JOIN user_profile p ON a.pid = p.profile_pid
                  WHERE a.pid IN ('".$buf_string."') AND a.p_approved = 'Y' AND a.p_delete = 'N'";

                $query = mysqli_query($conn, $strSQL);
                if($query){
                 while ($row = mysqli_fetch_array($query)) {
                        $buf = [];
                        foreach ($row as $key => $value) {
                            if(!is_int($key)){
                              $buf[$key] = $value;
                              if($key == 'pid'){
                                $strSQL = "SELECT ept_expertize FROM expertise_info WHERE ept_uid = '$value'";
                                $query2 = mysqli_query($conn, $strSQL);
                                if($query2){
                                  $b = [];
                                  while ($row2 = mysqli_fetch_array($query2)) {
                                    $b[] = $row2['ept_expertize'];
                                  }
                                  if(sizeof($b) > 0)
                                    $buf['expertise'] = implode(', ', $b);
                                  else{
                                    $buf['expertise'] = '-';
                                  }
                                }

                                $strSQL = "SELECT profile_filename FROM user_profile WHERE profile_pid = '$value'";
                                $query2 = mysqli_query($conn, $strSQL);
                                if($query2){
                                  while ($row2 = mysqli_fetch_array($query2)) {
                                    $buf['profile_filename'] = $row2['profile_filename'];
                                  }
                                }

                              }
                            }
                        }
                        $return[] = $buf;
                      }
                }

                echo json_encode($return);
                mysqli_close($conn);
    }

  }

}else if($method == '2'){
  $strSQL = "SELECT * FROM expertise_person a
            LEFT JOIN dept d ON a.p_dept = d.id_dept
            LEFT JOIN user_profile p ON a.pid = p.profile_pid
             WHERE
              a.p_fname_en LIKE '$searchkey%'
              AND a.p_approved = 'Y'
              AND a.p_delete = 'N'
              AND p.profile_status = 'Y'
            ";

            $query = mysqli_query($conn, $strSQL);
            if($query){
             while ($row = mysqli_fetch_array($query)) {
                    $buf = [];
                    foreach ($row as $key => $value) {
                        if(!is_int($key)){
                          $buf[$key] = $value;
                          if($key == 'pid'){
                            $strSQL = "SELECT ept_expertize FROM expertise_info WHERE ept_uid = '$value'";
                            $query2 = mysqli_query($conn, $strSQL);
                            if($query2){
                              $b = [];
                              while ($row2 = mysqli_fetch_array($query2)) {
                                $b[] = $row2['ept_expertize'];
                              }
                              if(sizeof($b) > 0)
                                $buf['expertise'] = implode(', ', $b);
                              else{
                                $buf['expertise'] = '-';
                              }
                            }
                          }
                        }
                    }
                    $return[] = $buf;
                  }
            }

            echo json_encode($return);
            mysqli_close($conn);
}else if($method == '3'){
  $strSQL = "SELECT * FROM expertise_person a
              LEFT JOIN dept d ON a.p_dept = d.id_dept
              LEFT JOIN user_profile p ON a.pid = p.profile_pid
             WHERE
              a.p_dept = '$searchkey'
              AND a.p_approved = 'Y'
              AND a.p_delete = 'N'
              AND p.profile_status = 'Y'
            ";

            $query = mysqli_query($conn, $strSQL);
            if($query){
             while ($row = mysqli_fetch_array($query)) {
                    $buf = [];
                    foreach ($row as $key => $value) {
                        if(!is_int($key)){
                          $buf[$key] = $value;
                          if($key == 'pid'){
                            $strSQL = "SELECT ept_expertize FROM expertise_info WHERE ept_uid = '$value'";
                            $query2 = mysqli_query($conn, $strSQL);
                            if($query2){
                              $b = [];
                              while ($row2 = mysqli_fetch_array($query2)) {
                                $b[] = $row2['ept_expertize'];
                              }
                              if(sizeof($b) > 0)
                                $buf['expertise'] = implode(', ', $b);
                              else{
                                $buf['expertise'] = '-';
                              }
                            }
                          }
                        }
                    }
                    $return[] = $buf;
                  }
            }

            echo json_encode($return);
            mysqli_close($conn);
}


die();

?>
