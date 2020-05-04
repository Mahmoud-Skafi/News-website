<?php
require_once('./admin/config/dbcon.php');
session_start();
$postid = intval($_GET['postid']);
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
        <?php require './vendor/links.php' ?>
        <style>
            * {
                zoom: .97;
            }
        </style>
    </head>

    <body>
        <?php require './vendor/navbar.php' ?>
        <br>
        <br>
        <div class="sk-container post-details-container">
            <div class="post-header">
                <h1><?php echo $row['title'] ?></h1>
            </div>
            <div class="this-post-image" style="display: flex;justify-content: center">
                <img src="./admin/postimages/<?php echo $row['PostImage'] ?>" alt="" style="max-width: 100%; margin: 0px 20px;">
            </div>

            <div class="post-details" style="display: flex; flex-direction: column">
                <p><?php echo $row['PostDetails'] ?></p>
                <br>
                <p><?php echo $row['postdata'] ?></p>
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
                                <img src="1.png" alt="">
                            </div>
                            <div class="comments-details">

                                <p><?php echo $row['comment'] ?></p>
                            </div>
                        </div>
                <?php
                    }
                }
                ?>
            </div>
        </div>

        <div class="comment sk-container">
            <div style="width: 100%">

                <div class="form-group">
                    <label style="font-size: 1.3rem; color:#000;margin: 20px 0px">Add Comment</label>
                    <!-- <in id="postid" style="display: none;"></p> -->
                    <input type="hidden" id="postids" value="<?php echo $postid ?>">
                    <textarea id="comments" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
                <div style="display: flex;justify-content: flex-end">
                    <button data-role="addcomment" type="submit" class="btn btn-primary" name="add">Add Comment</button>
                </div>
            </div>
        </div>
        <?php require './vendor/scripts.php' ?>

    </body>

    </html>
<?php
} else {
    //error
}
