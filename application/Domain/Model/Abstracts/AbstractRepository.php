<?php


namespace application\Domain\Model\Abstracts;


use application\Domain\Model\Interfaces\DatabaseInterface;
class AbstractRepository
{
	/**
	 * @var DatabaseInterface
	 */
	protected $db;

	public function __construct(DatabaseInterface $db)
	{
		$this->db = $db;
	}
}
