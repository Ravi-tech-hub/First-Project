<?php
session_start();
$servername="localhost";
$username="root";
$password="";
$dbname="ecommerce";

$conn=mysqli_connect($servername,$username,$password,$dbname);
if($conn->connect_error)
{
    die("Some error".$conn->connect_error);
}

?>