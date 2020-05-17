<?php
require_once('./admin/config/dbcon.php');
session_start();
$comment = $_POST['comment'];
$postid = $_POST['postid'];
$username = $_SESSION['username'];
$date = date("Y-m-d H:i:s");
$sql = $conDb->doSelectQuery($conn, "SELECT CommentsCout FROM tblposts WHERE Is_Active=1 AND id='$postid'");
$count = $sql['data'][0]['CommentsCout'];
if (isset($comment) && isset($postid)) {
    $sql = $conDb->doSelectQuery($conn, "INSERT INTO tblcomments(postId, comment, postingDate, status,user_name) VALUES ('" . $postid . "','" . $comment . "','" . $date . "',1,'" . $username . "')");
    if ($sql['status'] == 1) {
        $count += 1;
        $sql = $conDb->doSelectQuery($conn, "UPDATE  tblposts SET CommentsCout='$count' WHERE  id='$postid'");
        //   echo "<script>setInterval(function(){window.location.reload();},1500);</script>";
    }
} else {
    echo "<script></script>";
}
