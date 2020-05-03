<?php
session_start();
// require_once('./config/connection.php');
require_once('./config/dbcon.php');


if (isset($_POST['login'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = $conDb->doSelectQuery($conn, "SELECT tblusers.*,tbpermisstions.*
                                        FROM tblusers 
                                        LEFT JOIN tbpermisstions 
                                        ON tblusers.role_id=tbpermisstions.role_id
                                        WHERE tblusers.user_name='" . $username . "'
                                        AND tblusers.Is_Active='1'
                                        ");
    if ($sql['status'] == 1) {

        if ($sql['rows'] == 1) {


            if (password_verify($password, $sql['data'][0]['user_password'])) {
                $_SESSION['username'] = $username;
                echo "<script type='text/javascript'> document.location = 'dashboard.php'; </script>";
                $_SESSION['roles'] = $sql['data'][0]['type'];
            } else
                echo "<script>alert('Wrong user name or Password');</script>";
        }
    } else {
        echo "<script>alert('Wrong user name or Password');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php require './include/links.php' ?>
</head>

<body>
    <form method="POST">
        <div class="limiter">
            <div class="container-sk-login">
                <div class="wrap-sk-login" style="padding: 30px;">
                    <form class="sk-login-form ">
                        <span class="sk-login-form-title ">
                            Account Login
                        </span>
                        <br>
                        <br>
                        <div class="wrap-sk-input " data-validate="Valid email is required: ex@abc.xyz">
                            <input class="sk-input" type="text" name="username" placeholder="User name">
                        </div>
                        <br>

                        <div class="wrap-sk-input" data-validate="Password is required">
                            <input class="sk-input" type="password" name="password" placeholder="Password">
                        </div>
                        <br>

                        <div class="container-sk-login-form-btn ">
                            <button name="login" class="sk-login-form-btn">
                                Login in
                            </button>
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


</html>