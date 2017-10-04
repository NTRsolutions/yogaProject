<?php
$servername = "localhost";
$username = "root";

if($_SERVER['SERVER_NAME'] == 'localhost'){
    $password = "";
}
else {
    $password = "N5sZmB2KTdI1";
}


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

/// databse connect
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



$sql2 = "CREATE TABLE e_attend_pa (
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

$sql3 = "CREATE TABLE employee (
e_ID INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
e_name VARCHAR(50) ,
e_surname VARCHAR (50) ,
Gender VARCHAR (50) ,
DOB VARCHAR (50) ,
Age VARCHAR (50) ,
Title VARCHAR (50) ,
Salary VARCHAR (50) ,
Register_ID VARCHAR (50) ,
address VARCHAR(100) ,
contact VARCHAR(50) ,
Email VARCHAR(50) ,
status VARCHAR(50)
)";

if ($conn->query($sql3) === TRUE) {
    echo "Table Employee created successfully <br>";
} else {
    echo "Error creating table: " . $conn->error;
}


// sql to create table
$sql4 = "CREATE TABLE employee_payment (
e_payment_ID INT(11) AUTO_INCREMENT PRIMARY KEY, 
e_id INT(11) ,
payment_date DATE ,
payment_mode VARCHAR(50)
)";

if ($conn->query($sql4) === TRUE) {
    echo "Table employee_payment created successfully <br> ";
} else {
    echo "Error creating table: " . $conn->error;
}

// sql to create table

$sql5 = "CREATE TABLE batch (
batch_id INT(11) AUTO_INCREMENT PRIMARY KEY, 
batch_name VARCHAR(50) ,
batch_timing VARCHAR(50)
)";

if ($conn->query($sql5) === TRUE) {
    echo "Table batch created successfully <br>";
} else {
    echo "Error creating table: " . $conn->error;
}

$sql6 = "CREATE TABLE client (
c_ID INT(11)  AUTO_INCREMENT PRIMARY KEY, 
c_name VARCHAR(50) ,
c_surname VARCHAR(50) ,
gender VARCHAR(50) ,
DOB VARCHAR(50) ,
Anniversary VARCHAR(50) ,
Age VARCHAR(50) ,
address VARCHAR(100) ,
contact VARCHAR(50) ,
fees VARCHAR(50) ,
received VARCHAR(50) ,
balance VARCHAR(50) ,
package VARCHAR(50) ,
startdate VARCHAR(50) ,
enddate VARCHAR(50) ,
email VARCHAR(50) ,
Lead_By VARCHAR(50) ,
photo VARCHAR(50) ,
Comments VARCHAR(50) ,
status_payment VARCHAR(50),
batch_id INT(11)
)";

if ($conn->query($sql6) === TRUE) {
    echo "Table Client created successfully <br>";
} else {
    echo "Error creating table: " . $conn->error;
}


// sql to create table

$sql7 = "CREATE TABLE c_attend_pa (
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

$sql9 = "CREATE TABLE client_payment (
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


$sql10 = "CREATE TABLE packages (
Cat_ID INT(10) AUTO_INCREMENT PRIMARY KEY, 
Catogary VARCHAR(50), 
Active VARCHAR(50),
Name_of_plan VARCHAR(50),
Time_unit VARCHAR(50),
batch VARCHAR(50),
Description VARCHAR(100)

)";

if ($conn->query($sql10) === TRUE) {
    echo "Table packages created successfully <br>";
} else {
    echo "Error creating table: " . $conn->error;
}



// sql to create table

$sql11 = "CREATE TABLE notify_details (
Notify_ID INT(11) AUTO_INCREMENT PRIMARY KEY, 
n_details VARCHAR(50) ,
n_date DATE 
)";

if ($conn->query($sql11) === TRUE) {
    echo "Table Notify_details created successfully <br>";
} else {
    echo "Error creating table: " . $conn->error;
}

// sql to create table

$sql12 = "CREATE TABLE notification (
note_ID INT(11) AUTO_INCREMENT PRIMARY KEY, 
enquiry_id INT(11) ,
fee_remi_id INT(11)
)";

if ($conn->query($sql12) === TRUE) {
    echo "Table Notification created successfully <br> ";
} else {
    echo "Error creating table: " . $conn->error;
}

// sql to create table
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
/*
// sql to create table
$sql14 = "CREATE TABLE batch_client_mapping (
bcm_ID INT(11) AUTO_INCREMENT PRIMARY KEY, 
batch_id INT(11),
client_id INT(11)
)";

if ($conn->query($sql14) === TRUE) {
    echo "Table batch_client_mapping created successfully <br> ";
} else {
    echo "Error creating table: " . $conn->error;
}*/

// sql to create table
$sql15 = "CREATE TABLE enquiry (
token_no INT(11) AUTO_INCREMENT PRIMARY KEY, 
name VARCHAR(50),
surname VARCHAR(50),
email VARCHAR(50),
contact VARCHAR(50),
date VARCHAR(50),
followupdate VARCHAR(50),
followuptime VARCHAR(50),
status VARCHAR(50),
message VARCHAR(100)
)";

if ($conn->query($sql15) === TRUE) {
    echo "Table enquiry created successfully <br> ";
} else {
    echo "Error creating table: " . $conn->error;
}

// sql to create table

$sql16 = "CREATE TABLE client_fitness (
fitness_ID INT(11) AUTO_INCREMENT PRIMARY KEY, 
c_ID  VARCHAR(50), 
date_before VARCHAR(50) , 
Diet_before  VARCHAR(50) ,
Weight_before VARCHAR(50) ,
date_after VARCHAR(50) ,
Diet_after VARCHAR(50) ,
Weight_after VARCHAR(50),
date_latest VARCHAR(50) ,
Diet_latest VARCHAR(50) ,
Weight_latest VARCHAR(50)
)";

if ($conn->query($sql16) === TRUE) {
    echo "Table client_fitness created successfully <br>";
} else {
    echo "Error creating table: " . $conn->error;
}

// sql to create table
$sql17 = "CREATE TABLE Income (
In_ID INT(11) AUTO_INCREMENT PRIMARY KEY, 
bill_no VARCHAR(50),
date VARCHAR(50),
name VARCHAR(50),
amount VARCHAR(50)

)";

if ($conn->query($sql17) === TRUE) {
    echo "Table Income created successfully <br> ";
} else {
    echo "Error creating table: " . $conn->error;
}

// sql to create table
$sql18 = "CREATE TABLE Expence (
Out_ID INT(11) AUTO_INCREMENT PRIMARY KEY, 
bill_no VARCHAR(50),
date VARCHAR(50),
name VARCHAR(50),
amount VARCHAR(50)
)";

if ($conn->query($sql18) === TRUE) {
    echo "Table Expence created successfully <br> ";
} else {
    echo "Error creating table: " . $conn->error;
}

// sql to create table
$sql19 = "CREATE TABLE Transaction (
Tras_ID INT(11) AUTO_INCREMENT PRIMARY KEY, 
date VARCHAR(50),
in_amount VARCHAR(50),
out_amount VARCHAR(50),
profit VARCHAR(50),
loss VARCHAR(50)
)";

if ($conn->query($sql19) === TRUE) {
    echo "Table Transaction created successfully <br> ";
} else {
    echo "Error creating table: " . $conn->error;
}

// sql to create table
$sql20 = "CREATE TABLE total_income_expence (
Tras_ID INT(11) AUTO_INCREMENT PRIMARY KEY, 
date VARCHAR(50),
income VARCHAR(50),
expence VARCHAR(50)
)";

if ($conn->query($sql20) === TRUE) {
    echo "Table total_income_expence created successfully <br> ";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>