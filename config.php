<?php

session_start();

define('BURL', 'http://localhost:9000/');
define('BURLA', 'http://localhost:9000/admin/');
define('ASSETS', 'http://localhost:9000/assets/');

define('BL', __DIR__ . '/');
define('BLA', __DIR__ . '/admin/');


// connection to database
require_once BL . 'functions/db.php';

?>