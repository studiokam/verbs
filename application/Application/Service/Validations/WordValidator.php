<?php


namespace application\Application\Service\Validations;




use application\Domain\Model\Words\Word;
use application\Domain\Model\Words\WordsRepositoryInterface;

class WordValidator
{
	private $wordsRepository;

	public function __construct(WordsRepositoryInterface $wordsRepository)
	{
		$this->wordsRepository = $wordsRepository;
	}

	public function validate(Word $word, ValidationErrorHandler $errorHandler)
	{
		// Sprawdza czy jest w DB słowo o takiej samej nazwie PL i EN
		$alreadyInDB = $this->wordsRepository->getWordByData($word);
		if ($alreadyInDB) {
			$errorHandler->handleError('Wydaje się, że takie słowo zostało już dodane.');
		}
	}
}
