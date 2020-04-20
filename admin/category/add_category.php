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
