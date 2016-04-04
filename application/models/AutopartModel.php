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

		public function getNormalSearch($page){
			if($this->input->get('search')){
				$limit=8;
				$offset=$limit*$page-$limit;

				$str=$this->input->get('search');
				$str=trim($str);
				$array=explode(" ",$str);

				$q='';
				for ($i=0;$i<sizeof($array);$i++) {
					if($i==0){
						$q.="keyword LIKE '%".$array[$i]."%'";
					}else{
						$q.=" OR keyword LIKE '%".$array[$i]."%'";
					}
					
				}

				$query=$this->db->query("SELECT * FROM part WHERE(".$q.")");
				$query1=$this->db->query("SELECT * FROM part WHERE(".$q.") ORDER BY partID DESC LIMIT $limit OFFSET $offset");
				$array['searchresult']=array('resultset'=>$query1,'keyword'=>$str,'type'=>'normal','resultsize'=>$query->num_rows(),'page'=>$page,'limit'=>$limit,'suffix'=>$_SERVER['QUERY_STRING']);
				$query1=$this->db->query("SELECT COUNT(*) AS count,category AS data FROM part GROUP BY category");
				$array['related']=array('name'=>'Categories','resultset'=>$query1,'type'=>'normal');
				return $array;
			}
		}

		public function getCategorySearch($keyword,$page){
			$limit=1;
			$offset=$limit*$page-$limit;

			$query=$this->db->query("SELECT * FROM part WHERE keyword LIKE '%".str_replace(' ','',$keyword)."%'");
			$query1=$this->db->query("SELECT * FROM part WHERE keyword LIKE '%".str_replace(' ','',$keyword)."%' ORDER BY partID DESC LIMIT $limit OFFSET $offset");
			$array['searchresult']=array('resultset'=>$query1,'keyword'=>$keyword,'type'=>'category','resultsize'=>$query->num_rows(),'page'=>$page,'limit'=>$limit);
			$query1=$this->db->query("SELECT COUNT(*) AS count,subcategory as data FROM part WHERE category='$keyword' GROUP BY subcategory");
			$array['related']=array('name'=>$keyword,'resultset'=>$query1,'type'=>'subcategory');
			return $array;
		}

		public function getSubcategorySearch($keyword,$page){
			$limit=1;
			$offset=$limit*$page-$limit;

			$query=$this->db->query("SELECT * FROM part WHERE keyword LIKE '%".str_replace(' ','',$keyword)."%'");
			$query1=$this->db->query("SELECT * FROM part WHERE keyword LIKE '%".str_replace(' ','',$keyword)."%' ORDER BY partID DESC LIMIT $limit OFFSET $offset");
			$array['searchresult']=array('resultset'=>$query1,'keyword'=>$keyword,'type'=>'subcategory','resultsize'=>$query->num_rows(),'page'=>$page,'limit'=>$limit);
			
			$query1=$this->db->query("SELECT category FROM category WHERE subCategory='$keyword'");

			foreach ($query1->result() as $row) {
				$category=$row->category;
			}
			$query1=$this->db->query("SELECT COUNT(*) AS count,subcategory AS data FROM part WHERE category='$category' GROUP BY subcategory");
			$array['related']=array('name'=>$category,'resultset'=>$query1,'type'=>'subcategory');
			return $array;
		}

		public function getVehicleSearch($page){
			$limit=1;
			$offset=$limit*$page-$limit;
			if($this->input->get('year')){
				$year=$this->input->get('year');
				$madeBy=$this->input->get('madeBy');
				$model=$this->input->get('model');
				$submodel=$this->input->get('submodel');
				$engine=$this->input->get('engine');
				$category=$this->input->get('category');
				$subcategory=$this->input->get('subcategory');

				$q="keyword LIKE '%".$year."%'";
				$w="";
				//$word='';
				$word=$year;
				if($madeBy){
					$q.=" AND keyword LIKE '%".str_replace(' ','',$madeBy)."%'";
					$word.='>'.$madeBy;
				}
				if($model){
					$q.=" AND keyword LIKE '%".str_replace(' ','',$model)."%'";
					$word.='>'.$model;
				}
				if($submodel){
					$q.=" AND keyword LIKE '%".str_replace(' ','',$submodel)."%'";
					$word.='>'.$submodel;
				}
				if($engine){
					$q.=" AND keyword LIKE '%".str_replace(' ','',$engine)."%'";
					$word.='>'.$engine;
				}
				if($category){
					$q.=" AND keyword LIKE '%".str_replace(' ','',$category)."%'";
					$w=$q;
					$word.='>'.$category;
				}
				if($subcategory){
					$q.=" AND keyword LIKE '%".str_replace(' ','',$subcategory)."%'";
					$word.='>'.$subcategory;
				}

				if($category){
					if($subcategory){
						$query1=$this->db->query("SELECT COUNT(*) AS count,subcategory AS data FROM part WHERE(".$w.") GROUP BY subcategory");
						$array['related']=array('name'=>$word,'resultset'=>$query1,'type'=>'vehicle','need'=>'subcat','subcategory'=>$subcategory);
					}else{
						$query1=$this->db->query("SELECT COUNT(*) AS count,subcategory AS data FROM part WHERE(".$q.") GROUP BY subcategory");
						$array['related']=array('name'=>$word,'resultset'=>$query1,'type'=>'vehicle','need'=>'subcat','subcategory'=>'');
					}
				}else{
					$query1=$this->db->query("SELECT COUNT(*) AS count,category AS data FROM part WHERE(".$q.") GROUP BY category");
					$array['related']=array('name'=>$word,'resultset'=>$query1,'type'=>'vehicle','need'=>'cat');
				}

				$query=$this->db->query("SELECT * FROM part WHERE(".$q.")");
				$query1=$this->db->query("SELECT * FROM part WHERE(".$q.") ORDER BY partID DESC LIMIT $limit OFFSET $offset");
				$array['searchresult']=array('resultset'=>$query1,'keyword'=>$word,'type'=>'vehicle','resultsize'=>$query->num_rows(),'page'=>$page,'limit'=>$limit,'suffix'=>$_SERVER['QUERY_STRING']);

				return $array;
			}
		}
		
		public function getItem($partID){
			$query=$this->db->query("SELECT * FROM part WHERE partID=$partID");
			return $query->row();
		}

		public function increseViews($partID){
			$query=$this->db->query("UPDATE part SET views=views+1 WHERE partID=$partID");
		}
	}
?>