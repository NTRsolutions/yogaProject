<?php 
include 'config.php';
if(isset($_POST['batch_id']) && isset($_POST['batch_name']) && isset($_POST['batch_timing'])){
    $id = $_POST["batch_id"];
     $batch_name = $_POST['batch_name'];
     $batch_timing = $_POST['batch_timing'];
    $sql = "UPDATE `batch` SET `batch_name` = '$batch_name', `batch_timing` = '$batch_timing' WHERE `batch`.`batch_id` = '$id'";
    if ($conn->query($sql) === TRUE) {
        header('Location: batch.php');
    }
    else{
      echo "Code Not Updated";
    }
}
?>