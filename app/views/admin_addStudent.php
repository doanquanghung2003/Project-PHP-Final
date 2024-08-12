<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student</title>
    <link rel="stylesheet" href="/phptest/public/css/style1.css">
</head>
<body>
    <div class="container">
        <div class="form-box box">
            <header>Add Student</header>
            <form action="/admin_addStudent.php" method="POST" enctype="multipart/form-data">
                <div class="form-box">
                    <div class="input-container">
                        <input class="input-field" type="text" placeholder="Name" name="name" required>
                    </div>
                    <div class="input-container">
                        <input class="input-field" type="number" placeholder="Age" name="age" required>
                    </div>
                    <div class="input-container">
                        <input class="input-field" type="email" placeholder="Email" name="email" required>
                    </div>
                    <div class="input-container">
                        <input class="input-field" type="text" placeholder="Skills" name="skills" required>
                    </div>
                    <div class="input-container">
                        <input class="input-field" type="text" placeholder="Experience" name="experience" required>
                    </div>
                    <div class="input-container">
                        <input class="input-field" type="file" name="photo" required>
                    </div>
                </div>
                <center><input type="submit" name="add" id="submit" value="Add Student" class="btn"></center>
            </form>
        </div>
    </div>
</body>
</html>