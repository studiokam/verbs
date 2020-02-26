<?php

use application\Application\Service\Exceptions\ValidationException;

class AddVerb extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Verb_model', 'verbModel');
	}

	public function index()
	{
		$data = [
			'title' => 'Add Verb'
		];
		$this->load->view('themes/header', $data);
		$this->load->view('add');
	}

	public function addNew()
	{
//		$data = $this->input->post(null, false);
		$data = file_get_contents("php://input");
		$verb = $this->verbModel->createVerbFromPost(json_decode($data, true));

		try {
			$createVerb = app_helper::getContainer()->get('create_verb_service');
			/** @var application\Application\Service\CreateVerbService $createVerb */
			$response = $createVerb->execute($verb);
			if ($response != true) {
				echo json_encode(['status' => 0, 'error' => 'Przepraszamy, wystąpił błąd zapisu po stronie serwisu. Spróbuj później.']);
			}
		} catch (ValidationException $e) {
			echo json_encode(['status' => 0, 'validationErrors' => 1, 'errors' => $e->getErrorsMessages()]);
			return;
		} catch (\Exception $e) {
			echo json_encode(['status' => 0, 'error' => 'Przepraszamy, wystąpił błąd po stronie serwisu. Spróbuj później.']);
			return;
		}

		echo json_encode(['status' => 1, 'message' => 'Dodano do DBa']);
	}

	public function startData()
	{
		$data = array(
			'baseUrl' => base_url()
		);
		echo json_encode($data);
	}
}
