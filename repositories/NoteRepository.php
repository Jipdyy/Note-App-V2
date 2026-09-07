<?php
require_once __DIR__ . '/../models/Note.php';

class NoteRepository {
    private PDO $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    public function allByUser(int $userId): array {
        $stmt = $this->db->prepare("SELECT * FROM notes WHERE user_id = ?");
        $stmt->execute([$userId]);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return array_map(function($row) {
            return new Note($row['id'], $row['title'], $row['content']);
        }, $rows);
    }

    public function find(int $id, int $userId): ?Note {
        $stmt = $this->db->prepare("SELECT * FROM notes WHERE id = ? AND user_id = ?");
        $stmt->execute([$id, $userId]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            return new Note($row['id'], $row['title'], $row['content']);
        } else {
            return null;
        }
    }

    public function create(int $userId, string $title, string $content): Note{
        $stmt = $this->db->prepare("INSERT INTO notes (user_id, title, content) VALUES (?, ?, ?)");
        $stmt->execute([$userId, $title, $content]);
        $newId = (int) $this->db->lastInsertId();
        return new Note($newId, $title, $content);
    }

    public function update(int $id, int $userId, string $title, string $content): bool {
        $stmt = $this->db->prepare("UPDATE notes SET title = ?, content = ? WHERE id = ? AND user_id =?");
        return $stmt->execute([$title, $content, $id, $userId]);
    }

    public function delete(int $id, int $userId): bool {
        $stmt = $this->db->prepare("DELETE FROM notes WHERE id = ? AND user_id = ?");
        return $stmt->execute([$id, $userId]);
    }

}
