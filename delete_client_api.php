<?php
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
