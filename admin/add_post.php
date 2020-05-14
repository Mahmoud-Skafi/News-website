<?php
require_once('./config/dbcon.php');
include('./config/permissions.php');
session_start();
error_reporting(0);
$pagename = basename($_SERVER['PHP_SELF']);
$role = $_SESSION['roles'];

if (checkPermision($pagename, $role)) {
    if (!isset($_SESSION['username'])) {
        header('location:login.php');
    } else {

        if (isset($_POST['add'])) {

            echo "<script>alert('Wrong User Name or Password');</script>";
            $postTitile = $_POST['post_title'];
            $CatId = $_POST['category'];
            $postDetails = $_POST['post_description'];
            $arr = explode(" ", $PostTitile);
            $url = implode("-", $arr);
            $imgfile = $_FILES["post_image"]["name"];
            $extension = substr($imgfile, strlen($imgfile) - 4, strlen($imgfile));
            $allowed_extensions = array(".jpg", ".png", ".gif");
            $status = 1;
            $aproved = 'yes';
            if (!in_array($extension, $allowed_extensions)) {
                echo "<script>alert('Invalid format. Only jpg / png /gif format allowed');</script>";
            } else {
                $imgnewfile = md5($imgfile) . $extension;
                if ($role == 'author') {
                    $aproved = 'no';
                    $query = $conDb->doSelectQuery($conn, "INSERT INTO tblposts(PostTitle,CategoryId,PostDetails,PostUrl,Is_Active,PostImage,Approved) values('$postTitile','$CatId','$postDetails','$url','$status','$imgnewfile','$aproved')");
                }
                move_uploaded_file($_FILES["post_image"]["tmp_name"], "./postimages/" . $imgnewfile);
                $query = $conDb->doSelectQuery($conn, "INSERT INTO tblposts(PostTitle,CategoryId,PostDetails,PostUrl,Is_Active,PostImage,Approved) values('$postTitile','$CatId','$postDetails','$url','$status','$imgnewfile','$aproved')");
                if ($query) {
                    $msg = "Post successfully added ";
                    echo $msg;
                    header("location:./post_manager.php");
                } else {
                    $error = "Something went wrong . Please try again.";
                    echo $error;
                }
            }
        }
    }
?>
    <!DOCTYPE html>

    <html lang="en">

    <head>
        <?php require './include/links.php' ?>
    </head>

    <body>
        <?php require './include/navbar.php' ?>
        <!-- <form name="AddPost" method="POST" enctype="multipart/form-data">
            <button name="add">Save and Post</button>
        </form> -->
        <form name="AddPost" method="POST" enctype="multipart/form-data">
            <div class="container">
                <br>
                <h1 style="font-size:1.5rem; color:#000;">Add Post</h1>
                <br>
                <br>
                <div class="form-group">
                    <label>Post Title</label>
                    <input type="text" name="post_title" class="form-control" placeholder="Post Title" required>

                </div>

                <label>Select Category</label>
                <div class="input-group mb-3">

                    <select class="custom-select" name="category" id="category" required>
                        <option value="">Select Category </option>
                        <?php
                        $ret = $conDb->doSelectQuery($conn, "SELECT id,CategoryName from  tblcategory where Is_Active=1");
                        foreach ($ret['data'] as $result) {
                        ?>
                            <option value="<?php echo $result['id']; ?>"><?php echo $result['CategoryName']; ?></option>
                        <?php } ?>
                    </select>
                </div>

                <label>Post Image</label>
                <div class="input-group mb-3">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="inputGroupFile02" name="post_image" required>
                        <label class="custom-file-label" for="inputGroupFile02">Choose file</label>
                    </div>
                    <div class="input-group-append">
                        <span class="input-group-text" id="">Upload</span>
                    </div>
                </div>

                <label>Post Description</label>
                <div class="input-group mb-3">
                    <textarea name="post_description" style="width: 100%" required></textarea>
                </div>

                
                <button onclick="document.location = './post_manager.php';" class="btn btn-danger">Discard</button>
                <button class="btn btn-primary" name="add">Save and Post</button>
            </div>
        </form>
        <!-- <button onclick="document.location = './post_manager.php';" class="btn btn-danger">Discard</button> -->
        <?php require './include/scripts.php' ?>

    </body>

    </html>
<?php } else header("location:./login.php");;
?>