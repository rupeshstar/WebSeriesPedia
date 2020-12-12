<?php
$servername = "localhost";
$username = "fruit";
$password = "fruit123";



$conn = new mysqli($servername, $username, $password);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "CREATE DATABASE IF NOT EXISTS WebSeries";

if ($conn->query($sql) === FALSE) {
  echo "Error creating database: " . $conn->error;
}

$conn -> select_db("WebSeries");


$sql = "CREATE TABLE IF NOT EXISTS register (
username VARCHAR(20) NOT NULL PRIMARY KEY,
name VARCHAR(50) NOT NULL,
password VARCHAR(50) NOT NULL,
email VARCHAR(50) NOT NULL,
type VARCHAR(10) NOT NULL
)";

if ($conn->query($sql) === FALSE) {
  echo "Error creating table: " . $conn->error;
}



?>