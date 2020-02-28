<?php

use application\Application\Service\Exceptions\ValidationException;

class Verbs extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Verb_model', 'verbModel');
	}

	public function index()
	{
		$data = [
			'title' => 'Verbs'
		];
		$this->load->view('themes/header', $data);
		$this->load->view('verbs');
	}

	/**
	 * @throws Exception
	 */
	public function startData()
	{
		$data = array(
			'baseUrl' => base_url(),
			'allVerbs' => $this->getAllVerbs()
		);
		echo json_encode($data);
	}

	public function addNew()
	{
		// todo
		// - sprawdzenie czy dodawany verb jest już w db
		// - czy podawana nazwa PL jest podana, jesli tak to zasugerowanie
		//   podania innej lub dodatkowego opisu do kontekstu

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
			$allVerbs = $this->getAllVerbs();
		} catch (ValidationException $e) {
			echo json_encode(['status' => 0, 'validationErrors' => 1, 'errors' => $e->getErrorsMessages()]);
			return;
		} catch (\Exception $e) {
			echo json_encode(['status' => 0, 'error' => 'Przepraszamy, wystąpił błąd po stronie serwisu. Spróbuj później.']);
			return;
		}

		echo json_encode([
			'status' => 1,
			'allVerbs' => $allVerbs,
			'message' => 'Dodano do DBa'
		]);
	}

	public function deleteVerb()
	{

		// todo
		// czy usuwanie grupy powinno czymś skutkować? (powiązania)

		$id = file_get_contents("php://input");

		try {
			$deleteVerb = app_helper::getContainer()->get('delete_verb_service');
			/** @var application\Application\Service\DeleteGroupService $deleteVerb */
			$response = $deleteVerb->execute($id);
			if ($response != true) {
				echo json_encode([
					'status' => 0,
					'error' => 'Przepraszamy, wystąpił błąd usunięcia po stronie serwisu. Spróbuj później.'
				]);
			}
			$allVerbs = $this->getAllVerbs();
		} catch (\Exception $e) {
			echo json_encode([
				'status' => 0,
				'error' => 'Przepraszamy, wystąpił błąd po stronie serwisu. Spróbuj później.'
			]);
			return;
		}

		echo json_encode([
			'status' => 1,
			'allVerbs' => $allVerbs,
			'message' => 'Usunięto czasownik'
		]);
	}

	/**
	 * @return mixed all verbs
	 * @throws Exception
	 */
	private function getAllVerbs()
	{
		try {
			/** @var application\Application\Service\GetVerbsListService $allVerbs */
			$allVerbs = app_helper::getContainer()->get('get_verbs_list');
		} catch (\Exception $e) {
			echo json_encode([
				'status' => 0,
				'error' => 'Przepraszamy, wystąpił błąd pobieranai czasowników. Spróbuj później.'
			]);
			return null;
		}
		return $allVerbs->execute();
	}
}
