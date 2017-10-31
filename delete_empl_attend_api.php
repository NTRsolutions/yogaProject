<?php

/*
loc no 10-- //connect to database
loc no 14-- // query to database for DELETE client_id in client table
loc no 18--//  connect query ? if it connected then execute alert record delete successfully go to client.php                                                       
loc no 20---  // else record not delteing
*/

include 'config.php';

if(isset($_GET['e_attend_ID'])){
    $id = $_GET['e_attend_ID'];
    $sql = "DELETE FROM `e_attend` WHERE `e_attend`.`e_attend_ID` = '$id'";
    $sql1 = "DELETE FROM `e_attend_pa` WHERE `e_attend_pa`.`e_attend_id` = '$id'";
    $result = $conn->query($sql);
    $result1 = $conn->query($sql1);

     if ($result or $result1 ) { 
         echo "<script>alert('Record deleted successfully');location='../view_employee_attendance.php'</script>";
     } else {
     echo "Error deleting record: " .$conn->query($sql);
     }
    }

?>
