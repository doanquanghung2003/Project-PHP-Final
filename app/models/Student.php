<?php
class Student {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function createStudent($name, $age, $email, $skills, $experience, $photo) {
        $query = "INSERT INTO student (name, age, email, skills, experience, photo) VALUES (:name, :age, :email, :skills, :experience, :photo)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':age', $age);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':skills', $skills);
        $stmt->bindParam(':experience', $experience);
        $stmt->bindParam(':photo', $photo);
        return $stmt->execute();
    }

    public function updateStudent($id, $name, $age, $email, $skills, $experience, $photo) {
        $query = "UPDATE student SET name = :name, age = :age, email = :email, skills = :skills, experience = :experience, photo = :photo WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':age', $age);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':skills', $skills);
        $stmt->bindParam(':experience', $experience);
        $stmt->bindParam(':photo', $photo);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function deleteStudent($id) {
        $query = "DELETE FROM student WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id);
        return $stmt->execute();
    }

    public function getStudentById($id) {
        $query = "SELECT * FROM student WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>