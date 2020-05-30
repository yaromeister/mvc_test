<?php 
namespace App\Controllers;
use App\Models\User;

class CSVController{
	private $user;
	function __construct(\App\Models\User $user){
		$this->user = $user;
	}

	function insert(){
		$file = $_FILES['csv']['tmp_name'];
		if( ($handle = fopen($file,'r')) !== FALSE){
			while(($row = fgetcsv($handle, 1000, ",")) !== FALSE){
				$this->user->insert($row);
			}
		}
		header("Location:index.php");
	}
	function show(){
		$data = $this->user->getAll();
		include $_SERVER['DOCUMENT_ROOT']."/app/Views/table.view";
	}
}