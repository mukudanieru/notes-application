<?php

namespace App\Models;

use PDO;

class Note
{
    public function __construct(
        private PDO $db
    ) {}

    public function findAllWithUser(): ?array
    {
        $sql = "SELECT 
                    u.username, n.title, n.content, n.created_at, n.updated_at 
                FROM users AS u
                RIGHT JOIN notes AS n
                    ON u.id = n.user_id";

        $stmt = $this->db->query($sql);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function findByUserId(string $userId): ?array
    {
        $sql = "SELECT * FROM notes WHERE user_id = :user_id";

        $stmt = $this->db->prepare($sql);
        $stmt->execute(["user_id" => $userId]);

        return $stmt->fetchAll();
    }

    public function create(string $userId, string $title, string $content): string|false
    {
        $sql = "INSERT INTO notes 
            (user_id, title, content)
            VALUES (:user_id, :title, :content)";

        $stmt = $this->db->prepare($sql);
        $action = $stmt->execute([
            "user_id" => $userId,
            "title" => $title,
            "content" => $content
        ]);

        if ($action) {
            return $this->db->lastInsertId();
        }

        return false;
    }

    public function delete(string $noteId): bool
    {
        $sql = "DELETE FROM notes WHERE id = :id";

        $stmt = $this->db->prepare($sql);
        $stmt->execute(
            ["id" => $noteId]
        );

        return $stmt->rowCount() > 0;
    }
}
