<?php

require_once __DIR__ . '/Routes/ProductRoutes.php';
use app\Routes\ProductRoutes;

$productRoutes = new ProductRoutes();
$method = $_SERVER['REQUEST_METHOD'];
$path = parse_url( $_SERVER['REQUEST_URI'], PHP_URL_PATH);

var_dump($path);
$productRoutes -> handle($method, $path);
