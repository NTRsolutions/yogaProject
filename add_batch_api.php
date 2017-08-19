<?php 
include 'config.php';
if(isset($_POST['batch_name']) && isset($_POST['batch_timing'] && isset($_POST['client_id'])){
    $batch_name = $_POST['batch_name'];
    $batch_timing = $_POST['batch_timing'];
    $client_id = $_POST['client_id'];
    $sql = "INSERT INTO Batch (batch_name, batch_timing, c_id)
        VALUES ('$batch_name', '$batch_timing', '$c_id')";
    if ($conn->query($sql) === TRUE) {
        echo "<script>Batch created successfully</script>";
    } else {
        echo "While adding Batch <br> Error: " . $sql . "<br>" . $conn->error;
    }
}
else {
    echo "<script> alert('no Value Found while adding Batch') </script>";
}
?>