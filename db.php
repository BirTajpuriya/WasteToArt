<?php
session_start();
$server="localhost";
$user="root";
$password="";
$db="wastetoart";

$conn=mysqli_connect($server,$user,$password,$db) or die('connection failed');

?>