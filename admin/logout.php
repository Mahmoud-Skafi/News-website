<?php
session_start();
require_once('./config/connect.php');
$_SESSION['login']=="";
session_unset();
session_destroy();

?>
<script language="javascript">
document.location="login.php";
</script>
