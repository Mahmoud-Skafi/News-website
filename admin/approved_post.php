<?php
require_once('./config/dbcon.php');
include('./config/permissions.php');
session_start();
error_reporting(0);
$pagename = basename($_SERVER['PHP_SELF']);
$role = $_SESSION['roles'];

if (checkPermision($pagename, $role)) {
    if (!isset($_SESSION['username'])) {
        header('location:login.php');
    } else {

?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <?php require './include/links.php' ?>
        </head>

        <body>
            <?php
            $pageurl = $_GET['page'];
            if ($pageurl)
                $pageurl = intval($pageurl);
            // echo $pageurl;
            ?>
            <?php require './include/navbar.php' ?>
            <br>
            <br>
            <div class="container">
                <div class="row">
                    <div id="admin" class="col s12">
                        <div class="card material-table">
                            <div class="table-header">
                                <span class="table-title" style="white-space: nowrap;">Approve Posts</span>
                                <div class="actions" style="margin-left: 0% !important;">
                                    <!-- <a ><i class="material-icons"></i></a> -->
                                    <a href="./add_post.php"><i class="fas fa-plus"></i> </a>
                                </div>
                            </div>
                            <table id="datatable">
                                <thead class="head-tr-costom">
                                    <tr>
                                        <th style="padding-right: 40px !important;">ID</th>
                                        <th>User Name</th>
                                        <th>Email</th>
                                        <th>Is_Active</th>
                                        <th>Updation Date</th>
                                        <th style="display: flex;align-items: center;justify-content: center;">Actions</th>
                                    </tr>
                                </thead>



                                <?php
                                if ($role == 'admin') {

                                    $sql = $conDb->doSelectQuery($conn, "SELECT * FROM tblposts WHERE Approved='no' AND Is_Active=1");

                                    $res_per_page = 10;
                                    $number_of_res = $sql['rows'];
                                    $number_of_pages = ceil($number_of_res / $res_per_page);
                                    if (!isset($_GET['page'])) {
                                        $page = 1;
                                    } else {
                                        $page = $_GET['page'];
                                    }

                                    $this_page_first_res = ($page - 1) * $res_per_page;
                                    $sql = $conDb->doSelectQuery($conn, "SELECT * FROM tblposts WHERE Approved='no' AND Is_Active=1 LIMIT " . $this_page_first_res . ',' . $res_per_page);
                                    if ($sql['status'] == 1) {
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
                                                    <td>
                                                        <?php echo $row['UpdationDate']; ?>
                                                    </td>
                                                    <td data-target="isactive">
                                                        <?php echo $row['Is_Active']; ?>
                                                    </td>

                                                    <td class="td-custom">
                                                        <div>

                                                            <a href="#" data-role="accepted" data-id=<?php echo $row['id'] ?>>
                                                                <i class="fas fa-clipboard-check" style="color: #3ac47d;"></i>
                                                            </a>

                                                            <a href="#" data-role="deletepost" data-id=<?php echo $row['id'] ?>>
                                                                <i class="fa fa-trash-o" style="color: #f05050">
                                                                </i>
                                                            </a>

                                                        </div>
                                                    </td>
                                                    <td data-target="accept" style="display: none">
                                                        <?php echo $row['Approved'] ?>
                                                    </td>

                                                </tr>



                                <?php
                                            }
                                        }
                                    }
                                } else if ($role == 'author') {
                                    header('location:login.php');
                                }
                                ?>
                                </tbody>
                            </table>
                            <br>
                            <div class="numbers_of_pages" id="myDIV" style="display:flex; justify-content: center;">
                                <?php

                                for ($page = 1; $page <= $number_of_pages; $page++) {

                                    if ($page == $pageurl) {
                                        echo '<a  class="thisA active" href="manage_accounts.php?page=' . $page . '"> ' . $page . '  </a> ';
                                    } else
                                        echo '<a  class="thisA " href="manage_accounts.php?page=' . $page . '"> ' . $page . '  </a> ';
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
                <form id="post-delete-id">
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Delet Post</h5>
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
                                        <button id="deletepost" type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <form id="post-accept-id">
                <div class="modal fade" id="AcceptedModle" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Accept Post</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div>
                                <input type="hidden" name="" id="postida">
                                <input type="hidden" name="" id="isaccpted">
                                <!-- <input type="time"> -->
                            </div>
                            <div class="modal-footer">
                                <form id="">
                                    <button class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button id="acceptpost" data-target="accpost" type="submit" class="btn btn-primary">Accept</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            </div>
            <?php require './include/scripts.php' ?>
        </body>

        </html>
<?php
    }
}
?>