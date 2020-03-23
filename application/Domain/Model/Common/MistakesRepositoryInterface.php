<?php


namespace application\Domain\Model\Common;


interface MistakesRepositoryInterface
{
	public function getAllMistakes(): array;

	public function setMistake($verbId, $count): bool;

	public function updateMistake($verbId, $count): bool;

	public function getMistakeById($id): array;
}
