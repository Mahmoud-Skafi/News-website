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
        /**
         * Pageing 
         */
        $sql = $conDb->doSelectQuery($conn, "SELECT * FROM tblusers WHERE Is_Active='1' ");
        $res_per_page = 1;
        $number_of_res = $sql['rows'];
        $number_of_pages = ceil($number_of_res / $res_per_page);
        if (!isset($_GET['page'])) {
            $page = 1;
        } else {
            $page = $_GET['page'];
        }
        $this_page_first_res = ($page - 1) * $res_per_page;
        $sql = $conDb->doSelectQuery($conn, "SELECT * FROM tblusers WHERE user_name != '" . $user . "' AND Is_Active='1' LIMIT " . $this_page_first_res . ',' . $res_per_page);
        if ($sql['status'] == 1) {
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
                <form method="POST" action="add_users.php">
                    <button>ADD</button>
                </form>
                <form method="POST" action="account_activat.php">
                    <button>go</button>
                </form>
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


                        foreach ($sql['data'] as $row) {
                        ?>
                            <tr id="<?php echo $row['user_id']; ?>">
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
                                    <?php echo $row['role_id']; ?>
                                </td>
                                <td>
                                    <a href="#" data-role="disactivate" data-id=<?php echo $row['user_id'] ?>>DisActivat</a>
                                </td>
                            <?php
                        }
                            ?>
                    </tbody>
                </table>

















                <!-- PAGING -->
                <div class="numbers_of_pages" style="display:flex; justify-content: center;">
                    <?php
                    for ($page = 1; $page <= $number_of_pages; $page++) {
                        echo '<a href="manage_accounts.php?page=' . $page . '"> ' . $page . '  </a> ';
                    }
                    ?>
                </div>
                <!-- END -->


                <!-- MODLE -->
                <div>
                    <form id="account-edit-id">
                        <div class="modal fade" id="accountmodle" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
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
                                            <button id="Disactivate" type="submit" class="btn btn-primary">submit</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                </div>
                </div>
                </div>
            </body>
            <script src="./include/vendor/jquery/jquery.min.js"></script>

            <script src="./include/vendor/bootstrap/js/bootstrap.js"></script>
            <script src="./include/vendor/jquery-easing/jquery.easing.min.js"></script>
            <script src="./assets/js/dashbordCont.js"></script>
            <script src="./assets/js/app.js"></script>

            </html>
<?php
        }
    }
}
?>