<?php


namespace application\Application\Service\Groups;


use application\Domain\Model\Groups\GroupRepositoryInterface;

class DeleteService
{
	private $groupRepo;

	public function __construct(GroupRepositoryInterface $groupRepo)
	{
		$this->groupRepo = $groupRepo;
	}

	public function execute($id)
	{
		return $this->groupRepo->deleteGroup($id);
	}
}
