<?php

$servername = 'localhost';
$username = 'root';
$password = '';
$database = 'userdata';

$conn = mysqli_connect($servername,$username,$password,$database);

if(!$conn){
    die("Connection failed: " . $conn->connect_error);
}


?>