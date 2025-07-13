<?php
namespace Src\Models;

use PDO;
use Src\Database\DB;

class Task
{   
    // for task list
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
    // for add new task
    public static function create(array $data): bool
    {
        $stmt = DB::connect()->prepare("INSERT INTO ftb_task_manager (title, description, status,created_at) VALUES (?, ?, ?, ?)");
        return $stmt->execute([$data['title'], $data['description'], $data['status'] ?? 'open',date('Y-m-d H:i:s')]);
    }

    // for update task
    public function update($id, $data)
    {
        $db = (new DB())->connect();

        $fields = [];
        $params = [];

        if (isset($data['status'])) {
            $fields[] = 'status = ?';
            $params[] = $data['status'];
        }

        if (isset($data['title'])) {
            $fields[] = "title = ?";
            $params[] = $data['title'];
        }

        if (isset($data['description'])) {
            $fields[] = "description = ?";
            $params[] = $data['description'];
        }

        if (isset($data['status'])) {
            $fields[] = "status = ?";
            $params[] = $data['status'];
        }

        if (empty($fields)) {
            http_response_code(400);
            echo json_encode(["message" => "No data provided"]);
            return;
        }
        $sql = "UPDATE ftb_task_manager SET " . implode(', ', $fields) . " WHERE id = ?";
        $params[] = $id;
        $stmt = $db->prepare($sql);
        return $stmt->execute($params);
    }


    // for task delete
    public static function delete(int $id): bool
    {
        $stmt = DB::connect()->prepare("DELETE FROM ftb_task_manager WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
?>