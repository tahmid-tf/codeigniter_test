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