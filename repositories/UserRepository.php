<?php
require_once __DIR__ . '/../models/User.php';

class UserRepository {
    private PDO $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    public function findByUsername(string $username): ?User {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE username = ?");
        if ($stmt->execute([$username])) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($row) {
                return new User($row['id'], $row['username'], $row['password']);
            }
            return null;
        }
        return null;
    }

    public function create(string $username, string $hashedPassword): User {
        $stmt = $this->db->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
        $stmt->execute([$username, $hashedPassword]);
        return new User((int)$this->db->lastInsertId(), $username, $hashedPassword);
    }
}
