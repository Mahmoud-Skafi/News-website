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
        $userid = $_POST['userid'];
        $sql = $conDb->doSelectQuery($conn, "UPDATE tblusers SET Is_Active='0' WHERE user_id='" . $userid . "'");
        if ($sql['status'] == 1) {
            echo "<script>Swal.fire({       
                icon: 'success',
                title: 'User Disactivat',
                showConfirmButton: false,
                timer: 1500
              })</script>";
        }
    }
}
