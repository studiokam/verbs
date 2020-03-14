<?php


namespace application\Infrastructure\Group;


use application\Domain\Model\Abstracts\AbstractRepository;
use application\Domain\Model\Groups\Group;
use application\Domain\Model\Groups\GroupRepositoryInterface;
use application\Infrastructure\Common\MistakesRepository;
use application\Infrastructure\Core\CIDatabase;
use application\Infrastructure\Verb\RelationVerbGroupRepository;
use application\Infrastructure\Verb\VerbRepository;

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

	public function getGroupByName($name)
	{
		$sql = 'SELECT * FROM groups WHERE groupName = ?';
		return $this->db->select($sql, [$name]);
	}

	public function getVerbsForGroup($groupId)
	{
		if (in_array($groupId, ['allWithoutKnown', 'isNotInAnyOfGroups', 'recentlyMadeMistakesInThem'])) {
			$verbRepo = new VerbRepository(new CIDatabase());
			$allVerbs = $verbRepo->getAllVerbs();
			$verbs = [];
			$needed = [];
		}
		if ($groupId === 'allWithoutKnown') {

			// todo change this to sql
			$group = $this->getGroupByName('Umiem na 100%');
			$relationRepo = new RelationVerbGroupRepository(new CIDatabase());
			$verbsIsInGroup = $relationRepo->getRelationByGroupId($group[0]->id);

			foreach ($verbsIsInGroup as $key => $value) {
				$verbs[] = $value->verb_id;
			}

			foreach ($allVerbs as $verb) {
				if (!in_array($verb->id, $verbs)) {
					$needed[] = $verb;
				}
			}

			return $needed;

		} else if ($groupId === 'isNotInAnyOfGroups') {

			// todo change this to sql
			$relationRepo = new RelationVerbGroupRepository(new CIDatabase());
			$allRelations = $relationRepo->getAllRelations();

			foreach ($allRelations as $key => $value) {
				if (!in_array($value->verb_id, $verbs)) {
					$verbs[] = $value->verb_id;
				}
			}

			foreach ($allVerbs as $verb) {
				if (!in_array($verb->id, $verbs)) {
					$needed[] = $verb;
				}
			}

			return $needed;

		} else if ($groupId === 'recentlyMadeMistakesInThem') {
			$mistakesRepo = new MistakesRepository(new CIDatabase());
			$allMistakes = $mistakesRepo->getAllMistakes();

			foreach ($allMistakes as $ket => $value) {
				if (!in_array($value->verb_id, $verbs)) {
					$verbs[] = $value->verb_id;
				}
			}

			foreach ($allVerbs as $verb) {
				if (in_array($verb->id, $verbs)) {
					$needed[] = $verb;
				}
			}

			return $needed;

		} else {

			$sql = 'SELECT vgr.id as relationId, v.* FROM verb_group_relation vgr
				JOIN verb v on v.id = vgr.verb_id
				WHERE group_id = ? ORDER BY v.inf';

			$params = [];
			$params[] = $groupId;

			return $this->db->select($sql, $params);
		}

		return null;
	}
}
