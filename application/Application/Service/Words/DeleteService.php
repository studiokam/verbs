<?php

namespace application\Application\Service\Words;



use application\Domain\Model\Words\WordsRepositoryInterface;

class DeleteService
{
	private $wordRepo;

	public function __construct(WordsRepositoryInterface $wordRepo)
	{
		$this->wordRepo = $wordRepo;
	}

	public function execute($wordId)
	{
		return $this->wordRepo->deleteWord($wordId);
	}
}
