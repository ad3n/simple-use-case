<?php

namespace Ad3n\UseCase\Model;

interface ProjectRepositoryInterface
{
    public function persist(ProjectInterface $project);

    /**
     * @return array []ProjectInterface
     */
    public function getProjects(): array;

    public function isPersistance(): bool;
}
