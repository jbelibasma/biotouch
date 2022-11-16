<?php

use Router\Router;
use App\Exceptions\NotFoundException;

require "../vendor/autoload.php";
$router = new Router($_GET['url']);


// const pour path view
define('VIEWS', dirname(__DIR__) . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR);
define('DB_HOST', 'localhost');
define('DB_NAME', 'biotouch');
define('DB_USER', 'root');
define('DB_PWD', '');

// const pour path script
define('SCRIPTS', dirname($_SERVER['SCRIPT_NAME']) . DIRECTORY_SEPARATOR);

//user
$router->get('/', 'App\Controllers\PostController@index');
$router->get('/', 'App\Controllers\CategoryController@index');
$router->get('/posts', 'App\Controllers\PostController@product');
$router->get('/detail/:id', 'App\Controllers\PostController@detail');
$router->get('/history', 'App\Controllers\PostController@history');
$router->get('/question/:id', 'App\Controllers\QuestionController@getQuestions');
$router->get('/single_question/:id', 'App\Controllers\QuestionController@getSingleQuestion');
$router->post('/reponse/:id', 'App\Controllers\ReponseController@reponse');
$router->get('/create_question/:id', 'App\Controllers\QuestionController@create_question');
$router->post('/send_question/:id', 'App\Controllers\QuestionController@sendQuestions');

// panier
$router->get('/panier', 'App\Controllers\PostController@panier');
$router->post('/order', 'App\Controllers\OrderlineController@order');
$router->get('/checkout', 'App\Controllers\OrderlineController@checkout');


// register
$router->get('/register', 'App\Controllers\UserController@register');
$router->post('/register', 'App\Controllers\UserController@registerPost');
$router->get('/forgetpw', 'App\Controllers\UserController@forgetpw');
$router->post('/updatepw', 'App\Controllers\UserController@updatepw');

//login
$router->get('/login', 'App\Controllers\UserController@login');
$router->post('/login', 'App\Controllers\UserController@loginPost');
//logout
$router->get('/logout', 'App\Controllers\UserController@logout');


//admin

//post
$router->get('/admin/posts', 'App\Controllers\Admin\PostController@index');
$router->post('/admin/posts/delete/:id', 'App\Controllers\Admin\PostController@destroy');
$router->get('/admin/posts/edit/:id', 'App\Controllers\Admin\PostController@edit');
$router->post('/admin/posts/edit/:id', 'App\Controllers\Admin\PostController@update');
$router->get('/admin/posts/create', 'App\Controllers\Admin\PostController@create');
$router->post('/admin/posts/create', 'App\Controllers\Admin\PostController@createPost');

//category
$router->get('/admin/categories', 'App\Controllers\Admin\CategoryController@index');
$router->post('/admin/categories/delete/:id', 'App\Controllers\Admin\CategoryController@destroy');
$router->get('/admin/categories/edit/:id', 'App\Controllers\Admin\CategoryController@edit');
$router->post('/admin/categories/edit/:id', 'App\Controllers\Admin\CategoryController@update');
$router->get('/admin/categories/create', 'App\Controllers\Admin\CategoryController@create');
$router->post('/admin/categories/create', 'App\Controllers\Admin\CategoryController@createCategory');



//run
try {
    $router->run();
} catch (NotFoundException $e) {
    return $e->error404();
}
