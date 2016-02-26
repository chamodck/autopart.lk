<?php
	class AutopartModel extends CI_Model{

		public function getYears(){
			$query=$this->db->query("SELECT DISTINCT year FROM vehicle");
			if($query->num_rows()>0){
				
				foreach ($query->result() as $row) {
					$years[] = $row->year;
				}
				rsort($years);
				return $years;
			}else{
				return null;
			}
		}

		public function getCategories(){
			$query=$this->db->query("SELECT DISTINCT category FROM category");
			if($query->num_rows()>0){
				foreach ($query->result() as $row) {
					$categories[] = $row->category;
				}
				sort($categories);
				return $categories;
			}else{
				return null;
			}
		}

		public function getSubcategory($category){
			$query=$this->db->query("SELECT subCategory FROM category WHERE category='$category'");
			foreach ($query->result() as $row) {
				$array[]=$row->subCategory;
			}
			sort($array);
			return $array;
		}

		public function getAllCategories(){
			$cat=$this->getCategories();
			if($cat){
				foreach ($cat as $category) {
					$allset[$category]=$this->getSubcategory($category);
				}
				return $allset;
			}else{
				return null;
			}
		}

		public function getMadeBy($year){
			$query=$this->db->query("SELECT DISTINCT madeBy FROM vehicle WHERE year='".$year."'");
			if($query->num_rows()>0){
				foreach ($query->result() as $row) {
					$madeBy[] = $row->madeBy;
				}
				sort($madeBy);
				return $madeBy;
			}else{
				return null;
			}
		}

		public function getModel($year,$madeBy){
			$query=$this->db->query("SELECT DISTINCT model FROM vehicle WHERE year='".$year."' AND madeBy='".$madeBy."'");
			if($query->num_rows()>0){
				foreach ($query->result() as $row) {
					$model[] = $row->model;
				}
				sort($model);
				return $model;
			}else{
				return null;
			}
		}

		public function getSubmodel($year,$madeBy,$model){
			$query = $this->db->query("SELECT DISTINCT submodel FROM vehicle WHERE year='".$year."' AND madeBy='".$madeBy."' AND model='".$model."'");
			if($query->num_rows()>0){
				foreach ($query->result() as $row) {
					$submodel[] = $row->submodel;
				}
				sort($submodel);
				return $submodel;
			}else{
				return null;
			}
		}

		public function getEngine($year,$madeBy,$model,$submodel){
			$query = $this->db->query("SELECT DISTINCT engine FROM vehicle WHERE year='".$year."' AND madeBy='".$madeBy."' AND model='".$model."' AND submodel='".$submodel."'");
			if($query->num_rows()>0){
				foreach ($query->result() as $row) {
					$engine[] = $row->engine;
				}
				sort($engine);
				return $engine;
			}else{
				return null;
			}
		}

		public function setNewAutopart(){
			$username=$this->session->userdata('username');
			$category=$this->input->post('category');
			$subcategory=$this->input->post('subcategory');
			$description=$this->input->post('description');
			$quantity=$this->input->post('quantity');
			$status=$this->input->post('status');
			$price=$this->input->post('price');
			$keyword=$this->input->post('keyword');

			$formYear=$this->input->post('formYear');
			$formMadeBy=$this->input->post('formMadeBy');
			$fromModel=$this->input->post('fromModel');
			$formSubmodel=$this->input->post('formSubmodel');
			$formEngine=$this->input->post('formEngine');

			$query=$this->db->query("INSERT INTO part VALUES(null,'$username','$category','$subcategory','$formYear','$formMadeBy','$fromModel','$formSubmodel','$formEngine',$quantity,'$description','$status',$price,'$keyword',0)");
			if($query){
				$this->db->select_max('partID');
				//$this->db->select('numofphotos');
				$this->db->where("username='$username'");
				$query=$this->db->get('part');

				foreach ($query->result() as $row) {
					$partID=$row->partID;
					//$array['numofphotos']=$row->numofphotos;
				}
				mkdir('./uploads/autopartphotos/'.$partID.'/',0777);
				return $partID;
				
			}else{
				return null;
			}
		}

		public function photoNumberIncrement($partID){
			$query=$this->db->query("UPDATE part SET numofphotos=numofphotos+1 WHERE partID=$partID");

		}
	}
?>