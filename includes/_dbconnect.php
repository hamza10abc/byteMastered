<?php

$servername="localhost";
$username="root";
$password="";  
$database="dktc";

$conn=mysqli_connect($servername, $username, $password, $database);

if (!$conn){
    die("Sorry access denied". mysqli_connect_error());
}