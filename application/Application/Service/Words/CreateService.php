<?php


namespace application\Application\Service\Words;


use application\Application\Service\Exceptions\ValidationException;
use application\Application\Service\Validations\ValidationErrorHandler;
use application\Application\Service\Validations\WordValidator;
use application\Application\Service\Words\Payload\CreateServiceRequest;
use application\Domain\Model\Words\Word;
use application\Domain\Model\Words\WordsRepositoryInterface;

class CreateService
{
	private $wordsRepo;

	public function __construct(WordsRepositoryInterface $wordsRepo)
	{
		$this->wordsRepo = $wordsRepo;
	}

	/**
	 * @param CreateServiceRequest $serviceRequest
	 * @return bool
	 * @throws ValidationException
	 */
	public function execute(CreateServiceRequest $serviceRequest): bool
	{
		$word = new Word($serviceRequest->getWordPL(), $serviceRequest->getWordEN());
		$word->setWordPLAdditional($serviceRequest->getWordPLAdditional());
		$word->setWordPronunciation($serviceRequest->getWordPronunciation());

		$validateHandler = new ValidationErrorHandler();
		$validator = new WordValidator($this->wordsRepo);
		$validator->validate($word, $validateHandler);

		if ($validateHandler->hassErrors()) {
			throw new ValidationException($validateHandler);
		}

		return $this->wordsRepo->addWord($word);
	}
}
