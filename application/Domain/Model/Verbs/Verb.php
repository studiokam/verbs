<?php


namespace application\Domain\Model\Verbs;


class Verb
{
	/**
	 * @var int
	 */
	private $id;

	/**
	 * @var string|null Verb in PL
	 * Czasownik po polsku
	 */
	private $verbPL;

	/**
	 * @var string|null
	 * Verb - I form, Infinitive
	 * Czasownik - II forma, Infinitive
	 */
	private $verbInf;

	/**
	 * @var string|null
	 * Verb - II form, Past Simple (required)
	 * Czasownik - II forma, Past Simple (wymagane)
	 * Czasownik w II i III formie mogą mieć jedną lub dwie możliwości
	 */
	private $verbPastSimple1;

	/**
	 * @var string|null
	 * Verb - II form, Past Simple (not required)
	 * Czasownik - II forma, Past Simple (nie wymagane)
	 * Czasownik w II i III formie mogą mieć jedną lub dwie możliwości
	 */
	private $verbPastSimple2 = null;

	/**
	 * @var string|null
	 * Verb - II form, Past Practiciple (required)
	 * Czasownik - II forma, Past Practiciple (wymagane)
	 * Czasownik w II i III formie mogą mieć jedną lub dwie możliwości
	 */
	private $verbPastParticiple1;

	/**
	 * @var string|null
	 * Verb - II form, Past Practiciple (not required)
	 * Czasownik - II forma, Past Practiciple (nie wymagane)
	 * Czasownik w II i III formie mogą mieć jedną lub dwie możliwości
	 */
	private $verbPastParticiple2 = null;

	/**
	 * @var string|null
	 * PL additional description (not required)
	 * PL Dodatkowy Opis, kontekst (nie wymagane)
	 */
	private $verbPLAdditional = null;

	/**
	 * @var string|null
	 * Verb Pronunciation (not required)
	 * Wymowa czasownika (nie wymagane)
	 */
	private $verbPronunciation = null;

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
	 * @return string|null
	 */
	public function getVerbPL(): ?string
	{
		return $this->verbPL;
	}

	/**
	 * @param string|null $verbPL
	 */
	public function setVerbPL(?string $verbPL): void
	{
		$this->verbPL = $verbPL;
	}

	/**
	 * @return string|null
	 */
	public function getVerbInf(): ?string
	{
		return $this->verbInf;
	}

	/**
	 * @param string|null $verbInf
	 */
	public function setVerbInf(?string $verbInf): void
	{
		$this->verbInf = $verbInf;
	}

	/**
	 * @return string|null
	 */
	public function getVerbPastSimple1(): ?string
	{
		return $this->verbPastSimple1;
	}

	/**
	 * @param string|null $verbPastSimple1
	 */
	public function setVerbPastSimple1(?string $verbPastSimple1): void
	{
		$this->verbPastSimple1 = $verbPastSimple1;
	}

	/**
	 * @return string|null
	 */
	public function getVerbPastSimple2(): ?string
	{
		return $this->verbPastSimple2;
	}

	/**
	 * @param string|null $verbPastSimple2
	 */
	public function setVerbPastSimple2(?string $verbPastSimple2): void
	{
		$this->verbPastSimple2 = $verbPastSimple2;
	}

	/**
	 * @return string|null
	 */
	public function getVerbPastParticiple1(): ?string
	{
		return $this->verbPastParticiple1;
	}

	/**
	 * @param string|null $verbPastParticiple1
	 */
	public function setVerbPastParticiple1(?string $verbPastParticiple1): void
	{
		$this->verbPastParticiple1 = $verbPastParticiple1;
	}

	/**
	 * @return string|null
	 */
	public function getVerbPastParticiple2(): ?string
	{
		return $this->verbPastParticiple2;
	}

	/**
	 * @param string|null $verbPastParticiple2
	 */
	public function setVerbPastParticiple2(?string $verbPastParticiple2): void
	{
		$this->verbPastParticiple2 = $verbPastParticiple2;
	}

	/**
	 * @return string|null
	 */
	public function getVerbPLAdditional(): ?string
	{
		return $this->verbPLAdditional;
	}

	/**
	 * @param string|null $verbPLAdditional
	 */
	public function setVerbPLAdditional(?string $verbPLAdditional): void
	{
		$this->verbPLAdditional = $verbPLAdditional;
	}

	/**
	 * @return string|null
	 */
	public function getVerbPronunciation(): ?string
	{
		return $this->verbPronunciation;
	}

	/**
	 * @param string|null $verbPronunciation
	 */
	public function setVerbPronunciation(?string $verbPronunciation): void
	{
		$this->verbPronunciation = $verbPronunciation;
	}
}
