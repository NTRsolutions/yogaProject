<?php 
include 'config.php';
$c_attend_ID = $_POST['c_attend_ID'];
$client_id = $_POST['client_id'];
$absent_client = $_POST['absent_client'];
 
$client_id = implode(",",$client_id);
$absent_client = implode(",",$absent_client);
$sql = "INSERT INTO c_attend_pa (c_attend_id, c_id,attendance)
        VALUES ('$c_attend_ID', '$client_id', '$absent_client')";
if ($conn->query($sql) === TRUE) {  
    echo 'inserted successfully';
    header('Location: view_attendance.php');
}
?>