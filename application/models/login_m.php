<?php
Class Login_m extends CI_Model
{
  function __construct() {
    parent::__construct();
  }
function login($email, $password)
 {
  $query="staff_login.staff_id as staff_id, staff_login.staff_email as staff_email, staff_login.password as password, 
  employee.staff_wec_emp_no, employee.staff_sname as staff_lname, employee.staff_fname as staff_fname, employee.staff_level as staff_level, employee.dept_id as dept, employee.is_invoice_approver is_invoice_approver";
   // $this -> db -> select('staff_id, username, password');
  $email_column="staff_login.staff_email=$email";
   $this -> db -> select($query);
   $this -> db -> from('staff_login, employee');
   $this->db->where('staff_login.staff_id=employee.staff_wec_emp_no');
   $this->db->where('employee.active=1');
   $this -> db -> where('staff_login.staff_email', $email);
   $this -> db -> where('password', md5($password));
   $this -> db -> limit(1);

   $query = $this -> db -> get();

   if($query -> num_rows() == 1)
   {
     return $query->result();
   }
   else
   {
     return false;
   }
 }
  function registerNow($reg){
  $this->db->insert('employee',$reg);
 }
}
?>
