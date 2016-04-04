<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserManage extends CI_Controller {

	public function login(){
		$this->load->model('UserManageModel');
		$result=$this->UserManageModel->login();
		if($result==1){
			$this->load->view('userDetailsForm');
		}
		else if($result==2){
			$this->load->model('AutopartModel');
			$data['years']=$this->AutopartModel->getYears();
			$data['loginError']=true;//login unsucess
			$data['headerAlert']=null;
			$data['headerFormModal']=null;
			$data['emailVerifyError']=true;
			
			$this->load->view('header',$data);
		}elseif ($result==3) {
			$this->load->model('AutopartModel');
			$data['years']=$this->AutopartModel->getYears();
			$data['loginError']=true;//login unsucess
			$data['headerAlert']=null;
			$data['headerFormModal']=null;
			$data['emailVerifyError']=false;
			
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

		$email=$this->input->post('email');
		$user=$this->input->post('username');
		if($this->form_validation->run()==true){
			$verifycode=md5(date("Y.m.d h:i:sa"));
			$content="
					<html>
					<head>
					</head>
					<body>
						<p>Dear ".$user.",</p>
						Thank you for becoming a member of the <a href='http://localhost/autopart/'>autopart.lk</a>
						To get start now with <a href='http://localhost/autopart/'>autopart.lk</a> <b>click <a href='http://localhost/autopart/index.php/UserManage/confirmEmail/".$user."/".$verifycode."'>here</a></b> 
						<p>Thank you</p>
					</body>
					</html>
					";
			$result=$this->sendEmailConfirmation('autopart720@gmail.com',$email,'Welcome to autopart.lk',$content);
			
			if($result){
				$this->load->model('UserManageModel');
				$result=$this->UserManageModel->addNewUser($verifycode);
				if($result){
					$this->load->model('AutopartModel');
					$data['years']=$this->AutopartModel->getYears();
					$data['loginError']=false;
					$data['headerAlert']=array('message'=>"Account activation link was sent to your email.",'header'=>"Success",'type'=>"success",'size'=>"md");
					$data['headerFormModal']=null;
					
					$this->load->view('header',$data);
				}else{
					$this->load->model('AutopartModel');
					$data['years']=$this->AutopartModel->getYears();
					$data['loginError']=false;
					$data['headerAlert']=array('message'=>"Error occuring while signup!Try again.",'header'=>"Error",'type'=>"danger",'size'=>"sm");
					$data['headerFormModal']=null;
					
					$this->load->view('header',$data);
				}

			}else{
				$this->load->model('AutopartModel');
				$data['years']=$this->AutopartModel->getYears();
				$data['loginError']=false;
				$data['headerAlert']=array('message'=>"Error occuring while signup!Try again.",'header'=>"Error",'type'=>"danger",'size'=>"sm");
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

	public function sendEmailConfirmation($from,$to,$subject,$content){
		$this->load->library('email');
		$this->email->set_newline("\r\n");

	    $config['protocol'] = 'smtp';
	    $config['smtp_host'] = 'ssl://smtp.googlemail.com';
	    $config['smtp_port'] = '465';
	    $config['smtp_user'] = $from;
	    $config['smtp_from_name'] = 'autopart.lk';
	    $config['smtp_pass'] = 'autopart.lk';
	    $config['wordwrap'] = TRUE;
	    $config['newline'] = "\r\n";
	    $config['mailtype'] = 'html';

		$this->email->initialize($config);
		$this->email->set_newline("\r\n");

		$this->email->from($from,'autopart.lk');
		$this->email->to($to);
		$this->email->subject($subject);
		$this->email->message($content);
		$result=$this->email->send();
		return $result;
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
					$data['headerAlert']['message']='Something wrong in password change prosess.Try again!';
					$data['headerAlert']['type']="danger";
				}
			}else{
				$data['headerAlert']['message']='Something wrong in password change prosess.Try again!';
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
				$this->load->view('footer');
			}else{
				$this->load->model('AutopartModel');
				$data['years']=$this->AutopartModel->getYears();
				$data['loginError']=false;
				$data['headerAlert']=array('header'=>"Change Password",'size'=>"sm",'message'=>"Invaid URL,Try again!",'type'=>"danger");
				$data['headerFormModal']=null;
				
				$this->load->view('header',$data);
				$this->load->view('footer');
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
			$this->load->view('footer');
		}
	}

	public function confirmEmail($username,$verifycode){
		$this->load->model('UserManageModel');
		$code=$this->UserManageModel->getEmailVerifycode($username);
		if($code==$verifycode){
			$this->UserManageModel->setStandby($username);
			redirect('','refresh');
		}else{
			$this->load->model('AutopartModel');
			$data['years']=$this->AutopartModel->getYears();
			$data['loginError']=false;
			$data['headerAlert']=array('header'=>"Something Wrong",'size'=>"sm",'message'=>"Invalid URL!",'type'=>"danger");
			$data['headerFormModal']=null;

			$data1['categories']=$this->AutopartModel->getAllCategories();
			$this->load->view('header',$data);
			$this->load->view('category',$data1);
			$this->load->view('footer');
		}
	}

	public function userDetailsSubmit(){
		$this->form_validation->set_rules('nic','NIC','is_unique[user.nic]');
		if($this->form_validation->run()==true){
			$this->load->model('UserManageModel');
			$this->UserManageModel->setUserDetails();
			redirect('','location');
		}else{
			$this->load->view('userDetailsForm');
		}
	}

	public function profile(){
		
	}
}