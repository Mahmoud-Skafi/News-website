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



?>
        <!DOCTYPE html>

        <html lang="en">

        <head>
            <?php require './include/links.php' ?>
        </head>

        <body>
            <?php require './include/navbar.php' ?>
            <form name="Add News" method="POST" enctype="multipart/form-data">
                <div class="container">
                    <br>
                    <h1 style="font-size:1.5rem; color:#000;">Add Bracking News</h1>
                    <br>
                    <br>
                    <div class="form-group">
                        <label>Bracking News Title</label>
                        <input type="text" name="brackingnews" class="form-control" placeholder="Bracking News" required>

                    </div>

                    <button onclick="document.location = './bracking_news.php';" class="btn btn-danger">Discard</button>
                    <button class="btn btn-primary" name="add">Save and Post</button>
                </div>
            </form>

            <?php require './include/scripts.php' ?>

        </body>

        </html>
<?php }

    if (isset($_POST['add'])) {

        $brackingnews = $_POST['brackingnews'];
        $isActive = 1;
        $sql = $conDb->doSelectQuery($conn, "INSERT INTO tblbrackingnews(brackingText,Is_Active) VALUES ('" . $brackingnews . "','" . $isActive . "') ");
        if ($sql['status'] == 1) {
            echo "<script>Swal.fire({       
                icon: 'success',
                title: 'Bracking News Added',
                showConfirmButton: false,
                timer: 1500
              })</script>";
           // echo " <script> setInterval(function () { window.location.reload(); }, 1500); </script>";
        }
    }
}
?>