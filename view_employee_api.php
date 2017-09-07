<?php 
/*
loc no 7-- //connect to database
loc no 8-- // query to database for SELECT in Employee table
loc no 19--//  0 result
*/
include 'config.php';
$sql = "SELECT * FROM employee ORDER BY e_ID DESC";
$result = $conn->query($sql);
$employee = array();
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        array_push($employee,array('e_ID'=>$row['e_ID'],'e_name'=>$row['e_name'],'e_surname'=>$row['e_surname'],'address'=>$row['address'],'contact'=>$row['contact'],'salary'=>$row['salary'],'status'=>$row['status']));
    }
    $employee_view = array('employee_view'=>$employee);
    echo json_encode($employee_view);
} else {
    echo "0 results";
}
?>