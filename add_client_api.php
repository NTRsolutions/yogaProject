<?php 
include 'config.php';
if(isset($_POST['name']) && isset($_POST['surname'] && isset($_POST['fees'])){
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $fees = $_POST['fees'];
    $sql = "INSERT INTO Client (c_name, c_surname, fees, status_payment)
        VALUES ('$name', '$surname', '$salary','unpaid')";
    if ($conn->query($sql) === TRUE) {
        echo "<script>Client created successfully</script>";
    } else {
        echo "While adding Client <br> Error: " . $sql . "<br>" . $conn->error;
    }
}
else {
    echo "<script> alert('no Value Found while adding Client') </script>";
}
?>