<?php

include __DIR__ . '/../vendor/autoload.php';

use Phroute\Phroute\RouteCollector;
use Phroute\Phroute\Dispatcher;

$collector = new RouteCollector();

$collector->get('/', function(){
    return 'Home Page';
});

$collector->post('products', function(){
    return 'Create Category';
});

$collector->put('items/{id}', function($id){
    return 'Amend Item ' . $id;
});

$dispatcher =  new Dispatcher($collector->getData());

echo $dispatcher->dispatch('GET', '/'), "\n";   // Home Page
echo $dispatcher->dispatch('POST', '/products'), "\n"; // Create Category
echo $dispatcher->dispatch('PUT', '/items/123'), "\n"; // Amend Item 123
