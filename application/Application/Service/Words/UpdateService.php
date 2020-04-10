<?php


namespace application\Application\Service\Words;


use application\Application\Service\Words\Payload\CreateServiceRequest;
use application\Domain\Model\Words\Word;
use application\Domain\Model\Words\WordsRepositoryInterface;

class UpdateService
{
	private $wordRepo;

	public function __construct(WordsRepositoryInterface $wordRepo)
	{
		$this->wordRepo = $wordRepo;
	}

	/**
	 * @param CreateServiceRequest $request
	 * @return bool
	 */
	public function execute(CreateServiceRequest $request)
	{
		$word = new Word($request->getWordPL(), $request->getWordEN());

		$word->setWordPLAdditional($request->getWordPLAdditional());
		$word->setWordPronunciation($request->getWordPronunciation());
		$word->setId($request->getId());

		return $this->wordRepo->updateWord($word);
	}
}
