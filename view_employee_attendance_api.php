<?php
include 'config.php';
if(isset($_POST['e_attend_id'])){
     $id = $_POST['e_attend_id'];
    $sql = "SELECT * FROM `e_attend_pa` WHERE e_attend_id = '$id'";
    $result = $conn->query($sql);
    $attend = array();
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            array_push($attend,array('e_attend_id'=>$row['e_attend_id'],'e_id'=>$row['e_id'],'attendance'=>$row['attendance']));
        }
        $attend_view = array('attendance_view'=>$attend);
        echo json_encode($attend_view);
    } else {
        echo "0 results";
    }
}
?>