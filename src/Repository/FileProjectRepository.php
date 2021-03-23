<?php

namespace Ad3n\UseCase\Repository;

use Ad3n\UseCase\Model\ProjectInterface;
use Ad3n\UseCase\Model\ProjectRepositoryInterface;

class FileProjectRepository implements ProjectRepositoryInterface
{
    public function persist(ProjectInterface $project)
    {
        file_put_contents('projects.txt', sprintf('%s###', serialize($project)), FILE_APPEND);
    }

    public function getProjects(): array
    {
        $projects = [];
        $data = explode('###', file_get_contents('projects.txt'));
        foreach ($data as $project) {
            $projects[] = unserialize($project);
        }

        return $projects;
    }

    public function isPersistance(): bool
    {
        return true;
    }
}
