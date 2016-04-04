<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminController extends CI_Controller {
	public function advertiesments(){
		$this->load->view('admin/header');
		$this->load->view('admin/advertiesments');
	}

	public function pendingAds(){
		$this->load->model('AdminModel');
		$query=$this->AdminModel->getPendingAds();
		foreach ($query->result() as $row) {
			echo
			"<tr>
                <td>".$row->partID."</td>
                <td>".$row->date."</td>
                <td><a href='#'>".$row->username."</a></td>
                <td>".$row->title."</td>
                <td>".$row->price."</td>
                <td>".$row->state."</td>
                <td><button onclick='setApprove(".$row->partID.")' class='btn btn-primary' title='Approve'><i class='glyphicon glyphicon-ok'></i></button></td>
                <td><button onclick='' class='btn btn-default' title='Remove'><i class='glyphicon glyphicon-remove'></i></button></td>
                <td><a class='btn btn-success' title='more'>more</a></td>
            </tr>";
		}
	}

	public function approve($partID){
		$this->load->model('AdminModel');
		$query=$this->AdminModel->setApprove($partID);
	}
}
?>