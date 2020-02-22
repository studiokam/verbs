<?php

class Add extends CI_Controller {

	public function index()
	{
		$data = array(
			'title' => 'Add Verb'
		);
		$this->load->view('themes/header', $data);
		$this->load->view('add');
	}

	public function addNew()
	{
		$data = $this->input->post(null, true);
		v('data');
		v($data);
		$policy = array(
			'data' => 'dziś',
			'cena' => 120,
			'wiek' => 23
		);

		echo json_encode($policy);

	}

	public function startData()
	{
		$data = array(
			'baseUrl' => base_url()
		);
		echo json_encode($data);
	}
}
