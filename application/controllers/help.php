<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Help extends CI_Controller 
{
	function index()
	{
		$this->load->view('help/header');
		$this->load->view('help/left-nav');
		$this->load->view('help/top-nav');
		// $this->load->view('help/index');
		$this->load->view('help/footer');
	}
}