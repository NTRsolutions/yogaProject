<?php 
/*
loc no 7-- //connect to database
loc no 11-- // query to database for SELECT in client table
loc no 18--//  0 result
*/
include 'config.php';
$id = $_GET['cid'];
$sql = "SELECT * FROM client_fitness WHERE c_ID = '$id' ";
$result = $conn->query($sql);
$client = array();
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        
        array_push($client,array('c_ID'=>$row['c_ID'],'date_before'=>$row['date_before'],'Diet_before'=>$row['Diet_before'],'Weight_before'=>$row['Weight_before'],'height_before'=>$row['height_before'],'date_latest'=>$row['date_latest'],'Diet_latest'=>$row['Diet_latest'],'Weight_latest'=>$row['Weight_latest'],'height_latest'=>$row['height_latest'],'bmi'=>$row['bmi']));
    }
    $client_fitness_view = array('client_fitness_view'=>$client);
    echo json_encode($client_fitness_view);
} else {
    echo "0 results";
}

?>
