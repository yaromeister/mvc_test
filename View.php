<?php 

class View{
	public static function output(CsvFile $model){
		$data = $model->getRecordsFromDB();



		$output = '
		<form action="file_loader.php" method="POST" enctype="multipart/form-data">
			<div>

				<input type = "file" name="file" id="customFile" required >
				<label class="custom-file-label" for="customFile">Choose file...</label>
			</div>
			<button type = "submit" name = "submitFile"> Submit </button>
		</form>
		<br>
		<table>
						<tr>
							<th>ID</th>
							<th>First Name</th>
							<th>Last Name</th>
							<th>Birthday</th>
							<th>ChangedAt</th>
							<th>Desctiption</th>
						</tr>
						';

		while($row = $data->fetch()){
			$output .= '<tr>
							<td>'. $row['id'] .'</th>
							<td>'. $row[$model->getUser()->getFields()[0]] .'</th>
							<td>'. $row[$model->getUser()->getFields()[1]] .'</th>
							<td>'. $row[$model->getUser()->getFields()[2]] .'</th>
							<td>'. $row[$model->getUser()->getFields()[3]] .'</th>
							<td>'. $row[$model->getUser()->getFields()[4]] .'</th>
						</tr>';
		}
		$output .= '</table>';

		return $output;
	}
}