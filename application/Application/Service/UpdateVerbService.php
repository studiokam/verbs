<?php


namespace application\Application\Service;



use application\Domain\Model\Interfaces\DatabaseInterface;
use application\Domain\Model\Verbs\Verb;
use application\Infrastructure\Verb\VerbRepository;

class UpdateVerbService
{
	private $database;

	public function __construct(DatabaseInterface $database)
	{
		$this->database = $database;
	}

	public function execute(Verb $verb)
	{
		$verbRepo = \app_helper::getContainer()->get('verb_repository');
		/** @var VerbRepository $verbRepo */
		return $verbRepo->updateVerb($verb);
	}
}
