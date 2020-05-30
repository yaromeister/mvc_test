<?php 
require 'bootstrap.php';
include 'app/Views/header.view';
include 'app/Views/form.view';

if($_SERVER['REQUEST_METHOD']=="GET"){
	
	$controller->show();
}

if($_SERVER['REQUEST_METHOD'] == "POST"){
	$controller->insert();
}


include 'app/Views/footer.view';