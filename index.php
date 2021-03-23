<?php

use Ad3n\UseCase\Repository\ChainProjectRepository;
use Ad3n\UseCase\Repository\FileProjectRepository;
use Ad3n\UseCase\Repository\InMemoryProjectRepository;
use Ad3n\UseCase\Service\ProjectService;
use Ad3n\UseCase\Service\ProspectService;

require 'vendor/autoload.php';

$inMemoryRepository = new InMemoryProjectRepository();
$fileRepository = new FileProjectRepository();
$chainRepository = new ChainProjectRepository([$inMemoryRepository, $fileRepository]);

$prospectService = new ProspectService();
$projectService = new ProjectService($fileRepository);

$prospect = $prospectService->create('Ravi');
$project = $projectService->createFromProspect($prospect);
$projectService->save($project);

$prospect = $prospectService->create('Anjay');
$project = $projectService->createFromProspect($prospect);
$projectService->save($project);

var_dump($fileRepository->getProjects());
