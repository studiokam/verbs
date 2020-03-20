<?php

namespace application\Application\Service\Verbs;


use application\Domain\Model\Verbs\VerbRepositoryInterface;

class DeleteService
{
	private $verbRepo;

	public function __construct(VerbRepositoryInterface $verbRepo)
	{
		$this->verbRepo = $verbRepo;
	}

	public function execute($verbId)
	{
		return $this->verbRepo->deleteVerb($verbId);
	}
}
