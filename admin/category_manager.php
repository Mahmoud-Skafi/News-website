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
        $sql = $conDb->doSelectQuery($conn, "SELECT id, CategoryName, Description, PostingDate, UpdationDate, Is_Active 
                                            FROM tblcategory 
                                            WHERE Is_Active=1
        ");
?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <?php require './include/links.php' ?>
        </head>

        <body>
            <?php require './include/navbar.php' ?>
            <!-- <form method="POST" action="add_category.php">
                <button>add cat</button>
            </form> -->
            <!-- <?php
                    $pagename = basename($_SERVER['PHP_SELF']);
                    $role = $_SESSION['roles'];

                    if (checkPermision($pagename, $role)) {
                    ?>
                   
                    <?php
                    }
                    ?> -->
            <button data-role="addcat">ADD CAT</button>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">First</th>
                        <th scope="col">Last</th>
                        <th scope="col">Handle</th>
                        <th scope="col">Handle</th>
                        <th scope="col">action</th>
                    </tr>
                </thead>
                <tbody>
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
                                    <?php echo $row['Is_Active']; ?>
                                </td>
                                <td data-target="catdate">
                                    <?php echo $row['PostingDate']; ?>
                                </td>
                                <td data-target="">
                                    <a href="#" data-role="editcat" data-id=<?php echo $row['id'] ?>> =edit</a>
                                    <a href="#" data-role="deletecat" data-id=<?php echo $row['id'] ?>> =edit</a>
                                </td>
                                <!-- <td><a href="edit_category.php?pid=<?php echo htmlentities($row['id']); ?>">edit<i class="fa fa-pencil" style="color: #29b6f6;"></i></a>
                                    &nbsp;<a href="post_manager.php?pid=<?php echo htmlentities($row['id']); ?>&&action=del" onclick="return confirm('Do you reaaly want to delete ?')">delete<i class="fa fa-trash-o" style="color: #f05050"></i></a> 
                                    </td> -->
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

            <!-- EDIT Modal -->
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
                                    <div>
                                        <label for="">category name</label>
                                        <input class="form-control" type="text" id="catname">
                                    </div>
                                    <div>
                                        <label for="">category des</label>
                                        <input class="form-control" type="text" id="catdes">
                                    </div>
                                    <div>
                                        <label for="">category active</label>
                                        <input class="form-control" type="text" id="catactive">
                                    </div>
                                    <input type="hidden" id="catid">
                                    <!-- <input type="time"> -->
                                </div>
                                <div class="modal-footer">
                                    <form id="">
                                        <button class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button id="kk" type="submit" class="btn btn-primary">submit</button>
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
                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
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
                                        <button id="deletecat" type="submit" class="btn btn-primary">submit</button>
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
                                <label for="">catname</label>
                                <input type="text" id="catnames">
                                <label for="">catdes</label>
                                <input type="text" id="catdess">
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
    } else {
        header('location: ../login.php');
    }
        ?>