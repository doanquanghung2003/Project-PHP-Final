<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    header("Location: admin_login.php");
}
include_once "../app/views/admin_dashboard.php";