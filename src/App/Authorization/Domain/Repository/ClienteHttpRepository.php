<?php

namespace Skeleton\App\Authorization\Domain\Repository;

use Skeleton\App\Authorization\Domain\Entity\AuthEntity;

interface ClienteHttpRepository
{
    public function login(AuthEntity $authEntity);
}
