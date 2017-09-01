<?php 
include 'config.php';
$sql = "SELECT * FROM Employee ORDER BY e_ID DESC";
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