<?php

namespace Ad3n\UseCase\Repository;

use Ad3n\UseCase\Model\ProjectInterface;
use Ad3n\UseCase\Model\ProjectRepositoryInterface;

class InMemoryProjectRepository implements ProjectRepositoryInterface
{
    private $projects = [];

    public function persist(ProjectInterface $project)
    {
        $this->projects[] = $project;
    }

    public function getProjects(): array
    {
        return $this->projects;
    }

    public function isPersistance(): bool
    {
        return false;
    }
}
