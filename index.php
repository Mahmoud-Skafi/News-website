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
                            <img src="https://wallpaperhd.wiki/wp-content/uploads/vaporwave-background-vaporwave-background-1920x1080-beautiful-vaporwave-wallpapers-79-images-combination-of-vaporwave-background-1920x1080-1.jpg" alt="Los Angeles" width="100%" height="500">
                            <div class="carousel-caption">
                                <h3>Los Angeles</h3>
                                <p>We had such a great time in LA!</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="https://images3.alphacoders.com/106/thumb-1920-1069102.jpg" alt="Chicago" width="100%" height="500">
                            <div class="carousel-caption">
                                <h3>Chicago</h3>
                                <p>Thank you, Chicago!</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="https://wallpaperset.com/w/full/7/f/f/537807.jpg" alt="New York" width="100%" height="500">
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
        <div class="section-2 ">
            <div class="sk-container-width-100">
                <div class="sk-news-header">
                    <h1>LAST NEWS</h1>
                </div>
                <div class="sk-elemets-container">
                    <div class="sk-elemet-card">
                        <div class="sk-post-image">
                            <img src="https://wallpaperset.com/w/full/7/f/f/537807.jpg"  alt="">
                        </div>
                        <div class="sk-post-details">
                            <h1>post-title</h1>
                        </div>
                    </div>
                    <div class="sk-elemet-card">
                        <div class="sk-post-image">
                            <img src="https://wallpaperset.com/w/full/7/f/f/537807.jpg"  alt="">
                        </div>
                        <div class="sk-post-details">
                            <h1>post-title</h1>
                        </div>
                    </div>
                    <div class="sk-elemet-card">
                        <div class="sk-post-image">
                            <img src="https://wallpaperset.com/w/full/7/f/f/537807.jpg"  alt="">
                        </div>
                        <div class="sk-post-details">
                            <h1>post-title</h1>
                        </div>
                    </div>
                    <div class="sk-elemet-card">
                        <div class="sk-post-image">
                            <img src="https://wallpaperset.com/w/full/7/f/f/537807.jpg"  alt="">
                        </div>
                        <div class="sk-post-details">
                            <h1>post- dadadtitle</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <?php require './vendor/scripts.php' ?>
    <script>
        $(document).ready(function() {
            $('#newsTicker1').breakingNews();

        });
    </script>
</body>

</html>