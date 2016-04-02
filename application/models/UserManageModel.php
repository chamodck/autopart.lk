<?php
	class UserManageModel extends CI_Model{

		public function login(){
			$username=$this->input->post('loginusername');
			$pass=$this->input->post('loginpassword');
			$password = md5($pass);
			$query=$this->db->query("SELECT * FROM user WHERE (username='$username' OR email='$username') AND password='$password'");
			if($query->num_rows()==1){
				$row=$query->row();
				$verify=$row->emailVerify;
				
				if($verify=='yes' || $verify=='standby'){
					$this->load->helper('cookie');
					if($this->input->post('remember')){
						$cookie1=array('name'=>'remember_me_user','value'=>$username,'expire'=>time()+50400,'path'=>'/');
						$cookie2=array('name'=>'remember_me_pass','value'=>$pass,'expire'=>time()+50400,'path'=>'/');
						set_cookie($cookie1);
						set_cookie($cookie2);
					}else{
						$value1=get_cookie('remember_me_user');
						$value2=get_cookie('remember_me_pass');
	            		if($value1 && $value2){
	            			
				            if($value1==$username){
				            	delete_cookie('remember_me_user');
				            	delete_cookie('remember_me_pass');
				            }
	            		}
					}

					$row=$query->row();
					$newdata=array('username'=>$row->username,'email'=>$row->email);
					$this->session->set_userdata($newdata);
					if($verify=='yes'){
						redirect('','location');
					}else{
						$query=$this->db->query("UPDATE user SET emailVerify='yes' WHERE username='$username'");
						return 1;
					}
				}else{
					return 2;
				}
			}else{
				return 3;
			}
		}

		public function getUsers(){

			//$query=this->db->get('user');

			//$this->db->select('*')->from('user');
			$this->db->select('*');
			$this->db->where('userID','6');
			$this->db->where('username','nisal');
			$this->db->from('user');
			$query=$this->db->get();
			return $query->result_array();
		}

		public function addNewUser($verifycode){
			$username=$this->input->post('username');
			$email=$this->input->post('email');
			$password=$this->input->post('password');
			$query=$this->db->query("INSERT INTO user(username,email,password,emailVerify) VALUES('$username','$email','$password','$verifycode')");
			if($query){
				//$newdata=array('username'=>$username,'email'=>$email);
				//$this->session->set_userdata($newdata);
				return true;
			}else{
				return false;
			}
		}

		public function checkExist($str,$table,$column){
			$query=$this->db->query("SELECT * FROM $table WHERE $column='$str'");
			if($query->num_rows()==1){
				return true;
			}else{
				return false;
			}
		}

		public function setVerifyCode($email,$code){
			$query=$this->db->query("UPDATE user SET resetpasswordcode='$code' WHERE email='$email'");
			if($query){
				return true;
			}else{
				return false;
			}
		}

		public function getUsernameForEmail($email){
			$query=$this->db->query("SELECT username FROM user WHERE email='$email'");
			$row=$query->row();
			return $row->username;
		}

		public function isValidPasswordResetCode($username,$code){
			$query=$this->db->query("SELECT * FROM user WHERE username='$username' AND resetpasswordcode='$code'");
			if($query->num_rows()==1){
				return true;
			}else{
				return false;
			}
		}

		public function setNewPassword(){
			$password=$this->input->post('password1');
			$username=$this->input->post('username');
			$query1=$this->db->query("SELECT email FROM user WHERE username='$username'");
			$row=$query1->row();
			$email=$row->email;

			$query2=$this->db->query("UPDATE user SET password='$password',resetpasswordcode='init' WHERE username='$username'");
			if($query2){
				$newdata=array('username'=>$username,'email'=>$email);
				$this->session->set_userdata($newdata);
				return true;
			}else{
				return false;
			}
		}

		public function getEmailVerifycode($username){
			$query=$this->db->query("SELECT emailVerify FROM user WHERE username='$username'");
			$row=$query->row();
			return $row->emailVerify;
		}

		public function setStandby($username){
			$query=$this->db->query("UPDATE user SET emailVerify='standby' WHERE username='$username'");
		}

		public function setUserDetails(){
			$username=$this->session->userdata('username'); 
			$fn=$this->input->post('firstname');
			$ln=$this->input->post('lastname');
			$nic=$this->input->post('nic');
			$con=$this->input->post('contact');
			$ad1=$this->input->post('address1');
			$ad2=$this->input->post('address2');
			$ad3=$this->input->post('address3');
			$bn=$this->input->post('bankname');
			$holder=$this->input->post('holdername');
			$accnumber=$this->input->post('accnumber');
			
			$query=$this->db->query("UPDATE user SET firstname='$fn',lastname='$ln',nic='$nic',contact='$con',address1='$ad1',address2='$ad2',address3='$ad3',bank='$bn',holdername='$holder',accnum='$accnumber' WHERE username='$username'");
			
			if($query){
				return true;
			}else{
				return false;
			}
		}
	}
?>