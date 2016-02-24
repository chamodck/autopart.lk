<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserManage extends CI_Controller {

	public function login(){
		$this->load->model('UserManageModel');
		$result=$this->UserManageModel->login();
		if(! $result){
			$this->load->model('AutopartModel');
			$data['years']=$this->AutopartModel->getYears();
			$data['loginError']=true;//login unsucess
			$data['headerAlert']=null;
			$data['headerFormModal']=null;
			
			$this->load->view('header',$data);
		}
	}

	public function logout(){
		$data=array('username','email','usertype');
		$this->session->unset_userdata($data);
		$this->session->sess_destroy();
		redirect('','refresh');
		
	}

	public function signup(){
		$this->form_validation->set_rules('email','Email','required|is_unique[user.email]|valid_email');
		$this->form_validation->set_rules('username','Username','required|is_unique[user.username]');
		$this->form_validation->set_rules('password','Password','required|matches[verify]|min_length[5]|md5');
		$this->form_validation->set_rules('verify','Password (again)','required|md5');

		if($this->form_validation->run()==true){
			$this->load->model('UserManageModel');
			$result=$this->UserManageModel->addNewUser();
			if($result){
				redirect('','refresh');
			}else{
				$this->load->model('AutopartModel');
				$data['years']=$this->AutopartModel->getYears();
				$data['loginError']=false;
				$data['headerAlert']=array('message'=>"Error occuring while signup!",'header'=>"Error",'type'=>"danger",'size'=>"sm");
				$data['headerFormModal']=null;
				
				$this->load->view('header',$data);
			}
		}else{
			$this->load->model('AutopartModel');
			$data['years']=$this->AutopartModel->getYears();
			$data['loginError']=false;
			$data['headerAlert']=null;
			$data['headerFormModal']=null;
			
			$this->load->view('header',$data);
		}
	}

	public function is_exist($str, $field){
		sscanf($field, '%[^.].%[^.]', $table, $column);
		$this->load->model('UserManageModel');
		$result=$this->UserManageModel->checkExist($str,$table,$column);
		if($result){
			return true;
		}else{
			$this->form_validation->set_message('is_exist',"%s you entered don't match!");
			return false;
		}
	}

	public function forgotPassword(){
		$this->form_validation->set_rules('forgotEmail','Email','callback_is_exist[user.email]|valid_email');

		$this->load->model('AutopartModel');
		$data['years']=$this->AutopartModel->getYears();
		$data['loginError']=false;
		$data['headerFormModal']=null;

		if($this->form_validation->run()==true){
			$data['headerAlert']=array('header'=>"Forgot Password",'size'=>"md");

			$verifycode=md5(date("Y.m.d h:i:sa"));
			$email=$this->input->post('forgotEmail');

			$this->load->model('UserManageModel');
			$result=$this->UserManageModel->setVerifyCode($email,$verifycode);

			if($result){
				$result=$this->sendEmail($email,$verifycode);
				if($result){
					$data['headerAlert']['message']="Password change link was sent to your email.";
					$data['headerAlert']['type']="success";
				}else{
					$data['headerAlert']['message']='Some thing wrong in password change prosess.Try again!';
					$data['headerAlert']['type']="danger";
				}
			}else{
				$data['headerAlert']['message']='Some thing wrong in password change prosess.Try again!';
				$data['headerAlert']['type']="danger";
			}
		}else{
			$data['headerAlert']=null;
		}
		$this->load->view('header',$data);
	}

	public function sendEmail($email,$verifycode){
		$this->load->model('UserManageModel');
		$username=$this->UserManageModel->getUsernameForEmail($email);

		$this->load->library('email');

		$this->email->set_newline("\r\n");

	    $config['protocol'] = 'smtp';
	    $config['smtp_host'] = 'ssl://smtp.googlemail.com';
	    $config['smtp_port'] = '465';
	    $config['smtp_user'] = 'autopart720@gmail.com';
	    $config['smtp_from_name'] = 'autopart.lk';
	    $config['smtp_pass'] = 'autopart.lk';
	    $config['wordwrap'] = TRUE;
	    $config['newline'] = "\r\n";
	    $config['mailtype'] = 'html';

		$this->email->initialize($config);
		$this->email->set_newline("\r\n");

		$this->email->from('autopart720@gmail.com','autopart.lk');
		$this->email->to($email);
		$this->email->subject('autopart.lk Password change request');
		$para=$username.'/'.$verifycode;
		$content="
		<html>
		<head>
		</head>
		<body>
			<h2>You are trying to change password</h2>
			We have a request for change password of <a href='http://localhost/autopart/'>autopart.lk</a> account.
			If you need to change password <b>click <a href='http://localhost/autopart/index.php/UserManage/changePassword/".$para."'>here</a></b>,
			otherwise ignore this.<br>
			<h4>Requested person details</h4>
			".$_SERVER['HTTP_USER_AGENT']."
		</body>
		</html>
		";
		$this->email->message($content);
		$result=$this->email->send();
		return $result;
	}

	public function changePassword($username,$code){
		if($code=='init'){
			$this->load->model('AutopartModel');
			$data['years']=$this->AutopartModel->getYears();
			$data['loginError']=false;
			$data['headerAlert']=array('header'=>"Change Password",'size'=>"sm",'message'=>"Invaid URL,Try again!",'type'=>"danger");
			$data['headerFormModal']=null;
			
			$this->load->view('header',$data);
		}else{
			$this->load->model('UserManageModel');
			$result=$this->UserManageModel->isValidPasswordResetCode($username,$code);
			if($result){
				$this->load->model('AutopartModel');
				$data['years']=$this->AutopartModel->getYears();
				$data['loginError']=false;
				$data['headerAlert']=null;
				$data['headerFormModal']=null;
				
				$this->load->view('header',$data);

				$data1['username']=$username;
				$this->load->view('changePassword',$data1);
			}else{
				$this->load->model('AutopartModel');
				$data['years']=$this->AutopartModel->getYears();
				$data['loginError']=false;
				$data['headerAlert']=array('header'=>"Change Password",'size'=>"sm",'message'=>"Invaid URL,Try again!",'type'=>"danger");
				$data['headerFormModal']=null;
				
				$this->load->view('header',$data);
			}
		}
	}

	public function newPassword(){
		$this->form_validation->set_rules('password1','Password','matches[verify1]|min_length[5]|md5');
		$this->form_validation->set_rules('verify1','Password (again)','md5');
		$username=$this->input->post('username');

		if($this->form_validation->run()==true){
			$this->load->model('UserManageModel');
			$result=$this->UserManageModel->setNewPassword();
			if($result){
				redirect('','refresh');
			}else{
				$this->load->model('AutopartModel');
				$data['years']=$this->AutopartModel->getYears();
				$data['loginError']=false;
				$data['headerAlert']=array('header'=>"Change Password",'size'=>"md",'message'=>"Something wrong in change password process,Try again!",'type'=>"danger");
				$data['headerFormModal']=null;
				$this->load->view('header',$data);

				$data1['username']=$username;
				$this->load->view('changePassword',$data1);
			}
		}else{
			$this->load->model('AutopartModel');
			$data['years']=$this->AutopartModel->getYears();
			$data['loginError']=false;
			$data['headerAlert']=null;
			$data['headerFormModal']=null;
			$this->load->view('header',$data);

			$data1['username']=$username;
			$this->load->view('changePassword',$data1);
		}
	}
}