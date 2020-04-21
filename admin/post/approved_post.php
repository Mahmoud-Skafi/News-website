<?php
require_once('../config/dbcon.php');
include('../config/permissions.php');
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
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />
            <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
            <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
            <script src="../../node_modules/jquery/dist/jquery.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
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
                    if ($role == 'admin') {

                        $sql = $conDb->doSelectQuery($conn, "SELECT * FROM tblposts WHERE Approved='no' AND Is_Active=1");
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
                                        <td data-target="isactive">
                                            <?php echo $row['Is_Active']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['PostUrl']; ?>
                                        </td>
                                        <td>
                                            <a href="#" data-role="deletepost" data-id=<?php echo $row['id'] ?>>delete</a>
                                            <a href="#" data-role="accepted" data-id=<?php echo $row['id'] ?>>accept</a>

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
        </body>
        <div>
            <form id="post-delete-id">
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
        <form id="post-accept-id">
            <div class="modal fade" id="AcceptedModle" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
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
                                <button id="acceptpost" data-target="accpost" type="submit" class="btn btn-primary">submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        </div>

        </html>
<?php
    }
}
?>