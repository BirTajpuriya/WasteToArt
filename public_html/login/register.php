<?php
include('../common/header.php');
?>

<section class="register">

    <form action="save_register.php" method="POST">
        <h3>register now</h3>
        <input type="text" name="name" placeholder="enter your name" id="" class="box" required>
        <input type="email" name="email" placeholder="enter your email" id="" class="box" required>

        <input type="password" name="password" placeholder="enter your password" id="" class="box" required>
        <input type="password" name="cpassword" placeholder="re-enter your password" id="" class="box" required>
        <input type="submit" value="register now" name="submit" class="btn">
        <p>already have an account?</p>
        <a href="login.php" class="btn link">login now</a>
    </form>

</section>

<!-- register form section ends  -->















