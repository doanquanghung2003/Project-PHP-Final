<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="/phptest/public/css/style1.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/public/assets/css/adminlte.css">
    <link rel="stylesheet" href="/public/assets/css/adminlte.css.map">
    <link rel="stylesheet" href="/public/assets/css/adminlte.min.css">
    <link rel="stylesheet" href="/public/assets/css/adminlte.css.map">
    <link rel="stylesheet" href="/public/assets/css/docs.css">
    <link rel="stylesheet" href="/public/assets/css/highlighter.css">
</head>
<body>
    <div class="container">
        <div class="form-box box">
            <header>Sign Up</header>
            <hr>
            <form action="/register" method="POST">
                <div class="form-box">
                    <div class="input-container">
                        <i class="fa fa-user icon"></i>
                        <input class="input-field" type="text" placeholder="Username" name="username" required>
                    </div>
                    <div class="input-container">
                        <i class="fa fa-envelope icon"></i>
                        <input class="input-field" type="email" placeholder="Email Address" name="email" required>
                    </div>
                    <div class="input-container">
                        <i class="fa fa-lock icon"></i>
                        <input class="input-field password" type="password" placeholder="Password" name="password" required>
                        <i class="fa fa-eye toggle icon"></i>
                    </div>
                    <div class="input-container">
                        <i class="fa fa-lock icon"></i>
                        <input class="input-field" type="password" placeholder="Confirm Password" name="cpass" required>
                        <i class="fa fa-eye icon"></i>
                    </div>
                </div>
                <center><input type="submit" name="register" id="submit" value="Signup" class="btn"></center>
                <div class="links">
                    Already have an account? <a href="login.php">Signin Now</a>
                </div>
            </form>
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