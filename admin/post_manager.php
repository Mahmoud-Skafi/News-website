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
            if ($query) {
                $msg = "Post deleted ";
                // header("location:./post_manager.php");
            } else {
                $error = "Something went wrong . Please try again.";
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
                <h1>Post Manager</h1>
                <form action="add_post.php" method="POST">
                    <button name="Add_Post">add post</button>
                </form>
                <div class="container">
                    <div class="row">
                        <div id="admin" class="col s12">
                            <div class="card material-table">
                                <div class="table-header">
                                    <span class="table-title">Post Manager</span>
                                    <div class="actions">
                                        <a href="#add_users" class="modal-trigger waves-effect btn-flat nopadding"><i class="material-icons">person_add</i></a>
                                        <a href="#" class="search-toggle waves-effect btn-flat nopadding"><i class="material-icons">search</i></a>
                                    </div>
                                </div>
                                <table id="datatable">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Office</th>
                                            <th>Age</th>
                                            <th>Start date</th>
                                            <th>Salary</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                        <?php
                                        if ($_SESSION['roles'] == 'admin') {
                                            $sql = $conDb->doSelectQuery($conn, "SELECT * FROM tblposts WHERE Is_Active='1' AND Approved='yes' ");
                                        } else if ($_SESSION['roles'] == 'author') {
                                            $sql = $conDb->doSelectQuery($conn, "SELECT * FROM tblposts WHERE Is_Active='1' AND Approved='yes' OR Approved='no' ");
                                        }

                                        $res_per_page = 5;
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
                                            $sql = $conDb->doSelectQuery($conn, "SELECT * FROM tblposts WHERE Is_Active=1 AND Approved='yes'  LIMIT " . $this_page_first_res . ',' . $res_per_page);
                                        } else  if ($_SESSION['roles'] == 'author') {
                                            $sql = $conDb->doSelectQuery($conn, "SELECT * FROM tblposts WHERE Is_Active=1 AND Approved='no' OR Approved='yes' LIMIT " . $this_page_first_res . ',' . $res_per_page);
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
                                                        <?php echo $row['PostTitle']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['PostingDate']; ?>
                                                    </td>
                                                    <td data-target="isactive">
                                                        <?php echo $row['Is_Active']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['PostUrl']; ?>
                                                    </td>
                                                    <td>
                                                        <a href="#" data-role="deletepost" data-id=<?php echo $row['id'] ?>>delete</a>
                                                    </td>
                                                    <td><a href="edit_post.php?pid=<?php echo htmlentities($row['id']); ?>"><i class="fa fa-pencil" style="color: #29b6f6;"></i></a>
                                                        &nbsp;<a href="post_manager.php?pid=<?php echo htmlentities($row['id']); ?>&&action=del" onclick="return confirm('Do you reaaly want to delete ?')"> <i class="fa fa-trash-o" style="color: #f05050"></i></a> </td>
                                                </tr>
                                        <?php }
                                        } ?>

                                    </tbody>
                                </table>

                                <br>
                                <div class="numbers_of_pages" style="display:flex; justify-content: center;">
                                    <?php
                                    for ($page = 1; $page <= $number_of_pages; $page++) {
                                        echo '<a href="post_manager.php?page=' . $page . '"> ' . $page . '  </a> ';
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <form id="cat-edit-id">
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
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
                                            <button id="deletepost" type="submit" class="btn btn-primary">submit</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <script src="./include/vendor/jquery/jquery.min.js"></script>
                <script src="./include/vendor/bootstrap/js/bootstrap.js"></script>
                <script src="./include/vendor/jquery-easing/jquery.easing.min.js"></script>
                <script src="./assets/js/dashbordCont.js"></script>
                <script src="./assets/js/app.js"></script>
            </body>
            <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script> -->
            <script>

            </script>

            </html>

<?php

        }
    }
} else {
    echo "<script type='text/javascript'> document.location = '../dashboard.php'; </script>";
}
?>

<?php ?>