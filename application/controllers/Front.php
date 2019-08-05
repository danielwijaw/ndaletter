<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Front extends CI_Controller {
	private function doViews($GET) 
	{
		if(!isset($GET['ajax'])){
			$this->load->view('template/header');
		}
		if(isset($GET['asdx'])){
			$this->load->view($GET['asdx']);
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

	public function create()
	{
		$_GET['asdx'] = 'front/create';
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
}
