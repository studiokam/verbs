<?php


namespace application\Application\Service\Validations;


use application\Domain\Model\Verbs\Verb;

class VerbValidator
{
	public function validate(Verb $verb, ValidationErrorHandler $errorHandler)
	{
		if (empty($verb->getVerbPL())) {
			$errorHandler->handleError('Nie podano pisowni czasownika po polsku');
		}

		if (empty($verb->getVerbInf())) {
			$errorHandler->handleError('Nie podano pisowni czasownika w I formie (EN)');
		}

		if (empty($verb->getVerbPastSimple1())) {
			$errorHandler->handleError('Nie podano pisowni czasownika w II formie (EN)');
		}

		if (empty($verb->getVerbPastParticiple1())) {
			$errorHandler->handleError('Nie podano pisowni czasownika w III formie (EN)');
		}
	}
}
