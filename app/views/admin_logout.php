<?php
session_start();
unset($_SESSION['user_id']);

header("Location: admin_login.php");
exit();