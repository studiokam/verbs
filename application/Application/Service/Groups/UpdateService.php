<?php


namespace application\Application\Service\Groups;


use application\Application\Service\Groups\Payload\CreateServiceRequest;
use application\Domain\Model\Groups\Group;
use application\Domain\Model\Groups\GroupRepositoryInterface;

class UpdateService
{
	private $groupRepo;

	public function __construct(GroupRepositoryInterface $groupRepo)
	{
		$this->groupRepo = $groupRepo;
	}

	public function execute(CreateServiceRequest $request)
	{
		$group = new Group($request->getGroupName());
		$group->setId($request->getId());
		$group->setGroupAdditional($request->getGroupAdditional());

		return $this->groupRepo->updateGroup($group);
	}
}
