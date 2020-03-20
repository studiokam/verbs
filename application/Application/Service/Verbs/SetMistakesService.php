<?php


namespace application\Application\Service\Verbs;


use application\Domain\Model\Common\MistakesRepositoryInterface;

class SetMistakesService
{
	private $mistakesRepo;

	public function __construct(MistakesRepositoryInterface $mistakesRepository)
	{
		$this->mistakesRepo = $mistakesRepository;
	}

	public function execute($verbId, $status)
	{
		return $this->mistakesRepo->setMistake($verbId, $status);
	}
}
