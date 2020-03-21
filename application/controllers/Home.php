<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use application\Application\Service\Verbs\GetListService;
use application\Application\Service\Verbs\SetMistakesService;


class Home extends CI_Controller {

	public function index()
	{
		$data = array(
			'title' => 'Irregular Verbs'
		);
		$this->load->view('themes/header', $data);
		$this->load->view('home');
	}

	public function start_data()
	{
		$result = $this->getAllVerbs();

		$data = array(
			'allVerbs' => $result,
			'numberOfVerbs' => count($result)
		);

		echo json_encode($data);

	}

	public function getAllVerbs()
	{
		/** @var GetListService $allVerbs */
		$allVerbs = app_helper::getContainer()->get('get_verbs_list_service');
		return $allVerbs->execute();
	}

	public function getVerbsListFromDB()
	{
		$id = $this->input->raw_input_stream;

		if (isset($id) && $id != null) {
			// Get 
		} else {
			$data = array(
				'id'=> 0,
				'groupName'=> 'Wszystkie czasowniki',
				'groupAdditional'=> 'Lista wszystkich czasowników'
			);
		}

		echo json_encode($data);
	}
	public function setMistake()
	{
		$uiDataArray = json_decode($this->input->raw_input_stream, true);

		/** @var  SetMistakesService $mistakesService */
		$mistakesService = app_helper::getContainer()->get('set_mistakes_service');
		$response = $mistakesService->execute($uiDataArray['verbId'], $uiDataArray['status']);
		echo json_encode(['status' => $response]);
	}
}
