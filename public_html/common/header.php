<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="shortcut icon" href=".././img/user/logo.png" type="image/x-icon" />
    <link rel="stylesheet" href="../common/header.css">
    <!-- <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700;800&display=swap" rel="stylesheet"> -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">


    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- swiper css link  -->
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

    <!-- cusom css file link  -->
    <link rel="stylesheet" href="css/style.css">

</head>

<body>
    <?php 
    session_start();
    // include('../../db.php');

    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true && $_SESSION['id']){
        $loggedin=true;
    }else{
        $loggedin=false;
    }
        echo '
    <div class="navcontainer">
        <div class="leftnav">
            <a href="../pages/index.php"> <img class="logo" src=".././img/user/RENTAL.png" alt=""></img></a>
        </div>
        <div class="midnav">
            <ul class="navitem">
                <li><a href=index.php>HOME</a></li>
                <li><a href="../pages/artshop.php">ART GLLERY</a></li>
                <li><a href="../pages/scrapshop.php">SCRAP SHOP</a></li>
            </ul>
        </div>
        <div class="rightnav">
            <ul class="navitem">';
            if(!$loggedin){
              echo '  <li><a href="../login/login.php">LOGIN</a></li>
              <li><a href="../../admin/category.php">ADMIN</a></li>
              ';

            }
                 if($loggedin){
                   echo '<li><a href="../../subscription/index.php">SUBSCRIPTIONS</a></li>';
                   echo '<li><a href="../login/logout.php">LOG OUT</a></li>
                   ';
                   
                   
                       echo '<li><a href="../../users/product.php">ART</a></li>';
                   
                      echo' <li><a href="../../scrap_users/scrap.php">SCRAP</a></li>';
                 
                 }
               echo ' 
            </ul>
        </div>
    </div>
    '?>
</body>

</html>