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

		public function getAllCategories(){
			$query=$this->db->query("SELECT DISTINCT category FROM category");
			if($query->num_rows()>0){
				foreach ($query->result() as $row) {
					$cat[]= $row->category;
				}
				sort($cat);

				foreach ($cat as $category) {
					$allset[$category]=$this->getSubcategory($category);
				}
				return $allset;
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
		
	}
?>