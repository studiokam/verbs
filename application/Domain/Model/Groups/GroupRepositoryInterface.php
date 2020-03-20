<?php


namespace application\Domain\Model\Groups;


interface GroupRepositoryInterface
{
	public function addNewGroup(Group $group): bool;

	public function getAllGroups(): array;

	public function deleteGroup($id): bool;

	public function updateGroup(Group $group): bool;

	public function getGroupByName($name): array;

	public function getVerbsForGroup($groupId): array;
}
