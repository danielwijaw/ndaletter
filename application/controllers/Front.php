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

	public function comeform()
	{
		$this->load->model('dataletter');
		$data = $this->dataletter->getuser();
		$data = array('data' => $data);
		$_GET['data'] = $data;
		$this->load->view('/front/comeform', $data);
	}

	public function sendform()
	{
		$this->load->model('dataletter');
		$data = $this->dataletter->getuser();
		$data = array('data' => $data);
		$_GET['data'] = $data;
		$this->load->view('/front/sendform', $data);
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

	public function surat_masuk(){
		$this->load->model('dataletter');
		$total = $this->dataletter->getdatasuratcount('2');
		$row = ceil($total / 5);
		$button = "<ul class='pagination'>";
		for ($x = 0; $x < $row; $x++) {
			$xz = $x + 1;
			$xxz = ($xz*5)-5;
		    $button .= "<li><a onclick='ajaxpaging(`".base_url('/front/surat_masuk?page='.$xxz)."`)' href='javascript:void(0)'>$xz</a></li>";
		} 
		$button .= "</ul>";
		if($total <= 5){
			$button = '';
		}else{
			$button = $button;
		}
		$datapage = '';
		if(isset($_GET['page']))
		{
			$datapage = $_GET['page'];
		}
		$data = $this->dataletter->getdatasurat('2',$datapage,'5');
		$data = array('data' => $data,'button'=>$button);
		$this->load->view('/front/suratmasuk', $data);
	}

	public function surat_keluar(){
		$this->load->model('dataletter');
		$total = $this->dataletter->getdatasuratcount('1');
		$row = ceil($total / 5);
		$button = "<ul class='pagination'>";
		for ($x = 0; $x < $row; $x++) {
			$xz = $x + 1;
			$xxz = ($xz*5)-5;
		    $button .= "<li><a onclick='ajaxpaging(`".base_url('/front/surat_masuk?page='.$xxz)."`)' href='javascript:void(0)'>$xz</a></li>";
		} 
		$button .= "</ul>";
		if($total <= 5){
			$button = '';
		}else{
			$button = $button;
		}
		$datapage = '';
		if(isset($_GET['page']))
		{
			$datapage = $_GET['page'];
		}
		$data = $this->dataletter->getdatasurat('1',$datapage,'5');
		$data = array('data' => $data,'button'=>$button);
		$this->load->view('/front/suratkeluar', $data);
	}

	public function countsuratmasuk(){
		$this->load->model('dataletter');
		$total = $this->dataletter->getdatasuratcount('2');
		echo "<p><i class='fa fa-envelope-o'></i> Total Surat Masuk ".$total."</p>";
	}

	public function countsuratkeluar(){
		$this->load->model('dataletter');
		$total = $this->dataletter->getdatasuratcount('1');
		echo "<p><i class='fa fa-envelope-open-o'></i> Total Surat Keluar ".$total."</p>";
	}
}
