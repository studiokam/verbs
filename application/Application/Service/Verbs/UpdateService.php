<?php


namespace application\Application\Service\Verbs;


use application\Application\Service\Verbs\Payload\CreateServiceRequest;
use application\Domain\Model\Verbs\Verb;
use application\Domain\Model\Verbs\VerbRepositoryInterface;

class UpdateService
{
	private $verbRepo;

	public function __construct(VerbRepositoryInterface $verbRepo)
	{
		$this->verbRepo = $verbRepo;
	}

	/**
	 * @param CreateServiceRequest $request
	 * @return bool
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

		return $this->verbRepo->updateVerb($verb);
	}
}
