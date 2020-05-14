<?php
require_once('./config/dbcon.php');
include('./config/permissions.php');
session_start();
error_reporting(0);

$newsids=$_POST['newsids'];
$brackingnews=$_POST['brackingnews'];
$sql=$conDb->doSelectQuery($conn,"UPDATE tblbrackingnews SET brackingText='".$brackingnews."' WHERE id='".$newsids."' ");