<?php


namespace application\Application\Service;


use application\Domain\Model\Interfaces\DatabaseInterface;
use application\Infrastructure\Verb\VerbRepository;

class AddVerbToGroupService
{
	private $database;

	public function __construct(DatabaseInterface $database)
	{
		$this->database = $database;
	}

	public function execute($data)
	{
		$service = \app_helper::getContainer()->get('verb_repository');
		/** @var VerbRepository $service */
		return $service->addVerbToGroup($data);
	}
}
