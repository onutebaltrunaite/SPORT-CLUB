<?php
require_once '../vendor/autoload.php';


use app\controller\SiteController;
use app\controller\FeedbackController;
use app\core\Application;
use app\core\AuthController;

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

$config =[
    'db' => [
        'dsn' => $_ENV['DB_DSN'],
        'user' => $_ENV['DB_USER'],
        'password' => $_ENV['DB_PASSWORD']
    ]
];

$app = new Application(dirname(__DIR__), $config);

$app->router->get('/', [SiteController::class, 'home']);
$app->router->get('/about', [SiteController::class, 'about']);
$app->router->get('/contact', [SiteController::class, 'contact']);
$app->router->post('/contact', [SiteController::class, 'handleContact']);
// routes for login and register
$app->router->get('/login', [AuthController::class, 'login']);
$app->router->post('/login', [AuthController::class, 'login']);

$app->router->get('/register', [AuthController::class, 'register']);
$app->router->post('/register', [AuthController::class, 'register']);

$app->router->get('/logout', [AuthController::class, 'logout']);

$app->router->get('/feedbacks', [FeedbackController::class, 'feedbacks']);

$app->run();