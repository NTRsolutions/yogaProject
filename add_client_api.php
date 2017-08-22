<?php 
include 'config.php';
if(isset($_POST['c_name']) && isset($_POST['c_surname']) && isset($_POST['c_fees'])&& isset($_POST['c_contact'])&& isset($_POST['c_address'])){

     $c_name = $_POST['c_name'];
     $c_surname = $_POST['c_surname'];
     $c_fees = $_POST['c_fees'];
     $c_contact = $_POST['c_contact'];
     $c_address = $_POST['c_address'];
    $sql = "INSERT INTO Client (c_name, c_surname, fees, adsress, contact, status_payment)
    VALUES ('$c_name', '$c_surname', '$c_fees','$c_contact','$c_address','unpaid')";
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