<?php

use CodeIgniter\Router\RouteCollection;

/**
* @var RouteCollection $routes
*/
$routes->get('/', 'Home');
$routes->get('/login', 'UserController::login');
$routes->get('/signup', 'UserController::signup');
$routes->post('/register', 'UserController::register');
$routes->post('/login', 'UserController::authenticate');
$routes->get('/user/dashboard', 'UserController::dashboard');
$routes->get('/logout', 'UserController::logout');

$routes->get('search', 'SearchController::index');

$routes->get('/checkout', 'CheckoutController::index');
$routes->post('/checkout/process', 'CheckoutController::process');
$routes->get('/checkout/confirmation', 'CheckoutController::confirmation');

$routes->get('/games', 'GameController::index');
$routes->get('/games/(:num)', 'GameController::details/$1');
$routes->get('genre/(:any)', 'GameController::genre/$1');

$routes->get('/cart', 'CartController::index');
$routes->get('/cart/add/(:num)', 'CartController::add/$1');
$routes->get('/cart/remove/(:num)', 'CartController::remove/$1');
$routes->get('/cart/clear', 'CartController::clear');