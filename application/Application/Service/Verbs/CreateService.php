<?php


namespace application\Application\Service\Verbs;


use application\Application\Service\Exceptions\ValidationException;
use application\Application\Service\Validations\ValidationErrorHandler;
use application\Application\Service\Validations\VerbValidator;
use application\Application\Service\Verbs\Payload\CreateServiceRequest;
use application\Domain\Model\Verbs\Verb;
use application\Domain\Model\Verbs\VerbRepositoryInterface;

class CreateService
{
	private $verbRepo;

	public function __construct(VerbRepositoryInterface $verbRepo)
	{
		$this->verbRepo = $verbRepo;
	}

	/**
	 * @param CreateServiceRequest $request
	 * @return bool
	 * @throws ValidationException
	 */
	public function execute(CreateServiceRequest $request)
	{
		$verb = new Verb($request->getVerbPL(), $request->getVerbInf(), $request->getVerbPastSimple1(),
			$request->getVerbPastParticiple1());

		$verb
			->setVerbPastSimple2($request->getVerbPastSimple2())
			->setVerbPastParticiple2($request->getVerbPastParticiple2())
			->setVerbPLAdditional($request->getVerbPLAdditional())
			->setVerbPronunciation($request->getVerbPronunciation());

		$validateHandler = new ValidationErrorHandler();
		$validator = new VerbValidator($this->verbRepo);
		$validator->validate($verb, $validateHandler);

		if ($validateHandler->hassErrors()) {
			throw new ValidationException($validateHandler);
		}

		return $this->verbRepo->addNewVerb($verb);
	}
}
