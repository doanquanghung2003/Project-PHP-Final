<?php
    class Admin {
        private $conn;

        public function __construct($db) {
            $this->conn = $db;
        }

        public function getAdminById($id) {
            $query = "SELECT * FROM admin WHERE id = ?";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1, $id);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        public function createAdmin($username, $email, $password) {
            $query = "INSERT INTO admin (username, email, password) VALUES (:username, :email, :password)";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', password_hash($password, PASSWORD_DEFAULT));
            return $stmt->execute();
        }

        public function updateAdmin($id, $username, $email, $password) {
            $query = "UPDATE admin SET username = :username, email = :email, password = :password WHERE id = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', password_hash($password, PASSWORD_DEFAULT));
            $stmt->bindParam(':id', $id);
            return $stmt->execute();
        }

        public function deleteAdmin($id) {
            $query = "DELETE FROM admin WHERE id = ?";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1, $id);
            return $stmt->execute();
        }

        public function getAdminByEmail($email) {
            $query = "SELECT * FROM admin WHERE email = ?";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1, $email);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
    }
    ?>