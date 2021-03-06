<?php


namespace application\Domain\Model\Interfaces;


interface DatabaseInterface
{
	public function select($sqlCommand, $params = []);

	public function selectAll($sqlCommand);

	public function execute($sqlCommand, $params = []);
}
