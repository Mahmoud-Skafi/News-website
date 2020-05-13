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
                                    <a href="./add_brackingnews.php"><i class="fas fa-plus"></i> </a>
                                </div>
                            </div>
                            <table id="datatable">
                                <thead class="head-tr-costom">
                                    <tr>
                                        <th style="padding-right: 40px !important;">ID</th>
                                        <th>User Name</th>
                                        <th>Is_Active</th>
                                        <th style="display: flex;align-items: center;justify-content: center;">Actions</th>
                                    </tr>
                                </thead>



                                <?php

                                $sql = $conDb->doSelectQuery($conn, "SELECT * FROM tblbrackingnews WHERE Is_Active=1");

                                $res_per_page = 10;
                                $number_of_res = $sql['rows'];
                                $number_of_pages = ceil($number_of_res / $res_per_page);
                                if (!isset($_GET['page'])) {
                                    $page = 1;
                                } else {
                                    $page = $_GET['page'];
                                }

                                $this_page_first_res = ($page - 1) * $res_per_page;

                                $sql = $conDb->doSelectQuery($conn, "SELECT * FROM tblbrackingnews WHERE Is_Active=1 ");
                                if ($sql['status'] == 1) {

                                    foreach ($sql['data'] as $row) {

                                ?>
                                        <tr id="<?php echo $row['id']; ?>">
                                            <td>
                                                <?php echo $row['id']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row['brackingText']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row['Is_Active']; ?>
                                            </td>
                                            <td class="td-custom">
                                                <div>

                                                    <a href="#" data-role="editnews" data-id=<?php echo $row['id'] ?>>
                                                        <i class="fas fa-clipboard-check" style="color: #3ac47d;"></i>
                                                    </a>

                                                    <a href="#" data-role="deletenews" data-id=<?php echo $row['id'] ?>>
                                                        <i class="fa fa-trash-o" style="color: #f05050">
                                                        </i>
                                                    </a>

                                                </div>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                    </tbody>
                            </table>


                    <?php
                                }
                            }

                    ?>
                    <br>
                    <div class="numbers_of_pages" id="myDIV" style="display:flex; justify-content: center;">
                        <?php

                        for ($page = 1; $page <= $number_of_pages; $page++) {

                            if ($page == $pageurl) {
                                echo '<a  class="thisA active" href="bracking_news.php?page=' . $page . '"> ' . $page . '  </a> ';
                            } else
                                echo '<a  class="thisA " href="bracking_news.php?page=' . $page . '"> ' . $page . '  </a> ';
                        }
                        ?>
                    </div>
                    <br>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <form id="news-delete-id">
                    <div class="modal fade" id="activatmodel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to delete this Braking News?</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div>
                                    <input type="hidden" name="" id="newsid">
                                  
                                    <!-- <input type="time"> -->
                                </div>
                                <div class="modal-footer">
                                    <form id="">
                                        <button class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button id="deletenews" style="background-color: #f84c4c !important; color:white;" type="submit" class="btn ">Delete</button>
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
    ?>