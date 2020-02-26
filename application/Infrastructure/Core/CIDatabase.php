<?php


namespace application\Infrastructure\Core;


use application\Domain\Model\Interfaces\DatabaseInterface;

class CIDatabase implements DatabaseInterface
{
	protected $db;

	public function __construct() {
		$CI = &get_instance();
		$this->db = $CI->db;
	}

	public function select($sqlCommand, $params = []) {
		return $this->db->query($sqlCommand, $params)->result();
	}

	public function selectAll($sqlCommand)
	{
		return $this->db->query($sqlCommand)->result();
	}

	public function execute($sqlCommand, $params = [])
	{
		return $this->db->query($sqlCommand, $params);
	}
}
