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
}
