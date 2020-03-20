<?php


namespace application\Application\Service\Verbs;


use application\Domain\Model\Verbs\VerbRepositoryInterface;

class GetListService
{
	private $verbRepo;

	public function __construct(VerbRepositoryInterface $verbRepo)
	{
		$this->verbRepo = $verbRepo;
	}

	public function execute()
	{
		return $this->verbRepo->getAllVerbs();
	}
}
