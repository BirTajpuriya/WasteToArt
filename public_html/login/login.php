<?php
include('../common/header.php')
?>

<section class="login">

    <form action="save_login.php" method="POST">
        <h3>login now</h3>
        <input type="name" name="name" placeholder="enter your name" id="" class="box" required>
        <input type="email" name="email" placeholder="enter your email" id="" class="box" required>
        <input type="password" name="password" placeholder="enter your password" id="" class="box" required>
        <div class="remember">
            <input type="checkbox" name="" id="remember-me">
            <label for="remember-me"> remember me </label>
        </div>
        <input type="submit" name="submit" value="login now" class="btn">
        <p>don't have an account?</p>
        <a href="register.php" class="btn link">register now</a>
    </form>

</section>

<!-- login form section ends  -->




