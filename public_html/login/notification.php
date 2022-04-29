<?php include('../common/header.php');

// include '../../db.php';
$server="localhost";
$user="root";
$password="";
$db="wastetoart";

$conn=mysqli_connect($server,$user,$password,$db) or die('connection failed');


    $sql = "select * from product";
    $res = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($res)) {  
     
      $id = $row['user_id'];
      $_SESSION['uniqueuser']=$row['user_id'];
    //   <img src="./images/<?php echo $row['image'] 
    }         


if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $number = $_POST['number'];
    $email = $_POST['email'];
    $message = $_POST['message'];



 
            $query = "insert into notification(sender,receiver,number,email,message) values('$name','$id','$number','$email','$message')";
            $result = mysqli_query($conn, $query) or die('Error occur !');
            header('location:../pages/index.php');
       
    }
?>


<section class="login">

    <form action="notification.php" method="POST">
        <h3>Contact Us</h3>
        <input type="name" name="name" placeholder="enter your name" id="" class="box" required>
        <input type="number" name="number" placeholder="enter your contact number" id="" class="box" required>
        <input type="email" name="email" placeholder="enter your email" id="" class="box" required>
        <input type="text" name="message" placeholder="enter your message here" id="" class="box" required>

        <input type="submit" name="submit" value="Send" class="btn">

    </form>

</section>