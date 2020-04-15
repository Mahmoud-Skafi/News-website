<?php
session_start();
require_once('./config/connect.php');
if (isset($_POST['login'])) {

    // Getting username/ email and password
    $username = $_POST['username'];
    $password = $_POST['password'];
    // Fetch data from database on the basis of username/email and password
    $sql = mysqli_query($conn, "SELECT AdminUserName,AdminPassword,Roles FROM tbladmin ");

    // if(mysqli_fetch_assoc($sql))
    // {
    //     $_SESSION['login']=$username;
    //     echo "<script type='text/javascript'> document.location = 'dashboard.php'; </script>";
    // } else{
    //     echo "<script>alert('Wrong user name or Password');</script>";
    // }
    $res = mysqli_fetch_array($sql);

    if ($res > 0) {

        $hashpassword = $res['AdminPassword']; // Hashed password fething from database
        //verifying Password
        if (password_verify($password, $hashpassword) && $username == $res['AdminUserName'] ) {
            $_SESSION['login'] = $_POST['username'];
            if ($res['Roles'] == "admin") {
                echo "<script type='text/javascript'> document.location = 'dashboard.php'; </script>";
            } else {
                if ($res['Roles']=="madps") {
                    echo "<script type='text/javascript'> document.location = 'dashboard.php'; </script>";
                }
            }
        } else {
            echo "<script>alert('Wrong User Name or Password');</script>";
        }
    }
    //if username or email not found in database
    else {
        echo "<script>alert('User not registered with us');</script>";
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