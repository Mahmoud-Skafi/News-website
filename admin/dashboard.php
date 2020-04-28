<?php
require_once('./config/dbcon.php');
require_once('./config/permissions.php');



session_start();

$pagename = basename($_SERVER['PHP_SELF']);
$role = $_SESSION['roles'];

if (checkPermision($pagename, $role)) {
    if (isset($_SESSION['username'])) {
        if (isset($_POST['Logout'])) {
            include 'logout.php';
        }
    }
?>
<?php require './include/top.php' ?>
<?php require './include/navbar.php' ?>
<?php require './include/footer.php' ?>

<?php

} else {
    echo "<script type='text/javascript'> document.location = 'login.php'; </script>";
}

?>