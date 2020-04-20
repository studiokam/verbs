<?php

use application\Application\Service\Exceptions\ValidationException;
use application\Application\Service\Groups\GetListService as GetGroupsListService;
use application\Application\Service\Words\CreateService;
use application\Application\Service\Words\GetListService;
use application\Application\Service\Words\Payload\CreateServiceRequest;
use application\Application\Service\Words\UpdateService;

class Words extends CI_Controller
{

	public function index()
	{
		$data = ['title' => 'Words'];
		$this->load->view('themes/header', $data);
		$this->load->view('wordsView');
	}

	/**
	 * @throws Exception
	 */
	public function startData()
	{
		$data = array(
			'baseUrl' => base_url(),
			'allWords' => $this->getAllWords()
		);

		echo json_encode($data);
	}

	/**
	 * @throws Exception
	 */
	public function addNew()
	{
		$uiDataArray = json_decode($this->input->raw_input_stream, true);
		$request = $this->createRequest($uiDataArray);

		try {
			/** @var CreateService $createWordService*/
			$createWordService = app_helper::getContainer()->get('create_word_service');
			if (!$createWordService->execute($request)) {
				$this->jsonErrorReturn();
			}
		} catch (ValidationException $e) {
			$this->jsonErrorReturn($e->getErrorsMessages());
			exit();
		} catch (\Exception $e) {
			$this->jsonErrorReturn();
			exit();
		}

		$this->jsonSuccessData($this->getAllWords());
	}

	public function deleteWord()
	{

		// todo
		// czy usuwanie grupy powinno czymś skutkować? (powiązania)

		$id = $this->input->raw_input_stream;

		try {
			/** @var CreateService $createWordService*/
			$deleteWordService = app_helper::getContainer()->get('delete_word_service');
			if (!$deleteWordService->execute($id)) {
				$this->jsonErrorReturn();
			}
		} catch (\Exception $e) {
			$this->jsonErrorReturn();
		}

		$this->jsonSuccessData($this->getAllWords());
	}

	public function editWord()
	{
		$uiDataArray = json_decode($this->input->raw_input_stream, true);

		try {
			/** @var UpdateService $updateWordService*/
			$updateWordService = app_helper::getContainer()->get('update_word_service');
			$request = $this->createRequest($uiDataArray);
			if (!$updateWordService->execute($request)) {
				$this->jsonErrorReturn();
			}
		} catch (ValidationException $e) {
			$this->jsonErrorReturn($e->getErrorsMessages());
			exit();
		} catch (\Exception $e) {
			$this->jsonErrorReturn();
		}

		$this->jsonSuccessData($this->getAllWords());
	}

	private function createRequest($uiDataArray)
	{
		$request = new CreateServiceRequest();
		$request->setWordPL($uiDataArray['wordPL']);
		$request->setWordEN($uiDataArray['wordEN']);
		$request->setWordPLAdditional($uiDataArray['wordPLAdditional']);
		$request->setWordPronunciation($uiDataArray['wordPronunciation']);
		$request->setId($uiDataArray['id']);

		return $request;
	}

	public function getWordGroups()
	{
		$id = $this->input->raw_input_stream;
		$this->jsonSuccessData($this->getGroupsForVerb($id));
	}

	/**
	 * @param $wordId
	 * @return array
	 * @throws Exception
	 */
	private function getGroupsForWord($wordId): array
	{
		/** @var CreateService $createWordService*/
		$getGroupsForWordService = app_helper::getContainer()->get('get_groups_for_word_service');

		return $getGroupsForWordService->execute($wordId);
	}

	/**
	 * @return array
	 * @throws Exception
	 */
	private function getAllWords(): array
	{
		/** @var GetListService */
		$allWordsService = app_helper::getContainer()->get('get_words_list_service');
		return $allWordsService->execute();
	}

	// todo - zrobić z tego array obiekt z DB (to co pisałem z P)

	/**
	 * @return array
	 * @throws Exception
	 */
	private function getAllGroups(): array
	{
		/** @var GetGroupsListService */
		$allGroupsService = app_helper::getContainer()->get('get_groups_list_service');
		return $allGroupsService->execute();
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
