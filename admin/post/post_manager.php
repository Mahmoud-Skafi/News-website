<?php
session_start();
include('../config/connect.php');
error_reporting(0);
if (strlen($_SESSION['login']) == 0) {
    header('location:login.php');
} else {
    if ($_GET['action'] = 'del') {
        $postid = intval($_GET['pid']);
        $query = mysqli_query($conn, "UPDATE tblposts set Is_Active=0 where id='$postid'");
        if ($query) {
            $msg = "Post deleted ";
            // header("location:./post_manager.php");
        } else {
            $error = "Something went wrong . Please try again.";
        }
    }

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <!-- <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous"> -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>

        <title>Document</title>
    </head>

    <body>
        <h1>Post Manager</h1>
        <form action="add_post.php" method="POST">
            <button name="Add_Post">add post</button>
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
                <!-- <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
            </tr> -->
                <?php
                $res = mysqli_query($conn, "SELECT id, PostTitle, PostingDate, Is_Active, PostUrl FROM tblposts WHERE Is_Active=1");
                ?>
                <?php
                if ($res->num_rows > 0) {
                    while ($row = $res->fetch_assoc()) {
                ?>
                        <tr>
                            <td>
                                <?php echo htmlentities($row['id']); ?>
                            </td>
                            <td>
                                <?php echo htmlentities($row['PostTitle']); ?>
                            </td>
                            <td>
                                <?php echo htmlentities($row['PostingDate']); ?>
                            </td>
                            <td>
                                <?php echo htmlentities($row['Is_Active']); ?>
                            </td>
                            <td>
                                <?php echo htmlentities($row['PostUrl']); ?>
                            </td>

                            <td><a href="edit_post.php?pid=<?php echo htmlentities($row['id']); ?>"><i class="fa fa-pencil" style="color: #29b6f6;"></i></a>
                                &nbsp;<a href="post_manager.php?pid=<?php echo htmlentities($row['id']); ?>&&action=del" onclick="return confirm('Do you reaaly want to delete ?')"> <i class="fa fa-trash-o" style="color: #f05050"></i></a> </td>
                        </tr>
                <?php }
                } ?>

            </tbody>
        </table>
    </body>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    </html>
<?php } ?>
<!-- </tr>
                    echo "<tr><td>" .$row['id']. "</td> <td>".$row['PostTitle']."</td> <td>"
                    .$row['PostingDate']."</td> <td>".$row['Is_Active']."</td> <td>".$row['PostUrl'].
                    "</td> ";
                    echo '<td> 
                            <div >
                                <span>
                                    <a href="edit_post.php">
                                        <i class="fas fa-pen-square"></i>
                                    </a>
                                </span>
                                <span>
                                    <a href="view_post.php?pid=<?php ?>">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                </span>
                                <span>
                                    <a href="">
                                        <i class="fas fa-trash-alt"></i>
                                    </a>
                                </span>
                            </div>
                        </td>';
                }
                echo "</tr>";