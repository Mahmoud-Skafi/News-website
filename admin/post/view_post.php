<?php
include('../config/dbcon.php');

session_start();
error_reporting(0);
if (!isset($_SESSION['username'])) {
    header('location:login.php');
} else {
    $postid=$_POST['postid'];
    $sql = $conDb->doQuery($conn, "UPDATE tblposts set Is_Active=0 where id='$postid'");
}
