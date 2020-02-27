<?php


namespace application\Domain\Model\Groups;


class Group
{
	/**
	 * @var int
	 */
	private $id;
	/**
	 * @var string
	 */
	private $groupName;
	/**
	 * @var string|null
	 */
	private $groupAdditional;

	/**
	 * @return int
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * @param int $id
	 */
	public function setId($id)
	{
		$this->id = $id;
	}

	/**
	 * @return string
	 */
	public function getGroupName()
	{
		return $this->groupName;
	}

	/**
	 * @param string $groupName
	 */
	public function setGroupName($groupName)
	{
		$this->groupName = $groupName;
	}

	/**
	 * @return string|null
	 */
	public function getGroupAdditional()
	{
		return $this->groupAdditional;
	}

	/**
	 * @param string|null $groupAdditional
	 */
	public function setGroupAdditional($groupAdditional)
	{
		$this->groupAdditional = $groupAdditional;
	}
}
