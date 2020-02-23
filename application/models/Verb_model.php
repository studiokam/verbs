<?php


use application\Domain\Model\Verbs\Verb;

class Verb_model extends CI_Model
{
	public function createVerbFromPost(array $uiDataArray)
	{
		$verb = new Verb();

		if (!empty($uiDataArray['verbPL'])) {
			$verb->setVerbPL($uiDataArray['verbPL']);
		}

		if (!empty($uiDataArray['verbInf'])) {
			$verb->setVerbInf($uiDataArray['verbInf']);
		}

		if (!empty($uiDataArray['verbPastSimple1'])) {
			$verb->setVerbPastSimple1($uiDataArray['verbPastSimple1']);
		}

		if (!empty($uiDataArray['verbPastParticiple1'])) {
			$verb->setVerbPastParticiple1($uiDataArray['verbPastParticiple1']);
		}

		return $verb;
	}
}
