<?php


namespace application\Application\Service;


use application\Domain\Model\Interfaces\DatabaseInterface;
use application\Infrastructure\Verb\VerbRepository;

class GetVerbsListService
{
	private $database;

	public function __construct(DatabaseInterface $database)
	{
		$this->database = $database;
	}

	public function execute()
	{
		$verbRepo = \app_helper::getContainer()->get('verb_repository');
		/** @var VerbRepository $verbRepo */
		return $verbRepo->getAllVerbs();
	}
}
