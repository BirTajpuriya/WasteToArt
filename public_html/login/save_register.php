<?php
include '../../db.php';
if (isset($_POST['submit'])) {
    $username = $_POST['name'];
    $email = $_POST['email'];
    // $phone = $_POST['phone'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $pass = password_hash($password, PASSWORD_BCRYPT);
    $cpass = password_hash($cpassword, PASSWORD_BCRYPT);
    $emailquery = "select * from registration where email='$email'";
    $query = mysqli_query($conn, $emailquery);
    $emailcount = mysqli_num_rows($query);


    
    if ($emailcount > 0) {
        echo "email already exists";
    } else {
        if ($password === $cpassword) {
            $query = "insert into registration(name,email,password,confirm_pass) values('$username','$email','$pass','$cpass')";
            $result = mysqli_query($conn, $query) or die('Error occur !');
            header('location:./login.php');
        } else {
            echo "password are not matching";
        }
    }
}
