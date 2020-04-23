<?php

require_once('./config/dbcon.php');
include('./config/permissions.php');
session_start();
error_reporting(0);
$pagename = basename($_SERVER['PHP_SELF']);
$role = $_SESSION['roles'];
$user = $_SESSION['username'];

if (checkPermision($pagename, $role)) {
    if (!isset($_SESSION['username'])) {
        header('location:login.php');
    } else {
        // if()
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
            $sql=$conDb->doSelectQuery($conn,"SELECT role_id, type FROM tbpermisstions WHERE 1");
            foreach ($sql['data'] as $result) {
            ?>
                <option value="<?php echo htmlentities($result['role_id']); ?>"><?php echo htmlentities($result['type']); ?></option>
            <?php } ?>

        </select>

        <button name="add">Add User</button>
    </form>
</body>

</html>