<?php
include('../config/dbcon.php');

session_start();
error_reporting(0);
if (!isset($_SESSION['username'])) {
    header('location:login.php');
} else {
    $postid = $_POST['postid'];

    if (isset($postid) ) {
        $sql = $conDb->doSelectQuery($conn, "UPDATE tblposts SET Approved='yes'  WHERE id='$postid' ");
        if ($sql['status'] == true) {
            echo "ok";
        } else {
            echo "SQL EREOR";
        }
    } else {
        echo "AJAX ERROR";
    }
}
