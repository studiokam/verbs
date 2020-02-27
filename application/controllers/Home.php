<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
		// Get all verbs
		/** @var application\Application\Service\GetVerbsListService $allVerbs */
		$allVerbs = app_helper::getContainer()->get('get_verbs_list');
		return $allVerbs->execute();
	}
}
