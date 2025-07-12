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

    public function update(int $id): void
    {
        $data = json_decode(file_get_contents('php://input'), true);
        echo json_encode(Task::update($id, $data));
    }

    public function delete(int $id): void
    {
        echo json_encode(Task::delete($id));
    }
}

?>