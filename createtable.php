<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'assignment3';

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

$sql = "CREATE TABLE registration(
    id INT(6) AUTO_INCREMENT PRIMARY KEY,
    fname VARCHAR(60),
    lname VARCHAR(60),
    email VARCHAR(60),
    adress VARCHAR(300),
    upimage VARCHAR(300)
)";

if($conn->query($sql) == TRUE){
    echo "Table created";
}else {
    echo $conn->error;
}

$conn->close();
?>