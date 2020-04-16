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
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>

    <body>
        <form method="POST">

            <button name="Logout">logout</button>
        </form>
        <div class="cards">
            <div class="card-1">
                <a href="./Authors.php">Authors Section</a>
            </div>
            <div class="card-1">
                <a href="./post/post_manager.php">Articles Section</a>
                <!-- add,delete,edit,category -->
            </div>
            <div class="card-1">
                <a href="./News_Section.php"> News Section </a>
            </div>
        </div>
    </body>

    </html>
<?php

} else {
    echo "<script type='text/javascript'> document.location = 'login.php'; </script>";
}

?>