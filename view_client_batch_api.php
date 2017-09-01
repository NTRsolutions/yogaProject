<?php 
/*
loc no 7-- //connect to database
loc no 9-- // query to database for SELECT in batch_id table
loc no 19--//  0 result
*/
include 'config.php';
$id = $_GET['batch_id'];
$sql = "SELECT * FROM client WHERE batch_id = '$id'";
$result = $conn->query($sql);
$client = array();
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        array_push($client,array('c_ID'=>$row['c_ID'],'c_name'=>$row['c_name'],'c_surname'=>$row['c_surname'],'address'=>$row['address'],'contact'=>$row['contact'],'fees'=>$row['fees'],'status_payment'=>$row['status_payment'],'batch_id'=>$row['batch_id']));
    }
    $client_view = array('client_view'=>$client);
    echo json_encode($client_view);
} else {
    echo "0 results";
}
?>