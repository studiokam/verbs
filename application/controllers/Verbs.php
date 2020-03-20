<?php

use application\Application\Service\Groups\DeleteVerbFromGroupService;
use application\Application\Service\Groups\GetListService as GetGroupsListService;
use application\Application\Service\Verbs\GetGroupsForVerbService;
use application\Application\Service\Verbs\GetListService as GetVerbsListService;
use application\Application\Service\Verbs\CreateService;
use application\Application\Service\Exceptions\ValidationException;
use application\Application\Service\Verbs\DeleteService;
use application\Application\Service\Verbs\UpdateService;

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
			/** @var CreateService $createVerb */
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
			/** @var DeleteService $deleteVerb */
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
			/** @var UpdateService $updateVerb */
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
		$data = file_get_contents("php://input");
		$data = json_decode($data, true);

		// check if the verb is alredy in the group
		$verbInGroups = $this->getGroupsForVerb($data['verbId']);
		foreach ($verbInGroups as $group) {
			if ($group->id == $data['groupId']) {
				return $this->jsonErrorReturn('Czasownik jest już w tej grupie.');
			}
		}

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

	private function jsonErrorReturn($data = null)
	{
		echo json_encode([
			'status' => 0,
			'error' => 'Przepraszamy, wystąpił błąd po stronie serwisu. Spróbuj później.',
			'data' => $data
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
		/** @var GetGroupsForVerbService $service */
		$service = app_helper::getContainer()->get('get_groups_for_verb_service');
		return $service->execute($verbId);
	}
}
