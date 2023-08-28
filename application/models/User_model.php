<?php
class user_model extends CI_Model  
 {  


     public function addData($table,$data)
     {
          $this->db->insert($table, $data);
          return 'Card submitted successfully.';
    } 
    
    public function getData($table, $card_id)
    {
        $res = $this->db->get_where($table, array("card_id" => $card_id))->row();
        return $res;
    }
    

    public function getDataUserData($table, $id)
    {
        $res = $this->db->get_where($table, array("employee_id" => $id))->row();
        return $res;
    }

    public function updateData($table,$data,$card_id)
    {
        # code...
        $this->db->where('card_id', $card_id);
        $query = $this->db->get($table);
        if($query->num_rows() > 0){
            $this->db->where('card_id', $card_id);
            $this->db->update($table, $data);
            return " From submitted successfully";
        }
        else{
           $this->db->insert($table, $data);
           return " From submitted successfully";
        }
    }
    public function user_can_login($email,$password)
    {
     $this->db->where('email',$email);
     $this->db->where('password',$password);
     $query=$this->db->get('users');
     if($query->num_rows()>0){
         foreach($query->result() as $row)
         {
           if($password == $row->password)
           {
            $this->session->set_userdata('user_name', $row->name);
           }
           else
           {
            return 'Wrong Password';
           }
         } 
     }else{
         return 'Invalid login';
     }
    }
    public function reset_mail_user($email)
   {

     $this->db->where('email',$email);
     $query = $this->db->get('users');
     if ($query->num_rows() > 0){
        foreach($query->result() as $row) {
         return $row->verification_key;
        }
     }
     else{
         return false;
     }
   }
   public function verify_key($key)
   {
     $this->db->where('verification_key', $key);
    $query = $this->db->get('users');
    $new_key = md5(rand());
    $data = array(
     'verification_key'  =>   $new_key 
    );
    if($query->num_rows() > 0)
    {
     foreach($query->result() as $row){
       $this->session->set_userdata('pass_id', $row->id);
     }
     $this->db->where('verification_key', $key);
     $this->db->update('users', $data);
     return true;
    }
    else
    {
     return false;
    }
   }
   public function change_password($data)
   {
      $this->db->where('id', $this->session->userdata('pass_id'));
     $this->db->update('users', $data);
     return true;
   }
    public function addfile($table,$file)
    {
         $this->db->insert($table, $file);
   } 

   public function checkUserExists($id)
   {
       $res = $this->db->get_where($this->db->dbprefix . 'travel_expenses', array("user_id" => $id));
       if ($res->num_rows() > 0):
           return true;
       endif;
   }

   public function getDataUser($table, $where)
   {
       $res = $this->db->get_where($table, $where)->result();
       return $res;
   }

   public function user_singnup($table,$data)
   {
          $this->db->insert($table, $data);
          return 'user created successfully.';
   }
} 