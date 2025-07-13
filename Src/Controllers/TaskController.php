<?php
namespace Src\Controllers;

use Src\Models\Task;
use Src\Core\Request;

class TaskController
{
    public function index(): void
    {
        echo json_encode(Task::all());
    }

    public function show(int $id): void
    {
        echo json_encode(Task::find($id));
    }

    public function store(): void
    {
        $data = json_decode(file_get_contents('php://input'), true);
        echo json_encode(Task::create($data));
    }

    public function update($id)
    {
        $data = json_decode(file_get_contents("php://input"), true);

        if (!is_array($data)) {
            http_response_code(400);
            echo json_encode(["message" => "Invalid request body"]);
            return;
        }

        $task = new \Src\Models\Task();
        if ($task->update($id, $data)) {
            echo json_encode(["message" => "Task updated successfully"]);
        } else {
            http_response_code(500);
            echo json_encode(["message" => "Failed to update task"]);
        }
    }


    public function delete(int $id): void
    {
        echo json_encode(Task::delete($id));
    }
}

?>