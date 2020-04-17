<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// require_once('./dbcon.php');
$permissions = [
    "dashboard.php" => ['admin', 'author'],
    "post_manager.php" => ['admin', 'author'],
    "change_image.php" => ['admin', 'author'],
    "add_post.php" => ['admin', 'author'],
    "edit_post.php" => ['admin', 'author'],
];


/**
 * checkPermision function
 *
 * @param string $pageName
 * @param string $role
 * @return bool
 */
function checkPermision($pageName, $role)
{
    global $permissions;
    $roles = $permissions[$pageName];
    for ($i = 0; $i < count($roles); $i++) {
        if ($role == $roles[$i])
            return true;
    }
    return false;
}
