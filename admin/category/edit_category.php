<?php
include('../config/dbcon.php');
include('../config/permissions.php');
// session_start();
// if (isset($_POST['catname'])) {
//     echo "<script>alert('11111')</script>";
// }
$catname = $_POST['catname'];
$catdes = $_POST['catdes'];
$update = date("Y/m/d");
$catid = $_POST['catid'];
$catactive = $_POST['catactive'];
$sql = $conDb->doSelectQuery($conn, "UPDATE tblcategory
         SET CategoryName='" . $catname . "',Description='" . $catdes . "',UpdationDate='" . $update . "' 
         WHERE id='".$catid."'
         ");
if ($sql['status']) {
    echo "<script >console.log('ok')</script>";
} else {
    echo "<script >console.log('error')</script>";
}

