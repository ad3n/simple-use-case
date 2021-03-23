<?php

namespace Ad3n\UseCase\Model;

interface ProjectInterface
{
    public function getStatus(): string;

    public function getName(): string;
}
