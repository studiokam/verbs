<?php


namespace application\Application\Service;


use application\Domain\Model\Interfaces\DatabaseInterface;
use application\Infrastructure\Group\GroupRepository;

class GetVerbsForGroupService
{
	private $database;

	public function __construct(DatabaseInterface $database)
	{
		$this->database = $database;
	}

	public function execute($groupId)
	{
		$service = \app_helper::getContainer()->get('group_repository');
		/** @var GroupRepository $service */
		return $service->getVerbsForGroup($groupId);
	}
}
