<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PaymentController extends CI_Controller {
	public function addToCart(){
		//$this->load->library('cart');
		$data = array(
               'id'      => 'sku_123ABC',
               'qty'     => 1,
               'price'   => 39.95,
               'name'    => 'T-Shirt'
            );

		$this->cart->insert($data);
		redirect('','refresh');
	}
	
}
?>