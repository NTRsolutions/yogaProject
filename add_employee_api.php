<?php 
include 'config.php';
if(isset($_POST['e_name']) && isset($_POST['e_surname']) && isset($_POST['e_salary'])&& isset($_POST['e_contact'])&& isset($_POST['e_address'])){
    
     $e_name = $_POST['e_name'];
     $e_surname = $_POST['e_surname'];
     $e_salary = $_POST['e_salary'];
     $e_contact = $_POST['e_contact'];
     $e_address = $_POST['e_address'];
     $sql = "INSERT INTO Employee (e_name, e_surname, salary, address, contact, status)
    VALUES ('$e_name', '$e_surname', '$e_salary','$e_contact','$e_address','unpaid')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Employee created successfully')</script>";
    } else {
        echo "While adding Employee <br> Error: " . $sql . "<br>" . $conn->error;
    }
}
else {
    echo "<script> alert('no Value Found while adding Employee') </script>";
}
?>