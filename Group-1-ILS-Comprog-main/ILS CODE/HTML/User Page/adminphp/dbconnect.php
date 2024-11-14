<?php 
$host = "localhost";
$user = "root";
$pass = "";
$db = "matsurikadb";

//DATABASE CONNECTION
$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    echo"Error! Failed to connect to database :(". $conn->connect_error;
}

?>