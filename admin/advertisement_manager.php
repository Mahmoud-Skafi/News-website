<?php

require_once('./config/dbcon.php');
include('./config/permissions.php');
session_start();
error_reporting(0);
$pagename = basename($_SERVER['PHP_SELF']);
$role = $_SESSION['roles'];
$user = $_SESSION['username'];

if (checkPermision($pagename, $role)) {
    if (!isset($_SESSION['username'])) {
        header('location:login.php');
    } else {

        $sql = $conDb->doSelectQuery($conn, "SELECT * FROM tbladvertisements WHERE Is_Active='1' ");
        $res_per_page = 10;
        $number_of_res = $sql['rows'];
        $number_of_pages = ceil($number_of_res / $res_per_page);
        if (!isset($_GET['page'])) {
            $page = 1;
        } else {
            $page = $_GET['page'];
        }
        $this_page_first_res = ($page - 1) * $res_per_page;
        $sql = $conDb->doSelectQuery($conn, "SELECT * FROM tbladvertisements WHERE Is_Active='1' LIMIT " . $this_page_first_res . ',' . $res_per_page);
        if ($sql['status'] == 1) {
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
                ?>
                <?php require './include/navbar.php' ?>

                <br>
                <br>
                <div class="container">
                    <div class="row">
                        <div id="admin" class="col s12">
                            <div class="card material-table">
                                <div class="table-header">
                                    <span class="table-title" style="white-space: nowrap;">Advertisement Manager</span>
                                    <div class="actions" style="margin-left: 0% !important;">
                                        <!-- <a ><i class="material-icons"></i></a> -->
                                        <a href="./add_advertisement.php"><i class="fas fa-plus"></i> </a>
                                    </div>
                                </div>
                                <table id="datatable">
                                    <thead class="head-tr-costom">
                                        <tr>
                                            <th style="padding-right: 40px !important;">ID</th>

                                            <th>Advertisement Url</th>
                                            <th>Posting Date</th>
                                            <th>Is_Active</th>
                                            <th style="display: flex;align-items: center;justify-content: center;">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-body custom-tr">
                                        <?php


                                        foreach ($sql['data'] as $row) {
                                        ?>
                                            <tr class="fix" id="<?php echo $row['id']; ?>">
                                                <td>
                                                    <?php echo $row['id']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['advertisement_url']; ?>
                                                </td>

                                                <td>
                                                    <?php echo $row['postingdate']; ?>

                                                </td>
                                                <td data-target="isactive">
                                                    <?php echo $row['Is_Active']; ?>
                                                </td>
                                                <td class="td-custom">
                                                    <div>
                                                        <!-- 
                                                            <a href="#" data-role="deletepost" data-id=<?php echo $row['id'] ?>>
                                                                <i class="fas fa-eye" style="color:#feca7a;"></i>
                                                            </a> -->
                                                        <!-- <a href="edit_post.php?pid=<?php echo $row['id']; ?>">
                                                            <i class="fa fa-pencil" style="color: #29b6f6;"></i>
                                                        </a> -->

                                                        <a href="#" data-role="deletead" data-id=<?php echo $row['id'] ?>>
                                                            <i class="fa fa-trash-o" style="color: #f05050">
                                                            </i>
                                                        </a>

                                                    </div>
                                                </td>
                                            <?php
                                        }
                                            ?>
                                    </tbody>
                                </table>
                                <br>

                                <!-- PAGING -->
                                <div class="numbers_of_pages" id="myDIV" style="display:flex; justify-content: center;">
                                    <?php

                                    for ($page = 1; $page <= $number_of_pages; $page++) {

                                        if ($page == $pageurl) {
                                            echo '<a  class="thisA active" href="advertisement_manager.php?page=' . $page . '"> ' . $page . '  </a> ';
                                        } else
                                            echo '<a  class="thisA " href="advertisement_manager.php?page=' . $page . '"> ' . $page . '  </a> ';
                                    }
                                    ?>
                                </div>
                                <!-- END -->
                                <br>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- MODLE -->
                <div>
                    <form id="Ad-delete-id">
                        <div class="modal fade" id="Admodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Delete AD?</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div>
                                        <input type="hidden" name="" id="adid">
                                        <input type="hidden" name="" id="isactive">
                                        <!-- <input type="time"> -->
                                    </div>
                                    <div class="modal-footer">
                                        <form id="">
                                            <button class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button id="ad-delete" type="Activat" class="btn btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <?php require './include/scripts.php' ?>
            </body>

            </html>
<?php
        }
    }
}
?>