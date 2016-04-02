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
<<<<<<< HEAD
		if($this->session->has_userdata('username')){
          $email=$this->session->userdata('email'); 
          if($email=='autopart720@gmail.com'){
          	$this->load->view('admin/header');
			$this->load->view('admin/admin');
          }else{
          	$this->load->model('AutopartModel');
			$data['years']=$this->AutopartModel->getYears();
			$data['loginError']=false;
			$data['headerAlert']=null;
			$data['headerFormModal']=null;
			
			$data1['categories']=$this->AutopartModel->getAllCategories();
			$this->load->view('header',$data);
			$this->load->view('category',$data1);
			$this->load->view('footer');
          }
        }else{
        	$this->load->model('AutopartModel');
			$data['years']=$this->AutopartModel->getYears();
			$data['loginError']=false;
			$data['headerAlert']=null;
			$data['headerFormModal']=null;
			
			$data1['categories']=$this->AutopartModel->getAllCategories();
			$this->load->view('header',$data);
			$this->load->view('category',$data1);
			$this->load->view('footer');
        }
=======
		$this->load->model('AutopartModel');
		$data['years']=$this->AutopartModel->getYears();
		$data['loginError']=false;
		$data['headerAlert']=null;
		$data['headerFormModal']=null;
		
		$data1['categories']=$this->AutopartModel->getAllCategories();
		$this->load->view('header',$data);
		$this->load->view('category',$data1);
		$this->load->view('footer');
>>>>>>> 1569e30ca9814140f0ea4ab1981fd92f1b3a13b1
	}

	public function homepage(){
		redirect('','refresh');
	}
}

