<?php
defined('BASEPATH') or exit('No direct script access allowed');

class F_login_model extends CI_Model
{
       
       public function recebe_usuarios()
       {

              $query = $this->db->get('usuarios');
              return $query->result_array();
       }


       public function recebe_usuario($login)
       {

              $this->db->where('email', $login);
              $query = $this->db->get('f_usuario');
              return $query->row_array();
       }

}
