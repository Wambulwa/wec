<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Start extends CI_Controller {

    function __construct()
    {
   parent::__construct();
	 $this->load->helper(array('form'));
   if($this->session->userdata('logged_in')):
     $session_data = $this->session->userdata('logged_in');
     $data['staff_wec_emp_no'] = $session_data['staff_wec_emp_no'];
     $data['staff_email'] = $session_data['staff_email'];
	 $data['staff_fname'] = $session_data['staff_fname'];
	 $data['staff_lname'] = $session_data['staff_lname'];
	 $data['staff_level'] = $session_data['staff_level'];
   else:
      redirect('login', 'refresh');
  endif;
 	}

 	function index()
 	{
 	$session_data = $this->session->userdata('logged_in');
 	$staff_level = $session_data['staff_level'];
	 if($staff_level==1):
	 	redirect('accounts','refresh');
	 elseif ($staff_level==2):
	 	redirect('sales','refresh');
	 elseif ($staff_level==3):
	 	redirect('cs','refresh');
 	 elseif ($staff_level==4):
	 	redirect('ops','refresh');
 	 elseif ($staff_level==5):
	 	redirect('accounts','refresh');
 	 elseif ($staff_level==6):
	 	redirect('accounts','refresh');
	 else :
	 endif;
}
}
