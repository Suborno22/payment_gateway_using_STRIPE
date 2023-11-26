<?php
$username = "root";
$password = "password";
$host = "localhost";
$database = "Dresser";
$connect = mysqli_connect($host,$username,$password,$database);
if(mysqli_connect_errno()){
    echo "".mysqli_connect_error();
}
?>