<?php

namespace Ad3n\UseCase\Entity;

use Ad3n\UseCase\Model\ProjectInterface;
use Ad3n\UseCase\ProjectStatus;

class Project implements ProjectInterface
{
    private $status;

    private $name;

    public function getStatus(): string
    {
        return $this->status;
    }

    public function setStatus(string $status): void
    {
        if (!in_array($status, [ProjectStatus::DRAFT, ProjectStatus::PUBLISH, ProjectStatus::FINISH])) {
            $status = ProjectStatus::DRAFT;
        }

        $this->status = $status;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }
}