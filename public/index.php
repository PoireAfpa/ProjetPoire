<?php
// test 2 naima
require_once __DIR__ .'/../vendor/autoload.php';

$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();


// TODO organiser la partie configuration
$config = parse_ini_file(__DIR__ . "/../config.ini");
define('BASE_URI', $config['base_uri']);



// Router
use App\core\Router;

$router = new Router();



/************ /Routes *************/
//$router->register("/", '\App\controller\defaultController::afficherHome'); CA MARCHE PAS
$router->register('/home', '\App\controller\DefaultController::afficherHome');
$router->register('/login', '\App\controller\UsersController::afficherLogin');
$router->register('/logout', '\App\controller\UsersController::afficherLogout');
$router->register('/dashboard', '\App\controller\UsersController::afficherDashboard');
$router->register('/contact', '\App\controller\UsersController::afficherTest');
$router->register('/dahsboard/add-client', '\App\controller\ClientsController::addClient');
$router->register('/dahsboard/list-client', '\App\controller\ClientsController::list');
$router->run();


//test
//test 2