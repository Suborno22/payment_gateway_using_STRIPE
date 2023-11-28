<?php
$username = "root";
$password = "example";
$host = "db";
$database = "Dresser";
$connect = mysqli_connect($host,$username,$password,$database);
if(mysqli_connect_errno()){
   die("Failed to connect to MySQL: " . mysqli_connect_error());
}
?>