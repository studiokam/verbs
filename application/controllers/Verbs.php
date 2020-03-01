<?php

use application\Application\Service\CreateVerbService;
use application\Application\Service\DeleteGroupService;
use application\Application\Service\DeleteVerbFromGroupService;
use application\Application\Service\Exceptions\ValidationException;
use application\Application\Service\GetGroupsForVerbsService;
use application\Application\Service\GetGroupsListService;
use application\Application\Service\GetVerbsListService;
use application\Application\Service\UpdateGroupService;

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
			'allVerbs' => $this->getAllVerbs(),
			'allGroups' => $this->getAllGroups()
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
			/** @var CreateVerbService $createVerb */
			$response = $createVerb->execute($verb);
			if ($response != true) {
				return $this->jsonErrorReturn();
			}
			$allVerbs = $this->getAllVerbs();
		} catch (ValidationException $e) {
			echo json_encode(['status' => 0, 'validationErrors' => 1, 'errors' => $e->getErrorsMessages()]);
			return;
		} catch (\Exception $e) {
			return $this->jsonErrorReturn();
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
			/** @var DeleteGroupService $deleteVerb */
			$response = $deleteVerb->execute($id);
			if ($response != true) {
				return $this->jsonErrorReturn();
			}
			$allVerbs = $this->getAllVerbs();
		} catch (\Exception $e) {
			return $this->jsonErrorReturn();
		}

		echo json_encode([
			'status' => 1,
			'allVerbs' => $allVerbs,
			'message' => 'Usunięto czasownik'
		]);
	}

	public function editVerb()
	{
		// todo
		// sprawdzić czy jest juz czasownik o takiej nazwie
		// dodać walidacje na pola

		$data = file_get_contents("php://input");
		$verb = $this->verbModel->createVerbFromPost(json_decode($data, true));

		try {
			$updateVerb = app_helper::getContainer()->get('update_verb_service');
			/** @var UpdateGroupService $updateVerb */
			$response = $updateVerb->execute($verb);
			if ($response != true) {
				return $this->jsonErrorReturn();
			}
			$allVerbs = $this->getAllVerbs();
		} catch (ValidationException $e) {
			echo json_encode([
				'status' => 0,
				'validationErrors' => 1,
				'errors' => $e->getErrorsMessages()
			]);
			return;
		} catch (\Exception $e) {
			return $this->jsonErrorReturn();
		}

		echo json_encode([
			'status' => 1,
			'allVerbs' => $allVerbs,
			'message' => 'Zaktualizowanio'
		]);
	}

	public function addVerbToGroup()
	{
		// todo
		// czy nie ma juz takiego układu verb / group
		$data = file_get_contents("php://input");
		$data = json_decode($data, true);

		try {
			$addVerbToGroup = app_helper::getContainer()->get('add_verb_to_group_service');
			/** @var DeleteVerbFromGroupService $addVerbToGroup */
			$response = $addVerbToGroup->execute($data);
			if ($response != true) {
				return $this->jsonErrorReturn();
			}
			$verbGroupData = $this->getGroupsForVerb($data['verbId']);
		} catch (\Exception $e) {
			return $this->jsonErrorReturn();
		}

		return $this->jsonSuccessData($verbGroupData);
	}

	public function deleteVerbFromGroup()
	{
		$data = file_get_contents("php://input");
		$data = json_decode($data, true);

		try {
			$service = app_helper::getContainer()->get('delete_verb_from_group_service');
			/** @var DeleteVerbFromGroupService $service */
			$response = $service->execute($data['relationId']);
			if ($response != true) {
				return $this->jsonErrorReturn();
			}
			$verbGroupData = $this->getGroupsForVerb($data['verbId']);
		} catch (\Exception $e) {
			return $this->jsonErrorReturn();
		}

		return $this->jsonSuccessData($verbGroupData);
	}

	public function getVerbGroups()
	{
		$id = file_get_contents("php://input");
		$data = $this->getGroupsForVerb($id);
		return $this->jsonSuccessData($data);
	}

	private function jsonSuccessData($data)
	{
		echo json_encode([
			'status' => 1,
			'data' => $data
		]);
	}

	private function jsonErrorReturn()
	{
		echo json_encode([
			'status' => 0,
			'error' => 'Przepraszamy, wystąpił błąd po stronie serwisu. Spróbuj później.'
		]);
	}

	private function getAllVerbs()
	{
		/** @var GetVerbsListService $allVerbs */
		$allVerbs = app_helper::getContainer()->get('get_verbs_list_service');
		return $allVerbs->execute();
	}

	private function getAllGroups()
	{
		/** @var GetGroupsListService $allGroups */
		$allGroups = app_helper::getContainer()->get('get_groups_list_service');
		return $allGroups->execute();
	}

	private function getGroupsForVerb($verbId)
	{
		/** @var GetGroupsForVerbsService $service */
		$service = app_helper::getContainer()->get('get_groups_for_verb_service');
		return $service->execute($verbId);
	}
}
