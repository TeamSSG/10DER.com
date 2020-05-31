<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myDB";

// Create connection
$conn = new mysqli($servername, $username,$password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

<<<<<<< HEAD
?>
=======
?>
>>>>>>> 0b9ec37cd33603f9fe13057612cb8e5c59a92e08
