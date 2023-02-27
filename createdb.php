<?php
$servername = 'localhost';
$username = 'root';
$password = '';

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

$sql = "CREATE DATABASE assignment3";

if($conn->query($sql) == TRUE){
    echo "DB created";
}else {

}

$conn->close();
?>