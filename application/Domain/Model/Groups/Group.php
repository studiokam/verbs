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
	private $groupAdditional = null;

	public function __construct(string $groupName, string $groupAdditional = null)
	{
		$this->groupName = $groupName;
		$this->groupAdditional = $groupAdditional;
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
	 * @return void
	 */
	public function setId(int $id): void
	{
		$this->id = $id;
	}

	/**
	 * @return string
	 */
	public function getGroupName(): string
	{
		return $this->groupName;
	}

	/**
	 * @param string $groupName
	 * @return void
	 */
	public function setGroupName(string $groupName): void
	{
		$this->groupName = $groupName;
	}

	/**
	 * @return string|null
	 */
	public function getGroupAdditional(): ?string
	{
		return $this->groupAdditional;
	}

	/**
	 * @param string|null $groupAdditional
	 */
	public function setGroupAdditional(?string $groupAdditional): void
	{
		$this->groupAdditional = $groupAdditional;
	}
}
