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
		$mistakeForId = $this->mistakesRepo->getMistakeById($verbId);
		$count = 10;

		if (count($mistakeForId) > 0) {
			if ($status == 'bad') {
				$count = $mistakeForId[0]->count + 5;
			} else {
				$count = $mistakeForId[0]->count > 0 ? $mistakeForId[0]->count - 1 : 0;
			}
			return $this->mistakesRepo->updateMistake($verbId, $count);
		} else if (count($mistakeForId) < 1 && $status == 'bad') {
			return $this->mistakesRepo->setMistake($verbId, $count);
		}

		return false;
	}
}
