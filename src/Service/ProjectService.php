<?php

namespace Ad3n\UseCase\Service;

use Ad3n\UseCase\Entity\Project;
use Ad3n\UseCase\Model\ProjectInterface;
use Ad3n\UseCase\Model\ProjectRepositoryInterface;
use Ad3n\UseCase\Model\ProspectInterface;
use Ad3n\UseCase\ProjectStatus;

class ProjectService
{
    private $projectRepository;

    public function __construct(ProjectRepositoryInterface $projectRepository)
    {
        $this->projectRepository = $projectRepository;
    }

    public function createFromProspect(ProspectInterface $prospect): ProjectInterface
    {
        $project = new Project();
        $project->setStatus(ProjectStatus::DRAFT);
        $project->setName($prospect->getName());

        return $project;
    }

    public function save(ProjectInterface $project)
    {
        $this->projectRepository->persist($project);
    }

    /**
     * @return array []ProjectInterface
     */
    public function getProjects(): array
    {
        return $this->projectRepository->getProjects();
    }
}
