<?php 
require_once 'Connection.php';
require_once 'CsvFile.php';
require_once 'User.php';


$pdo = Connection::make();


$user = new User;
$model = new CsvFile($pdo, FILEPATH, $user);
$model->add();

