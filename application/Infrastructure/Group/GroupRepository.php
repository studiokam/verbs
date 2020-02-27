<?php


namespace application\Infrastructure\Group;


use application\Domain\Model\Abstracts\AbstractRepository;
use application\Domain\Model\Groups\Group;
use application\Domain\Model\Groups\GroupRepositoryInterface;

class GroupRepository extends AbstractRepository implements GroupRepositoryInterface
{
	public function addNewGroup(Group $verb)
	{
		$sql = 'INSERT INTO groups (groupName, groupAdditional) 
				VALUES (?, ?)';

		$params = [];
		$params[] = $verb->getGroupName();
		$params[] = $verb->getGroupAdditional();

		return $this->db->execute($sql, $params);
	}

	public function getAllGroups()
	{
		$sql = 'SELECT * FROM groups';
		return $this->db->selectAll($sql);
	}
}
