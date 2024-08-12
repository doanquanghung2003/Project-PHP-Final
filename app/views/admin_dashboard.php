<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="/phptest/public/css/style1.css">
</head>
<body>
    <div class="container">
        <div class="dashboard-box box">
            <header>Admin Dashboard</header>
            <hr>
            <div class="dashboard-content">
                <div class="dashboard-item">
                    <a href="/admin_addStudent.php">Add Student</a>
                </div>
                <div class="dashboard-item">
                    <a href="/admin_editStudent.php">Edit Student</a>
                </div>
                <div class="dashboard-item">
                    <a href="/admin_deleteStudent.php">Delete Student</a>
                </div>
            </div>
            <div class="links">
                <a href="/admin_profile.php">Profile</a> | 
                <a href="/logout.php">Logout</a>
            </div>
        </div>
    </div>
</body>
</html>