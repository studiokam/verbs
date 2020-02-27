<?php


namespace application\Application\Service;


use application\Domain\Model\Interfaces\DatabaseInterface;
use application\Infrastructure\Group\GroupRepository;

class DeleteGroupService
{
	private $database;

	public function __construct(DatabaseInterface $database)
	{
		$this->database = $database;
	}

	public function execute($id)
	{
		$groupRepo = \app_helper::getContainer()->get('group_repository');
		/** @var GroupRepository $groupRepo */
		return $groupRepo->deleteGroup($id);
	}
}
