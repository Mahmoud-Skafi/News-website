<?php
require_once('./admin/config/dbcon.php');
$comment = $_POST['comment'];
$postid = $_POST['postid'];
echo '<script>console.log("adadadad")</script>';
$date = date("Y-m-d H:i:s");
if (isset($comment) && isset($postid)) {
    $sql = $conDb->doSelectQuery($conn, "INSERT INTO tblcomments(postId, comment, postingDate, status) VALUES ('" . $postid . "','" . $comment . "','" . $date . "',1)");
    if ($sql['status'] == 1) {
        echo "";
        //   echo "<script>setInterval(function(){window.location.reload();},1500);</script>";
    }
} else {
    echo "<script></script>";
}
