<?php


use application\Application\Service\Exceptions\ValidationException;
use application\Application\Service\Groups\CreateService;
use application\Application\Service\Groups\DeleteService;
use application\Application\Service\Groups\DeleteVerbFromGroupService;
use application\Application\Service\Groups\GetListService;
use application\Application\Service\Groups\GetVerbsForGroupService;
use application\Application\Service\Groups\Payload\CreateServiceRequest;
use application\Application\Service\Groups\UpdateService;

class Groups extends CI_Controller
{
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
		$allGroups = $this->getAllGroupsFromDB();
		echo json_encode([
			'baseUrl' => base_url(),
			'allGroups' => $allGroups
		]);
	}

	public function addNew()
	{
		$uiDataArray = json_decode($this->input->raw_input_stream, true);

		try {
			$request = $this->createRequest($uiDataArray);
			$createGroup = app_helper::getContainer()->get('create_group_service');
			/** @var CreateService $createGroup */
			if (!$createGroup->execute($request)) {
				$this->jsonErrorReturn();
			}
		} catch (ValidationException $e) {
			$this->jsonErrorReturn($e->getErrorsMessages());
			exit();
		} catch (\Exception $e) {
			$this->jsonErrorReturn();
		}

		$this->jsonSuccessData($this->getAllGroupsFromDB());
	}

	public function getAllGroups()
	{
		echo json_encode([ 'allGroups' => $this->getAllGroupsFromDB()]);
	}

	public function deleteGroup()
	{
		// todo
		// czy usuwanie grupy powinno czymś skutkować? (powiązania)

		$id = $this->input->raw_input_stream;

		try {
			$deleteGroup = app_helper::getContainer()->get('delete_group_service');
			/** @var DeleteService $deleteGroup */
			if (!$deleteGroup->execute($id)) {
				$this->jsonErrorReturn();
			}
		} catch (\Exception $e) {
			$this->jsonErrorReturn();
		}

		$this->jsonSuccessData($this->getAllGroupsFromDB());
	}

	public function editGroup()
	{
		$uiDataArray = json_decode($this->input->raw_input_stream, true);
		$request = $this->createRequest($uiDataArray);

		try {
			$updateGroup = app_helper::getContainer()->get('update_group_service');
			/** @var UpdateService $updateGroup */
			if (!$updateGroup->execute($request)) {
				$this->jsonErrorReturn();
			}
		} catch (ValidationException $e) {
			$this->jsonErrorReturn($e->getErrorsMessages());
			exit();
		} catch (\Exception $e) {
			$this->jsonErrorReturn();
			exit();
		}

		$this->jsonSuccessData($this->getAllGroupsFromDB());
	}

	public function deleteVerbFromGroup()
	{
		$uiDataArray = json_decode($this->input->raw_input_stream, true);

		try {
			$service = app_helper::getContainer()->get('delete_verb_from_group_service');
			/** @var DeleteVerbFromGroupService $service */
			if (!$service->execute($uiDataArray['relationId'])) {
				$this->jsonErrorReturn();
			}
			$verbGroupData = $this->getAllVerbsForGroup($uiDataArray['verbId']);
		} catch (\Exception $e) {
			$this->jsonErrorReturn();
		}

		$this->jsonSuccessData($verbGroupData);
	}

	public function getVerbGroups()
	{
		$id = $this->input->raw_input_stream;
		$this->jsonSuccessData($this->getAllVerbsForGroup($id));
	}

	public function allVerbsForGroup()
	{
		$id = $this->input->raw_input_stream;
		$this->jsonSuccessData($this->getAllVerbsForGroup($id));
	}

	private function getAllVerbsForGroup($groupId)
	{
		/** @var GetVerbsForGroupService $service */
		$service = app_helper::getContainer()->get('get_verbs_for_groups_service');
		return $service->execute($groupId);
	}

	private function getAllGroupsFromDB()
	{
		/** @var GetListService $allGroups */
		$allGroups = app_helper::getContainer()->get('get_groups_list_service');
		$response = $allGroups->execute();
		foreach ($response as $key => $value) {
			$verbsInGroup = $this->getAllVerbsForGroup($value->id);
			$response[$key]->verbsInGroup = count($verbsInGroup);
		}

		return $response;
	}

	/**
	 * @param $uiDataArray
	 * @return CreateServiceRequest
	 */
	private function createRequest($uiDataArray)
	{
		$request = new CreateServiceRequest();
		$request->setId($uiDataArray['id']);
		$request->setGroupName($uiDataArray['groupName']);
		$request->setGroupAdditional($uiDataArray['groupAdditional']);

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
}
