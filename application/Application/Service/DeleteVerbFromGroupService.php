<?php


namespace application\Application\Service;


use application\Domain\Model\Interfaces\DatabaseInterface;
use application\Infrastructure\Verb\VerbRepository;

class DeleteVerbFromGroupService
{
	private $database;

	public function __construct(DatabaseInterface $database)
	{
		$this->database = $database;
	}

	public function execute($id)
	{
		$service = \app_helper::getContainer()->get('verb_repository');
		/** @var VerbRepository $service */
		return $service->deleteVerbFromGroup($id);
	}
}
