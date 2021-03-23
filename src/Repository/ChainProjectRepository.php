<?php

namespace Ad3n\UseCase\Repository;

use Ad3n\UseCase\Model\ProjectInterface;
use Ad3n\UseCase\Model\ProjectRepositoryInterface;

class ChainProjectRepository implements ProjectRepositoryInterface
{
    /**
     * @var []ProjectRepositoryInterface
     */
    private $projectRepositories = [];

    public function __construct(array $projectRepositories = [])
    {
        foreach ($projectRepositories as $projectRepository) {
            if ($projectRepository instanceof ProjectRepositoryInterface) {
                $this->projectRepositories[] = $projectRepository;
            }
        }
    }

    public function persist(ProjectInterface $project)
    {
        foreach ($this->projectRepositories as $projectRepository) {
            $projectRepository->persist($project);
        }
    }

    public function getProjects(): array
    {
        foreach ($this->projectRepositories as $projectRepository) {
            if ($projectRepository->isPersistance()) {
                return $projectRepository->getProjects();
            }
        }

        return [];
    }

    public function isPersistance(): bool
    {
        return true;
    }
}
