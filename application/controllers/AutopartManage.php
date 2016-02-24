<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AutopartManage extends CI_Controller {

	public function loadMadeBy($year){
		$this->load->model('AutopartModel');
		$madeBy=$this->AutopartModel->getMadeBy(urldecode($year));
		echo "<option value=''>--Select a Made By--</option>";
		foreach($madeBy as $value){
			if($value!=''){
				echo "<option >".$value."</option>";
			}
		}		
	}

	public function loadModel($year,$madeBy){
		$this->load->model('AutopartModel');
		$model=$this->AutopartModel->getModel(urldecode($year),urldecode($madeBy));
		echo "<option value=''>--Select a Model--</option>";
		foreach($model as $value){
			if($value!=''){
				echo "<option >".$value."</option>";
			}
		}
	}

	public function loadSubmodel($year,$madeBy,$model){
		$this->load->model('AutopartModel');
		$submodel=$this->AutopartModel->getSubmodel(urldecode($year),urldecode($madeBy),urldecode($model));
		echo "<option value=''>--Select a Submodel--</option>";
		foreach($submodel as $value){
			if($value!=''){
				echo "<option >".$value."</option>";
			}
		}
	}

	public function loadEngine($year,$madeBy,$model,$submodel){
		$this->load->model('AutopartModel');
		$engine=$this->AutopartModel->getEngine(urldecode($year),urldecode($madeBy),urldecode($model),urldecode($submodel));
		echo "<option value=''>--Select a Engine--</option>";
		foreach($engine as $value){
			if($value!=''){
				echo "<option >".$value."</option>";
			}
		}
	}

	public function loadSubcategory($category){
		$this->load->model('AutopartModel');
		$sub=$this->AutopartModel->getSubcategory(urldecode($category));
		echo "<option value=''>--Select Subcategory--</option>";
		foreach($sub as $value){
			if($value!=''){
				echo "<option>".$value."</option>";
			}
		}
	}

	public function postAd(){
		if($this->session->has_userdata('username')){
			$this->load->model('AutopartModel');
			$data['years']=$this->AutopartModel->getYears();
			$data['loginError']=false;
			$data['headerAlert']=null;
			$data['headerFormModal']=array('name'=>'postAdForm');
			$data['categories']=$this->AutopartModel->getCategories();

			$data1['categories']=$this->AutopartModel->getAllCategories();
			$this->load->view('header',$data);
			$this->load->view('category',$data1);
			$this->load->view('footer');
		}else{
			$this->load->model('AutopartModel');
			$data['years']=$this->AutopartModel->getYears();
			$data['loginError']=false;
			$data['headerAlert']=array('header'=>"Post Ad fail!",'size'=>"sm",'message'=>"Log in to your account before Post Ad!",'type'=>"danger");
			$data['headerFormModal']=null;
			$this->load->view('header',$data);
		}
	}	

	public function addAutopart(){
		$this->form_validation->set_rules('quantity','Quantity','greater_than[0]');
		$this->form_validation->set_rules('price','Price','greater_than[0]');

		$this->load->model('AutopartModel');
		$data['years']=$this->AutopartModel->getYears();
		$data['loginError']=false;
		$data['categories']=$this->AutopartModel->getCategories();

		$data1['categories']=$this->AutopartModel->getAllCategories();
		if($this->form_validation->run()==true){
			
			$result=$this->AutopartModel->setNewAutopart();
			if($result){
				$data['headerAlert']=null;
				$data['headerFormModal']=array('name'=>'photoForm','partID'=>$result);
			}else{
				$data['headerAlert']=array('message'=>"Something wrong in Post Ad prosess.Try again!",'header'=>"Error",'type'=>"danger",'size'=>"sm");
				$data['headerFormModal']=null;
			}
		}else{			
			$data['headerAlert']=null;
			$data['headerFormModal']=array('name'=>'postAdForm');

			$this->load->view('header',$data);
			$this->load->view('category',$data1);
			$this->load->view('footer');
		}
	}
}
?>