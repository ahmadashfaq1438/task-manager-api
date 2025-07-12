<?php 

require_once __DIR__ . '/vendor/autoload.php';

use Src\Core\Router;

$router = new Router();
$router->dispatch();

?>
