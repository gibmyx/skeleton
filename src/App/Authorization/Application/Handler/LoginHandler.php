<?php

namespace Skeleton\App\Authorization\Application\Handler;

use Skeleton\App\Authorization\Domain\Entity\AuthEntity;
use Skeleton\App\Authorization\Domain\Repository\ClienteHttpRepository;

class LoginHandler
{
    private $repository;

    public function __construct(ClienteHttpRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke($command)
    {

        $auth = new AuthEntity(
            $command->getUsername(),
            $command->getPassword()
        );

        return $this->repository->login($auth);
    }

}
