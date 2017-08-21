<?php 
include 'config.php';
if(isset($_POST['name']) && isset($_POST['surname'] && isset($_POST['salary'])){
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $salary = $_POST['salary'];
    $sql = "INSERT INTO Employee (e_name, e_surname, e_salary, status_payment)
        VALUES ('$name', '$surname', '$salary','unpaid')";
    if ($conn->query($sql) === TRUE) {
        echo "<script>Employee created successfully</script>";
    } else {
        echo "While adding employee <br> Error: " . $sql . "<br>" . $conn->error;
    }
}
else {
    echo "<script> alert('no Value Found while adding Employee') </script>";
}
?>