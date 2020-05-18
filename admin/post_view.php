<?php
include('./config/dbcon.php');
include('./config/permissions.php');
session_start();
error_reporting(0);

$pagename = basename($_SERVER['PHP_SELF']);
$role = $_SESSION['roles'];

session_start();
$postid = intval($_GET['postid']);
$actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
// echo $postid;
// $sql = $conDb->doSelectQuery($conn, "SELECT tblposts.id ,tblcomments.postid FROM tblposts  LEFT JOIN tblcomments ON '$postid'=tblcomments.postId  AND tblcomments.postId='$postid'  ");
// $commentsNo = $sql['rows'];
echo "     " . $commentsNo;
$sql = $conDb->doSelectQuery($conn, "SELECT tblposts.id as postid,tblposts.PostImage,tblposts.PostingDate as postdata, tblposts.PostTitle as title,tblposts.PostDetails,tblcategory.CategoryName as category,tblcategory.id as catid,tblsubcategory.SubCategoryId as subcatid,tblsubcategory.Subcategory as subcategory from tblposts 
                                        left join tblcategory 
                                        on tblcategory.id=tblposts.CategoryId 
                                        left join tblsubcategory 
                                        on tblsubcategory.SubCategoryId=tblposts.SubCategoryId 
                                        where tblposts.id='$postid' 
                                        and tblposts.Is_Active=1 ");
$row = $sql['data'][0];
if ($sql['status'] == 1 && $sql['rows'] == 1) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <?php require './include/links.php' ?>
        <style>
            * {
                zoom: .97;
            }
        </style>
    </head>

    <body>
        <?php require './include/navbar.php' ?>


        <div class="sk-container post-details-container">

            <div class="post-header">
                <div class="up-down" id="updown">
                    <input id="postid" type="hidden" name="postid" value="<?php echo $postid ?>">
                    <?php $sql = $conDb->doSelectQuery($conn, "SELECT Rank FROM tblposts WHERE id='" . $postid . "'"); ?>
                    <i style="font-size: 50px; margin-right: 30px" class="fas fa-sort-up up"></i>
                    <input id="counter" type="text" value="<?php echo $sql['data'][0]['Rank'] ?>" style="all: unset;width: 32px;text-align: center">
                    <i style="font-size: 50px; margin-right: 30px" class="fas fa-sort-up down"></i>
                </div>


                <div class="post-titles">
                    <h1><?php echo $row['title'] ?></h1>

                </div>
            </div>
            <div class="this-post-image" style="display: flex;justify-content: center">
                <img src="./postimages/<?php echo $row['PostImage'] ?>" alt="" style="max-width: 100%; width: 400px; margin: 0px 20px;">
            </div>

            <div class="post-details" style="display: flex; flex-direction: column">
                <p><?php echo $row['PostDetails'] ?></p>
                <br>
                <p><?php echo $row['postdata'] ?> / <?php echo $row['category'] ?></p>
            </div>

            <div class="post-comments">

                <h1>Comment Section</h1>
                <?php
                $sql = $conDb->doSelectQuery($conn, "SELECT * FROM tblcomments WHERE status=1 AND postId='" . $postid . "' ");
                if ($sql['status'] == 1) {
                    foreach ($sql['data'] as $row) {
                ?>
                        <div class="comments-card">
                            <div class="user-images">
                                <img src="./images/user.png" alt="">
                            </div>
                            <div class="comments-details">
                                <p><?php echo $row['user_name'] ?></p>
                                <p><?php echo $row['comment'] ?></p>
                            </div>
                        </div>
                <?php
                    }
                }
                ?>
            </div>
        </div>


        <?php require './include/scripts.php' ?>
        <?php
        if ($role == 'author') {
        ?>
            <script>
                //dashboard
                $('#Approve').css('display', 'none');
                $('#Accountsid').css('display', 'none');
                $('#Breaking').css('display', 'none');
                //sidebar
                $('#SideApprove').css('display', 'none');
                $('#SideAccountsid').css('display', 'none');
                $('#SideBreaking').css('display', 'none');
            </script>

        <?php
        }
        ?>
    </body>

    </html>
<?php
} else {
    //error
}
