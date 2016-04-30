<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PaymentController extends CI_Controller {
	public function addToCart(){
		if($this->session->has_userdata('username')){

			$this->load->model('PaymentModel');
			$this->PaymentModel->directAddToUserCart();
			redirect(site_url('PaymentController/cart'),'refresh');
        }else{
        	$data = array(
               'id'      => $this->input->post('id'),
               'qty'     => $this->input->post('quantity'),
               'price'   => $this->input->post('price'),
               'name'    => $this->input->post('name')
            );
			$this->cart->insert($data);
        }
		redirect(site_url('PaymentController/cart'),'refresh');
	}
	
	public function cart(){
		$this->load->model('AutopartModel');
		$data['years']=$this->AutopartModel->getYears();
		$data['loginError']=false;
		$data['headerAlert']=null;
		$data['headerFormModal']=null;
		$this->load->view("header",$data);
		if($this->session->has_userdata('username')){
			$this->load->model('PaymentModel');
			$data1['cartdata']=$this->PaymentModel->getCart();
			$this->load->view("cart",$data1);
		}else{
			$this->load->view("cart");
		}
		$this->load->view("footer");
	}

	public function deleteUserCartItem($id,$qty){
		
			$this->load->model('PaymentModel');
			$this->PaymentModel->deleteCartItem($id);
			if($this->session->userdata('quantity')==$qty){
				$this->session->set_userdata('quantity',$this->session->userdata('quantity')-$qty);
				redirect('','refresh');
			}else{
				$this->session->set_userdata('quantity',$this->session->userdata('quantity')-$qty);
				redirect(site_url('PaymentController/cart'),'refresh');
			}

	}

	public function deleteSessionCartItem($id){
		$data = array('rowid'=>$id,'qty'=> 0);
		$this->cart->update($data); 
		if($this->cart->total_items()>0){
			redirect(site_url('PaymentController/cart'),'refresh');
		}else{
			redirect('','refresh');
		}
		
	}
}
?>