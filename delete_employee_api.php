<?php

/*
loc no 10-- //connect to database
loc no 14-- // query to database for DELETE employee_id in employee table
loc no 18--//  connect query ? if it connected then execute alert record delete successfully go to employee.php                                                       
loc no 20---  // else record not delteing
*/

include 'config.php';

if(isset($_GET['e_ID'])){
    $id = $_GET['e_ID'];
    $sql = "DELETE FROM `employee` WHERE `employee`.`e_ID` = '$id'";
    $result = $conn->query($sql);

     if ($result) { 
         echo "<script>alert('Record deleted successfully');location='../employee.php'</script>";
     } else {
     echo "Error deleting record: " .$conn->query($sql);
     }
    }

?>
