<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {
	public function index()
	{
		$this->load->view('_partial/sidebar');
		$this->load->view('content');
		$this->load->view('_partial/footer');
	}
	function Education(){
		$this->load->view('_partial/sidebar');
		$this->load->view('content2');
		$this->load->view('_partial/footer');	
	}	
	function Education2(){
		$this->load->view('_partial/sidebar');
		$this->load->view('content3');
		$this->load->view('_partial/footer');
	}
	function Education3(){
		$this->load->view('_partial/sidebar');
		$this->load->view('content4');
		$this->load->view('_partial/footer');
	}
}
