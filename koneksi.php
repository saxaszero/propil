<?php 
$server = "localhost";
$db = "apaaja";
$name = "root";
$pass = "";

$conn = mysqli_connect($server, $name, $pass, $db);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
