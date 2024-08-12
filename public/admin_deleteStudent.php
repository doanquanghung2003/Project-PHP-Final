<?php
include_once "../app/controllers/AdminController.php";
$id = $_GET['id'];
(new AdminController)->deleteStudent($id);