<?php
	class AdminModel extends CI_Model{
		public function getPendingAds(){
			$query=$this->db->query("SELECT * FROM part WHERE state='Pending'");
			return $query;
			/*$query=$this->db->query("SELECT * FROM part");
			$data['count']=$query->num_rows();
			$data['type']='Pending';
			return $data;*/
		}

		public function setApprove($partID){
			$query=$this->db->query("UPDATE part SET state='Approve' WHERE partID=$partID");
		}
	}
?>