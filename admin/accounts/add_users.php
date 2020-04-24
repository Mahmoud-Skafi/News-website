<?php

require_once('../config/dbcon.php');
include('../config/permissions.php');
session_start();
error_reporting(0);
$pagename = basename($_SERVER['PHP_SELF']);
$role = $_SESSION['roles'];
$user = $_SESSION['username'];

if (checkPermision($pagename, $role)) {
    if (!isset($_SESSION['username'])) {
        header('location:./login.php');
    } else {

        if (isset($_POST['add'])) {
            $user_name = $_POST['user_name'];
            $user_email = $_POST['user_email'];
            $password = $_POST['user_password'];
            $confirm_password = $_POST['user_confirm_password'];
            $roleid = $_POST['role'];
            if ($password != $confirm_password) {
                echo "<script>alert('password')</script>";
            } else {
                $date = date("Y/m/d");
                $hashpassword = password_hash($password, PASSWORD_BCRYPT);
                $sql = $conDb->doSelectQuery($conn, "SELECT * FROM tblusers WHERE user_name='$user_name'");
                if ($sql['rows'] >= 1) {
                    //error
                    $msa="the user name is already taken";

                } else {
                    $sql = $conDb->doSelectQuery($conn, "INSERT INTO tblusers  
                    SET  user_name= '$user_name' , user_email='$user_email',user_password='$hashpassword',Is_Active=1,CreationDate='$date',role_id='$roleid'  
                  ");
                    if ($sql['status'] == 1) {
                        echo "<script>alert('wtf')</script>";
                    } else
                        echo "<script>alert('sss')</script>";
                }
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <form method="POST">
        name: <input type="text" name="user_name" required>
        email: <input type="email" name="user_email" required>
        password:<input type="password" name="user_password" required>
        confirm passowrd:<input type="password" name="user_confirm_password" required>
        <select class="role-style" name="role" required>
            <?php
            $sql = $conDb->doSelectQuery($conn, "SELECT role_id, type FROM tbpermisstions WHERE 1");
            foreach ($sql['data'] as $result) {
            ?>
                <option value="<?php echo htmlentities($result['role_id']); ?>"><?php echo htmlentities($result['type']); ?></option>

            <?php } ?>

        </select>

        <button name="add">Add User</button>
    </form>
</body>

</html>