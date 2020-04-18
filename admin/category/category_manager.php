<?php
include('../config/dbcon.php');
include('../config/permissions.php');
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
                                            WHERE 1 
        ");
?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />
            <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
            <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
            <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
            <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script> -->
            <script src="../../node_modules/jquery/dist/jquery.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
            <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
            <script src="../assets/js/app.js"></script>
        </head>

        <body>
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
                                    <a href="#" data-role="edit" data-id=<?php echo $row['id'] ?>> =edit</a>
                                </td>
                                <td><a href="edit_category.php?pid=<?php echo htmlentities($row['id']); ?>">edit<i class="fa fa-pencil" style="color: #29b6f6;"></i></a>
                                    &nbsp;<a href="post_manager.php?pid=<?php echo htmlentities($row['id']); ?>&&action=del" onclick="return confirm('Do you reaaly want to delete ?')">delete<i class="fa fa-trash-o" style="color: #f05050"></i></a> </td>
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

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                Launch demo modal
            </button>
            <div>
                <!-- Modal -->
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
            <script>

            </script>

        <?php
    } else {
        header('location: ../login.php');
    }
        ?>