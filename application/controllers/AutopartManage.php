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
		$this->form_validation->set_rules('title','Title','max_length[100]');
		$this->form_validation->set_rules('price','Price','greater_than[0]');
		$this->form_validation->set_rules('description','Description','max_length[500]');
		$this->form_validation->set_rules('keyword','Keyword','max_length[500]');

		if($this->input->post('vehicleDetails')){
			$this->form_validation->set_rules('formYear','Year','required');
			$this->form_validation->set_rules('formMadeBy','Made By','required');
			$this->form_validation->set_rules('formModel','Model','required');
		}

		$this->load->model('AutopartModel');
		$data['years']=$this->AutopartModel->getYears();
		$data['loginError']=false;
		$data['categories']=$this->AutopartModel->getCategories();

		$data1['categories']=$this->AutopartModel->getAllCategories();
		if($this->form_validation->run()==true){
			
			$result=$this->AutopartModel->setNewAutopart();
			if($result){
				$data['headerAlert']=null;
				$data['headerFormModal']=array('name'=>'photoFormModal','partID'=>$result,'photonumber'=>0);
			}else{
				$data['headerAlert']=array('message'=>"Something wrong in Post Ad prosess.Try again!",'header'=>"Error",'type'=>"danger",'size'=>"md");
				$data['headerFormModal']=null;
			}
			$this->load->view('header',$data);
			$this->load->view('category',$data1);
			$this->load->view('footer');
		}else{			
			$data['headerAlert']=null;
			$data['headerFormModal']=array('name'=>'postAdForm');

			$this->load->view('header',$data);
			$this->load->view('category',$data1);
			$this->load->view('footer');
		}
	}

	public function uploadPhoto($partID,$photonumber){
		$photoname=$partID.'-'.$photonumber;
		$this->load->helper(array('form','url'));

		$config['upload_path']='./uploads/autopartphotos/'.$partID.'/';
		$config['allowed_types']='jpg|png';
		//$config['max_size']='100';
		//$config['max_width']='1024';
		//$config['max_height']='768';
		$config['file_name']=$photoname;
		$this->load->library('upload',$config);

		if($this->upload->do_upload()){
			//$message=$this->upload->data();
			$this->load->model('AutopartModel');
			$this->AutopartModel->photoNumberIncrement($partID);
			$data['years']=$this->AutopartModel->getYears();
			$data['loginError']=false;
			$data['headerAlert']=null;
			$data['headerFormModal']=array('name'=>'photoFormModal','partID'=>$partID,'photonumber'=>$photonumber+1,'message'=>'success');
			$this->load->view('header',$data);
		}else{
			$error=$this->upload->display_errors();
			$this->load->model('AutopartModel');
			$data['years']=$this->AutopartModel->getYears();
			$data['loginError']=false;
			$data['headerAlert']=null;
			$data['headerFormModal']=array('name'=>'photoFormModal','partID'=>$partID,'photonumber'=>$photonumber,'message'=>$error);
			$this->load->view('header',$data);
		}
	}

	public function normalSearch($page){
		$this->load->library('pagination');
		$config['total_rows'] = 200;
		$config['per_page'] = 20;

		$this->pagination->initialize($config);

		$this->load->model('AutopartModel');
		$result=$this->AutopartModel->getNormalSearch($page);
		$data1['searchresult']=$result['searchresult'];
		$data1['related']=$result['related'];

		$data['years']=$this->AutopartModel->getYears();
		$data['loginError']=false;
		$data['headerAlert']=null;
		$data['headerFormModal']=null;
		$this->load->view('header',$data);
		$this->load->view('searchresult',$data1);
		$this->load->view('footer');
	}

	public function categorySearch($keyword,$page){
		$this->load->model('AutopartModel');
		$result=$this->AutopartModel->getCategorySearch(urldecode($keyword),$page);
		$data1['searchresult']=$result['searchresult'];
		$data1['related']=$result['related'];

		$data['years']=$this->AutopartModel->getYears();
		$data['loginError']=false;
		$data['headerAlert']=null;
		$data['headerFormModal']=null;
		$this->load->view('header',$data);
		$this->load->view('searchresult',$data1);
		$this->load->view('footer');
	}

	public function subcategorySearch($keyword,$page){
		$this->load->model('AutopartModel');
		$result=$this->AutopartModel->getsubcategorySearch(urldecode($keyword),$page);
		$data1['searchresult']=$result['searchresult'];
		$data1['related']=$result['related'];

		$data['years']=$this->AutopartModel->getYears();
		$data['loginError']=false;
		$data['headerAlert']=null;
		$data['headerFormModal']=null;
		$this->load->view('header',$data);
		$this->load->view('searchresult',$data1);
		$this->load->view('footer');
	}

	public function vehicleSearch($page){
		$this->load->model('AutopartModel');
		$result=$this->AutopartModel->getVehicleSearch($page);
		$data1['searchresult']=$result['searchresult'];
		$data1['related']=$result['related'];

		$data['years']=$this->AutopartModel->getYears();
		$data['loginError']=false;
		$data['headerAlert']=null;
		$data['headerFormModal']=null;
		$this->load->view('header',$data);
		$this->load->view('searchresult',$data1);
		$this->load->view('footer');
	}

	public function vehicleSearchExtend($keyword,$page){
		$this->load->model('AutopartModel');
		$result=$this->AutopartModel->getVehicleExtend($keyword,$page);
		$data1['searchresult']=$result['searchresult'];
		$data1['related']=$result['related'];

		$data['years']=$this->AutopartModel->getYears();
		$data['loginError']=false;
		$data['headerAlert']=null;
		$data['headerFormModal']=null;
		$this->load->view('header',$data);
		$this->load->view('searchresult',$data1);
		$this->load->view('footer');
	}

	public function search($type,$word,$page){
		$this->load->model('AutopartModel');
		$result=$this->AutopartModel->getResults($type,$word,$page);
		$data1['searchresult']=$result['searchresult'];
		$data1['related']=$result['related'];

		$data['years']=$this->AutopartModel->getYears();
		$data['loginError']=false;
		$data['headerAlert']=null;
		$data['headerFormModal']=null;
		$this->load->view('header',$data);
		$this->load->view('searchresult',$data1);
		$this->load->view('footer');
	}

	public function item_select($partID){
		$this->load->model('AutopartModel');
		$data['years']=$this->AutopartModel->getYears();
		$data['loginError']=false;
		$data['headerAlert']=null;
		$data['headerFormModal']=null;
		$this->load->view('header',$data);
		$this->load->view('item');
		$this->load->view('footer');
	}
}
?>