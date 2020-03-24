<?php

namespace application\Infrastructure\Common;


use application\Domain\Model\Abstracts\AbstractRepository;
use application\Domain\Model\Common\MistakesRepositoryInterface;

class MistakesRepository extends AbstractRepository implements MistakesRepositoryInterface
{
	/**
	 * @return array
	 */
	public function getAllMistakes(): array
	{
		$sql = 'SELECT * FROM mistakes';
		return $this->db->selectAll($sql);
	}

	/**
	 * @param $verbId
	 * @param $count
	 * @return bool
	 */
	public function setMistake($verbId, $count): bool
	{
		$sql = 'INSERT INTO mistakes (count, verb_id) VALUES (?, ?)';
		return $this->db->execute($sql, [$count, $verbId]);
	}

	/**
	 * @param $verbId
	 * @param $count
	 * @return bool
	 */
	public function updateMistake($verbId, $count): bool
	{
		$sql = 'UPDATE mistakes SET count = ? WHERE verb_id = ?';
		return $this->db->execute($sql, [$count, $verbId]);
	}

	/**
	 * @param $id
	 * @return array
	 */
	public function getMistakeById($id): array
	{
		$sql = 'SELECT * FROM mistakes WHERE verb_id = ?';
		return $this->db->select($sql, [$id]);
	}
}
