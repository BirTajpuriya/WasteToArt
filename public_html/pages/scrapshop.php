<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/artshop.css">
</head>

<body>
    <?php
    include("../common/header.php");

    ?>
    <?php
    $server = "localhost";
    $user = "root";
    $password = "";
    $db = "wastetoart";
    $conn = mysqli_connect($server, $user, $password, $db) or die('connection failed');

    ?>
    <!-- filter starts -->
    <div class="form">
        <form method="post">

            <div class="formSelect1">
                <label class="label">Type:</label>
                <select class="select2" name="flocation">
                    <option selected value="*">SCRAP</option>
                    <option value="Kathmandu">Metal</option>
                    <option value="Biratnagar">Plastic</option>
                    <option value="Pokhara">Wooden</option>
                </select>
            </div>

            <div class="formSelect1">
                <label class="label">Catagory:</label>
                <select class="select2" name="fstatus">
                    <option selected value="*">METAL</option>
                    <option value="For Rent">PLASTIC</option>
                    <option value="For Sale">WOOD</option>
                </select>
            </div>

            <div class="formSelect1">
                <label class="label">Price Range:</label>
                <div class="select2">
                    <input type="number" class=" select" placeholder="FROM" name="initial_price" style="width: 60px">
                    <input type="number" class="select" placeholder="TO" name="final_price" style="width: 60px">
                </div>
            </div>

            <div class="formSelect1">
                <button type="submit" class="bttn" name="submit">Search</button>
            </div>
        </form>
    </div>

    <!-- product starts -->

    <div class='artcontainer'>
    <?php
    $sql = "select * from product where status = 1 ";
    $res = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($res)) { 
    ?>

<?php  
      $title = $row['name']; 
      $id = $row['id'];
      $image = $row['image'];
    //   <img src="./images/<?php echo $row['image'] 
                           
    echo"
        <div class='listing'>
        <div class='listingImage'>
            <a href='./artdetail.php?id=$id'>
                <img src='../../scrap_users/images/".$image."' class='listImg' alt='Rooms Near Me'>
            </a>
        </div>

        <div class='listingBody'>
            <h6 class='listingTitle'> <a href='./artdetail.php?id=$id'>$title</a> </h6>
            <span class='listingPlace'>Electric</span>
        </div>
        <div class='listingBody2'>
            <p class='listingPrice'>Rs.5000<span></span></p>
            <a class='btn' href='./artdetail.php?id=$id'>Details</a>
        </div>
    </div>
        ";
            
        }
        ?>
    </div>




    <?php
    include(".././common/footer.php");

    ?>
</body>

</html>