<?php


namespace application\Application\Service\Validations;


use application\Domain\Model\Groups\Group;
use application\Domain\Model\Groups\GroupRepositoryInterface;

class GroupValidator
{
	private $groupRepository;

	public function __construct(GroupRepositoryInterface $groupRepository)
	{
		$this->groupRepository = $groupRepository;
	}

	public function validate(Group $group, ValidationErrorHandler $errorHandler)
	{
		// Sprawdza czy jest w DB grupa o takiej nazwie PL
		$alreadyInDB = $this->groupRepository->getGroupByData($group);
		if ($alreadyInDB) {
			$errorHandler->handleError('Wydaje się, że taka grupa została już dodana.');
		}
	}
}
