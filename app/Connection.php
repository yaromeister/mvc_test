<?php 
namespace App;

class Connection{

	public static function make($config)
	{
			try{
				$pdo = new \PDO($config['dsn'], $config['user'], $config['paswd'], $config['options']);

			}catch(PDOException $e){
				echo "Couldn't establish connection";
				throw new \PDOException($e->getMessage(), $e->getCode());
			}
		
		return $pdo;
	}
}