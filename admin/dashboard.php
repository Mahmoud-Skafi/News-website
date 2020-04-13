<?php
session_start();
if (isset($_SESSION['login'])) {
    if (isset($_POST['Logout'])) {
        include 'logout.php';
    }
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>

    <body>
        <form method="POST">

            <button name="Logout">logout</button>
        </form>
        <div class="cards">
            <div class="card-1">
                <a href="./Authors.php">Authors Section</a>
            </div>
            <div class="card-1">
                 <a href="./post/post.php">Articles Section</a>
                 <!-- add,delete,edit,category -->
            </div>
            <div class="card-1">
                 <a href="./News_Section.php"> News Section </a>
            </div>
        </div>
    </body>

    </html>
<?php

} else {
    echo "<script type='text/javascript'> document.location = 'login.php'; </script>";
}

?>