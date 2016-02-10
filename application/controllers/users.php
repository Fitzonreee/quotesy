<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		// $this->output->enable_profiler();
		$this->load->model('User');
	}

	//REGISTRAION
	public function register()
	{
		$result = $this->User->validate($this->input->post());

		if($result == "valid")
		{
	      $id = $this->User->create($this->input->post());
	      redirect(base_url());
	    } else
		    {
		      $errors = array(validation_errors());
		      $this->session->set_flashdata('errors', $errors);
		      redirect('/');
		    }
	}


	public function profile($id)
  {
  	//get user by id
  	$user_info = $this->User->get_user_by_id($this->session->userdata('user_id'));
    $this->load->view('user_reviews', array('user_info' => $user_info));
  	}

	//LOGIN
	public function login()
	{
		$id = $this->User->login_user($this->input->post());
		if (is_numeric($id))
		{
			$this->session->set_userdata('id', $id);
			$user_info = $this->User->get_user_by_id($this->session->userdata('id'));
			$this->session->set_userdata('first_name', $user_info['first_name']);
			redirect('/quotes');
		} else
			{
				$login_errors = array("<p>Login information is invalid.</p>");
		      	$this->session->set_flashdata('login_errors', $login_errors);
		      	redirect('/');
			}
	}
}
