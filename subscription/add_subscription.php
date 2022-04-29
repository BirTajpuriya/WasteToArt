<?php
include('../db.php');
if (isset($_POST['submit'])) {
    $user = $_SESSION['id'];
    $username =$_SESSION['name'];
    $duration = '6 month';
   
    $emailquery = "select * from subscription where user='$user'";
    $query = mysqli_query($conn, $emailquery);
    $emailcount = mysqli_num_rows($query);
    if ($emailcount = 0) {
        echo "Already Subscribed !";
    } else {
            $query = "insert into subscription(user,duration) values('$username','$duration')";
            $result = mysqli_query($conn, $query) or die('Error occur !');
            header('location:../users/product.php');
            echo "submited";
       
        }
    }
    elseif(isset($_POST['submit2'])){
        $user = $_SESSION['id'];
        $username =$_SESSION['name'];

    $duration = '1 year';
   
    $emailquery = "select * from subscription where user='$user'";
    $query = mysqli_query($conn, $emailquery);
    $emailcount = mysqli_num_rows($query);
    if ($emailcount = 0) {
        echo "Already Subscribed !";
    } else {
            $query = "insert into subscription(user,duration) values('$username','$duration')";
            $result = mysqli_query($conn, $query) or die('Error occur !');
            header('location:../users/product.php');

            echo "submited";
       
        }
    }
    else{
        $user = $_SESSION['id'];
        $username =$_SESSION['name'];

    $duration = '2 year';
   
    $emailquery = "select * from subscription where user='$user'";
    $query = mysqli_query($conn, $emailquery);
    $emailcount = mysqli_num_rows($query);
    if ($emailcount = 0) {
        echo "Already Subscribed !";
    } else {
            $query = "insert into subscription(user,duration) values('$username','$duration')";
            $result = mysqli_query($conn, $query) or die('Error occur !');
            header('location:../users/product.php');

            echo "submited";
       
        }
    }


?>
