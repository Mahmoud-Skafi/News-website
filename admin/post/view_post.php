<?php
include('../config/dbcon.php');

session_start();
error_reporting(0);
if (!isset($_SESSION['username'])) {
    header('location:login.php');
}
$res=$conDb->doSelectQuery($conn,"SELECT `id`, `PostTitle`, `CategoryId`, `SubCategoryId`, `PostDetails`, `PostingDate`, `UpdationDate`, `Is_Active`, `PostUrl`, `PostImage` FROM `tblposts` WHERE 1");
foreach($res['data'] as $row){
    ?>
        <?php echo htmlentities($row['id']);?>
    <?php 
}
// $count=mysqli_query($conn,"SELECT * COUNT(*) FROM `tblposts` WHERE 1");

?>
