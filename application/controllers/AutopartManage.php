<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AutopartManage extends CI_Controller {

	public function loadMadeBy($year){
		$query = $this->db->query("SELECT DISTINCT madeBy FROM vehicle WHERE year='".$year."'");
		foreach ($query->result() as $row) {
			$madeBy[] = $row->madeBy;
		}
		sort($madeBy);
		echo "<option value=''>--Select a Made By--</option>";
		foreach($madeBy as $value){
			if($value!=''){
				echo "<option >".$value."</option>";
			}
		}		
	}

	public function loadModel($year,$madeBy){
		$query = $this->db->query("SELECT DISTINCT model FROM vehicle WHERE year='".$year."' AND madeBy='".$madeBy."'");
		foreach ($query->result() as $row) {
			$model[] = $row->model;
		}
		sort($model);
		echo "<option value=''>--Select a Model--</option>";
		foreach($model as $value){
			if($value!=''){
				echo "<option >".$value."</option>";
			}
		}
	}

	public function loadSubmodel($year,$madeBy,$model){
		$query = $this->db->query("SELECT DISTINCT submodel FROM vehicle WHERE year='".$year."' AND madeBy='".$madeBy."' AND model='".$model."'");
		foreach ($query->result() as $row) {
			$submodel[] = $row->submodel;
		}
		sort($submodel);
		echo "<option value=''>--Select a Submodel--</option>";
		foreach($submodel as $value){
			if($value!=''){
				echo "<option >".$value."</option>";
			}
		}
	}

	public function loadEngine($year,$madeBy,$model,$submodel){
		$query = $this->db->query("SELECT DISTINCT engine FROM vehicle WHERE year='".$year."' AND madeBy='".$madeBy."' AND model='".$model."' AND submodel='".$submodel."'");
		foreach ($query->result() as $row) {
			$engine[] = $row->engine;
		}
		sort($engine);
		echo "<option value=''>--Select a Engine--</option>";
		foreach($engine as $value){
			if($value!=''){
				echo "<option >".$value."</option>";
			}
		}
	}
}
?>