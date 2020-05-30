<?php 

return [
	'dsn'=>'mysql:host=localhost;dbname=testdb',
	'user'=>'root',
	'paswd'=>'root',
	'options'=>[
		PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
		PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
		PDO::ATTR_EMULATE_PREPARES => false
	]
];