<?php

declare(strict_types=1);

namespace AbstractFactory\Repository;

use AbstractFactory\Contract\UserRepositoryInterface;
use AbstractFactory\Entity\User;
class PostgresUserRepository extends BasePostgresRepository
    implements UserRepositoryInterface
{
    public function add(User $user)
    {
        echo 'Добавляем в postgres пользователя $user.' . PHP_EOL;
    }

    public function delete(User $user)
    {
        echo 'Удаляем в postgres пользователя $user.' . PHP_EOL;
    }

    public function update(User $user)
    {
        echo 'Обновляем в postgres пользователя $user.' . PHP_EOL;
    }
}