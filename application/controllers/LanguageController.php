<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LanguageController extends CI_Controller {
	public function changeLanguage($lan){
		$this->load->helper('cookie');
		if($lan=='Sinhala'){
			$cookie=array('name'=>'language','value'=>'Sinhala','expire'=>time()+50400,'path'=>'/');
		}else if($lan=='Tamil'){
			$cookie=array('name'=>'language','value'=>'Tamil','expire'=>time()+50400,'path'=>'/');
		}else{
			$cookie=array('name'=>'language','value'=>'English','expire'=>time()+50400,'path'=>'/');
		}
		set_cookie($cookie);
		redirect('','refresh');
	}
}