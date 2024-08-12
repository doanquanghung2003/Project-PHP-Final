<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student</title>
    <link rel="stylesheet" href="/phptest/public/css/style1.css">
</head>
<body>
    <div class="container">
        <div class="form-box box">
            <header>Edit Student</header>
            <form action="/admin_editStudent.php?id=<?php echo $student['id']; ?>" method="POST" enctype="multipart/form-data">
                <div class="form-box">
                    <div class="input-container">
                        <input class="input-field" type="text" placeholder="Name" name="name" value="<?php echo $student['name']; ?>" required>
                    </div>
                    <div class="input-container">
                        <input class="input-field" type="number" placeholder="Age" name="age" value="<?php echo $student['age']; ?>" required>
                    </div>
                    <div class="input-container">
                        <input class="input-field" type="email" placeholder="Email" name="email" value="<?php echo $student['email']; ?>" required>
                    </div>
                    <div class="input-container">
                        <input class="input-field" type="text" placeholder="Skills" name="skills" value="<?php echo $student['skills']; ?>" required>
                    </div>
                    <div class="input-container">
                        <input class="input-field" type="text" placeholder="Experience" name="experience" value="<?php echo $student['experience']; ?>" required>
                    </div>
                    <div class="input-container">
                        <input class="input-field" type="file" name="photo">
                    </div>
                </div>
                <center><input type="submit" name="edit" id="submit" value="Edit Student" class="btn"></center>
            </form>
        </div>
    </div>
</body>
</html>