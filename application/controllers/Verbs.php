<?php

use application\Application\Service\Groups\DeleteVerbFromGroupService;
use application\Application\Service\Groups\GetListService as GetGroupsListService;
use application\Application\Service\Verbs\GetGroupsForVerbService;
use application\Application\Service\Verbs\GetListService as GetVerbsListService;
use application\Application\Service\Verbs\CreateService;
use application\Application\Service\Exceptions\ValidationException;
use application\Application\Service\Verbs\DeleteService;
use application\Application\Service\Verbs\UpdateService;

class Verbs extends CI_Controller
{

	/**
	 * @var CreateService
	 */
	private $createVerbService;
	/**
	 * @var DeleteService
	 */
	private $deleteVerbService;
	/**
	 * @var UpdateService
	 */
	private $updateVerbService;
	/**
	 * @var DeleteVerbFromGroupService
	 */
	private $addVerbToGroupService;
	/**
	 * @var DeleteVerbFromGroupService
	 */
	private $deleteVerbFromGroupService;
	/**
	 * @var GetVerbsListService
	 */
	private $allVerbsService;
	/**
	 * @var GetGroupsListService
	 */
	private $allGroupsService;
	/**
	 * @var GetGroupsForVerbService
	 */
	private $getGroupsForVerbService;

	public function __construct()
	{
		parent::__construct();

		$this->createVerbService = app_helper::getContainer()->get('create_verb_service');
		$this->deleteVerbService = app_helper::getContainer()->get('delete_verb_service');
		$this->updateVerbService = app_helper::getContainer()->get('update_verb_service');
		$this->addVerbToGroupService = app_helper::getContainer()->get('add_verb_to_group_service');
		$this->deleteVerbFromGroupService = app_helper::getContainer()->get('add_verb_to_group_service');
		$this->allVerbsService = app_helper::getContainer()->get('get_verbs_list_service');
		$this->allGroupsService = app_helper::getContainer()->get('get_groups_list_service');
		$this->getGroupsForVerbService = app_helper::getContainer()->get('get_groups_for_verb_service');

	}

	public function index()
	{
		$data = ['title' => 'Verbs'];
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
		$uiDataArray = json_decode(file_get_contents("php://input"), true);

		try {
			if (!$this->createVerbService->execute($uiDataArray)) {
				return $this->jsonErrorReturn();
			}
		} catch (ValidationException $e) {
			return $this->jsonErrorReturn($e->getErrorsMessages());
		} catch (\Exception $e) {
			return $this->jsonErrorReturn();
		}

		return $this->jsonSuccessData($this->getAllVerbs());
	}

	public function deleteVerb()
	{

		// todo
		// czy usuwanie grupy powinno czymś skutkować? (powiązania)

		$id = file_get_contents("php://input");

		try {
			if (!$this->deleteVerbService->execute($id)) {
				return $this->jsonErrorReturn();
			}
		} catch (\Exception $e) {
			return $this->jsonErrorReturn();
		}

		return $this->jsonSuccessData($this->getAllVerbs());
	}

	public function editVerb()
	{
		// todo
		// sprawdzić czy jest juz czasownik o takiej nazwie
		// dodać walidacje na pola

		$uiDataArray = file_get_contents("php://input");
		$verb = $this->verbModel->createVerbFromPost(json_decode($uiDataArray, true));

		try {
			if (!$this->updateVerbService->execute($verb)) {
				return $this->jsonErrorReturn();
			}
		} catch (ValidationException $e) {
			return $this->jsonErrorReturn($e->getErrorsMessages());
		} catch (\Exception $e) {
			return $this->jsonErrorReturn();
		}

		return $this->jsonSuccessData($this->getAllVerbs());
	}

	public function addVerbToGroup()
	{
		$uiDataArray = file_get_contents("php://input");
		$uiDataArray = json_decode($uiDataArray, true);

		// check if the verb is already in the group
		$verbInGroups = $this->getGroupsForVerb($uiDataArray['verbId']);
		foreach ($verbInGroups as $group) {
			if ($group->id == $uiDataArray['groupId']) {
				return $this->jsonErrorReturn('Czasownik jest już w tej grupie.');
			}
		}

		try {
			if (!$this->addVerbToGroupService->execute($uiDataArray)) {
				return $this->jsonErrorReturn();
			}
		} catch (\Exception $e) {
			return $this->jsonErrorReturn();
		}

		return $this->jsonSuccessData($this->getGroupsForVerb($uiDataArray['verbId']));
	}

	public function deleteVerbFromGroup()
	{
		$uiDataArray = file_get_contents("php://input");
		$uiDataArray = json_decode($uiDataArray, true);

		try {
			if (!$this->deleteVerbFromGroupService->execute($uiDataArray['relationId'])) {
				return $this->jsonErrorReturn();
			}
		} catch (\Exception $e) {
			return $this->jsonErrorReturn();
		}

		return $this->jsonSuccessData($this->getGroupsForVerb($uiDataArray['verbId']));
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
			'data' => $data
		]);
	}

	private function getAllVerbs()
	{
		return $this->allVerbsService->execute();
	}

	private function getAllGroups()
	{
		return $this->allGroupsService->execute();
	}

	private function getGroupsForVerb($verbId)
	{
		return $this->getGroupsForVerbService->execute($verbId);
	}
}
