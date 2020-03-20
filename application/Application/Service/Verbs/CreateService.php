<?php


namespace application\Application\Service\Verbs;


use application\Application\Service\Exceptions\ValidationException;
use application\Application\Service\Validations\ValidationErrorHandler;
use application\Application\Service\Validations\VerbValidator;
use application\Domain\Model\Verbs\Verb;
use application\Domain\Model\Verbs\VerbRepositoryInterface;

class CreateService
{
	/**
	 * @var VerbRepositoryInterface
	 */
	private $verbRepo;

	public function __construct(VerbRepositoryInterface $verbRepo)
	{
		$this->verbRepo = $verbRepo;
	}

	/**
	 * @param Verb $verb
	 * @return bool
	 * @throws ValidationException
	 */
	public function execute(Verb $verb)
	{
		$validateHandler = new ValidationErrorHandler();
		$validator = new VerbValidator();
		$validator->validate($verb, $validateHandler);
		if ($validateHandler->hassErrors()) {
			throw new ValidationException($validateHandler);
		}
		return $this->verbRepo->addNewVerb($verb);
	}
}
