<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Front extends CI_Controller {

	public function __construct()
    {
            parent::__construct();
            if(null == $this->session->userdata('nip')){
            	redirect('/login/index/');
            	die();
            }
    }

	private function doViews($GET) 
	{
		if(!isset($GET['data'])){
			$GET['data'] = array('data' => '');
		}else{
			$GET['data'] = $GET['data'];
		}
		if(!isset($GET['ajax'])){
			$this->load->view('template/header');
		}
		if(isset($GET['asdx'])){
			$this->load->view($GET['asdx'], $GET['data']);
		}
		if(!isset($GET['ajax'])){
			$this->load->view('template/footer');
		}
	}
	
	public function index()
	{
		$_GET['asdx'] = 'front/index';
		$this->doViews($_GET);
	}

	public function come()
	{
		$_GET['asdx'] = 'front/come';
		$this->doViews($_GET);
	}

	public function send()
	{
		$_GET['asdx'] = 'front/send';
		$this->doViews($_GET);
	}

	public function suratnotif()
	{
		$this->load->model('dataletter');
		$data = $this->dataletter->getletter_notif();
		$data = array('data' => $data);
		$this->load->view('/front/suratnotif', $data);
	}

	public function skipnotif()
	{
		$this->load->model('dataletter');
		$data = $this->dataletter->skipnotif();
		echo "NOTIFIKASI CLEAR";
	}
}
