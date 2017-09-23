<?php 
/*
loc no 7-- //connect to database
loc no 11-- // query to database for SELECT in client table
loc no 18--//  0 result
*/
include 'config.php';
$sql = "SELECT * FROM client ORDER BY c_ID DESC LIMIT 1";
$result = $conn->query($sql);
$client = array();
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        array_push($client,array('c_ID'=>$row['c_ID']));
    }
    $client_view = array('client_view'=>$client);
    echo json_encode($client_view);
} else {
    echo "0 results";
}

?>
