<?php
include('../config/dbcon.php');
include('../config/permissions.php');
session_start();
error_reporting(0);

$pagename = basename($_SERVER['PHP_SELF']);
$role = $_SESSION['roles'];

$catname = $_POST['catname'];
$catdes = $_POST['catdes'];
$upload = date("Y/m/d");
$status = 1;

$sql = $conDb->doSelectQuery($conn, "INSERT INTO tblcategory( CategoryName, Description, PostingDate, UpdationDate, Is_Active) 
                                    VALUES ('$catname','$catdes','$upload','$upload','$status')");
// if (checkPermision($pagename, $role)) {
//     if (isset($_SESSION['username'])) {
//         if (isset($_POST['catname']) && isset($_POST['catdes'])) {
//         }
//     } else {
//         header('location:../login.php');
//     }
// } 
?>
<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<body>

    <form method="POST" action="" enctype="multipart/form-data">
        <div>
            <input type="text" name="catname">
            <input type="text" name="catdes">
        </div>
        <button name="addcat">add</button>
        <button name="discard">discard</button>
    </form>
</body>

</html> -->