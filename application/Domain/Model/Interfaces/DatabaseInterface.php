<?php


namespace application\Domain\Model\Interfaces;


interface DatabaseInterface
{
	public function select($sqlCommand, $params = []);

	public function execute($sqlCommand, $params = []);

	public function affectedRows();

	public function lastInsertId();

	public function getQueryRow($sqlCommand, $params = []);

	public function queryResult($query, $params = []);

	public function escapeLikeString(string $string);
}
