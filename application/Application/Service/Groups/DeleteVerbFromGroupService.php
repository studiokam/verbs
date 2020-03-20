<?php


namespace application\Application\Service\Groups;


use application\Domain\Model\Verbs\VerbRepositoryInterface;

class DeleteVerbFromGroupService
{
	private $verbRepo;

	public function __construct(VerbRepositoryInterface $verbRepo)
	{
		$this->verbRepo = $verbRepo;
	}

	public function execute($id)
	{
		return $this->verbRepo->deleteVerbFromGroup($id);
	}
}
