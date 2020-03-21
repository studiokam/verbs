<?php


namespace application\Application\Service\Validations;


use application\Domain\Model\Verbs\Verb;
use application\Domain\Model\Verbs\VerbRepositoryInterface;

class VerbValidator
{
	private $verbRepository;

	public function __construct(VerbRepositoryInterface $verbRepository)
	{
		$this->verbRepository = $verbRepository;
	}

	public function validate(Verb $verb, ValidationErrorHandler $errorHandler)
	{
		// Sprawdza czy jest w DB czasownik o takiej nazwie PL lub we wszystkich III formach (inf, pastSimp1, pastPrac1)
		$alreadyInDB = $this->verbRepository->getVerbByData($verb);
		if ($alreadyInDB) {
			$errorHandler->handleError('Wydaje się, że taki czasowni został już dodany.');
		}
	}
}
