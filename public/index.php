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
/************ Routes *************/
$router->register('/post/#id', '\App\controller\TestController::index');

/************ /Routes *************/
//$router = new Router();
//$router->register('/', '\App\controller\DefaultController::index');
$router->run();


//test
//test 2