<?php
session_start();
include('../config/connect.php');
error_reporting(0);
if (strlen($_SESSION['login']) == 0) {
    header('location:login.php');
} else {
    if (isset($_POST['add'])) {
        // echo "<script>alert('Wrong User Name or Password');</script>";
        $postTitile = $_POST['post_title'];
        $CatId = $_POST['category'];
        $postDetails = $_POST['post_description'];
        $arr = explode(" ", $PostTitile);
        $url = implode("-", $arr);
        $imgfile = $_FILES["post_image"]["name"];
        $extension = substr($imgfile, strlen($imgfile) - 4, strlen($imgfile));
        $allowed_extensions = array(".jpg", ".png", ".gif");
        if (!in_array($extension, $allowed_extensions)) {
            echo "<script>alert('Invalid format. Only jpg / png /gif format allowed');</script>";
        } else {
            //rename the image file
            $imgnewfile = md5($imgfile) . $extension;
            // Code for move image into directory**
            move_uploaded_file($_FILES["post_image"]["tmp_name"], "../postimages/" . $imgnewfile);

            $status = 1;
            $query = mysqli_query($conn, "insert into tblposts(PostTitle,CategoryId,PostDetails,PostUrl,Is_Active,PostImage) values('$postTitile','$CatId','$postDetails','$url','$status','$imgnewfile')");
            if ($query) {
                $msg = "Post successfully added ";
                echo $msg;
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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        /* The Modal (background) */
        .modal {
            display: none;
            /* Hidden by default */
            position: fixed;
            /* Stay in place */
            z-index: 1;
            /* Sit on top */
            padding-top: 100px;
            /* Location of the box */
            left: 0;
            top: 0;
            width: 100%;
            /* Full width */
            height: 100%;
            /* Full height */
            overflow: auto;
            /* Enable scroll if needed */
            background-color: rgb(0, 0, 0);
            /* Fallback color */
            background-color: rgba(0, 0, 0, 0.4);
            /* Black w/ opacity */
        }

        /* Modal Content */
        .modal-content {
            background-color: #fefefe;
            margin: auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
        }

        /* The Close Button */
        .close {
            color: #aaaaaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <h1>addd</h1>
    <!-- Post Title -->
    <form name="AddPost" method="POST" enctype="multipart/form-data">
        <div>
            <input type="text" name="post_title" placeholder="Post Title" required>
        </div>

        <!-- Category -->
        <div class="">
            <label for="">Category</label>
            <select name="category" id="category" onChange="getSubCat(this.value);" required>
                <option value="">Select Category </option>
                <?php
                // Feching active categories
                $ret = mysqli_query($conn, "select id,CategoryName from  tblcategory where Is_Active=1");
                while ($result = mysqli_fetch_array($ret)) {
                ?>
                    <option value="<?php echo htmlentities($result['id']); ?>"><?php echo htmlentities($result['CategoryName']); ?></option>
                <?php } ?>

            </select>
        </div>
        <!-- Description -->
        <div>
            <textarea name="post_description" required></textarea>
        </div>
        <!-- image -->
        <div>
            <input type="file" class="form-control" id="postimage" name="post_image" required>
        </div>
        <button type="submit" name="add">Save and Post</button>
        <button type="submit" name="discard" id="myBtn">Discard</button>
        <!-- The Modal -->
        <div id="myModal" class="modal">

            <!-- Modal content -->
            <div class="modal-content" id="option">
                <h3>are you sure?!</h3>
                <button type="submit" name="yes" id="yes">YES</button>
                <button type="submit" name="no" id="no">NO</button>

            </div>

        </div>
    </form>
    <script>
        var modal = document.getElementById("myModal");
        var btn = document.getElementById("myBtn");
        var btnyes = document.getElementById("yes");
        var btnno = document.getElementById("no");
        btn.onclick = function() {
            modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        btnyes.onclick = function() {
            window.location.reload();

        }
        btnno.onclick = function() {
            modal.style.display = "none";

        }
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
</body>

</html>