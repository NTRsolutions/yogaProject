<?php
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// Create database
$sql = "CREATE DATABASE yoga";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . $conn->error;
}


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "yoga";
// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// sql to create table

$sql1 = "CREATE TABLE e_attend (
e_attend_ID INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
date date,
time VARCHAR(50)
)";

if ($conn->query($sql1) === TRUE) {
    echo "Table e_attend created successfully <br>";
} else {
    echo "Error creating table: " . $conn->error;
}



$sql2 = "CREATE TABLE e_attend_PA (
e_pa_ID INT(11) AUTO_INCREMENT PRIMARY KEY, 
e_attend_id INT(11) ,
e_id VARCHAR(50) ,
attendance VARCHAR(50)
)";

if ($conn->query($sql2) === TRUE) {
    echo "Table e_attend_PA created successfully <br>";
} else {
    echo "Error creating table: " . $conn->error;
}


 

// sql to create table

$sql3 = "CREATE TABLE Employee (
e_ID INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
e_name VARCHAR(50) ,
e_surname VARCHAR (50) ,
address VARCHAR(50) ,
contact VARCHAR(50) ,
salary VARCHAR(50) ,
status VARCHAR(50)
)";

if ($conn->query($sql3) === TRUE) {
    echo "Table Employee created successfully <br>";
} else {
    echo "Error creating table: " . $conn->error;
}


// sql to create table
$sql4 = "CREATE TABLE Employee_payment (
e_payment_ID INT(11) AUTO_INCREMENT PRIMARY KEY, 
e_id INT(11) ,
payment_date DATE ,
payment_mode VARCHAR(50)
)";

if ($conn->query($sql4) === TRUE) {
    echo "Table Employee_payment created successfully <br> ";
} else {
    echo "Error creating table: " . $conn->error;
}

// sql to create table

$sql5 = "CREATE TABLE Batch (
batch_id INT(11) AUTO_INCREMENT PRIMARY KEY, 
batch_name VARCHAR(50) ,
batch_timing VARCHAR(50)
)";

if ($conn->query($sql5) === TRUE) {
    echo "Table batch created successfully <br>";
} else {
    echo "Error creating table: " . $conn->error;
}


$sql6 = "CREATE TABLE Client (
c_ID INT(11)  AUTO_INCREMENT PRIMARY KEY, 
c_name VARCHAR(50) ,
c_surname VARCHAR(50) ,
address VARCHAR(50) ,
contact VARCHAR(50) ,
fees VARCHAR(50) ,
status_payment VARCHAR(50),
batch_id INT(11)
)";

if ($conn->query($sql6) === TRUE) {
    echo "Table Client created successfully <br>";
} else {
    echo "Error creating table: " . $conn->error;
}


// sql to create table

$sql7 = "CREATE TABLE c_attend_PA (
c_pa_ID INT(11) AUTO_INCREMENT PRIMARY KEY, 
c_attend_id  INT(11) ,
c_id VARCHAR(50) ,
attendance VARCHAR(50)
)";

if ($conn->query($sql7) === TRUE) {
    echo "Table c_attend_PA created successfully <br>";
} else {
    echo "Error creating table: " . $conn->error;
}



$sql8 = "CREATE TABLE c_attend (
c_attend_ID INT(11) AUTO_INCREMENT PRIMARY KEY, 
batch_id INT(11) ,
date VARCHAR(50) ,
timing VARCHAR(50)
)";

if ($conn->query($sql8) === TRUE) {
    echo "Table c_attend created successfully <br> ";
} else {
    echo "Error creating table: " . $conn->error;
}



// sql to create table

$sql9 = "CREATE TABLE Client_payment (
c_payment_ID INT(11) AUTO_INCREMENT PRIMARY KEY, 
c_id INT(10) ,
payment_date date ,
payment_mode VARCHAR(50)
)";

if ($conn->query($sql9) === TRUE) {
    echo "Table Client_payment created successfully <br>";
} else {
    echo "Error creating table: " . $conn->error;
}



/*$sql10 = "CREATE TABLE Client_date_duration (
c_duration_ID INT(11) AUTO_INCREMENT PRIMARY KEY, 
c_id INT(11) ,
start_date DATE ,
end_date DATE
)";

if ($conn->query($sql10) === TRUE) {
    echo "Table Client_date_duration created successfully <br>";
} else {
    echo "Error creating table: " . $conn->error;
}

*/

// sql to create table

$sql11 = "CREATE TABLE Notify_details (
Notify_ID INT(11) AUTO_INCREMENT PRIMARY KEY, 
n_details VARCHAR(50) ,
n_date DATE 
)";

if ($conn->query($sql11) === TRUE) {
    echo "Table Notify_details created successfully <br>";
} else {
    echo "Error creating table: " . $conn->error;
}



$sql12 = "CREATE TABLE Notification (
note_ID INT(11) AUTO_INCREMENT PRIMARY KEY, 
enquiry_id INT(11) ,
fee_remi_id INT(11)
)";

if ($conn->query($sql12) === TRUE) {
    echo "Table Notification created successfully <br> ";
} else {
    echo "Error creating table: " . $conn->error;
}

$sql13 = "CREATE TABLE admin (
admin_ID INT(11) AUTO_INCREMENT PRIMARY KEY, 
username VARCHAR(50) ,
password VARCHAR(50)
)";

if ($conn->query($sql13) === TRUE) {
    echo "Table admin created successfully <br> ";
} else {
    echo "Error creating table: " . $conn->error;
}

$sql14 = "CREATE TABLE batch_client_mapping (
bcm_ID INT(11) AUTO_INCREMENT PRIMARY KEY, 
batch_id INT(11),
client_id INT(11)
)";

if ($conn->query($sql14) === TRUE) {
    echo "Table batch_client_mapping created successfully <br> ";
} else {
    echo "Error creating table: " . $conn->error;
}

$sql15 = "CREATE TABLE enquiry (
token_no INT(11) AUTO_INCREMENT PRIMARY KEY, 
name VARCHAR(50),
email VARCHAR(50),
contact VARCHAR(50),
message VARCHAR(100)
)";

if ($conn->query($sql15) === TRUE) {
    echo "Table enquiry created successfully <br> ";
} else {
    echo "Error creating table: " . $conn->error;
}


$conn->close();
?>