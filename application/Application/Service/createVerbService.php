<?php


namespace application\Application\Service;


use application\Application\Service\Exceptions\ValidationException;
use application\Application\Service\Validations\ValidationErrorHandler;
use application\Application\Service\Validations\VerbValidator;
use application\Domain\Model\Verbs\Verb;

class createVerbService
{
	/**
	 * @param Verb $verb
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
		v('insert');
	}
}
