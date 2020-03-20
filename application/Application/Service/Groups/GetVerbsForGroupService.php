<?php


namespace application\Application\Service\Groups;


use application\Domain\Model\Groups\GroupRepositoryInterface;

class GetVerbsForGroupService
{
	private $groupRepo;

	public function __construct(GroupRepositoryInterface $groupRepo)
	{
		$this->groupRepo = $groupRepo;
	}

	public function execute($groupId)
	{
		return $this->groupRepo->getVerbsForGroup($groupId);
	}
}
