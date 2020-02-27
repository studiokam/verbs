<?php


use application\Domain\Model\Groups\Group;

class Group_model extends CI_Model
{
	public function createGroupFromPost(array $uiDataArray)
	{
		$verb = new Group();

		if (!empty($uiDataArray['groupName'])) {
			$verb->setGroupName($uiDataArray['groupName']);
		}

		if (!empty($uiDataArray['groupAdditional'])) {
			$verb->setGroupAdditional($uiDataArray['groupAdditional']);
		}

		return $verb;
	}
}
