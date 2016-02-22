<?php
	//$conn = new mysqli('localhost','root','','autoparts');//set your database handler
	include "database/dbconnect.php";
	
	if($_GET['year']!= null){
		
		if($_GET['madeBy']!=null){
			
			if($_GET['model']!=null){
				
				if($_GET['submodel']!=null){
					
					$year=intval($_GET['year']);
					$madeBy=$_GET['madeBy'];
					$model=$_GET['model'];
					$submodel=$_GET['submodel'];
					$query = "SELECT DISTINCT engine FROM vehicle WHERE year='".$year."' AND madeBy='".$madeBy."' AND model='".$model."' AND submodel='".$submodel."'";		
					$result = $conn->query($query);
					
					while($row = $result->fetch_assoc()){
						$array[]=$row['engine'];
					}
					sort($array);
					
					echo "<option value=''>--Select a Engine--</option>";
					foreach($array as $value){
						echo "<option >".$value."</option>";
					}
				}else{
				
				$year=intval($_GET['year']);
				$madeBy=$_GET['madeBy'];
				$model=$_GET['model'];
				$query = "SELECT DISTINCT submodel FROM vehicle WHERE year='".$year."' AND madeBy='".$madeBy."' AND model='".$model."'";
				$result = $conn->query($query);
				
				while($row = $result->fetch_assoc()){
					$array[]=$row['submodel'];
				}
				sort($array);
				
				echo "<option value=''>--Select a Submodel--</option>";
				foreach($array as $value){
					echo "<option >".$value."</option>";
				}}
			}
			else{
				$year=intval($_GET['year']);
				$madeBy=$_GET['madeBy'];
				$query = "SELECT DISTINCT model FROM vehicle WHERE year='".$year."' AND madeBy='".$madeBy."'";
				$result = $conn->query($query);
				
				while($row = $result->fetch_assoc()){
					$model[]=$row['model'];
				}
				sort($model);
				
				echo "<option value=''>--Select a Model--</option>";
				foreach($model as $value){
					echo "<option >".$value."</option>";
				}
			}
	
		}else{
			$year = intval($_GET['year']);
			$query = "SELECT DISTINCT madeBy FROM vehicle WHERE year='".$year."'";
			$result = $conn->query($query);
			
			while($row = $result->fetch_assoc()){
				$madeBy[]=$row['madeBy'];
			}
			sort($madeBy);
			
			echo "<option value=''>--Select a Made By--</option>";
			foreach($madeBy as $value){
				echo "<option >".$value."</option>";
			}
		}
	}
?>