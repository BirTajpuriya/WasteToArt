<?php
include('../../db.php');

$sql="select * from subscription join registration where subscription.user=registration.name";
$res = mysqli_query($conn, $sql);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>hello from my side</h1>

    <form action="add_subs.php" method="post">
        <input type="submit" value="submit" name="submit">
        <input type="submit" value="submit2" name="submit2">
        <input type="submit" value="submit3" name="submit3">


    </form>

</body>

</html>