<?php


namespace application\Application\Service\Groups;


use application\Application\Service\Exceptions\ValidationException;
use application\Application\Service\Groups\Payload\CreateServiceRequest;
use application\Application\Service\Validations\GroupValidator;
use application\Application\Service\Validations\ValidationErrorHandler;
use application\Domain\Model\Groups\Group;
use application\Domain\Model\Groups\GroupRepositoryInterface;

class CreateService
{
	private $groupRepo;

	public function __construct(GroupRepositoryInterface $groupRepo)
	{
		$this->groupRepo = $groupRepo;
	}

	/**
	 * @param CreateServiceRequest $request
	 * @return bool
	 * @throws ValidationException
	 */
	public function execute(CreateServiceRequest $request)
	{
		$group = new Group($request->getGroupName());
		$group->setGroupAdditional($request->getGroupAdditional());

		$validateHandler = new ValidationErrorHandler();
		$validator = new GroupValidator($this->groupRepo);
		$validator->validate($group, $validateHandler);

		if ($validateHandler->hassErrors()) {
			throw new ValidationException($validateHandler);
		}

		return $this->groupRepo->addNewGroup($group);
	}
}
