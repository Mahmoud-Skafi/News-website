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
            $adurl = $_POST['adurl'];
            $arr = explode(" ", $adurl);
            $url = implode("-", $arr);
            $imgfile = $_FILES["adimage"]["name"];
            $extension = substr($imgfile, strlen($imgfile) - 4, strlen($imgfile));
            $allowed_extensions = array(".jpg", ".png", ".gif");
            $status = 1;
            $date = date("Y-m-d H:i:s");
            if (!filter_var($adurl, FILTER_VALIDATE_URL) === false) {

                if (!in_array($extension, $allowed_extensions)) {
                    echo "<script>alert('Invalid format. Only jpg / png /gif format allowed');</script>";
                } else {
                    $imgnewfile = md5($imgfile) . $extension;
                    $sql = $conDb->doSelectQuery($conn, "INSERT INTO tbladvertisements(advertisement_url,advertisement_image,Is_Active,postingdate)
                                                          values('$adurl','$imgnewfile','$status','$date')");
                    move_uploaded_file($_FILES["adimage"]["tmp_name"], "./advertisement/" . $imgnewfile);
                    if ($sql['status'] == 1) {

                        header("location:./advertisement_manager.php");
                    } else {
                        //error
                    }
                }
            } else {
                echo "<script>alert('$adurl is not  a valid URL')</script>";
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
        <form name="AddAdvertisement" method="POST" enctype="multipart/form-data">
            <div class="container">
                <br>
                <h1 style="font-size:1.5rem; color:#000;">Add Advertisement</h1>
                <br>
                <br>
                <div class="form-group">
                    <label>Advertisement Url</label>
                    <input type="text" name="adurl" class="form-control" placeholder="Advertisement Url" required>

                </div>

                <label>Advertisement Image</label>
                <div class="input-group mb-3">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="inputGroupFile02" name="adimage" required>
                        <label class="custom-file-label" for="inputGroupFile02">Choose file</label>
                    </div>
                    <div class="input-group-append">
                        <span class="input-group-text" id="">Upload</span>
                    </div>
                </div>


                <button onclick="document.location = './advertisement_manager.php';" class="btn btn-danger">Discard</button>
                <button class="btn btn-primary" name="add">ADD</button>
            </div>
        </form>
        <!-- <button onclick="document.location = './post_manager.php';" class="btn btn-danger">Discard</button> -->
        <?php require './include/scripts.php' ?>

    </body>

    </html>
<?php } else header("location:./login.php");;
?>