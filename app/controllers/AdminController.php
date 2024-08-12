<?php
require_once __DIR__ . '/../models/Admin.php';
require_once __DIR__ . '/../models/Student.php';
require_once __DIR__ . '/../../config/Database.php';

class AdminController {
    private Admin $adminModel;
    private Student $studentModel;

    public function __construct() {
        $database = new Database();
        $db = $database->getConnection();
        $this->adminModel = new Admin($db);
        $this->studentModel = new Student($db);
    }

    // public function login(): void
    
    // {
    //     $conn = mysqli_connect("localhost", "root", "", "php_csdl_bacha");
    //     if (isset($_POST['login'])) {
    //         $email = $_POST['email'];
    //         $pass = $_POST['password'];
    //         $admin = $this->adminModel->getAdminByEmail($email);

    //         if ($email == '' || $pass == "") {
    //             echo "<script>alert('nhập đầy đủ')</script>";
    //         } else {
    //             $sql_select_admin = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email' AND pass = '$pass'");
    //             $num_rows = mysqli_fetch_array($sql_select_admin);
    //             if ($num_rows == 0) {
    //                 echo "<script> alert('tên đăng nhập hoặc mật khẩu không đúng !')</script>";
    //             } else {
    //                 //tiến hành lưu tên đăng nhập vào session để tiện xử lý sau này
    //                 $_SESSION['user_email'] = $num_rows["email"];
    //                 $_SESSION["user_id"] = $num_rows["id"];
                   
    //                 require_once __DIR__ . '/../views/home.php';
    //             }
    //         }
    //     } else {
    //         include_once __DIR__ ."/../../app/views/admin_login.php";
    //     }
    // }

    public function register(): void {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $cpass = $_POST['cpass'];

            if ($password === $cpass) {
                if ($this->adminModel->createAdmin($username, $email, $password)) {
                    echo "Admin registered successfully";
                } else {
                    echo "Error registering admin";
                }
            } else {
                echo "Passwords do not match";
                require_once __DIR__ . '/../views/admin_register.php';
            }
        } else {
            include_once __DIR__ ."/../../app/views/admin_register.php";
        }
    }

    public function editProfile(): void {
        session_start();
        if (!isset($_SESSION['admin_id'])) {
            header("Location: /admin_login.php");
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $id = $_SESSION['admin_id'];

            if ($this->adminModel->updateAdmin($id, $username, $email, $password)) {
                echo "Profile updated successfully";
            } else {
                echo "Error updating profile";
            }
        } else {
            $id = $_SESSION['admin_id'];
            $admin = $this->adminModel->getAdminById($id);
            include_once __DIR__ ."/../../app/views/admin_editProfile.php";
        }
    }

    public function deleteAdmin($id): void {
        if ($this->adminModel->deleteAdmin($id)) {
            echo "Admin deleted successfully";
        } else {
            echo "Error deleting admin";
        }
    }

    // Thêm các phương thức quản lý student
    public function addStudent(): void {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'];
            $age = $_POST['age'];
            $email = $_POST['email'];
            $skills = $_POST['skills'];
            $experience = $_POST['experience'];
            $photo = $_FILES['photo']['name'];
            $target = "/path/to/upload/" . basename($photo);

            if (move_uploaded_file($_FILES['photo']['tmp_name'], $target)) {
                if ($this->studentModel->createStudent($name, $age, $email, $skills, $experience, $photo)) {
                    echo "Student added successfully";
                } else {
                    echo "Error adding student";
                }
            } else {
                echo "Error uploading photo";
            }
        } else {
            include_once __DIR__ ."/../../app/views/admin_addStudent.php";
        }
    }

    public function editStudent($id): void {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'];
            $age = $_POST['age'];
            $email = $_POST['email'];
            $skills = $_POST['skills'];
            $experience = $_POST['experience'];
            $photo = $_FILES['photo']['name'];
            $target = "/path/to/upload/" . basename($photo);

            if (move_uploaded_file($_FILES['photo']['tmp_name'], $target)) {
                if ($this->studentModel->updateStudent($id, $name, $age, $email, $skills, $experience, $photo)) {
                    echo "Student updated successfully";
                } else {
                    echo "Error updating student";
                }
            } else {
                echo "Error uploading photo";
            }
        } else {
            $student = $this->studentModel->getStudentById($id);
            include_once __DIR__ ."/../../app/views/admin_editStudent.php";
        }
    }

    public function deleteStudent($id): void {
        if ($this->studentModel->deleteStudent($id)) {
            echo "Student deleted successfully";
        } else {
            echo "Error deleting student";
        }
    }

    public function viewLogin(){
        require_once __DIR__ . '/../views/admin_login.php';
    }
}
?>