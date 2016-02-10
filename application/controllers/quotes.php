<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Quotes extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// $this->output->enable_profiler();
		$this->load->model('Quote');
	}

	public function index()
	{
		//This is going to grab all quotes that aren't favorties
		//Grab all quotes that are favorites

		$params = [];

		$user_id = $this->session->userdata('id');

		$params['quotes'] = $this->Quote->fetch_quotes($user_id);
		$params['favorite_quotes'] = $this->Quote->fetch_favorites($user_id);

		$this->load->view('profile', $params);
		// var_dump($params);
		// die();
	}

	public function add()
	{
		$this->Quote->add($this->input->post());

		redirect('/quotes'); //to appts controller to update table

	}

	public function remove($quote_id)
	{
		$user_id = $this->session->userdata('id');
		$this->Quote->remove($user_id, $quote_id);
		redirect('/quotes');
	}

	public function add_fav($quote_id)
	{
		$user_id = $this->session->userdata('id');
		$this->Quote->add_favorite($user_id, $quote_id);
		redirect('/quotes');
	}
}
