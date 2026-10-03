<?php

namespace App\Models;

use PDO;
use Ramsey\Uuid\Uuid;

class User
{
    public function __construct(private PDO $db) {}

    public function findAll(): array
    {
        $sql = "SELECT id, username, created_at FROM users";

        $stmt = $this->db->query($sql);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function findById(string $id): array|false
    {
        $sql = "SELECT id, username, created_at FROM users WHERE id = ?";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);

        return $stmt->fetch();
    }

    public function findByUsername(string $username): array|false
    {
        $sql = "SELECT id, username, created_at FROM users WHERE username = :username";

        $stmt = $this->db->prepare($sql);
        $stmt->execute(["username" => $username]);

        return $stmt->fetch();
    }

    public function create(string $username, string $password_raw): string|false
    {
        $id = Uuid::uuid4()->toString();
        $password_hash = password_hash($password_raw, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (id, username, password_hash) VALUES (:id, :username, :password_hash)";

        $stmt = $this->db->prepare($sql);
        $action = $stmt->execute([
            "id" => $id,
            "username" => $username,
            "password_hash" => $password_hash
        ]);

        if ($action) {
            return $id;
        }

        return false;
    }

    public function delete(string $id): bool
    {
        $sql = "DELETE FROM users WHERE id = :id";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            "id" => $id
        ]);

        return $stmt->rowCount() > 0;
    }
}
