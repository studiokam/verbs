<?php


use application\Domain\Model\Verbs\Verb;

class Verb_model extends CI_Model
{
	public function createVerbFromPost(array $uiDataArray)
	{
		$verb = new Verb();

		if (!empty($uiDataArray['id'])) {
			$verb->setId($uiDataArray['id']);
		}

		if (!empty($uiDataArray['verbPL'])) {
			$verb->setVerbPL($uiDataArray['verbPL']);
		}

		if (!empty($uiDataArray['verbInf'])) {
			$verb->setVerbInf($uiDataArray['verbInf']);
		}

		if (!empty($uiDataArray['verbPastSimple1'])) {
			$verb->setVerbPastSimple1($uiDataArray['verbPastSimple1']);
		}

		if (!empty($uiDataArray['verbPastSimple2'])) {
			$verb->setVerbPastSimple2($uiDataArray['verbPastSimple2']);
		}

		if (!empty($uiDataArray['verbPastParticiple1'])) {
			$verb->setVerbPastParticiple1($uiDataArray['verbPastParticiple1']);
		}

		if (!empty($uiDataArray['verbPastParticiple2'])) {
			$verb->setVerbPastParticiple2($uiDataArray['verbPastParticiple2']);
		}

		if (!empty($uiDataArray['verbPLAdditional'])) {
			$verb->setVerbPLAdditional($uiDataArray['verbPLAdditional']);
		}

		if (!empty($uiDataArray['verbPronunciation'])) {
			$verb->setVerbPronunciation($uiDataArray['verbPronunciation']);
		}

		return $verb;
	}
}
