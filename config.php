<?php 
$servername = "localhost";
$username = "root";
if($_SERVER['SERVER_NAME'] == 'localhost'){
    $password = "";
}
else {
    $password = "N5sZmB2KTdI1";
}

$dbname = "yoga";
// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
?>