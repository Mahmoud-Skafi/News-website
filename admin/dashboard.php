<?php
require_once('./config/dbcon.php');
require_once('./config/permissions.php');



session_start();

$pagename = basename($_SERVER['PHP_SELF']);
$role = $_SESSION['roles'];

if (checkPermision($pagename, $role)) {
    if (isset($_SESSION['username'])) {
        if (isset($_POST['Logout'])) {
            include 'logout.php';
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
        <div class="container">
            <div class="page-traker">
                <h1 style="font-size: 1.5rem; color:#000;">POSTS</h1>
            </div>
            <br>
            <div class="sk-main-dashboard-cards-container">
                <div class="sk-main-dashborad-card-members" onclick="window.location='./post_manager.php'" style="cursor: pointer">
                    <div class="sk-card-header " style="justify-content: center; color: #000;font-weight: 600">
                        <h1>Posts Manager</h1>
                        <!-- <i class="fas fa-ellipsis-h"></i> -->
                    </div>
                    <div class="sk-card-contrainer">
                        <div class="sk-card-conrainer-elements" style="justify-content: center !important;">
                            <div class="sk-card-section-1">
                                <div class="sk-card-labels">
                                    <p></p>
                                </div>
                                <img src="https://image.flaticon.com/icons/svg/1814/1814100.svg" alt="">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="sk-main-dashborad-card-members" onclick="window.location='./add_post.php'" style="cursor: pointer">
                    <div class="sk-card-header " style="justify-content: center">
                        <h1>Add Post</h1>
                        <!-- <i class="fas fa-ellipsis-h"></i> -->
                    </div>
                    <div class="sk-card-contrainer">
                        <div class="sk-card-conrainer-elements" style="justify-content: center !important;">
                            <div class="sk-card-section-1">
                                <div class="sk-card-labels">
                                    <p></p>
                                </div>
                                <img src="https://image.flaticon.com/icons/svg/2312/2312340.svg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sk-main-dashborad-card-members" onclick="window.location='./approved_post.php'" style="cursor: pointer">
                    <div class="sk-card-header " style="justify-content: center">
                        <h1>Approve Posts</h1>
                        <!-- <i class="fas fa-ellipsis-h"></i> -->
                    </div>
                    <div class="sk-card-contrainer">
                        <div class="sk-card-conrainer-elements" style="justify-content: center !important;">
                            <div class="sk-card-section-1">
                                <div class="sk-card-labels">
                                    <p></p>
                                </div>
                                <img src="https://image.flaticon.com/icons/svg/2279/2279095.svg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- section2 -->
            <br>
            <br>
            <div class="page-traker">
                <h1 style="font-size: 1.5rem; color:#000;">Category</h1>
            </div>
            <br>
            <div class="sk-main-dashboard-cards-container">
                <div class="sk-main-dashborad-card-members" onclick="window.location='./category_manager.php'" style="cursor: pointer">
                    <div class="sk-card-header " style="justify-content: center; color: #000;font-weight: 600">
                        <h1>Category Manager</h1>
                        <!-- <i class="fas fa-ellipsis-h"></i> -->
                    </div>
                    <div class="sk-card-contrainer">
                        <div class="sk-card-conrainer-elements" style="justify-content: center !important;">
                            <div class="sk-card-section-1">
                                <div class="sk-card-labels">
                                    <p></p>
                                </div>
                                <img src="https://image.flaticon.com/icons/svg/2133/2133005.svg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sk-main-dashborad-card-members" onclick="window.location='./category_manager.php'" style="cursor: pointer">
                    <div class="sk-card-header " style="justify-content: center">
                        <h1>Add Category</h1>
                        <!-- <i class="fas fa-ellipsis-h"></i> -->
                    </div>
                    <div class="sk-card-contrainer">
                        <div class="sk-card-conrainer-elements" style="justify-content: center !important;">
                            <div class="sk-card-section-1">
                                <div class="sk-card-labels">
                                    <p></p>
                                </div>
                                <img src="https://image.flaticon.com/icons/svg/149/149030.svg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- section3 -->
            <br>
            <br>
            <div class="page-traker">
                <h1 style="font-size: 1.5rem; color:#000;">Accounts</h1>
            </div>
            <br>
            <div class="sk-main-dashboard-cards-container">
                <div class="sk-main-dashborad-card-members" onclick="window.location='./manage_accounts.php'" style="cursor: pointer">
                    <div class="sk-card-header " style="justify-content: center; color: #000;font-weight: 600">
                        <h1>Accounts Manager</h1>
                        <!-- <i class="fas fa-ellipsis-h"></i> -->
                    </div>
                    <div class="sk-card-contrainer">
                        <div class="sk-card-conrainer-elements" style="justify-content: center !important;">
                            <div class="sk-card-section-1">
                                <div class="sk-card-labels">
                                    <p></p>
                                </div>
                                <img src="https://image.flaticon.com/icons/svg/1283/1283923.svg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sk-main-dashborad-card-members" onclick="window.location='./add_users.php'" style="cursor: pointer">
                    <div class="sk-card-header " style="justify-content: center">
                        <h1>Add Account</h1>
                        <!-- <i class="fas fa-ellipsis-h"></i> -->
                    </div>
                    <div class="sk-card-contrainer">
                        <div class="sk-card-conrainer-elements" style="justify-content: center !important;">
                            <div class="sk-card-section-1">
                                <div class="sk-card-labels">
                                    <p></p>
                                </div>
                                <img src="https://image.flaticon.com/icons/svg/760/760737.svg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sk-main-dashborad-card-members" onclick="window.location='./account_activat.php'" style="cursor: pointer">
                    <div class="sk-card-header " style="justify-content: center">
                        <h1>Activat Accounts</h1>
                        <!-- <i class="fas fa-ellipsis-h"></i> -->
                    </div>
                    <div class="sk-card-contrainer">
                        <div class="sk-card-conrainer-elements" style="justify-content: center !important;">
                            <div class="sk-card-section-1">
                                <div class="sk-card-labels">
                                    <p></p>
                                </div>
                                <img src="https://image.flaticon.com/icons/svg/2654/2654564.svg" alt="">
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- section4 -->
            <br>
            <br>
            <div class="page-traker">
                <h1 style="font-size: 1.5rem; color:#000;">Breaking News</h1>
            </div>
            <br>
            <div class="sk-main-dashboard-cards-container">
                <div class="sk-main-dashborad-card-members" onclick="window.location='./manage_accounts.php'" style="cursor: pointer">
                    <div class="sk-card-header " style="justify-content: center; color: #000;font-weight: 600">
                        <h1>Breaking News Manager</h1>
                        <!-- <i class="fas fa-ellipsis-h"></i> -->
                    </div>
                    <div class="sk-card-contrainer">
                        <div class="sk-card-conrainer-elements" style="justify-content: center !important;">
                            <div class="sk-card-section-1">
                                <div class="sk-card-labels">
                                    <p></p>
                                </div>
                                <img src="https://image.flaticon.com/icons/svg/2450/2450877.svg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <br>
            <br>
            <br>
            <?php require './include/scripts.php' ?>
    </body>

    </html>
<?php

} else {
    echo "<script type='text/javascript'> document.location = 'login.php'; </script>";
}

?>