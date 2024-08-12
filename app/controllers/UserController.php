<?php
require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../../config/Database.php';

class UserController {
    private User $userModel;

    public function __construct() {
        $database = new Database();
        $db = $database->getConnection();
        $this->userModel = new User($db);
    }

    public function login(): void
    {
        if (isset($_POST['login'])) {
            $email = $_POST['email'];
            $pass = $_POST['password'];
            $user = $this->userModel->getUserByEmail($email);

            if ($user && password_verify($pass, $user['password'])) {
                $_SESSION['id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                header("location: home.php");
                exit();
            } else {
                $message = "Wrong Email or Password";
                require_once __DIR__ . '/../views/login.php';
            }
        } else {
            include_once  __DIR__ ."/../../app/views/login.php";
        }
    }

    public function register(): void
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $cpass = $_POST['cpass'];

            if ($password === $cpass) {
                if ($this->userModel->createUser($username, $email, $password)) {
                    echo "User registered successfully";
                } else {
                    echo "Error registering user";
                }
            } else {
                echo "Passwords do not match";
                require_once __DIR__ . '/../views/register.php';
            }
        } else {
            include_once __DIR__ ."/../../app/views/register.php";
        }
    }

    public function editProfile(): void
    {
        session_start();
        if (!isset($_SESSION['id'])) {
            header("Location: /login.php");
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $id = $_SESSION['id'];

            if ($this->userModel->updateUser($id, $username, $email, $password)) {
                echo "Profile updated successfully";
            } else {
                echo "Error updating profile";
            }
        } else {
            $id = $_SESSION['id'];
            $user = $this->userModel->getUserByEmail($id);
            include_once __DIR__ ."/../../app/views/editProfile.php";
        }
    }
}
?>