<?php


namespace application\Infrastructure\Word;


use application\Domain\Model\Abstracts\AbstractRepository;
use application\Domain\Model\Words\Word;
use application\Domain\Model\Words\WordsRepositoryInterface;

class WordRepository extends AbstractRepository implements WordsRepositoryInterface
{

	/**
	 * @return array
	 */
	public function getAllWords(): array
	{
		$sql = 'SELECT * FROM words ORDER BY wordPL';
		return $this->db->selectAll($sql);
	}

	/**
	 * @param Word $word
	 * @return bool
	 */
	public function addWord(Word $word): bool
	{
		$sql = 'INSERT INTO words (wordPL, wordEN, wordPLAdditional, wordPronunciation) 
				VALUES (?, ?, ?, ?)';

		$params = [];
		$params[] = $word->getWordPL();
		$params[] = $word->getWordEN();
		$params[] = $word->getWordPLAdditional();
		$params[] = $word->getWordPronunciation();

		return $this->db->execute($sql, $params);
	}

	/**
	 * @param int $id
	 * @return bool
	 */
	public function deleteWord(int $id): bool
	{
		$sql = 'DELETE FROM words WHERE id = ?';
		$params = [];
		$params[] = $id;
		return $this->db->execute($sql, $params);
	}

	/**
	 * @param Word $word
	 * @return bool
	 */
	public function updateWord(Word $word): bool
	{
		$sql = 'UPDATE words SET wordPL = ?, wordEN = ?, wordPLAdditional = ?, wordPronunciation = ?
				WHERE id = ?';

		$params = [];
		$params[] = $word->getWordPL();
		$params[] = $word->getWordEN();
		$params[] = $word->getWordPLAdditional();
		$params[] = $word->getWordPronunciation();
		$params[] = $word->getId();

		return $this->db->execute($sql, $params);
	}

	public function getWordByData(Word $word): bool
	{
		$sql = 'SELECT * FROM words WHERE wordPL = ? AND wordEN = ?';

		$params = [];
		$params[] = $word->getWordPL();
		$params[] = $word->getWordEN();

		$result = $this->db->select($sql, $params);
		return count($result) > 0;
	}

	/**
	 * @param int $verbId
	 * @return array
	 */
	public function getGroupsForWord(int $verbId): array
	{
		$sql = 'SELECT wgr.id as relationId, g.id, g.groupName, g.groupAdditional FROM word_group_relation wgr
				JOIN groups g on g.id = wgr.group_id
				WHERE verb_id = ? ORDER BY g.groupName';

		$params = [];
		$params[] = $verbId;

		return $this->db->select($sql, $params);
	}
}
