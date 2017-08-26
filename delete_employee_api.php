<?php
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
