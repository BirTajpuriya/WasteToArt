<?php
include '../../db.php';
if (isset($_POST['submit'])) {
    $username = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    if ($email == '') {
?>
        <script>
            alert('Please Input Email and Password');
        </script>
        <?php
    } else {
        $email_search = "select * from registration where email='$email'";
        $query = mysqli_query($conn, $email_search);
        $email_count = mysqli_num_rows($query);
        if ($email_count > 0) {
            $user_data = mysqli_fetch_assoc($query);
            $db_pass = $user_data['password'];


            //comments
            $pass_decode = password_verify($password, $db_pass);
            if ($pass_decode) {
                session_start();
                $_SESSION['id']=$user_data['id'];
                $_SESSION['loggedin'] = true;
                $_SESSION['name'] = $username;
                echo "login success";
                header('location:../../public_html/pages/index.php');
            } else {
                // echo " wrong password";
        ?>
                <script>
                    alert('invalid Inputs')
                </script>

            <?php
                header('location:./login.php');
            }
        } else {
            // echo "Invalid email";
            ?>
            <script>
                alert('invalid')
            </script>

<?php
            header('location:./login.php');
        }
    }
}
?>