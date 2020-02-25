<?php
namespace application\Verb;


use application\Domain\Model\Abstracts\AbstractRepository;
use application\Domain\Model\Interfaces\DatabaseInterface;

class VerbRepository extends AbstractRepository implements DatabaseInterface
{

	public function select($sqlCommand, $params = [])
	{
		// TODO: Implement select() method.
	}

	public function execute($sqlCommand, $params = [])
	{
		// TODO: Implement execute() method.
	}

	public function affectedRows()
	{
		// TODO: Implement affectedRows() method.
	}

	public function lastInsertId()
	{
		// TODO: Implement lastInsertId() method.
	}

	public function getQueryRow($sqlCommand, $params = [])
	{
		// TODO: Implement getQueryRow() method.
	}

	public function queryResult($query, $params = [])
	{
		// TODO: Implement queryResult() method.
	}

	public function escapeLikeString(string $string)
	{
		// TODO: Implement escapeLikeString() method.
	}
}
