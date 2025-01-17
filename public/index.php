<?php

use App\Exceptions\NotFoundException;
use Router\Router;

//use Router\Router;

require '../vendor/autoload.php';

define('VIEWS', dirname(__DIR__) . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR);

define('SCRIPTs', dirname($_SERVER['SCRIPT_NAME']). DIRECTORY_SEPARATOR);
define('DB_NAME','myapp');
define('DB_HOST','127.0.0.1');
define('DB_USER','root');
define('DB_PWD','');
//var_dump($_GET['url']);
$router = new Router($_GET['url']);


$router->get('/','App\Controllers\BlogController@welcome');
$router->get('/posts','App\Controllers\BlogController@index');
$router->get('/posts/:id','App\Controllers\BlogController@show');
$router->get('/tags/:id','App\Controllers\BlogController@tags');
$router->get('/admin/posts','App\Controllers\Admin\PostController@index');
$router->get('/admin/posts/delete/:id','App\Controllers\Admin\PostController@destroy');
$router->get('/admin/posts/edit/:id','App\Controllers\Admin\PostController@edit');
$router->post('/admin/posts/edit/:id','App\Controllers\Admin\PostController@update');
$router->get('/admin/posts/create','App\Controllers\Admin\PostController@create');
$router->post('/admin/posts/create','App\Controllers\Admin\PostController@store');
$router->get('/login','App\Controllers\UserController@login');
$router->post('/login','App\Controllers\UserController@loginPost');
$router->get('/logout','App\Controllers\UserController@logout');

try {
    $router->run();
} catch (NotFoundException $e) {
    return $e->error404();
}

