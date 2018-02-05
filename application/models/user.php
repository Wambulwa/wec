<?php
Class User extends CI_Model
{
 function login($username, $password)
 {
  $query="staff_login.staff_id as staff_id, staff_login.username as username, staff_login.password as password, 
  staff.staff_id, staff.staff_lname as lname, staff.staff_fname as fname";
   // $this -> db -> select('staff_id, username, password');
   $this -> db -> select($query);
   $this -> db -> from('staff_login, staff');
   $this->db->where('staff_login.staff_id=staff.staff_id');
   $this->db->where('staff.active=1');
   $this -> db -> where('username', $username);
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
}
?>
