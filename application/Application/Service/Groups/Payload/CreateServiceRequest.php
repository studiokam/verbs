<?php


namespace application\Application\Service\Groups\Payload;


class CreateServiceRequest
{
	private $id;
	private $groupName;
	private $groupAdditional;

	/**
	 * @return mixed
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * @param mixed $id
	 */
	public function setId($id): void
	{
		$this->id = $id;
	}

	/**
	 * @return mixed
	 */
	public function getGroupName()
	{
		return $this->groupName;
	}

	/**
	 * @param mixed $groupName
	 */
	public function setGroupName(string $groupName): void
	{
		$this->groupName = $groupName;
	}

	/**
	 * @return mixed
	 */
	public function getGroupAdditional()
	{
		return $this->groupAdditional;
	}

	/**
	 * @param mixed $groupAdditional
	 */
	public function setGroupAdditional(?string $groupAdditional): void
	{
		$this->groupAdditional = $groupAdditional;
	}

}
