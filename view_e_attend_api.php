<?php 
/*
loc no 7-- //connect to database
loc no 8-- // query to database for SELECT in e_attend table
loc no 18--//  0 result
*/
include 'config.php';
$sql = "SELECT * FROM `e_attend` ORDER BY `e_attend`.`date` DESC";
$result = $conn->query($sql);
$e_attend = array();
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        array_push($e_attend,array('e_attend_ID'=>$row['e_attend_ID'],'date'=>$row['date'],'time'=>$row['time'] ));
    }
    $e_attend_view = array('e_attend_view'=>$e_attend);
    echo json_encode($e_attend_view);
} else {
    echo "0 results";
}
?>