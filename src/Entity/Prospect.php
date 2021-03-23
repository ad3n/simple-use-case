<?php

namespace Ad3n\UseCase\Entity;

use Ad3n\UseCase\Model\ProspectInterface;

class Prospect implements ProspectInterface
{
    private $name;

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }
}
