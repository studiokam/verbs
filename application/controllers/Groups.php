<?php


use application\Application\Service\CreateGroupService;
use application\Application\Service\DeleteGroupService;
use application\Application\Service\DeleteVerbFromGroupService;
use application\Application\Service\GetGroupsListService;
use application\Application\Service\GetVerbsForGroupService;
use application\Application\Service\UpdateGroupService;

class Groups extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Group_model', 'groupModel');
	}

	public function index()
	{
		$data = [
			'title' => 'Grupy'
		];
		$this->load->view('themes/header', $data);
		$this->load->view('groups');
	}

	public function startData()
	{
		$allGroups = $this->getAllGroups();
		echo json_encode([
			'baseUrl' => base_url(),
			'allGroups' => $allGroups
		]);
	}

	public function addNew()
	{
		// todo
		// - sprawdzenie czy dodawana grupa jest już w db
		// - czy podawana nazwa PL jest podana, jesli tak to zasugerowanie
		//   podania innej lub dodatkowego opisu do kontekstu

//		$data = $this->input->post(null, false);
		$data = file_get_contents("php://input");
		$group = $this->groupModel->createGroupFromPost(json_decode($data, true));

		try {
			$createGroup = app_helper::getContainer()->get('create_group_service');
			/** @var CreateGroupService $createGroup */
			$response = $createGroup->execute($group);
			if ($response != true) {
				return $this->jsonErrorReturn();
			}
			$allGroups = $this->getAllGroups();
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
			'allGroups' => $allGroups,
			'message' => 'Dodano do DBa'
		]);
	}

	private function getAllGroups()
	{
		/** @var GetGroupsListService $allGroups */
		$allGroups = app_helper::getContainer()->get('get_groups_list_service');
		$response = $allGroups->execute();
		foreach ($response as $key => $value) {
			$verbsInGroup = $this->getAllVerbsForGroup($value->id);
			$response[$key]->verbsInGroup = count($verbsInGroup);
		}

		return $response;
	}

	public function deleteGroup()
	{

		// todo
		// czy usuwanie grupy powinno czymś skutkować? (powiązania)

		$id = file_get_contents("php://input");

		try {
			$deleteGroup = app_helper::getContainer()->get('delete_group_service');
			/** @var DeleteGroupService $deleteGroup */
			$response = $deleteGroup->execute($id);
			if ($response != true) {
				return $this->jsonErrorReturn();
			}
			$allGroups = $this->getAllGroups();
		} catch (\Exception $e) {
			return $this->jsonErrorReturn();
		}

		echo json_encode([
			'status' => 1,
			'allGroups' => $allGroups,
			'message' => 'Usunięto grupę'
		]);
	}

	public function editGroup() {
		// todo
		// sprawdzić czy jest juz grupa o takiej nazwie
		$test = $this->input->post;

		$data = file_get_contents("php://input");
		$group = $this->groupModel->createGroupFromPost(json_decode($data, true));

		try {
			$updateGroup = app_helper::getContainer()->get('update_group_service');
			/** @var UpdateGroupService $updateGroup */
			$response = $updateGroup->execute($group);
			if ($response != true) {
				return $this->jsonErrorReturn();
			}
			$allGroups = $this->getAllGroups();
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
			'allGroups' => $allGroups,
			'message' => 'Zaktualizowanio'
		]);

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
			$verbGroupData = $this->getAllVerbsForGroup($data['verbId']);
		} catch (\Exception $e) {
			return $this->jsonErrorReturn();
		}

		return $this->jsonSuccessData($verbGroupData);
	}

	public function getVerbGroups()
	{
		$id = file_get_contents("php://input");
		$data = $this->getAllVerbsForGroup($id);
		return $this->jsonSuccessData($data);
	}

	private function getAllVerbsForGroup($groupId)
	{
		/** @var GetVerbsForGroupService $service */
		$service = app_helper::getContainer()->get('get_verbs_for_groups_service');
		return $service->execute($groupId);
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

}
