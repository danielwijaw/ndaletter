<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->load->helper('dnl');
    }

	private function doViews($GET) 
	{
		if(!isset($GET['data'])){
			$GET['data'] = array('data' => '');
		}else{
			$GET['data'] = $GET['data'];
		}
		if(!isset($GET['ajax'])){
			$this->load->view('template/headerlogin');
		}
		if(isset($GET['asdx'])){
			$this->load->view($GET['asdx'], $GET['data']);
		}
		if(!isset($GET['ajax'])){
			$this->load->view('template/footerlogin');
		}
	}
	
	public function index()
	{
		if(null != $this->session->userdata('nip')){
        	redirect('/');
        	die();
        }
		if(null != $_POST){
			$this->load->model('dataletter');
			$post = array(
				'nip' => escapeString($_POST['nip']),
				'password' => md5(escapeString($_POST['password']))
			);
			$data = $this->dataletter->getlogin($post);
			if($data != null){
				$this->session->set_userdata($data[0]);
				redirect('/');
				die();
			}else{
				$_GET['data'] = array('data' => 'NIP / Password Anda Salah');
			}
		}
		$_GET['asdx'] = 'template/login';
		$this->doViews($_GET);
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('/');
	}
}
