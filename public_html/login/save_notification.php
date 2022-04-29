<?php
include '../../db.php';


if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $number = $_POST['number'];
    $email = $_POST['email'];
    $message = $_POST['message'];



 
            $query = "insert into notification(sender,number,email,message) values('$name','$number','$email','$message')";
            $result = mysqli_query($conn, $query) or die('Error occur !');
            header('location:../pages/index.php');
       
    }
?>
