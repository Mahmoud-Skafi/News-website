<?php
require_once('./config/dbcon.php');
include('./config/permissions.php');
session_start();
error_reporting(0);
$newsid=$_POST['newsid'];
$sql=$conDb->doSelectQuery($conn,"UPDATE tblbrackingnews SET Is_Active=0 WHERE id='".$newsid."'");
