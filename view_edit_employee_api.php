<?php 
/*
loc no 8-- //connect to database
loc no 11-- // query to database for SELECT in employee table
loc no 22--//  0 result
*/
include 'config.php';
if(isset($_POST['e_ID']) ){
  $eid = $_POST['e_ID'];
    
    $sql = "SELECT * FROM `employee` WHERE `e_ID`='$eid'";
    $result = $conn->query($sql);

    $employee = array();
    if ($result->num_rows > 0) {
        // output data of each row
        $row = $result->fetch_assoc(); 
        array_push($employee,array('e_ID'=>$row['e_ID'],'e_name'=>$row['e_name'],'e_surname'=>$row['e_surname'],'address'=>$row['address'],'contact'=>$row['contact'],'salary'=>$row['salary'],'status_payment'=>$row['status']));
        
        $employee_view = array('employee_view'=>$employee);
        echo json_encode($employee_view);
    } else {
        echo "0 results";
    }
}
?>