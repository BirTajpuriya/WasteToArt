<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/product.css">
</head>

<body>
    <div class="artcontainer">

    <?php
    $sql = "select product.*,category.category from product, category where product.category_id=category.id and featured_art=1";
    $res = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($res)) { 
    ?>
                             
                                
      <?php  
      $title = $row['name']; 
      $id = $row['id'];
      $img = $row['image'];
      $price = $row['price'];
    //   <img src="./images/<?php echo $row['image'] 
                           
    echo"
    <div class='listing'>
            <div class='listingImage'>
                <a href='./artdetail.php?id=$id'>
                    <img src='../../users/images/".$img."' class='listImg' alt='Rooms Near Me'>
                </a>
            </div>

            <div class='listingBody'>
                <h6 class='listingTitle'> <a href='./artdetail.php?id=$id'>$title</a> </h6>
                <span class='listingPlace'>Electric</span>
            </div>
            <div class='listingBody2'>
                <p class='listingPrice'>$price<span></span></p>
                <a class='btn' href='./artdetail.php?id=$id'>Details</a>
            </div>
        </div>
    ";
                           }
    ?>    
    </div>
</body>

</html>