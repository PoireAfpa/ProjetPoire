<?php

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
//$router->register("/", '\App\controller\defaultController::afficherHome');
$router->register('/home', '\App\controller\DefaultController::afficherHome');
$router->register('/login', '\App\controller\UsersController::afficherLogin');
$router->register('/logout', '\App\controller\UsersController::afficherLogout');
$router->register('/dashboard', '\App\controller\UsersController::afficherDashboard');
$router->register('/contact', '\App\controller\UsersController::afficherTest');
$router->register('/dahsboard/user/list', '\App\controller\UsersController::list');

$router->register('/dahsboard/user/edit/#iduser', '\App\controller\UsersController::edit');
$router->register('/dahsboard/user/delete/#iduser', '\App\controller\UsersController::delete');

$router->register('/dahsboard/client/list', '\App\controller\ClientsController::list');
$router->register('/dahsboard/client/add', '\App\controller\ClientsController::add');
$router->register('/dahsboard/client/edit/#idclient', '\App\controller\ClientsController::edit');
$router->register('/dahsboard/projet/edit/#codeprojet', '\App\controller\ProjetsController::edit');
$router->register('/dahsboard/contact/edit/#idcontact', '\App\controller\ContactsController::edit');

$router->register('/dahsboard/user/delete/#iduser', '\App\controller\UsersController::delete');
$router->register('/dahsboard/client/delete/#idclient', '\App\controller\ClientsController::delete');
$router->register('/dahsboard/projet/delete/#codeprojet', '\App\controller\ProjetsController::delete');
$router->register('/dahsboard/contact/delete/#idcontact', '\App\controller\ContactsController::delete');

$router->run();