<?php
session_start();
// require_once('./config/connection.php');
require_once('./config/dbcon.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php require './include/links.php' ?>
    <style>
        * {
            zoom: .98;

        }
    </style>
</head>

<body>
    <form method="POST">
        <div class="limiter">
            <div class="container-sk-login">
                <div class="wrap-sk-login" style="padding: 30px;">
                    <form class="sk-login-form ">
                        <span class="sk-login-form-title ">
                            Account Signin
                        </span>
                        <br>
                        <br>
                        <div class="wrap-sk-input " data-validate="Valid email is required: ex@abc.xyz">
                            <input class="sk-input" type="text" name="username" placeholder="User name" required>
                        </div>
                        <br>
                        <div class="wrap-sk-input " data-validate="Valid email is required: ex@abc.xyz">
                            <input class="sk-input" type="email" name="email" placeholder="Email" required>
                        </div>
                        <br>
                        <div class="wrap-sk-input" data-validate="Password is required">
                            <input class="sk-input" type="password" name="password" placeholder="Password" required>
                        </div>
                        <br>

                        <div class="wrap-sk-input" data-validate="Password is required">
                            <input class="sk-input" type="password" name="confirmpassword" placeholder="Confirm Password" required>
                        </div>
                        <br>
                        <div class="container-sk-login-form-btn ">
                            <button name="signin" class="sk-login-form-btn">
                                Sign in
                            </button>
                        </div>
                        <br>
                        <div style="display: flex; justify-content: center">
                            <a href="./login.php">Already Have Account? login</a>
                        </div>
                        <br>
                        <div style="display: flex; justify-content: center">
                            <a href="../index.php">Go Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </form>

    <?php require './include/scripts.php' ?>
</body>
<?php



if (isset($_POST['signin'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];
    $email = $_POST['email'];
    $date = date("Y-m-d H:i:s");
    $sql = $conDb->doSelectQuery($conn, "SELECT * FROM tblusers WHERE user_email='$email' ");
    if ($sql['rows'] >= 1) {
        echo "<script>Swal.fire({
            icon: 'Erorr',
            title: 'Opss ...',
            text: 'Email already used !',
           
          })</script>";
    } else {
        if ($password == $confirmpassword) {
            $hashpassword = password_hash($password, PASSWORD_BCRYPT);
            $sql = $conDb->doSelectQuery($conn, "INSERT INTO tblusers (user_name,user_email,user_password,Is_Active,CreationDate,role_id) VALUES ('$username','$email', '$hashpassword' ,'1', '$date ', '3' ) ");
            if ($sql['status'] == 1) {
                echo "<script>Swal.fire({
                    icon: 'success',
                    title: 'Success ...',
                    text: 'Account Created !',
                   
                  })</script>";
                echo "<script> setInterval(function () {  document.location = './login.php';}, 2000);</script>";
            }
        } else {
            echo "<script>Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Password Not Match !',
               
              })</script>";
        }
    }

}
?>

</html>