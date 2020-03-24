<?php


namespace application\Domain\Model\Words;


interface WordsRepositoryInterface
{
	public function getAllWords(): array;

	public function addWord(Word $word): bool;

	public function deleteWord(int $id): bool;

	public function getWordByData(Word $word): bool;

	public function getGroupsForWord(int $id): array;
}
