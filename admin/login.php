<?php
session_start();
require_once('./config/connect.php');
if (isset($_POST['login'])) {

    // Getting username/ email and password
    $username = $_POST['username'];
    $password = $_POST['password'];
    // Fetch data from database on the basis of username/email and password
    $sql = mysqli_query($conn, "SELECT AdminUserName,AdminPassword FROM tbladmin WHERE AdminUserName='".$username."' and AdminPassword='".$password."' ");
    if(mysqli_fetch_assoc($sql))
    {
        $_SESSION['login']=$username;
        echo "<script type='text/javascript'> document.location = 'dashboard.php'; </script>";
    } else{
        echo "<script>alert('Wrong user name or Password');</script>";
    }
    // $num = mysqli_fetch_array($sql);
    // if ($num > 0) {
    //     $hashpassword = $num['AdminPassword']; // Hashed password fething from database
    //     //verifying Password
    //     if (password_verify($password, $hashpassword)) {
    //         $_SESSION['login'] = $_POST['username'];
    //         echo "<script type='text/javascript'> document.location = 'dashboard.php'; </script>";
    //     } else {
    //         echo "<script>alert('Wrong Password');</script>";
    //     } 
    // }
    //if username or email not found in database
    // else {
    //     echo "<script>alert('User not registered with us');</script>";
    // }
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