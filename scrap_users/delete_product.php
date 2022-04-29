<?php
$id=$_GET['id'];
include('../db.php');
$sql="delete from product where id='$id'";
$res=mysqli_query($conn,$sql) or die("query failed");
header("location:product.php");
?>