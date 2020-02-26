<?php


namespace application\Application\Service;


use application\Application\Service\Exceptions\ValidationException;
use application\Application\Service\Validations\ValidationErrorHandler;
use application\Application\Service\Validations\VerbValidator;
use application\Domain\Model\Interfaces\DatabaseInterface;
use application\Domain\Model\Verbs\Verb;
use application\Infrastructure\Verb\VerbRepository;

class CreateVerbService
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

		$verbRepo = new VerbRepository($this->database);
		return $verbRepo->addNewVerb($verb);
	}
}
