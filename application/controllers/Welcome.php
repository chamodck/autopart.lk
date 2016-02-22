<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */

	public function index(){
		$this->load->model('AutopartModel');
		$data['years']=$this->AutopartModel->getYears();
		$data['loginError']=false;
		$data['headerAlert']=null;

		$data1['categories']=$this->AutopartModel->getAllCategories();
		$this->load->view('header',$data);
		$this->load->view('category',$data1);
		$this->load->view('footer');
	}

	public function homepage(){
		redirect('','refresh');
	}
}

