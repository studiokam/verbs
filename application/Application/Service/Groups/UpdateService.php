<?php


namespace application\Application\Service\Groups;


use application\Domain\Model\Groups\Group;
use application\Domain\Model\Groups\GroupRepositoryInterface;

class UpdateService
{
	private $groupRepo;

	public function __construct(GroupRepositoryInterface $groupRepo)
	{
		$this->groupRepo = $groupRepo;
	}

	public function execute(Group $group)
	{
		return $this->groupRepo->updateGroup($group);
	}
}
