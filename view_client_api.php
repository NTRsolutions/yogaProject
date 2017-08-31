<?php 
include 'config.php';
$sql = "SELECT * FROM client ORDER BY c_ID DESC";
$result = $conn->query($sql);
$client = array();
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        array_push($client,array('c_ID'=>$row['c_ID'],'c_name'=>$row['c_name'],'c_surname'=>$row['c_surname'],'address'=>$row['address'],'contact'=>$row['contact'],'fees'=>$row['fees'],'balance'=>$row['balance'],'status_payment'=>$row['status_payment'],'batch_id'=>$row['batch_id']));
    }
    $client_view = array('client_view'=>$client);
    echo json_encode($client_view);
} else {
    echo "0 results";
}
?>
