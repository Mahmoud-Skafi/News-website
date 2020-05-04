<?php
require_once('./admin/config/dbcon.php');
session_start();
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php require './vendor/links.php' ?>
    <style>
        * {
            zoom: .97;

        }
    </style>
</head>
<?php require './vendor/navbar.php' ?>

<body>

    <div>
        <div class="bn-breaking-news" id="newsTicker1">
            <div class="bn-label">BRAKING NEWS</div>
            <div class="bn-news">
                <ul>
                    <li><a href="#">1.1. There many variations of passages of Lorem Ipsum available</a></li>
                    <li><a href="#">1.2. Ipsum is simply dummy text of the printing and typesetting industry</a></li>
                    <li><a href="#">1.3. Lorem Ipsum is simply dummy text of the printing and typesetting industry</a></li>
                    <li><a href="#">1.4. Lorem simply dummy text of the printing and typesetting industry</a></li>
                    <li><a href="#">1.5. Ipsum is simply dummy of the printing and typesetting industry</a></li>
                    <li><a href="#">1.6. Lorem Ipsum simply dummy text of the printing and typesetting industry</a></li>
                    <li><a href="#">1.7. Ipsum is simply dummy text of the printing typesetting industry</a></li>
                </ul>
            </div>
            <div class="bn-controls">
                <button><span class="bn-arrow bn-prev"></span></button>
                <button><span class="bn-action"></span></button>
                <button><span class="bn-arrow bn-next"></span></button>
            </div>
        </div>
        <br>
        <div class="sk-container">
            <br>
            <div class="sk-width-60">
                <div id="demo" class="carousel slide" data-ride="carousel">
                    <ul class="carousel-indicators">
                        <li data-target="#demo" data-slide-to="0" class="active"></li>
                        <li data-target="#demo" data-slide-to="1"></li>
                        <li data-target="#demo" data-slide-to="2"></li>
                    </ul>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="https://www.2wcom.com/wp-content/uploads/dubai-3-2103072_1920-1920x500.jpg" alt="Los Angeles" width="100%" height="500">
                            <div class="carousel-caption">
                                <h3>Los Angeles</h3>
                                <p>We had such a great time in LA!</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="https://perennialgardening.com.au/wp-content/uploads/small_blue_flower-wallpaper-1920x500.jpg" alt="Chicago" width="100%" height="500">
                            <div class="carousel-caption">
                                <h3>Chicago</h3>
                                <p>Thank you, Chicago!</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="https://www.eusmat.net/wp-content/uploads/2018/09/EUSMA-0003-Keyvisual-002-colorful-1920x500.jpg" alt="New York" width="100%" height="500">
                            <div class="carousel-caption">
                                <h3>New York</h3>
                                <p>We love the Big Apple!</p>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#demo" data-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </a>
                    <a class="carousel-control-next" href="#demo" data-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </a>
                </div>

            </div>

            <br>
        </div>
        <br>
        <br>
        <br>
        <br>
        <div class="section-2 " id="LASTNEWS">
            <div class="sk-container-width-100">
                <div class="sk-news-header">
                    <h1>LAST NEWS</h1>
                </div>
                <div class="sk-elemets-container">
                    <?php $sql = $conDb->doSelectQuery($conn, "SELECT * FROM tblposts WHERE Is_Active=1 LIMIT 4 ");
                    if ($sql['status'] == 1) {
                        foreach ($sql['data'] as $row) {
                    ?>
                            <div class="sk-elemet-card" onclick="window.location='./post_details.php?postid=<?php echo $row['id'] ?>'">
                                <div class="sk-post-image">
                                    <img src="./admin/postimages/<?php echo $row['PostImage'] ?>" alt="">
                                </div>
                                <div class="sk-post-details">
                                    <h1><?php echo $row['PostTitle'] ?></h1>
                                </div>
                            </div>
                    <?php
                        }
                    }
                    ?>
                </div>
                <div class="sk-elemets-container">
                    <?php $sql = $conDb->doSelectQuery($conn, "SELECT * FROM tblposts WHERE Is_Active=1 LIMIT 5,4 ");
                    if ($sql['status'] == 1) {
                        foreach ($sql['data'] as $row) {
                    ?>
                            <div class="sk-elemet-card" onclick="window.location='./post_details.php?postid=<?php echo $row['id'] ?>'">
                                <div class="sk-post-image">
                                    <img src="./admin/postimages/<?php echo $row['PostImage'] ?>" alt="">
                                </div>
                                <div class="sk-post-details">
                                    <h1><?php echo $row['PostTitle'] ?></h1>
                                </div>
                            </div>
                    <?php
                        }
                    }
                    ?>
                </div>
                <div class="sk-load-more">

                    <a href=""><i class="fas fa-scroll"></i> Load More</a>
                </div>
            </div>
        </div>
    </div>


    <br>
    <br>
    <br>
    <br>
    <div class="section-2 " id="LASTNEWS">
        <div class="sk-container-width-100">
            <div class="sk-news-header">
                <h1>MOST VIEW</h1>
            </div>
            <div class="sk-elemets-container">
                <?php
                $sql = $conDb->doSelectQuery($conn, "SELECT * FROM tblposts  WHERE Is_Active=1 ORDER BY CommentsCout DESC  LIMIT 0,4  
                ");
                if ($sql['status'] == 1) {
                    foreach ($sql['data'] as $row) {
                ?>
                        <div class="sk-elemet-card" style="background-color: #3a76c4;" onclick="window.location='./post_details.php?postid=<?php echo $row['id'] ?>'">
                            <div class="sk-post-image">
                                <img src="./admin/postimages/<?php echo $row['PostImage'] ?>" alt="">
                            </div>
                            <div class="sk-post-details">
                                <h1><?php echo $row['PostTitle'] ?></h1>
                            </div>
                        </div>
                <?php
                    }
                }
                ?>
            </div>
            <div class="sk-elemets-container">
                <?php $sql = $conDb->doSelectQuery($conn, "SELECT * FROM tblposts  WHERE Is_Active=1 ORDER BY CommentsCout DESC LIMIT 5,4  ");
                if ($sql['status'] == 1) {
                    foreach ($sql['data'] as $row) {
                ?>
                        <div class="sk-elemet-card" style="background-color: #3a76c4;" onclick="window.location='./post_details.php?postid=<?php echo $row['id'] ?>'">
                            <div class="sk-post-image">
                                <img src="./admin/postimages/<?php echo $row['PostImage'] ?>" alt="">
                            </div>
                            <div class="sk-post-details">
                                <h1><?php echo $row['PostTitle'] ?></h1>
                            </div>
                        </div>
                <?php
                    }
                }
                ?>
            </div>
            <div class="sk-load-more">

                <a class="mostcommt" style="background-color: #3a76c4;" href=""><i class="fas fa-scroll"></i> Load More</a>
            </div>
        </div>
    </div>
    </div>
    <br>
    <br>
    <div class="Footer">
        <div class="footer container">
            <div class="container">
                <div class="footer-container">
                    <div class="sk-nav-header">
                        <h1>SKAFI .</h1>
                    </div>
                    <div class="elements">
                        <ul>
                            <li><a href="">HOME</a></li>
                            <li><a href="">LOGIN</a></li>
                        </ul>
                        <ul>
                            <li><a href="">MOST COMMENT POSTS</a></li>
                            <li><a href="">MOST VIEW POSTS</a></li>
                            <li><a href="">ABOUT US</a></li>
                        </ul>
                    </div>
                </div>
                <div class="End-footer">
                    <h1>© 2020 <span style="color: #fff">skafi .</span> MAHMOUD</h1>
                </div>
                <br>
            </div>
        </div>
    </div>





    <?php require './vendor/scripts.php' ?>

    <script>

    </script>
</body>

</html>