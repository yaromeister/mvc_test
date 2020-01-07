<?php 

class CsvFile{
	private $pdo;
	private $filePath;
	private $user;
	private $records;

	function __construct($pdo = null, $user = null, $records = [])
	{
		$this->pdo = $pdo;
		#$this->filePath = $filePath;
		$this->user = $user;
		$this->records = $records;
		echo 'constructor ';
		#$this->load();
	}

	private function load()
	{
		echo 'loadStart ';
		$row = 0;
		if(!empty($this->filePath)){
			if(($file = fopen($this->filePath, 'r')) !== FALSE)
			{
				echo 'File opened ';
				while(($line = fgetcsv($file, 1000, ",")) !== FALSE)
				{
					echo ' Read ';
					$this->records[$row] = $line;
					$row++;
					echo $row;
				}
			}
		}
		
	}

	public function add()
	{
		#header("location:file_loader.php");
		$this->filePath = $_FILES['file']['tmp_name'];
		$this->load();
		for($i = 0; $i<count($this->records); $i++)
		{
			$row = $this->records[$i];

			$data = $this->user->prepareData($row);
			
			#$sql = sprintf('INSERT INTO % (%) VALUES (%)', DB_TABLE, implode(', ' , array_keys($data)), implode(', :', array_keys($data)) );
			$sql = 'INSERT INTO ' . DB_TABLE . ' (' . implode(', ' , array_keys($data)) . ') VALUES(' . ':' . implode(', :', array_keys($data)) .')';

			$stmt = $this->pdo->prepare($sql);

			try{

				$stmt->execute($data);
			}catch(PDOException $e){
				echo $e->getMessage();
			}
			
		}
	}



	public function getRecords(){
		return $this->records;
	}

	public function getRecordsFromDB(){
		$sql = 'SELECT * FROM ' . DB_TABLE;
		$result = $this->pdo->query($sql);
		
		return $result;
	}

	public function dump($arg){
		echo '<pre>';
		var_dump($arg);
		echo '</pre>';
	}

	public function getUser(){
		return $this->user;
	}

}