<?php 

class User{

	private $fields = array(
		'firstName', 'lastName', 'birthday', 'changedAt', 'description'
	);

	private $data;

	public function prepareData(array $array)
	{
		$this->data = array_combine($this->fields, $array);

		return $this->data;
	}

	public function getFields(){
		return $this->fields;
	}
}