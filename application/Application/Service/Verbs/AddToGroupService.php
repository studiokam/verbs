<?php


namespace application\Application\Service\Verbs;


use application\Domain\Model\Verbs\VerbRepositoryInterface;

class AddToGroupService
{
	private $verbRepo;

	public function __construct(VerbRepositoryInterface $verbRepo)
	{
		$this->verbRepo = $verbRepo;
	}

	public function execute($data)
	{
		return $this->verbRepo->addVerbToGroup($data);
	}
}
