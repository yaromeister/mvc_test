<?php 
require_once 'Connection.php';
require_once 'CsvFile.php';
require_once 'User.php';
require_once 'View.php';
require_once 'Controller.php';




$pdo = Connection::make();


$user = new User;
$model = new CsvFile($pdo, $user);


echo View::output($model);


