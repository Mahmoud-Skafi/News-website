<?php
include('../config/dbcon.php');
include('../config/permissions.php');
// session_start();
// if (isset($_POST['catname'])) {
//     echo "<script>alert('11111')</script>";
// }
$catname = $_POST['catname'];
$catdes = $_POST['catdes'];
$update = date("Y/m/d");
$catid = $_POST['catid'];
$catactive = $_POST['catactive'];
$sql = $conDb->doSelectQuery($conn, "UPDATE tblcategory
         SET CategoryName='" . $catname . "',Description='" . $catdes . "',UpdationDate='" . $update . "' 
         WHERE id='".$catid."'
         ");
if ($sql['status']) {
    echo "<script >console.log('ok')</script>";
} else {
    echo "<script >console.log('error')</script>";
}
// $catid = intval($_GET['pid']);
// $catid = intval($_GET['pid']);
// if (!isset($_SESSION['username'])) {
//     header('location: ../login.php');
// } else {

// }
/*
session_start();
error_reporting(0);
$pagename = basename($_SERVER['PHP_SELF']);
$role = $_SESSION['roles'];

if (checkPermision($pagename, $role)) {
    if (!isset($_SESSION['username'])) {
        header('location: ../login.php');
    } else {
        if (isset($_POST['update'])) {
            $catname = $_POST['catname'];
            $catdescription = $_POST['catdescription'];
            $update = date("Y/m/d");
            $catid = intval($_GET['pid']);
            $catid = intval($_GET['pid']);
            $sql = $conDb->doSelectQuery($conn, "UPDATE tblcategory
             SET CategoryName='" . $catname . "',Description='" . $catdescription . "',UpdationDate='" . $update . "' 
             WHERE id='" . $catid . "'");
        }
        $catid = intval($_GET['pid']);
        $sql = $conDb->doSelectQuery($conn, "SELECT * FROM tblcategory WHERE id='" . $catid . "' ");
        $row = $sql['data'][0];
        if ($sql['status'] == 1) {
            if ($sql['rows'] == 1) {
?>
//                 <!DOCTYPE html>
//                 <html lang="en">

//                 <head>
//                     <meta charset="UTF-8">
//                     <meta name="viewport" content="width=device-width, initial-scale=1.0">
//                     <title>Document</title>
                    
//                 </head>

//                 <body>
//                     <form method="POST">
//                         <input type="text" name="catname" value="<?php echo htmlentities($row['CategoryName']); ?>">
//                         <textarea name="catdescription" id="" cols="30" rows="10"><?php echo htmlentities($row['Description']); ?></textarea>
//                         <button name="update">update</button>
//                     </form>
//                 </body>

//                 </html>
// <?php
//             } else {
//                 echo "SQL ERROR 402";
//             }
//         } else {
//             echo "SQL ERROR 404";
//         }
//     }
// }
*/
