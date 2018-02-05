<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

public function __construct() {
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('login_m');
		$this->load->database();
	}

	public function index()
	{
		$this->load->view('header');
		$this->load->view('signin');
		$this->load->view('footer');
	}
	public function register()
	{
		$this->load->view('register');
		$this->load->view('footer');
	}
		public function registerNow()
	{
		$fname=$this->input->post('fname');
		if (isset($fname))
		{
			$reg = array(
				'staff_fname' =>$this->input->post('fname'),
				'staff_lname' =>$this->input->post('lname'),
				'staff_mname' =>$this->input->post('mname'),
				'staff_tel' =>$this->input->post('tel'),
				'staff_email' =>$this->input->post('email'),
				'staff_nid' =>$this->input->post('nid'),
				'staff_county' =>$this->input->post('county'),
				'staff_residence' =>$this->input->post('residence'),
				'staff_qualification' =>$this->input->post('qualification')
				);
			$this->login_m->registerNow($reg);
			$regDone['regMsg']="";
			$this->load->view('register_new',$regDone);
			$this->load->view('footer');
		}
		else{
			$this->load->view('register_new');
			$this->load->view('footer');
		}
		
	}
	public function forgot()
	{
		$this->load->view('forgot');
		$this->load->view('footer');
	}
	public function logout()
	{
		$this->session->unset_userdata('logged_in');
		redirect('login','refresh');
	 }
	 public function process_register(){
		 //'pass' => $this->input->post ('password');
		 $data = array(
			 //'staff_id' => $this->input->post('mobile'),
			 'username' => $this->input->post('username'),
			 'password'=>md5($this->input->post ('password'))
		  );
			$this->login_m->register($data);
			$data['message'] = 'Registration successful Successfully';
			$this->load->view('login', $data);
 	 }
	}
