<?php


namespace application\Application\Service\Groups;


use application\Domain\Model\Groups\GroupRepositoryInterface;

class GetListService
{
	private $groupRepo;

	public function __construct(GroupRepositoryInterface $groupRepo)
	{
		$this->groupRepo = $groupRepo;
	}

	public function execute()
	{
		return $this->groupRepo->getAllGroups();
	}
}
