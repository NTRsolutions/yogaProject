<?php
/*
loc no 7-- //connect to database
loc no 9-- // query to database for SELECT in c_attend_pa table
loc no 19--//  0 result
*/
include 'config.php';
if(isset($_GET['c_ID'])){
     $id = $_GET['c_ID'];
    $sql = "SELECT * FROM `client_fitness` WHERE c_ID = '$id'";
    $result = $conn->query($sql);
    $fitness = array();
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            array_push($attend,array('date_before'=>$row['date_before'],'Diet_before'=>$row['Diet_before'],'Weight_before'=>$row['Weight_before'],'date_after'=>$row['date_after'],'Diet_after'=>$row['Diet_after'],'Weight_after'=>$row['Weight_after']));
        }
        $fitness_view = array('fitness_view'=>$fitness);
        echo json_encode($fitness_view);
    } else {
        echo "0 results";
    }
}
?>