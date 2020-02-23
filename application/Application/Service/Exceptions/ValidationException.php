<?php


namespace application\Application\Service\Validations;



class ValidationException extends \Exception
{
	/**
	 * @var ValidationErrorHandler|null
	 */
	private $validationHandler = null;

	/**
	 * ValidationException constructor.
	 * @param ValidationErrorHandler $validationHandler
	 */
	public function __construct(ValidationErrorHandler $validationHandler)
	{
		parent::__construct('Validation error');
		$this->validationHandler = $validationHandler;
	}

	/**
	 * @return array
	 */
	public function getErrorsMessages()
	{
		return $this->validationHandler->getErrors();
	}
}
