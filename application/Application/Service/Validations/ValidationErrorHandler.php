<?php

namespace application\Application\Service\Validations;


class ValidationErrorHandler
{
	/**
	 * @var array Errors
	 */
	private $errors = [];

	/**
	 * @param $errorMessage
	 */
	public function handleError(string $errorMessage)
	{
		$this->errors[] = $errorMessage;
	}

	/**
	 * @return bool
	 */
	public function hassErrors(): bool
	{
		return count($this->errors) > 0;
	}

	/**
	 * @return array
	 */
	public function getErrors(): array
	{
		return $this->errors;
	}
}
