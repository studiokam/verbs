<?php


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

		$data = array(
			'baseUrl' => base_url(),
			'allGroups' => $allGroups
		);
		echo json_encode($data);
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
			/** @var application\Application\Service\CreateGroupService $createGroup */
			$response = $createGroup->execute($group);
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

		$allGroups = $this->getAllGroups();

		echo json_encode(['status' => 1, 'allGroups' => $allGroups, 'message' => 'Dodano do DBa']);
	}

	private function getAllGroups()
	{
		// Get all groups
		/** @var application\Application\Service\GetGroupsListService $allGroups */
		$allGroups = app_helper::getContainer()->get('get_groups_list');
		return $allGroups->execute();
	}

}
