<?php


namespace application\Domain\Model\Words;


class Word
{
	/**
	 * @var int
	 */
	private $id;
	/**
	 * @var string
	 */
	private $wordPL;
	/**
	 * @var string
	 */
	private $wordEN;
	/**
	 * @var string|null
	 */
	private $wordPLAdditional;
	/**
	 * @var string|null
	 */
	private $wordPronunciation;

	public function __construct(string $wordPL, string $wordEN, string $wordPLAdditional = null, $wordPronunciation = null)
	{
		$this->wordPL = $wordPL;
		$this->wordEN = $wordEN;
		$this->wordPLAdditional = $wordPLAdditional;
		$this->wordPronunciation = $wordPronunciation;
	}

	/**
	 * @return int
	 */
	public function getId(): int
	{
		return $this->id;
	}

	/**
	 * @param int $id
	 */
	public function setId(int $id): void
	{
		$this->id = $id;
	}

	/**
	 * @return string
	 */
	public function getWordPL(): string
	{
		return $this->wordPL;
	}

	/**
	 * @param string $wordPL
	 */
	public function setWordPL(string $wordPL): void
	{
		$this->wordPL = $wordPL;
	}

	/**
	 * @return string
	 */
	public function getWordEN(): string
	{
		return $this->wordEN;
	}

	/**
	 * @param string $wordEN
	 */
	public function setWordEN(string $wordEN): void
	{
		$this->wordEN = $wordEN;
	}

	/**
	 * @return string|null
	 */
	public function getWordPLAdditional(): ?string
	{
		return $this->wordPLAdditional;
	}

	/**
	 * @param string|null $wordPLAdditional
	 */
	public function setWordPLAdditional(?string $wordPLAdditional): void
	{
		$this->wordPLAdditional = $wordPLAdditional;
	}

	/**
	 * @return string|null
	 */
	public function getWordPronunciation(): ?string
	{
		return $this->wordPronunciation;
	}

	/**
	 * @param string|null $wordPronunciation
	 */
	public function setWordPronunciation(?string $wordPronunciation): void
	{
		$this->wordPronunciation = $wordPronunciation;
	}
}
