<?php
session_start();
include('../config/connect.php');
error_reporting(0);
if (strlen($_SESSION['login']) == 0) {
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
        $query = mysqli_query($conn, "UPDATE tblposts set PostTitle='$posttitle',CategoryId='$catid',PostDetails='$postdetails',PostUrl='$url',Is_Active='$status' where id='$postid'");
        if ($query) {
            echo "Post updated ";
        } else {
            echo "Something went wrong . Please try again.";
        }
    }

    $postid = intval($_GET['pid']);
    $query = mysqli_query($conn, "SELECT tblposts.id as postid,tblposts.PostImage,tblposts.PostTitle as title,tblposts.PostDetails,tblcategory.CategoryName as category,tblcategory.id as catid,tblsubcategory.SubCategoryId as subcatid,tblsubcategory.Subcategory as subcategory from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join tblsubcategory on tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.id='$postid' and tblposts.Is_Active=1 ");
    while ($row = mysqli_fetch_array($query)) {
?>

        <form name="addpost" method="post">

            <input type="text" class="form-control" id="posttitle" value="<?php echo htmlentities($row['title']); ?>" name="posttitle" placeholder="Enter title" required>
            <br>
            <select class="form-control" name="category" id="category" required>
                <option value="<?php echo htmlentities($row['catid']); ?>"><?php echo htmlentities($row['category']); ?></option>
                <?php
                // Feching active categories
                $ret = mysqli_query($conn, "SELECT id,CategoryName from  tblcategory where Is_Active=1");
                while ($result = mysqli_fetch_array($ret)) {
                ?>
                    <option value="<?php echo htmlentities($result['id']); ?>"><?php echo htmlentities($result['CategoryName']); ?></option>
                <?php } ?>

            </select>
            <br>

            <br>
            <textarea class="summernote" name="postdescription" required><?php echo htmlentities($row['PostDetails']); ?></textarea>
            <br>
            <img src="../postimages/<?php echo htmlentities($row['PostImage']); ?>" width="300" />
            <br>
            <a href="change_image.php?pid=<?php echo htmlentities($row['postid']); ?>">Update Image</a>
            <button type="submit" name="update" class="btn btn-success waves-effect waves-light">Update </button>
            <br>
        </form>
<?php }
} ?>