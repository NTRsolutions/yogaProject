<?php

/*
loc no 10-- //connect to database
loc no 14-- // query to database for DELETE token_no in enquiry table
loc no 18--//  connect query ? if it connected then execute alert record delete successfully go to enquiry_table.php                                                       
loc no 20---  // else record not delteing
*/

include 'config.php';

if(isset($_GET['token_no'])){
     $id = $_GET['token_no'];
    $sql = "DELETE FROM `enquiry` WHERE `enquiry`.`token_no` = '$id'";
    $result = $conn->query($sql);

     if ($result) { 
         echo "<script>alert('Record deleted successfully');location='enquiry_table.php'</script>";
     } else {
     echo "Error deleting record: " .$conn->query($sql);
     }
    }

?>