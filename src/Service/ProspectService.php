<?php

namespace Ad3n\UseCase\Service;

use Ad3n\UseCase\Entity\Prospect;
use Ad3n\UseCase\Model\ProspectInterface;

class ProspectService
{
    public function create(string $name): ProspectInterface
    {
        $prospect = new Prospect();
        $prospect->setName($name);

        return $prospect;
    }
}
