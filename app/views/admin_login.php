<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "php_csdl_bacha");

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $pass = $_POST['password'];

    if ($email == '' || $pass == "") {
        echo "<script>alert('nhập đầy đủ')</script>";
    } else {
        $sql_select_admin = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email' AND password = '$pass'");
        $num_rows = mysqli_fetch_array($sql_select_admin);
        if ($num_rows == 0) {
            echo "<script> alert('tên đăng nhập hoặc mật khẩu không đúng !')</script>";
        } else {
            $_SESSION['user_email'] = $num_rows["email"];
            $_SESSION["user_id"] = $num_rows["id"];
            header("Location: home.php");
            exit();
        }
    }
}

if (isset($_SESSION['user_id'])) {
    header("Location: home.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | User Profile</title>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="../../public/assets/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="../../public/assets/css/adminlte.css">
    <link rel="stylesheet" href="../../public/assets/css/adminlte.css.map">
    <link rel="stylesheet" href="../../public/assets/css/adminlte.min.css">
    <link rel="stylesheet" href="../../public/assets/css/adminlte.css.map">
    <link rel="stylesheet" href="../../public/assets/css/docs.css">
    <link rel="stylesheet" href="../../public/assets/css/highlighter.css">
</head>

<body>
    <div class="container">
        <div class="form-box box">
            <header>Login</header>
            <hr>
            <form action="admin_login.php" method="POST">
                <div class="form-box">
                    <div class="input-container">
                        <i class="fa fa-envelope icon"></i>
                        <input class="input-field" type="text" placeholder="Email Address" name="email">
                    </div>
                    <div class="input-container">
                        <i class="fa fa-key icon"></i>
                        <input class="input-field password" type="password" placeholder="Password" name="password">
                        <i class="fa fa-eye toggle"></i>
                    </div>
                    <div class="input-container">
                        <input type="checkbox" name="remember"> Remember me
                        <a href="#">Forgot password</a>
                    </div>
                    <button type="submit" name="login">Login</button>
                </div>
            </form>
            <div class="links">
                Don't have an account? <a href="register.php">Signup Now</a>
            </div>
        </div>
    </div>
    <script>
        const toggle = document.querySelector(".toggle"),
            input = document.querySelector(".password");
        toggle.addEventListener("click", () => {
            if (input.type === "password") {
                input.type = "text";
                toggle.classList.replace("fa-eye-slash", "fa-eye");
            } else {
                input.type = "password";
            }
        })
    </script>
</body>

</html>