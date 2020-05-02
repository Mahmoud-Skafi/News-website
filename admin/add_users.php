<?php

require_once('./config/dbcon.php');
include('./config/permissions.php');
// require('./include/scripts.php');
session_start();
error_reporting(0);
$pagename = basename($_SERVER['PHP_SELF']);
$role = $_SESSION['roles'];
$user = $_SESSION['username'];

if (checkPermision($pagename, $role)) {
    if (!isset($_SESSION['username'])) {
        header('location:./login.php');
    } else {

?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <?php require './include/links.php' ?>
        </head>

        <body>
            <?php require './include/navbar.php' ?>

            <div class="container">
                <form name="Add Users" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>User Name</label>
                        <input type="text" name="user_name" class="form-control" placeholder="User Name" required>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="user_email" class="form-control" placeholder="Email" required>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="user_password" class="form-control" placeholder="Password" required>
                    </div>
                    <div class="form-group">
                        <label>Confirm Password</label>
                        <input type="password" name="user_confirm_password" class="form-control" placeholder="Confirm Password" required>
                    </div>
                    <label>Select Role</label>
                    <div class="input-group mb-3">

                        <select class="custom-select" name="role" required>
                            <option value="">Select Role</option>
                            <?php
                            $sql = $conDb->doSelectQuery($conn, "SELECT role_id, type FROM tbpermisstions WHERE 1");
                            foreach ($sql['data'] as $result) {
                            ?>
                                <option value="<?php echo htmlentities($result['role_id']); ?>"><?php echo htmlentities($result['type']); ?></option>

                            <?php } ?>
                        </select>
                    </div>
                    <br>
                    <button onclick="document.location = './manage_accounts.php';" class="btn btn-danger">Cansal</button>
                    <button class="btn btn-primary" name="add">Add User</button>
                </form>
            </div>

            <br>
            <br>
            <br>
            <br>



            </form>
            <?php require './include/scripts.php' ?>

        </body>

        </html>


<?php

        if (isset($_POST['add'])) {
            $user_name = $_POST['user_name'];
            $user_email = $_POST['user_email'];
            $password = $_POST['user_password'];
            $confirm_password = $_POST['user_confirm_password'];
            $roleid = $_POST['role'];
            if ($password != $confirm_password) {
                echo "<script>Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Password Not Match !',
                   
                  })</script>";
            } else {
                $date = date("Y-m-d H:i:s");
                $hashpassword = password_hash($password, PASSWORD_BCRYPT);
                $sql = $conDb->doSelectQuery($conn, "SELECT * FROM tblusers WHERE user_name='$user_name'");
                if ($sql['rows'] >= 1) {

                    $msa = "the user name is already taken";
                } else {
                    $sql = $conDb->doSelectQuery($conn, "INSERT INTO tblusers  
            SET  user_name= '$user_name' , user_email='$user_email',user_password='$hashpassword',Is_Active=1,CreationDate='$date',role_id='$roleid'  
          ");
                    if ($sql['status'] == 1) {
                        echo "<script>Swal.fire({
                            
                            icon: 'success',
                            title: 'User Added',
                            showConfirmButton: false,
                            timer: 1500
                          })</script>";
                    } else {
                        echo "alert('ERROR')";
                    }
                }
            }
        } else {
        }
    }
}
?>