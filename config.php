<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "full_stack_test";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>