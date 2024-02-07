<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "demo";


$conn = mysqli_connect($servername,$username,$password,$database);

if($conn){
    echo "Success";
}else{
    echo "Error" . mysqli_connect_error();
}

?>