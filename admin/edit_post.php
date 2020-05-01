<?php
include('./config/dbcon.php');
include('./config/permissions.php');
session_start();
error_reporting(0);
$pagename = basename($_SERVER['PHP_SELF']);
$role = $_SESSION['roles'];

if (checkPermision($pagename, $role)) {
    if (!isset($_SESSION['username'])) {
        header('location:login.php');
    } else {
        if (isset($_POST['update'])) {
            $posttitle = $_POST['posttitle'];
            $catid = $_POST['category'];
            $postdetails = $_POST['postdescription'];
            $arr = explode(" ", $posttitle);
            $url = implode("-", $arr);
            $status = 1;
            $postid = intval($_GET['pid']);
            $query = $conDb->doSelectQuery($conn, "UPDATE tblposts set PostTitle='$posttitle',CategoryId='$catid',PostDetails='$postdetails',PostUrl='$url',Is_Active='$status' where id='$postid'");
            if ($query) {

                header("location:./post_manager.php");
            } else {
                echo "Something went wrong . Please try again.";
            }
        }

        $postid = intval($_GET['pid']);
        $query = $conDb->doSelectQuery($conn, "SELECT tblposts.id as postid,tblposts.PostImage,tblposts.PostTitle as title,tblposts.PostDetails,tblcategory.CategoryName as category,tblcategory.id as catid,tblsubcategory.SubCategoryId as subcatid,tblsubcategory.Subcategory as subcategory from tblposts 
                                                left join tblcategory 
                                                on tblcategory.id=tblposts.CategoryId 
                                                left join tblsubcategory 
                                                on tblsubcategory.SubCategoryId=tblposts.SubCategoryId 
                                                where tblposts.id='$postid' 
                                                and tblposts.Is_Active=1 ");
        $row = $query['data'][0];
        if ($query['rows'] == 1) {
?>
            <!DOCTYPE html>
            <html lang="en">

            <head>
                <?php require './include/links.php' ?>
            </head>

            <body>
                <?php require './include/navbar.php' ?>
                <div class="container">
                    <form name="addpost" method="post">
                        <br>
                        <h1 style="font-size:1.5rem; color:#000;">Edit Post</h1>
                        <br>
                        <br>

                        <label>Post Title</label>
                        <input type="text" class="form-control" id="posttitle" value="<?php echo htmlentities($row['title']); ?>" name="posttitle" placeholder="Enter title" required>
                        <br>
                        <label>Select Category</label>
                        <select class="form-control" name="category" id="category" required>
                            <option value="<?php echo htmlentities($row['catid']); ?>"><?php echo htmlentities($row['category']); ?></option>
                            <?php
                            // Feching active categories
                            $ret = $conDb->doSelectQuery($conn, "SELECT id,CategoryName from  tblcategory where Is_Active=1");

                            foreach ($ret['data'] as $result) {
                            ?>
                                <option value="<?php echo htmlentities($result['id']); ?>"><?php echo htmlentities($result['CategoryName']); ?></option>
                            <?php } ?>

                        </select>
                        <br>

                        <br>
                        <label>Post Description</label>
                        <textarea style="width: 100%;" name="postdescription" required><?php echo htmlentities($row['PostDetails']); ?></textarea>
                        <br>
                        <img src="../postimages/<?php echo htmlentities($row['PostImage']); ?>" width="300" />
                        <br>
                        <a href="change_image.php?pid=<?php echo htmlentities($row['postid']); ?>">Update Image</a>
                        <button type="submit" name="update" class="btn btn-success waves-effect waves-light">Update </button>
                        <br>
                      
      
                    </form>
                </div>

                <?php require './include/scripts.php' ?>
                <script>

                </script>
            </body>
            <script>

            </script>

            </html>

<?php }
    }
} ?>