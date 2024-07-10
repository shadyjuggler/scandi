<?php

require_once __DIR__ . '/../config/headers.php';

require_once __DIR__ . '/../vendor/autoload.php';


$dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r) {
    $r->post('/graphql', [App\Controller\GraphQL::class, 'handle']);
});

$routeInfo = $dispatcher->dispatch(
    $_SERVER['REQUEST_METHOD'],
    $_SERVER['REQUEST_URI']
);

switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        // ... 404 Not Found
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        // ... 405 Method Not Allowed
        break;
    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];
        echo $handler($vars);
        break;
}

// use App\Models\DB;
// use App\Models\Entities\Product;
// use App\Models\Entities\Category;
// use App\Models\Entities\AttributeSet;
// use App\Models\Entities\AttributeItems;
// use App\Models\Entities\Prices;
// use App\Models\Entities\Galleries;
// use App\Models\Entities\Gallery;

// $config = [
//     'host' => 'localhost',
//     'database' => 'scandiweb',
//     'username' => 'root',
//     'password' => ''
// ];

// DB::init($config);

// $type = "text";


// // $obj = ProductModel::getAll();
// $obj = Gallery::getOneUrlByProductId("jacket-canada-goosee");
// // $obj = Category::getAll();
// // $obj = Category::getById("all");
// // $obj = AttributeSet::getAllByProductId("ps-5");
// // $obj = AttributeItems::getById(3);

// // $obj = Galleries::getUrlByProductId("ps-5");
// // $obj = Prices::getByProductId("ps-5");

// echo "<pre>";
// var_dump($obj);
// echo "<pre>";


