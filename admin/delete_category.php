<?php
include('./config/dbcon.php');

session_start();
error_reporting(0);
if (!isset($_SESSION['username'])) {
    header('location:login.php');
} else {
    $catid=$_POST['catid'];
    $sql = $conDb->doQuery($conn, "UPDATE tblcategory SET Is_Active=0 WHERE id='".$catid."'");
}