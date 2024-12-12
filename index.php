<?php
require('assets/helper/fonctions.php');
require('database/db.php');

$uri= parse_url($_SERVER['REQUEST_URI'])['path'];

// dd($uri);

$routes = [
    '/'=>'controllers/index.php',
    '/packages'=>'controllers/packages.php',
    '/package'=>'controllers/package.php',
    '/admin'=>'controllers/form.php',
];

if(array_key_exists($uri,$routes)){
    require $routes[$uri];
}else{
    require 'views/404.php';
};