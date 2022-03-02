<?php

declare(strict_types=1);

namespace AbstractFactory\Factory;

use AbstractFactory\Contract\OrderRepositoryInterface;
use AbstractFactory\Contract\RepositoryFactoryInterface;
use AbstractFactory\Contract\UserRepositoryInterface;
use AbstractFactory\Repository\RedisUserRepository;
use AbstractFactory\Repository\RedisOrderRepository;
use AbstractFactory\Db\Redis;

class RedisRepositoryFactory implements RepositoryFactoryInterface
{
    private $redisConnection;

    public function __construct(Redis $postgresConnection)
    {
        $this->redisConnection = $postgresConnection;
    }

    public function createUserRepository(): UserRepositoryInterface
    {
        return new RedisUserRepository($this->redisConnection);
    }

    public function createOrderRepository(): OrderRepositoryInterface
    {
        return new RedisOrderRepository($this->redisConnection);
    }
}