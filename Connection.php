<?php 
require_once 'config.php';

class Connection{
	private static $pdo;
	
	public static function make()
	{

		if(self::$pdo==null){
			try{
				self::$pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);

				self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				
				echo "Success ";
				
			}catch(PDOException $e){
				echo "Couldn't establish connection" . $e->getMessage();
			}
		}

		return self::$pdo;
	}
}