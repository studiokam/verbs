<?php


namespace application\Domain\Model\Verbs;


interface VerbRepositoryInterface
{
	public function addNewVerb(Verb $verb): bool;

	public function getAllVerbs(): array;

	public function getVerbByData(Verb $verb): bool;

	public function deleteVerb(int $id): bool;

	public function updateVerb(Verb $verb): bool;

	public function addVerbToGroup(array $data): bool;

	public function getGroupsForVerbs(int $id): array;

	public function deleteVerbFromGroup(int $id): bool;

}
