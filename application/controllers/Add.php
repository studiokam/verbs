<?php

class Add extends CI_Controller {

	public function index()
	{
		$policy = [
			'data' => 'dziś',
			'cena' => 120,
			'wiek' => 23
        ];
        $this->load->view('home.html');
		echo json_encode($policy);
	}

	public function start_data()
	{
		$policy = [
			'data' => 'dziś',
			'cena' => 120,
			'wiek' => 23
		];

		echo json_encode($policy);

	}
}
