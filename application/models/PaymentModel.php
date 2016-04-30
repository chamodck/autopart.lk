<?php
	class PaymentModel extends CI_Model{

		public function addToUserCart(){
			$cart=$this->cart->contents();
                  foreach($cart as $array){
                  	$query=$this->db->query("SELECT * FROM cart WHERE username='".$this->session->userdata('username')."' AND id=".$array['id']);
                  	if($query->num_rows()==1){
                  		$q=$array['qty'];
                  		$query=$this->db->query("UPDATE cart SET qty = qty + $q WHERE username='".$this->session->userdata('username')."' AND id=".$array['id']);
                  	}else{
                  		$query=$this->db->query("INSERT INTO cart VALUES (".$array['id'].",".$array['qty'].",".$array['price'].",'".$array['name']."','".$this->session->userdata('username')."')");
                  	}

                  }
                  $this->session->set_userdata('quantity',$this->session->userdata('quantity')+$this->cart->total_items());
                  $this->cart->destroy();
		}

		public function directAddToUserCart(){
			$id=$this->input->post('id');
                  $qty=$this->input->post('quantity');
                  $price=$this->input->post('price');
                  $name=$this->input->post('name');

      		$query=$this->db->query("SELECT * FROM cart WHERE username='".$this->session->userdata('username')."' AND id=$id");
                  if($query->num_rows()==1){
                  	
                  	$query=$this->db->query("UPDATE cart SET qty = qty + $qty WHERE username='".$this->session->userdata('username')."' AND id=$id");
                  }else{
                  	$query=$this->db->query("INSERT INTO cart VALUES (".$id.",".$qty.",".$price.",'".$name."','".$this->session->userdata('username')."')");
                  }
                  //get cart quantity
                  //$query=$this->db->query("SELECT SUM(qty) AS quantity FROM cart WHERE username='".$this->session->userdata('username')."'");
                  $this->session->set_userdata('quantity',$this->session->userdata('quantity')+$qty);
		}

		public function getCart(){
			$query=$this->db->query("SELECT * FROM cart WHERE username='".$this->session->userdata('username')."'");
			return $query;
		}

            public function deleteCartItem($id){
                  $query=$this->db->query("DELETE FROM cart WHERE id=$id");
            } 
	}
?>