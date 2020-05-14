<?php 
require_once('./admin/config/dbcon.php');
session_start();
$postid=$_POST['postid'];
$counter=$_POST['counter'];
$sql=$conDb->doSelectQuery($conn,"UPDATE tblposts SET Rank='".$counter."' WHERE id='".$postid."'");
