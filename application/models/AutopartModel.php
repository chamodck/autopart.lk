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
			$title=$this->input->post('title');
			$category=$this->input->post('category');
			$subcategory=$this->input->post('subcategory');
			$description=$this->input->post('description');
			$quantity=$this->input->post('quantity');
			$status=$this->input->post('status');
			$price=$this->input->post('price');
			$formYear=$this->input->post('formYear');
			$formMadeBy=$this->input->post('formMadeBy');
			$formModel=$this->input->post('formModel');
			$formSubmodel=$this->input->post('formSubmodel');
			$formEngine=$this->input->post('formEngine');

			$keyword=str_replace(' ','#',trim($title)).'#'.str_replace(' ','',$category).'#'.str_replace(' ','',$subcategory);
			if($this->input->post('vehicleDetails')){
				$keyword.='#'.str_replace(' ','',$formYear).'#'.str_replace(' ','',$formMadeBy).'#'.str_replace(' ','',$formModel);
				if($formSubmodel){
					$keyword.='#'.str_replace(' ','',$formSubmodel);
				}
				if($formEngine){
					$keyword.='#'.str_replace(' ','',$formEngine);
				}
			}
			if($this->input->post('keyword')){
				$keyword.='#'.str_replace(' ','',trim($this->input->post('keyword')));
			}

			
			$d=date("Y-m-d G:i:s");
			$query=$this->db->query("INSERT INTO part VALUES(null,'$d','$username','$title','$category','$subcategory','$formYear','$formMadeBy','$formModel','$formSubmodel','$formEngine',$quantity,'$description','$status',$price,'$keyword',0,0)");
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

		public function getResults($type,$word){
			$word=urldecode($word);

			if($type=='normal'){
				$str=$this->input->post('search');
				$str=trim($str);
				$array=explode(" ",$str);

				$q='';$count=0;
				foreach ($array as $keyword) {
					if($count==0){
						$q.="keyword LIKE '%".$keyword."%'";
					}else{
						$q.=" OR keyword LIKE '%".$keyword."%'";
					}
					$count++;
				}

				$query=$this->db->query("SELECT * FROM part WHERE(".$q.")");
				$array=array($query,$this->input->post('search'));
				return $array;
			}elseif ($type=='category' | $type=='subcategory') {
				$query=$this->db->query("SELECT * FROM part WHERE keyword LIKE '%".str_replace(' ','',$word)."%'");
				$array=array($query,$word);
				return $array;
			}else{
				$year=$this->input->post('year');
				$madeBy=$this->input->post('madeBy');
				$model=$this->input->post('model');
				$submodel=$this->input->post('submodel');
				$engine=$this->input->post('engine');

				$q="keyword LIKE '%".$year."%'";
				//$word='';
				$word=$year;
				if($madeBy){
					$q.=" AND keyword LIKE '%".$madeBy."%'";
					$word.='-'.$madeBy;
				}
				if($model){
					$q.=" AND keyword LIKE '%".$model."%'";
					$word.='-'.$model;
				}
				if($submodel){
					$q.=" AND keyword LIKE '%".$submodel."%'";
					$word.='-'.$submodel;
				}
				if($engine){
					$q.=" AND keyword LIKE '%".$engine."%'";
					$word.='-'.$engine;
				}

				$query=$this->db->query("SELECT * FROM part WHERE(".$q.")");
				$array=array($query,$word);
				return $array;
			}
		}
	}
?>