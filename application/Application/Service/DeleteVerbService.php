<?php


namespace application\Application\Service\Verbs;


use application\Domain\Model\Interfaces\DatabaseInterface;
use application\Infrastructure\Verb\VerbRepository;

class DeleteVerbService
{
	private $database;

	public function __construct(DatabaseInterface $database)
	{
		$this->database = $database;
	}

	public function execute($id)
	{
		$verbRepo = \app_helper::getContainer()->get('verb_repository');
		/** @var VerbRepository $verbRepo */
		return $verbRepo->deleteVerb($id);
	}
}
