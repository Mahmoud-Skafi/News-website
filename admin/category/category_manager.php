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
                            <tr>
                                <td>
                                    <?php echo htmlentities($row['id']); ?>
                                </td>
                                <td>
                                    <?php echo htmlentities($row['CategoryName']); ?>
                                </td>
                                <td>
                                    <?php echo htmlentities($row['Description']); ?>
                                </td>
                                <td>
                                    <?php echo htmlentities($row['Is_Active']); ?>
                                </td>
                                <td>
                                    <?php echo htmlentities($row['PostingDate']); ?>
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
        <?php
    } else {
        header('location: ../login.php');
    }
        ?>