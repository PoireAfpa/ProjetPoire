<?php
// test 2 naima
require_once __DIR__ . '/../vendor/autoload.php';

// Debogger
//$whoops = new \Whoops\Run;
//$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
//$whoops->register();


// TODO organiser la partie configuration
$config = parse_ini_file(__DIR__ . "/../config.ini");
define('BASE_URI', $config['base_uri']);



// Router
use App\core\Router;

$router = new Router();


/************ /Routes *************/
$router->register('/home', '\App\controller\DefaultController::afficherHome');
//$router->register("/", '\App\controller\defaultController::afficherHome'); CA MARCHE PAS
$router->register('/login', '\App\controller\userController::afficherLogin');
$router->register('/logout', '\App\controller\userController::afficherLogout');
$router->register('/dashboard', '\App\controller\userController::afficherDashboard');
$router->register('/test', '\App\controller\userController::afficherTest');
$router->run();


//test
//test 2