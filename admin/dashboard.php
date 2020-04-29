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
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous" />
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous" />
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkskg+p" crossorigin="anonymous" />
        <link rel="stylesheet" href="./include/css/all_styles.css">
        <link rel="stylesheet" href="./include/css/overwite.css">
    </head>

    <body>
        <?php require './include/navbar.php' ?>
        <div class="container">
            <div class="page-traker">
                <h1 style="font-size: 1.5rem; color:#000;">POSTS</h1>
            </div>
            <br>
            <div class="sk-main-dashboard-cards-container">
                <div class="sk-main-dashborad-card-members">
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
                <div class="sk-main-dashborad-card-members">
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
                <div class="sk-main-dashborad-card-members">
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
                <div class="sk-main-dashborad-card-members">
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
                <div class="sk-main-dashborad-card-members">
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
                <div class="sk-main-dashborad-card-members">
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
                <div class="sk-main-dashborad-card-members">
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
                <div class="sk-main-dashborad-card-members">
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
                <!-- <div class="sk-main-dashborad-card-members">
                    <div class="sk-card-header " style="justify-content: center">
                        <h1>Disactivate Accounts</h1>
                      
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
                </div> -->
            </div>
        </div>

        <br>
        <br>
        <br>

        <script src="./include/vendor/jquery/jquery.min.js"></script>
        <script src="./include/vendor/bootstrap/js/bootstrap.js"></script>
        <script src="./include/vendor/jquery-easing/jquery.easing.min.js"></script>
        <script src="./assets/js/dashbordCont.js"></script>
        <script src="./assets/js/app.js"></script>
    </body>
    </html>
<?php

} else {
    echo "<script type='text/javascript'> document.location = 'login.php'; </script>";
}

?>