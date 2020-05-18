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

        $sql = $conDb->doSelectQuery($conn, "SELECT * FROM tblusers WHERE Is_Active='1' ");
        $res_per_page = 10;
        $number_of_res = $sql['rows'];
        $number_of_pages = ceil($number_of_res / $res_per_page);
        if (!isset($_GET['page'])) {
            $page = 1;
        } else {
            $page = $_GET['page'];
        }
        $this_page_first_res = ($page - 1) * $res_per_page;
        $sql = $conDb->doSelectQuery($conn, "SELECT * FROM tblusers WHERE Is_Active='1' LIMIT " . $this_page_first_res . ',' . $res_per_page);
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
                // echo $pageurl;
                ?>
                <?php require './include/navbar.php' ?>
                <!-- <form method="POST" action="add_users.php">
                    <button>ADD</button>
                </form> -->
                <!-- <form method="POST" action="account_activat.php">
                    <button>go</button>
                </form> -->
                <br>
                <br>
                <div class="container">
                    <div class="row">
                        <div id="admin" class="col s12">
                            <div class="card material-table">
                                <div class="table-header">
                                    <span class="table-title" style="white-space: nowrap;">Accounts Manager</span>
                                    <div class="actions" style="margin-left: 0% !important;">
                                        <!-- <a ><i class="material-icons"></i></a> -->
                                        <a href="./add_users.php"><i class="fas fa-plus"></i> </a>
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
                                    </thead >
                                    <tbody class="table-body custom-tr">
                                        <?php


                                        foreach ($sql['data'] as $row) {
                                        ?>
                                            <tr  class="fix" id="<?php echo $row['user_id']; ?>">
                                                <td>
                                                    <?php echo $row['user_id']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['user_name']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['user_email']; ?>
                                                </td>
                                                <td data-target="isactive">
                                                    <?php echo $row['Is_Active']; ?>
                                                </td>
                                                <td>
                                                    <?php  if($row['role_id']==1){
                                                        echo "ADMIN";  
                                                    } else if($row['role_id']==2){
                                                        echo "AUTHOR";
                                                    }
                                                    else{
                                                            echo "OTHER";
                                                        }
                                                    }?>
                                                </td>
                                                <td class="td-custom">
                                                    <div>

                                                        <?php if ($row['user_name'] == $user) {
                                                        } else {
                                                        ?>
                                                            <a href="#" data-role="disactivate" data-id=<?php echo $row['user_id'] ?>>
                                                                <i class="fas fa-user-slash" style="color: #f05050"></i>
                                                            <?php
                                                        }
                                                            ?>

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
                                            echo '<a  class="thisA active" href="manage_accounts.php?page=' . $page . '"> ' . $page . '  </a> ';
                                        } else
                                            echo '<a  class="thisA " href="manage_accounts.php?page=' . $page . '"> ' . $page . '  </a> ';
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
                    <form id="account-edit-id">
                        <div class="modal fade" id="accountmodle" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Disactivat Account?</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div>
                                        <input type="hidden" name="" id="userid">
                                        <input type="hidden" name="" id="isactive">
                                        <!-- <input type="time"> -->
                                    </div>
                                    <div class="modal-footer">
                                        <form id="">
                                            <button class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button id="Disactivate" type="Activat" class="btn btn-primary">Disactivat</button>
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