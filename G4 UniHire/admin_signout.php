<?php
session_start();
session_destroy(); 

header("Location: admin_login_page.php");
?>
