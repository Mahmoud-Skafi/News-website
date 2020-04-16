<?php
session_start();
// require_once('./config/connection.php');
require_once('./config/dbcon.php');


if (isset($_POST['login'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = $conDb->doSelectQuery($conn, "SELECT AdminUserName,AdminPassword,Roles FROM tbladmin  WHERE AdminUserName='" . $username . "' LIMIT 1");
    if ($sql['status'] == 1) {

        if ($sql['rows'] == 1) {


            if (password_verify($password, $sql['data'][0]['AdminPassword'])) {
                $_SESSION['username'] = $username;
                if ($sql['data'][0]['Roles'] == 'mad') {

                    $_SESSION['roles'] = $sql['data'][0]['Roles'];
                    echo "<script type='text/javascript'> document.location = 'dashboard.php'; </script>";
                } else if ($sql['data'][0]['Roles'] == 'Admin') {

                    $_SESSION['roles'] = $sql['data'][0]['Roles'];
                    echo "<script type='text/javascript'> document.location = 'dashboard.php'; </script>";
                }
            } else
                echo "<script>alert('Wrong user name or Password');</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="POST">
        <div>
            <input type="text" name="username">
            <input type="password" name="password">
            <button type="submit" name="login">Login</button>
        </div>
    </form>
</body>

</html>