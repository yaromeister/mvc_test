<?php 

use PHPUnit\Framework\TestCase;
use App\Connection;

class ConnectionTest extends TestCase{

	function testConnection_ReturnsPDO(){
		$config = require_once("config.test.php");
		$this->assertInstanceOf(\PDO::class, Connection::make($config));
	}
}