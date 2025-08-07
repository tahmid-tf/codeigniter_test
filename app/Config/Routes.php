<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'BaseIndexController::index');


// ------------------ register data ------------------

$routes->post('/register', 'BaseIndexController::registration_form');

// ------------------ retrieving user data ------------------

$routes->get('/user_data', 'BaseIndexController::user_data');

// ------------------ Authentication routes ------------------
$routes->post('/login', 'AuthController::login');
$routes->get('/user', 'AuthController::user');
$routes->get('/logout', 'AuthController::logout');

// ------------------ update user data ------------------

$routes->post('update-user', 'BaseIndexController::updateUser');

// ------------------ blood group api ------------------

$routes->get('blood_group_api_data', 'ApiDataController::blood_group_api_data');
$routes->get('districts_api_data', 'ApiDataController::districts_api_data');
$routes->get('thana_api_data', 'ApiDataController::thana_api_data');

$routes->get('/thana_by_district_api_data', 'ApiDataController::thana_by_district_api_data');






