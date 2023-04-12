<?php

set_error_handler(function (int $errno, string $errstr, string $errfile, int $errline) {
    throw new \Exception($errstr, $errno, $errfile, $errline);
});

set_exception_handler(function ($exception) {
    header('Content-Type: text/plain');
    var_dump($exception);
    exit();
});

spl_autoload_register(function ($class): void {
    $file = __DIR__ . DIRECTORY_SEPARATOR . str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';
    if (file_exists($file)) {
        require_once($file);
    }
});

$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$routes = [
    '/teste' => "Test",
    '/' => "Home"
];

$input = array_merge($_GET ?? [], $_POST ?? [], json_decode(file_get_contents('php://input'), true) ?? []);

if (array_key_exists($url, $routes)) {
    call_user_func(['\\Controller\\' . $routes[$url], 'execute']);
} else {
    throw new \Exception('A rota especificada não foi encontrada');
}
