<?php
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use Cake\Routing\Route\DashedRoute;

Router::plugin(
    'Examination',
    ['path' => '/examination'],
    function (RouteBuilder $routes) {
        $routes->fallbacks(DashedRoute::class);
    }
);

// Router::scope('/Examination', ['plugin' => 'Examination'], function (RouteBuilder $routes) {
//     $routes->connect('/', ['controller' => 'Examinations']);
// });
