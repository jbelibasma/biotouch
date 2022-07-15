<?php

use Router\Router;
use App\Exceptions\NotFoundException;

require "../vendor/autoload.php";
$router = new Router($_GET['url']);


define('VIEWS', dirname(__DIR__).DIRECTORY_SEPARATOR.'views'.DIRECTORY_SEPARATOR);
define('DB_HOST','localhost');
define('DB_NAME', 'test-oop');
define('DB_USER', 'root');
define('DB_PWD','');
// const pour path view
define('SCRIPTS',dirname($_SERVER['SCRIPT_NAME']).DIRECTORY_SEPARATOR);
// const pour path script
$router->get('/','App\Controllers\PostController@welcome');
$router->get('/posts','App\Controllers\PostController@index');
$router->get('/detail/:id','App\Controllers\PostController@detail');

$router->get('/admin/posts','App\Controllers\Admin\PostController@index');
$router->post('/admin/posts/delete/:id','App\Controllers\Admin\PostController@destroy');
$router->get('/admin/posts/edit/:id','App\Controllers\Admin\PostController@edit');
$router->post('/admin/posts/edit/:id','App\Controllers\Admin\PostController@update');


try {
    $router->run();

}
catch(NotFoundException $e){
    return $e->error404();
}