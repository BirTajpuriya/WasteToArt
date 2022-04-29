<?php
$cat_id=$_GET['id'];
include('../db.php');
$sql="delete from category where id='$cat_id'";
$res=mysqli_query($conn,$sql) or die("query failed");
header("location:category.php");
?>