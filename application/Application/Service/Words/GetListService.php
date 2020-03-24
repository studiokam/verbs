<?php


namespace application\Application\Service\Words;


use application\Domain\Model\Words\WordsRepositoryInterface;

class GetListService
{
	private $wordsRepo;

	public function __construct(WordsRepositoryInterface $wordsRepo)
	{
		$this->wordsRepo = $wordsRepo;
	}

	/**
	 * @return array
	 */
	public function execute(): array
	{
		return $this->wordsRepo->getAllWords();
	}
}
