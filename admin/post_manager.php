<?php
include('./config/dbcon.php');
include('./config/permissions.php');
session_start();
error_reporting(0);

$pagename = basename($_SERVER['PHP_SELF']);
$role = $_SESSION['roles'];

if (checkPermision($pagename, $role)) {
    if (isset($_SESSION['username'])) {
        if ($_GET['action'] = 'del') {
            $postid = intval($_GET['pid']);
            $query = $conDb->doQuery($conn, "UPDATE tblposts set Is_Active=0 where id='$postid'");
            if ($query['status'] == 1) {
                $msg = "Post deleted ";
                // header("location:./post_manager.php");
            } else {
                $error = "Something went wrong . Please try again.";
            }

?>
            <!DOCTYPE html>
            <html lang="en">

            <head>
                <?php require './include/links.php' ?>
            </head>

            <body>
                <?php require './include/navbar.php' ?>
                <!-- <h1>Post Manager</h1>
                <form action="add_post.php" method="POST">
                    <button name="Add_Post">add post</button>
                </form> -->
                <br>
                <?php
                $pageurl = $_GET['page'];
                $pageurl = intval($pageurl);
                // echo $pageurl;
                ?>
                <div class="container">
                    <div class="row">
                        <div id="admin" class="col s12">
                            <div class="card material-table">
                                <div class="table-header">
                                    <span class="table-title" style="white-space: nowrap;">Post Manager</span>
                                    <div class="actions">
                                        <!-- <a ><i class="material-icons"></i></a> -->
                                        <a href="./add_post.php"><i class="fas fa-plus"></i> </a>
                                    </div>
                                </div>
                                <table id="datatable">
                                    <thead class="head-tr-costom">
                                        <tr>
                                            <th>ID</th>
                                            <th>Post Title</th>
                                            <th>Post Details</th>
                                            <th>Posting Date</th>
                                            <th>Updation Date</th>
                                            <th>Approved</th>
                                            <th style="display: flex;align-items: center;justify-content: center;">Actions</th>
                                        </tr>
                                    </thead>

                                    <tbody class="custom-tr">

                                        <?php
                                        function limit_text($text, $limit)
                                        {
                                            if (str_word_count($text, 0) > $limit) {
                                                $words = str_word_count($text, 2);
                                                $pos = array_keys($words);
                                                $text = substr($text, 0, $pos[$limit]) . '...';
                                            }
                                            return $text;
                                        }
                                        if ($_SESSION['roles'] == 'admin') {
                                            $sql = $conDb->doSelectQuery($conn, "SELECT * FROM tblposts WHERE Is_Active='1' AND Approved='yes' ");
                                        } else if ($_SESSION['roles'] == 'author') {
                                            $sql = $conDb->doSelectQuery($conn, "SELECT * FROM tblposts WHERE Is_Active='1' AND Approved='yes' OR Approved='no' ");
                                        }

                                        $res_per_page = 10;
                                        $number_of_res = $sql['rows'];
                                        $number_of_pages = ceil($number_of_res / $res_per_page);
                                        if (!isset($_GET['page'])) {
                                            $page = 1;
                                        } else {
                                            $page = $_GET['page'];
                                        }

                                        $this_page_first_res = ($page - 1) * $res_per_page;
                                        // $sql = $conDb->doSelectQuery($conn, "SELECT * FROM tblposts WHERE  Is_Active='1' LIMIT " . $this_page_first_res . ',' . $res_per_page);

                                        if ($_SESSION['roles'] == 'admin') {
                                            $sql = $conDb->doSelectQuery($conn, "SELECT * FROM tblposts WHERE Is_Active=1 AND Approved='yes' ORDER BY PostingDate DESC LIMIT " . $this_page_first_res . ',' . $res_per_page);
                                        } else  if ($_SESSION['roles'] == 'author') {
                                            $sql = $conDb->doSelectQuery($conn, "SELECT * FROM tblposts WHERE Is_Active=1 AND Approved='no'   OR Approved='yes' ORDER BY PostingDate DESC LIMIT " . $this_page_first_res . ',' . $res_per_page);
                                        }
                                        ?>
                                        <?php
                                        if ($sql['rows'] > 0) {
                                            foreach ($sql['data'] as $row) {
                                        ?>
                                                <tr id="<?php echo $row['id']; ?>">
                                                    <td>
                                                        <?php echo $row['id']; ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        $t = $row['PostTitle'];
                                                        echo  limit_text($t, 5);

                                                        ?>
                                                    </td>
                                                    <td>

                                                        <?php

                                                        $t = $row['PostDetails'];
                                                        echo  limit_text($t, 10);
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['PostingDate']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['UpdationDate']; ?>
                                                    </td>
                                                    <td data-target="isactive" style="display: none">
                                                        <?php echo $row['Is_Active']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['Approved']; ?>
                                                    </td>
                                                    <!-- <td>
                                                        <a href="#" data-role="deletepost" data-id=<?php echo $row['id'] ?>>delete</a>
                                                    </td> -->
                                                    <td class="td-custom">
                                                        <div>

                                                            <a href="./post_view.php?postid=<?php echo $row['id'] ?>">
                                                                <i class="fas fa-eye" style="color:#feca7a;"></i>
                                                            </a>
                                                            <a href="edit_post.php?pid=<?php echo $row['id']; ?>">
                                                                <i class="fa fa-pencil" style="color: #29b6f6;"></i>
                                                            </a>

                                                            <a href="#" data-role="deletepost" data-id=<?php echo $row['id'] ?>>
                                                                <i class="fa fa-trash-o" style="color: #f05050">
                                                                </i>
                                                            </a>

                                                        </div>
                                                    </td>
                                                </tr>
                                        <?php }
                                        } ?>

                                    </tbody>
                                </table>

                                <br>
                                <div class="numbers_of_pages" id="myDIV" style="display:flex; justify-content: center;">
                                    <?php

                                    for ($page = 1; $page <= $number_of_pages; $page++) {

                                        if ($page == $pageurl) {
                                            echo '<a  class="thisA active" href="post_manager.php?page=' . $page . '"> ' . $page . '  </a> ';
                                        } else
                                            echo '<a  class="thisA " href="post_manager.php?page=' . $page . '"> ' . $page . '  </a> ';
                                    }
                                    ?>
                                </div>

                                <br>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <br>
                <div>
                    <form id="post-edit-id">
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to delete this post?</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div>
                                        <input type="hidden" name="" id="postid">
                                        <input type="hidden" name="" id="isactive">
                                        <!-- <input type="time"> -->
                                    </div>
                                    <div class="modal-footer">
                                        <form id="">
                                            <button class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button id="deletepost" style="background-color: #f84c4c !important; color:white;" type="submit" class="btn ">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
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

        }
    }
} else {
    echo "<script type='text/javascript'> document.location = '../dashboard.php'; </script>";
}
?>

<?php ?>