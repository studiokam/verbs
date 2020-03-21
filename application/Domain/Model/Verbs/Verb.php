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

	public function __construct($verbPL, $verbInf, $verbPastSimple1, $verbPastParticiple1, $verbPastSimple2 = null,
								$verbPastParticiple2 = null, $verbPLAdditional = null, $verbPronunciation = null)
	{
		$this->verbPL = $verbPL;
		$this->verbInf = $verbInf;
		$this->verbPastSimple1 = $verbPastSimple1;
		$this->verbPastSimple2 = $verbPastSimple2;
		$this->verbPastParticiple1 = $verbPastParticiple1;
		$this->verbPastParticiple2 = $verbPastParticiple2;
		$this->verbPLAdditional = $verbPLAdditional;
		$this->verbPronunciation = $verbPronunciation;
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
	 * @return Verb
	 */
	public function setId(int $id): Verb
	{
		$this->id = $id;
		return $this;
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
	 * @return Verb
	 */
	public function setVerbPL(?string $verbPL): Verb
	{
		$this->verbPL = $verbPL;
		return $this;
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
	 * @return Verb
	 */
	public function setVerbInf(?string $verbInf): Verb
	{
		$this->verbInf = $verbInf;
		return $this;
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
	 * @return Verb
	 */
	public function setVerbPastSimple1(?string $verbPastSimple1): Verb
	{
		$this->verbPastSimple1 = $verbPastSimple1;
		return $this;
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
	 * @return Verb
	 */
	public function setVerbPastSimple2(?string $verbPastSimple2): Verb
	{
		$this->verbPastSimple2 = $verbPastSimple2;
		return $this;
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
	 * @return Verb
	 */
	public function setVerbPastParticiple1(?string $verbPastParticiple1): Verb
	{
		$this->verbPastParticiple1 = $verbPastParticiple1;
		return $this;
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
	 * @return Verb
	 */
	public function setVerbPastParticiple2(?string $verbPastParticiple2): Verb
	{
		$this->verbPastParticiple2 = $verbPastParticiple2;
		return $this;
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
	 * @return Verb
	 */
	public function setVerbPLAdditional(?string $verbPLAdditional): Verb
	{
		$this->verbPLAdditional = $verbPLAdditional;
		return $this;
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
	 * @return Verb
	 */
	public function setVerbPronunciation(?string $verbPronunciation): Verb
	{
		$this->verbPronunciation = $verbPronunciation;
		return $this;
	}
}
