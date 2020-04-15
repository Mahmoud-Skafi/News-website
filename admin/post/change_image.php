<?php
session_start();
include('../config/connect.php');
error_reporting(0);
if (strlen($_SESSION['login']) == 0) {
    header('location:login.php');
} else {
    if (isset($_POST['update'])) {

        $imgfile = $_FILES["postimage"]["name"];
        // get the image extension
        $extension = substr($imgfile, strlen($imgfile) - 4, strlen($imgfile));
        // allowed extensions
        $allowed_extensions = array(".jpg", "jpeg", ".png", ".gif");
        // Validation for allowed extensions .in_array() function searches an array for a specific value.
        if (!in_array($extension, $allowed_extensions)) {
            echo "<script>alert('Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
        } else {
            //rename the image file
            $imgnewfile = md5($imgfile) . $extension;
            // Code for move image into directory
            move_uploaded_file($_FILES["postimage"]["tmp_name"], "../postimages/" . $imgnewfile);
            $postid = intval($_GET['pid']);
            $query = mysqli_query($conn, "UPDATE tblposts set PostImage='$imgnewfile' where id='$postid'");
            if ($query) {
                $msg = "Post Feature Image updated ";
            } else {
                $error = "Something went wrong . Please try again.";
            }
        }
    }
?>
    <form name="addpost" method="post" enctype="multipart/form-data">
        <?php
        $postid = intval($_GET['pid']);
        $query = mysqli_query($conn, "select PostImage from tblposts where id='$postid' and Is_Active=1 ");
        while ($row = mysqli_fetch_array($query)) {
        ?>
            <form name="addpost" method="post">
                <img src="../postimages/<?php echo htmlentities($row['PostImage']); ?>" width="300" />
                <input type="file" class="form-control" id="postimage" name="postimage" required>
                <button type="submit" name="update" class="btn btn-success waves-effect waves-light">Update </button>
            </form>
    <?php }
    } ?>