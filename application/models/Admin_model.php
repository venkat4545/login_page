<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function AddData($table,$data)
    {
        # code...
        $this->db->where('employee_id', $data['employee_id']);
            $query = $this->db->get($table);
            if($query->num_rows() > 0){
               return "User Already exist";
            }
            else{
               $this->db->insert($table, $data);
                return "New User Added";
            }
        
    }

    public function AddcardAdmin($table,$data)
    {
        # code...
        $this->db->where('card_id', $data['card_id']);
            $query = $this->db->get($table);
            if($query->num_rows() > 0){
                $this->db->update($table, $data);
            }
            else{
               $this->db->insert($table, $data);
            }
        
    }
  

    function can_login($user_name, $password)
    {
     $this->db->where('username', $user_name);
     $query = $this->db->get('admin');
     if($query->num_rows() > 0)
     {
      foreach($query->result() as $row)
      {
        if($password == $row->password)
        {
         $this->session->set_userdata('admin_id', $row->id);
         $this->session->set_userdata('admin_name', $row->username);

        //  $this->input->set_cookie('admin_id',$row->id,time()+60*60*30);
        //  $this->input->set_cookie('admin_name',$row->username,time()+60*60*30);

        }
        else
        {
         return 'Wrong Password';
        }
      }
     }
     else
     {
      return 'Wrong Username';
     }
   }  

   public function reset_mail($email)
   {

     $this->db->where('email',$email);
     $query = $this->db->get('admin');
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
    $query = $this->db->get('admin');
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
     $this->db->update('admin', $data);
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
     $this->db->update('admin', $data);
     return true;
   }

    public function checkUserExists($user)
    {
        $res = $this->db->get_where($this->db->dbprefix .  'users', array("username" => $user));
        if ($res->num_rows() > 0):
            return true;
        endif;
    }

   

    public function getAllData($table, $by = "id", $order = "DESC")
    {
        $this->db->order_by($by, $order);
        $res = $this->db->get($this->db->dbprefix . $table);
        if (@$res):
            return $res->result();
        endif;
    }
    

  

    public function updateData($table, $data, $id)
    {
        $res = $this->db->update($this->db->dbprefix . $table, $data, array("id" => $id));
        if ($res):
            return "Data Update Successfully";
        endif;
    }

    public function updateDataCard($table, $data, $id)
    {
        $res = $this->db->update($this->db->dbprefix . $table, $data, array("card_id" => $id));
        if ($res):
            return "Data Update Successfully";
        endif;
    }

    public function updateData_local($table, $data, $id)
    {
        $res = $this->db->update($this->db->dbprefix . $table, $data, array("card_id" => $id));
        if ($res):
            return "Data Update Successfully";
        endif;
    }

    

    public function getData($table, $id)
    {
        $res = $this->db->get_where($table, array("id" => $id))->row();
        return $res;
    }


    public function getDataCard($table, $id)
    {
        $res = $this->db->get_where($table, array("card_id" => $id))->row();
        return $res;
    }

    public function getDataCustom($table, $where)
    {
        $res = $this->db->get_where($table, $where)->row();
        return $res;
    }
    

    public function getDataCustom2($table, $where)
    {
        $res = $this->db->get_where($table, $where)->result();
        return $res;
    }

    public function deleteData($table, $id )
    {
        $this->db->where('id', $id);
        $res=$this->db->delete($table);
            if ($res):
                return TRUE;
            endif;
    }



 
}