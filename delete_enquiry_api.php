<?php
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