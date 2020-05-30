<?php 
namespace App\Models;

class User{
	private $pdo;

	function __construct(\PDO $pdo){
		$this->pdo = $pdo;
	}

	function insert($row){

		$sql = "INSERT INTO users(firstName, lastName, birthday, changedAt, description) VALUES(?,?,?,?,?)";
		$stmt = $this->pdo->prepare($sql);
		$stmt->execute($row);
		
	}

	function getAll(){
		$data = $this->pdo->query("SELECT id, firstName, lastName, birthday, changedAt, description FROM users")->fetchAll();
		return $data;
	}
}