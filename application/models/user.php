<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Model
{
  public function validate($post)
  {
    $this->load->library('form_validation');
    $this->form_validation->set_rules('first_name', 'First Name', 'trim|required|min_length[3]');
    $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
    $this->form_validation->set_rules('alias', 'Alias', 'trim|required|is_unique[users.alias]');
    $this->form_validation->set_rules('email', 'Email', 'trim|required|is_unique[users.email]');
    $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]|matches[confirm_password]');
    $this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'trim|required');
    $this->form_validation->set_rules('dob', 'Date of birth', 'trim|required|exact_length[10]');

    if($this->form_validation->run()) {
      return "valid";
    } else {
      return array(validation_errors());
    }
  }

  public function create($post)
  {
    $query = "INSERT INTO users (first_name, last_name, alias, email,  dob, password, created_at, updated_at)
              VALUES (?,?,?,?,?,?,?,?)";
    $values = array($post['first_name'], $post['last_name'], $post['alias'], $post['email'], $post['dob'], $post['password'],  date("Y-m-d, H:i:s"), date("Y-m-d, H:i:s"));
    $id = $this->db->insert_id($this->db->query($query, $values));
    return $id;
  }

  public function login_user($post)
  {
    $email = $post['email'];

    $query = "SELECT * FROM users WHERE email = ?";
    $user = $this->db->query($query, array($email))->row_array();
    if ($user)
    {
      if($post['password'] == $user['password'])
      {
        return $user['id'];
      }
    }
  }

  public function get_user_by_id($id)
  {
    $query = "SELECT * FROM users WHERE id = ?";
    return $this->db->query($query, array($id))->row_array();
  }
}
