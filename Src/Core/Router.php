<?php
namespace Src\Core;

class Router
{
    public function dispatch(): void
    {
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $method = $_SERVER['REQUEST_METHOD'];

        // Route: /tasks, /tasks/1
        if (preg_match('/^\/tasks(?:\/(\d+))?$/', $uri, $matches)) {
            $controller = new \Src\Controllers\TaskController();

            if ($method === 'GET' && !isset($matches[1])) {
                $controller->index();
            } elseif ($method === 'GET' && isset($matches[1])) {
                $controller->show((int) $matches[1]);
            } elseif ($method === 'POST') {
                $controller->store();
            } elseif ($method === 'PUT' && isset($matches[1])) {
                $controller->update((int) $matches[1]);
            } elseif ($method === 'DELETE' && isset($matches[1])) {
                $controller->delete((int) $matches[1]);
            } else {
                http_response_code(405);
                echo json_encode(["message" => "Method Not Allowed"]);
            }
            return;
        }

        http_response_code(404);
        echo json_encode(["message" => "Route Not Found"]);
    }
}
?>