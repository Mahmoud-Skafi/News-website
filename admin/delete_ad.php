<?php
require_once('./config/dbcon.php');
include('./config/permissions.php');
session_start();
$adid = $_POST['adid'];
$sql = $conDb->doSelectQuery($conn, "UPDATE tbladvertisements SET Is_Active ='0' WHERE id='$adid'");
