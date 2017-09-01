<?php

/*
loc no 10-- //connect to database
loc no 14-- // query to database for DELETE client_id in client table
loc no 18--//  connect query ? if it connected then execute alert record delete successfully go to client.php                                                       
loc no 20---  // else record not delteing
*/

include 'config.php';

if(isset($_GET['c_ID'])){
    $id = $_GET['c_ID'];
    $sql = "DELETE FROM `client` WHERE `client`.`c_ID` = '$id'";
    $result = $conn->query($sql);

     if ($result) { 
         echo "<script>alert('Record deleted successfully');location='../client.php'</script>";
     } else {
     echo "Error deleting record: " .$conn->query($sql);
     }
    }

?>
