<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'BaseIndexController::index');


// ------------------ register data ------------------

$routes->post('/register', 'BaseIndexController::registration_form');

// ------------------ retriving user data ------------------

$routes->get('/user_data', 'BaseIndexController::user_data');

// ------------------ Authentication routes ------------------
$routes->post('/login', 'AuthController::login');
$routes->get('/user', 'AuthController::user');
$routes->get('/logout', 'AuthController::logout');

// ------------------ update user data ------------------

$routes->post('update-user', 'BaseIndexController::updateUser');

