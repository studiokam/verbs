<?php
namespace application\Infrastructure\Verb;


use application\Domain\Model\Abstracts\AbstractRepository;
use application\Domain\Model\Verbs\Verb;
use application\Domain\Model\Verbs\VerbRepositoryInterface;

class VerbRepository extends AbstractRepository implements VerbRepositoryInterface
{
	public function addNewVerb(Verb $verb)
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

	public function getAllVerbs()
	{
		$sql = 'SELECT * FROM verb';
		return $this->db->selectAll($sql);
	}

	public function deleteVerb($id)
	{
		$sql = 'DELETE FROM verb WHERE id = ?';
		$params = [];
		$params[] = $id;
		return $this->db->execute($sql, $params);
	}

	public function updateVerb(Verb $verb)
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
}
