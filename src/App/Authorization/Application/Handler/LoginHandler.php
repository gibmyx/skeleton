<?php

namespace Skeleton\App\Authorization\Application\Handler;

use Skeleton\App\Authorization\Domain\Entity\AuthEntity;
use Skeleton\App\Authorization\Domain\Repository\ClienteHttpRepository;
use Skeleton\Shared\Application\Command\Command;
use Skeleton\Shared\Application\Handler\Hendler;

class LoginHandler implements Hendler
{
    private $repository;

    public function __construct(ClienteHttpRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(Command $command)
    {

        $auth = new AuthEntity(
            $command->getUsername(),
            $command->getPassword()
        );

        return $this->repository->login($auth);
    }

}
