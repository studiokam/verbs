<?php


namespace application\Infrastructure\Group;


use application\Domain\Model\Abstracts\AbstractRepository;
use application\Domain\Model\Groups\Group;
use application\Domain\Model\Groups\GroupRepositoryInterface;

class GroupRepository extends AbstractRepository implements GroupRepositoryInterface
{
	public function addNewGroup(Group $group)
	{
		$sql = 'INSERT INTO groups (groupName, groupAdditional) 
				VALUES (?, ?)';

		$params = [];
		$params[] = $group->getGroupName();
		$params[] = $group->getGroupAdditional();

		return $this->db->execute($sql, $params);
	}

	public function getAllGroups()
	{
		$sql = 'SELECT * FROM groups ORDER BY groupName';
//		$sql = 'SELECT *, count(tt) as ile FROM groups g
//				JOIN verb_group_relation vgr on g.id = vgr.group_id as tt
//				ORDER BY groupName';
//		$sql = 'SELECT *, count(tt) as ile FROM groups g
//				JOIN (SELECT count(id) as ile FROM verb_group_relation vgr on g.id = vgr.group_id
//				ORDER BY groupName';
		return $this->db->selectAll($sql);
	}

	public function deleteGroup($id)
	{
		$sql = 'DELETE FROM groups WHERE id = ?';
		$params = [];
		$params[] = $id;
		return $this->db->execute($sql, $params);
	}

	public function updateGroup(Group $group)
	{
		$sql = 'UPDATE groups SET groupName = ?, groupAdditional = ? WHERE id = ?';

		$params = [];
		$params[] = $group->getGroupName();
		$params[] = $group->getGroupAdditional();
		$params[] = $group->getId();

		return $this->db->execute($sql, $params);
	}

	public function getVerbsForGroup($groupId)
	{
		$sql = 'SELECT vgr.id as relationId, v.pl, v.inf, v.pastSimp1, v.pastPrac1 FROM verb_group_relation vgr
				JOIN verb v on v.id = vgr.verb_id
				WHERE group_id = ? ORDER BY v.inf';

		$params = [];
		$params[] = $groupId;

		return $this->db->select($sql, $params);
	}
}
