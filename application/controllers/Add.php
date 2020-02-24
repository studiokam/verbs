<?php

use application\Application\Service\createVerbService;
use application\Application\Service\Exceptions\ValidationException;
use application\Application\Service\Validations\VerbValidator;

class Add extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Verb_model', 'verbModel');
	}

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
//		$data = $this->input->post(null, false);
		$data = file_get_contents("php://input");
		$verb = $this->verbModel->createVerbFromPost(json_decode($data, true));

//		$servicePremium = app_helper::getContainer()->get('create_verb_service');
		$createVerb = new createVerbService();
		try {
			$createVerb->execute($verb);
		} catch (ValidationException $e) {
			echo json_encode($e->getErrorsMessages());
		}
		$response = array(
			'status' => 1,
			'message' => 'Dodano do DB'
		);

		echo json_encode($response);

	}

	public function startData()
	{
		$data = array(
			'baseUrl' => base_url()
		);
		echo json_encode($data);
	}
}
