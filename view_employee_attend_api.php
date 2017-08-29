<?php 
include 'config.php';
//$id = $_GET['batch_id'];
$sql = "SELECT * FROM e_attend ORDER BY e_attend_ID DESC";
$result = $conn->query($sql);
$e_attend = array();
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        array_push($e_attend,array('e_attend_ID'=>$row['e_attend_ID'],'date'=>$row['date'],'time'=>$row['time']));
    }
    $e_attend_view = array('attend_view'=>$e_attend);
    echo json_encode($e_attend_view);
} else {
    echo "0 results";
}
?>