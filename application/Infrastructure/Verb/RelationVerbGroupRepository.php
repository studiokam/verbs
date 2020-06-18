<?php


namespace application\Infrastructure\Verb;


use application\Domain\Model\Abstracts\AbstractRepository;
use application\Domain\Model\Verbs\RelationVerbGroupRepositoryInterface;

class RelationVerbGroupRepository extends AbstractRepository implements RelationVerbGroupRepositoryInterface
{
	public function getAllRelations()
	{
		$sql = 'SELECT * FROM group_relation';
		return $this->db->selectAll($sql);
	}

	public function getRelationByGroupId($groupId) {
		$sql = 'SELECT * FROM group_relation WHERE group_id = ?';
		return $this->db->select($sql, [$groupId]);
	}
}
