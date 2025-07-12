<?php
namespace Src\Models;

use PDO;
use Src\Database\DB;

class Task
{
    public static function all(): array
    {
        $stmt = DB::connect()->query("SELECT id,title, description, status FROM ftb_task_manager order by id DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function find(int $id): ?array
    {
        $stmt = DB::connect()->prepare("SELECT id,title, description, status FROM ftb_task_manager WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }

    public static function create(array $data): bool
    {
        $stmt = DB::connect()->prepare("INSERT INTO ftb_task_manager (title, description, status,created_at) VALUES (?, ?, ?, ?)");
        return $stmt->execute([$data['title'], $data['description'], $data['status'] ?? 'open',date('Y-m-d H:i:s')]);
    }

    public static function update(int $id, array $data): bool
    {
        $stmt = DB::connect()->prepare("UPDATE ftb_task_manager SET title = ?, description = ?, status = ?, updated_at = ? WHERE id = ?");
        return $stmt->execute([$data['title'], $data['description'], $data['status'], date('Y-m-d H:i:s'), $id]);
    }

    public static function delete(int $id): bool
    {
        $stmt = DB::connect()->prepare("DELETE FROM ftb_task_manager WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
?>