<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Access extends CI_Model {
     function check_user_login($username)
     {
         return $this->db->query(
         	"SELECT * FROM users WHERE username = ?", 
         	array($username))->row_array();
     }
     function register_user($post)
     {
        $query = "INSERT INTO users (name, username, password, created_at, updated_at) VALUES (?,?,?,?,?)";
         $values = array($post['name'],$post['username'],$post['password'],date('Y-m-d H:i:s'),date('Y-m-d H:i:s')); 
         return $this->db->query($query, $values);
     }
}

?>