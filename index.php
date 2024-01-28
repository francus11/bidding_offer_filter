<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path, PHP_URL_PATH);

Router::get('', 'DefaultController');
Router::get('offers', 'PatternController');
Router::get('favourite', 'PatternController');
Router::get('patterns', 'PatternController');
Router::get('login', 'SecurityController');
Router::get('logout', 'SecurityController');
Router::get('account', 'SecurityController');
Router::get('cat', 'APIController');
Router::get('api', 'APIController');



Router::post('login', 'SecurityController');
Router::post('register', 'SecurityController');
Router::post('new_pattern', 'PatternController');

Router::run($path);
