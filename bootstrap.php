<?php 
use App\Connection;
use App\Models\User;
use App\Controllers\CSVController;

require_once "vendor/autoload.php";

$config = require_once 'config.php';

$user = new User(Connection::make($config));
$controller = new CSVController($user);
