<?php 
include 'config.php';
   
    $sql = "SELECT from * Batch
    $result=$conn->query($sql);
    
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