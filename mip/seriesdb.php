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


$sql = "CREATE TABLE IF NOT EXISTS series(
        name varchar(20) primary key,
        genre varchar(20) not null,
        path varchar(50),
        intro text )";

if ($conn->query($sql) === FALSE) {
  echo "Error creating table: " . $conn->error;
}



?>