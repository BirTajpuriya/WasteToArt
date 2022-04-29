<?php
include('../db.php');


$sql="select * from subscription join registration where subscription.user=registration.name";
$res = mysqli_query($conn, $sql);

?>


    <link rel="stylesheet" href="style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  </head>
  <body>
    
    <h2 class="heading-primary">Our Pricing</h2>
    <div class="plan-section">
      <div class="plan basic">
        <h2 class="plan-heading">Basic</h2>
        <h3 class="plan-price"><span class="dollar"></span>FREE</h3>
        <ul class="plan-features">
          <li class="plan-item">3 Months Free</li>
          <li class="plan-item">Limited Upload</li>
          <li class="plan-item">No Support</li>
          
        </ul>

        <a href="add_subscription.php" class="btn buy-now" name="submit">Buy Now</a>
      </div>

      <div class="plan pro">
        <h2 class="plan-heading">Professional</h2>
        <h3 class="plan-price"><span class="dollar">Rs.</span>1800</h3>
        <ul class="plan-features">
          <li class="plan-item">6 Months</li>
          <li class="plan-item">No Upload Limit</li>
          <li class="plan-item">6 Months Support</li>
          <!-- <li class="plan-item">Support</li> -->
        </ul>
        <a href="add_subscription.php" class="btn btn-blue" name="submit2">Buy Now</a>

      </div>

      <div class="plan master">
        <h2 class="plan-heading">Master</h2>
        <h3 class="plan-price"><span class="dollar">Rs.</span>3300</h3>
        <ul class="plan-features">
          <li class="plan-item">1 Year</li>
          <li class="plan-item">No Upload Limit</li>
          <li class="plan-item">1 Year Support</li>
        </ul>
        <a href="add_subscription.php" class="btn buy-now" name="submit3">Buy Now</a>
       

      </div>
    </div>
    
 