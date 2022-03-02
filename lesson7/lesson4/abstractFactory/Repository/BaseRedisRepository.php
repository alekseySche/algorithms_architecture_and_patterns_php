<?php

declare(strict_types=1);

namespace AbstractFactory\Repository;

use AbstractFactory\Db\Redis;

abstract class BaseRedisRepository
{
    private $redisConnection;

    public function __construct(Redis $redisConnection)
    {
        $this->redisConnection = $redisConnection;
    }

    public function getRedisConnection(): Redis
    {
        return $this->redisConnection;
    }
}