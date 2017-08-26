<?php
include 'config.php';

if(isset($_GET['b_id'])){
    $id = $_GET['b_id'];
    $sql = "DELETE FROM `batch` WHERE `batch`.`batch_id` = '$id'";
    $result = $conn->query($sql);

     if ($result) { 
         echo "<script>alert('Record deleted successfully');location='../add_batch.php'</script>";
     } else {
     echo "Error deleting record: " .$conn->query($sql);
     }
    }

?>
