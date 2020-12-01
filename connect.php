<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname="reviews";

$conn = mysqli_connect($servername,$username,$password,$dbname);

if($conn == false){
    die('Error: Cannot connect');
}

?>