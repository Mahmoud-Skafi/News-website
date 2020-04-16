<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$permissions = [
    "dashboard.php" => ['Admin', 'Authors'],
    "post_manager.php" => ['Admin'],
    "change_image.php" => ['Admin'],
    "add_post.php" =>['Admin'],
    "edit_post.php" =>['Admin'],
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
