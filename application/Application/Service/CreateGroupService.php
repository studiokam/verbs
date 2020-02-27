<?php


namespace application\Application\Service;


use application\Application\Service\Exceptions\ValidationException;
use application\Application\Service\Validations\ValidationErrorHandler;
use application\Application\Service\Validations\VerbValidator;
use application\Domain\Model\Groups\Group;
use application\Domain\Model\Interfaces\DatabaseInterface;
use application\Infrastructure\Group\GroupRepository;

class CreateGroupService
{
	/**
	 * @var DatabaseInterface
	 */
	private $database;

	public function __construct(DatabaseInterface $database)
	{
		$this->database = $database;
	}

	/**
	 * @param Group $group
	 * @return bool
	 * @throws ValidationException
	 */
	public function execute(Group $group)
	{
//		$validateHandler = new ValidationErrorHandler();
//		$validator = new VerbValidator();
//		$validator->validate($group, $validateHandler);
//		if ($validateHandler->hassErrors()) {
//			throw new ValidationException($validateHandler);
//		}
		$groupRepo = \app_helper::getContainer()->get('group_repository');
		/** @var GroupRepository $groupRepo */
		return $groupRepo->addNewGroup($group);
	}
}
