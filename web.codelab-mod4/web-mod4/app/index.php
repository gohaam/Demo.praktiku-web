<?php 

header("Content-Type: application/json; charset=UTF-8");

require __DIR__ .'/../app/Routes/ProductRoutes.php';
//require "app/Routes/ProductRoutes.php";
//include "app/Routes/ProductRoutes.php";

use app\Routes\ProductRoutes;


$method = $_SERVER['REQUEST_METHOD'];

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
var_dump($method, $path);

$productRoutes = new ProductRoutes();
$productRoutes->handle($method, $path);