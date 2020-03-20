<?php


namespace application\Application\Service\Verbs;


use application\Domain\Model\Verbs\Verb;
use application\Domain\Model\Verbs\VerbRepositoryInterface;

class UpdateService
{
	private $verbRepo;

	public function __construct(VerbRepositoryInterface $verbRepo)
	{
		$this->verbRepo = $verbRepo;
	}

	public function execute(Verb $verb)
	{
		return $this->verbRepo->updateVerb($verb);
	}
}
