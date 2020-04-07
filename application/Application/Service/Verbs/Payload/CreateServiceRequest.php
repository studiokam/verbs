<?php

namespace application\Application\Service\Verbs\Payload;


class CreateServiceRequest
{
	private $id;
	private $verbPL;
	private $verbInf;
	private $verbPastSimple1;
	private $verbPastParticiple1;
	private $verbPastSimple2;
	private $verbPastParticiple2;
	private $verbPLAdditional;
	private $verbPronunciation;

	/**
	 * @param mixed $id
	 * @return CreateServiceRequest
	 */
	public function setId($id): CreateServiceRequest
	{
		$this->id = $id;
		return $this;
	}

	/**
	 * @param mixed $verbPL
	 * @return CreateServiceRequest
	 */
	public function setVerbPL($verbPL): CreateServiceRequest
	{
		$this->verbPL = $verbPL;
		return $this;
	}

	/**
	 * @param mixed $verbInf
	 * @return CreateServiceRequest
	 */
	public function setVerbInf($verbInf): CreateServiceRequest
	{
		$this->verbInf = $verbInf;
		return $this;
	}

	/**
	 * @param mixed $verbPastSimple1
	 * @return CreateServiceRequest
	 */
	public function setVerbPastSimple1($verbPastSimple1): CreateServiceRequest
	{
		$this->verbPastSimple1 = $verbPastSimple1;
		return $this;
	}

	/**
	 * @param mixed $verbPastParticiple1
	 * @return CreateServiceRequest
	 */
	public function setVerbPastParticiple1($verbPastParticiple1): CreateServiceRequest
	{
		$this->verbPastParticiple1 = $verbPastParticiple1;
		return $this;
	}

	/**
	 * @param mixed $verbPastSimple2
	 * @return CreateServiceRequest
	 */
	public function setVerbPastSimple2($verbPastSimple2): CreateServiceRequest
	{
		$this->verbPastSimple2 = $verbPastSimple2;
		return $this;
	}

	/**
	 * @param mixed $verbPastParticiple2
	 * @return CreateServiceRequest
	 */
	public function setVerbPastParticiple2($verbPastParticiple2): CreateServiceRequest
	{
		$this->verbPastParticiple2 = $verbPastParticiple2;
		return $this;
	}

	/**
	 * @param mixed $verbPLAdditional
	 * @return CreateServiceRequest
	 */
	public function setVerbPLAdditional($verbPLAdditional): CreateServiceRequest
	{
		$this->verbPLAdditional = $verbPLAdditional;
		return $this;
	}

	/**
	 * @param mixed $verbPronunciation
	 * @return CreateServiceRequest
	 */
	public function setVerbPronunciation($verbPronunciation): CreateServiceRequest
	{
		$this->verbPronunciation = $verbPronunciation;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * @return mixed
	 */
	public function getVerbPL()
	{
		return $this->verbPL;
	}

	/**
	 * @return mixed
	 */
	public function getVerbInf()
	{
		return $this->verbInf;
	}

	/**
	 * @return mixed
	 */
	public function getVerbPastSimple1()
	{
		return $this->verbPastSimple1;
	}

	/**
	 * @return mixed
	 */
	public function getVerbPastParticiple1()
	{
		return $this->verbPastParticiple1;
	}

	/**
	 * @return mixed
	 */
	public function getVerbPastSimple2()
	{
		return $this->verbPastSimple2;
	}

	/**
	 * @return mixed
	 */
	public function getVerbPastParticiple2()
	{
		return $this->verbPastParticiple2;
	}

	/**
	 * @return mixed
	 */
	public function getVerbPLAdditional()
	{
		return $this->verbPLAdditional;
	}

	/**
	 * @return mixed
	 */
	public function getVerbPronunciation()
	{
		return $this->verbPronunciation;
	}
}
