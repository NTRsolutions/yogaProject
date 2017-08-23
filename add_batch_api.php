<?php 
include 'config.php';

if(isset($_POST['batch_name']) && isset($_POST['batch_timing']) ){ 
    $batch_name = $_POST['batch_name'];
    $batch_timing = $_POST['batch_timing'];
    $sql = "INSERT INTO Batch (batch_name, batch_timing)
        VALUES ('$batch_name', '$batch_timing')";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Batch created successfully')</script>";
    } else {
        echo "While adding Batch <br> Error: " . $sql . "<br>" . $conn->error;
    }
}
else {
    echo "<script> alert('no Value Found while adding Batch') </script>";
}
?>