<?php 
/*
loc no 8-- //connect to database
loc no 9-- // query to database for SELECT in employee table
loc no 12--//  connect query ? if it connected then execute alert record SELECT successfully 
loc no 19---  // else record not SELECT
*/
include 'config.php';
$sql = "SELECT * FROM employee ORDER BY e_ID DESC";
$result = $conn->query($sql);
$employee = array();
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        array_push($employee,array('e_ID'=>$row['e_ID'],'e_name'=>$row['e_name'],'salary'=>$row['salary'],'status'=>$row['status']));
    }
    $employee_view = array('employee_view'=>$employee);
    echo json_encode($employee_view);
} else {
    echo "0 results";
}
?>