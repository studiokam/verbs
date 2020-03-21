<?php

use application\Application\Service\Groups\DeleteVerbFromGroupService;
use application\Application\Service\Groups\GetListService as GetGroupsListService;
use application\Application\Service\Verbs\GetGroupsForVerbService;
use application\Application\Service\Verbs\GetListService as GetVerbsListService;
use application\Application\Service\Verbs\CreateService;
use application\Application\Service\Exceptions\ValidationException;
use application\Application\Service\Verbs\DeleteService;
use application\Application\Service\Verbs\Payload\CreateServiceRequest;
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
		$uiDataArray = json_decode($this->input->raw_input_stream, true);

		try {
			$request = $this->createRequest($uiDataArray);
			if (!$this->createVerbService->execute($request)) {
				$this->jsonErrorReturn();
			}
		} catch (ValidationException $e) {
			$this->jsonErrorReturn($e->getErrorsMessages());
			exit();
		} catch (\Exception $e) {
			$this->jsonErrorReturn();
			exit();
		}

		$this->jsonSuccessData($this->getAllVerbs());
	}

	public function deleteVerb()
	{

		// todo
		// czy usuwanie grupy powinno czymś skutkować? (powiązania)

		$id = $this->input->raw_input_stream;

		try {
			if (!$this->deleteVerbService->execute($id)) {
				$this->jsonErrorReturn();
			}
		} catch (\Exception $e) {
			$this->jsonErrorReturn();
		}

		$this->jsonSuccessData($this->getAllVerbs());
	}

	public function editVerb()
	{
		$uiDataArray = json_decode($this->input->raw_input_stream, true);
		
		try {
			$request = $this->createRequest($uiDataArray);
			if (!$this->updateVerbService->execute($request)) {
				$this->jsonErrorReturn();
			}
		} catch (ValidationException $e) {
			$this->jsonErrorReturn($e->getErrorsMessages());
			exit();
		} catch (\Exception $e) {
			$this->jsonErrorReturn();
		}

		$this->jsonSuccessData($this->getAllVerbs());
	}

	public function addVerbToGroup()
	{
		$uiDataArray = json_decode($this->input->raw_input_stream, true);

		// check if the verb is already in the group
		$verbInGroups = $this->getGroupsForVerb($uiDataArray['verbId']);
		foreach ($verbInGroups as $group) {
			if ($group->id == $uiDataArray['groupId']) {
				$this->jsonErrorReturn('Czasownik jest już w tej grupie.');
				exit();
			}
		}

		try {
			if (!$this->addVerbToGroupService->execute($uiDataArray)) {
				$this->jsonErrorReturn();
			}
		} catch (\Exception $e) {
			$this->jsonErrorReturn();
		}

		$this->jsonSuccessData($this->getGroupsForVerb($uiDataArray['verbId']));
	}

	public function deleteVerbFromGroup()
	{
		$uiDataArray = json_decode($this->input->raw_input_stream, true);

		try {
			if (!$this->deleteVerbFromGroupService->execute($uiDataArray['relationId'])) {
				$this->jsonErrorReturn();
			}
		} catch (\Exception $e) {
			$this->jsonErrorReturn();
		}

		$this->jsonSuccessData($this->getGroupsForVerb($uiDataArray['verbId']));
	}

	public function getVerbGroups()
	{
		$id = $this->input->raw_input_stream;
		$this->jsonSuccessData($this->getGroupsForVerb($id));
	}

	/**
	 * @param $uiDataArray
	 * @return CreateServiceRequest
	 */
	private function createRequest($uiDataArray)
	{
		$request = new CreateServiceRequest();
		$request->setVerbPL($uiDataArray['verbPL']);
		$request->setVerbInf($uiDataArray['verbInf']);
		$request->setVerbPastSimple1($uiDataArray['verbPastSimple1']);
		$request->setVerbPastParticiple1($uiDataArray['verbPastParticiple1']);
		$request->setVerbPastSimple2($uiDataArray['verbPastSimple2']);
		$request->setVerbPastParticiple2($uiDataArray['verbPastParticiple2']);
		$request->setVerbPLAdditional($uiDataArray['verbPLAdditional']);
		$request->setVerbPronunciation($uiDataArray['verbPronunciation']);

		return $request;
	}

	/**
	 * @param $data
	 * @return void
	 */
	private function jsonSuccessData($data): void
	{
		echo json_encode([
			'status' => 1,
			'data' => $data
		]);
	}

	/**
	 * @param null $data
	 * @return void
	 */
	private function jsonErrorReturn($data = null): void
	{
		echo json_encode([
			'status' => 0,
			'data' => $data
		]);
	}

	// todo - zrobić z tego array obiekt z DB (to co pisałem z P)
	/**
	 * @return array
	 */
	private function getAllVerbs(): array
	{
		return $this->allVerbsService->execute();
	}

	private function getAllGroups()
	{
		return $this->allGroupsService->execute();
	}

	/**
	 * @param $verbId
	 * @return array
	 */
	private function getGroupsForVerb($verbId): array
	{
		return $this->getGroupsForVerbService->execute($verbId);
	}
}
