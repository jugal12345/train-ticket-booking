<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "train";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// sql to create table
$sql = "CREATE TABLE IF NOT EXISTS trains (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
from1 VARCHAR(30) NOT NULL,
to1 VARCHAR(300) NOT NULL,
fare1 INT(4) NOT NULL,
seats INT(3) NOT NULL,
pnr VARCHAR (10) NOT NULL
)";

if (mysqli_query($conn, $sql)) {
  echo "made";
} else {
  echo "Error creating table: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
