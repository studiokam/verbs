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
	 * @param array $uiDataArray
	 * @return bool
	 * @throws ValidationException
	 */
	public function execute(array $uiDataArray)
	{
		$verb = new Verb($uiDataArray['verbPL'], $uiDataArray['verbInf'], $uiDataArray['verbPastSimple1'],
			$uiDataArray['verbPastParticiple1']);

		$verb
			->setVerbPastSimple2($uiDataArray['verbPastSimple2'])
			->setVerbPastParticiple2($uiDataArray['verbPastParticiple2'])
			->setVerbPLAdditional($uiDataArray['verbPLAdditional'])
			->setVerbPronunciation($uiDataArray['verbPronunciation']);

		$validateHandler = new ValidationErrorHandler();
		$validator = new VerbValidator($this->verbRepo);
		$validator->validate($verb, $validateHandler);

		if ($validateHandler->hassErrors()) {
			throw new ValidationException($validateHandler);
		}

		return $this->verbRepo->addNewVerb($verb);
	}
}
