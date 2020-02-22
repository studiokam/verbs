<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$data = array(
			'title' => 'Irregular Verbs'
		);
		$this->load->view('themes/header', $data);
		$this->load->view('home');
	}

	public function start_data()
	{
		$policy = array(
			'data' => 'dziś',
			'cena' => 120,
			'wiek' => 23
		);

		echo json_encode($policy);

	}
}
