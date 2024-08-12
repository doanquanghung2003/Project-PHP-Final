<?php
class HomeController {
    public function index(): void
    {
        session_start();
        if (!isset($_SESSION['username'])) {
            include __DIR__ . '/../../public/admin_view_login.php';
        } else {
            require_once __DIR__ . '/../app/views/home.php';
        }
    }
}
