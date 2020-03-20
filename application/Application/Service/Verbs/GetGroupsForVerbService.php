<?php


namespace application\Application\Service\Verbs;


use application\Domain\Model\Verbs\VerbRepositoryInterface;

class GetGroupsForVerbService
{
	private $verbRepo;

	public function __construct(VerbRepositoryInterface $verbRepo)
	{
		$this->verbRepo = $verbRepo;
	}

	public function execute($verbId)
	{
		return $this->verbRepo->getGroupsForVerbs($verbId);
	}
}
