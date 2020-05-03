<?php
include('./config/dbcon.php');
include('./config/permissions.php');
session_start();
error_reporting(0);
$pagename = basename($_SERVER['PHP_SELF']);
$role = $_SESSION['roles'];

if (checkPermision($pagename, $role)) {
    if (!isset($_SESSION['username'])) {
        header('location: ../login.php');
    } else {
        $sql = $conDb->doSelectQuery($conn, "SELECT * FROM tblcategory WHERE Is_Active=1");
        $res_per_page = 8;
        $number_of_res = $sql['rows'];
        $number_of_pages = ceil($number_of_res / $res_per_page);
        if (!isset($_GET['page'])) {
            $page = 1;
        } else {
            $page = $_GET['page'];
        }

        $this_page_first_res = ($page - 1) * $res_per_page;
        $sql = $conDb->doSelectQuery($conn, "SELECT id, CategoryName, Description, PostingDate, UpdationDate, Is_Active 
                                            FROM tblcategory 
                                            WHERE Is_Active=1
                                            ORDER BY PostingDate DESC
                                            LIMIT " . $this_page_first_res . ',' . $res_per_page);

        if ($sql['status'] == 1) {
?>
            <!DOCTYPE html>
            <html lang="en">

            <head>
                <?php require './include/links.php' ?>
            </head>

            <body>
                <?php require './include/navbar.php' ?>
                <?php
                $pageurl = $_GET['page'];
                if ($pageurl)
                    $pageurl = intval($pageurl);
                // echo $pageurl;
                ?>
                <br>
                <br>
                
                <div class="container">
                    <div class="row">
                        <div id="admin" class="col s12">
                            <div class="card material-table">
                                <div class="table-header">
                                    <span class="table-title" style="white-space: nowrap;">Category Manager</span>
                                    <div class="actions" style="margin-left: 0% !important;">
                                        <!-- <a ><i class="material-icons"></i></a> -->
                                        <a data-role="addcat"><i class="fas fa-plus"></i> </a>
                                    </div>
                                </div>
                                <table id="datatable">
                                    <thead class="head-tr-costom">
                                        <tr>
                                            <th style="padding-right: 40px !important;">ID</th>
                                            <th>Category Name</th>
                                            <th>Category Details</th>
                                            <th>Posting Date</th>
                                            <th>Updation Date</th>
                                            <th style="display: flex;align-items: center;justify-content: center;">Actions</th>
                                        </tr>
                                    </thead class="table-body">


                                    <?php
                                    if ($sql['rows'] > 0) {
                                        foreach ($sql['data'] as $row) {
                                    ?>
                                            <tr id="<?php echo $row['id']; ?>">
                                                <td>
                                                    <?php echo $row['id']; ?>
                                                </td>
                                                <td data-target="catname">
                                                    <?php echo $row['CategoryName']; ?>
                                                </td>
                                                <td data-target="catdes">
                                                    <?php echo $row['Description']; ?>
                                                </td>
                                                <td data-target="catactive">
                                                    <?php echo $row['PostingDate']; ?>
                                                </td>
                                                <td data-target="catdate">
                                                    <?php echo $row['UpdationDate']; ?>
                                                </td>
                                                <td class="td-custom">
                                                    <div>
                                                        <a href="#" data-role="editcat" data-id=<?php echo $row['id'] ?>>
                                                            <i class="fa fa-pencil" style="color: #29b6f6;"></i>
                                                        </a>
                                                        <a href="#" data-role="deletecat" data-id=<?php echo $row['id'] ?>>
                                                            <i class="fa fa-trash-o" style="color: #f05050"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                <?php
                                        }
                                    } else {
                                        echo "NO DATA";
                                    }
                                }
                                ?>
                                </tbody>
                                </table>
                                <br>
                                <div class="numbers_of_pages" id="myDIV" style="display:flex; justify-content: center;">
                                    <?php

                                    for ($page = 1; $page <= $number_of_pages; $page++) {

                                        if ($page == $pageurl) {
                                            echo '<a  class="thisA active" href="category_manager.php?page=' . $page . '"> ' . $page . '  </a> ';
                                        } else
                                            echo '<a  class="thisA " href="category_manager.php?page=' . $page . '"> ' . $page . '  </a> ';
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
                <!-- EDIT Modal -->
                <div>
                    <form id="cat-edit-id">
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Edit Form</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="container" style="margin: 20px 0px;">
                                        <div>
                                            <label for="">Category Name</label>
                                            <input class="form-control" type="text" id="catname">
                                        </div>
                                        <br>
                                        <div>
                                            <label for="">Category Description</label>
                                            <input class="form-control" type="text" id="catdes">
                                        </div>
                                        <input type="hidden" id="catid">
                                    </div>
                                    <div class="modal-footer">
                                        <form id="">
                                            <button class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button id="kk" type="submit" class="btn btn-primary">Edit</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div>
                    <form id="cat-delete-id">
                        <div class="modal fade" id="DeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Delete Category ?!</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div>


                                        <input type="hidden" id="catid">
                                        <input type="hidden" id="isactive">
                                        <!-- <input type="time"> -->
                                    </div>
                                    <div class="modal-footer">
                                        <form id="">
                                            <button class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button style="background-color: #f84c4c !important; color:white;" id="deletecat" type="submit" class="btn btn-primary">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <form id="cat-add-id">
                    <div class="modal fade" id="AddModle" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div>
                                    <div class="container" style="margin: 20px 0px;">
                                        <div>
                                            <label for="">Category Name</label>
                                            <input class="form-control" type="text" id="catnames">
                                        </div>
                                        <br>
                                        <div>
                                            <label for="">Category Description</label>
                                            <input class="form-control" type="text" id="catdess">
                                        </div>
                                        <input type="hidden" id="catid">
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <form id="">
                                        <button class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button id="addcat" type="submit" class="btn btn-primary">submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                </div>
                <?php require './include/scripts.php' ?>
            <?php
        }
            ?>
        <?php
    } else {
        header('location: ../login.php');
    }
        ?>