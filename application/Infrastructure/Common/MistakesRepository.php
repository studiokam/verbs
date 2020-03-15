<?php

namespace application\Infrastructure\Common;


use application\Domain\Model\Abstracts\AbstractRepository;
use application\Domain\Model\Common\MistakesRepositoryInterface;

class MistakesRepository extends AbstractRepository implements MistakesRepositoryInterface
{
	public function getAllMistakes()
	{
		$sql = 'SELECT * FROM mistakes';
		return $this->db->selectAll($sql);
	}

	public function setMistake($verbId, $status)
	{
		$mistakeForId = $this->getMistakeById($verbId);
		$params = [];

		if (count($mistakeForId) > 0) {
			$sql = 'UPDATE mistakes SET count = ? WHERE verb_id = ?';
			if ($status == 'bad') {
				$params[] = $mistakeForId[0]->count + 5;
			} else {
				$params[] = $mistakeForId[0]->count > 0 ? $mistakeForId[0]->count - 1 : 0;
			}
		} else if (count($mistakeForId) < 1 && $status == 'bad') {
			$sql = 'INSERT INTO mistakes (count, verb_id) VALUES (?, ?)';
			$params[] = 10;
		}

		$params[] = $verbId;
		return $this->db->execute($sql, $params);
	}

	public function getMistakeById($id)
	{
		$sql = 'SELECT * FROM mistakes WHERE verb_id = ?';
		return $this->db->select($sql, [$id]);
	}
}
