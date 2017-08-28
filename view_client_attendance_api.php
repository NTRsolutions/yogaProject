<?php
include 'config.php';
if(isset($_GET['c_attend_ID'])){
     $id = $_GET['c_attend_ID'];
    $sql = "SELECT * FROM `c_attend_pa` WHERE c_attend_id = '$id'";
    $result = $conn->query($sql);
    $attend = array();
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            array_push($attend,array('c_attend_id'=>$row['c_attend_id'],'c_id'=>$row['c_id'],'attendance'=>$row['attendance']));
        }
        $attend_view = array('attendance_view'=>$attend);
        echo json_encode($attend_view);
    } else {
        echo "0 results";
    }
}
?>