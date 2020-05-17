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
            <div class="bn-label">BREAKING NEWS</div>
            <div class="bn-news">
                <ul>
                    <?php
                    $sql = $conDb->doSelectQuery($conn, "SELECT brackingText as Text FROM tblbrackingnews WHERE Is_Active=1");
                    foreach ($sql['data'] as $row) {
                    ?>
                        <li><a href=""><?php echo $row['Text'] ?></a></li>
                    <?php
                    }
                    ?>
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
                            <img src="https://uidesign.gbtcdn.com/GB/image/2174/1920x500.jpg?imbypass=true" alt="Los Angeles" width="100%" height="500">
                            <div class="carousel-caption">
                                <h3>Ship From USA </h3><br>
                                <p>We had such a great srevers</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="https://cdelightband.com/tcg/wp-content/uploads/2020/03/COVID-19-Update.jpg" alt="Chicago" width="100%" height="500">
                            <div class="carousel-caption">
                                <!-- <h3>Chicago</h3>
                                <p>Thank you, Chicago!</p> -->
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="https://fyi.extension.wisc.edu/covid19/files/2020/03/person-washing-his-hand-545014-1920x500.jpg" alt="New York" width="100%" height="500">
                            <div class="carousel-caption">
                                <!-- <h3>New York</h3>
                                <p>We love the Big Apple!</p> -->
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
        <?php $sql = $conDb->doSelectQuery($conn, "SELECT advertisement_image FROM tbladvertisements WHERE 1  ORDER BY postingdate ASC");

        ?>

        <br>
        <br>
        <div class="ad-style" style="display: flex;justify-content: center">
            <div >
                <a href="<?php echo $sql['data'][0]['advertisement_url'] ?>"><img src="./admin/advertisement/<?php echo $sql['data'][0]['advertisement_image'] ?>" alt="ad"></a> 
            </div>
            
            <div>
               <a href="<?php echo $sql['data'][0]['advertisement_url'] ?>"><img src="./admin/advertisement/<?php echo $sql['data'][0]['advertisement_image'] ?>" alt="ad"></a> 
            </div>
        </div>
        <br>
        <br>
        <div class="section-2 " id="LASTNEWS">
            <div class="sk-container-width-100">
                <div class="sk-news-header">
                    <h1>LAST NEWS</h1>
                </div>
                <div class="sk-elemets-container">
                    <?php $sql = $conDb->doSelectQuery($conn, "SELECT * FROM tblposts WHERE Is_Active=1 AND Approved='yes' ORDER BY PostingDate DESC LIMIT 4 ");
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
                    <?php $sql = $conDb->doSelectQuery($conn, "SELECT * FROM tblposts WHERE Is_Active=1 AND Approved='yes' ORDER BY PostingDate DESC LIMIT 5,4 ");
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
                <!-- <div class="sk-load-more">

                    <a href=""><i class="fas fa-scroll"></i> Load More</a>
                </div> -->
            </div>
        </div>
    </div>
    <br>

    <?php $sql = $conDb->doSelectQuery($conn, "SELECT advertisement_image FROM tbladvertisements WHERE 1  ORDER BY postingdate ASC ");

    ?>
    <div class="ad-style" style="display: flex;justify-content: center">
        <div>
          <a href="<?php echo $sql['data'][1]['advertisement_url'] ?>"> <img src="./admin/advertisement/<?php echo $sql['data'][1]['advertisement_image'] ?>" alt="ad"></a>
        </div>
        <div>
           <a href="<?php echo $sql['data'][2]['advertisement_url'] ?>"> <img src="./admin/advertisement/<?php echo $sql['data'][2]['advertisement_image'] ?>" alt="ad"></a>
        </div>
    </div>

    <br>
    <div class="section-2 " id="MostTrending">
        <div class="sk-container-width-100">
            <div class="sk-news-header">
                <h1>MOST TRENDING</h1>
            </div>
            <div class="sk-elemets-container">
                <?php
                $sql = $conDb->doSelectQuery($conn, "SELECT * FROM tblposts  WHERE Is_Active=1 AND Approved='yes' ORDER BY Rank DESC  LIMIT 0,4  
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
                <?php $sql = $conDb->doSelectQuery($conn, "SELECT * FROM tblposts  WHERE Is_Active=1 AND Approved='yes' ORDER BY Rank DESC LIMIT 5,4  ");
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
        </div>
    </div>

    <br>
    <?php $sql = $conDb->doSelectQuery($conn, "SELECT * FROM tbladvertisements WHERE 1 ORDER BY postingdate ASC ");

    ?>
    <div class="ad-style" style="display: flex;justify-content: center">
        <div>
           <a href="<?php echo $sql['data'][3]['advertisement_url'] ?>"> <img src="./admin/advertisement/<?php echo $sql['data'][3]['advertisement_image'] ?>" alt="ad"></a>
        </div>
    </div>
    <br>
    <br>
    <div class="section-2 " id="MostComment">
        <div class="sk-container-width-100">
            <div class="sk-news-header">
                <h1>MOST Comment</h1>
            </div>
            <div class="sk-elemets-container">
                <?php
                $sql = $conDb->doSelectQuery($conn, "SELECT * FROM tblposts  WHERE Is_Active=1 AND Approved='yes' ORDER BY CommentsCout DESC  LIMIT 0,4  
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
                <?php $sql = $conDb->doSelectQuery($conn, "SELECT * FROM tblposts  WHERE Is_Active=1 AND Approved='yes' ORDER BY CommentsCout DESC LIMIT 5,4  ");
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
                            <li><a href="./index.php">HOME</a></li>
                            <li><a href="./admin/login.php">LOGIN</a></li>
                        </ul>
                        <ul>
                            <li><a href="./index.php">MOST COMMENT POSTS</a></li>
                            <li><a href="./index.php">MOST TRENDING POSTS</a></li>
                            <li><a href="./index.php">ABOUT US</a></li>
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

    <?php
    if (isset($_SESSION['username'])) {
        if ($_SESSION['roles'] == 'admin') {
    ?>
            <script>
                $('#admindashboard').css('display', 'block');
            </script>
        <?php
        }

        ?>
        <script>
            $('#accounts').css('display', 'none');
            $('#user').css('display', 'block');
        </script>
    <?php



    } ?>
    <script>
        $("#NEWS").click(function() {
            $('html, body').animate({
                scrollTop: $("#LASTNEWS").offset().top
            }, 1000);
        });
        $("#Comment").click(function() {
            $('html, body').animate({
                scrollTop: $("#MostComment").offset().top
            }, 1000);
        });
        $("#Trending").click(function() {
            $('html, body').animate({
                scrollTop: $("#MostTrending").offset().top
            }, 1000);
        });
        $(document).ready(function() {
            $('#newsTicker1').breakingNews();

        });
    </script>
</body>

</html>