<?php
include('./config/dbcon.php');
include('./config/permissions.php');
session_start();
error_reporting(0);
$pagename = basename($_SERVER['PHP_SELF']);
$role = $_SESSION['roles'];

if (checkPermision($pagename, $role)) {
    if (!isset($_SESSION['username'])) {
        header('location:login.php');
    } else {
        if (isset($_POST['update'])) {

            $imgfile = $_FILES["postimage"]["name"];
            $extension = substr($imgfile, strlen($imgfile) - 4, strlen($imgfile));
            $allowed_extensions = array(".jpg", "jpeg", ".png", ".gif");
            if (!in_array($extension, $allowed_extensions)) {
                echo "<script>alert('Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
            } else {
                $imgnewfile = md5($imgfile) . $extension;
                move_uploaded_file($_FILES["postimage"]["tmp_name"], "../postimages/" . $imgnewfile);
                $postid = intval($_GET['pid']);
                $sql = $conDb->doSelectQuery($conn, "UPDATE tblposts set PostImage='$imgnewfile' where id='$postid'");
                if ($sql['status'] == 1) {
                    header('locction:./edit_post.php?');
                } else {
                    echo '<script>alert("ERROR")</script>';
                }
            }
        }
    }

?>
    <form name="addpost" method="post" enctype="multipart/form-data">
        <?php
        $postid = intval($_GET['pid']);
        $sql = $conDb->doSelectQuery($conn, "select PostImage from tblposts where id='$postid' and Is_Active=1 ");
        foreach ($sql['data'] as $row) {
        ?>
            <form name="addpost" method="post">
                <img src="./postimages/<?php echo htmlentities($row['PostImage']); ?>" width="300" />
                <input type="file" class="form-control" id="postimage" name="postimage" required>
                <button type="submit" name="update" class="btn btn-success waves-effect waves-light">Update </button>
            </form>
    <?php }
    } ?>