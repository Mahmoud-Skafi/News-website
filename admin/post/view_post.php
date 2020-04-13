<?php
session_start();
include('../config/connect.php');
error_reporting(0);
if (strlen($_SESSION['login']) == 0) {
    header('location:login.php');
}
$res=mysqli_query($conn,"SELECT `id`, `PostTitle`, `CategoryId`, `SubCategoryId`, `PostDetails`, `PostingDate`, `UpdationDate`, `Is_Active`, `PostUrl`, `PostImage` FROM `tblposts` WHERE 1");
// $count=mysqli_query($conn,"SELECT * COUNT(*) FROM `tblposts` WHERE 1");

?>
