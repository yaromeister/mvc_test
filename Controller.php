<?php 

class Controller{
	public static function loadFile($model)
	{
		$model->add();
		header("location: index.php");
	}
}