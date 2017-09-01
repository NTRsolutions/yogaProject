<?php 
/*
loc no 7-- //connect to database
loc no 9-- // query to database for SELECT in client_attend table
loc no 19--//  0 result
*/
include 'config.php';
//$id = $_GET['batch_id'];
$sql = "SELECT * FROM c_attend ORDER BY c_attend_ID DESC";
$result = $conn->query($sql);
$c_attend = array();
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        array_push($c_attend,array('c_attend_ID'=>$row['c_attend_ID'],'batch_id'=>$row['batch_id'],'date'=>$row['date'],'timing'=>$row['timing']));
    }
    $c_attend_view = array('attend_view'=>$c_attend);
    echo json_encode($c_attend_view);
} else {
    echo "0 results";
}
?>