<?php
namespace application\Infrastructure\Verb;


use application\Domain\Model\Abstracts\AbstractRepository;
use application\Domain\Model\Verbs\Verb;
use application\Domain\Model\Verbs\VerbRepositoryInterface;

class VerbRepository extends AbstractRepository implements VerbRepositoryInterface
{
	/**
	 * @param Verb $verb
	 * @return bool
	 */
	public function addNewVerb(Verb $verb): bool
	{
		$sql = 'INSERT INTO verb (pl, plAdditional, inf, pastSimp1, pastSimp2, pastPrac1, pastPrac2, pronunciation) 
				VALUES (?, ?, ?, ?, ?, ?, ?, ?)';

		$params = [];
		$params[] = $verb->getVerbPL();
		$params[] = $verb->getVerbPLAdditional();
		$params[] = $verb->getVerbInf();
		$params[] = $verb->getVerbPastSimple1();
		$params[] = $verb->getVerbPastSimple2();
		$params[] = $verb->getVerbPastParticiple1();
		$params[] = $verb->getVerbPastParticiple2();
		$params[] = $verb->getVerbPronunciation();

		return $this->db->execute($sql, $params);
	}

	/**
	 * @return array
	 */
	public function getAllVerbs(): array
	{
		$sql = 'SELECT * FROM verb ORDER BY inf';
		return $this->db->selectAll($sql);
	}

	/**
	 * @param Verb $verb
	 * @return bool
	 */
	public function getVerbByData(Verb $verb): bool
	{
		$sql = 'SELECT * FROM verb WHERE (inf = ? AND pastSimp1 = ? AND pastPrac1 = ?) OR pl = ?';

		$params = [];
		$params[] = $verb->getVerbInf();
		$params[] = $verb->getVerbPastSimple1();
		$params[] = $verb->getVerbPastParticiple1();
		$params[] = $verb->getVerbPL();

		$result = $this->db->select($sql, $params);
		return count($result) > 0;
	}

	/**
	 * @param int $id
	 * @return bool
	 */
	public function deleteVerb(int $id): bool
	{
		$sql = 'DELETE FROM verb WHERE id = ?';
		$params = [];
		$params[] = $id;
		return $this->db->execute($sql, $params);
	}

	/**
	 * @param Verb $verb
	 * @return bool
	 */
	public function updateVerb(Verb $verb): bool
	{
		$sql = 'UPDATE verb SET pl = ?, plAdditional = ?, inf = ?, pastSimp1 = ?, pastSimp2 = ?, pastPrac1 = ?, pastPrac2 = ?, pronunciation = ?
				WHERE id = ?';

		$params = [];
		$params[] = $verb->getVerbPL();
		$params[] = $verb->getVerbPLAdditional();
		$params[] = $verb->getVerbInf();
		$params[] = $verb->getVerbPastSimple1();
		$params[] = $verb->getVerbPastSimple2();
		$params[] = $verb->getVerbPastParticiple1();
		$params[] = $verb->getVerbPastParticiple2();
		$params[] = $verb->getVerbPronunciation();
		$params[] = $verb->getId();

		return $this->db->execute($sql, $params);
	}

	/**
	 * @param array $data
	 * @return bool
	 */
	public function addVerbToGroup(array $data): bool
	{
		$sql = 'INSERT INTO verb_group_relation (verb_id, group_id)
					VALUES (?, ?)';
		$params = [];
		$params[] = $data['verbId'];
		$params[] = $data['groupId'];

		return $this->db->execute($sql, $params);
	}

	/**
	 * @param int $verbId
	 * @return array
	 */
	public function getGroupsForVerbs(int $verbId): array
	{
		$sql = 'SELECT vgr.id as relationId, g.id, g.groupName, g.groupAdditional FROM verb_group_relation vgr
				JOIN verbs_groups g on g.id = vgr.group_id
				WHERE verb_id = ? ORDER BY g.groupName';

		$params = [];
		$params[] = $verbId;

		return $this->db->select($sql, $params);
	}

	/**
	 * @param int $id
	 * @return bool
	 */
	public function deleteVerbFromGroup(int $id): bool
	{
		$sql = 'DELETE FROM verb_group_relation WHERE id = ?';
		$params = [];
		$params[] = $id;
		return $this->db->execute($sql, $params);
	}
}
