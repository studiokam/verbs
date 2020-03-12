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

	public function getVerbsForGroup($groupId)
	{
		if ($groupId === 'allWithoutKnown') {
			$sql = 'SELECT * FROM verb;';
			$allVerbs = $this->db->select($sql, [$groupId]);
			$needed = [];

			// id dla grupy "Umiem wszystkie na 100%" aby je wykluczyc z wyszukiwania

			foreach ($allVerbs as $verb) {
				$sql = 'SELECT count(*) count, g FROM verb_group_relation 
						JOIN groups g 
						WHERE verb_id = ? AND verb_id != ';
				$result = $this->db->select($sql, [$verb->id]);
				v()

				if (!$result[0]->count) {
					$needed[] = $verb;
				}
			}
			v(count($needed));
			v($needed);

			exit();
		} else if ($groupId === 'isNotInAnyOfGroups') {

		} else if ($groupId === 'recentlyMadeMistakesInThem') {

		} else {
			$sql = 'SELECT vgr.id as relationId, v.* FROM verb_group_relation vgr
				JOIN verb v on v.id = vgr.verb_id
				WHERE group_id = ? ORDER BY v.inf';
		}

		$params = [];
		$params[] = $groupId;

		return $this->db->select($sql, $params);
	}
}
