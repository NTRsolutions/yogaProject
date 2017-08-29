<?php 
include 'config.php';
$e_attend_ID = $_POST['e_attend_ID'];
$employee_id = $_POST['employee_id'];
$absent_employee = $_POST['absent_employee'];
 
$employee_id = implode(",",$employee_id);
$absent_employee = implode(",",$absent_employee);
$sql = "INSERT INTO e_attend_pa (e_attend_id, e_id,attendance)
        VALUES ('$e_attend_ID', '$employee_id', '$absent_employee')";
if ($conn->query($sql) === TRUE) {  
    echo 'inserted successfully';
    header('Location: view_attendance.php');
}
?>