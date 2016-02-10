<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	public function index()
	{
		$this->load->view('login_reg');
	}

	public function destroy()
	{
		$this->session->sess_destroy();
		redirect(base_url());
	}
}
