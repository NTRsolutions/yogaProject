
<?php 
include 'config.php';
if(isset($_POST['username']) && isset($_POST['password'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM admin";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
        echo $result->num_rows;
        while($row = $result->fetch_assoc()){
            $username1 = $row['username'];
            $password1 = $row['password'];
            if($username == $username1 && $password == $password1){
                echo "<script>alert('Login Success Fully')</script>";
                break;
            }
            else {
                echo "<script>alert('Please enter valid username and password')</script>";
                break;
            }
        }
    }
    else {
        echo "<script>alert('DataBase is Empty')</script>";
    }
}
return;
/*else {
    echo "<script> alert('no Value Found while logging IN') </script>";
}*/
?> 