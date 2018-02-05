<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Verify_login extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   // $this->load->model('user','',TRUE);
   $this->load->model('login_m','',TRUE);
 }

 function index()
 {
   //This method will have the credentials validation
   $this->load->library('form_validation');

   $this->form_validation->set_rules('email', 'Email', 'trim|required');
   $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');

   if($this->form_validation->run() == FALSE)
   {
     //Field validation failed.  User redirected to login page
     $message1='Invalid username or password';
     //echo $message1;
     $this->load->view('header');
     $this->load->view('signin');
     $this->load->view('footer');
   }
   else
   {
     //Go to dashboard
     redirect('start', 'refresh');
   }

 }

 function check_database($password)
 {
   //Field validation succeeded.  Validate against database
   $email = $this->input->post('email');

   //query the database
   $result = $this->login_m->login($email, $password);

   if($result)
   {
     $sess_array = array();
     foreach($result as $row)
     {
       $sess_array = array(
         'staff_wec_emp_no' => $row->staff_wec_emp_no,
         'staff_email' => $row->staff_email,
         'staff_fname' => $row->staff_fname,
         'staff_lname' => $row->staff_lname,
         'is_invoice_approver' => $row->is_invoice_approver,
         'staff_level' => $row->staff_level
       );
       $this->session->set_userdata('logged_in', $sess_array);
     }
     return TRUE;
   }
   else
   {
     $this->form_validation->set_message('check_database', 'Invalid username or password');
     return false;
   }
 }
}
?>
