<?php


namespace application\Application\Service;


use application\Domain\Model\Groups\Group;
use application\Domain\Model\Interfaces\DatabaseInterface;
use application\Infrastructure\Group\GroupRepository;

class UpdateGroupService
{
	private $database;

	public function __construct(DatabaseInterface $database)
	{
		$this->database = $database;
	}

	public function execute(Group $group)
	{
		$groupRepo = \app_helper::getContainer()->get('group_repository');
		/** @var GroupRepository $groupRepo */
		return $groupRepo->updateGroup($group);
	}
}
